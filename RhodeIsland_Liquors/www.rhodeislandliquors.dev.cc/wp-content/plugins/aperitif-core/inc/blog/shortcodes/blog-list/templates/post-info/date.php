<?php
$month   = get_the_time( 'm' );
$year    = get_the_time( 'Y' );
$title   = get_the_title();
$link    = empty( $title ) && ! is_single() ? get_the_permalink() : get_month_link( $year, $month );
$classes = '';
if ( is_single() || is_page() || is_archive() ) { // This check is to prevent classes for Gutenberg block
	$classes = 'published updated';
}
?>
<div itemprop="dateCreated" class="qodef-e-info-item qodef-e-info-date entry-date <?php echo esc_attr( $classes ); ?>">
	<a itemprop="url" href="<?php echo esc_url( $link ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
	<meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number( get_the_ID() ); ?>"/>
</div>