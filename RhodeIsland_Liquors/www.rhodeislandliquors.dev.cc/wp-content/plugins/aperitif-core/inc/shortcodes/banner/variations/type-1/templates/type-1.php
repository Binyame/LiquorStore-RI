<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<?php aperitif_core_template_part( 'shortcodes/banner', 'templates/parts/image', '', $params ) ?>
	<div class="qodef-m-content">
		<div class="qodef-m-content-inner">
			<?php aperitif_core_template_part( 'shortcodes/banner', 'templates/parts/subtitle', '', $params ) ?>
			<?php aperitif_core_template_part( 'shortcodes/banner', 'templates/parts/title', '', $params ) ?>
			<?php aperitif_core_template_part( 'shortcodes/banner', 'templates/parts/text', '', $params ) ?>
			<?php aperitif_core_template_part( 'shortcodes/banner', 'templates/parts/button', '', $params ) ?>
		</div>
	
	</div>
	<?php aperitif_core_template_part( 'shortcodes/banner', 'templates/parts/link', '', $params ) ?>
</div>