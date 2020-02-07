<?php

if ( ! function_exists( 'aperitif_core_register_product_for_meta_options' ) ) {
	/**
	 * Function that register product post type for meta box options
	 *
	 * @param $post_types array
	 *
	 * @return array
	 */
	function aperitif_core_register_product_for_meta_options( $post_types ) {
		$post_types[] = 'product';
		
		return $post_types;
	}
	
	add_filter( 'qode_framework_filter_meta_box_save', 'aperitif_core_register_product_for_meta_options' );
	add_filter( 'qode_framework_filter_meta_box_remove', 'aperitif_core_register_product_for_meta_options' );
}

if ( ! function_exists( 'aperitif_core_is_woo_page' ) ) {
	/**
	 * Function that check WooCommerce pages
	 *
	 * @param $page string
	 *
	 * @return bool
	 */
	function aperitif_core_is_woo_page( $page ) {
		switch ( $page ) {
			case 'shop':
				return function_exists( 'is_shop' ) && is_shop();
				break;
			case 'single':
				return is_singular( 'product' );
				break;
			case 'cart':
				return function_exists( 'is_cart' ) && is_cart();
				break;
			case 'checkout':
				return function_exists( 'is_checkout' ) && is_checkout();
				break;
			case 'account':
				return function_exists( 'is_account_page' ) && is_account_page();
				break;
			case 'category':
				return function_exists( 'is_product_category' ) && is_product_category();
				break;
			case 'tag':
				return function_exists( 'is_product_tag' ) && is_product_tag();
				break;
			case 'any':
				return (
					function_exists( 'is_shop' ) && is_shop() ||
					is_singular( 'product' ) ||
					function_exists( 'is_product_category' ) && is_product_category() ||
					function_exists( 'is_product_tag' ) && is_product_tag()
				);
				break;
			default:
				return false;
		}
	}
}

if ( ! function_exists( 'aperitif_core_get_woo_main_page_classes' ) ) {
	/**
	 * Function that return current WooCommerce page class name
	 *
	 * @return string
	 */
	function aperitif_core_get_woo_main_page_classes() {
		$classes = array();
		
		if ( aperitif_core_is_woo_page( 'shop' ) ) {
			$classes[] = 'qodef--list';
		}
		
		if ( aperitif_core_is_woo_page( 'single' ) ) {
			$classes[] = 'qodef--single';
			
			if ( aperitif_core_get_post_value_through_levels( 'qodef_woo_single_enable_image_lightbox' ) === 'photo-swipe' ) {
				$classes[] = 'qodef-popup--photo-swipe';
			}
			
			if ( aperitif_core_get_post_value_through_levels( 'qodef_woo_single_enable_image_lightbox' ) === 'magnific-popup' ) {
				$classes[] = 'qodef-popup--magnific-popup';
				// add classes to initialize lightbox from theme
				$classes[] = 'qodef-magnific-popup';
				$classes[] = 'qodef-popup-gallery';
			}
		}
		
		if ( aperitif_core_is_woo_page( 'cart' ) ) {
			$classes[] = 'qodef--cart';
		}
		
		if ( aperitif_core_is_woo_page( 'checkout' ) ) {
			$classes[] = 'qodef--checkout';
		}
		
		if ( aperitif_core_is_woo_page( 'account' ) ) {
			$classes[] = 'qodef--account';
		}
		
		return apply_filters( 'aperitif_core_filter_main_page_classes', implode( ' ', $classes ) );
	}
}

if ( ! function_exists( 'aperitif_core_woo_get_global_product' ) ) {
	/**
	 * Function that return global WooCommerce object
	 *
	 * @return object
	 */
	function aperitif_core_woo_get_global_product() {
		global $product;
		
		return $product;
	}
}

if ( ! function_exists( 'aperitif_core_woo_get_main_shop_page_id' ) ) {
	/**
	 * Function that return main shop page ID
	 *
	 * @return int
	 */
	function aperitif_core_woo_get_main_shop_page_id() {
		// Get page id from options table
		$shop_id = get_option( 'woocommerce_shop_page_id' );
		
		if ( ! empty( $shop_id ) ) {
			return $shop_id;
		}
		
		return false;
	}
}

