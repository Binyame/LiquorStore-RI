<?php
if ( ! function_exists( 'aperitif_core_add_tribe_events_list_variation_info_right' ) ) {
	function aperitif_core_add_tribe_events_list_variation_info_right( $variations ) {
		$variations['simple'] = esc_html__( 'Simple', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_tribe_events_list_layouts', 'aperitif_core_add_tribe_events_list_variation_info_right' );
}