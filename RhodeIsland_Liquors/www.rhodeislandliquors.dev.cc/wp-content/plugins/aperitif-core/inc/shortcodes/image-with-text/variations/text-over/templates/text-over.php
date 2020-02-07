<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<?php aperitif_core_template_part( 'shortcodes/image-with-text', 'templates/parts/image', '', $params ) ?>
	<div class="qodef-m-title-holder">
		<?php aperitif_core_template_part( 'shortcodes/image-with-text', 'templates/parts/title', '', $params ) ?>
	</div>
	<div class="qodef-m-content">
		<?php aperitif_core_template_part( 'shortcodes/image-with-text', 'templates/parts/text', '', $params ) ?>
	</div>
</div>