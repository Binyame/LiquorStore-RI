<div class="qodef-m-info clearfix">
	<div class="qodef-m-thumbnails-holder qodef-grid qodef-layout--columns qodef-gutter--small qodef-col-num--2 qodef--no-bottom-space">
		<div class="qodef-grid-inner clear">
			<?php foreach ( $items as $image_item ): ?>
				<div class="qodef-m-thumbnail qodef-grid-item">
					<div class="qodef-m-thumbnail-inner">
						<?php echo wp_get_attachment_image( $image_item['thumbnail_image'], 'full' ); ?>
					</div>
					<h6><?php echo esc_attr( $image_item['item_text'] ); ?></h6>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>