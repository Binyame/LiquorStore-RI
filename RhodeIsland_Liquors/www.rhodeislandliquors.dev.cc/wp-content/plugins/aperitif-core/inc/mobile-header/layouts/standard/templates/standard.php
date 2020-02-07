<div class="qodef-mobile-logo-widget-wrapper qodef-content-grid">
	<?php
	// Include mobile logo
	aperitif_core_get_mobile_header_logo_image();
	
	// Include mobile haeder widget area
	dynamic_sidebar( 'qodef-mobile-header-widget-area' );
	
	// Include mobile navigation opener
	aperitif_core_template_part( 'mobile-header', 'templates/parts/mobile-navigation-opener' );
	?>
</div>
<?php
// Include mobile navigation
aperitif_core_template_part( 'mobile-header', 'templates/parts/mobile-navigation' );