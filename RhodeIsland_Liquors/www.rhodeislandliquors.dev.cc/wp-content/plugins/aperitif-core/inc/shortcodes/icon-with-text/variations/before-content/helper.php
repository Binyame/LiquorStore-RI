<?php

if ( ! function_exists( 'aperitif_core_add_icon_with_text_variation_before_content' ) ) {
	function aperitif_core_add_icon_with_text_variation_before_content( $variations ) {
		
		$variations['before-content'] = esc_html__( 'Before Content', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_icon_with_text_layouts', 'aperitif_core_add_icon_with_text_variation_before_content' );
}
