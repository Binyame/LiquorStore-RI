<?php

if ( ! function_exists( 'aperitif_core_add_blog_single_author_info_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function aperitif_core_add_blog_single_author_info_options( $page ) {
		
		if ( $page ) {
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_blog_single_enable_author_info',
					'title'         => esc_html__( 'Enable Author Info', 'aperitif-core' ),
					'description'   => esc_html__( 'Enabling this option will show author info section below post content on blog single. In order to show it you also need to fill user Biographical Info inside Users dashboard', 'aperitif-core' ),
					'default_value' => 'yes'
				)
			);
			
			$page->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_blog_single_enable_author_info_email',
					'title'         => esc_html__( 'Enable Author Info Email', 'aperitif-core' ),
					'description'   => esc_html__( 'Enabling this option will show author info email meta inside section content on blog single', 'aperitif-core' ),
					'default_value' => 'no',
					'dependency'    => array(
						'show' => array(
							'qodef_blog_single_enable_author_info' => array(
								'values'        => 'yes',
								'default_value' => 'yes'
							)
						)
					)
				)
			);
		}
	}
	
	add_action( 'aperitif_core_action_after_blog_single_options_map', 'aperitif_core_add_blog_single_author_info_options' );
}