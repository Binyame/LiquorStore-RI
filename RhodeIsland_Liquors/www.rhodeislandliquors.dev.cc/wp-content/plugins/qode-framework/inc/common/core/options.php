<?php

class QodeFrameworkOptions {
	private $child_elements;
	private $options;
	private $options_by_type;
	
	public function __construct() {
		$this->child_elements = array();
		$this->options       = array();
		$this->options_by_type = array();
	}
	
	public function get_child_elements() {
		return $this->child_elements;
	}
	
	public function get_child_element( $key ) {
		return $this->child_elements[$key];
	}
	
	public function set_child_element( QodeFrameworkPage $page ) {
		$key = $page->get_slug();
		$this->child_elements[ $key ] = $page;
	}
	
	public function child_exists( $key ) {
		return array_key_exists( $key, $this->child_elements );
	}
	
	public function get_options() {
		return $this->options;
	}
	
	public function set_options( $options ) {
		return $this->options = $options;
	}
	
	public function get_option( $key ) {
		if ( isset( $this->options[ $key ] ) ) {
			return $this->options[ $key ];
		}
		
		return false;
	}
	
	public function set_option( $key, $value, $field_type = '' ) {
		$this->options[ $key ] = $value;
		$this->set_option_by_type( $field_type, $key );
	}
	
	public function get_options_by_type( $field_type ) {
		if ( array_key_exists( $field_type, $this->options_by_type ) ) {
			return $this->options_by_type[ $field_type ];
		}
		
		return false;
	}
	
	public function set_option_by_type( $field_type, $key ) {
		$this->options_by_type[ $field_type ][] = $key;
	}
	
	public function get_option_value( $key ) {
		
		if ( array_key_exists( $key, $this->options ) ) {
			return $this->options[ $key ];
		}
		
		return false;
	}
	
	public function get_child_elements_by_scope( $scope ) {
		$children = array();
		if ( is_array( $this->get_child_elements() ) && count( $this->get_child_elements() ) ) {
			foreach ( $this->get_child_elements() as $child ) {
				if ( is_array( $child->get_scope() ) && in_array( $scope, $child->get_scope() ) ) {
					$children[] = $child;
				} elseif ( $child->get_scope() !== '' && $child->get_scope() === $scope ) {
					$children[] = $child;
				}
			}
		}
		
		return $children;
	}
	
	public function add_option_page( QodeFrameworkPage $page ) {
		
		if ( $page->get_slug() !== null ) {
			$this->set_child_element( $page );
			
			return $page;
		}
		
		return false;
	}
	
	public function enqueue_dashboard_framework_scripts() {
		// Hook to include additional scripts before dashboard scripts
		do_action( 'qode_framework_before_dashboard_scripts' );
		
		// 3rd party plugins styles
		wp_enqueue_style( 'select2', QODE_FRAMEWORK_INC_URL_PATH . '/common/assets/css/plugins/select2.min.css' );
		wp_enqueue_style( 'fonticonpicker', QODE_FRAMEWORK_INC_URL_PATH . '/common/assets/css/plugins/jquery.fonticonpicker.min.css' );
		if ( ! did_action( 'wp_enqueue_media' ) ) {
			wp_enqueue_media();
		}
		
		// Main dashboard css styles
		wp_enqueue_style( 'qode-framework-dashboard', QODE_FRAMEWORK_INC_URL_PATH . '/common/assets/css/dashboard.min.css' );
		
		// 3rd party plugins scripts
		wp_enqueue_script( 'jquery-ui-sortable' );
		wp_enqueue_script( 'select2', QODE_FRAMEWORK_INC_URL_PATH . '/common/assets/js/plugins/select2.full.min.js', array(), false, true );
		wp_enqueue_script( 'qode-framework-fonticonpicker', QODE_FRAMEWORK_INC_URL_PATH . '/common/assets/js/plugins/jquery.fonticonpicker.min.js', array(), false, true );
		
		// Main dashboard js scripts
		wp_enqueue_script( 'qode-framework-main', QODE_FRAMEWORK_INC_URL_PATH . '/common/assets/js/dashboard.min.js', array( 'jquery' ), false, true );
	}
}

