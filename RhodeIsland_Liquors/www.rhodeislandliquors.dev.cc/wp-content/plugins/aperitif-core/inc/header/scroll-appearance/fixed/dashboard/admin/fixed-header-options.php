<?php

if ( ! function_exists( 'aperitif_core_add_fixed_header_options' ) ) {
	function aperitif_core_add_fixed_header_options( $page ) {
		
	}
	
	add_action( 'aperitif_core_action_after_header_options_map', 'aperitif_core_add_fixed_header_options' );
}