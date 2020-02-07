<?php

if ( ! function_exists( 'aperitif_core_add_page_sidebar_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function aperitif_core_add_page_sidebar_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope'       => APERITIF_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'sidebar',
				'icon'        => 'fa fa-book',
				'title'       => esc_html__( 'Sidebar', 'aperitif-core' ),
				'description' => esc_html__( 'Global settings related to page sidebar', 'aperitif-core' )
			)
		);
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'select',
					'name'          => 'qodef_page_sidebar_layout',
					'title'         => esc_html__( 'Sidebar Layout', 'aperitif-core' ),
					'description'   => esc_html__( 'Choose default sidebar layout for pages', 'aperitif-core' ),
					'options'       => aperitif_core_get_select_type_options_pool( 'sidebar_layouts', false ),
					'default_value' => 'no-sidebar'
				)
			);
			
			$custom_sidebars = aperitif_core_get_custom_sidebars();
			if ( ! empty( $custom_sidebars ) && count( $custom_sidebars ) > 1 ) {
				$page->add_field_element(
					array(
						'field_type'  => 'select',
						'name'        => 'qodef_page_custom_sidebar',
						'title'       => esc_html__( 'Custom Sidebar', 'aperitif-core' ),
						'description' => esc_html__( 'Choose a custom sidebar to display on pages', 'aperitif-core' ),
						'options'     => $custom_sidebars
					)
				);
			}
			
			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_page_sidebar_grid_gutter',
					'title'       => esc_html__( 'Set Grid Gutter', 'aperitif-core' ),
					'description' => esc_html__( 'Choose grid gutter size to set space between content and sidebar', 'aperitif-core' ),
					'options'     => aperitif_core_get_select_type_options_pool( 'items_space' )
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'aperitif_core_action_after_page_sidebar_options_map', $page );
		}
	}
	
	add_action( 'aperitif_core_action_default_options_init', 'aperitif_core_add_page_sidebar_options', aperitif_core_get_admin_options_map_position( 'sidebar' ) );
}