if ( ! function_exists( 'aperitif_core_woo_set_main_shop_page_id' ) ) {
	/**
	 * Function that set main shop page ID for get_post_meta options
	 *
	 * @param $post_id int
	 *
	 * @return int
	 */
	function aperitif_core_woo_set_main_shop_page_id( $post_id ) {
		
		if ( aperitif_core_is_woo_page( 'shop' ) || aperitif_core_is_woo_page( 'single' ) || aperitif_core_is_woo_page( 'category' ) || aperitif_core_is_woo_page( 'tag' ) ) {
			$shop_id = aperitif_core_woo_get_main_shop_page_id();
			
			if ( ! empty( $shop_id ) ) {
				$post_id = $shop_id;
			}
		}
		
		return $post_id;
	}
	
	add_filter( 'aperitif_filter_page_id', 'aperitif_core_woo_set_main_shop_page_id' );
	add_filter( 'qode_framework_filter_page_id', 'aperitif_core_woo_set_main_shop_page_id' );
}

if ( ! function_exists( 'aperitif_core_woo_set_page_title_text' ) ) {
	/**
	 * Function that returns current page title text for WooCommerce pages
	 *
	 * @param $title string
	 *
	 * @return string
	 */
	function aperitif_core_woo_set_page_title_text( $title ) {
		
		if ( aperitif_core_is_woo_page( 'shop' ) || aperitif_core_is_woo_page( 'single' ) ) {
			$shop_id = aperitif_core_woo_get_main_shop_page_id();
			
			$title = ! empty( $shop_id ) ? get_the_title( $shop_id ) : esc_html__( 'Shop', 'aperitif-core' );
		} else if ( aperitif_core_is_woo_page( 'category' ) || aperitif_core_is_woo_page( 'tag' ) ) {
			$taxonomy_slug = aperitif_core_is_woo_page( 'tag' ) ? 'product_tag' : 'product_cat';
			$taxonomy      = get_term( get_queried_object_id(), $taxonomy_slug );
			
			if ( ! empty( $taxonomy ) ) {
				$title = esc_html( $taxonomy->name );
			}
		}
		
		return $title;
	}
	
	add_filter( 'aperitif_filter_page_title_text', 'aperitif_core_woo_set_page_title_text' );
}

if ( ! function_exists( 'aperitif_core_woo_breadcrumbs_title' ) ) {
	function aperitif_core_woo_breadcrumbs_title( $wrap_child, $settings ) {
		
		if ( aperitif_core_is_woo_page( 'category' ) || aperitif_core_is_woo_page( 'tag' ) ) {
			$wrap_child    = '';
			$taxonomy_slug = aperitif_core_is_woo_page( 'tag' ) ? 'product_tag' : 'product_cat';
			$taxonomy      = get_term( get_queried_object_id(), $taxonomy_slug );
			
			if ( isset( $taxonomy->parent ) && $taxonomy->parent !== 0 ) {
				$parent     = get_term( $taxonomy->parent );
				$wrap_child .= sprintf( $settings['link'], get_term_link( $parent->term_id ), $parent->name ) . $settings['separator'];
			}
			
			if ( ! empty( $taxonomy ) ) {
				$wrap_child .= sprintf( $settings['current_item'], esc_attr( $taxonomy->name ) );
			}
			
		} elseif ( aperitif_core_is_woo_page( 'shop' ) ) {
			$shop_id    = aperitif_core_woo_get_main_shop_page_id();
			$shop_title = ! empty( $shop_id ) ? get_the_title( $shop_id ) : esc_html__( 'Shop', 'aperitif-core' );
			
			$wrap_child .= sprintf( $settings['current_item'], $shop_title );
			
		} else if ( aperitif_core_is_woo_page( 'single' ) ) {
			$wrap_child = '';
			$categories = wp_get_post_terms( get_the_ID(), 'product_cat' );
			
			if ( ! empty ( $categories ) ) {
				$category = $categories[0];
				if ( isset( $category->parent ) && $category->parent !== 0 ) {
					$parent     = get_term( $category->parent );
					$wrap_child .= sprintf( $settings['link'], get_term_link( $parent->term_id ), $parent->name ) . $settings['separator'];
				}
				$wrap_child .= sprintf( $settings['link'], get_term_link( $category ), $category->name ) . $settings['separator'];
			}
			
			$wrap_child .= sprintf( $settings['current_item'], get_the_title() );
		}
		
		return $wrap_child;
	}
	
	add_filter( 'aperitif_core_filter_breadcrumbs_content', 'aperitif_core_woo_breadcrumbs_title', 10, 2 );
}

