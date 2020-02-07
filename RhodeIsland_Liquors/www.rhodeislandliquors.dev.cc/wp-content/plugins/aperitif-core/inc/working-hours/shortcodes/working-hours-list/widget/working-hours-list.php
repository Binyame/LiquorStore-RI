<?php

if ( ! function_exists( 'aperitif_core_add_working_hours_list_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function aperitif_core_add_working_hours_list_widget( $widgets ) {
		$widgets[] = 'AperitifCoreWorkingHoursListWidget';
		
		return $widgets;
	}
	
	add_filter( 'aperitif_core_filter_register_widgets', 'aperitif_core_add_working_hours_list_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AperitifCoreWorkingHoursListWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'widget_title',
					'title'      => esc_html__( 'Title', 'aperitif-core' )
				)
			);
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'aperitif_core_working_hours_list'
			) );
			if ( $widget_mapped ) {
				$this->set_base( 'aperitif_core_working_hours_list' );
				$this->set_name( esc_html__( 'Aperitif Working Hours List', 'aperitif-core' ) );
				$this->set_description( esc_html__( 'Add a working hours list element into widget areas', 'aperitif-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[aperitif_core_working_hours_list $params]" ); // XSS OK
		}
	}
}