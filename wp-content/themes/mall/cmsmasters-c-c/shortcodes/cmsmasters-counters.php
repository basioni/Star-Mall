<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.0
 * 
 * Content Composer Counters Shortcode
 * Created by CMSMasters
 * 
 */


extract(shortcode_atts($new_atts, $atts));


$unique_id = uniqid();


global $style_counters, 
	$counters_count;


if ($count == 5) {
	$counters_count = ' one_fifth';
} elseif ($count == 4) {
	$counters_count = ' one_fourth';
} elseif ($count == 3) {
	$counters_count = ' one_third';
} elseif ($count == 2) {
	$counters_count = ' one_half';
} else {
	$counters_count = ' one_first';
}


$style_counters = "\n" . '#cmsmasters_counters_' . $unique_id . ' .cmsmasters_counter.counter_has_icon .cmsmasters_counter_inner, ' . "\n" . 
'#cmsmasters_counters_' . $unique_id . ' .cmsmasters_counter.counter_has_icon .cmsmasters_counter_inner, ' . 
'#cmsmasters_counters_' . $unique_id . ' .cmsmasters_counter.counter_has_image .cmsmasters_counter_inner { ' . 
	"\n\t" . 'padding-' . (($type == 'horizontal') ? ((is_rtl()) ? 'right' : 'left') : 'top') . ':' . ((int) $icon_space + 20) . 'px; ' . 
"\n" . '} ' . "\n\n" . 
'#cmsmasters_counters_' . $unique_id . ' .cmsmasters_counter.counter_has_icon .cmsmasters_counter_subtitle, ' . 
'#cmsmasters_counters_' . $unique_id . ' .cmsmasters_counter.counter_has_image .cmsmasters_counter_subtitle { ' . 
	"\n\t" . (($type == 'horizontal') ? 'padding-' . ((is_rtl()) ? 'right' : 'left') . ':' . ((int) $icon_space + 20) . 'px; ' : '') . 
"\n" . '} ' . "\n\n" . 
'#cmsmasters_counters_' . $unique_id . '.counters_type_vertical .cmsmasters_counter .cmsmasters_counter_inner:before { ' . 
	"\n\t" . 'margin-' . ((is_rtl()) ? 'right' : 'left') . ':-' . ((int) $icon_space / 2) . 'px; ' . 
"\n" . '} ' . "\n\n" . 
'#cmsmasters_counters_' . $unique_id . '.counters_type_horizontal .cmsmasters_counter .cmsmasters_counter_inner { ' . 
	"\n\t" . 'height:' . $icon_space . 'px; ' . 
"\n" . '} ' . "\n\n" . 
'#cmsmasters_counters_' . $unique_id . ' .cmsmasters_counter .cmsmasters_counter_inner:before { ' . 
	"\n\t" . 'font-size:' . $icon_size . 'px; ' . 
	"\n\t" . 'line-height:' . ((int) $icon_space - ((int) $icon_border_width * 2)) . 'px; ' . 
	"\n\t" . 'width:' . $icon_space . 'px; ' . 
	"\n\t" . 'height:' . $icon_space . 'px; ' . 
	"\n\t" . 'border-width:' . $icon_border_width . 'px; ' . 
	(((int) $icon_border_radius > 0) ? "\n\t" . '-webkit-border-radius:' . $icon_border_radius . '; ' : '') . 
	(((int) $icon_border_radius > 0) ? "\n\t" . 'border-radius:' . $icon_border_radius . '; ' : '') . 
"\n" . '} ' . "\n\n";


$counters = do_shortcode($content);


$out = '<style type="text/css"> ' . $style_counters . '</style> ' . "\n" . 
'<div id="cmsmasters_counters_' . $unique_id . '" class="cmsmasters_counters counters_type_' . $type . 
(($classes != '') ? ' ' . $classes : '') . 
'"' . 
(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
'>' . 
	$counters . 
'</div>';


return $out;
