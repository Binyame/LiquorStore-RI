<?php
$text = get_post_meta( get_the_ID(), 'qodef_testimonials_text', true );
if ( ! empty ( $text ) ) { ?>
	<p class="qodef-e-text">
		<?php echo esc_html( $text ); ?>
	</p>
<?php }