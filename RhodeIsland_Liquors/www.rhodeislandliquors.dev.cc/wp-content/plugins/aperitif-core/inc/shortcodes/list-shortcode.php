<?php

abstract class AperitifCoreListShortcode extends QodeFrameworkShortcode {
	private $post_type;
	private $post_type_taxonomy;
	private $layouts = array();
	private $hover_animation_options = array();
	private $extra_options = array();
	
	public function __construct() {
		parent::__construct();
	}
	
	public function get_post_type() {
		return $this->post_type;
	}
	
	public function set_post_type( $post_type ) {
		$this->post_type = $post_type;
	}
	
	public function get_post_type_taxonomy() {
		return $this->post_type_taxonomy;
	}
	
	public function set_post_type_taxonomy( $post_type_taxonomy ) {
		$this->post_type_taxonomy = $post_type_taxonomy;
	}
	
	public function get_layouts() {
		return $this->layouts;
	}
	
	public function set_layouts( $layouts ) {
		$this->layouts = $layouts;
	}
	
	public function get_hover_animation_options() {
		return $this->hover_animation_options;
	}
	
	public function set_hover_animation_options( $hover_animation_options ) {
		$this->hover_animation_options = $hover_animation_options;
	}
	
	public function get_extra_options() {
		return $this->extra_options;
	}
	
	public function set_extra_options( $extra_options ) {
		$this->extra_options = $extra_options;
	}
	
