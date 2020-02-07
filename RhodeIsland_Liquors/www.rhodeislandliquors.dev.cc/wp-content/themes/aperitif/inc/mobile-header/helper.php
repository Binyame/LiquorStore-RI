<?php

if ( ! function_exists( 'aperitif_load_page_mobile_header' ) ) {
	/**
	 * Function which loads page template module
	 */
	function aperitif_load_page_mobile_header() {
		// Include mobile header template
		echo apply_filters( 'aperitif_filter_mobile_header_template', aperitif_get_template_part( 'mobile-header', 'templates/mobile-header' ) );
	}
	
	add_action( 'aperitif_action_page_header_template', 'aperitif_load_page_mobile_header' );
}

if ( ! function_exists( 'aperitif_register_mobile_navigation_menus' ) ) {
	/**
	 * Function which registers navigation menus
	 */
	function aperitif_register_mobile_navigation_menus() {
		$navigation_menus = apply_filters( 'aperitif_filter_register_mobile_navigation_menus', array( 'mobile-navigation' => esc_html__( 'Mobile Navigation', 'aperitif' ) ) );
		
		if ( ! empty( $navigation_menus ) ) {
			register_nav_menus( $navigation_menus );
		}
	}
	
	add_action( 'aperitif_action_after_include_modules', 'aperitif_register_mobile_navigation_menus' );
}