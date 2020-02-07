<?php if ( $show_header_area ) { ?>
	<div id="qodef-top-area">
		<div class="qodef-top-area-wrapper qodef-content-grid">
			<div class="qodef-top-area-left">
				<?php aperitif_core_get_header_widget_area( 'top-area-left' ); ?>
			</div>
			<div class="qodef-top-area-right">
				<?php aperitif_core_get_header_widget_area( 'top-area-right' ); ?>
			</div>
			<?php do_action( 'aperitif_core_action_after_top_area' ); ?>
		</div>
	</div>
<?php } ?>