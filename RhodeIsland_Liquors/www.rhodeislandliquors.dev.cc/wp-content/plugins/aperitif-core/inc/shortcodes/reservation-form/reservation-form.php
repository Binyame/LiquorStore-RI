<?php

if ( ! function_exists( 'aperitif_core_add_reservation_form_shortcode' ) ) {
	/**
	 * Function that add shortcode into shortcodes list for registration
	 *
	 * @param $shortcodes array
	 *
	 * @return array
	 */
	function aperitif_core_add_reservation_form_shortcode( $shortcodes ) {
		$shortcodes[] = 'AperitifCoreReservationFormShortcode';
		
		return $shortcodes;
	}
	
	add_filter( 'aperitif_core_filter_register_shortcodes', 'aperitif_core_add_reservation_form_shortcode', 9 );
}

if ( class_exists( 'AperitifCoreShortcode' ) ) {
	class AperitifCoreReservationFormShortcode extends AperitifCoreShortcode {
		
		public function map_shortcode() {
			$this->set_shortcode_path( APERITIF_CORE_SHORTCODES_URL_PATH . '/reservation-form' );
			$this->set_base( 'aperitif_core_reservation_form' );
			$this->set_name( esc_html__( 'ReservationForm', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Shortcode that displays reservation form with provided parameters', 'aperitif-core' ) );
			$this->set_category( esc_html__( 'Aperitif Core', 'aperitif-core' ) );
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'custom_class',
				'title'      => esc_html__( 'Custom Class', 'aperitif-core' ),
			) );
			
			$this->set_option( array(
				'field_type' => 'text',
				'name'       => 'open_table_id',
				'title'      => esc_html__( 'OpenTable ID', 'aperitif-core' ),
			) );
		}
		
		public function render( $options, $content = null ) {
			parent::render( $options );
			$atts = $this->get_atts();
			
			$atts['holder_classes'] = $this->get_holder_classes( $atts );
			
			return aperitif_core_get_template_part( 'shortcodes/reservation-form', 'templates/reservation-form', '', $atts );
		}
		
		private function get_holder_classes( $atts ) {
			$holder_classes = $this->init_holder_classes();
			
			$holder_classes[] = 'qodef-reservation-form';
			
			return implode( ' ', $holder_classes );
		}
	}
}