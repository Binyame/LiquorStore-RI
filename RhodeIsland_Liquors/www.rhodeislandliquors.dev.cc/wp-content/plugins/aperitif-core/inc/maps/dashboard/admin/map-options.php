<?php

if ( ! function_exists( 'aperitif_core_add_map_options' ) ) {
	/**
	 * Function that add map options
	 */
	function aperitif_core_add_map_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope'       => APERITIF_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'map',
				'icon'        => 'fa fa-book',
				'title'       => esc_html__( 'Maps', 'aperitif-core' ),
				'description' => esc_html__( 'Global settings related to maps', 'aperitif-core' )
			)
		);
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_maps_api_key',
					'title'       => esc_html__( 'Maps API Key', 'aperitif-core' ),
					'description' => esc_html__( 'Enter Google Maps api key', 'aperitif-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'textarea',
					'name'        => 'qodef_map_style',
					'title'       => esc_html__( 'Map Style', 'aperitif-core' ),
					'description' => esc_html__( 'Enter snazzy map style json code', 'aperitif-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_map_zoom',
					'title'       => esc_html__( 'Map Zoom', 'aperitif-core' ),
					'description' => esc_html__( 'Enter default zoom value for map', 'aperitif-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_scroll',
					'title'         => esc_html__( 'Enable Map Scroll', 'aperitif-core' ),
					'description'   => esc_html__( 'Use this option to enable map scrolling', 'aperitif-core' ),
					'default_value' => 'no'
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_drag',
					'title'         => esc_html__( 'Enable Map Dragging', 'aperitif-core' ),
					'description'   => esc_html__( 'Use this option to enable map dragging', 'aperitif-core' ),
					'default_value' => 'yes'
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_street_view_control',
					'title'         => esc_html__( 'Enable Map Street View Control', 'aperitif-core' ),
					'description'   => esc_html__( 'Use this option to enable street view control on map', 'aperitif-core' ),
					'default_value' => 'yes'
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_zoom_control',
					'title'         => esc_html__( 'Enable Map Zoom Control', 'aperitif-core' ),
					'description'   => esc_html__( 'Use this option to enable zoom control on map', 'aperitif-core' ),
					'default_value' => 'yes'
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_type_control',
					'title'         => esc_html__( 'Enable Map Type Control', 'aperitif-core' ),
					'description'   => esc_html__( 'Use this option to enable type control on map', 'aperitif-core' ),
					'default_value' => 'yes'
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_map_full_screen_control',
					'title'         => esc_html__( 'Enable Map Full Screen Control', 'aperitif-core' ),
					'description'   => esc_html__( 'Use this option to enable full screen control on map', 'aperitif-core' ),
					'default_value' => 'yes'
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'aperitif_core_action_after_map_options_map', $page );
		}
	}
	
	add_action( 'aperitif_core_action_default_options_init', 'aperitif_core_add_map_options', aperitif_core_get_admin_options_map_position( 'maps' ) );
}