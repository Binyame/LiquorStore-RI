<?php

/*************** YITH QUICK VIEW CONTENT FILTERS - begin ***************/

// Remove all instances of quick view button injected by plugin, we will add it as shortcode where we need it...
remove_action( 'woocommerce_after_shop_loop_item', array(
	YITH_WCQV_Frontend::get_instance(),
	'yith_add_quick_view_button'
), 15 );

// Image hook
// woocommerce_show_product_sale_flash - 10
// woocommerce_show_product_images - 20

add_action( 'yith_wcqv_product_image', 'aperitif_core_add_product_single_image_holder', 5 );
add_action( 'yith_wcqv_product_image', 'aperitif_core_add_out_of_stock_mark_on_product', 10 );
add_action( 'yith_wcqv_product_image', 'aperitif_core_add_new_mark_on_product', 10 );
add_action( 'yith_wcqv_product_image', 'aperitif_core_add_product_single_image_holder_end', 20 );

// Summary hook
// woocommerce_template_single_title - 5
// woocommerce_template_single_rating - 10
// woocommerce_template_single_price - 15
// woocommerce_template_single_excerpt - 20
// woocommerce_template_single_add_to_cart - 25

// Change default w/ our title
remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'yith_wcqv_product_summary', 'aperitif_core_woo_template_single_title', 5 );

// Remove meta
remove_action( 'yith_wcqv_product_summary', 'woocommerce_template_single_meta', 30 );

// Add wishlist
//add_action( 'yith_wcqv_product_summary', 'aperitif_core_woo_get_yith_wishlist_shortcode', 30 );

/*************** YITH QUICK VIEW CONTENT FILTERS - end ***************/