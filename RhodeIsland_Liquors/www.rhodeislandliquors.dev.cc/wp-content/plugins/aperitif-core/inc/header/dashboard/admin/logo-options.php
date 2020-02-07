<?php

if ( ! function_exists( 'aperitif_core_add_logo_options' ) ) {
	function aperitif_core_add_logo_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope'       => APERITIF_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'logo',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Logo', 'aperitif-core' ),
				'description' => esc_html__( 'Logo Settings', 'aperitif-core' ),
				'layout'      => 'tabbed'
			)
		);
		
		if ( $page ) {
			
			$header_tab = $page->add_tab_element(
				array(
					'name'        => 'tab-header',
					'icon'        => 'fa fa-cog',
					'title'       => esc_html__( 'Header Logo Options', 'aperitif-core' ),
					'description' => esc_html__( 'Set options for initial headers', 'aperitif-core' )
				)
			);
			
			$header_tab->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_logo_height',
					'title'       => esc_html__( 'Logo Height', 'aperitif-core' ),
					'description' => esc_html__( 'Enter Logo Height', 'aperitif-core' ),
					'args'        => array(
						'suffix' => 'px'
					)
				)
			);
			
			$header_tab->add_field_element(
				array(
					'field_type'    => 'image',
					'name'          => 'qodef_logo_main',
					'title'         => esc_html__( 'Logo - Main', 'aperitif-core' ),
					'description'   => esc_html__( 'Choose main logo image', 'aperitif-core' ),
					'default_value' => defined( 'APERITIF_ASSETS_ROOT' ) ? APERITIF_ASSETS_ROOT . '/img/logo.png' : '',
					'multiple'      => 'no'
				)
			);
			
			$header_tab->add_field_element(
				array(
					'field_type'    => 'image',
					'name'          => 'qodef_logo_dark',
					'title'         => esc_html__( 'Logo - Dark', 'aperitif-core' ),
					'description'   => esc_html__( 'Choose dark logo image', 'aperitif-core' ),
					'default_value' => defined( 'APERITIF_ASSETS_ROOT' ) ? APERITIF_ASSETS_ROOT . '/img/logo-dark.png' : '',
					'multiple'      => 'no'
				)
			);
			
			$header_tab->add_field_element(
				array(
					'field_type'    => 'image',
					'name'          => 'qodef_logo_light',
					'title'         => esc_html__( 'Logo - Light', 'aperitif-core' ),
					'description'   => esc_html__( 'Choose light logo image', 'aperitif-core' ),
					'default_value' => defined( 'APERITIF_ASSETS_ROOT' ) ? APERITIF_ASSETS_ROOT . '/img/logo-light.png' : '',
					'multiple'      => 'no'
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'aperitif_core_action_after_header_logo_options_map', $page, $header_tab );
		}
	}
	
	add_action( 'aperitif_core_action_default_options_init', 'aperitif_core_add_logo_options', aperitif_core_get_admin_options_map_position( 'logo' ) );
}