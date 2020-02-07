<?php

if ( ! function_exists( 'aperitif_core_add_dropcaps_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function aperitif_core_add_dropcaps_shortcode( $shortcodes ) {
		$shortcodes[] = 'AperitifCoreDropcapsShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'aperitif_core_filter_register_shortcodes', 'aperitif_core_add_dropcaps_shortcode' );
}

if ( class_exists( 'AperitifCoreShortcode' ) ) {
	class AperitifCoreDropcapsShortcode extends AperitifCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( APERITIF_CORE_SHORTCODES_URL_PATH . '/dropcaps' );
			$this->set_base( 'aperitif_core_dropcaps' );
			$this->set_name( esc_html__( 'Dropcaps', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays dropcaps with provided parameters', 'aperitif-core' ) );
			$this->set_category( esc_html__( 'Aperitif Core', 'aperitif-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'aperitif-core' ),
			) );
			$this->set_option( array(
				'field_type'    => 'select',
				'name'          => 'type',
				'title'         => esc_html__( 'Type', 'aperitif-core' ),
				'options'       => array(
					'simple' => esc_html__( 'Simple', 'aperitif-core' ),
					'circle' => esc_html__( 'Circle', 'aperitif-core' ),
					'square' => esc_html__( 'Square', 'aperitif-core' )
				),
				'default_value' => 'simple'
			) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'letter',
				'title'      => esc_html__( 'Letter', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'letter_color',
				'title'      => esc_html__( 'Letter Color', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'letter_background_color',
				'title'      => esc_html__( 'Letter Background Color', 'aperitif-core' ),
				'dependency' => array(
					'hide' => array(
						'type' => array(
							'values'        => 'simple',
							'default_value' => 'simple'
						)
					)
				)
			) );
			$this->set_option( array(
				'field_type' => 'textarea',
				'name'       => 'text',
				'title'      => esc_html__( 'Text', 'aperitif-core' )
			) );
			$this->set_option( array(
				'field_type' => 'color',
				'name'       => 'text_color',
				'title'      => esc_html__( 'Text Color', 'aperitif-core' )
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			$atts['letter_styles']  = $this->get_letter_styles( $atts );
			$atts['text_styles']    = $this->get_text_styles( $atts );
			
			return aperitif_core_get_template_part( 'shortcodes/dropcaps', 'templates/dropcaps', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-dropcaps';
			$holder_classes[] = ! empty( $atts['type'] ) ? 'qodef-type--' . $atts['type'] : '';
			
			return implode( ' ', $holder_classes );
		}
		
		private function get_letter_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['letter_color'] ) ) {
				$styles[] = 'color: ' . $atts['letter_color'];
			}
			
			if ( $atts['type'] !== 'simple' && ! empty( $atts['letter_background_color'] ) ) {
				$styles[] = 'background-color: ' . $atts['letter_background_color'];
			}
			
			return $styles;
		}
		
		private function get_text_styles( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['text_color'] ) ) {
				$styles[] = 'color: ' . $atts['text_color'];
			}
			
			return $styles;
		}
	}
}