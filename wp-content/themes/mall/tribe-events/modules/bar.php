<?php
/**
 * Events Navigation Bar Module Template
 * Renders our events navigation bar used across our views
 *
 * $filters and $views variables are loaded in and coming from
 * the show funcion in: lib/tribe-events-bar.class.php
 *
 * @package TribeEventsCalendar
 * 
 * @cmsmasters_package 	Mall
 * @cmsmasters_version 	1.0.0
 *
 */


$filters = tribe_events_get_filters();
$views   = tribe_events_get_views();

$current_url = tribe_events_get_current_filter_url();


do_action('tribe_events_bar_before_template'); 
?>
<div id="tribe-events-bar">
	<form id="tribe-bar-form" class="tribe-clearfix" name="tribe-bar-form" method="post" action="<?php echo esc_attr( $current_url ); ?>">
		
		<!-- Mobile Filters Toggle -->
		<div id="tribe-bar-collapse-toggle" <?php if (count($views) == 1) { ?> class="tribe-bar-collapse-toggle-full-width"<?php } ?>>
			<?php printf( esc_html__( 'Find %s', 'the-events-calendar' ), tribe_get_event_label_plural() ); ?><span class="tribe-bar-toggle-arrow"></span>
		</div>
		
		
		<?php if ( ! empty( $filters ) ) { ?>
			<div class="tribe-bar-filters">
				<div class="tribe-bar-filters-inner tribe-clearfix">
					<?php foreach ( $filters as $filter ) : ?>
						<div class="<?php echo esc_attr( $filter['name'] ) ?>-filter">
							<label class="label-<?php echo esc_attr( $filter['name'] ) ?>" for="<?php echo esc_attr( $filter['name'] ) ?>"><?php echo $filter['caption'] ?></label>
							<?php echo $filter['html'] ?>
						</div>
					<?php endforeach; ?>
					<div class="tribe-bar-submit">
						<label>&nbsp;</label>
						<input class="tribe-events-button tribe-no-param" type="submit" name="submit-bar" value="<?php echo esc_attr( sprintf( esc_html__( 'Find %s', 'the-events-calendar' ), tribe_get_event_label_plural() ) ); ?>" />
					</div>
				</div>
			</div>
		<?php } ?>
		
		
		<!-- Views -->
		<?php if (count($views) > 1) { ?>
		<div id="tribe-bar-views">
			<div class="tribe-bar-views-inner tribe-clearfix">
				<h3 class="tribe-events-visuallyhidden"><?php esc_html_e( 'Event Views Navigation', 'the-events-calendar' ) ?></h3>
				<label class="button"><?php esc_html_e( 'View As', 'the-events-calendar' ); ?></label>
				<select class="tribe-bar-views-select tribe-no-param" name="tribe-bar-view">
						<?php foreach ( $views as $view ) : ?>
						<option <?php echo tribe_is_view( $view['displaying'] ) ? 'selected' : 'tribe-inactive' ?> value="<?php echo esc_attr( $view['url'] ); ?>" data-view="<?php echo esc_attr( $view['displaying'] ); ?>">
							<?php echo $view['anchor']; ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<?php } ?>

	</form>
</div>
<?php 
do_action('tribe_events_bar_after_template') ?>

