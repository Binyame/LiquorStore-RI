<?php

class MinimalMobileHeader extends AperitifCoreMobileHeader {
	private static $instance;
	
	public function __construct() {
		$this->slug                  = 'minimal';
		$this->default_header_height = 70;
		
		add_action( 'aperitif_action_before_wrapper_close_tag', array( $this, 'fullscreen_menu_template' ) );
		
		parent::__construct();
	}
	
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}
		
		return self::$instance;
	}
	
	function fullscreen_menu_template() {
		$header = aperitif_core_get_post_value_through_levels( 'qodef_header_layout' );
		
		if ( $header != 'minimal' ) {
			$parameters = array(
				'fullscreen_menu_in_grid' => aperitif_core_get_post_value_through_levels( 'qodef_fullscreen_menu_in_grid' ) === 'yes'
			);
			
			aperitif_core_template_part( 'fullscreen-menu', 'templates/full-screen-menu', '', $parameters );
		}
	}
}