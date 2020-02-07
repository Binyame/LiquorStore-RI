<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( ! class_exists( 'AperitifThemeWelcomePage' ) ) {
	class AperitifThemeWelcomePage {
		
		/**
		 * Singleton class
		 */
		private static $instance;
		
		/**
		 * Get the instance of AperitifThemeWelcomePage
		 *
		 * @return self
		 */
		public static function get_instance() {
			if ( ! ( self::$instance instanceof self ) ) {
				self::$instance = new self();
			}
			
			return self::$instance;
		}
		
		/**
		 * Cloning disabled
		 */
		private function __clone() {
		}
		
		/**
		 * Constructor
		 */
		private function __construct() {
			
			// Theme activation hook
			add_action( 'after_switch_theme', array( $this, 'init_activation_hook' ) );
			
			// Welcome page redirect on theme activation
			add_action( 'admin_init', array( $this, 'welcome_page_redirect' ) );
			
			// Add welcome page into theme options
			add_action( 'admin_menu', array( $this, 'add_welcome_page' ), 12 );
			
			//Enqueue theme welcome page scripts
			add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		}
		
		/**
		 * Init hooks on theme activation
		 */
		function init_activation_hook() {
			
			if ( ! is_network_admin() ) {
				set_transient( '_aperitif_welcome_page_redirect', 1, 30 );
			}
		}
		
		/**
		 * Redirect to welcome page on theme activation
		 */
		function welcome_page_redirect() {
			
			// If no activation redirect, bail
			if ( ! get_transient( '_aperitif_welcome_page_redirect' ) ) {
				return;
			}
			
			// Delete the redirect transient
			delete_transient( '_aperitif_welcome_page_redirect' );
			
			// If activating from network, or bulk, bail
			if ( is_network_admin() || isset( $_GET['activate-multi'] ) ) {
				return;
			}
			
			// Redirect to welcome page
			wp_safe_redirect( add_query_arg( array( 'page' => 'aperitif_welcome_page' ), esc_url( admin_url( 'themes.php' ) ) ) );
			exit;
		}
		
		/**
		 * Add welcome page
		 */
		function add_welcome_page() {
			
			add_theme_page(
				esc_html__( 'About', 'aperitif' ),
				esc_html__( 'About', 'aperitif' ),
				current_user_can( 'edit_theme_options' ),
				'aperitif_welcome_page',
				array( $this, 'welcomePageContent' )
			);
			
			remove_submenu_page( 'themes.php', 'qodef_fn_themename_welcome_page' );
		}
		
		/**
		 * Print welcome page content
		 */
		function welcomePageContent() {
			$params = array();
			
			$theme                       = wp_get_theme();
			$params['theme']             = $theme;
			$params['theme_name']        = esc_html( $theme->get( 'Name' ) );
			$params['theme_description'] = esc_html( $theme->get( 'Description' ) );
			$params['theme_version']     = $theme->get( 'Version' );
			$params['theme_screenshot']  = file_exists( APERITIF_ROOT_DIR . '/screenshot.png' ) ? APERITIF_ROOT . '/screenshot.png' : APERITIF_ROOT . '/screenshot.jpg';
			
			aperitif_template_part( 'welcome', 'templates/welcome', '', $params );
		}
		
		/**
		 * Enqueue theme welcome page scripts
		 */
		function enqueue_styles( $hook ) {
			
			if ( $hook === 'appearance_page_aperitif_welcome_page' ) {
				wp_enqueue_style( 'aperitif-welcome-page-style', APERITIF_INC_ROOT . '/welcome/assets/admin/css/welcome.min.css' );
			}
		}
	}
}

AperitifThemeWelcomePage::get_instance();