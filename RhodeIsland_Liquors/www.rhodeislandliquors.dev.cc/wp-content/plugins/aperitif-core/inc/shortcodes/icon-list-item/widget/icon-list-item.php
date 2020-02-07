<?php

if ( ! function_exists( 'aperitif_core_add_icon_list_item_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function aperitif_core_add_icon_list_item_widget( $widgets ) {
		$widgets[] = 'AperitifCoreIconListItemWidget';
		
		return $widgets;
	}
	
	add_filter( 'aperitif_core_filter_register_widgets', 'aperitif_core_add_icon_list_item_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AperitifCoreIconListItemWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$widget_mapped = $this->import_shortcode_options( array(
				'shortcode_base' => 'aperitif_core_icon_list_item',
				'exclude'        => array(
					'icon_type',
					'custom_icon'
				)
			) );
			if ( $widget_mapped ) {
				$this->set_base( 'aperitif_core_icon_list_item' );
				$this->set_name( esc_html__( 'Aperitif Icon List Item', 'aperitif-core' ) );
				$this->set_description( esc_html__( 'Add a icon list item element into widget areas', 'aperitif-core' ) );
			}
		}
		
		public function render( $atts ) {
			
			$params = $this->generate_string_params( $atts );
			
			echo do_shortcode( "[aperitif_core_icon_list_item $params]" ); // XSS OK
		}
	}
}
