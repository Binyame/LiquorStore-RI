<?php
/**
 * Day View Single Event
 * This file contains one event in the day view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/day/single-event.php
 *
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$venue_details = tribe_get_venue_details();

// Venue microformats
$has_venue         = ( $venue_details ) ? ' vcard' : '';
$has_venue_address = ( ! empty( $venue_details['address'] ) ) ? ' location' : '';

// The address string via tribe_get_venue_details will often be populated even when there's
// no address, so let's get the address string on its own for a couple of checks below.
$venue_address = tribe_get_address();
?>

<!-- Event Image -->
<?php echo tribe_event_featured_image( null, 'aperitif_image_size_square' ); ?>

<div class="qodef-tribe-events-single-day-content">
	
	<!-- Event Title -->
	<?php do_action( 'tribe_events_before_the_event_title' ) ?>
	<h4 class="tribe-events-list-event-title summary">
		<a class="url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title_attribute() ?>"
		   rel="bookmark">
			<?php the_title() ?>
		</a>
	</h4>
	<?php do_action( 'tribe_events_after_the_event_title' ) ?>
	
	<!-- Event Meta -->
	<?php do_action( 'tribe_events_before_the_meta' ) ?>
	<div class="tribe-events-event-meta <?php echo esc_attr( $has_venue . $has_venue_address ); ?>">
		<?php if ( $venue_details ) : ?>
			<!-- Venue Display Info -->
			<?php tribe_get_template_part( 'modules/meta/venue' ); ?>
		<?php endif; ?>
	</div><!-- .tribe-events-event-meta -->
	<?php do_action( 'tribe_events_after_the_meta' ) ?>
	
	<!-- Event Content -->
	<?php do_action( 'tribe_events_before_the_content' ) ?>
	<div class="tribe-events-list-event-description tribe-events-content description entry-summary">
		<?php echo tribe_events_get_the_excerpt(); ?>
		<a href="<?php echo esc_url( tribe_get_event_link() ); ?>"
		   class="tribe-events-read-more qodef-button qodef-layout--textual"
		   rel="bookmark"><?php esc_html_e( 'See More', 'aperitif-core' ) ?></a>
	
	</div><!-- .tribe-events-list-event-description -->
	<?php
	do_action( 'tribe_events_after_the_content' ); ?>
</div>