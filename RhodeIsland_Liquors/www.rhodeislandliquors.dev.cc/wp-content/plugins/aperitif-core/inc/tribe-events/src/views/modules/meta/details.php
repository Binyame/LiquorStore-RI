<?php
/**
 * Single Event Meta (Details) Template
 *
 * Override this template in your own theme by creating a file at:
 * [your-theme]/tribe-events/modules/meta/details.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 */

$time_format          = get_option( 'time_format', Tribe__Date_Utils::TIMEFORMAT );
$time_range_separator = tribe_get_option( 'timeRangeSeparator', ' - ' );

$start_datetime = tribe_get_start_date();
$start_date     = tribe_get_start_date( null, false );
$start_time     = tribe_get_start_date( null, false, $time_format );
$start_ts       = tribe_get_start_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$end_datetime = tribe_get_end_date();
$end_date     = tribe_get_display_end_date( null, false );
$end_time     = tribe_get_end_date( null, false, $time_format );
$end_ts       = tribe_get_end_date( null, false, Tribe__Date_Utils::DBDATEFORMAT );

$time_formatted = null;
if ( $start_time == $end_time ) {
	$time_formatted = esc_html( $start_time );
} else {
	$time_formatted = esc_html( $start_time . $time_range_separator . $end_time );
}

$event_id = Tribe__Main::post_id_helper();

/**
 * Returns a formatted time for a single event
 *
 * @var string Formatted time string
 * @var int Event post id
 */
$time_formatted = apply_filters( 'tribe_events_single_event_time_formatted', $time_formatted, $event_id );

/**
 * Returns the title of the "Time" section of event details
 *
 * @var string Time title
 * @var int Event post id
 */
$time_title = apply_filters( 'tribe_events_single_event_time_title', __( 'Time:', 'aperitif-core' ), $event_id );

$cost    = tribe_get_formatted_cost();
$website = tribe_get_event_website_link();
?>

