<?php

if ( ! function_exists( 'aperitif_core_include_blog_single_related_posts_template' ) ) {
	/**
	 * Function which includes additional module on single posts page
	 */
	function aperitif_core_include_blog_single_related_posts_template() {
		if ( is_single() ) {
			include_once 'templates/related-posts.php';
		}
	}
	
	add_action( 'aperitif_action_after_blog_post_item', 'aperitif_core_include_blog_single_related_posts_template', 25 );  // permission 25 is set to define template position
}

if ( ! function_exists( 'aperitif_core_get_blog_single_related_posts_type' ) ) {
	/**
	 * Function which return related posts types for forward post item
	 *
	 * @param $post_id int
	 *
	 * @return array
	 */
	function aperitif_core_get_blog_single_related_posts_type( $post_id ) {
		$related_posts = array();
		
		if ( ! empty( $post_id ) ) {
			$allowed_types = array(
				'post_tag' => get_the_tags( $post_id ),
				'category' => get_the_category( $post_id )
			);
			
			foreach ( $allowed_types as $key => $value ) {
				$term_ids = array();
				
				if ( ! empty( $value ) ) {
					foreach ( $value as $term ) {
						$term_ids[] = $term->term_id;
					}
				}
				
				if ( ! empty( $term_ids ) ) {
					$related_posts_by_term = aperitif_core_get_blog_single_related_posts_by_term( $post_id, $term_ids, $key );
					
					if ( ! empty( $related_posts_by_term->posts ) ) {
						$related_posts = array(
							'taxonomy' => $key,
							'items'    => $term_ids
						);
						
						return $related_posts;
						break;
					}
				}
			}
		}
		
		return $related_posts;
	}
}

if ( ! function_exists( 'aperitif_core_get_blog_single_related_posts_by_term' ) ) {
	/**
	 * Function which return related posts query object
	 *
	 * @param $post_id int
	 * @param $term_ids array
	 * @param $slug string
	 *
	 * @return WP_Query
	 */
	function aperitif_core_get_blog_single_related_posts_by_term( $post_id, $term_ids, $slug ) {
		$args = array(
			'post_status'    => 'publish',
			'post__not_in'   => array( $post_id ),
			$slug . '__in'   => $term_ids,
			'order'          => 'DESC',
			'orderby'        => 'date',
			'posts_per_page' => 8
			// 8 is random value in case that someone change with filter number of posts for related posts item
		);
		
		$related_posts = new WP_Query( $args );
		
		return $related_posts;
	}
}