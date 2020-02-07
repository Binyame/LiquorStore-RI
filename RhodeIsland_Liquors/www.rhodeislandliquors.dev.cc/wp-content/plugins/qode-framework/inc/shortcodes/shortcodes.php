<?php

class QodeFrameworkShortcodes {
	private $shortcodes = array();
	
	public function __construct() {
		add_action( 'init', array( $this, 'register' ), 0 ); // Permission 0 is set in order to register shortcodes before widgets, because widgets using shortcodes options
	}
	
	public function get_shortcodes() {
		return $this->shortcodes;
	}
	
	public function set_shortcodes( $base, $shortcode ) {
		$this->shortcodes[ $base ] = $shortcode;
	}
	
	public function get_shortcode( $base ) {
		$shortcodes = $this->get_shortcodes();
		
		if ( ! empty( $shortcodes ) && isset( $shortcodes[ $base ] ) ) {
			return $shortcodes[ $base ];
		}
		
		return false;
	}
	
	private function set_shortcode( QodeFrameworkShortcode $shortcode ) {
		$this->set_shortcodes( $shortcode->get_base(), $shortcode );
	}
	
	public function shortcode_exists( $base ) {
		return array_key_exists( $base, $this->get_shortcodes() );
	}
	
	public function add_shortcode( QodeFrameworkShortcode $shortcode ) {
		$key = $shortcode->get_base();
		
		if ( ! empty( $key ) ) {
			$this->set_shortcode( $shortcode );
			
			return $shortcode;
		}
		
		return false;
	}
	
	public function register() {
		do_action( 'qode_framework_action_before_shortcodes_register' );
		
		$shortcodes = $this->get_shortcodes();
		
		if ( ! empty( $shortcodes ) && is_array( $shortcodes ) ) {
			ksort( $shortcodes );
			
			foreach ( $shortcodes as $shortcode ) {
				$shortcode->register();
			}
		}
		do_action( 'qode_framework_action_after_shortcodes_register' );
	}
}