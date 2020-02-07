<?php

if ( ! function_exists( 'aperitif_membership_get_dashboard_navigation_pages' ) ) {
	function aperitif_membership_get_dashboard_navigation_pages() {
		$dashboard_url = aperitif_membership_get_dashboard_page_url();
		
		$items = array(
			'profile'      => array(
				'url'         => esc_url( add_query_arg( array( 'user-action' => 'profile' ), $dashboard_url ) ),
				'text'        => esc_html__( 'Profile', 'aperitif-membership' ),
				'user_action' => 'profile',
				'icon'        => '<i class="fa fa-user" aria-hidden="true"></i>'
			),
			'edit-profile' => array(
				'url'         => esc_url( add_query_arg( array( 'user-action' => 'edit-profile' ), $dashboard_url ) ),
				'text'        => esc_html__( 'Edit Profile', 'aperitif-membership' ),
				'user_action' => 'edit-profile',
				'icon'        => '<i class="fa fa-cog" aria-hidden="true"></i>'
			),
			'log-out' => array(
				'url'         => wp_logout_url( aperitif_membership_get_membership_redirect_url() ),
				'text'        => esc_html__( 'Log Out', 'aperitif-membership' ),
				'user_action' => 'log-out',
				'icon'        => '<i class="fa fa-arrow-circle-right" aria-hidden="true"></i>'
			)
		);
		
		$items = apply_filters( 'aperitif_membership_filter_dashboard_navigation_pages', $items, $dashboard_url );
		
		return $items;
	}
}

if ( ! function_exists( 'aperitif_membership_get_dashboard_pages' ) ) {
	function aperitif_membership_get_dashboard_pages() {
		$action = isset( $_GET['user-action'] ) && ! empty( $_GET['user-action'] ) ? sanitize_text_field( $_GET['user-action'] ) : 'profile';
		
		$params = array();
		if ( $action == 'profile' || $action == 'edit-profile' ) {
			$user_id                 = get_current_user_id();
			$params['first_name']    = get_the_author_meta( 'first_name', $user_id );
			$params['last_name']     = get_the_author_meta( 'last_name', $user_id );
			$params['email']         = get_the_author_meta( 'user_email', $user_id );
			$params['website']       = get_the_author_meta( 'user_url', $user_id );
			$params['description']   = get_the_author_meta( 'description', $user_id );
			$params['profile_image'] = get_avatar( $user_id, 96 );
			$params['action']        = $action;
		}
		
		switch ( $action ) {
			case 'profile':
				$html = aperitif_membership_get_template_part( 'general', 'page-templates/parts/profile', '', $params );
				break;
			case 'edit-profile':
				$html = aperitif_membership_get_template_part( 'general', 'page-templates/parts/edit-profile', '', $params );
				break;
			default:
				$html = aperitif_membership_get_template_part( 'general', 'page-templates/parts/profile', '', $params );
				break;
		}
		
		return apply_filters( 'aperitif_membership_filter_dashboard_page', $html, $action );
	}
}

if ( ! function_exists( 'aperitif_membership_update_user_profile' ) ) {
	function aperitif_membership_update_user_profile() {

		if ( ! isset( $_POST ) || empty( $_POST ) ) {
			qode_framework_get_ajax_status( 'error', esc_html__( 'Post method is invalid.', 'aperitif-membership' ) );
		} else {
			$options = isset( $_POST['options'] ) ? $_POST['options'] : array();
			
			if ( ! empty( $options ) ) {
				parse_str( $options, $options );
	
				$user_id = get_current_user_id();
				
				if ( ! empty( $user_id ) && wp_verify_nonce( $_POST['nonce'], 'qode-framework-nonce-' . $options['qodef_form_name'] . '-1' ) ) {
					$user_fields = array();
					
					if ( isset( $options['user_password'] ) && ! empty( $options['user_password'] ) ) {
						if ( $options['user_password'] === $options['user_confirm_password'] ) {
							$user_fields['user_pass'] = esc_attr( $options['user_password'] );
						} else {
							qode_framework_get_ajax_status( 'error', esc_html__( 'Password and confirm password doesn\'t match.', 'aperitif-membership' ) );
						}
					}
					
					if ( isset( $options['user_email'] ) && ! empty( $options['user_email'] ) ) {
						
						if ( ! is_email( $options['user_email'] ) ) {
							qode_framework_get_ajax_status( 'error', esc_html__( 'Please provide a valid email address.', 'aperitif-membership' ) );
						}
						
						$current_user_object = get_user_by_email( $options['user_email'] );
						if ( ! empty( $current_user_object ) && $current_user_object->ID !== $user_id && email_exists( $options['user_email'] ) ) {
							qode_framework_get_ajax_status( 'error', esc_html__( 'An account is already registered with this email address. Please fill another one.', 'aperitif-membership' ) );
						} else {
							$user_fields['user_email'] = sanitize_email( $options['user_email'] );
						}
					}
					
					$simple_fields = array(
						'first_name'  => array(
							'escape' => 'attr'
						),
						'last_name'   => array(
							'escape' => 'attr'
						),
						'user_url'    => array(
							'escape' => 'url'
						),
						'description' => array(
							'escape' => 'attr'
						)
					);
					
					foreach ( $simple_fields as $key => $value ) {
						if ( isset( $options[ $key ] ) && ! empty( $options[ $key ] ) ) {
							$escape = 'esc_' . $value['escape'];
							
							$user_fields[ $key ] = $escape( $options[ $key ] );
						}
					}
					
					if ( ! empty( $user_fields ) ) {
						wp_update_user( array_merge(
							array( 'ID' => $user_id ),
							$user_fields
						) );
						
						qode_framework_get_ajax_status( 'success', esc_html__( 'Your profile is successfully updated.', 'aperitif-membership' ), null, aperitif_membership_get_membership_redirect_url() );
					} else {
						qode_framework_get_ajax_status( 'error', esc_html__( 'Change your information in order to update your profile.', 'aperitif-membership' ) );
					}
				} else {
					qode_framework_get_ajax_status( 'error', esc_html__( 'You are unauthorized to perform this action.', 'aperitif-membership' ) );
				}
			} else {
				qode_framework_get_ajax_status( 'error', esc_html__( 'Data are invalid.', 'aperitif-membership' ) );
			}
		}
	}
	
	add_action( 'wp_ajax_aperitif_membership_action_update_user_profile', 'aperitif_membership_update_user_profile' );
}