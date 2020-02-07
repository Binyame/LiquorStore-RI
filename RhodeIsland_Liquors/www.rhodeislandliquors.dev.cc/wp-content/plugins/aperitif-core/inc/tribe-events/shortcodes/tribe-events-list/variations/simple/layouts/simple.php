<div <?php qode_framework_class_attribute( $item_classes ); ?>>
	<div class="qodef-e-inner">
		<?php aperitif_core_template_part( 'tribe-events/shortcodes/tribe-events-list', 'templates/post-info/image', '', $params ); ?>
		<div class="qodef-e-content">
			<?php aperitif_core_template_part( 'tribe-events/shortcodes/tribe-events-list', 'templates/post-info/title', '', $params ); ?>
			
			<?php do_action( 'tribe_events_before_the_meta' ) ?>
			
			<div class="qodef-e-meta">
				<?php aperitif_core_template_part( 'tribe-events/shortcodes/tribe-events-list', 'templates/post-info/meta', '', $params ); ?>
			</div>
			
			<?php do_action( 'tribe_events_after_the_meta' ) ?>
			
			<?php aperitif_core_template_part( 'tribe-events/shortcodes/tribe-events-list', 'templates/post-info/read-more', '', $params ); ?>
		</div>
	</div>
</div>