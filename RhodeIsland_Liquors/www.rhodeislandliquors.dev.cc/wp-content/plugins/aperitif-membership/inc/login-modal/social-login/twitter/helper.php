<?php

if ( ! function_exists( 'aperitif_membership_is_twitter_social_login_enabled' ) ) {
	function aperitif_membership_is_twitter_social_login_enabled() {
		return aperitif_core_get_option_value( 'admin', 'qodef_enable_twitter_social_login' ) === 'yes';
	}
}

if ( ! function_exists( 'aperitif_membership_include_twitter_login_template' ) ) {
	/**
	 * Render form for twitter login
	 */
	function aperitif_membership_include_twitter_login_template() {
		
		if ( aperitif_membership_is_twitter_social_login_enabled() ) {
			aperitif_membership_template_part( 'login-modal/social-login', 'twitter/templates/button' );
		}
	}
	
	add_action( 'aperitif_membership_action_social_login_content', 'aperitif_membership_include_twitter_login_template', 15 );
}

if ( ! function_exists( 'aperitif_membership_init_rest_api_twitter_login' ) ) {
	function aperitif_membership_init_rest_api_twitter_login() {
		$twitterApi = AperitifMembershipTwitterApi::getInstance();
		
		if ( ! empty( $twitterApi ) ) {
			$response = $twitterApi->obtainRequestToken();
			
			if ( $response->oauth_callback_confirmed == true ) {
				qode_framework_get_ajax_status( 'success', esc_html__( 'Please authorize your account...', 'aperitif-membership' ), null, isset( $response->redirectUrl ) ? $response->redirectUrl : '' );
			} else {
				qode_framework_get_ajax_status( 'error', $response->message );
			}
		} else {
			qode_framework_get_ajax_status( 'error', esc_html__( 'Twitter API instance are invalid.', 'aperitif-membership' ) );
		}
	}
}

if ( ! function_exists( 'aperitif_membership_generate_access_token_twitter_user' ) ) {
	/**
	 * Function for getting twitter user data.
	 * Checks for user mail and register or log in user
	 */
	function aperitif_membership_generate_access_token_twitter_user() {
		$twitterApi = AperitifMembershipTwitterApi::getInstance();
		
		if ( isset( $_GET ) && ! empty( $_GET['oauth_token'] ) && ! empty( $_GET['oauth_verifier'] ) && ! empty( $twitterApi ) ) {
			$oauth_token    = $_GET['oauth_token'];
			$oauth_verifier = $_GET['oauth_verifier'];
			$responseObj    = $twitterApi->obtainAccessToken( $oauth_token, $oauth_verifier );
		
			if ( isset( $responseObj->status ) && $responseObj->status ) {
				$access_token = $responseObj->oauth_token;
				$access_token_secret = $responseObj->oauth_token_secret;
				$userResponseObj = $twitterApi->getUserEmail( $access_token, $access_token_secret );
				
				if ( $userResponseObj->status ) {
					$user_data = $userResponseObj->data;
					$user_email = isset( $user_data['email'] ) && is_email( $user_data['email'] ) ? sanitize_email( $user_data['email'] ) : '';
					
					if ( ! empty ( $user_email ) ) {
						if ( email_exists( $user_email ) ) {
							//User already exist, log in user
							aperitif_membership_login_current_user_by_meta( $user_email, false );
						} else {
							// Register new user
							$user_meta = array(
								'user_login'            => sanitize_title( $user_data['screen_name'] ),
								'user_email'            => $user_email,
								'user_password'         => $user_data['id_str'],
								'user_confirm_password' => $user_data['id_str'],
								'user_description'      => $user_data['description'],
								'user_url'              => 'https://twitter.com/' . $user_data['screen_name'],
								'social_login'          => 'twitter'
							);
							
							aperitif_membership_init_rest_api_register( $user_meta );
						}
					}
				}
			}
		}
	}
	
	add_action( 'init', 'aperitif_membership_generate_access_token_twitter_user' );
}