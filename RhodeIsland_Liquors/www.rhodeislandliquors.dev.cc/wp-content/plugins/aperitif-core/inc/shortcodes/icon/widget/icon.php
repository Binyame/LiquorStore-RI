<?php

if ( ! function_exists( 'aperitif_core_add_icon_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function aperitif_core_add_icon_widget( $widgets ) {
		$widgets[] = 'AperitifCoreIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'aperitif_core_filter_register_widgets', 'aperitif_core_add_icon_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AperitifCoreIconWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'aperitif_core_icon'
			) );
			if ( $widget_mapped ) {
				$this->set_base( 'aperitif_core_icon' );
				$this->set_name( esc_html__( 'Aperitif Icon', 'aperitif-core' ) );
				$this->set_description( esc_html__( 'Add a icon element into widget areas', 'aperitif-core' ) );
			}
		}
		
		public function render( $atts ) {
			
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[aperitif_core_icon $params]" ); // XSS OK
		}
	}
}
