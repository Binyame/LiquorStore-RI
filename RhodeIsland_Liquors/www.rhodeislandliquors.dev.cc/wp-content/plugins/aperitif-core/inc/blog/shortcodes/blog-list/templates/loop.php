<?php if ( $query_result->have_posts() ) {
	while ( $query_result->have_posts() ) : $query_result->the_post();
		$params['image_dimension'] = $this_shortcode->get_list_item_image_dimension( $params );
		$params['item_classes']    = $this_shortcode->get_item_classes( $params );
		
		aperitif_core_list_sc_template_part( 'blog/shortcodes/blog-list', 'layouts/' . $layout, get_post_format(), $params );
	endwhile; // End of the loop.
} else {
	aperitif_core_template_part( 'blog/shortcodes/blog-list', 'templates/posts-not-found' );
}

wp_reset_postdata();