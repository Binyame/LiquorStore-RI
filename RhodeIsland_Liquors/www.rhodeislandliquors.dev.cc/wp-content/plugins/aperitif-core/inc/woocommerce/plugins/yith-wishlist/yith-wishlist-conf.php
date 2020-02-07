<?php

/*************** YITH WISHLIST FILTERS - begin ***************/

// Remove quick view button from wishlist
remove_all_actions( 'yith_wcwl_table_after_product_name' );

// Add social share template
add_action( 'yith_wcwl_before_wishlist_share', 'aperitif_core_woo_product_render_social_share_html' );

/*************** YITH WISHLIST FILTERS - end ***************/

