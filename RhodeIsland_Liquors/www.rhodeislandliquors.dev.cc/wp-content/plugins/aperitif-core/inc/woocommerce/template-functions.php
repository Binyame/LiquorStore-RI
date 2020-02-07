<?php

/**
 * Global templates hooks
 */

if ( ! function_exists( 'aperitif_core_add_main_woo_page_template_holder' ) ) {
	/**
	 * Function that render additional content for main shop page
	 */
	function aperitif_core_add_main_woo_page_template_holder() {
		echo '<main id="qodef-page-content" class="qodef-grid qodef-layout--template qodef--no-bottom-space ' . esc_attr( aperitif_core_get_grid_gutter_classes() ) . '"><div class="qodef-grid-inner clear">';
	}
}

if ( ! function_exists( 'aperitif_core_add_main_woo_page_template_holder_end' ) ) {
	/**
	 * Function that render additional content for main shop page
	 */
	function aperitif_core_add_main_woo_page_template_holder_end() {
		echo '</div></main>';
	}
}

if ( ! function_exists( 'aperitif_core_add_main_woo_page_holder' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 */
	function aperitif_core_add_main_woo_page_holder() {
		$classes = array();
		
		// add class to pages with sidebar and on single page
		if ( aperitif_core_is_woo_page( 'shop' ) || aperitif_core_is_woo_page( 'category' ) || aperitif_core_is_woo_page( 'tag' ) || aperitif_core_is_woo_page( 'single' ) ) {
			$classes[] = 'qodef-grid-item';
		}
		
		// add class to pages with sidebar
		if ( aperitif_core_is_woo_page( 'shop' ) || aperitif_core_is_woo_page( 'category' ) || aperitif_core_is_woo_page( 'tag' ) ) {
			$classes[] = aperitif_core_get_page_content_sidebar_classes();
		}
		
		$classes[] = aperitif_core_get_woo_main_page_classes();
		
		echo '<div id="qodef-woo-page" ' . qode_framework_get_class_attribute( $classes ) . '>';
	}
}

if ( ! function_exists( 'aperitif_core_add_main_woo_page_holder_end' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 */
	function aperitif_core_add_main_woo_page_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'aperitif_core_add_main_woo_page_sidebar_holder' ) ) {
	/**
	 * Function that render sidebar layout for main shop page
	 */
	function aperitif_core_add_main_woo_page_sidebar_holder() {
		
		if ( ! is_singular( 'product' ) ) {
			// Include page content sidebar
			aperitif_core_theme_template_part( 'sidebar', 'templates/sidebar' );
		}
	}
}

if ( ! function_exists( 'aperitif_core_woo_render_product_categories' ) ) {
	/**
	 * Function that render product categories
	 *
	 * @param $before string
	 * @param $after string
	 */
	function aperitif_core_woo_render_product_categories( $before = '', $after = '' ) {
		echo aperitif_core_woo_get_product_categories( $before, $after );
	}
}

if ( ! function_exists( 'aperitif_core_woo_get_product_categories' ) ) {
	/**
	 * Function that render product categories
	 *
	 * @param $before string
	 * @param $after string
	 *
	 * @return string
	 */
	function aperitif_core_woo_get_product_categories( $before = '', $after = '' ) {
		$product = aperitif_core_woo_get_global_product();
		
		return ! empty( $product ) ? wc_get_product_category_list( $product->get_id(), '<span class="qodef-category-separator"></span>', $before, $after ) : '';
	}
}

if ( ! function_exists( 'aperitif_core_woo_render_product_tags' ) ) {
	/**
	 * Function that render product tags
	 *
	 * @param $before string
	 * @param $after string
	 */
	function aperitif_core_woo_render_product_tags( $before = '', $after = '' ) {
		echo aperitif_core_woo_get_product_tags( $before, $after );
	}
}

if ( ! function_exists( 'aperitif_core_woo_get_product_tags' ) ) {
	/**
	 * Function that render product tags
	 *
	 * @param $before string
	 * @param $after string
	 *
	 * @return string
	 */
	function aperitif_core_woo_get_product_tags( $before = '', $after = '' ) {
		$product = aperitif_core_woo_get_global_product();
		
		return ! empty( $product ) ? wc_get_product_tag_list( $product->get_id(), '<span class="qodef-category-separator"></span>', $before, $after ) : '';
	}
}

/**
 * Shop page templates hooks
 */

if ( ! function_exists( 'aperitif_core_add_results_and_ordering_holder' ) ) {
	/**
	 * Function that render additional content around results and ordering templates on main shop page
	 */
	function aperitif_core_add_results_and_ordering_holder() {
		echo '<div class="qodef-woo-results">';
	}
}

if ( ! function_exists( 'aperitif_core_add_results_and_ordering_holder_end' ) ) {
	/**
	 * Function that render additional content around results and ordering templates on main shop page
	 */
	function aperitif_core_add_results_and_ordering_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'aperitif_core_add_product_list_item_holder' ) ) {
	/**
	 * Function that render additional content around product list item on main shop page
	 */
	function aperitif_core_add_product_list_item_holder() {
		echo '<div class="qodef-woo-product-inner">';
	}
}

