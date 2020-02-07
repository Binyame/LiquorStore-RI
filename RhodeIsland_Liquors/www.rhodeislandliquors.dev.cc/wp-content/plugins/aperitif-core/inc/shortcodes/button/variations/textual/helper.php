<?php

if ( ! function_exists( 'aperitif_core_add_button_variation_textual' ) ) {
	function aperitif_core_add_button_variation_textual( $variations ) {
		
		$variations['textual'] = esc_html__( 'Textual', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_button_layouts', 'aperitif_core_add_button_variation_textual' );
}
