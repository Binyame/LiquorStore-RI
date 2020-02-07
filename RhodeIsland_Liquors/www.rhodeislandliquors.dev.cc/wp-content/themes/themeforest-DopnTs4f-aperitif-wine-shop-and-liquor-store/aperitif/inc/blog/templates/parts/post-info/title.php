<?php
$title_tag = isset( $title_tag ) && ! empty( $title_tag ) ? $title_tag : 'h3';
?>
<<?php echo esc_attr( $title_tag ); ?> itemprop="name" class="qodef-e-title entry-title">
<?php if ( ! is_single() ) { ?>
<a itemprop="url" class="qodef-e-title-link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
	<?php } ?>
	<?php the_title(); ?>
	<?php if ( ! is_single() ) { ?>
</a>
<?php } ?>
</<?php echo esc_attr( $title_tag ); ?>>