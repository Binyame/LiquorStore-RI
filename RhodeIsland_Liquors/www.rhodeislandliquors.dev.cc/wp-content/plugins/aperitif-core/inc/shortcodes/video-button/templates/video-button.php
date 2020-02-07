<?php
$rand       = rand( 0, 1000 );
$link_class = ! empty( $play_button_hover_image ) ? 'qodef-vb-has-hover-image' : '';
?>
<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<?php aperitif_core_template_part( 'shortcodes/video-button', 'templates/parts/image', '', $params ) ?>
	<?php aperitif_core_template_part( 'shortcodes/video-button', 'templates/parts/button', '', $params ) ?>

</div>