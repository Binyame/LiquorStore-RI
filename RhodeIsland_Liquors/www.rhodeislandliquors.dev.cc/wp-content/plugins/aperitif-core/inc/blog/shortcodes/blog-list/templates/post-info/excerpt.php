<?php

if ( post_password_required() ) {
	echo get_the_password_form();
} else {
	$excerpt = get_the_excerpt();
	
	if ( ! isset( $excerpt_length ) || ( isset( $excerpt_length ) && $excerpt_length === '' ) ) {
		$excerpt_length = aperitif_get_blog_list_excerpt_length();
	}
	
	if ( ! empty( $excerpt ) ) {
		$new_excerpt = ( $excerpt_length > 0 ) ? substr( $excerpt, 0, intval( $excerpt_length ) ) : $excerpt;
		?>
		<p itemprop="description" class="qodef-e-excerpt">
			<?php echo strip_tags( $new_excerpt ); ?>
		</p>
	<?php }
} ?>