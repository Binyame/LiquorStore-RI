<?php

if ( ! function_exists( 'aperitif_core_add_admin_user_options' ) ) {
	function aperitif_core_add_admin_user_options() {
		$qode_framework = qode_framework_get_framework_root();
		
		$page = $qode_framework->add_options_page(
			array(
				'scope' => array( 'administrator', 'author' ),
				'type'  => 'user',
				'title' => esc_html__( 'Social Networks', 'aperitif-core' ),
				'slug'  => 'admin-options',
			)
		);
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_user_facebook',
					'title'       => esc_html__( 'Facebook', 'aperitif-core' ),
					'description' => esc_html__( 'Enter user Facebook profile url', 'aperitif-core' ),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_user_instagram',
					'title'       => esc_html__( 'Instagram', 'aperitif-core' ),
					'description' => esc_html__( 'Enter user Instagram profile url', 'aperitif-core' ),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_user_twitter',
					'title'       => esc_html__( 'Twitter', 'aperitif-core' ),
					'description' => esc_html__( 'Enter user Twitter profile url', 'aperitif-core' ),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_user_linkedin',
					'title'       => esc_html__( 'LinkedIn', 'aperitif-core' ),
					'description' => esc_html__( 'Enter user LinkedIn profile url', 'aperitif-core' ),
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_user_pinterest',
					'title'       => esc_html__( 'Pinterest', 'aperitif-core' ),
					'description' => esc_html__( 'Enter user Pinterest profile url', 'aperitif-core' ),
				)
			);
			
			// Hook to include additional options after module options
			do_action( 'aperitif_core_action_after_admin_user_options_map', $page );
		}
	}
	
	add_action( 'aperitif_core_action_register_role_custom_fields', 'aperitif_core_add_admin_user_options' );
}