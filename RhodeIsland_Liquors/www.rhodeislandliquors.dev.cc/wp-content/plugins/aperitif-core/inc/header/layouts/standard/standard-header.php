<?php

class StandardHeader extends AperitifCoreHeader {
	private static $instance;
	
	public function __construct() {
		$this->slug                  = 'standard';
		$this->search_layout         = 'covers-header';
		$this->default_header_height = 120;
		
		add_filter( 'body_class', array( $this, 'add_body_classes' ) );
		
		parent::__construct();
	}
	
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}
		
		return self::$instance;
	}
	
	function add_body_classes( $classes ) {
		$header_menu_position = aperitif_core_get_post_value_through_levels( 'qodef_standard_header_menu_position' );
		$header_padding       = aperitif_core_get_post_value_through_levels( 'qodef_standard_header_padding' );
		
		$classes[] = ! empty( $header_menu_position ) ? 'qodef-header-standard--' . $header_menu_position : '';
		
		if ( $header_padding == 'yes' ) {
			$classes[] = 'qodef-header-padding';
		}
		
		return $classes;
	}
}