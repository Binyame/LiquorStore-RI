<?php

if ( ! function_exists( 'aperitif_core_add_banner_variation_type_1' ) ) {
	function aperitif_core_add_banner_variation_type_1( $variations ) {
		
		$variations['type-1'] = esc_html__( 'Type 1', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_banner_layouts', 'aperitif_core_add_banner_variation_type_1' );
}
