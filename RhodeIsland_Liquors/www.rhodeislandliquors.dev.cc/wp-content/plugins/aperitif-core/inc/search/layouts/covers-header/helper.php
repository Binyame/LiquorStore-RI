<?php
if ( ! function_exists( 'aperitif_core_register_covers_header_search_layout' ) ) {
	function aperitif_core_register_covers_header_search_layout( $search_layouts ) {
		$search_layout = array(
			'covers-header' => 'CoversHeaderSearch'
		);
		
		$search_layouts = array_merge( $search_layouts, $search_layout );
		
		return $search_layouts;
	}
	
	add_filter( 'aperitif_core_filter_register_search_layouts', 'aperitif_core_register_covers_header_search_layout' );
}