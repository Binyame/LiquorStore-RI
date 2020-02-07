<?php if ( has_post_thumbnail() ) { ?>
	<div class="qodef-e-image">
		<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			<?php the_post_thumbnail( 'thumbnail' ); ?>
		</a>
	</div>
<?php } ?>