if ( ! function_exists( 'aperitif_core_add_product_list_item_holder_end' ) ) {
	/**
	 * Function that render additional content around product list item on main shop page
	 */
	function aperitif_core_add_product_list_item_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'aperitif_core_add_product_list_item_image_holder' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function aperitif_core_add_product_list_item_image_holder() {
		echo '<div class="qodef-woo-product-image">';
	}
}

if ( ! function_exists( 'aperitif_core_add_product_list_item_image_holder_end' ) ) {
	/**
	 * Function that render additional content around image template on main shop page
	 */
	function aperitif_core_add_product_list_item_image_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'aperitif_core_add_product_list_item_additional_image_holder' ) ) {
	/**
	 * Function that render additional content around image and sale templates on main shop page
	 */
	function aperitif_core_add_product_list_item_additional_image_holder() {
		echo '<div class="qodef-woo-product-image-inner"><div class="qodef-woo-product-button-holder">';
	}
}

if ( ! function_exists( 'aperitif_core_add_product_list_item_additional_image_holder_end' ) ) {
	/**
	 * Function that render additional content around image and sale templates on main shop page
	 */
	function aperitif_core_add_product_list_item_additional_image_holder_end() {
		echo '</div></div>';
	}
}

if ( ! function_exists( 'aperitif_core_add_product_list_item_content_holder' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function aperitif_core_add_product_list_item_content_holder() {
		echo '<div class="qodef-woo-product-content">';
	}
}

if ( ! function_exists( 'aperitif_core_add_product_list_item_content_holder_end' ) ) {
	/**
	 * Function that render additional content around product info on main shop page
	 */
	function aperitif_core_add_product_list_item_content_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'aperitif_core_add_product_list_item_yith' ) ) {
	/**
	 * Function that render product categories
	 */
	function aperitif_core_add_product_list_item_yith() {
		do_action( 'aperitif_core_action_woo_yith_buttons' );
	}
}

if ( ! function_exists( 'aperitif_core_add_product_list_item_categories' ) ) {
	/**
	 * Function that render product categories
	 */
	function aperitif_core_add_product_list_item_categories() {
		aperitif_core_woo_render_product_categories( '<div class="qodef-woo-product-categories">', '</div>' );
	}
}

if ( ! function_exists( 'aperitif_core_add_product_list_item_tags' ) ) {
	/**
	 * Function that render product tags
	 */
	function aperitif_core_add_product_list_item_tags() {
		aperitif_core_woo_render_product_tags( '<div class="qodef-woo-product-tags">', '</div>' );
	}
}

/**
 * Product single page templates hooks
 */

if ( ! function_exists( 'aperitif_core_add_product_single_content_holder' ) ) {
	/**
	 * Function that render additional content around image and summary templates on single product page
	 */
	function aperitif_core_add_product_single_content_holder() {
		echo '<div class="qodef-woo-single-inner">';
	}
}

