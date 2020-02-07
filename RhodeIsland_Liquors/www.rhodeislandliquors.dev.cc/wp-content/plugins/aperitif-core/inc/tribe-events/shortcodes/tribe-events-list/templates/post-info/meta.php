<div class="qodef-e-meta-item">
	<span class="qodef-e-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-calendar', 'linea-icons' ); ?></span>
	<span class="qodef-e-meta-value"><?php echo tribe_get_start_date( null, false ); ?></span>
</div>

<div class="qodef-e-meta-item">
	<span class="qodef-e-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-clessidre', 'linea-icons' ); ?></span>
	<span class="qodef-e-meta-value"><?php echo tribe_get_start_time(); ?> - <?php echo tribe_get_end_time(); ?></span>
</div>

<?php if ( tribe_has_venue() ) : ?>
	<?php if ( tribe_address_exists() ) : ?>
		<div class="qodef-e-meta-item">
			<span class="qodef-e-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-geolocalize-05', 'linea-icons' ); ?></span>
			<span class="qodef-e-meta-value"><?php echo tribe_get_address(); ?></span>
		</div>
	<?php endif; ?>
<?php endif; ?>