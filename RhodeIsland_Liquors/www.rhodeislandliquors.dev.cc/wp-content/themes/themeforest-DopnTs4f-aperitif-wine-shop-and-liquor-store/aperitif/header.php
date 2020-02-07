<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) { ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php } ?>
	
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="https://schema.org/WebPage">
<div id="qodef-page-wrapper" class="<?php echo esc_attr( aperitif_get_page_wrapper_classes() ); ?>">
	<div id="qodef-page-wrapper-inner">
		<?php
		// Hook to include page header template
		do_action( 'aperitif_action_page_header_template' ); ?>
		<div id="qodef-page-outer">
			<?php
			// Include title template
			get_template_part( 'title' );
			
			// Hook to include additional content before page inner content
			do_action( 'aperitif_action_before_page_inner' ); ?>
			<div id="qodef-page-inner" class="<?php echo esc_attr( aperitif_get_page_inner_classes() ); ?>">