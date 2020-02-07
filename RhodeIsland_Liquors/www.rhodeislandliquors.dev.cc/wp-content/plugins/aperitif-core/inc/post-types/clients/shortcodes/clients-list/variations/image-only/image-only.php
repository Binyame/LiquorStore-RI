<?php

if ( ! function_exists( 'aperitif_core_add_clients_list_variation_image_only' ) ) {
	function aperitif_core_add_clients_list_variation_image_only( $variations ) {
		
		$variations['image-only'] = esc_html__( 'Image Only', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_clients_list_layouts', 'aperitif_core_add_clients_list_variation_image_only' );
}