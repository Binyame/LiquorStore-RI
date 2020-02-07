<?php

if ( ! function_exists( 'aperitif_core_add_social_share_variation_list' ) ) {
	function aperitif_core_add_social_share_variation_list( $variations ) {
		
		$variations['list'] = esc_html__( 'List', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_social_share_layouts', 'aperitif_core_add_social_share_variation_list' );
}
