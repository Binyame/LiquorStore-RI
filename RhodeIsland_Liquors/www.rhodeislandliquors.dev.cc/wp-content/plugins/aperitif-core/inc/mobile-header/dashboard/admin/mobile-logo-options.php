<?php

if ( ! function_exists( 'aperitif_core_add_mobile_logo_options' ) ) {
	/**
	 * Function that add mobile header options for this module
	 */
	function aperitif_core_add_mobile_logo_options( $page, $header_tab ) {
		
		if ( $page ) {
			
			$mobile_header_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-mobile-header',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Mobile Header Logo Options', 'aperitif-core' ),
					'description' => esc_html__( 'Set options for mobile headers', 'aperitif-core' )
				)
			);
			
			$mobile_header_tab->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_mobile_logo_height',
					'title'       => esc_html__( 'Mobile Logo Height', 'aperitif-core' ),
					'description' => esc_html__( 'Enter mobile logo height', 'aperitif-core' ),
					'args'        => array(
						'suffix' => 'px'
					)
				)
			);
			
			$mobile_header_tab->add_field_element(
				array(
					'field_type'    => 'image',
					'name'          => 'qodef_mobile_logo_main',
					'title'         => esc_html__( 'Mobile Logo - Main', 'aperitif-core' ),
					'description'   => esc_html__( 'Choose main mobile logo image', 'aperitif-core' ),
					'default_value' => defined( 'APERITIF_ASSETS_ROOT' ) ? APERITIF_ASSETS_ROOT . '/img/logo.png' : '',
					'multiple'      => 'no'
				)
			);
			
			do_action( 'aperitif_core_action_after_mobile_logo_options_map', $page );
		}
	}
	
	add_action( 'aperitif_core_action_after_header_logo_options_map', 'aperitif_core_add_mobile_logo_options', 10, 2 );
}