<?php
/**
 * Events List Widget Template
 * This is the template for the output of the events list widget.
 * All the items are turned on and off through the widget admin.
 * There is currently no default styling, which is needed.
 *
 * This view contains the filters required to create an effective events list widget view.
 *
 * You can recreate an ENTIRELY new events list widget view by doing a template override,
 * and placing a list-widget.php file in a tribe-events/widgets/ directory
 * within your theme directory, which will override the /views/widgets/list-widget.php.
 *
 * You can use any or all filters included in this file or create your own filters in
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @return string
 *
 * @package TribeEventsCalendar
 * 
 * @cmsmasters_package 	Mall
 * @cmsmasters_version 	1.0.0
 *
 */


if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$events_label_plural = tribe_get_event_label_plural();

$posts = tribe_get_list_widget_events();

// Check if any event posts are found.
if ( $posts ) : ?>

	<ol class="hfeed vcalendar">
		<?php
		// Setup the post data for each event.
		foreach ( $posts as $post ) :
			setup_postdata( $post );
			?>
			<li class="tribe-events-list-widget-events <?php tribe_events_event_classes() ?>">
				<div class="cmsmasters_event_date">
					<div class="cmsmasters_event_date_inner">
						<span class="cmsmasters_event_day_mon"><?php echo tribe_get_start_date(null, false, 'd.m'); ?></span>
						<span class="cmsmasters_event_year"><?php echo tribe_get_start_date(null, false, 'Y'); ?></span>
					</div>
				</div>
				<div class="tribe-events-list-widget-content-wrap">
					<?php do_action( 'tribe_events_list_widget_before_the_event_title' ); ?>
					<!-- Event Title -->
					<h3 class="entry-title summary">
						<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" rel="bookmark"><?php the_title(); ?></a>
					</h3>

					<?php do_action( 'tribe_events_list_widget_after_the_event_title' ); ?>
					<!-- Event Time -->

					<?php do_action( 'tribe_events_list_widget_before_the_meta' ) ?>

					<div class="cmsmasters_widget_event_info">
						<div class="duration cmsmasters_theme_icon_time">
							<?php echo tribe_events_event_schedule_details(); ?>
						</div>
					</div>

					<?php do_action( 'tribe_events_list_widget_after_the_meta' ) ?>
				</div>
			</li>
		<?php
		endforeach;
		?>
	</ol><!-- .hfeed -->

	<p class="tribe-events-widget-link">
		<a href="<?php echo esc_url( tribe_get_events_link() ); ?>" rel="bookmark"><?php printf( esc_html__( 'View All %s', 'the-events-calendar' ), $events_label_plural ); ?></a>
	</p>

<?php
// No events were found.
else : ?>
	<p><?php printf( esc_html__( 'There are no upcoming %s at this time.', 'the-events-calendar' ), strtolower( $events_label_plural ) ); ?></p>
<?php
endif;
