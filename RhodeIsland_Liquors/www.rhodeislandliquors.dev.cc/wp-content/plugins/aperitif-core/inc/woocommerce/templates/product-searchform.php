<?php
/**
 * The template for displaying product search form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/product-searchform.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>
<form role="search" method="get" class="qodef-woo-product-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text"
	       for="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"><?php esc_html_e( 'Search for:', 'aperitif-core' ); ?></label>
	<div class="qodef-search-form-inner clear">
		<input type="search" id="woocommerce-product-search-field-<?php echo isset( $index ) ? absint( $index ) : 0; ?>"
		       class="qodef-search-form-field"
		       placeholder="<?php echo esc_attr__( 'Type your search here...', 'aperitif-core' ); ?>"
		       value="<?php echo get_search_query(); ?>" name="s"/>
		<button type="submit"
		        class="qodef-search-form-button"><?php echo qode_framework_icons()->render_icon( 'icon-basic-magnifier', 'linea-icons' ); ?></button>
	</div>
	<input type="hidden" name="post_type" value="product"/>
</form>
