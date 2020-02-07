<?php

if ( ! function_exists( 'aperitif_core_add_header_options' ) ) {
	/**
	 * Function that add header options for this module
	 */
	function aperitif_core_add_header_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope'       => APERITIF_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'header',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Header', 'aperitif-core' ),
				'description' => esc_html__( 'Header Settings', 'aperitif-core' )
			)
		);
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'radio',
					'name'          => 'qodef_header_layout',
					'title'         => esc_html__( 'Header Layout', 'aperitif-core' ),
					'description'   => esc_html__( 'Choose header layout to set for your site', 'aperitif-core' ),
					'args'          => array( 'images' => true ),
					'options'       => apply_filters( 'aperitif_core_filter_header_layout_option', $header_layout_options = array() ),
					'default_value' => apply_filters( 'aperitif_core_filter_header_layout_default_option_value', '' ),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_header_skin',
					'title'       => esc_html__( 'Header Skin', 'aperitif-core' ),
					'description' => esc_html__( 'Choose a predefined header style for header elements', 'aperitif-core' ),
					'options'     => array(
						''      => esc_html__( 'Default', 'aperitif-core' ),
						'light' => esc_html__( 'Light', 'aperitif-core' ),
						'dark'  => esc_html__( 'Dark', 'aperitif-core' )
					)
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'select',
					'name'        => 'qodef_header_scroll_appearance',
					'title'       => esc_html__( 'Header Scroll Appearance', 'aperitif-core' ),
					'description' => esc_html__( 'Choose how header will act on scroll', 'aperitif-core' ),
					'options'     => apply_filters( 'aperitif_core_filter_header_scroll_appearance_option', $header_scroll_appearance_options = array( 'none' => esc_html__( 'None', 'aperitif-core' ) ) )
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'aperitif_core_action_after_header_options_map', $page );
		}
	}
	
	add_action( 'aperitif_core_action_default_options_init', 'aperitif_core_add_header_options', aperitif_core_get_admin_options_map_position( 'header' ) );
}