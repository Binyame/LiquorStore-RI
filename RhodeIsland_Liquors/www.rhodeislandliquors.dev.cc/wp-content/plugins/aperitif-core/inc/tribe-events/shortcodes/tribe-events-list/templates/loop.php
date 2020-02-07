<?php if ( $query_result->have_posts() ) {
	while ( $query_result->have_posts() ) : $query_result->the_post();
		$params['image_dimension'] = $this_shortcode->get_list_item_image_dimension( $params );
		
		aperitif_core_list_sc_template_part( 'tribe-events/shortcodes/tribe-events-list', 'layouts/' . $layout, '', $params );
	endwhile; // End of the loop.
} else {
	aperitif_core_template_part( 'tribe-events/shortcodes/tribe-events-list', 'templates/posts-not-found' );
}

wp_reset_postdata();