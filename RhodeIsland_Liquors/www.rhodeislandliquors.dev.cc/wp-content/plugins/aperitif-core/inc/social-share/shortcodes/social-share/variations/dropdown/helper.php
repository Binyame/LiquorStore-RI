<?php

if ( ! function_exists( 'aperitif_core_add_social_share_variation_dropdown' ) ) {
	function aperitif_core_add_social_share_variation_dropdown( $variations ) {
		
		$variations['dropdown'] = esc_html__( 'Dropdown', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_social_share_layouts', 'aperitif_core_add_social_share_variation_dropdown' );
}
