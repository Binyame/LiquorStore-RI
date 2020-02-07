<?php

if ( ! function_exists( 'aperitif_core_add_restaurant_menu_meta_box' ) ) {
	/**
	 * Function that adds fields for restaurant-menu
	 */
	function aperitif_core_add_restaurant_menu_meta_box() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'restaurant-menu' ),
				'type'  => 'meta',
				'slug'  => 'restaurant-menu',
				'title' => esc_html__( 'Restaurant Menu Parameters', 'aperitif-core' )
			)
		);
		
		if ( $page ) {
			
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_restaurant_menu_item_price',
					'title'      => esc_html__( 'Restaurant Menu Item Price', 'aperitif-core' ),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type' => 'text',
					'name'       => 'qodef_restaurant_menu_item_description',
					'title'      => esc_html__( 'Restaurant Menu Item Description', 'aperitif-core' ),
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'aperitif_core_action_after_restaurant_menu_meta_box_map', $page );
		}
	}
	
	add_action( 'aperitif_core_action_default_meta_boxes_init', 'aperitif_core_add_restaurant_menu_meta_box' );
}