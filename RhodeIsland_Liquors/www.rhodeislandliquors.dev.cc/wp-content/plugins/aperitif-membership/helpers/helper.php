<?php

if ( ! function_exists( 'aperitif_membership_get_membership_redirect_url' ) ) {
	function aperitif_membership_get_membership_redirect_url( $redirect_url = '' ) {
		$page_id       = qode_framework_get_page_id();
		$redirect_uri  = esc_url( home_url( '/' ) );
		$dashboard_url = aperitif_membership_get_dashboard_page_url();
		
		if ( isset( $redirect_url ) && ! empty( $redirect_url ) ) {
			$redirect_uri = wp_unslash( $redirect_url );
		} else if ( ! empty( $dashboard_url ) ) {
			$redirect_uri = $dashboard_url;
		} else if ( $page_id > 0 ) {
			$redirect_uri = get_permalink( $page_id );
		}
		
		return apply_filters( 'aperitif_membership_filter_redirect_url', esc_url( $redirect_uri ) );
	}
}

if ( ! function_exists( 'aperitif_membership_get_dashboard_page_url' ) ) {
	function aperitif_membership_get_dashboard_page_url() {
		$url                = '';
		$pages              = get_all_page_ids();
		$dashboard_template = apply_filters( 'aperitif_membership_filter_dashboard_template_name', '' );
		
		if ( ! empty( $dashboard_template ) && ! empty( $pages ) ) {
			foreach ( $pages as $page ) {
				if ( get_post_status( $page ) == 'publish' && get_page_template_slug( $page ) == $dashboard_template ) {
					$url = esc_url( get_the_permalink( $page ) );
					break;
				}
			}
		}
		
		return $url;
	}
}

if ( ! function_exists( 'aperitif_membership_template_part' ) ) {
	/**
	 * Echo module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 */
	function aperitif_membership_template_part( $module, $template, $slug = '', $params = array() ) {
		echo aperitif_membership_get_template_part( $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'aperitif_membership_get_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array $params array of parameters to pass to template
	 *
	 * @return string - string containing html of template
	 */
	function aperitif_membership_get_template_part( $module, $template, $slug = '', $params = array() ) {
		$root = APERITIF_MEMBERSHIP_INC_PATH;
		
		return qode_framework_get_template_part( $root, $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'aperitif_membership_get_grid_gutter_classes' ) ) {
	/**
	 * Function that returns classes for the gutter when sidebar is enabled
	 *
	 * @return string
	 */
	function aperitif_membership_get_grid_gutter_classes() {
		return qode_framework_is_installed( 'theme' ) ? aperitif_get_grid_gutter_classes() : '';
	}
}

if ( ! function_exists( 'aperitif_membership_get_admin_options_map_position' ) ) {
	/**
	 * Function that set dashboard admin options map position
	 *
	 * @param $map string
	 *
	 * @return int
	 */
	function aperitif_membership_get_admin_options_map_position( $map ) {
		return qode_framework_is_installed( 'core' ) ? aperitif_core_get_admin_options_map_position( $map ) : 10;
	}
}

if ( ! function_exists( 'aperitif_membership_get_my_account_page_url' ) ) {
	/**
	 * Function that returns my account page url if woo is installed and set properly
	 *
	 * @param $url
	 *
	 * @return string
	 */
	function aperitif_membership_get_my_account_page_url( $url ) {
		
		if ( qode_framework_is_installed( 'woocommerce' ) ) {
			$my_account_page_id = get_option( 'woocommerce_myaccount_page_id' );
			
			if ( isset( $my_account_page_id ) && ! empty( $my_account_page_id ) ) {
				$url = esc_url( get_permalink( $my_account_page_id ) );
			}
		}
		
		return $url;
	}
	
	add_filter( 'aperitif_membership_filter_user_link', 'aperitif_membership_get_my_account_page_url' );
}