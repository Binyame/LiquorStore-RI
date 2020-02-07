<article <?php post_class( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php aperitif_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/media', '', $params ); ?>
		<div class="qodef-e-content">
			<div class="qodef-e-info qodef-info--top">
				<?php
				// Include post date info
				aperitif_template_part( 'blog', 'templates/parts/post-info/date' );
				
				// Include post author info
				aperitif_template_part( 'blog', 'templates/parts/post-info/author' );
				
				// Include post category info
				aperitif_template_part( 'blog', 'templates/parts/post-info/category');
				?>
			</div>
			<div class="qodef-e-text">
				<?php aperitif_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/title', '', $params ); ?>
				<?php aperitif_core_template_part( 'blog/shortcodes/blog-list', 'templates/post-info/excerpt', '', $params ); ?>
			</div>
			<div class="qodef-e-info qodef-info--bottom">
				<div class="qodef-e-info-left">
					<?php
					// Include post category info
					aperitif_core_theme_template_part( 'blog', 'templates/parts/post-info/read-more' );
					?>
				</div>
			</div>
		</div>
	</div>
</article>