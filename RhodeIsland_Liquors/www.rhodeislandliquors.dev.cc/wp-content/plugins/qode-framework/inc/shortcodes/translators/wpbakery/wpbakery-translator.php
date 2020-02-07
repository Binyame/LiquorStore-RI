<?php

class WPBakeryTranslator {
	
	public function __construct() {
		$this->add_shortcodes();
		
		add_filter( 'qode_framework_filter_shortcode_content_html', array( $this, 'format_shortcode_content' ), 10, 2 );
		add_filter( 'qode_framework_filter_parse_repeater_items', array( $this, 'parse_repeater_items' ), 10, 2 );
		
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_scripts' ) );
		
		// Add admin inline style
		add_action( 'admin_enqueue_scripts', array( $this, 'add_inline_style' ) );
	}
	
	public function format_shortcode_content( $content, $options ) {
		$content_formatted =  preg_replace( '#^<\/p>|<p>$#', '', $content ); // delete p tag before and after content
		
		return $content_formatted;
	}
	
	public function parse_repeater_items( $items ) {
		return json_decode( urldecode( $items ), true );
	}
	
	public function add_shortcodes() {
		$shortcodes = qode_framework_get_framework_root()->get_shortcodes()->get_shortcodes();
		
		if ( ! empty( $shortcodes ) && is_array( $shortcodes ) ) {
			ksort( $shortcodes );
			
			foreach ( $shortcodes as $key => $shortcode ) {
				$this->map_shortcodes( $key, $shortcode );
			}
		}
	}
	
	public function map_shortcodes( $key, $shortcode ) {
		$shortcode_options = array();
		
		foreach ( $shortcode->get_options() as $option ) {
			$visibility = isset( $option['visibility'] ) ? $option['visibility'] : array();
			
			if ( isset( $visibility['map_for_page_builder'] ) && $visibility['map_for_page_builder'] === false ) {
				continue;
			}
			
			$shortcode_options_part = $this->generate_option_params( $option, $shortcode->get_options() );
			
			if ( isset( $option['group'] ) ) {
				$shortcode_options_part['group'] = $option['group'];
			}
			
			if ( $shortcode_options_part['type'] == 'param_group' && isset( $option['items'] ) && ! empty ( $option['items'] ) ) {
				$param_group_params = array();
				foreach ( $option['items'] as $item ) {
					$param_group_params[] = $this->generate_option_params( $item, $option['items'] );
				}
				$shortcode_options_part['params'] = $param_group_params;
			}
			
			$shortcode_options[] = $shortcode_options_part;
		}
		
		$additional_shortcode_params = array();
		
		if ( $shortcode->get_is_parent_shortcode() ) {
			$additional_shortcode_params['js_view']      = 'VcColumnView';
			$additional_shortcode_params['content_element'] = true;
			
			add_filter( 'qode_framework_filter_add_shortcode_container', function ( $classes ) use ( $key ) {
				$classes[] = $key;
				
				return $classes;
			} );
			
			$children = $shortcode->get_child_elements();
			
			if ( is_array( $children ) && ! empty( $children ) ) {
				$additional_shortcode_params['as_parent'] = array( 'only' => implode( ',', $children ) );
			}
		}
		
		if ( $shortcode->get_is_child_shortcode() ) {
			$additional_shortcode_params['js_view']         = 'VcColumnView';
			$additional_shortcode_params['content_element'] = true;
			$additional_shortcode_params['is_container']    = true;
			
			$parents = $shortcode->get_parent_elements();
			
			if ( is_array( $parents ) && ! empty( $parents ) ) {
				$additional_shortcode_params['as_child'] = array( 'only' => implode( ',', $parents ) );
			}
		}
		
		vc_map(
			array_merge(
				array(
					'base'        => $key,
					'name'        => $shortcode->get_name(),
					'description' => $shortcode->get_description(),
					'class'       => '',
					'category'    => $shortcode->get_category(),
					'icon'        => 'qodef-custom-vc-icon ' . $key,
					'params'      => $shortcode_options
				),
				$additional_shortcode_params
			)
		);
	}
	
	public function convert_options_types_to_wpb_types( $option ) {
		$type = $option['field_type'];
		
		switch ( $type ) :
			case 'text':
				$wpb_type = 'textfield';
				break;
			case 'textarea':
				$wpb_type = 'textarea';
				break;
			case 'html':
				$wpb_type = 'textarea_html';
				break;
			case 'select':
				$wpb_type = 'dropdown';
				break;
			case 'checkbox':
				$wpb_type = 'checkbox';
				break;
			case 'color':
				$wpb_type = 'colorpicker';
				break;
			case 'image':
				if ( isset( $option['multiple'] ) && $option['multiple'] == 'yes' ) {
					$wpb_type = 'attach_images';
				} else {
					$wpb_type = 'attach_image';
				}
				break;
			case 'iconpack':
				$wpb_type = 'dropdown';
				break;
			case 'icon':
				$wpb_type = 'dropdown';
				break;
			case 'date':
				$wpb_type = 'textfield';
				break;
			case 'repeater':
				$wpb_type = 'param_group';
				break;
			default:
				$wpb_type = 'textfield';
				break;
		endswitch;
		
		return $wpb_type;
	}
	
