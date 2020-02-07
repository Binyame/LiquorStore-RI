<?php

abstract class QodeFrameworkShortcode {
	private $shortcode_path;
	private $base;
	private $name;
	private $description;
	private $category;
	private $is_parent = false;
	private $is_child = false;
	private $options;
	private $child_elements;
	private $parent_elements;
	private $option_atts;
	private $atts;
	
	public function __construct() {
		$this->map_shortcode();
	}
	
	public function get_shortcode_path() {
		return $this->shortcode_path;
	}
	
	public function set_shortcode_path( $shortcode_path ) {
		$this->shortcode_path = $shortcode_path;
	}
	
	public function get_base() {
		return $this->base;
	}
	
	public function set_base( $base ) {
		return $this->base = $base;
	}
	
	public function get_name() {
		return $this->name;
	}
	
	public function set_name( $name ) {
		return $this->name = $name;
	}
	
	public function get_description() {
		return $this->description;
	}
	
	public function set_description( $description ) {
		return $this->description = $description;
	}
	
	public function get_category() {
		return $this->category;
	}
	
	public function set_category( $category ) {
		return $this->category = $category;
	}
	
	public function get_is_parent_shortcode() {
		return $this->is_parent;
	}
	
	public function set_is_parent_shortcode( $is_parent ) {
		return $this->is_parent = $is_parent;
	}
	
	public function get_is_child_shortcode() {
		return $this->is_child;
	}
	
	public function set_is_child_shortcode( $is_child ) {
		return $this->is_child = $is_child;
	}
	
	public function get_child_elements() {
		return $this->child_elements;
	}
	
	public function set_child_elements( $child_elements ) {
		return $this->child_elements = $child_elements;
	}
	
	public function get_parent_elements() {
		return $this->parent_elements;
	}
	
	public function set_parent_elements( $parent_elements ) {
		return $this->parent_elements = $parent_elements;
	}
	
	public function get_options() {
		return $this->options;
	}
	
	public function get_option( $key ) {
		return $this->options[ $key ];
	}
	
	public function set_option( $params ) {
		$key = $params['name'];
		
		if ( $params['field_type'] == 'iconpack' ) {
			$icon_collections = qode_framework_icons()->get_icon_object_collection();
			
			if ( ! empty( $icon_collections ) ) {
				$params['options']     = qode_framework_icons()->get_icon_packs( array(), true );
				$this->options[ $key ] = $params;
				
				foreach ( $icon_collections as $icon_object_key => $icon_object_value ) {
					$icon_field_name = qode_framework_icons()->get_formatted_icon_field_name( $key, $icon_object_key );
					$icon_params     = array(
						'name'       => $icon_field_name,
						'field_type' => 'icon',
						'title'      => $icon_object_value->get_name(),
						'options'    => $icon_object_value->get_icons(),
						'dependency' => array(
							'show' => array(
								$params['name'] => array(
									'values'        => $icon_object_key,
									'default_value' => ''
								)
							)
						),
					);
					
					if ( isset( $params['group'] ) ) {
						$icon_params['group'] = $params['group'];
					}
					
					$this->options[ $icon_field_name ] = $icon_params;
				}
			}
		} else {
			$this->options[ $key ] = $params;
		}
	}
	
	private function merge_option_atts( $params ) {
		$default_options = array();
		
		foreach ( $this->get_options() as $name => $option ) {
			$default_value = isset( $option['default_value'] ) ? $option['default_value'] : '';
			if ( isset( $option['hide_from_atts'] ) && $option['hide_from_atts'] == true ) {
				continue;
			}
			
			$default_options[ $name ] = $default_value;
		}
		
		$default_options['object_class_name'] = is_object( $this ) ? get_class( $this ) : ''; // needed for pagination loading items since object is not transferred via data params
		$this->option_atts                    = qode_framework_map_shortcode_fields( $default_options, $params );
	}
	
	public function get_atts() {
		return $this->option_atts;
	}

	public function set_option_atts( $atts ) {
		return $this->option_atts = $atts;
	}

	public function set_atts( $atts ) {
		return $this->atts = $atts;
	}
	
	public function get_single_att( $key ) {
		return $this->option_atts[ $key ];
	}
	
	public function get_editor_content( $content, $options ) {
		return apply_filters( 'qode_framework_filter_shortcode_content_html', $content, $options );
	}
	
	public function parse_repeater_items( $items ) {
		$items_formatted = json_decode( urldecode( $items ), true );
		
		return apply_filters( 'qode_framework_filter_parse_repeater_items', $items, $items_formatted );
	}
	