if ( ! function_exists( 'aperitif_core_woo_single_add_theme_supports' ) ) {
	/**
	 * Function that add native WooCommerce supports
	 */
	function aperitif_core_woo_single_add_theme_supports() {
		// Add featured image zoom functionality on product single page
		$is_zoom_enabled = aperitif_core_get_post_value_through_levels( 'qodef_woo_single_enable_image_zoom' ) !== 'no';
		
		if ( $is_zoom_enabled ) {
			add_theme_support( 'wc-product-gallery-zoom' );
		}
		
		// Add lightbox functionality on product single images page
		$is_photo_swipe_enabled = aperitif_core_get_post_value_through_levels( 'qodef_woo_single_enable_image_photo_swipe' ) !== 'no';
		
		if ( $is_photo_swipe_enabled ) {
			add_theme_support( 'wc-product-gallery-lightbox' );
		}
	}
	
	add_action( 'wp_loaded', 'aperitif_core_woo_single_add_theme_supports', 11 ); // permission 11 is set because options are init with permission 10 inside framework plugin
}

if ( ! function_exists( 'aperitif_core_woo_single_disable_page_title' ) ) {
	/**
	 * Function that disable page title area for single product page
	 *
	 * @param $enable_page_title bool
	 *
	 * @return bool
	 */
	function aperitif_core_woo_single_disable_page_title( $enable_page_title ) {
		$is_enabled = aperitif_core_get_post_value_through_levels( 'qodef_woo_single_enable_page_title' ) !== 'no';
		
		if ( ! $is_enabled && aperitif_core_is_woo_page( 'single' ) ) {
			$enable_page_title = false;
		}
		
		return $enable_page_title;
	}
	
	add_filter( 'aperitif_filter_enable_page_title', 'aperitif_core_woo_single_disable_page_title' );
}

if ( ! function_exists( 'aperitif_core_woo_single_thumb_images_position' ) ) {
	/**
	 * Function that changes the layout of thumbnails on single product page
	 */
	function aperitif_core_woo_single_thumb_images_position( $classes ) {
		$product_thumbnail_position = aperitif_core_get_post_value_through_levels( 'qodef_woo_single_thumb_images_position' );
		
		if ( ! empty( $product_thumbnail_position ) ) {
			$classes[] = 'qodef-position--' . $product_thumbnail_position;
		}
		
		return $classes;
	}
	
	add_filter( 'woocommerce_single_product_image_gallery_classes', 'aperitif_core_woo_single_thumb_images_position' );
}

if ( ! function_exists( 'aperitif_core_woo_set_admin_options_map_position' ) ) {
	/**
	 * Function that set dashboard admin options map position for this module
	 *
	 * @param $position int
	 * @param $map string
	 *
	 * @return int
	 */
	function aperitif_core_woo_set_admin_options_map_position( $position, $map ) {
		
		if ( $map === 'woocommerce' ) {
			$position = 70;
		}
		
		return $position;
	}
	
	add_filter( 'aperitif_core_filter_admin_options_map_position', 'aperitif_core_woo_set_admin_options_map_position', 10, 2 );
}

