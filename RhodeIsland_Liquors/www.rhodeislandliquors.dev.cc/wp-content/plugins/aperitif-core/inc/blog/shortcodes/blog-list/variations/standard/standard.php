<?php

if ( ! function_exists( 'aperitif_core_add_blog_list_variation_standard' ) ) {
	function aperitif_core_add_blog_list_variation_standard( $variations ) {
		$variations['standard'] = esc_html__( 'Standard', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_blog_list_layouts', 'aperitif_core_add_blog_list_variation_standard' );
}

if ( ! function_exists( 'aperitif_core_load_blog_list_variation_standard_assets' ) ) {
	function aperitif_core_load_blog_list_variation_standard_assets( $is_enabled, $params ) {
		
		if ( $params['layout'] === 'standard' ) {
			$is_enabled = true;
		}
		
		return $is_enabled;
	}
	
	add_filter( 'aperitif_core_filter_load_blog_list_assets', 'aperitif_core_load_blog_list_variation_standard_assets', 10, 2 );
}