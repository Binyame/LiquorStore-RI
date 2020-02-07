<?php

if ( ! function_exists( 'aperitif_core_add_swapping_image_gallery_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function aperitif_core_add_swapping_image_gallery_shortcode( $shortcodes ) {
		$shortcodes[] = 'AperitifCoreSwappingImageGalleryShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'aperitif_core_filter_register_shortcodes', 'aperitif_core_add_swapping_image_gallery_shortcode' );
}

if ( class_exists( 'AperitifCoreShortcode' ) ) {
	class AperitifCoreSwappingImageGalleryShortcode extends AperitifCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( APERITIF_CORE_SHORTCODES_URL_PATH . '/swapping-image-gallery' );
			$this->set_base( 'aperitif_core_swapping_image_gallery' );
			$this->set_name( esc_html__( 'Swapping Image Gallery', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds swapping image gallery holder', 'aperitif-core' ) );
			$this->set_category( esc_html__( 'Aperitif Core', 'aperitif-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'aperitif-core' ),
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'link_target',
				'title'         => esc_html__( 'Link Target', 'aperitif-core' ),
				'options'       => aperitif_core_get_select_type_options_pool( 'link_target' ),
				'default_value' => '_self'
			) );
			$this->set_option( array(
				'field_type' => 'repeater',
				'name'       => 'children',
				'title'      => esc_html__( 'Image Items', 'aperitif-core' ),
				'items'      => array(
					array(
						'field_type' => 'image',
						'name'       => 'main_image',
						'title'      => esc_html__( 'Main Image', 'aperitif-core' )
					),
					array(
						'field_type'    => 'text',
						'name'          => 'item_link',
						'title'         => esc_html__( 'Main Image Link', 'aperitif-core' ),
						'default_value' => ''
					),
					array(
						'field_type' => 'image',
						'name'       => 'thumbnail_image',
						'title'      => esc_html__( 'Thumbnail Image', 'aperitif-core' )
					),
					array(
						'field_type'    => 'text',
						'name'          => 'item_text',
						'title'         => esc_html__( 'Thumbnail Text', 'aperitif-core' ),
						'default_value' => ''
					),
				)
			) );
			$this->map_extra_options();
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['items']          = $this->parse_repeater_items( $atts['children'] );
			$atts['slider_data']    = $this->get_slider_data();
			$atts['this_shortcode'] = $this;
			
			return aperitif_core_get_template_part( 'shortcodes/swapping-image-gallery', 'templates/swapping-image-gallery', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-swapping-image-gallery';
			$holder_classes[] = 'qodef-info-position--left';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_slider_data() {
			$data = array();
			
			$data['slidesPerView'] = '1';
			$data['spaceBetween']  = 0;
			$data['autoplay']      = false;
			
			return json_encode( $data );
		}
	}
}