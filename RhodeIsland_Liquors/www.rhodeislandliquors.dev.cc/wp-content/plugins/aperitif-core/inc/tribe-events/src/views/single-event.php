<?php
/**
 * Single Event Template
 * A single event. This displays the event title, description, meta, and
 * optionally, the Google map for the event.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/single-event.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural   = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<div id="tribe-events-content" class="tribe-events-single qodef-tribe-events">
	
	<!-- Notices -->
	<?php tribe_the_notices() ?>
	
	<?php the_title( '<h1 class="qodef-events-single-title">', '</h1>' ); ?>
	
	<?php while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<!-- Event content -->
			<?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
			<div class="tribe-events-single-event-description tribe-events-content">
				<?php the_content(); ?>
			</div>
			<!-- .tribe-events-single-event-description -->
			<?php do_action( 'tribe_events_single_event_after_the_content' ) ?>
			
			<!-- Event meta -->
			<?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
			<?php tribe_get_template_part( 'modules/meta' ); ?>
			<?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>
			
			<div class="qodef-events-single-media">
				<div class="qodef-events-single-featured-image">
					<!-- Event featured image, but exclude link -->
					<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>
				</div>
				<div class="qodef-events-single-map">
					<!-- If we have a map to embed -->
					<?php if ( tribe_embed_google_map() ) {
						tribe_get_template_part( 'modules/meta/map' );
					} ?>
				</div>
			</div>
		
		</div> <!-- #post-x -->
		<?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) )
			comments_template() ?>
	<?php endwhile; ?>
	
	<!-- Event footer -->
	<div id="tribe-events-footer">
		<!-- Navigation -->
		<nav class="tribe-events-nav-pagination"
		     aria-label="<?php printf( esc_html__( '%s Navigation', 'aperitif-core' ), $events_label_singular ); ?>">
			<ul class="tribe-events-sub-nav">
				<li class="tribe-events-nav-previous">
					<?php tribe_the_prev_event_link( '<span class="qodef-events-single-navigation-icon-prev">' .
					                                 qode_framework_icons()->render_icon( 'icon-arrows-slim-left', 'linea-icons' ) . '</span>' .
					                                 esc_html__( 'Previous', 'aperitif-core' ) ) ?>
				</li>
				<li class="tribe-events-nav-next">
					<?php tribe_the_next_event_link( esc_html__( 'Next', 'aperitif-core' ) .
					                                 '<span class="qodef-events-single-navigation-icon-next">' .
					                                 qode_framework_icons()->render_icon( 'icon-arrows-slim-right', 'linea-icons' ) . '</span>' ) ?>
				</li>
			</ul>
			<!-- .tribe-events-sub-nav -->
		</nav>
	</div>
	<!-- #tribe-events-footer -->

</div><!-- #tribe-events-content -->