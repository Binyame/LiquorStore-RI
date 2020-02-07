<?php

class AperitifCoreStandardWithBreadcrumbsTitle extends AperitifCoreTitle {
	private static $instance;
	
	public function __construct() {
		$this->slug = 'standard-with-breadcrumbs';
	}
	
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}
		
		return self::$instance;
	}
}