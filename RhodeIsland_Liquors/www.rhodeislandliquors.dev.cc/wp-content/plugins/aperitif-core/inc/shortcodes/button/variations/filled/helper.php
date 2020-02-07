<?php

if ( ! function_exists( 'aperitif_core_add_button_variation_filled' ) ) {
	function aperitif_core_add_button_variation_filled( $variations ) {
		
		$variations['filled'] = esc_html__( 'Filled', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_button_layouts', 'aperitif_core_add_button_variation_filled' );
}
