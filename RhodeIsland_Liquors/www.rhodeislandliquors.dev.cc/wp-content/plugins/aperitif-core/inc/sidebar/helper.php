<?php

if ( ! function_exists( 'aperitif_core_set_custom_sidebar_name' ) ) {
	/**
	 * Function that return sidebar name
	 *
	 * @param $sidebar_name string
	 *
	 * @return string
	 */
	function aperitif_core_set_custom_sidebar_name( $sidebar_name ) {
		$option = aperitif_core_get_post_value_through_levels( 'qodef_page_custom_sidebar' );
		
		if ( ! empty( $option ) ) {
			$sidebar_name = $option;
		}
		
		return $sidebar_name;
	}
	
	add_filter( 'aperitif_filter_sidebar_name', 'aperitif_core_set_custom_sidebar_name', 5 ); // permission 5 is set to global option check be at the first place
}

if ( ! function_exists( 'aperitif_core_set_sidebar_layout' ) ) {
	/**
	 * Function that return sidebar layout
	 *
	 * @param $layout string
	 *
	 * @return string
	 */
	function aperitif_core_set_sidebar_layout( $layout ) {
		$option = aperitif_core_get_post_value_through_levels( 'qodef_page_sidebar_layout' );
		
		if ( ! empty( $option ) ) {
			$layout = $option;
		}
		
		return $layout;
	}
	
	add_filter( 'aperitif_filter_sidebar_layout', 'aperitif_core_set_sidebar_layout', 5 ); // permission 5 is set to global option check be at the first place
}

if ( ! function_exists( 'aperitif_core_set_sidebar_grid_gutter_classes' ) ) {
	/**
	 * Function that returns grid gutter classes
	 *
	 * @param $classes string
	 *
	 * @return string
	 */
	function aperitif_core_set_sidebar_grid_gutter_classes( $classes ) {
		$option = aperitif_core_get_post_value_through_levels( 'qodef_page_sidebar_grid_gutter' );
		
		if ( ! empty( $option ) ) {
			$classes = 'qodef-gutter--' . esc_attr( $option );
		}
		
		return $classes;
	}
	
	add_filter( 'aperitif_filter_grid_gutter_classes', 'aperitif_core_set_sidebar_grid_gutter_classes', 5 ); // permission 5 is set to global option check be at the first place
}