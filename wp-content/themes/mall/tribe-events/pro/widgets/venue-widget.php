<?php
/**
 * Events Pro Venue Widget
 * This is the template for the output of the venue widget. 
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/widgets/venue-widget.php
 *
 * @package TribeEventsCalendarPro
 * 
 * @cmsmasters_package 	Mall
 * @cmsmasters_version 	1.0.0
 *
 */


if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_plural = tribe_get_event_label_plural();

?>

<div class="tribe-venue-widget-wrapper">
	<div class="tribe-venue-widget-venue">
		<?php if (has_post_thumbnail($venue_ID)) { ?>
			<div class="tribe-venue-widget-thumbnail">
				<?php echo get_the_post_thumbnail($venue_ID, 'event-thumb' ); ?>
			</div>
		<?php } ?>
		<div class="tribe-venue-widget-venue-name cmsmasters_theme_icon_user_address">
			<?php echo tribe_get_venue_link($venue_ID); ?>
		</div>
	</div>

	<?php if ( 0 === $events->post_count ): ?>
		<?php printf( esc_html__( 'No upcoming %s.', 'tribe-events-calendar-pro' ),  strtolower( $events_label_plural ) ); ?>
	<?php else: ?>
	<?php do_action( 'tribe_events_venue_widget_before_the_list' ); ?>
	<ul class="tribe-venue-widget-list hfeed vcalendar">
		<?php while ( $events->have_posts() ): ?>
			<?php $events->the_post(); ?>
			<li class="<?php tribe_events_event_classes() ?>">
				<h6 class="entry-title summary">
					<a href="<?php echo esc_url( tribe_get_event_link() ); ?>"><?php echo get_the_title( get_the_ID() ) ?></a>
				</h6>
				<div class="cmsmasters_widget_event_info">
					<div class="cmsmasters_widget_event_info_date cmsmasters_theme_icon_time">
						<?php echo tribe_events_event_schedule_details() ?>
					</div>
					<?php if ( tribe_get_cost( get_the_ID() ) != '' ): ?>
					<div class="cmsmasters_widget_event_info_cost cmsmasters_theme_icon_money">
						<span class="tribe-events-event-cost">
							<?php echo tribe_get_cost( get_the_ID(), true ); ?>
						</span>
					</div>
					<?php endif; ?>
				</div>
			</li>
	<?php endwhile;	?>
	</ul>
	<?php do_action( 'tribe_events_venue_widget_after_the_list' ); ?>
	<?php endif; ?>
	<p class="tribe-events-widget-link">
		<a href="<?php echo esc_url( tribe_get_venue_link( $venue_ID, false ) ); ?>"><?php printf( esc_html__( 'View all %s at this %s', 'the-events-calendar' ), $events_label_plural, tribe_get_venue_label_singular() ); ?></a>
	</p>
</div>
