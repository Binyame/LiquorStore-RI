<?php
/**
 * Single Event Meta (Organizer) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/organizer.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 */

$organizer_ids = tribe_get_organizer_ids();
$multiple      = count( $organizer_ids ) > 1;

$phone   = tribe_get_organizer_phone();
$email   = tribe_get_organizer_email();
$website = tribe_get_organizer_website_link();
?>

<div class="tribe-events-meta-group tribe-events-meta-group-organizer">
	<h5 class="qodef-events-single-section-title"><?php echo tribe_get_organizer_label( ! $multiple ); ?></h5>
	<dl>
		<?php
		do_action( 'tribe_events_single_meta_organizer_section_start' );
		
		foreach ( $organizer_ids as $organizer ) {
			if ( ! $organizer ) {
				continue;
			} ?>
			<div class="qodef-events-single-meta-item">
				<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-music-headphones', 'linea-icons' ); ?></span>
				<dt class="tribe-organizer-label"><?php esc_html_e( 'Name:', 'aperitif-core' ) ?></dt>
				<dd class="tribe-organizer"><?php echo tribe_get_organizer_link( $organizer ) ?></dd>
			</div>
		<?php }
		
		if ( ! $multiple ) { // only show organizer details if there is one
			if ( ! empty( $phone ) ) { ?>
				<div class="qodef-events-single-meta-item">
					<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-smartphone', 'linea-icons' ); ?></span>
					<dt class="tribe-organizer-tel-label"><?php esc_html_e( 'Phone:', 'aperitif-core' ) ?></dt>
					<dd class="tribe-organizer-tel"><?php echo esc_html( $phone ); ?></dd>
				</div>
			<?php }//end if
			
			if ( ! empty( $email ) ) { ?>
				<div class="qodef-events-single-meta-item">
					<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-mail', 'linea-icons' ); ?></span>
					<dt class="tribe-organizer-email-label"><?php esc_html_e( 'Email:', 'aperitif-core' ) ?></dt>
					<dd class="tribe-organizer-email"><a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a></dd>
				</div>
			<?php } //end if
			
			if ( ! empty( $website ) ) { ?>
				<div class="qodef-events-single-meta-item">
					<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-world', 'linea-icons' ); ?></span>
					<dt class="tribe-organizer-url-label"><?php esc_html_e( 'Website:', 'aperitif-core' ) ?></dt>
					<dd class="tribe-organizer-url"><?php echo $website; ?></dd>
				</div>
			<?php } //end if
		} //end if
		
		do_action( 'tribe_events_single_meta_organizer_section_end' );
		?>
	</dl>
</div>