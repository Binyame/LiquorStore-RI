<?php

if ( ! function_exists( 'aperitif_core_add_icon_with_text_variation_before_title' ) ) {
	function aperitif_core_add_icon_with_text_variation_before_title( $variations ) {
		
		$variations['before-title'] = esc_html__( 'Before Title', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_icon_with_text_layouts', 'aperitif_core_add_icon_with_text_variation_before_title' );
}
