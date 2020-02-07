<?php

if ( ! function_exists( 'aperitif_core_add_restaurant_menu_list_variation_info_standard' ) ) {
	function aperitif_core_add_restaurant_menu_list_variation_info_standard( $variations ) {
		$variations['info-standard'] = esc_html__( 'Info Standard', 'aperitif-core' );
		
		return $variations;
	}
	
	add_filter( 'aperitif_core_filter_restaurant_menu_list_layouts', 'aperitif_core_add_restaurant_menu_list_variation_info_standard' );
}