if ( ! function_exists( 'aperitif_core_add_product_single_content_holder_end' ) ) {
	/**
	 * Function that render additional content around image and summary templates on single product page
	 */
	function aperitif_core_add_product_single_content_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'aperitif_core_add_product_single_image_holder' ) ) {
	/**
	 * Function that render additional content around featured image on single product page
	 */
	function aperitif_core_add_product_single_image_holder() {
		echo '<div class="qodef-woo-single-image">';
	}
}

if ( ! function_exists( 'aperitif_core_add_product_single_image_holder_end' ) ) {
	/**
	 * Function that render additional content around featured image on single product page
	 */
	function aperitif_core_add_product_single_image_holder_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'aperitif_core_woo_product_render_social_share_html' ) ) {
	/**
	 * Function that render social share html
	 */
	function aperitif_core_woo_product_render_social_share_html() {
		
		if ( class_exists( 'AperitifCoreSocialShareShortcode' ) ) {
			$params           = array();
			$params['layout'] = 'list';
			$params['title']  = esc_html__( 'Share:', 'aperitif-core' );
			
			echo AperitifCoreSocialShareShortcode::call_shortcode( $params );
		}
	}
}

/**
 * Override default WooCommerce templates
 */

if ( ! function_exists( 'aperitif_core_woo_disable_page_heading' ) ) {
	/**
	 * Function that disable heading template on main shop page
	 *
	 * @return bool
	 */
	function aperitif_core_woo_disable_page_heading() {
		return false;
	}
}

if ( ! function_exists( 'aperitif_core_add_product_list_holder' ) ) {
	/**
	 * Function that add additional content around product lists on main shop page
	 *
	 * @param $html string
	 *
	 * @return string which contains html content
	 */
	function aperitif_core_add_product_list_holder( $html ) {
		$classes = array();
		$layout  = aperitif_core_get_post_value_through_levels( 'qodef_product_list_item_layout' );
		$option  = aperitif_core_get_post_value_through_levels( 'qodef_woo_product_list_columns_space' );
		
		if ( ! empty( $layout ) ) {
			$classes[] = 'qodef-item-layout--' . $layout;
		}
		
		if ( ! empty( $option ) ) {
			$classes[] = 'qodef-gutter--' . $option;
		}
		
		$classes = implode( ' ', $classes );
		
		return '<div class="qodef-woo-product-list ' . esc_attr( $classes ) . '">' . $html;
	}
}

if ( ! function_exists( 'aperitif_core_add_product_list_holder_end' ) ) {
	/**
	 * Function that add additional content around product lists on main shop page
	 *
	 * @param $html string
	 *
	 * @return string which contains html content
	 */
	function aperitif_core_add_product_list_holder_end( $html ) {
		return $html . '</div>';
	}
}

if ( ! function_exists( 'aperitif_core_woo_product_list_columns' ) ) {
	/**
	 * Function that set number of columns for main shop page
	 *
	 * @param $columns int
	 *
	 * @return int
	 */
	function aperitif_core_woo_product_list_columns( $columns ) {
		$option = aperitif_core_get_post_value_through_levels( 'qodef_woo_product_list_columns' );
		
		if ( ! empty( $option ) ) {
			$columns = intval( $option );
		} else {
			$columns = 3;
		}
		
		return $columns;
	}
}

if ( ! function_exists( 'aperitif_core_woo_products_per_page' ) ) {
	/**
	 * Function that set number of items for main shop page
	 *
	 * @param $products_per_page int
	 *
	 * @return int
	 */
	function aperitif_core_woo_products_per_page( $products_per_page ) {
		$option = aperitif_core_get_post_value_through_levels( 'qodef_woo_product_list_products_per_page' );
		
		if ( ! empty( $option ) ) {
			$products_per_page = intval( $option );
		}
		
		return $products_per_page;
	}
}

