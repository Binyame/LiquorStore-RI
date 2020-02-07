<?php

if ( ! function_exists( 'aperitif_core_add_call_to_action_variation_standard' ) ) {
	function aperitif_core_add_call_to_action_variation_standard( $variations ) {
		
		$variations['standard'] = esc_html__( 'Standard', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_call_to_action_layouts', 'aperitif_core_add_call_to_action_variation_standard' );
}
