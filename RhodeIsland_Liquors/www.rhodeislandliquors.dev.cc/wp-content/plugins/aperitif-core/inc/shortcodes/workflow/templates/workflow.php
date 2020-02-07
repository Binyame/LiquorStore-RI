<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	
	<div class="qodef-e-workflow-image">
		<?php echo wp_get_attachment_image( $image, 'full' ) ?>
	</div>
	
	<?php foreach ( $items as $key => $item ):
		$item['number'] = $key;
		?>
		
		<div class="qodef-e-workflow-item">
			<div class="qodef-e-workflow-item-inner">
				
				<div class="qodef-e-workflow-text">
					<p class="qodef-e-subtitle"><?php echo esc_html( $item['subtitle'] ); ?></p>
					<h5 class="qodef-e-title"><?php echo esc_html( $item['title'] ); ?></h5>
					<p class="qodef-e-text"><?php echo wp_kses( $item['text'], array( 'br' => array() ) ) ?></p>
				</div>
			
			</div>
		</div>
	<?php endforeach; ?>

</div>