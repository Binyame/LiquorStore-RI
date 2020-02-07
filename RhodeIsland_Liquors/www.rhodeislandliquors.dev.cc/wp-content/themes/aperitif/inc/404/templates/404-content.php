<?php if ( aperitif_is_installed( 'core' ) ) {
	$above_title_image = aperitif_core_get_option_value( 'admin', 'qodef_404_page_above_title_image' );
}
?>
<div id="qodef-404-page">
	
	<?php if ( aperitif_is_installed( 'core' ) && $above_title_image ) {
		echo wp_get_attachment_image( $above_title_image, 'full' );
	} ?>
	
	<h2 class="qodef-404-title"><?php echo esc_html( $title ); ?></h2>
	
	<p class="qodef-404-text"><?php echo esc_html( $text ); ?></p>
	
	<div class="qodef-404-button">
		<?php
		$button_params = array(
			'link' => esc_url( home_url( '/' ) ),
			'text' => esc_html( $button_text )
		);
		
		aperitif_render_button_element( $button_params ); ?>
	</div>
</div>