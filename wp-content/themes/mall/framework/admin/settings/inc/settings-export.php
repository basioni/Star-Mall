<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Theme Settings Exporter
 * Created by CMSMasters
 * 
 */


$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);

require_once($parse_uri[0] . 'wp-load.php');


header('Content-disposition: attachment; filename=theme-settings.txt');

header('Content-type: text/plain');


$cmsmasters_global_settings = array( 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_general', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_bg', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_header', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_content', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_footer', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_font_content', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_font_link', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_font_nav', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_font_heading', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_font_other', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_element_sidebar', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_element_icon', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_element_lightbox', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_element_sitemap', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_element_error', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_element_code', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_element_recaptcha', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_single_post', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_single_project', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_single_profile', 
	'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_single_campaign' 
);

$wp_global_settings = array( 
	'thumbnail_size_w', 
	'thumbnail_size_h', 
	'medium_size_w', 
	'medium_size_h', 
	'large_size_w', 
	'large_size_h', 
	'theme_mods_' . CMSMASTERS_SHORTNAME, 
	'sidebars_widgets', 
	'widget_custom-advertisement', 
	'widget_akismet_widget', 
	'widget_archives', 
	'widget_calendar', 
	'widget_categories', 
	'widget_custom-contact-form', 
	'widget_custom-contact-info', 
	'widget_nav_menu', 
	'widget_custom-divider', 
	'widget_custom-video', 
	'widget_custom-facebook', 
	'widget_custom-flickr', 
	'widget_custom-html5-audio', 
	'widget_custom-html5-video', 
	'widget_custom-latest-projects', 
	'widget_layerslider_widget', 
	'widget_meta', 
	'widget_pages', 
	'widget_custom-popular-projects', 
	'widget_custom-posts-tabs', 
	'widget_custom-recent-comments', 
	'widget_custom-recent-posts', 
	'widget_rev-slider-widget', 
	'widget_rss', 
	'widget_search', 
	'widget_tag_cloud', 
	'widget_text', 
	'widget_custom-twitter', 
	'widget_icl_lang_sel_widget' 
);


$cmsmasters_global_colors = array();


foreach (cmsmasters_all_color_schemes_list() as $key => $value) {
	$cmsmasters_global_colors[] = 'cmsmasters_options_' . CMSMASTERS_SHORTNAME . '_color_' . $key;
}


$options = array_merge($cmsmasters_global_settings, $cmsmasters_global_colors, $wp_global_settings);


$settings = array();


foreach ($options as $option) {
	if (get_option($option)) {
		$settings[$option] = get_option($option);
	}
}


$base = 'base64_';

$base_en = $base . 'encode';


$result = $base_en(json_encode($settings));


echo $result;

