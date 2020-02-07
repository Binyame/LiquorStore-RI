<?php
// Unique ID for search form fields
$qodef_unique_id = uniqid( 'qodef-search-form-' );
?>
<form role="search" method="get" class="qodef-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="<?php echo esc_attr( $qodef_unique_id ); ?>"
	       class="screen-reader-text"><?php esc_html_e( 'Search for:', 'aperitif' ); ?></label>
	<div class="qodef-search-form-inner clear">
		<input type="search" id="<?php echo esc_attr( $qodef_unique_id ); ?>" class="qodef-search-form-field" value=""
		       name="s" placeholder="<?php esc_attr_e( 'Type your search here...', 'aperitif' ); ?>"
		       title="<?php esc_attr_e( 'Search for:', 'aperitif' ); ?>"/>
		<button type="submit"
		        class="qodef-search-form-button"><?php aperitif_render_icon( 'icon-basic-magnifier', 'linea-icons', esc_html__( 'GO', 'aperitif' ) ); ?></button>
	</div>
</form>