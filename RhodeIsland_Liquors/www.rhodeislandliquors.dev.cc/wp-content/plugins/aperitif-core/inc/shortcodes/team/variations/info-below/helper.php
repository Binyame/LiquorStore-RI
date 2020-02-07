<?php

if ( ! function_exists( 'aperitif_core_add_team_variation_info_below' ) ) {
	function aperitif_core_add_team_variation_info_below( $variations ) {
		
		$variations['info-below'] = esc_html__( 'Info below', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_team_layouts', 'aperitif_core_add_team_variation_info_below' );
}
