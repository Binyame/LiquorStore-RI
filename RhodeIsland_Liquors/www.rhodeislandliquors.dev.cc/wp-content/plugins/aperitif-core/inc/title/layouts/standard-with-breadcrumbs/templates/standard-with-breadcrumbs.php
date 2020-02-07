<?php
$hide_text_info = aperitif_core_get_post_value_through_levels( 'qodef_title_hide_info' );

// Load title image template
aperitif_core_get_page_title_image(); ?>

<?php if ( $hide_text_info === 'no' ) { ?>
	<div class="qodef-m-content <?php echo esc_attr( aperitif_core_get_page_title_content_classes() ); ?>">
		<h1 class="qodef-m-title entry-title">
			<?php if ( qode_framework_is_installed( 'theme' ) ) {
				echo esc_html( aperitif_get_page_title_text() );
			} else {
				echo get_option( 'blogname' );
			} ?>
		</h1>
		<?php aperitif_core_breadcrumbs(); ?>
	</div>
<?php } ?>