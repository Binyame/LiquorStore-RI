<?php

class AperitifCoreBreadcrumbsTitle extends AperitifCoreTitle {
	private static $instance;
	
	public function __construct() {
		$this->slug = 'breadcrumbs';
	}
	
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}
		
		return self::$instance;
	}
}