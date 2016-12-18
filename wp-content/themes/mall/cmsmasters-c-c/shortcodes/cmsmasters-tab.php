<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.0
 * 
 * Content Composer Single Tab Shortcode
 * Created by CMSMasters
 * 
 */


extract(shortcode_atts($new_atts, $atts));


$unique_id = uniqid();


global $style_tab, 
	$out_tabs, 
	$tabs_mode, 
	$tab_active, 
	$tab_counter;


$tab_counter++;

if ($custom_colors == 'true') { 
	$style_tab .= "\n" . '#cmsmasters_tabs_list_item_' . $unique_id . ' a:hover,' . 
	'#cmsmasters_tabs_list_item_' . $unique_id . '.current_tab a { ' . 
		"\n\t" . cmsmasters_color_css('color', $bg_color) . 
	"\n" . '} ' . "\n";
}


$out_tabs .= '<li id="cmsmasters_tabs_list_item_' . $unique_id . '" class="cmsmasters_tabs_list_item' . 
(($tab_active == $tab_counter) ? ' current_tab' : '') . 
'">' . "\n" . 
	'<a href="#"' . 
	(($icon != '') ? ' class="' . $icon . '"' : '') . 
	'>' . "\n" . 
		'<span>' . $title . '</span>' . "\n" . 
	'</a>' . "\n" . 
'</li>';


$out = '<div id="cmsmasters_tab_' . $unique_id . '" class="cmsmasters_tab' . 
(($tab_active == $tab_counter) ? ' active_tab' : '') . 
(($classes != '') ? ' ' . $classes : '') . 
'">' . "\n" . 
	cmsmasters_divpdel('<div class="cmsmasters_tab_inner">' . "\n" . 
		do_shortcode(wpautop($content)) . 
	'</div>' . "\n") . 
'</div>';


return $out;
