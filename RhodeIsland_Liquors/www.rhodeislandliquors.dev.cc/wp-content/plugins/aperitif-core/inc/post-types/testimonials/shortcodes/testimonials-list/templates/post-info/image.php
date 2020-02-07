<?php if ( has_post_thumbnail() ) { ?>
	<div class="qodef-e-media-image">
		<span class="qodef-e-media-quote">”</span>
		<?php the_post_thumbnail( array( 90, 90 ) ); ?>
	</div>
<?php } ?>