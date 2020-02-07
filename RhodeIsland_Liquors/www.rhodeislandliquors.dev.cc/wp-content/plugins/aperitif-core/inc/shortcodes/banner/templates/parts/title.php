<?php if ( ! empty( $title ) ) : ?>
	<?php echo '<' . esc_attr( $title_tag ); ?> class="qodef-m-title" <?php qode_framework_inline_style( $title_styles ); ?>>
	<span class="qodef-m-title-inner">
	    <?php echo esc_html( $title ); ?>
    </span>
	<?php echo '</' . esc_attr( $title_tag ); ?>>
<?php endif; ?>