<?php

if ( ! function_exists( 'aperitif_core_include_tribe_events_plugin_is_installed' ) ) {
	function aperitif_core_include_tribe_events_plugin_is_installed( $installed, $plugin ) {
		if ( $plugin === 'tribe-events' ) {
			return class_exists( 'Tribe__Events__Main' );
		}
		
		return $installed;
	}
	
	add_filter( 'qode_framework_filter_is_plugin_installed', 'aperitif_core_include_tribe_events_plugin_is_installed', 10, 2 );
}


if ( ! function_exists( 'aperitif_core_tribe_events_breadcrumbs_title' ) ) {
	function aperitif_core_tribe_events_breadcrumbs_title( $wrap_child, $settings ) {
		if ( is_tax( 'tribe_events_cat' ) ) {
			$wrap_child = '';
			$category   = get_term( get_queried_object_id(), 'tribe_events_cat' );

			if ( isset( $category->parent ) && $category->parent !== 0 ) {
				$parent     = get_term( $category->parent );
				$wrap_child .= sprintf( $settings['link'], get_term_link( $parent->term_id ), $parent->name ) . $settings['separator'];
			}

			$wrap_child .= sprintf( $settings['current_item'], single_cat_title( '', false ) );
		} else if ( is_singular( 'tribe_events' ) ) {
			$wrap_child = '';
			$tribe_id = qode_framework_get_page_id();
			$categories = wp_get_post_terms( $tribe_id, 'tribe_events_cat' );

			if ( ! empty ( $categories ) ) {
				$category = $categories[0];
				if ( isset( $category->parent ) && $category->parent !== 0 ) {
					$parent     = get_term( $category->parent );
					$wrap_child .= sprintf( $settings['link'], get_term_link( $parent->term_id ), $parent->name ) . $settings['separator'];
				}
				$wrap_child .= sprintf( $settings['link'], get_term_link( $category ), $category->name ) . $settings['separator'];
			}

			$wrap_child .= sprintf( $settings['current_item'], get_the_title($tribe_id) );
		}

		return $wrap_child;
	}

	add_filter( 'aperitif_core_filter_breadcrumbs_content', 'aperitif_core_tribe_events_breadcrumbs_title', 10, 2 );
}

if ( ! function_exists( 'aperitif_core_tribe_events_standard_title' ) ) {
	function aperitif_core_tribe_events_standard_title( $title ) {
		if ( is_singular( 'tribe_events' ) ) {
			$tribe_id = qode_framework_get_page_id();
			$title = get_the_title($tribe_id);
		}

		return $title;
	}

	add_filter( 'aperitif_filter_page_title_text', 'aperitif_core_tribe_events_standard_title', 10, 1 );
}
