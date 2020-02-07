<?php

if ( ! function_exists( 'aperitif_core_add_image_marquee_variation_default' ) ) {
	function aperitif_core_add_image_marquee_variation_default( $variations ) {
		$variations['default'] = esc_html__( 'Default', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_image_marquee_layouts', 'aperitif_core_add_image_marquee_variation_default' );
}
