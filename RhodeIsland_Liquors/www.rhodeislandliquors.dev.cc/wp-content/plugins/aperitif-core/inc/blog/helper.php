<?php

if ( ! function_exists( 'aperitif_core_include_blog_shortcodes' ) ) {
	/**
	 * Function that includes shortcodes
	 */
	function aperitif_core_include_blog_shortcodes() {
		foreach ( glob( APERITIF_CORE_INC_PATH . '/blog/shortcodes/*/include.php' ) as $shortcode ) {
			include_once $shortcode;
		}
	}
	
	add_action( 'qode_framework_action_before_shortcodes_register', 'aperitif_core_include_blog_shortcodes' );
}

if ( ! function_exists( 'aperitif_core_include_blog_shortcodes_widget' ) ) {
	/**
	 * Function that includes widgets
	 */
	function aperitif_core_include_blog_shortcodes_widget() {
		foreach ( glob( APERITIF_CORE_INC_PATH . '/blog/shortcodes/*/widget/include.php' ) as $widget ) {
			include_once $widget;
		}
	}
	
	add_action( 'qode_framework_action_before_widgets_register', 'aperitif_core_include_blog_shortcodes_widget' );
}

if ( ! function_exists( 'aperitif_core_set_blog_single_page_title' ) ) {
	/**
	 * Function that enable/disable page title area for blog single page
	 *
	 * @param $enable_page_title bool
	 *
	 * @return bool
	 */
	function aperitif_core_set_blog_single_page_title( $enable_page_title ) {
		
		if ( is_singular( 'post' ) ) {
			$option = aperitif_core_get_post_value_through_levels( 'qodef_blog_single_enable_page_title' ) !== 'no';
			
			if ( isset ( $option ) ) {
				$enable_page_title = $option;
			}
			
			$meta_option = get_post_meta( get_the_ID(), 'qodef_enable_page_title', true );
			
			if ( ! empty( $meta_option ) ) {
				$enable_page_title = $meta_option;
			}
		}
		
		return $enable_page_title;
	}
	
	add_filter( 'aperitif_filter_enable_page_title', 'aperitif_core_set_blog_single_page_title' );
}

if ( ! function_exists( 'aperitif_core_set_blog_single_sidebar_layout' ) ) {
	/**
	 * Function that return sidebar layout
	 *
	 * @param $layout string
	 *
	 * @return string
	 */
	function aperitif_core_set_blog_single_sidebar_layout( $layout ) {
		
		if ( is_singular( 'post' ) ) {
			$option = aperitif_core_get_post_value_through_levels( 'qodef_blog_single_sidebar_layout' );
			
			if ( ! empty( $option ) ) {
				$layout = $option;
			}
			
			$meta_option = get_post_meta( get_the_ID(), 'qodef_page_sidebar_layout', true );
			
			if ( ! empty( $meta_option ) ) {
				$layout = $meta_option;
			}
		}
		
		return $layout;
	}
	
	add_filter( 'aperitif_filter_sidebar_layout', 'aperitif_core_set_blog_single_sidebar_layout' );
}

if ( ! function_exists( 'aperitif_core_set_blog_single_custom_sidebar_name' ) ) {
	/**
	 * Function that return sidebar name
	 *
	 * @param $sidebar_name string
	 *
	 * @return string
	 */
	function aperitif_core_set_blog_single_custom_sidebar_name( $sidebar_name ) {
		
		if ( is_singular( 'post' ) ) {
			$option = aperitif_core_get_post_value_through_levels( 'qodef_blog_single_custom_sidebar' );
			
			if ( ! empty( $option ) ) {
				$sidebar_name = $option;
			}
			
			$meta_option = get_post_meta( get_the_ID(), 'qodef_page_custom_sidebar', true );
			
			if ( ! empty( $meta_option ) ) {
				$sidebar_name = $meta_option;
			}
		}
		
		return $sidebar_name;
	}
	
	add_filter( 'aperitif_filter_sidebar_name', 'aperitif_core_set_blog_single_custom_sidebar_name' );
}

