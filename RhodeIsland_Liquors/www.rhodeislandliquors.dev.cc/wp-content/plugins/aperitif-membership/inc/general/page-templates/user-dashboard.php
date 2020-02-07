<?php get_header(); ?>
<main id="qodef-page-content" class="qodef-grid qodef-layout--template <?php echo esc_attr( aperitif_membership_get_grid_gutter_classes() ); ?>">
	<div class="qodef-grid-inner clear">
		<div class="qodef-grid-item">
			<?php if ( have_posts() ) {
				while ( have_posts() ) : the_post();
					
					// Hook to include additional content before page content
					do_action( 'aperitif_membership_action_before_user_dashboard_page_content' );
					
					the_content();
					
					// Hook to include additional content after page content
					do_action( 'aperitif_membership_action_after_user_dashboard_page_content' );
				
				endwhile; // End of the loop.
			} ?>
		</div>
	</div>
</main>
<?php get_footer(); ?>