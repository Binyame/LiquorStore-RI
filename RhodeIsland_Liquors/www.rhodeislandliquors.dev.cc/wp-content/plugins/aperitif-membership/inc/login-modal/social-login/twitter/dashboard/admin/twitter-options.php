<?php

if ( ! function_exists( 'aperitif_membership_add_social_login_twitter_options' ) ) {
	/**
	 * Function that add general options for this module
	 */
	function aperitif_membership_add_social_login_twitter_options( $page, $social_login_network_section ) {
		
		if ( $social_login_network_section ) {
			$social_login_network_section->add_field_element(
				array(
					'field_type'    => 'yesno',
					'name'          => 'qodef_enable_twitter_social_login',
					'title'         => esc_html__( 'Enable Twitter Social Login', 'aperitif-membership' ),
					'description'   => esc_html__( 'Enabling this option will allow login from twitter social network', 'aperitif-membership' ),
					'default_value' => 'no'
				)
			);
		}
	}
	
	add_action( 'aperitif_membership_action_after_social_login_options_map', 'aperitif_membership_add_social_login_twitter_options', 10, 2 );
}