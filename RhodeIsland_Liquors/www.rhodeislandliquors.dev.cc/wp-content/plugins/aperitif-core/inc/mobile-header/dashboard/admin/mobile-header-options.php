<?php

if ( ! function_exists( 'aperitif_core_add_mobile_header_options' ) ) {
	/**
	 * Function that add mobile header options for this module
	 */
	function aperitif_core_add_mobile_header_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope'       => APERITIF_CORE_OPTIONS_NAME,
				'type'        => 'admin',
				'slug'        => 'mobile-header',
				'icon'        => 'fa fa-cog',
				'title'       => esc_html__( 'Mobile Header', 'aperitif-core' ),
				'description' => esc_html__( 'Mobile Header Settings', 'aperitif-core' )
			)
		);
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'default_value' => 'no',
					'name'          => 'qodef_mobile_header_scroll_appearance',
					'title'         => esc_html__( 'Sticky Mobile Header', 'aperitif-core' ),
					'description'   => esc_html__( 'Set mobile header to be sticky', 'aperitif-core' )
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'radio',
					'name'          => 'qodef_mobile_header_layout',
					'title'         => esc_html__( 'Mobile Header Layout', 'aperitif-core' ),
					'description'   => esc_html__( 'Choose mobile header layout to set for your site', 'aperitif-core' ),
					'args'          => array( 'images' => true ),
					'default_value' => 'standard',
					'options'       => apply_filters( 'aperitif_core_filter_mobile_header_layout_option', $mobile_header_layout_options = array() )
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'aperitif_core_action_after_mobile_header_options_map', $page );
		}
	}
	
	add_action( 'aperitif_core_action_default_options_init', 'aperitif_core_add_mobile_header_options', aperitif_core_get_admin_options_map_position( 'mobile-header' ) );
}