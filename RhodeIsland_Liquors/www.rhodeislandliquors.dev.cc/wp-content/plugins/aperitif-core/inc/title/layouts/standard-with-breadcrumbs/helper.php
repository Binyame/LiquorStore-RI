<?php

if ( ! function_exists( 'aperitif_core_register_standard_with_breadcrumbs_title_layout' ) ) {
	function aperitif_core_register_standard_with_breadcrumbs_title_layout( $layouts ) {
		$layouts['standard-with-breadcrumbs'] = 'AperitifCoreStandardWithBreadcrumbsTitle';
		
		return $layouts;
	}
	
	add_filter( 'aperitif_core_filter_register_title_layouts', 'aperitif_core_register_standard_with_breadcrumbs_title_layout' );
}

if ( ! function_exists( 'aperitif_core_add_standard_with_breadcrumbs_title_layout_option' ) ) {
	/**
	 * Function that set new value into title layout options map
	 *
	 * @param $layouts array - module layouts
	 *
	 * @return array
	 */
	function aperitif_core_add_standard_with_breadcrumbs_title_layout_option( $layouts ) {
		$layouts['standard-with-breadcrumbs'] = esc_html__( 'Standard With Breadcrums', 'aperitif-core' );
		
		return $layouts;
	}
	
	add_filter( 'aperitif_core_filter_title_layout_options', 'aperitif_core_add_standard_with_breadcrumbs_title_layout_option' );
}

