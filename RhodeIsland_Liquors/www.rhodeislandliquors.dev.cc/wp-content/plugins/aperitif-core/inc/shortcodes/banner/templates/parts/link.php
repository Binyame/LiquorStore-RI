<?php if ( 'link-overlay' === $link_appearance ) : ?>
	<a itemprop="url" href="<?php echo esc_url( $link_url ); ?>" class="qodef-m-banner-link"
	   target="<?php echo esc_attr( $link_target ); ?>"></a>
<?php endif; ?>