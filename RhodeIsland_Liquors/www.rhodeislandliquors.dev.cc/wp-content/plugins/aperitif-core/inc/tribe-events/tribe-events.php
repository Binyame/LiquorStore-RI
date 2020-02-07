<?php

if ( ! function_exists( 'apiritif_core_register_tribe_events_for_meta_options' ) ) {
	/**
	 * Function that register product post type for meta box options
	 *
	 * @param $post_types array
	 *
	 * @return array
	 */
	function apiritif_core_register_tribe_events_for_meta_options( $post_types ) {
		$post_types[] = 'tribe_events';
		
		return $post_types;
	}
	
	add_filter( 'qode_framework_filter_meta_box_save', 'apiritif_core_register_tribe_events_for_meta_options' );
	add_filter( 'qode_framework_filter_meta_box_remove', 'apiritif_core_register_tribe_events_for_meta_options' );
}

if ( ! class_exists( 'AperitifCoreTribeEvents' ) ) {
	class AperitifCoreTribeEvents {
		private static $instance;
		
		public function __construct() {
			
			if ( qode_framework_is_installed( 'tribe-events' ) ) {
				// Init
				$this->init();
				
				// Include files
				$this->include_files();
			}
		}
		
		public static function get_instance() {
			if ( self::$instance == null ) {
				self::$instance = new self();
			}
			
			return self::$instance;
		}
		
		function init() {
			
			// Override default plugin templates
			add_filter( 'tribe_events_template_paths', array( $this, 'override_templates' ) );
			
			// Include shortcodes
			add_action( 'qode_framework_action_before_shortcodes_register', array( $this, 'include_shortcodes' ) );
		}
		
		function override_templates( $templates_path ) {
			array_unshift( $templates_path, APERITIF_CORE_INC_PATH . '/tribe-events/' );
			
			return $templates_path;
		}
		
		function include_shortcodes() {
			foreach ( glob( APERITIF_CORE_INC_PATH . '/tribe-events/shortcodes/*/include.php' ) as $shortcode ) {
				include_once $shortcode;
			}
		}
		
		function include_files() {
			// Include meta boxes
			include_once 'dashboard/meta-box/tribe-events-meta-box.php';
		}
	}
	
	AperitifCoreTribeEvents::get_instance();
}

