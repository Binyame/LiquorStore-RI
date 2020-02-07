<?php
/*
Plugin Name: Qode Framework
Description: Framework plugin developed as a base for Qode themes
Author: Qode Themes
Version: 1.0
*/
if ( ! class_exists( 'QodeFramework' ) ) {
	class QodeFramework {
		private static $instance;
		
		function __construct() {
			// Hook to include additional modules before plugin loaded
			do_action( 'qode_framework_action_before_framework_plugin_loaded' );
			
			$this->require_core();
			
			// Make plugin available for other plugins
			add_action( 'plugins_loaded', array( $this, 'init_framework_root' ) );
			
			// Make plugin available for translation
			add_action( 'plugins_loaded', array( $this, 'load_plugin_textdomain' ) );
			
			// Add plugin's body classes
			add_filter( 'body_class', array( $this, 'add_body_classes' ) );
			
			// Hook to include additional modules when plugin loaded
			do_action( 'qode_framework_action_after_framework_plugin_loaded' );
		}
		
		public static function get_instance() {
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			
			return self::$instance;
		}
		
		function require_core() {
			require_once 'constants.php';
			require_once 'helpers/include.php';
			require_once 'inc/framework-root.php';
		}
		
		function init_framework_root() {
			do_action( 'qode_framework_action_load_dependent_plugins' );
			
			$GLOBALS['qode_framework'] = qode_framework_get_framework_root();
		}
		
		function load_plugin_textdomain() {
			load_plugin_textdomain( 'qode-framework', false, QODE_FRAMEWORK_REL_PATH . '/languages' );
		}
		
		function add_body_classes( $classes ) {
			$classes[] = 'qode-framework-' . QODE_FRAMEWORK_VERSION;
			
			return $classes;
		}
	}
	
	QodeFramework::get_instance();
}