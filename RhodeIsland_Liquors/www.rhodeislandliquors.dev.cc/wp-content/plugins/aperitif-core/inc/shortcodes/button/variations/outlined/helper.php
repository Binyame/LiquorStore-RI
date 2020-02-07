<?php

if ( ! function_exists( 'aperitif_core_add_button_variation_outlined' ) ) {
	function aperitif_core_add_button_variation_outlined( $variations ) {
		
		$variations['outlined'] = esc_html__( 'Outlined', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_button_layouts', 'aperitif_core_add_button_variation_outlined' );
}
