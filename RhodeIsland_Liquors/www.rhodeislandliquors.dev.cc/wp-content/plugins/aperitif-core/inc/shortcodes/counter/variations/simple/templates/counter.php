<div <?php qode_framework_class_attribute( $holder_classes ); ?> <?php qode_framework_inline_attrs( $data_attrs ); ?>>
	<div class="qodef-m-digit-wrapper">
		<?php aperitif_core_template_part( 'shortcodes/counter', 'variations/' . $layout . '/templates/parts/digit', '', $params ) ?>
	</div>
	<div class="qodef-m-content">
		<?php aperitif_core_template_part( 'shortcodes/counter', 'variations/' . $layout . '/templates/parts/title', '', $params ) ?>
		<?php aperitif_core_template_part( 'shortcodes/counter', 'variations/' . $layout . '/templates/parts/text', '', $params ) ?>
	</div>
</div>