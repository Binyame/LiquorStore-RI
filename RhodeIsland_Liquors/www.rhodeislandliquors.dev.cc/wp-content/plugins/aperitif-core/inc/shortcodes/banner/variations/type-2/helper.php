<?php

if ( ! function_exists( 'aperitif_core_add_banner_variation_type_2' ) ) {
	function aperitif_core_add_banner_variation_type_2( $variations ) {
		
		$variations['type-2'] = esc_html__( 'Type 2', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_banner_layouts', 'aperitif_core_add_banner_variation_type_2' );
}
