<?php

/**
 *
 * Please see single-event.php in this directory for detailed instructions on how to use and modify these templates.
 * 
 * @cmsmasters_package 	Mall
 * @cmsmasters_version 	1.0.0
 *
 */

?>

<script type="text/html" id="tribe_tmpl_tooltip">
	<div id="tribe-events-tooltip-[[=eventId]]" class="tribe-events-tooltip">
		[[ if(imageTooltipSrc.length) { ]]
		<div class="tribe-events-event-thumb preloader">
			<img class="full-width" src="[[=imageTooltipSrc]]" alt="[[=title]]" />
		</div>
		[[ } ]]
		<div class="tribe-events-event-body">
			<h3 class="entry-title summary">[[=title]]</h3>
			<div class="duration">
				<abbr class="tribe-events-abbr updated published dtstart">[[=dateDisplay]] </abbr>
			</div>
			[[ if(excerpt.length) { ]]
			<p class="entry-summary description">[[=raw excerpt]]</p>
			[[ } ]]
			<span class="tribe-events-arrow"></span>
		</div>
	</div>
</script>