if ( ! function_exists( 'aperitif_core_set_blog_single_sidebar_grid_gutter_classes' ) ) {
	/**
	 * Function that returns grid gutter classes
	 *
	 * @param $classes string
	 *
	 * @return string
	 */
	function aperitif_core_set_blog_single_sidebar_grid_gutter_classes( $classes ) {
		
		if ( is_singular( 'post' ) ) {
			$option = aperitif_core_get_post_value_through_levels( 'qodef_blog_single_sidebar_grid_gutter' );
			
			if ( ! empty( $option ) ) {
				$classes = 'qodef-gutter--' . esc_attr( $option );
			}
			
			$meta_option = get_post_meta( get_the_ID(), 'qodef_page_sidebar_grid_gutter', true );
			
			if ( ! empty( $meta_option ) ) {
				$classes = 'qodef-gutter--' . esc_attr( $meta_option );
			}
		}
		
		return $classes;
	}
	
	add_filter( 'aperitif_filter_grid_gutter_classes', 'aperitif_core_set_blog_single_sidebar_grid_gutter_classes' );
}

if ( ! function_exists( 'aperitif_core_enable_posts_order' ) ) {
	/**
	 * Function that enable page attributes options for blog single page
	 */
	function aperitif_core_enable_posts_order() {
		add_post_type_support( 'post', 'page-attributes' );
	}
	
	add_action( 'admin_init', 'aperitif_core_enable_posts_order' );
}

if ( ! function_exists( 'aperitif_core_set_blog_list_excerpt_length' ) ) {
	/**
	 * Function that set number of characters for excerpt on blog list page
	 *
	 * @param $excerpt_length int
	 *
	 * @return int
	 */
	function aperitif_core_set_blog_list_excerpt_length( $excerpt_length ) {
		$option = aperitif_core_get_post_value_through_levels( 'qodef_blog_list_excerpt_number_of_characters' );
		
		if ( $option !== '' ) {
			$excerpt_length = $option;
		}
		
		return $excerpt_length;
	}
	
	add_filter( 'aperitif_filter_blog_list_excerpt_length', 'aperitif_core_set_blog_list_excerpt_length' );
}

if ( ! function_exists( 'aperitif_core_get_allowed_pages_for_blog_sidebar_layout' ) ) {
	/**
	 * Function that return pages where blog sidebar is allowed
	 *
	 * @return bool
	 */
	function aperitif_core_get_allowed_pages_for_blog_sidebar_layout() {
		return ( is_archive() || ( is_home() && is_front_page() ) ) && get_post_type() === 'post';
	}
}

if ( ! function_exists( 'aperitif_core_set_blog_archive_sidebar_layout' ) ) {
	/**
	 * Function that return sidebar layout
	 *
	 * @param $layout string
	 *
	 * @return string
	 */
	function aperitif_core_set_blog_archive_sidebar_layout( $layout ) {
		
		if ( aperitif_core_get_allowed_pages_for_blog_sidebar_layout() ) {
			$option = aperitif_core_get_post_value_through_levels( 'qodef_blog_archive_sidebar_layout' );
			
			if ( ! empty( $option ) ) {
				$layout = $option;
			}
		}
		
		return $layout;
	}
	
	add_filter( 'aperitif_filter_sidebar_layout', 'aperitif_core_set_blog_archive_sidebar_layout' );
}

if ( ! function_exists( 'aperitif_core_set_blog_archive_custom_sidebar_name' ) ) {
	/**
	 * Function that return sidebar name
	 *
	 * @param $sidebar_name string
	 *
	 * @return string
	 */
	function aperitif_core_set_blog_archive_custom_sidebar_name( $sidebar_name ) {
		
		if ( aperitif_core_get_allowed_pages_for_blog_sidebar_layout() ) {
			$option = aperitif_core_get_post_value_through_levels( 'qodef_blog_archive_custom_sidebar' );
			
			if ( ! empty( $option ) ) {
				$sidebar_name = $option;
			}
		}
		
		return $sidebar_name;
	}
	
	add_filter( 'aperitif_filter_sidebar_name', 'aperitif_core_set_blog_archive_custom_sidebar_name' );
}

if ( ! function_exists( 'aperitif_core_set_blog_archive_sidebar_grid_gutter_classes' ) ) {
	/**
	 * Function that returns grid gutter classes
	 *
	 * @param $classes string
	 *
	 * @return string
	 */
	function aperitif_core_set_blog_archive_sidebar_grid_gutter_classes( $classes ) {
		
		if ( aperitif_core_get_allowed_pages_for_blog_sidebar_layout() ) {
			$option = aperitif_core_get_post_value_through_levels( 'qodef_blog_single_archive_grid_gutter' );
			
			if ( ! empty( $option ) ) {
				$classes = 'qodef-gutter--' . esc_attr( $option );
			}
		}
		
		return $classes;
	}
	
	add_filter( 'aperitif_filter_grid_gutter_classes', 'aperitif_core_set_blog_archive_sidebar_grid_gutter_classes' );
}