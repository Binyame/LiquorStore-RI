<?php

if ( ! function_exists( 'aperitif_core_add_custom_font_variation_simple' ) ) {
	function aperitif_core_add_custom_font_variation_simple( $variations ) {
		
		$variations['simple'] = esc_html__( 'Simple', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_custom_font_layouts', 'aperitif_core_add_custom_font_variation_simple' );
}
