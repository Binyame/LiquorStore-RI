<?php

if ( ! function_exists( 'aperitif_nav_item_classes' ) ) {
	function aperitif_nav_item_classes( $classes, $item, $args, $depth ) {
		
		if ( $depth == 0 && in_array( 'menu-item-has-children', $item->classes ) ) {
			$classes[] = "qodef-menu-item--narrow";
		}
		
		return $classes;
	}
	
	add_filter( 'nav_menu_css_class', 'aperitif_nav_item_classes', 10, 4 );
}