if ( ! function_exists( 'aperitif_core_include_woocommerce_shortcodes' ) ) {
	/**
	 * Function that includes shortcodes
	 */
	function aperitif_core_include_woocommerce_shortcodes() {
		foreach ( glob( APERITIF_CORE_INC_PATH . '/woocommerce/shortcodes/*/include.php' ) as $shortcode ) {
			include_once $shortcode;
		}
	}
	
	add_action( 'qode_framework_action_before_shortcodes_register', 'aperitif_core_include_woocommerce_shortcodes' );
}

if ( ! function_exists( 'aperitif_core_register_woocommerce_shortcodes' ) ) {
	/**
	 * Function that register shortcodes
	 */
	function aperitif_core_register_woocommerce_shortcodes() {
		$qode_framework = qode_framework_get_framework_root();
		$shortcodes     = apply_filters( 'aperitif_core_filter_register_shortcodes', $shortcodes = array() );
		
		if ( ! empty( $shortcodes ) ) {
			foreach ( $shortcodes as $shortcode ) {
				$qode_framework->add_shortcode( new $shortcode() );
			}
		}
	}
	
	add_action( 'qode_framework_action_before_shortcodes_register', 'aperitif_core_register_woocommerce_shortcodes' );
}

if ( ! function_exists( 'aperitif_core_set_woo_custom_sidebar_name' ) ) {
	/**
	 * Function that return sidebar name
	 *
	 * @param $sidebar_name string
	 *
	 * @return string
	 */
	function aperitif_core_set_woo_custom_sidebar_name( $sidebar_name ) {
		
		if ( aperitif_core_is_woo_page( 'shop' ) || aperitif_core_is_woo_page( 'category' ) || aperitif_core_is_woo_page( 'tag' ) ) {
			$option = aperitif_core_get_post_value_through_levels( 'qodef_woo_product_list_custom_sidebar' );
			
			if ( isset( $option ) && ! empty( $option ) ) {
				$sidebar_name = $option;
			}
		}
		
		return $sidebar_name;
	}
	
	add_filter( 'aperitif_filter_sidebar_name', 'aperitif_core_set_woo_custom_sidebar_name' );
}

if ( ! function_exists( 'aperitif_core_set_woo_sidebar_layout' ) ) {
	/**
	 * Function that return sidebar layout
	 *
	 * @param $layout string
	 *
	 * @return string
	 */
	function aperitif_core_set_woo_sidebar_layout( $layout ) {
		
		if ( aperitif_core_is_woo_page( 'shop' ) || aperitif_core_is_woo_page( 'category' ) || aperitif_core_is_woo_page( 'tag' ) ) {
			$option = aperitif_core_get_post_value_through_levels( 'qodef_woo_product_list_sidebar_layout' );
			
			if ( isset( $option ) && ! empty( $option ) ) {
				$layout = $option;
			}
		}
		
		return $layout;
	}
	
	add_filter( 'aperitif_filter_sidebar_layout', 'aperitif_core_set_woo_sidebar_layout' );
}

if ( ! function_exists( 'aperitif_core_set_woo_sidebar_grid_gutter_classes' ) ) {
	/**
	 * Function that returns grid gutter classes
	 *
	 * @param $classes string
	 *
	 * @return string
	 */
	function aperitif_core_set_woo_sidebar_grid_gutter_classes( $classes ) {
		
		if ( aperitif_core_is_woo_page( 'shop' ) || aperitif_core_is_woo_page( 'category' ) || aperitif_core_is_woo_page( 'tag' ) ) {
			$option = aperitif_core_get_post_value_through_levels( 'qodef_woo_product_list_sidebar_grid_gutter' );
			
			if ( isset( $option ) && ! empty( $option ) ) {
				$classes = 'qodef-gutter--' . esc_attr( $option );
			}
		}
		
		return $classes;
	}
	
	add_filter( 'aperitif_filter_grid_gutter_classes', 'aperitif_core_set_woo_sidebar_grid_gutter_classes' );
}