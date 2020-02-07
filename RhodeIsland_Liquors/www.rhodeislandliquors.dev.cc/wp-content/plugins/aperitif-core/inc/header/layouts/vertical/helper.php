<?php

if ( ! function_exists( 'aperitif_core_add_vertical_header_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function aperitif_core_add_vertical_header_global_option( $header_layout_options ) {
		$header_layout_options['vertical'] = array(
			'image' => APERITIF_CORE_HEADER_LAYOUTS_URL_PATH . '/vertical/assets/img/vertical-header.png',
			'label' => esc_html__( 'Vertical', 'aperitif-core' )
		);
		
		return $header_layout_options;
	}
	
	add_filter( 'aperitif_core_filter_header_layout_option', 'aperitif_core_add_vertical_header_global_option' );
}

if ( ! function_exists( 'aperitif_core_register_vertical_header_layout' ) ) {
	function aperitif_core_register_vertical_header_layout( $header_layouts ) {
		$header_layout = array(
			'vertical' => 'VerticalHeader'
		);
		
		$header_layouts = array_merge( $header_layouts, $header_layout );
		
		return $header_layouts;
	}
	
	add_filter( 'aperitif_core_filter_register_header_layouts', 'aperitif_core_register_vertical_header_layout' );
}

if ( ! function_exists( 'aperitif_core_vertical_header_hide_top_area' ) ) {
	function aperitif_core_vertical_header_hide_top_area( $array ) {
		$array[] = 'vertical';
		
		return $array;
	}
	
	add_filter( 'aperitif_core_filter_top_area_hide_option', 'aperitif_core_vertical_header_hide_top_area' );
}

if ( ! function_exists( 'aperitif_core_vertical_header_nav_menu_grid' ) ) {
	function aperitif_core_vertical_header_nav_menu_grid( $grid_class ) {
		$header = aperitif_core_get_post_value_through_levels( 'qodef_header_layout' );
		
		if ( $header == 'vertical' ) {
			return false;
		}
		
		return $grid_class;
	}
	
	add_filter( 'aperitif_core_filter_drop_down_grid', 'aperitif_core_vertical_header_nav_menu_grid' );
}

if ( ! function_exists( 'aperitif_core_register_vertical_menu' ) ) {
	function aperitif_core_register_vertical_menu( $menus ) {
		
		$menus['vertical-menu-navigation'] = esc_html__( 'Vertical Navigation', 'aperitif-core' );
		
		return $menus;
	}
	
	add_filter( 'aperitif_filter_register_navigation_menus', 'aperitif_core_register_vertical_menu' );
}