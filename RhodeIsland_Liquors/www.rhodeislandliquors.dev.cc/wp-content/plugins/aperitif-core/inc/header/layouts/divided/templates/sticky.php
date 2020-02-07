<div class="qodef-header-sticky">
	<div class="qodef-header-sticky-inner  <?php echo apply_filters( 'aperitif_filter_header_inner_class', '' ); ?>">
		<div class="qodef-divided--left">
			<?php
			aperitif_core_get_header_widget_area( 'sticky', 'two' );
			aperitif_core_template_part( 'header/layouts/divided', 'templates/parts/left-navigation' );
			?>
		</div>
		
		<?php aperitif_core_get_header_logo_image(); ?>
		
		<div class="qodef-divided--right">
			<?php
			aperitif_core_template_part( 'header/layouts/divided', 'templates/parts/right-navigation' );
			aperitif_core_get_header_widget_area( 'sticky', 'one' );
			?>
		</div>
		<?php do_action( 'aperitif_core_action_after_sticky_header' ); ?>
	</div>
</div>