<?php
get_header();
aperitifget_title();
get_template_part( 'slider' );
do_action( 'aperitifaction_before_main_content' );
?>
<div class="qodef-container">
	<?php do_action( 'aperitifaction_after_container_open' ); ?>
	<div class="qodef-container-inner clearfix">
		<div id="tribe-events-pg-template">
			<?php tribe_events_before_html(); ?>
			<?php tribe_get_view(); ?>
			<?php tribe_events_after_html(); ?>
		</div> <!-- #tribe-events-pg-template -->
		<?php do_action( 'aperitifaction_page_after_content' ); ?>
	</div>
	<?php do_action( 'aperitifaction_before_container_close' ); ?>
</div>
<?php get_footer(); ?>