	public function init_holder_classes() {
		$holder_classes = array();
		
		$holder_classes[] = 'qodef-shortcode';
		$holder_classes[] = 'qodef-m';
		
		$atts             = $this->get_atts();
		$holder_classes[] = ! empty( $atts['custom_class'] ) ? esc_attr( $atts['custom_class'] ) : '';
		
		$holder_classes = apply_filters( 'qode_framework_filter_shortcode_holder_classes', $holder_classes );
		
		return $holder_classes;
	}
	
	public function init_item_classes() {
		$item_classes = array();
		
		$item_classes[] = 'qodef-e';
		
		$item_classes = apply_filters( 'qode_framework_filter_shortcode_item_classes', $item_classes );
		
		return $item_classes;
	}
	
	public function import_shortcode_options( $params ) {
		$shortcode_base    = isset( $params['shortcode_base'] ) ? $params['shortcode_base'] : '';
		$additional_params = isset( $params['additional_params'] ) ? $params['additional_params'] : array();
		$exclude           = isset( $params['exclude'] ) ? $params['exclude'] : array();
		$include           = isset( $params['include'] ) ? $params['include'] : array();
		
		$options_to_skip = apply_filters( 'qode_framework_filter_shortcode_options_import_skip', array( 'dependency' ) );
		$qode_framework  = qode_framework_get_framework_root();
		$shortcodes      = $qode_framework->get_shortcodes()->get_shortcodes();
		
		if ( ! empty( $shortcode_base ) && array_key_exists( $shortcode_base, $shortcodes ) ) {
			$shortcode         = $shortcodes[ $shortcode_base ];
			$shortcode_options = $shortcode->get_options();
			
			if ( ! empty( $shortcode_options ) && is_array( $shortcode_options ) ) {
				
				if ( ! empty( $exclude ) ) {
					if ( ! array_key_exists( 'custom_class', $exclude ) ) {
						$exclude[] = 'custom_class';
					}
					$options_to_return = array_diff_key( $shortcode_options, array_flip( $exclude ) );
				} else if ( ! empty( $include ) ) {
					$options_to_return = array_intersect_key( $shortcode_options, array_flip( $include ) );
				} else {
					$options_to_return = $shortcode_options;
				}
				
				foreach ( $options_to_return as $option ) {
					$visibility = isset( $option['visibility'] ) ? $option['visibility'] : array();
					
					if ( isset( $visibility['map_for_sc'] ) && $visibility['map_for_sc'] === false ) {
						continue;
					}
					
					if ( ! empty( $additional_params ) ) {
						foreach ( $additional_params as $new_key => $new_value ) {
							if ( in_array( $new_key, $options_to_skip ) && array_key_exists( $new_key, $option ) ) {
								continue;
							}
							$option[ $new_key ] = $new_value;
						}
					}
					
					$this->set_option( $option );
				}
				
				return true;
			}
		}
		
		return false;
	}
	
	public function populate_imported_shortcode_atts( $params ) {
		$shortcode_base = isset( $params['shortcode_base'] ) ? $params['shortcode_base'] : '';
		$atts           = isset( $params['atts'] ) ? $params['atts'] : array();
		$exclude        = isset( $params['exclude'] ) ? $params['exclude'] : array();
		$include        = isset( $params['include'] ) ? $params['include'] : array();
		
		$extracted_options = array();
		$qode_framework    = qode_framework_get_framework_root();
		$shortcodes        = $qode_framework->get_shortcodes()->get_shortcodes();
		
		if ( ! empty( $shortcode_base ) && array_key_exists( $shortcode_base, $shortcodes ) ) {
			$shortcode         = $shortcodes[ $shortcode_base ];
			$shortcode_options = $shortcode->get_options();
			
			if ( ! empty( $shortcode_options ) && is_array( $shortcode_options ) ) {
				if ( ! empty( $exclude ) ) {
					if ( ! array_key_exists( 'custom_class', $exclude ) ) {
						$exclude[] = 'custom_class';
					}
					
					$options_to_return = array_diff_key( $shortcode_options, array_flip( $exclude ) );
				} else if ( ! empty( $include ) ) {
					$options_to_return = array_intersect_key( $shortcode_options, array_flip( $include ) );
				}
				
				if ( ! empty( $options_to_return ) ) {
					foreach ( $options_to_return as $key => $option ) {
						$extracted_options[ $key ] = $atts[ $key ];
					}
				}
			}
		}
		
		return $extracted_options;
	}
	
	abstract public function map_shortcode();
	
	public function register() {
		add_shortcode( $this->get_base(), array( $this, 'render' ) );
	}
	
	public function load_assets() {
		return false;
	}
	
	public function render( $options, $content = null ) {
		$this->merge_option_atts( $options );
		$this->load_assets();
	}
}