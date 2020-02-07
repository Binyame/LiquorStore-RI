<?php do_action( 'aperitif_action_before_page_header' ); ?>

<header id="qodef-page-header">
	<div id="qodef-page-header-inner">
		<?php aperitif_core_get_header_logo_image(); ?>
		<?php aperitif_core_template_part( 'header', 'layouts/vertical/templates/navigation' ); ?>
		<div class="qodef-vertical-widget-holder">
			<?php aperitif_core_get_header_widget_area(); ?>
		</div>
	</div>
</header>