	public function map_list_options( $params = array() ) {
		$group            = isset( $params['group'] ) ? $params['group'] : null;
		$exclude_option   = isset( $params['exclude_option'] ) ? $params['exclude_option'] : array();
		$exclude_behavior = isset( $params['exclude_behavior'] ) ? $params['exclude_behavior'] : array();
		$include_columns  = isset( $params['include_columns'] ) ? $params['include_columns'] : array();
		$default_columns  = isset( $params['default_columns'] ) ? $params['default_columns'] : '3';
		
		$this->set_option( array(
			'field_type'    => 'select',
			'name'          => 'behavior',
			'title'         => esc_html__( 'List Behavior', 'aperitif-core' ),
			'options'       => aperitif_core_get_select_type_options_pool( 'list_behavior', false, $exclude_behavior ),
			'default_value' => 'columns',
			'group'         => $group
		) );
		
		if ( empty( $exclude_behavior ) || ( ! empty( $exclude_behavior ) && ! in_array( 'masonry', $exclude_behavior ) ) ) {
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'masonry_images_proportion',
				'title'         => esc_html__( 'Images Proportion', 'aperitif-core' ),
				'options'       => array(
					''      => esc_html__( 'Original', 'aperitif-core' ),
					'fixed' => esc_html__( 'Fixed', 'aperitif-core' )
				),
				'default_value' => '',
				'group'         => $group,
				'dependency'    => array(
					'show' => array(
						'behavior' => array(
							'values'        => 'masonry',
							'default_value' => 'columns'
						)
					)
				)
			) );
		}
		if ( empty( $exclude_option ) || ( ! empty( $exclude_option ) && ! in_array( 'images_proportion', $exclude_option ) ) ) {
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'images_proportion',
				'default_value' => 'full',
				'title'         => esc_html__( 'Images Proportion', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'list_image_dimension', false ),
				'group'         => $group,
				'dependency'    => array(
					'show' => array(
						'behavior' => array(
							'values'        => array( '', 'columns', 'slider' ),
							'default_value' => 'columns'
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'custom_image_width',
				'title'       => esc_html__( 'Custom Image Width', 'aperitif-core' ),
				'description' => esc_html__( 'Enter image width in px', 'aperitif-core' ),
				'group'       => $group,
				'dependency'  => array(
					'show' => array(
						'images_proportion' => array(
							'values'        => 'custom',
							'default_value' => 'full'
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'custom_image_height',
				'title'       => esc_html__( 'Custom Image Height', 'aperitif-core' ),
				'description' => esc_html__( 'Enter image height in px', 'aperitif-core' ),
				'group'       => $group,
				'dependency'  => array(
					'show' => array(
						'images_proportion' => array(
							'values'        => 'custom',
							'default_value' => 'full'
						)
					)
				)
			) );
		}
		if ( empty( $exclude_option ) || ( ! empty( $exclude_option ) && ! in_array( 'columns_number', $exclude_option ) ) ) {
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'columns',
				'title'         => esc_html__( 'Columns Number', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'columns_number', true, array(), $include_columns ),
				'default_value' => $default_columns,
				'group'         => $group,
				'dependency'    => array(
					'hide' => array(
						'behavior' => array(
							'values'        => 'justified-gallery',
							'default_value' => 'columns'
						)
					)
				)
			) );
		}
		if ( empty( $exclude_option ) || ( ! empty( $exclude_option ) && ! in_array( 'space', $exclude_option ) ) ) {
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'space',
				'title'         => esc_html__( 'Space Between Items', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'items_space' ),
				'default_value' => 'medium',
				'group'         => $group
			) );
		}
		if ( empty( $exclude_option ) || ( ! empty( $exclude_option ) && ! in_array( 'columns_responsive', $exclude_option ) ) ) {
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'columns_responsive',
				'title'         => esc_html__( 'Columns Responsive', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'columns_responsive' ),
				'default_value' => 'predefined',
				'group'         => $group,
				'dependency'    => array(
					'hide' => array(
						'behavior' => array(
							'values'        => 'justified-gallery',
							'default_value' => 'columns'
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'columns_1440',
				'title'         => esc_html__( 'Columns Number 1367px - 1440px', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'columns_number' ),
				'default_value' => '3',
				'dependency'    => array(
					'show' => array(
						'columns_responsive' => array(
							'values'        => 'custom',
							'default_value' => '3'
						)
					)
				),
				'group'         => $group
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'columns_1366',
				'title'         => esc_html__( 'Columns Number 1025px - 1366px', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'columns_number' ),
				'default_value' => '3',
				'dependency'    => array(
					'show' => array(
						'columns_responsive' => array(
							'values'        => 'custom',
							'default_value' => '3'
						)
					)
				),
				'group'         => $group
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'columns_1024',
				'title'         => esc_html__( 'Columns Number 769px - 1024px', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'columns_number' ),
				'default_value' => '3',
				'dependency'    => array(
					'show' => array(
						'columns_responsive' => array(
							'values'        => 'custom',
							'default_value' => '3'
						)
					)
				),
				'group'         => $group
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'columns_768',
				'title'         => esc_html__( 'Columns Number 681px - 768px', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'columns_number' ),
				'default_value' => '3',
				'dependency'    => array(
					'show' => array(
						'columns_responsive' => array(
							'values'        => 'custom',
							'default_value' => '3'
						)
					)
				),
				'group'         => $group
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'columns_680',
				'title'         => esc_html__( 'Columns Number 481px - 680px', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'columns_number' ),
				'default_value' => '3',
				'dependency'    => array(
					'show' => array(
						'columns_responsive' => array(
							'values'        => 'custom',
							'default_value' => '3'
						)
					)
				),
				'group'         => $group
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'columns_480',
				'title'         => esc_html__( 'Columns Number 0 - 480px', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'columns_number' ),
				'default_value' => '3',
				'dependency'    => array(
					'show' => array(
						'columns_responsive' => array(
							'values'        => 'custom',
							'default_value' => '3'
						)
					)
				),
				'group'         => $group
			) );
		}
		if ( empty( $exclude_behavior ) || ( ! empty( $exclude_behavior ) && ! in_array( 'slider', $exclude_behavior ) ) ) {
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'slider_loop',
				'title'      => esc_html__( 'Enable Slider Loop', 'aperitif-core' ),
				'options'    => aperitif_core_get_select_type_options_pool( 'yes_no' ),
				'dependency' => array(
					'show' => array(
						'behavior' => array(
							'values'        => 'slider',
							'default_value' => 'columns'
						)
					)
				),
				'group'      => $group
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'slider_autoplay',
				'title'      => esc_html__( 'Enable Slider Autoplay', 'aperitif-core' ),
				'options'    => aperitif_core_get_select_type_options_pool( 'yes_no' ),
				'dependency' => array(
					'show' => array(
						'behavior' => array(
							'values'        => 'slider',
							'default_value' => 'columns'
						)
					)
				),
				'group'      => $group
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'slider_speed',
				'title'      => esc_html__( 'Slider Speed', 'aperitif-core' ),
				'dependency' => array(
					'show' => array(
						'behavior' => array(
							'values'        => 'slider',
							'default_value' => 'columns'
						)
					)
				),
				'group'      => $group
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'slider_navigation',
				'title'      => esc_html__( 'Enable Slider Navigation', 'aperitif-core' ),
				'options'    => aperitif_core_get_select_type_options_pool( 'yes_no' ),
				'dependency' => array(
					'show' => array(
						'behavior' => array(
							'values'        => 'slider',
							'default_value' => 'columns'
						)
					)
				),
				'group'      => $group
			) );
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'slider_pagination',
				'title'      => esc_html__( 'Enable Slider Pagination', 'aperitif-core' ),
				'options'    => aperitif_core_get_select_type_options_pool( 'yes_no' ),
				'dependency' => array(
					'show' => array(
						'behavior' => array(
							'values'        => 'slider',
							'default_value' => 'columns'
						)
					)
				),
				'group'      => $group
			) );
		}
		if ( empty( $exclude_behavior ) || ( ! empty( $exclude_behavior ) && ! in_array( 'justified-gallery', $exclude_behavior ) ) ) {
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'justified_gallery_row_height',
				'title'      => esc_html__( 'Row Height', 'aperitif-core' ),
				'dependency' => array(
					'show' => array(
						'behavior' => array(
							'values'        => 'justified-gallery',
							'default_value' => 'columns'
						)
					)
				),
				'group'      => $group
			) );
		}
	}
	
	public function get_list_classes( $atts ) {
		$holder_classes = array();
		
		$holder_classes[] = 'qodef-grid';
		$holder_classes[] = ! empty( $atts['behavior'] ) && $atts['behavior'] == 'slider' ? 'qodef-swiper-container' : 'qodef-layout--' . $atts['behavior'];
		$holder_classes[] = ! empty( $atts['behavior'] ) && $atts['behavior'] == 'masonry' && ! empty( $atts['masonry_images_proportion'] ) && $atts['masonry_images_proportion'] == 'fixed' ? 'qodef-items--fixed' : '';
		$holder_classes[] = ! empty( $atts['space'] ) ? 'qodef-gutter--' . $atts['space'] : '';
		$holder_classes[] = ! empty( $atts['columns'] ) ? 'qodef-col-num--' . $atts['columns'] : '';
		
		$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';
		$holder_classes[] = ! empty( $atts['skin'] ) ? 'qodef-item-skin--' . $atts['skin'] : '';
		
		if ( ! empty( $atts['enable_filter'] ) ) {
			$holder_classes[] = 'qodef-filter--on';
		}
		
		if ( ! empty( $atts['pagination_type'] ) ) {
			if ( $atts['pagination_type'] == 'no-pagination' ) {
				$holder_classes[] = 'qodef--no-bottom-space';
				$holder_classes[] = 'qodef-pagination--off';
			} else {
				$holder_classes[] = 'qodef-pagination--on';
				$holder_classes[] = 'qodef-pagination-type--' . $atts['pagination_type'];
			}
		}
		
		if ( ! empty( $atts['columns_responsive'] ) && $atts['columns_responsive'] === 'custom' ) {
			$holder_classes[] = 'qodef-responsive--custom';
			$holder_classes[] = ! empty( $atts['columns_1440'] ) ? 'qodef-col-num--1440--' . $atts['columns_1440'] : 'qodef-col-num--1440--' . $atts['columns'];
			$holder_classes[] = ! empty( $atts['columns_1366'] ) ? 'qodef-col-num--1366--' . $atts['columns_1366'] : 'qodef-col-num--1366--' . $atts['columns'];
			$holder_classes[] = ! empty( $atts['columns_1024'] ) ? 'qodef-col-num--1024--' . $atts['columns_1024'] : 'qodef-col-num--1024--' . $atts['columns'];
			$holder_classes[] = ! empty( $atts['columns_768'] ) ? 'qodef-col-num--768--' . $atts['columns_768'] : 'qodef-col-num--768--' . $atts['columns'];
			$holder_classes[] = ! empty( $atts['columns_680'] ) ? 'qodef-col-num--680--' . $atts['columns_680'] : 'qodef-col-num--680--' . $atts['columns'];
			$holder_classes[] = ! empty( $atts['columns_480'] ) ? 'qodef-col-num--480--' . $atts['columns_480'] : 'qodef-col-num--480--' . $atts['columns'];
		} else {
			$holder_classes[] = 'qodef-responsive--predefined';
		}
		
		return $holder_classes;
	}
	
	public function get_hover_animation_classes( $atts ) {
		$holder_classes = array();
		
		$layout = $atts['layout'];
		if ( isset( $atts[ 'hover_animation_' . $layout ] ) ) {
			$holder_classes[] = 'qodef-hover-animation--' . $atts[ 'hover_animation_' . $layout ];
		}
		
		return $holder_classes;
	}
	
	public function get_list_item_classes( $atts ) {
		$item_classes = array();
		
		$item_classes[] = ! empty( $atts['behavior'] ) && $atts['behavior'] == 'slider' ? 'swiper-slide' : 'qodef-grid-item';
		
		if ( ! empty( $atts['image_dimension'] ) ) {
			$item_classes[] = $atts['image_dimension']['class'];
		}
		
		return $item_classes;
	}
	
	public function get_list_item_image_dimension( $atts ) {
		$image_dimension = array();
		
		if ( ! empty( $atts['behavior'] ) && $atts['behavior'] == 'masonry' && ! empty( $atts['masonry_images_proportion'] ) && $atts['masonry_images_proportion'] == 'fixed' ) {
			$masonry_image_dimension_name = 'qodef_masonry_image_dimension_' . $atts['post_type'];
			$image_dimension              = aperitif_core_get_custom_image_size_meta( 'meta-box', $masonry_image_dimension_name, get_the_ID() );
		}
		
		if ( ! empty( $atts['behavior'] ) && in_array( $atts['behavior'], array( 'columns', 'slider' ) ) ) {
			$image_dimension = array(
				'size'  => $atts['images_proportion'],
				'class' => aperitif_core_get_custom_image_size_class_name( $atts['images_proportion'] )
			);
		}
		
		return $image_dimension;
	}
	
	public function get_slider_data( $atts, $include = array() ) {
		$data = array();
		
		$data['slidesPerView'] = isset( $atts['columns'] ) ? $atts['columns'] : 1;
		$data['spaceBetween']  = isset( $atts['space'] ) ? aperitif_core_get_space_value( $atts['space'] ) : 0;
		$data['loop']          = isset( $atts['slider_loop'] ) ? $atts['slider_loop'] != 'no' : true;
		$data['autoplay']      = isset( $atts['slider_autoplay'] ) ? $atts['slider_autoplay'] != 'no' : true;
		$data['speed']         = isset( $atts['slider_speed'] ) ? $atts['slider_speed'] : '';
		
		if ( ! empty( $atts['columns_responsive'] ) && $atts['columns_responsive'] === 'custom' ) {
			$data['customStages']      = true;
			$data['slidesPerView1440'] = ! empty( $atts['columns_1440'] ) ? $atts['columns_1440'] : $atts['columns'];
			$data['slidesPerView1366'] = ! empty( $atts['columns_1366'] ) ? $atts['columns_1366'] : $atts['columns'];
			$data['slidesPerView1024'] = ! empty( $atts['columns_1024'] ) ? $atts['columns_1024'] : $atts['columns'];
			$data['slidesPerView768']  = ! empty( $atts['columns_768'] ) ? $atts['columns_768'] : $atts['columns'];
			$data['slidesPerView680']  = ! empty( $atts['columns_680'] ) ? $atts['columns_680'] : $atts['columns'];
			$data['slidesPerView480']  = ! empty( $atts['columns_480'] ) ? $atts['columns_480'] : $atts['columns'];
		}
		
		if ( ! empty( $include ) ) {
			foreach ( $include as $key => $value ) {
				if ( ! array_key_exists( $key, $data ) ) {
					$data[ $key ] = $value;
				}
			}
		}
		
		return json_encode( $data );
	}
	
	public function map_query_options( $params = array() ) {
		$group                = isset( $params['group'] ) ? $params['group'] : esc_html__( 'Query', 'aperitif-core' );
		$post_type            = isset( $params['post_type'] ) ? $params['post_type'] : 'post';
		$taxonomies_formatted = array();
		
		if ( ! empty ( $post_type ) ) {
			$taxonomies = get_object_taxonomies( $post_type, 'objects' );
			
			if ( ! empty ( $taxonomies ) ) {
				foreach ( $taxonomies as $key => $value ) {
					$taxonomies_formatted[ $key ] = $value->labels->singular_name;
				}
			}
		}
		
		$this->set_option( array(
			'field_type' => 'text',
			'name'       => 'posts_per_page',
			'title'      => esc_html__( 'Posts per Page', 'aperitif-core' ),
			'default'    => '-1',
			'group'      => $group
		) );
		$this->set_option( array(
			'field_type'    => 'select',
			'name'          => 'orderby',
			'title'         => esc_html__( 'Order By', 'aperitif-core' ),
			'options'       => aperitif_core_get_select_type_options_pool( 'order_by' ),
			'default_value' => 'date',
			'group'         => $group
		) );
		$this->set_option( array(
			'field_type'    => 'select',
			'name'          => 'order',
			'title'         => esc_html__( 'Order', 'aperitif-core' ),
			'options'       => aperitif_core_get_select_type_options_pool( 'order' ),
			'default_value' => 'DESC',
			'group'         => $group
		) );
		$this->set_option( array(
			'field_type' => 'select',
			'name'       => 'additional_params',
			'title'      => esc_html__( 'Additional Params', 'aperitif-core' ),
			'options'    => array(
				''    => esc_html__( 'No', 'aperitif-core' ),
				'id'  => esc_html__( 'Post IDs', 'aperitif-core' ),
				'tax' => esc_html__( 'Taxonomy Slug', 'aperitif-core' ),
			),
			'group'      => $group
		) );
		$this->set_option( array(
			'field_type' => 'text',
			'name'       => 'post_ids',
			'title'      => esc_html__( 'Posts IDs (separate with comma)', 'aperitif-core' ),
			'group'      => $group,
			'dependency' => array(
				'show' => array(
					'additional_params' => array(
						'values'        => 'id',
						'default_value' => ''
					)
				)
			)
		) );
		if ( ! empty( $taxonomies_formatted ) ) {
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'tax',
				'title'      => esc_html__( 'Taxonomy', 'aperitif-core' ),
				'options'    => $taxonomies_formatted,
				'group'      => $group,
				'dependency' => array(
					'show' => array(
						'additional_params' => array(
							'values'        => 'tax',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'tax_slug',
				'title'      => esc_html__( 'Taxonomy Slug', 'aperitif-core' ),
				'group'      => $group,
				'dependency' => array(
					'show' => array(
						'additional_params' => array(
							'values'        => 'tax',
							'default_value' => ''
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type'  => 'text',
				'name'        => 'tax__in',
				'title'       => esc_html__( 'Taxonomy Ids', 'aperitif-core' ),
				'description' => esc_html__( 'Separate taxonomy ids with commas', 'aperitif-core' ),
				'group'       => $group,
				'dependency'  => array(
					'show' => array(
						'additional_params' => array(
							'values'        => 'tax',
							'default_value' => ''
						)
					)
				)
			) );
		}
	}
	
	public function get_additional_query_args( $atts ) {
		$args = array();
		
		if ( ! empty( $atts['additional_params'] ) && $atts['additional_params'] == 'id' ) {
			$post_ids         = explode( ',', $atts['post_ids'] );
			$args['orderby']  = 'post__in';
			$args['post__in'] = $post_ids;
		}
		
		if ( ! empty( $atts['additional_params'] ) && $atts['additional_params'] == 'tax' ) {
			$taxonomy_values = array();
			
			$slug = isset( $atts['tax_slug'] ) ? $atts['tax_slug'] : '';
			$ids  = isset( $atts['tax__in'] ) ? $atts['tax__in'] : '';
			
			if ( ! empty( $ids ) && empty( $slug ) ) {
				$taxonomy_values['field'] = 'term_id';
				$taxonomy_values['terms'] = is_array( $ids ) ? array_map( 'intval', $ids ) : array_map( 'intval', explode( ',', str_replace( ' ', '', $ids ) ) );
			} else if ( ! empty( $slug ) ) {
				$taxonomy_values['field'] = 'slug';
				$taxonomy_values['terms'] = $slug;
			}
			
			if ( ! empty( $atts['tax'] ) && ! empty( $taxonomy_values ) ) {
				$args['tax_query'] = array( array_merge( array( 'taxonomy' => $atts['tax'] ), $taxonomy_values ) );
			}
		}
		
		return $args;
	}
	
	public function map_layout_options( $params = array() ) {
		$layouts          = isset( $params['layouts'] ) ? $params['layouts'] : array();
		$hover_animations = isset( $params['hover_animations'] ) ? $params['hover_animations'] : array();
		$exclude_option   = isset( $params['exclude_option'] ) ? $params['exclude_option'] : array();
		
		$map_for_page_builder = sizeof( $layouts ) > 1 ? true : false;
		
		$default_value = '';
		if ( ! empty ( $layouts ) ) {
			reset( $layouts );
			$default_value = key( $layouts );
		}
		
		$this->set_option( array(
			'field_type'    => 'select',
			'name'          => 'layout',
			'title'         => esc_html__( 'Item Layout', 'aperitif-core' ),
			'options'       => $layouts,
			'default_value' => $default_value,
			'group'         => esc_html__( 'Layout', 'aperitif-core' ),
			'visibility'    => array( 'map_for_page_builder' => $map_for_page_builder )
		) );
		
		if ( ! empty ( $hover_animations ) ) {
			foreach ( $hover_animations as $option ) {
				$this->set_option( $option );
			}
		}
		
		if ( empty( $exclude_option ) || ( ! empty( $exclude_option ) && ! in_array( 'title_tag', $exclude_option ) ) ) {
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'title_tag',
				'title'         => esc_html__( 'Title Tag', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'title_tag' ),
				'default_value' => 'h4',
				'group'         => esc_html__( 'Layout', 'aperitif-core' )
			) );
		}
		if ( empty( $exclude_option ) || ( ! empty( $exclude_option ) && ! in_array( 'text_transform', $exclude_option ) ) ) {
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'text_transform',
				'title'      => esc_html__( 'Title Text Transform', 'aperitif-core' ),
				'options'    => aperitif_core_get_select_type_options_pool( 'text_transform' ),
				'group'      => esc_html__( 'Layout', 'aperitif-core' )
			) );
		}
	}
	
	public function map_additional_options() {
		
		$exclude_filter     = isset( $params['exclude_filter'] ) ? (bool) $params['exclude_filter'] : false;
		$exclude_pagination = isset( $params['exclude_pagination'] ) ? (bool) $params['exclude_pagination'] : false;
		
		$this->set_option( array(
			'field_type'    => 'select',
			'name'          => 'skin',
			'title'         => esc_html__( 'Set Skin', 'aperitif-core' ),
			'options'       => aperitif_core_get_select_type_options_pool( 'skin' ),
			'default_value' => 'default',
			'group'         => esc_html__( 'Additional', 'aperitif-core' )
		) );
		
		if ( ! $exclude_filter ) {
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'enable_filter',
				'title'         => esc_html__( 'Enable Filter', 'aperitif-core' ),
				'description'   => esc_html__( 'Enabling this option will show categories filer feature above list', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'no_yes' ),
				'default_value' => '',
				'group'         => esc_html__( 'Additional', 'aperitif-core' )
			) );
		}
		
		if ( ! $exclude_pagination ) {
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'pagination_type',
				'title'         => esc_html__( 'Pagination', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'pagination_type' ),
				'default_value' => 'no-pagination',
				'group'         => esc_html__( 'Additional', 'aperitif-core' )
			) );
			
			$this->set_option( array(
				'field_type'    => 'text',
				'name'          => 'pagination_type_load_more_top_margin',
				'title'         => esc_html__( 'Load More Top Margin (px or %)', 'aperitif-core' ),
				'default_value' => '',
				'group'         => esc_html__( 'Additional', 'aperitif-core' ),
				'dependency'    => array(
					'show' => array(
						'pagination_type' => array(
							'values'        => 'load-more',
							'default_value' => ''
						)
					)
				)
			) );
		}
	}
	
	public function map_extra_options() {
		$extra_options = $this->get_extra_options();
		
		if ( ! empty ( $extra_options ) ) {
			foreach ( $extra_options as $option ) {
				$this->set_option( $option );
			}
		}
	}
	
	public function load_assets() {
		do_action( 'aperitif_core_action_list_shortcodes_load_assets', $this->get_atts() );
	}
	
	public function render( $options, $content = null ) {
		parent::render( $options );
		
		$atts                                         = $this->get_atts();
		$atts['pagination_type_load_more_top_margin'] = ! empty( $atts['pagination_type_load_more_top_margin'] ) ? 'margin-top:' . $atts['pagination_type_load_more_top_margin'] : '';
		$this->set_option_atts( $atts );
	}
}