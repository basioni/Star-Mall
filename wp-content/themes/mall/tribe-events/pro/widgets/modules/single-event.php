<?php
/**
 * Single Event Template for Widgets
 *
 * This template is used to render single events for both the calendar and advanced
 * list widgets, facilitating a common appearance for each as standard.
 *
 * You can override this template in your own theme by creating a file at
 * [your-theme]/tribe-events/widgets/modules/single-widget.php
 *
 * @package TribeEventsCalendarPro
 * 
 * @cmsmasters_package 	Mall
 * @cmsmasters_version 	1.0.0
 *
 */


$mini_cal_event_atts = tribe_events_get_widget_event_atts();

$postDate = tribe_events_get_widget_event_post_date();

$organizer_ids = tribe_get_organizer_ids();
$multiple_organizers = count( $organizer_ids ) > 1;
?>
<div class="tribe-mini-calendar-event event-<?php echo esc_attr( $mini_cal_event_atts['current_post'] ); ?> <?php echo esc_attr( $mini_cal_event_atts['class'] ); ?>">
	<div class="cmsmasters_event_date">
		<div class="cmsmasters_event_date_inner">
			<span class="cmsmasters_event_day_mon"><?php echo tribe_get_start_date(null, false, 'd.m'); ?></span>
			<span class="cmsmasters_event_year"><?php echo tribe_get_start_date(null, false, 'Y'); ?></span>
		</div>
	</div>
	<div class="tribe-events-list-widget-content-wrap">
		<?php do_action( 'tribe_events_list_widget_before_the_event_title' ); ?>

		<h3 class="entry-title summary">
			<a href="<?php echo esc_url( tribe_get_event_link() ); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h3>

		<?php do_action( 'tribe_events_list_widget_after_the_event_title' ); ?>

		<?php do_action( 'tribe_events_list_widget_before_the_meta' ) ?>
		
		<div class="cmsmasters_widget_event_info">
			<div class="duration cmsmasters_theme_icon_time">
				<?php echo tribe_events_event_schedule_details(); ?>
			</div>
			<?php if ( isset( $cost ) && $cost && tribe_get_cost() != '' ) { ?>
				<div class="tribe-events-event-cost cmsmasters_theme_icon_money">
					<?php echo tribe_get_cost( null, true ); ?>
				</div>
			<?php } ?>
			
			<div class="vcard adr location cmsmasters_widget_event_venue_info_loc">
			<?php 
				if ( 
					( isset( $venue ) && $venue && tribe_get_venue() != '' ) || 
					( isset( $address ) && $address && tribe_get_address() != '' ) || 
					( isset( $city ) && $city && tribe_get_city() != '' ) || 
					( isset( $region ) && $region && tribe_get_region() != '' ) || 
					( isset( $zip ) && $zip && tribe_get_zip() != '' ) || 
					( isset( $country ) && $country && tribe_get_country() != '' ) 
				) {
			?>
				<div class="cmsmasters_widget_event_venue_info cmsmasters_theme_icon_user_address">
					<?php if ( isset( $venue ) && $venue && tribe_get_venue() != '' ): ?>
						<span class="tribe-events-venue"><?php echo tribe_get_venue_link(); ?></span>
					<?php endif ?>

					<?php if ( isset( $address ) && $address && tribe_get_address() != '' ): ?>
						<span class="tribe-street-address"><?php echo tribe_get_address(); ?></span>
					<?php endif ?>

					<?php if ( isset( $city ) && $city && tribe_get_city() != '' ): ?>
						<span class="tribe-events-locality"><?php echo tribe_get_city(); ?></span>
					<?php endif ?>

					<?php if ( isset( $region ) && $region && tribe_get_region() != '' ): ?>
						<span class="tribe-events-region"><?php echo tribe_get_region(); ?></span>
					<?php endif ?>

					<?php if ( isset( $zip ) && $zip && tribe_get_zip() != '' ): ?>
						<span class="tribe-events-postal-code"><?php echo tribe_get_zip(); ?></span>
					<?php endif ?>

					<?php if ( isset( $country ) && $country && tribe_get_country() != '' ): ?>
						<span class="tribe-country-name"><?php echo tribe_get_country(); ?></span>
					<?php endif ?>
				</div>
			<?php 
				}
				
				
				if ( 
					(! empty( $organizer_ids )) || 
					( isset( $phone ) && $phone && tribe_get_phone() != '' ) 
				) {
			?>
				<div class="cmsmasters_widget_event_venue_loc cmsmasters_theme_icon_person">
					<?php if ( ! empty( $organizer_ids ) ): ?>
						<span class="tribe-events-organizer">
							<?php
							$organizer_links = array();
							foreach ( $organizer_ids as $organizer_id ) {
								if ( ! $organizer_id ) {
									continue;
								}

								$organizer_links[] = tribe_get_organizer_link( $organizer_id, true );
							}// end foreach

							$and = _x( 'and', 'list separator for final two elements', 'tribe-events-calendar-pro' );
							if ( 1 == count( $organizer_links ) ) {
								echo $organizer_links[0];
							}// end if
							elseif ( 2 == count( $organizer_links ) ) {
								echo $organizer_links[0] . ' ' . esc_html( $and ) . ' ' . $organizer_links[1];
							}// end elseif
							else {
								$last_organizer = array_pop( $organizer_links );

								echo implode( ', ', $organizer_links );
								echo esc_html( ', ' . $and . ' ' );
								echo $last_organizer;
							}// end else
							?>
						</span>
					<?php endif ?>

					<?php if ( isset( $phone ) && $phone && tribe_get_phone() != '' ) { ?>
						<span class="tribe-events-tel"><?php echo tribe_get_phone(); ?></span>
					<?php } ?>
				</div>
				<?php } ?>
			</div>
		</div>
		
		<?php do_action( 'tribe_events_list_widget_after_the_meta' ) ?>
	</div>
</div>

