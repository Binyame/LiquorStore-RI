<?php

if ( ! function_exists( 'aperitif_get_blog_holder_classes' ) ) {
	/**
	 * Function that return classes for the main blog holder
	 *
	 * @return string
	 */
	function aperitif_get_blog_holder_classes() {
		$classes = array();
		
		if ( is_single() ) {
			$classes[] = 'qodef--single';
		} else {
			$classes[] = 'qodef--list';
		}
		
		return implode( ' ', $classes );
	}
}
if ( ! function_exists( 'aperitif_get_blog_module' ) ) {
	/**
	 * Function returns single/list depending is single post or in loop
	 */
	function aperitif_get_blog_module() {
		$module = ( is_single() && ( get_the_ID() === aperitif_get_page_id() ) ) ? 'single' : 'list';
		
		return $module;
	}
}

if ( ! function_exists( 'aperitif_get_blog_list_excerpt_length' ) ) {
	/**
	 * Function that return number of characters for excerpt on blog list page
	 *
	 * @return int
	 */
	function aperitif_get_blog_list_excerpt_length() {
		$length = apply_filters( 'aperitif_filter_blog_list_excerpt_length', 180 );
		
		return intval( $length );
	}
}

if ( ! function_exists( 'aperitif_post_has_read_more' ) ) {
	/**
	 * Function that checks if current post has read more tag set
	 *
	 * @return int position of read more tag text. It will return false if read more tag isn't set
	 */
	function aperitif_post_has_read_more() {
		global $post;
		
		return ! empty( $post ) ? strpos( $post->post_content, '<!--more-->' ) : false;
	}
}

if ( ! function_exists( 'aperitif_add_link_pages_after_blog_single_content' ) ) {
	/**
	 * Function which add additional parts for blog single
	 */
	function aperitif_add_link_pages_after_blog_single_content() {
		
		$args_pages = array(
			'before'      => '<div class="qodef-e-single-links"><span class="qodef-e-single-links-title">' . esc_html__( 'Pages: ', 'aperitif' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '%'
		);
		
		wp_link_pages( $args_pages );
	}
	
	add_action( 'aperitif_action_after_blog_single_content', 'aperitif_add_link_pages_after_blog_single_content' );
}
