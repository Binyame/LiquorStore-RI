<?php

if ( ! function_exists( 'aperitif_core_add_image_with_text_variation_text_below' ) ) {
	function aperitif_core_add_image_with_text_variation_text_below( $variations ) {
		
		$variations['text-below'] = esc_html__( 'Text Below', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_image_with_text_layouts', 'aperitif_core_add_image_with_text_variation_text_below' );
}
