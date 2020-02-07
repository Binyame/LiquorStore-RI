<?php if ( aperitif_is_footer_bottom_area_enabled() ) { ?>
	<div id="qodef-page-footer-bottom-area">
		<div id="qodef-page-footer-bottom-area-inner"
		     class="<?php echo esc_attr( aperitif_get_footer_bottom_area_classes() ); ?>">
			<div class="<?php echo esc_attr( aperitif_get_footer_bottom_area_columns_classes() ); ?>">
				<div class="qodef-grid-inner clear">
					<?php for ( $i = 1; $i <= intval( aperitif_get_page_footer_sidebars_config_by_key( 'footer_bottom_sidebars_number' ) ); $i ++ ) { ?>
						<div class="qodef-grid-item">
							<?php if ( is_active_sidebar( 'footer_bottom_area_column_' . $i ) ) {
								dynamic_sidebar( 'footer_bottom_area_column_' . $i );
							} ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
<?php } ?>