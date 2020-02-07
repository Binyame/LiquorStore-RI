<?php

if ( ! function_exists( 'aperitif_core_add_video_button_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function aperitif_core_add_video_button_shortcode( $shortcodes ) {
		$shortcodes[] = 'AperitifCoreVideoButton';
		
		return $shortcodes;
	}
	
	add_filter( 'aperitif_core_filter_register_shortcodes', 'aperitif_core_add_video_button_shortcode' );
}

if ( class_exists( 'AperitifCoreShortcode' ) ) {
	class AperitifCoreVideoButton extends AperitifCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( APERITIF_CORE_SHORTCODES_URL_PATH . '/video-button' );
			$this->set_base( 'aperitif_core_video_button' );
			$this->set_name( esc_html__( 'Video Button', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Shortcode that adds video button element', 'aperitif-core' ) );
			$this->set_category( esc_html__( 'Aperitif Core', 'aperitif-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'aperitif-core' ),
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'video_link',
				'title'      => esc_html__( 'Video Link', 'aperitif-core' ),
			) );
			$this->set_option( array(
				'field_type'  => 'image',
				'name'        => 'video_image',
				'title'       => esc_html__( 'Image', 'aperitif-core' ),
				'description' => esc_html__( 'Select image from media library', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'video_title',
				'title'      => esc_html__( 'Video Title', 'aperitif-core' )
			
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'video_subtitle',
				'title'      => esc_html__( 'Video Subtitle', 'aperitif-core' )
			
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'play_button_color',
				'title'      => esc_html__( 'Play Button Color', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'play_button_size',
				'title'      => esc_html__( 'Play Button Size (px)', 'aperitif-core' )
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes']     = $this->get_holder_classes( $atts );
			$atts['play_button_styles'] = $this->get_play_button_styles( $atts );
			
			return aperitif_core_get_template_part( 'shortcodes/video-button', 'templates/video-button', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-video-button';
			$holder_classes[] = ! empty( $atts['custom_class'] ) ? esc_attr( $atts['custom_class'] ) : '';
			$holder_classes[] = ! empty( $params['video_image'] ) ? 'qodef-vb-has-img' : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_play_button_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['play_button_color'] ) ) {
				$styles[] = 'color: ' . $atts['play_button_color'];
			}
			
			if ( ! empty( $atts['play_button_size'] ) ) {
				$styles[] = 'font-size: ' . intval( $atts['play_button_size'] ) . 'px';
			}
			
			return implode( ';', $styles );
		}
	}
}