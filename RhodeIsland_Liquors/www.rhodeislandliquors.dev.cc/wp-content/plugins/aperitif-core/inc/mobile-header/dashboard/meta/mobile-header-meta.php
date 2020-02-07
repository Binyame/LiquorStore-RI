<?php

if ( ! function_exists( 'aperitif_core_add_page_mobile_header_meta_box' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function aperitif_core_add_page_mobile_header_meta_box( $page ) {
		
		if ( $page ) {
			
			$mobile_header_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-mobile-header',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Mobile Header Settings', 'aperitif-core' ),
					'description' => esc_html__( 'Mobile header layout settings', 'aperitif-core' )
				)
			);
			
			$mobile_header_tab->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_mobile_header_layout',
					'title'       => esc_html__( 'Mobile Header Layout', 'aperitif-core' ),
					'description' => esc_html__( 'Choose mobile header layout to set for your site', 'aperitif-core' ),
					'args'        => array( 'images' => true ),
					'options'     => aperitif_core_header_radio_to_select_options( apply_filters( 'aperitif_core_filter_mobile_header_layout_option', $mobile_header_layout_options = array() ) )
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'aperitif_core_action_after_page_mobile_header_meta_map', $mobile_header_tab );
		}
	}
	
	add_action( 'aperitif_core_action_after_general_meta_box_map', 'aperitif_core_add_page_mobile_header_meta_box' );
	add_action( 'aperitif_core_action_after_portfolio_meta_box_map', 'aperitif_core_add_page_mobile_header_meta_box' );
}