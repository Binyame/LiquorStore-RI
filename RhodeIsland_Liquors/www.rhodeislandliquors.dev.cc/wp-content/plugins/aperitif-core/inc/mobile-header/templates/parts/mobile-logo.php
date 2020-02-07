<a itemprop="url" class="qodef-mobile-header-logo-link"
   href="<?php echo esc_url( home_url( '/' ) ); ?>" <?php qode_framework_inline_style( $logo_height ); ?> rel="home">
	<?php echo wp_kses_post( $logo_main_image ); ?>
	<?php do_action( 'aperitif_core_after_mobile_header_logo_image' ); ?>
</a>