<?php

// Hook to include additional content before blog post item
do_action( 'aperitif_action_before_blog_post_item' );

if ( have_posts() ) {
	while ( have_posts() ) : the_post();
		// Include post item
		if ( is_single() ) {
			aperitif_template_part( 'blog', 'templates/parts/single/post', get_post_format() );
		} else {
			aperitif_template_part( 'blog', 'templates/parts/list/post', get_post_format() );
		}
	endwhile; // End of the loop.
} else {
	// Include posts not found
	aperitif_template_part( 'blog', 'templates/parts/posts-not-found' );
}

// Hook to include additional content after blog post item
do_action( 'aperitif_action_after_blog_post_item' );

wp_reset_postdata();