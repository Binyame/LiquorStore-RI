<?php

if ( ! function_exists( 'aperitif_core_add_instagram_list_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function aperitif_core_add_instagram_list_widget( $widgets ) {
		$widgets[] = 'AperitifCoreInstagramListWidget';
		
		return $widgets;
	}
	
	add_filter( 'aperitif_core_filter_register_widgets', 'aperitif_core_add_instagram_list_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AperitifCoreInstagramListWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'widget_title',
					'title'      => esc_html__( 'Title', 'aperitif-core' )
				)
			);
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'aperitif_core_instagram_list'
			) );
			if ( $widget_mapped ) {
				$this->set_base( 'aperitif_core_instagram_list' );
				$this->set_name( esc_html__( 'Aperitif Instagram List', 'aperitif-core' ) );
				$this->set_description( esc_html__( 'Add a instagram list element into widget areas', 'aperitif-core' ) );
			}
		}
		
		public function render( $atts ) {
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[aperitif_core_instagram_list $params]" ); // XSS OK
		}
	}
}