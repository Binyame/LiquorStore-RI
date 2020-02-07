<?php

if ( ! function_exists( 'aperitif_core_add_twitter_list_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function aperitif_core_add_twitter_list_widget( $widgets ) {
		$widgets[] = 'AperitifCoreTwitterListWidget';
		
		return $widgets;
	}
	
	add_filter( 'aperitif_core_filter_register_widgets', 'aperitif_core_add_twitter_list_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AperitifCoreTwitterListWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_widget_option(
				array(
					'name'       => 'widget_title',
					'field_type' => 'text',
					'title'      => esc_html__( 'Title', 'aperitif-core' )
				)
			);
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'aperitif_core_twitter_list'
			) );
			if ( $widget_mapped ) {
				$this->set_base( 'aperitif_core_twitter_list' );
				$this->set_name( esc_html__( 'Aperitif Twitter List', 'aperitif-core' ) );
				$this->set_description( esc_html__( 'Add a twitter list element into widget areas', 'aperitif-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[aperitif_core_twitter_list $params]" ); // XSS OK
		}
	}
}