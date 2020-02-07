<?php

class StandardMobileHeader extends AperitifCoreMobileHeader {
	private static $instance;
	
	public function __construct() {
		$this->slug                  = 'standard';
		$this->default_header_height = 70;
		
		parent::__construct();
	}
	
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}
		
		return self::$instance;
	}
}