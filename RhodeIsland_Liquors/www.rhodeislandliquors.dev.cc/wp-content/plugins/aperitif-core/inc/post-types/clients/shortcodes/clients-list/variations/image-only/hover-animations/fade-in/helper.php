<?php
if ( ! function_exists( 'aperitif_core_filter_clients_list_image_only_fade_in' ) ) {
	function aperitif_core_filter_clients_list_image_only_fade_in( $variations ) {
		
		$variations['fade-in'] = esc_html__( 'Fade In', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_clients_list_image_only_animation_options', 'aperitif_core_filter_clients_list_image_only_fade_in' );
}