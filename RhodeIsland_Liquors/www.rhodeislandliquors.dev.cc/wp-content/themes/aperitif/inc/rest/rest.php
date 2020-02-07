<?php

if ( ! class_exists( 'AperitifRestAPI' ) ) {
	/**
	 * Rest API class with configuration
	 */
	class AperitifRestAPI {
		private static $instance;
		private $namespace;
		
		public function __construct() {
			// Init variables
			$this->set_namespace( 'aperitif/v1' );
			
			// Localize theme's main js script with rest variable
			add_filter( 'aperitif_filter_localize_main_js', array( $this, 'localize_script' ) );
			
			// Function that register Rest API routes
			add_action( 'rest_api_init', array( $this, 'register_rest_api_route' ) );
		}
		
		public static function get_instance() {
			if ( ! ( self::$instance instanceof self ) ) {
				self::$instance = new self();
			}
			
			return self::$instance;
		}
		
		public function get_namespace() {
			return $this->namespace;
		}
		
		public function set_namespace( $namespace ) {
			$this->namespace = $namespace;
		}
		
		function localize_script( $global ) {
			$global['restUrl'] = esc_url_raw( rest_url() );
			
			return apply_filters( 'aperitif_filter_rest_api_global_variables', $global, $this->get_namespace() );
		}
		
		function register_rest_api_route() {
			$routes = apply_filters( 'aperitif_filter_rest_api_routes', array() );
			
			if ( ! empty( $routes ) ) {
				foreach ( $routes as $route ) {
					register_rest_route( $this->get_namespace(), esc_attr( $route['route'] ), array(
						array(
							'methods'  => $route['methods'],
							'callback' => $route['callback'],
							'args'     => $route['args']
						)
					) );
				}
			}
		}
	}
	
	AperitifRestAPI::get_instance();
}