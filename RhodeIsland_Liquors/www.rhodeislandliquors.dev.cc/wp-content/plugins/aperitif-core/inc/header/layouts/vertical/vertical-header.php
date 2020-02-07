<?php

class VerticalHeader extends AperitifCoreHeader {
	private static $instance;
	
	public function __construct() {
		$this->slug                    = 'vertical';
		$this->overriding_whole_header = true;
		
		parent::__construct();
	}
	
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}
		
		return self::$instance;
	}
	
	public function enqueue_additional_assets() {
		wp_enqueue_style( 'perfect-scrollbar', APERITIF_CORE_URL_PATH . 'assets/plugins/perfect-scrollbar/perfect-scrollbar.css', array() );
		wp_enqueue_script( 'perfect-scrollbar', APERITIF_CORE_URL_PATH . 'assets/plugins/perfect-scrollbar/perfect-scrollbar.jquery.min.js', array( 'jquery' ), false, true );
	}
}