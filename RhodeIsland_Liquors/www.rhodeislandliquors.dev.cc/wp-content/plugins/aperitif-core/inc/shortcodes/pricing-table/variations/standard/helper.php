<?php

if ( ! function_exists( 'aperitif_core_add_pricing_table_variation_standard' ) ) {
	function aperitif_core_add_pricing_table_variation_standard( $variations ) {
		
		$variations['standard'] = esc_html__( 'Standard', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_pricing_table_layouts', 'aperitif_core_add_pricing_table_variation_standard' );
}
