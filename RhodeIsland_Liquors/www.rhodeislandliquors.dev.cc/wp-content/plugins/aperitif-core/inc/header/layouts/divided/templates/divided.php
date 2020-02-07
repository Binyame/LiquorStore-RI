<div class="qodef-divided--left">
	<?php
	aperitif_core_get_header_widget_area( '', 'two' );
	aperitif_core_template_part( 'header/layouts/divided', 'templates/parts/left-navigation' );
	?>
</div>

<?php aperitif_core_get_header_logo_image(); ?>

<div class="qodef-divided--right">
	<?php
	aperitif_core_template_part( 'header/layouts/divided', 'templates/parts/right-navigation' );
	aperitif_core_get_header_widget_area( '', 'one' );
	?>
</div>


