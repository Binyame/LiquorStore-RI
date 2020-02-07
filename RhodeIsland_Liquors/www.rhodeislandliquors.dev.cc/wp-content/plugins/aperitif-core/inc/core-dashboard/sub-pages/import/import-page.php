<?php
if ( ! function_exists( 'aperitif_core_add_import_sub_page_to_list' ) ) {
	function aperitif_core_add_import_sub_page_to_list( $sub_pages ) {
		$sub_pages[] = 'AperitifCoreImportPage';
		return $sub_pages;
	}
	
	add_filter( 'aperitif_core_filter_add_welcome_sub_page', 'aperitif_core_add_import_sub_page_to_list', 11 );
}

if ( class_exists( 'AperitifCoreSubPage' ) ) {
	class AperitifCoreImportPage extends AperitifCoreSubPage {
		
		public function __construct() {
			parent::__construct();
		}
		
		public function add_sub_page() {
			$this->set_base( 'import' );
			$this->set_title( esc_html__('Import', 'aperitif-core'));
			$this->set_atts( $this->set_atributtes());
		}

		public function set_atributtes(){
			$params = array();

			$iparams = AperitifCoreDashboard::get_instance()->get_import_params();
			if(is_array($iparams) && isset($iparams['submit'])) {
				$params['submit'] = $iparams['submit'];
			}

			return $params;
		}
	}
}