if ( ! function_exists( 'aperitif_core_woo_pagination_args' ) ) {
	/**
	 * Function that override pagination args on main shop page
	 *
	 * @param $args array
	 *
	 * @return array
	 */
	function aperitif_core_woo_pagination_args( $args ) {
		$args['prev_text'] = qode_framework_icons()->render_icon( 'icon-arrows-slim-left', 'linea-icons' );
		$args['next_text'] = qode_framework_icons()->render_icon( 'icon-arrows-slim-right', 'elegant-icons' );
		$args['type']      = 'plain';
		
		return $args;
	}
}

if ( ! function_exists( 'aperitif_core_add_single_product_classes' ) ) {
	/**
	 * Function that render additional content around WooCommerce pages
	 */
	function aperitif_core_add_single_product_classes( $classes, $class = '', $post_id = 0 ) {
		if ( ! $post_id || ! in_array( get_post_type( $post_id ), array( 'product', 'product_variation' ), true ) ) {
			return $classes;
		}
		
		$product = wc_get_product( $post_id );
		
		if ( $product ) {
			$new = get_post_meta( $post_id, 'qodef_show_new_sign', true );
			
			if ( $new === 'yes' ) {
				$classes[] = 'new';
			}
		}
		
		return $classes;
	}
}

if ( ! function_exists( 'aperitif_core_woo_sale_flash' ) ) {
	/**
	 * Function that override on sale template for product
	 *
	 * @return string which contains html content
	 */
	function aperitif_core_woo_sale_flash() {
		return '<span class="qodef-woo-product-mark qodef-woo-onsale">' . esc_html__( 'Sale', 'aperitif-core' ) . '</span>';
	}
}

if ( ! function_exists( 'aperitif_core_add_out_of_stock_mark_on_product' ) ) {
	/**
	 * Function for adding out of stock template for product
	 */
	function aperitif_core_add_out_of_stock_mark_on_product() {
		$product = aperitif_core_woo_get_global_product();
		
		if ( ! empty( $product ) && ! $product->is_in_stock() ) {
			echo aperitif_core_get_out_of_stock_mark();
		}
	}
}

if ( ! function_exists( 'aperitif_core_get_out_of_stock_mark' ) ) {
	/**
	 * Function for adding out of stock template for product
	 *
	 * @return string
	 */
	function aperitif_core_get_out_of_stock_mark() {
		return '<span class="qodef-woo-product-mark qodef-out-of-stock">' . esc_html__( 'Sold', 'aperitif-core' ) . '</span>';
	}
}

if ( ! function_exists( 'aperitif_core_add_new_mark_on_product' ) ) {
	/**
	 * Function for adding out of stock template for product
	 */
	function aperitif_core_add_new_mark_on_product() {
		$product = aperitif_core_woo_get_global_product();
		
		if ( ! empty( $product ) && $product->get_id() !== '' ) {
			echo aperitif_core_get_new_mark( $product->get_id() );
		}
	}
}

if ( ! function_exists( 'aperitif_core_get_new_mark' ) ) {
	/**
	 * Function for adding out of stock template for product
	 *
	 * @param $product_id int
	 *
	 * @return string
	 */
	function aperitif_core_get_new_mark( $product_id ) {
		$option = get_post_meta( $product_id, 'qodef_show_new_sign', true );
		
		if ( $option === 'yes' ) {
			return '<span class="qodef-woo-product-mark qodef-new">' . esc_html__( 'New', 'aperitif-core' ) . '</span>';
		}
		
		return false;
	}
}

if ( ! function_exists( 'aperitif_core_woo_shop_loop_item_title' ) ) {
	/**
	 * Function that override product list item title template
	 */
	function aperitif_core_woo_shop_loop_item_title() {
		$option    = aperitif_core_get_post_value_through_levels( 'qodef_woo_product_list_title_tag' );
		$title_tag = ! empty( $option ) ? esc_attr( $option ) : 'h6';
		
		echo '<' . $title_tag . ' class="qodef-woo-product-title woocommerce-loop-product__title">' . get_the_title() . '</' . $title_tag . '>';
	}
}

