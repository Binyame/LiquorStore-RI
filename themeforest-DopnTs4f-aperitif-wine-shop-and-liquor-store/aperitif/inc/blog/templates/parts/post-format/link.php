<?php
$link_url_meta    = get_post_meta( get_the_ID(), 'qodef_post_format_link', true );
$link_url         = ! empty( $link_url_meta ) ? $link_url_meta : get_the_permalink();
$link_text_meta   = get_post_meta( get_the_ID(), 'qodef_post_format_link_text', true );
$background_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );

if ( aperitif_get_blog_module() == 'list' ) {
	$post_link = get_the_permalink();
} else if ( ! empty( $post_link_meta ) ) {
	$post_link = esc_html( $post_link_meta );
} else {
	$post_link = $link_url_meta;
}

if ( ! empty( $link_url ) ) {
	$link_text = ! empty( $link_text_meta ) ? $link_text_meta : get_the_title();
	$title_tag = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'h4';
	?>
<div class="qodef-e-link" style="background-image: url('<?php echo esc_url( $background_image[0] ) ?>')">
	
	<<?php echo esc_attr( $title_tag ); ?>
	class="qodef-e-link-text"><?php echo esc_html( $link_text ); ?></<?php echo esc_attr( $title_tag ); ?>>
	<span class="qodef-e-link-title"><?php echo esc_html( $link_url_meta ); ?></span>
	
	<?php if ( isset( $post_link ) && $post_link != '' ) { ?>
		<a itemprop="url" class="qodef-e-link-url" href="<?php echo esc_url( $post_link ); ?>" target="_blank"></a>
	<?php } ?>
	</div>
<?php } ?>