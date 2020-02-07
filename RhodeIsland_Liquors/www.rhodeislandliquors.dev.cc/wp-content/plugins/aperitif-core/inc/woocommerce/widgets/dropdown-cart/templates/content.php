<?php aperitif_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/parts/opener' ); ?>
<div class="qodef-m-dropdown">
	<div class="qodef-m-dropdown-inner">
		<?php if ( ! WC()->cart->is_empty() ) {
			aperitif_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/parts/loop' );
			
			aperitif_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/parts/order-details' );
			
			aperitif_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/parts/button' );
		} else {
			aperitif_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/posts-not-found' );
		} ?>
	</div>
</div>