if ( ! function_exists( 'aperitif_core_woo_template_single_title' ) ) {
	/**
	 * Function that override product single item title template
	 */
	function aperitif_core_woo_template_single_title() {
		$option    = aperitif_core_get_post_value_through_levels( 'qodef_woo_single_title_tag' );
		$title_tag = ! empty( $option ) ? esc_attr( $option ) : 'h3';
		
		echo '<' . $title_tag . ' class="qodef-woo-product-title product_title entry-title">' . get_the_title() . '</' . $title_tag . '>';
	}
}

if ( ! function_exists( 'aperitif_core_woo_single_thumbnail_images_columns' ) ) {
	/**
	 * Function that set number of columns for thumbnail images on single product page
	 *
	 * @param $columns int
	 *
	 * @return int
	 */
	function aperitif_core_woo_single_thumbnail_images_columns( $columns ) {
		$option = aperitif_core_get_post_value_through_levels( 'qodef_woo_single_thumbnail_images_columns' );
		
		if ( ! empty( $option ) ) {
			$columns = intval( $option );
		}
		
		return $columns;
	}
}

if ( ! function_exists( 'aperitif_core_woo_single_thumbnail_images_size' ) ) {
	/**
	 * Function that set thumbnail images size on single product page
	 *
	 * @param $size string
	 *
	 * @return string
	 */
	function aperitif_core_woo_single_thumbnail_images_size( $size ) {
		return apply_filters( 'aperitif_core_filter_woo_single_thumbnail_size', 'woocommerce_thumbnail' );
	}
}

if ( ! function_exists( 'aperitif_core_woo_single_thumbnail_images_wrapper' ) ) {
	/**
	 * Function that add additional wrapper around thumbnail images on single product
	 */
	function aperitif_core_woo_single_thumbnail_images_wrapper() {
		echo '<div class="qodef-woo-thumbnails-wrapper">';
	}
}

if ( ! function_exists( 'aperitif_core_woo_single_thumbnail_images_wrapper_end' ) ) {
	/**
	 * Function that add additional wrapper around thumbnail images on single product
	 */
	function aperitif_core_woo_single_thumbnail_images_wrapper_end() {
		echo '</div>';
	}
}

if ( ! function_exists( 'aperitif_core_woo_single_related_product_list_columns' ) ) {
	/**
	 * Function that set number of columns for related product list on single product page
	 *
	 * @param $args array
	 *
	 * @return array
	 */
	function aperitif_core_woo_single_related_product_list_columns( $args ) {
		$option = aperitif_core_get_post_value_through_levels( 'qodef_woo_single_related_product_list_columns' );
		
		if ( ! empty( $option ) ) {
			$args['posts_per_page'] = intval( $option );
			$args['columns']        = intval( $option );
		}
		
		return $args;
	}
}

if ( ! function_exists( 'aperitif_core_woo_product_get_rating_html' ) ) {
	/**
	 * Function that override ratings templates
	 *
	 * @param $html string - contains html content
	 * @param $rating float
	 * @param $count int - total number of ratings
	 *
	 * @return string
	 */
	function aperitif_core_woo_product_get_rating_html( $html, $rating, $count ) {
		if ( ! empty( $rating ) ) {
			$html = '<div class="qodef-woo-ratings qodef-m"><div class="qodef-m-inner">';
			$html .= '<div class="qodef-m-star qodef--initial">';
			for ( $i = 0; $i < 5; $i ++ ) {
				$html .= qode_framework_icons()->render_icon( 'icon_star_alt', 'elegant-icons' );
			}
			$html .= '</div>';
			$html .= '<div class="qodef-m-star qodef--active" style="width:' . ( ( $rating / 5 ) * 100 ) . '%">';
			for ( $i = 0; $i < 5; $i ++ ) {
				$html .= qode_framework_icons()->render_icon( 'icon_star', 'elegant-icons' );
			}
			$html .= '</div>';
			$html .= '</div></div>';
		}
		
		return $html;
	}
}