<div class="tribe-events-meta-group tribe-events-meta-group-details">
	<h5 class="qodef-events-single-section-title"><?php esc_html_e( 'Event Details', 'aperitif-core' ) ?></h5>
	<dl>
		
		<?php
		do_action( 'tribe_events_single_meta_details_section_start' );
		
		// All day (multiday) events
		if ( tribe_event_is_all_day() && tribe_event_is_multiday() ) : ?>
			<div class="qodef-events-single-meta-item">
				<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-calendar', 'linea-icons' ); ?></span>
				<dt class="tribe-events-start-date-label"> <?php esc_html_e( 'Start:', 'aperitif-core' ) ?> </dt>
				<dd><abbr class="tribe-events-abbr tribe-events-start-date published dtstart"
				          title="<?php esc_attr_e( $start_ts ) ?>"> <?php esc_html_e( $start_date ) ?> </abbr></dd>
			</div>
			<div class="qodef-events-single-meta-item">
				<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-calendar', 'linea-icons' ); ?></span>
				<dt class="tribe-events-end-date-label"> <?php esc_html_e( 'End:', 'aperitif-core' ) ?> </dt>
				<dd><abbr class="tribe-events-abbr tribe-events-end-date dtend"
				          title="<?php esc_attr_e( $end_ts ) ?>"> <?php esc_html_e( $end_date ) ?> </abbr></dd>
			</div>
		<?php
		// All day (single day) events
		elseif ( tribe_event_is_all_day() ): ?>
			<div class="qodef-events-single-meta-item">
				<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-calendar', 'linea-icons' ); ?></span>
				<dt class="tribe-events-start-date-label"> <?php esc_html_e( 'Date:', 'aperitif-core' ) ?> </dt>
				<dd><abbr class="tribe-events-abbr tribe-events-start-date published dtstart"
				          title="<?php esc_attr_e( $start_ts ) ?>"> <?php esc_html_e( $start_date ) ?> </abbr></dd>
			</div>
		<?php
		// Multiday events
		elseif ( tribe_event_is_multiday() ) : ?>
			<div class="qodef-events-single-meta-item">
				<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-calendar', 'linea-icons' ); ?></span>
				<dt class="tribe-events-start-datetime-label"> <?php esc_html_e( 'Start:', 'aperitif-core' ) ?> </dt>
				<dd><abbr class="tribe-events-abbr tribe-events-start-datetime updated published dtstart"
				          title="<?php esc_attr_e( $start_ts ) ?>"> <?php esc_html_e( $start_datetime ) ?> </abbr></dd>
			</div>
			<div class="qodef-events-single-meta-item">
				<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-calendar', 'linea-icons' ); ?></span>
				<dt class="tribe-events-end-datetime-label"> <?php esc_html_e( 'End:', 'aperitif-core' ) ?> </dt>
				<dd><abbr class="tribe-events-abbr tribe-events-end-datetime dtend"
				          title="<?php esc_attr_e( $end_ts ) ?>"> <?php esc_html_e( $end_datetime ) ?> </abbr></dd>
			</div>
		<?php
		// Single day events
		else : ?>
			<div class="qodef-events-single-meta-item">
				<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-calendar', 'linea-icons' ); ?></span>
				<dt class="tribe-events-start-date-label"> <?php esc_html_e( 'Date:', 'aperitif-core' ) ?> </dt>
				<dd><abbr class="tribe-events-abbr tribe-events-start-date published dtstart"
				          title="<?php esc_attr_e( $start_ts ) ?>"> <?php esc_html_e( $start_date ) ?> </abbr></dd>
			</div>
			<div class="qodef-events-single-meta-item">
				<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-calendar', 'linea-icons' ); ?></span>
				<dt class="tribe-events-start-date-label"> <?php esc_html_e( 'Time:', 'aperitif-core' ) ?> </dt>
				<dd>
					<div class="tribe-events-abbr tribe-events-start-time published dtstart"
					     title="<?php esc_attr_e( $end_ts ) ?>">
						<?php echo $time_formatted; ?>
					</div>
				</dd>
			</div>
		<?php endif ?>
		
		<?php
		// Event Cost
		if ( ! empty( $cost ) ) : ?>
			<div class="qodef-events-single-meta-item">
				<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-ecommerce-dollar', 'linea-icons' ); ?></span>
				<dt class="tribe-events-event-cost-label"> <?php esc_html_e( 'Cost:', 'aperitif-core' ) ?> </dt>
				<dd class="tribe-events-event-cost"> <?php esc_html_e( $cost ); ?> </dd>
			</div>
		<?php endif ?>
		
		<?php if ( ! empty( tribe_get_event_categories() ) ) : ?>
			<div class="qodef-events-single-meta-item">
				<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-ecommerce-sale', 'linea-icons' ); ?></span>
				<?php echo tribe_get_event_categories(
					get_the_id(), array(
						'before'       => '',
						'sep'          => ', ',
						'after'        => '',
						'label'        => 'Categories', // An appropriate plural/singular label will be provided
						'label_before' => '<dt class="tribe-events-event-categories-label">',
						'label_after'  => '</dt>',
						'wrap_before'  => '<dd class="tribe-events-event-categories">',
						'wrap_after'   => '</dd>',
					)
				); ?>
			</div>
		<?php endif ?>
		
		<?php if ( ! empty( tribe_meta_event_tags( '', '', false ) ) ) : ?>
			<div class="qodef-events-single-meta-item">
				<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-ecommerce-sale', 'linea-icons' ); ?></span>
				<?php echo tribe_meta_event_tags( sprintf( esc_html__( 'Tags: ', 'aperitif-core' ) ), ', ', false ) ?>
			</div>
		<?php endif ?>
		
		<?php
		// Event Website
		if ( ! empty( $website ) ) : ?>
			<div class="qodef-events-single-meta-item">
				<span class="qodef-events-single-meta-icon"><?php echo qode_framework_icons()->render_icon( 'icon-basic-world', 'linea-icons' ); ?></span>
				<dt class="tribe-events-event-url-label"> <?php esc_html_e( 'Website:', 'aperitif-core' ) ?> </dt>
				<dd class="tribe-events-event-url"> <?php echo $website; ?> </dd>
			</div>
		<?php endif ?>
		
		<?php do_action( 'tribe_events_single_meta_details_section_end' ) ?>
	</dl>
</div>
