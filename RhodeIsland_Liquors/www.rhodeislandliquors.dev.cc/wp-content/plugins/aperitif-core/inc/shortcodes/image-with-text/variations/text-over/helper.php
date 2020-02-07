<?php

if ( ! function_exists( 'aperitif_core_add_image_with_text_variation_text_over' ) ) {
	function aperitif_core_add_image_with_text_variation_text_over( $variations ) {
		
		$variations['text-over'] = esc_html__( 'Text Over', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_image_with_text_layouts', 'aperitif_core_add_image_with_text_variation_text_over' );
}
