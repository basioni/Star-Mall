<?php
/**
 * Single Venue Template
 * The template for a venue. By default it displays venue information and lists 
 * events that occur at the specified venue.
 *
 * This view contains the filters required to create an effective single venue view.
 *
 * You can recreate an ENTIRELY new single venue view by doing a template override, and placing
 * a single-venue.php file in a tribe-events/pro/ directory within your theme directory, which
 * will override the /views/single-venue.php. 
 *
 * You can use any or all filters included in this file or create your own filters in 
 * your functions.php. In order to modify or extend a single filter, please see our
 * readme on templates hooks and filters (TO-DO)
 *
 * @package TribeEventsCalendarPro
 * 
 * @cmsmasters_package 	Mall
 * @cmsmasters_version 	1.0.1
 *
 */


if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$venue_id = get_the_ID();


while ( have_posts() ) : the_post(); ?>
<div class="tribe-events-venue">
	<div class="cmsmasters_events_venue_header clearfix">
		<div class="cmsmasters_events_venue_header_left clearfix">
			<!-- Venue Title -->
			<?php do_action('tribe_events_single_venue_before_title'); ?>
			<h2 class="tribe-venue-name entry-title author fn org"><?php echo tribe_get_venue( $venue_id ); ?></h2>
			<?php do_action( 'tribe_events_single_venue_after_title' ) ?>
			
			<div class="tribe-events-event-meta">
				<!-- Venue Meta -->
				<?php
				do_action('tribe_events_single_venue_before_the_meta');
				echo tribe_get_meta_group('tribe_event_venue');
				do_action('tribe_events_single_venue_after_the_meta');
				?>
			</div>
		</div>
		<div class="cmsmasters_events_venue_header_right clearfix">
			<div class="tribe-events-back">
				<a class="cmsmasters_theme_icon_date" href="<?php echo esc_url( tribe_get_events_link() ); ?>" rel="bookmark"><?php printf( esc_html__( 'Back to %s', 'tribe-events-calendar-pro' ), tribe_get_event_label_plural() ); ?></a>
			</div>
			<?php 
			if (tribe_show_google_map_link() && tribe_address_exists()) {
				echo tribe_get_meta('tribe_event_venue_gmap_link');
			}
			?>
		</div>
	</div>
	<div class="tribe-events-venue-meta vcard tribe-clearfix">
		<?php 
		if (has_post_thumbnail()) {
			echo '<div class="cmsmasters_events_venue_meta_img">' . 
				tribe_event_featured_image(null, 'full-masonry-thumb') . 
			'</div>';
		}
		?>
		<!-- Venue Description -->
		<?php if( get_the_content() ) : ?>
		<div class="tribe-venue-description tribe-events-content entry-content">
			<?php the_content(); ?>
		</div>
		<?php endif; 
		
		if (tribe_embed_google_map() && tribe_address_exists()) {
			echo '<div class="cmsmasters_events_venue_meta_map">' . 
				'<div class="tribe-events-map-wrap">' . 
					tribe_get_embedded_map( $venue_id, '100%', '0px' ) . 
				'</div>' . 
			'</div>';
		}
		?>
	</div><!-- .tribe-events-event-meta -->

	<!-- Upcoming event list -->
	<?php do_action( 'tribe_events_single_venue_before_upcoming_events' ) ?>

	<?php
	// Use the tribe_events_single_venuer_posts_per_page to filter the number of events to get here.
	echo tribe_venue_upcoming_events( $venue_id ); ?>

	<?php do_action( 'tribe_events_single_venue_after_upcoming_events' ) ?>
	
</div><!-- .tribe-events-venue -->
<?php endwhile; ?>