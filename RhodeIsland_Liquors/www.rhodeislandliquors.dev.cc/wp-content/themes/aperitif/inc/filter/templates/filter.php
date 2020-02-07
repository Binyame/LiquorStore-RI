<?php if ( isset( $enable_filter ) && $enable_filter === 'yes' ) {
	$filter_items = aperitif_get_filter_items( $params );
	?>
	<div class="qodef-m-filter">
		<?php if ( ! empty( $filter_items ) ) { ?>
			<div class="qodef-m-filter-items">
				<a class="qodef-m-filter-item qodef--active" href="#"
				   data-taxonomy="<?php echo esc_attr( $taxonomy_filter ); ?>" data-filter="*">
					<span class="qodef-m-filter-item-name"><?php esc_html_e( 'Show All', 'aperitif' ) ?></span>
				</a>
				<?php foreach ( $filter_items as $item ) { ?>
					<a class="qodef-m-filter-item" href="#" data-taxonomy="<?php echo esc_attr( $taxonomy_filter ); ?>"
					   data-filter="<?php echo esc_attr( $item->slug ); ?>">
						<span class="qodef-m-filter-item-name"><?php echo esc_html( $item->name ); ?></span>
					</a>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
<?php } ?>