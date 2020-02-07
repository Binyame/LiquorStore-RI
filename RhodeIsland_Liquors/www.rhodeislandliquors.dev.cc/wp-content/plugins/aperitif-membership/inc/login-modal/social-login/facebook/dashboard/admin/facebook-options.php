<?php

if ( ! function_exists( 'aperitif_membership_add_social_login_facebook_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function aperitif_membership_add_social_login_facebook_options( $page, $social_login_network_section ) {
		
		if ( $social_login_network_section ) {
			$social_login_network_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_facebook_social_login',
					'title'         => esc_html__( 'Enable Facebook Social Login', 'aperitif-membership' ),
					'description'   => esc_html__( 'Enabling this option will allow login from facebook social network. SSL must be set on site in order to this functionality work', 'aperitif-membership' ),
					'default_value' => 'no'
				)
			);
			
			$social_login_network_section->add_field_element(
				array(
					'field_type'  => 'text',
					'name'        => 'qodef_facebook_social_login_api_id',
					'title'       => esc_html__( 'Facebook App ID', 'aperitif-membership' ),
					'description' => esc_html__( 'Copy your application ID form created Facebook Application', 'aperitif-membership' ),
					'dependency'  => array(
						'show' => array(
							'qodef_enable_facebook_social_login' => array(
								'values'        => 'yes',
								'default_value' => ''
							)
						)
					)
				)
			);
		}
	}
	
	add_action( 'aperitif_membership_action_after_social_login_options_map', 'aperitif_membership_add_social_login_facebook_options', 10, 2 );
}