	public function generate_option_params( $option, $options_list ) {
		$shortcode_options_part = array(
			'param_name' => $option['name'],
			'heading'    => esc_attr( $option['title'] ),
			'type'       => $this->convert_options_types_to_wpb_types( $option )
		);
		
		if ( isset( $option['description'] ) && ! empty( $option['description'] ) ) {
			$shortcode_options_part['description'] = esc_attr( $option['description'] );
		}
		
		if ( isset( $option['show_label'] ) ) {
			$shortcode_options_part['admin_label'] = $option['show_label'];
		}
		
		if ( isset( $option['dependency'] ) ) {
			if ( isset( $option['dependency']['show'] ) ) {
				$dependency = $option['dependency']['show'];
				
				$dependency_key                       = key( $dependency );
				$shortcode_options_part['dependency'] = array(
					'element' => $dependency_key
				);
				
				if( $dependency[ $dependency_key ]['values'] === '' ) {
					$shortcode_options_part['dependency']['value'] = array('');
				} else {
					$shortcode_options_part['dependency']['value'] = $dependency[ $dependency_key ]['values'];
				}
			}
			
			if ( isset( $option['dependency']['hide'] ) ) {
				$dependency = $option['dependency']['hide'];
				
				$dependency_key                       = key( $dependency );
				$shortcode_options_part['dependency'] = array(
					'element' => $dependency_key
				);
				
				if ( $dependency[ $dependency_key ]['values'] === '' ) {
					$shortcode_options_part['dependency']['not_empty'] = true;
				} else {
					$dep_element_array   = $options_list;
					$dep_element_options = isset( $dep_element_array[ $dependency_key ]['options'] ) ? $dep_element_array[ $dependency_key ]['options'] : array();
					
					if ( is_array( $dependency[ $dependency_key ]['values'] ) && count( $dependency[ $dependency_key ]['values'] ) ) {
						$dep_element_options = array_diff( $dep_element_options, $dependency[ $dependency_key ]['values'] );
					} else {
						unset( $dep_element_options[ $dependency[ $dependency_key ]['values'] ] );
					}
					
					$shortcode_options_part['dependency']['value'] = array_values( array_flip( $dep_element_options ) );
				}
			}
		}
		
		if ( isset( $option['default_value'] ) ) {
			$shortcode_options_part['value'] = $option['default_value'];
		}
		
		if ( isset( $option['options'] ) ) {
			$shortcode_options_part['value']       = array_flip( $option['options'] );
			$shortcode_options_part['save_always'] = true;
		}

		return $shortcode_options_part;
	}
	
	public function enqueue_scripts() {
		wp_enqueue_style( 'qode-framework-wpbakery', QODE_FRAMEWORK_SHORTCODES_URL_PATH . '/translators/wpbakery/assets/css/wpbakery.css', array( 'js_composer' ) );
	}
	
	function add_inline_style() {
		$shortcodes = qode_framework_get_framework_root()->get_shortcodes()->get_shortcodes();
		$style      = apply_filters( 'qode_framework_filter_add_wpbakery_inline_style', $style = '' );
		
		if ( ! empty( $shortcodes ) && is_array( $shortcodes ) ) {
			ksort( $shortcodes );
			
			foreach ( $shortcodes as $key => $shortcode ) {
				$shortcode_path = $shortcode->get_shortcode_path();
				
				if ( isset( $shortcode_path ) && ! empty( $shortcode_path ) ) {
					$icon      = $shortcode->get_is_child_shortcode() ? 'dashboard_child_icon' : 'dashboard_icon';
					$icon_path = $shortcode_path . '/assets/img/' . esc_attr( $icon ) . '.png';
					
					$style .= '.qodef-custom-vc-icon.' . $key . '{
						background-image: url("' . $icon_path . '") !important;
					}';
				}
			}
		}
	
		if ( ! empty( $style ) ) {
			wp_add_inline_style( 'qode-framework-wpbakery', $style );
		}
	}
}

if ( ! function_exists( 'qode_framework_init_wpbakery_translator' ) ) {
	function qode_framework_init_wpbakery_translator() {
		if ( qode_framework_is_installed( 'wpbakery' ) ) {
			new WPBakeryTranslator();
			
			if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
				$classes = apply_filters( 'qode_framework_filter_add_shortcode_container', array() );
				
				foreach ( $classes as $class ) {
					$class      = ucwords( str_replace( '_', ' ', $class ) );
					$class_name = 'WPBakeryShortCode_' . str_replace( ' ', '_', $class );
					eval( "class $class_name extends WPBakeryShortCodesContainer {};" );
				}
			}
		}
	}
	
	add_action( 'init', 'qode_framework_init_wpbakery_translator', 99 );
}