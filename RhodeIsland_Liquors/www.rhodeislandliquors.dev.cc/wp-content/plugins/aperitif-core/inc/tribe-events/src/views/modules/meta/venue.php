<?php
/**
 * Single Event Meta (Venue) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/venue.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 */

if ( ! tribe_get_venue_id() ) {
	return;
}

$phone   = tribe_get_phone();
$website = tribe_get_venue_website_link();

$link_phone = str_replace( ' ', '', $phone );
$link_phone = str_replace( '-', '', $link_phone );

?>

<div class="tribe-events-meta-group tribe-events-meta-group-venue">
	<h5 class="qodef-events-single-section-title"><?php esc_html_e( tribe_get_venue_label_singular(), 'aperitif-core' ) ?></h5>
	<dl>
		<?php do_action( 'tribe_events_single_meta_venue_section_start' ) ?>
		
		<div class="qodef-events-single-meta-item">
			<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-home', 'linea-icons' ); ?></span>
			<dt class="tribe-organizer-place-label"><?php esc_html_e( 'Place:', 'aperitif-core' ) ?></dt>
			<dd class="tribe-venue"> <?php echo tribe_get_venue() ?> </dd>
		</div>
		
		<?php if ( tribe_address_exists() ) : ?>
			<div class="qodef-events-single-meta-item">
				<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-geolocalize-05', 'linea-icons' ); ?></span>
				<dt class="tribe-organizer-address-label"><?php esc_html_e( 'Address:', 'aperitif-core' ) ?></dt>
				<dd class="tribe-venue-location">
					<address class="tribe-events-address">
						<?php echo tribe_get_full_address(); ?>
						<?php if ( tribe_show_google_map_link() ) : ?>
							<?php echo tribe_get_map_link_html(); ?>
						<?php endif; ?>
					</address>
				</dd>
			</div>
		<?php endif; ?>
		
		<?php if ( ! empty( $website ) ): ?>
			<div class="qodef-events-single-meta-item">
				<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-world', 'linea-icons' ); ?></span>
				<dt class="tribe-venue-url-label"> <?php esc_html_e( 'Website:', 'aperitif-core' ) ?> </dt>
				<dd class="tribe-venue-url"><?php echo $website ?> </dd>
			</div>
		<?php endif ?>
		
		<?php if ( ! empty( $phone ) ): ?>
			<div class="qodef-events-single-meta-item">
				<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-smartphone', 'linea-icons' ); ?></span>
				<dt class="tribe-venue-tel-label"> <?php esc_html_e( 'Phone:', 'aperitif-core' ) ?> </dt>
				<dd class="tribe-venue-tel"><a href="tel:<?php echo esc_attr( $link_phone ); ?>"> <?php echo $phone ?> </a>
				</dd>
			</div>
		<?php endif ?>
		
		<?php do_action( 'tribe_events_single_meta_venue_section_end' ) ?>
	</dl>
</div>