if ( ! function_exists( 'aperitif_core_woo_get_product_search_form' ) ) {
	/**
	 * Function that override product search widget form
	 *
	 * @param $html string
	 *
	 * @return string which contains html content
	 */
	function aperitif_core_woo_get_product_search_form( $html ) {
		return aperitif_core_get_template_part( 'woocommerce', 'templates/product-searchform' );
	}
}

if ( ! function_exists( 'aperitif_core_woo_get_content_widget_product' ) ) {
	/**
	 * Function that override product content widget
	 *
	 * @param $located string
	 * @param $template_name string
	 * @param $args array
	 * @param $template_path string
	 * @param $default_path string
	 *
	 * @return string which contains html content
	 */
	function aperitif_core_woo_get_content_widget_product( $located, $template_name, $args, $template_path, $default_path ) {
		
		if ( $template_name === 'content-widget-product.php' && file_exists( APERITIF_CORE_INC_PATH . '/woocommerce/templates/content-widget-product.php' ) ) {
			$located = APERITIF_CORE_INC_PATH . '/woocommerce/templates/content-widget-product.php';
		}
		
		return $located;
	}
}

if ( ! function_exists( 'aperitif_core_woo_get_content_widget_reviews' ) ) {
	/**
	 * Function that override review content widget
	 *
	 * @param $located string
	 * @param $template_name string
	 * @param $args array
	 * @param $template_path string
	 * @param $default_path string
	 *
	 * @return string which contains html content
	 */
	function aperitif_core_woo_get_content_widget_reviews( $located, $template_name, $args, $template_path, $default_path ) {
		
		if ( $template_name === 'content-widget-reviews.php' && file_exists( APERITIF_CORE_INC_PATH . '/woocommerce/templates/content-widget-reviews.php' ) ) {
			$located = APERITIF_CORE_INC_PATH . '/woocommerce/templates/content-widget-reviews.php';
		}
		
		return $located;
	}
}

if ( ! function_exists( 'aperitif_core_woo_get_quantity_input' ) ) {
	/**
	 * Function that override quantity input
	 *
	 * @param $located string
	 * @param $template_name string
	 * @param $args array
	 * @param $template_path string
	 * @param $default_path string
	 *
	 * @return string which contains html content
	 */
	function aperitif_core_woo_get_quantity_input( $located, $template_name, $args, $template_path, $default_path ) {
		
		if ( $template_name === 'global/quantity-input.php' && file_exists( APERITIF_CORE_INC_PATH . '/woocommerce/templates/global/quantity-input.php' ) ) {
			$located = APERITIF_CORE_INC_PATH . '/woocommerce/templates/global/quantity-input.php';
		}
		
		return $located;
	}
}

if ( ! function_exists( 'aperitif_core_woo_get_single_product_meta' ) ) {
	/**
	 * Function that override single product meta
	 *
	 * @param $located string
	 * @param $template_name string
	 * @param $args array
	 * @param $template_path string
	 * @param $default_path string
	 *
	 * @return string which contains html content
	 */
	function aperitif_core_woo_get_single_product_meta( $located, $template_name, $args, $template_path, $default_path ) {
		
		if ( $template_name === 'single-product/meta.php' && file_exists( APERITIF_CORE_INC_PATH . '/woocommerce/templates/single-product/meta.php' ) ) {
			$located = APERITIF_CORE_INC_PATH . '/woocommerce/templates/single-product/meta.php';
		}
		
		return $located;
	}
}

if ( ! function_exists( 'aperitif_core_woo_get_list_shortcode_item_image' ) ) {
	/**
	 * Function that override thumbnail img tag for list shortcodes
	 *
	 * @param $html string
	 * @param $attachment_id int
	 *
	 * @return string generated img tag
	 */
	function aperitif_core_woo_get_list_shortcode_item_image( $html, $attachment_id ) {
		
		if ( empty( $attachment_id ) && get_post_type() === 'product' ) {
			$html = woocommerce_get_product_thumbnail();
		}
		
		return $html;
	}
}