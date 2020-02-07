<?php

if ( ! function_exists( 'aperitif_core_add_woo_dropdown_cart_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function aperitif_core_add_woo_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'AperitifCoreWooDropDownCartWidget';
		
		return $widgets;
	}
	
	add_filter( 'aperitif_core_filter_register_widgets', 'aperitif_core_add_woo_dropdown_cart_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AperitifCoreWooDropDownCartWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_base( 'aperitif_core_woo_dropdown_cart' );
			$this->set_name( esc_html__( 'Aperitif WooCommerce DropDown Cart', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Display a shop cart icon with a dropdown that shows products that are in the cart', 'aperitif-core' ) );
			$this->set_widget_option(
				array(
					'field_type'  => 'text',
					'name'        => 'widget_padding',
					'title'       => esc_html__( 'Widget Padding', 'aperitif-core' ),
					'description' => esc_html__( 'Insert padding in format: top right bottom left', 'aperitif-core' )
				)
			);
		}
		
		public function render( $atts ) {
			$styles = array();
			
			if ( ! empty( $atts['widget_padding'] ) ) {
				$styles[] = 'padding: ' . $atts['widget_padding'];
			}
			?>
			<div class="qodef-woo-dropdown-cart qodef-m" <?php qode_framework_inline_style( $styles ) ?>>
				<div class="qodef-woo-dropdown-cart-inner qodef-m-inner">
					<?php aperitif_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/content' ); ?>
				</div>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'aperitif_core_woo_dropdown_cart_add_to_cart_fragment' ) ) {
	function aperitif_core_woo_dropdown_cart_add_to_cart_fragment( $fragments ) {
		ob_start();
		?>
		<div class="qodef-woo-dropdown-cart-inner qodef-m-inner">
			<?php aperitif_core_template_part( 'woocommerce/widgets/dropdown-cart', 'templates/content' ); ?>
		</div>
		
		<?php
		$fragments['.qodef-woo-dropdown-cart-inner'] = ob_get_clean();
		
		return $fragments;
	}
	
	add_filter( 'woocommerce_add_to_cart_fragments', 'aperitif_core_woo_dropdown_cart_add_to_cart_fragment' );
}
?>