<?php

if ( ! class_exists( 'AperitifCoreContactForm7' ) ) {
	class AperitifCoreContactForm7 {
		private static $instance;
		
		public function __construct() {
			
			if ( qode_framework_is_installed( 'contact_form_7' ) ) {
				// Init
				$this->init();
			}
		}
		
		public static function get_instance() {
			if ( self::$instance == null ) {
				self::$instance = new self();
			}
			
			return self::$instance;
		}
		
		function init() {
			// Include helper functions
			include_once 'helper.php';
			
			// Include template helper functions
			include_once 'template-functions.php';
			
			// Include widgets
			add_action( 'qode_framework_action_before_widgets_register', array( $this, 'include_widgets' ) );
			
			// Override default WooCommerce templates
			$this->override_templates();
		}
		
		function include_widgets() {
			foreach ( glob( APERITIF_CORE_INC_PATH . '/contact-form-7/widgets/*/include.php' ) as $widget ) {
				include_once $widget;
			}
		}
		
		function override_templates() {
			// Replace cf7 submit button with our button
			remove_action( 'wpcf7_init', 'wpcf7_add_form_tag_submit' );
			add_action( 'wpcf7_init', 'aperitif_core_cf7_add_submit_form_tag' );
		}
	}
	
	AperitifCoreContactForm7::get_instance();
}