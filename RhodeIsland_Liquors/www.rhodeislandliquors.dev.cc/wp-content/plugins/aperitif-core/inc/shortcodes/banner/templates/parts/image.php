<div class="qodef-m-image">
	<?php if ( $hover_image ) { ?>
	<div class="qodef-m-hover-image">
		<?php
		echo wp_get_attachment_image( $hover_image, 'full' );
		echo wp_get_attachment_image( $image, 'full' );
		?>
	</div>
	<?php } else {
		echo wp_get_attachment_image( $image, 'full' );
	} ?>
</div>
