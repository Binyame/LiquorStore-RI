<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<div class="qodef-grid-inner clear">
		<?php
		// Include items
		aperitif_core_template_part( 'post-types/restaurant-menu/shortcodes/restaurant-menu-list', 'templates/loop', '', $params );
		?>
	</div>
</div>