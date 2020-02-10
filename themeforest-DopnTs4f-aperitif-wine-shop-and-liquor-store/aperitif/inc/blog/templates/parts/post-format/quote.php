<?php
$quote_meta       = get_post_meta( get_the_ID(), 'qodef_post_format_quote_text', true );
$quote_text       = ! empty( $quote_meta ) ? $quote_meta : get_the_title();
$background_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

if ( ! empty( $quote_text ) ) {
	$quote_author          = get_post_meta( get_the_ID(), 'qodef_post_format_quote_author', true );
	$quote_author_position = get_post_meta( get_the_ID(), 'qodef_post_format_quote_author_position', true );
	$title_tag             = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'h6';
	$author_title_tag      = isset( $author_title_tag ) && ! empty( $author_title_tag ) ? $author_title_tag : 'span';
	?>
<div class="qodef-e-quote" style="background-image: url('<?php echo esc_url( $background_image[0] ) ?>')">
	<<?php echo esc_attr( $title_tag ); ?>
	class="qodef-e-quote-text"><?php echo esc_html( $quote_text ); ?></<?php echo esc_attr( $title_tag ); ?>>
	<?php if ( ! empty( $quote_author ) ) { ?>
		<<?php echo esc_attr( $author_title_tag ); ?> class="qodef-e-quote-author"><?php echo esc_html( $quote_author ); ?></<?php echo esc_attr( $author_title_tag ); ?>>
	<?php } ?>
	<?php if ( ! empty( $quote_author_position ) ) { ?>
		<span class="qodef-e-quote-author-position"><?php echo esc_html( $quote_author_position ); ?></span>
	<?php } ?>
	<?php if ( ! is_single() ) { ?>
		<a itemprop="url" class="qodef-e-quote-url" href="<?php the_permalink(); ?>"
		   title="<?php the_title_attribute(); ?>"></a>
	<?php } ?>
	</div>
<?php } ?>