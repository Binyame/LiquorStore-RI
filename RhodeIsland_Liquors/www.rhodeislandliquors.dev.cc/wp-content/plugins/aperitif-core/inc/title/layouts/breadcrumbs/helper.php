<?php

if ( ! function_exists( 'aperitif_core_register_breadcrumbs_title_layout' ) ) {
	function aperitif_core_register_breadcrumbs_title_layout( $layouts ) {
		$layouts['breadcrumbs'] = 'AperitifCoreBreadcrumbsTitle';
		
		return $layouts;
	}
	
	add_filter( 'aperitif_core_filter_register_title_layouts', 'aperitif_core_register_breadcrumbs_title_layout' );
}

if ( ! function_exists( 'aperitif_core_add_breadcrumbs_title_layout_option' ) ) {
	/**
	 * Function that set new value into title layout options map
	 *
	 * @param $layouts array - module layouts
	 *
	 * @return array
	 */
	function aperitif_core_add_breadcrumbs_title_layout_option( $layouts ) {
		$layouts['breadcrumbs'] = esc_html__( 'Breadcrumbs', 'aperitif-core' );
		
		return $layouts;
	}
	
	add_filter( 'aperitif_core_filter_title_layout_options', 'aperitif_core_add_breadcrumbs_title_layout_option' );
}

if ( ! function_exists( 'aperitif_core_breadcrumbs' ) ) {
	/**
	 * Function that renders breadcrumbs html
	 */
	function aperitif_core_breadcrumbs() {
		
		// Breadcrumbs label
		$labels = apply_filters( 'aperitif_core_filter_breadcrumbs_label', array(
			'home'        => esc_html__( 'Home', 'aperitif-core' ),
			'tag'         => esc_html__( 'Posts tagged "%s"', 'aperitif-core' ),
			'author'      => esc_html__( 'Posted by %s', 'aperitif-core' ),
			'search'      => esc_html__( 'Search results for "%s"', 'aperitif-core' ),
			'404'         => esc_html__( '404 - Page not found', 'aperitif-core' ),
			'query_paged' => esc_html__( '(Page %s)', 'aperitif-core' )
		) );
		
		// Breadcrumbs variables
		$settings = apply_filters( 'aperitif_core_filter_breadcrumbs_settings', array(
			'wrap_before'  => '<div itemprop="breadcrumb" class="qodef-breadcrumbs">',
			'wrap_after'   => '</div>',
			'home_url'     => esc_url( home_url( '/' ) ),
			'link'         => '<a itemprop="url" class="qodef-breadcrumbs-link" href="%1$s"><span itemprop="title">' . '%2$s' . '</span></a>',
			'current_item' => '<span itemprop="title" class="qodef-breadcrumbs-current">' . '%1$s' . '</span>',
			'separator'    => '<span class="qodef-breadcrumbs-separator"></span>'
		) );
		
		$wrap_child = '';
		if ( is_home() && ! is_front_page() ) {
			$wrap = sprintf( $settings['link'], $settings['home_url'], $labels['home'] ) . $settings['separator'] . sprintf( $settings['current_item'], get_the_title() );
			
		} else {
			$wrap = sprintf( $settings['link'], $settings['home_url'], $labels['home'] ) . $settings['separator'];
			
			if ( is_tag() ) {
				$wrap_child .= sprintf( $settings['current_item'], sprintf( $labels['tag'], single_tag_title( '', false ) ) );
				
			} else if ( is_day() ) {
				$wrap_child .= sprintf( $settings['link'], get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $settings['separator'];
				$wrap_child .= sprintf( $settings['link'], get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ), get_the_time( 'F' ) ) . $settings['separator'];
				$wrap_child .= sprintf( $settings['current_item'], get_the_time( 'd' ) );
				
			} else if ( is_month() ) {
				$wrap_child .= sprintf( $settings['link'], get_year_link( get_the_time( 'Y' ) ), get_the_time( 'Y' ) ) . $settings['separator'];
				$wrap_child .= sprintf( $settings['current_item'], get_the_time( 'F' ) );
				
			} else if ( is_year() ) {
				$wrap_child .= sprintf( $settings['current_item'], get_the_time( 'Y' ) );
				
			} else if ( is_author() ) {
				$wrap_child .= sprintf( $settings['current_item'], sprintf( $labels['author'], get_the_author_meta( 'display_name', get_query_var( 'author' ) ) ) );
				
			} else if ( is_category() ) {
				$category = get_category( get_query_var( 'cat' ), false );
				
				if ( isset( $category->parent ) && $category->parent !== 0 ) {
					$wrap_child .= get_category_parents( $category->parent, true, $settings['separator'] );
				}
				
				$wrap_child .= sprintf( $settings['current_item'], single_cat_title( '', false ) );
				
			} else if ( is_search() ) {
				$wrap_child .= sprintf( $settings['current_item'], sprintf( $labels['search'], get_search_query() ) );
				
			} else if ( is_404() ) {
				$wrap_child .= sprintf( $settings['current_item'], $labels['404'] );
				
			} else if ( is_single() ) {
				if ( is_singular( 'post' ) ) {
					$category   = get_the_category();
					$wrap_child .= get_category_parents( $category[0], true, $settings['separator'] );
				}
				
				$wrap_child .= sprintf( $settings['current_item'], get_the_title() );
				
			} else if ( is_page() ) {
				global $post;
				
				if ( $post->post_parent ) {
					$parent_ids   = array();
					$parent_ids[] = $post->post_parent;
					
					foreach ( $parent_ids as $parent_id ) {
						$wrap_child .= sprintf( $settings['link'], get_the_permalink( $parent_id ), get_the_title( $parent_id ) ) . $settings['separator'];
					}
				}
				
				$wrap_child .= sprintf( $settings['current_item'], get_the_title() );
			}
			
			if ( get_query_var( 'paged' ) ) {
				$wrap_child .= sprintf( $settings['current_item'], sprintf( $labels['query_paged'], get_query_var( 'paged' ) ) );
			}
		}
		
		// Breadcrumbs html template
		$breadcrumbs_html = '';
		if ( ! empty( $wrap ) ) {
			$breadcrumbs_html = $settings['wrap_before'] . $wrap . apply_filters( 'aperitif_core_filter_breadcrumbs_content', $wrap_child, $settings ) . $settings['wrap_after'];
		}
		
		echo apply_filters( 'aperitif_core_filter_breadcrumbs_template', $breadcrumbs_html );
	}
}