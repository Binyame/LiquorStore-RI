<?php
$hide_text_info = aperitif_core_get_post_value_through_levels( 'qodef_title_hide_info' );

// Load title image template
aperitif_core_get_page_title_image(); ?>

<?php if ( $hide_text_info === 'no' ) { ?>
	<div class="qodef-m-content <?php echo esc_attr( aperitif_core_get_page_title_content_classes() ); ?>">
		<?php aperitif_core_breadcrumbs(); ?>
	</div>
<?php } ?>