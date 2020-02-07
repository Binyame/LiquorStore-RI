<?php if ( $query_result->have_posts() ) {
	while ( $query_result->have_posts() ) : $query_result->the_post();
		aperitif_core_list_sc_template_part( 'post-types/restaurant-menu/shortcodes/restaurant-menu-list', 'layouts/' . $layout, '', $params );
	endwhile; // End of the loop.
} else {
	aperitif_core_template_part( 'post-types/restaurant-menu/shortcodes/restaurant-menu-list', 'templates/posts-not-found' );
}

wp_reset_postdata();