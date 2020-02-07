<?php

if ( ! function_exists( 'aperitif_core_add_product_list_shortcode' ) ) {
	/**
	 * Function that is adding shortcode into shortcodes list for registration
	 *
	 * @param array $shortcodes - Array of registered shortcodes
	 *
	 * @return array
	 */
	function aperitif_core_add_product_list_shortcode( $shortcodes ) {
		$shortcodes[] = 'AperitifCoreProductListShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'aperitif_core_filter_register_shortcodes', 'aperitif_core_add_product_list_shortcode' );
}

if ( class_exists( 'AperitifCoreListShortcode' ) ) {
	class AperitifCoreProductListShortcode extends AperitifCoreListShortcode {
		
		public function __construct() {
			$this->set_post_type( 'product' );
			$this->set_post_type_taxonomy( 'product_cat' );
			$this->set_layouts( apply_filters( 'aperitif_core_filter_product_list_layouts', array() ) );
			$this->set_extra_options( apply_filters( 'aperitif_core_filter_product_list_extra_options', array() ) );
			
			parent::__construct();
		}
		
		public function map_shortcode() {
			$this->set_shortcode_path( APERITIF_CORE_INC_URL_PATH . '/woocommerce/shortcodes/product-list' );
			$this->set_base( 'aperitif_core_product_list' );
			$this->set_name( esc_html__( 'Product List', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays list of products', 'aperitif-core' ) );
			$this->set_category( esc_html__( 'Aperitif Core', 'aperitif-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'aperitif-core' )
			) );
			$this->map_list_options();
			$this->map_query_options( array( 'post_type' => $this->get_post_type() ) );
			$this->map_layout_options( array( 'layouts' => $this->get_layouts() ) );
			$this->map_additional_options();
			$this->map_extra_options();
			$this->set_option( array(
				'field_type' => 'select',
				'name'       => 'image_opacity_hover',
				'title'      => esc_html__( 'Change Image Opacity on Hover', 'aperitif-core' ),
				'options'    => aperitif_core_get_select_type_options_pool( 'yes_no' ),
				'dependency' => array(
					'show' => array(
						'behavior' => array(
							'values'        => 'slider',
						)
					)
				),
			) );
		}
		
		public static function call_shortcode( $params ) {
			$html = qode_framework_call_shortcode( 'aperitif_core_product_list', $params );
			$html = str_replace( "\n", '', $html );
			
			return $html;
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			
			$atts = $this->get_atts();
			
			$atts['post_type']       = $this->get_post_type();
			$atts['taxonomy_filter'] = $this->get_post_type_taxonomy();
			
			// Additional query args
			$atts['additional_query_args'] = $this->get_additional_query_args( $atts );
			
			$atts['unique'] = wp_rand( 1000, 9999 );
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['query_result']   = new \WP_Query( aperitif_core_get_query_params( $atts ) );
			$atts['slider_attr']    = $this->get_slider_data( $atts, array(
				'unique'            => $atts['unique'],
				'outsideNavigation' => 'yes'
			) );
			$atts['title_styles']   = $this->get_title_styles( $atts );
			$atts['data_attr']      = aperitif_core_get_pagination_data( APERITIF_CORE_REL_PATH, 'woocommerce/shortcodes', 'product-list', 'product', $atts );
			
			$atts['this_shortcode'] = $this;
			
			return aperitif_core_get_template_part( 'woocommerce/shortcodes/product-list', 'templates/content', $atts['behavior'], $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-woo-shortcode';
			$holder_classes[] = 'qodef-woo-product-list';
			$holder_classes[] = ! empty( $atts['layout'] ) ? 'qodef-item-layout--' . $atts['layout'] : '';
			$holder_classes[] = ( $atts['image_opacity_hover'] === 'yes' ) ? 'qodef-image-opacity-hover' : '';
			
			$list_classes   = $this->get_list_classes( $atts );
			$holder_classes = array_merge( $holder_classes, $list_classes );
			
			return implode( ' ', $holder_classes );
		}
		
		public function get_item_classes( $atts ) {
			$item_classes      = $this->init_item_classes();
			$list_item_classes = $this->get_list_item_classes( $atts );
			
			$item_classes = array_merge( $item_classes, $list_item_classes );
			
			return implode( ' ', $item_classes );
		}
		
		private function get_title_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['text_transform'] ) ) {
				$styles[] = 'text-transform: ' . $atts['text_transform'];
			}
			
			return $styles;
		}
	}
}