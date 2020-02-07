<?php

if ( ! function_exists( 'aperitif_core_is_back_to_top_enabled' ) ) {
	function aperitif_core_is_back_to_top_enabled() {
		return aperitif_core_get_post_value_through_levels( 'qodef_back_to_top' ) !== 'no';
	}
}

if ( ! function_exists( 'aperitif_core_add_back_to_top_to_body_classes' ) ) {
	function aperitif_core_add_back_to_top_to_body_classes( $classes ) {
		$classes[] = aperitif_core_is_back_to_top_enabled() ? 'qodef-back-to-top--enabled' : '';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'aperitif_core_add_back_to_top_to_body_classes' );
}

if ( ! function_exists( 'aperitif_core_load_back_to_top' ) ) {
	/**
	 * Loads Back To Top HTML
	 */
	function aperitif_core_load_back_to_top() {
		
		if ( aperitif_core_is_back_to_top_enabled() ) {
			$parameters = array();
			
			aperitif_core_template_part( 'back-to-top', 'templates/back-to-top', '', $parameters );
		}
	}
	
	add_action( 'aperitif_action_before_wrapper_close_tag', 'aperitif_core_load_back_to_top' );
}