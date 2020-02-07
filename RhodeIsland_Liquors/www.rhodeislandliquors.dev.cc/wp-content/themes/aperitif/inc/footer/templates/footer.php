<footer id="qodef-page-footer">
	<div class="qodef-page-footer-inner">
		<?php
		// Hook to include additional content before page footer content
		do_action( 'aperitif_action_before_page_footer_content' );
		
		// Include module content template
		echo apply_filters( 'aperitif_filter_footer_content_template', aperitif_get_template_part( 'footer', 'templates/footer-content' ) );
		
		// Hook to include additional content after page footer content
		do_action( 'aperitif_action_after_page_footer_content' );
		?>
	</div>
</footer>