<?php

if ( ! function_exists( 'aperitif_core_add_separator_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function aperitif_core_add_separator_widget( $widgets ) {
		$widgets[] = 'AperitifCoreSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'aperitif_core_filter_register_widgets', 'aperitif_core_add_separator_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AperitifCoreSeparatorWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'aperitif_core_separator'
			) );
			if ( $widget_mapped ) {
				$this->set_base( 'aperitif_core_separator' );
				$this->set_name( esc_html__( 'Aperitif Separator', 'aperitif-core' ) );
				$this->set_description( esc_html__( 'Add a separator element into widget areas', 'aperitif-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[aperitif_core_separator $params]" ); // XSS OK
		}
	}
}