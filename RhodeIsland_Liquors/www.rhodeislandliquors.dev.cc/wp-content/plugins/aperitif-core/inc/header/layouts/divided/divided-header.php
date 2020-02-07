<?php

class DividedHeader extends AperitifCoreHeader {
	private static $instance;
	
	public function __construct() {
		$this->slug                  = 'divided';
		$this->search_layout         = 'covers-header';
		$this->default_header_height = 120;
		
		parent::__construct();
	}
	
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}
		
		return self::$instance;
	}
	
}