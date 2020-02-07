<?php

if ( ! function_exists( 'aperitif_core_add_social_share_variation_text' ) ) {
	function aperitif_core_add_social_share_variation_text( $variations ) {
		
		$variations['text'] = esc_html__( 'Text', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_social_share_layouts', 'aperitif_core_add_social_share_variation_text' );
}
