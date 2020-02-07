<article <?php post_class( 'qodef-blog-item qodef-e' ); ?>>
	<div class="qodef-e-inner">
		<?php
		// Include post format part
		aperitif_template_part( 'blog', 'templates/parts/post-format/quote' ); ?>
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
				<?php
				// Include post content
				the_content();
				
				// Hook to include additional content after blog single content
				do_action( 'aperitif_action_after_blog_single_content' );
				?>
			</div>
			<div class="qodef-e-info qodef-info--bottom">
				<div class="qodef-e-info-left">
					<?php
					// Include post tags info
					aperitif_template_part( 'blog', 'templates/parts/post-info/tags' );
					?>
				</div>
				<?php if ( aperitif_is_installed( 'core' ) ): ?>
					<div class="qodef-e-info-right">
						<?php
						// Include post social share info
						aperitif_template_part( 'blog', 'templates/parts/post-info/social-share' );
						?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</article>