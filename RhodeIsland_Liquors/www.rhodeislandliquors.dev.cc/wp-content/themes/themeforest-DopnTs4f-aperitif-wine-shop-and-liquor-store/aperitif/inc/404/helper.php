<?php

if ( ! function_exists( 'aperitif_set_404_page_inner_classes' ) ) {
	/**
	 * Function that return classes for the page inner div from header.php
	 *
	 * @param $classes string
	 *
	 * @return string
	 */
	function aperitif_set_404_page_inner_classes( $classes ) {
		
		if ( is_404() ) {
			$classes = 'qodef-content-full-width';
		}
		
		return $classes;
	}
	
	add_filter( 'aperitif_filter_page_inner_classes', 'aperitif_set_404_page_inner_classes' );
}

if ( ! function_exists( 'aperitif_get_404_page_parameters' ) ) {
	/**
	 * Function that set 404 page area content parameters
	 */
	function aperitif_get_404_page_parameters() {
		
		$params = array(
			'title'       => esc_html__( 'Error Page', 'aperitif' ),
			'text'        => esc_html__( 'Ut enim ad minim veniam, quis nostrud ullamco laboris', 'aperitif' ),
			'button_text' => esc_html__( 'Back to home', 'aperitif' )
		);
		
		return apply_filters( 'aperitif_filter_404_page_template_params', $params );
	}
}
