<?php

if ( post_password_required() ) {
	echo get_the_password_form();
} else {
	$excerpt = get_the_excerpt();
	
	if ( ! empty( $excerpt ) ) {
		$excerpt_length = aperitif_get_search_page_excerpt_length();
		$new_excerpt    = ( $excerpt_length > 0 ) ? substr( $excerpt, 0, intval( $excerpt_length ) ) : $excerpt;
		?>
		<p itemprop="description" class="qodef-e-excerpt">
			<?php echo strip_tags( $new_excerpt ); ?>
		</p>
	<?php }
} ?>