<div <?php qode_framework_class_attribute( $holder_classes ); ?>>
	<a class="qodef-social-share-dropdown-opener" href="javascript:void(0)">
		<i class="qodef-social-share-icon icon-basic-share"></i>
	</a>
	<div class="qodef-social-share-dropdown">
		<ul class="qodef-shortcode-list">
			<?php foreach ( $social_networks as $net ) {
				echo wp_kses( $net, array(
					'li'   => array(
						'class' => true
					),
					'a'    => array(
						'itemprop' => true,
						'class'    => true,
						'href'     => true,
						'target'   => true,
						'onclick'  => true
					),
					'img'  => array(
						'itemprop' => true,
						'class'    => true,
						'src'      => true,
						'alt'      => true
					),
					'span' => array(
						'class' => true
					)
				) );
			} ?>
		</ul>
	</div>
</div>