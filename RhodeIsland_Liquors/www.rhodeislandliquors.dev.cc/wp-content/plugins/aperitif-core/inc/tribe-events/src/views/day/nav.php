<?php
/**
 * Day View Nav
 * This file contains the day view navigation.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/day/nav.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<nav class="tribe-events-nav-pagination" aria-label="<?php esc_html_e( 'Day Navigation', 'aperitif-core' ) ?>">
	<ul class="tribe-events-sub-nav">
		
		<li class="tribe-events-nav-previous">
			<?php tribe_the_day_link( 'previous day', '<span class="qodef-events-single-navigation-icon-prev">' .
			                                          qode_framework_icons()->render_icon( 'icon-arrows-slim-left', 'linea-icons' ) . '</span>' .
			                                          esc_html__( 'Previous day', 'aperitif-core' ) ) ?>
		</li>
		
		<li class="tribe-events-nav-next">
			<?php tribe_the_day_link( 'next day', esc_html__( 'Next day', 'aperitif-core' ) .
			                                      '<span class="qodef-events-single-navigation-icon-next">' .
			                                      qode_framework_icons()->render_icon( 'icon-arrows-slim-right', 'linea-icons' ) . '</span>' ) ?>
		</li>
	
	</ul>
</nav>