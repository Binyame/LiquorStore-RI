<?php
$item_label = isset( $item_label ) && ! empty( $item_label ) ? $item_label : '';

if ( ! empty( $item_label ) ) {
	$item_class = isset( $item_class ) && ! empty( $item_class ) ? $item_class : '';
	$item_link  = isset( $item_link ) && ! empty( $item_link ) ? $item_link : '#';
	?>
	<li class="qodef-m-navigation-item qodef-e <?php echo esc_attr( $item_class ); ?>">
		<a class="qodef-e-link" href="<?php echo esc_attr( $item_link ); ?>">
			<span class="qodef-e-label"><?php echo esc_html( $item_label ); ?></span>
		</a>
	</li>
<?php } ?>