<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Main Theme Functions File
 * Created by CMSMasters
 * 
 */


// Current Theme Constants
if (!defined('CMSMASTERS_SHORTNAME')) {
	define('CMSMASTERS_SHORTNAME', 'mall');
}

if (!defined('CMSMASTERS_FULLNAME')) {
	define('CMSMASTERS_FULLNAME', 'Mall');
}



/*** START EDIT THEME PARAMETERS HERE ***/

// Theme Settings System Fonts List
if (!function_exists('cmsmasters_system_fonts_list')) {
	function cmsmasters_system_fonts_list() {
		$fonts = array( 
			"Arial, Helvetica, 'Nimbus Sans L', sans-serif" => 'Arial', 
			"Calibri, 'AppleGothic', 'MgOpen Modata', sans-serif" => 'Calibri', 
			"'Trebuchet MS', Helvetica, Garuda, sans-serif" => 'Trebuchet MS', 
			"'Comic Sans MS', Monaco, 'TSCu_Comic', cursive" => 'Comic Sans MS', 
			"Georgia, Times, 'Century Schoolbook L', serif" => 'Georgia', 
			"Verdana, Geneva, 'DejaVu Sans', sans-serif" => 'Verdana', 
			"Tahoma, Geneva, Kalimati, sans-serif" => 'Tahoma', 
			"'Lucida Sans Unicode', 'Lucida Grande', Garuda, sans-serif" => 'Lucida Sans', 
			"'Times New Roman', Times, 'Nimbus Roman No9 L', serif" => 'Times New Roman', 
			"'Courier New', Courier, 'Nimbus Mono L', monospace" => 'Courier New', 
			
		);
		
		
		return $fonts;
	}
}



// Theme Settings Google Fonts List
if (!function_exists('cmsmasters_google_fonts_list')) {
	function cmsmasters_google_fonts_list() {
		$fonts = array( 
			'' => esc_html__('None', 'mall'), 
			'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic' => 'Titillium Web', 
			'Roboto:300,300italic,400,400italic,500,500italic,700,700italic' => 'Roboto', 
			'Roboto+Condensed:400,400italic,700,700italic' => 'Roboto Condensed', 
			'Open+Sans:300,300italic,400,400italic,700,700italic' => 'Open Sans', 
			'Open+Sans+Condensed:300,300italic,700' => 'Open Sans Condensed', 
			'Droid+Sans:400,700' => 'Droid Sans', 
			'Droid+Serif:400,400italic,700,700italic' => 'Droid Serif', 
			'PT+Sans:400,400italic,700,700italic' => 'PT Sans', 
			'PT+Sans+Caption:400,700' => 'PT Sans Caption', 
			'PT+Sans+Narrow:400,700' => 'PT Sans Narrow', 
			'PT+Serif:400,400italic,700,700italic' => 'PT Serif', 
			'Ubuntu:400,400italic,700,700italic' => 'Ubuntu', 
			'Ubuntu+Condensed' => 'Ubuntu Condensed', 
			'Headland+One' => 'Headland One', 
			'Source+Sans+Pro:300,300italic,400,400italic,700,700italic' => 'Source Sans Pro', 
			'Lato:400,400italic,700,700italic' => 'Lato', 
			'Cuprum:400,400italic,700,700italic' => 'Cuprum', 
			'Oswald:300,400,700' => 'Oswald', 
			'Yanone+Kaffeesatz:300,400,700' => 'Yanone Kaffeesatz', 
			'Lobster' => 'Lobster', 
			'Lobster+Two:400,400italic,700,700italic' => 'Lobster Two', 
			'Questrial' => 'Questrial', 
			'Raleway:300,400,500,600,700' => 'Raleway', 
			'Dosis:300,400,500,700' => 'Dosis', 
			'Cutive+Mono' => 'Cutive Mono', 
			'Quicksand:300,400,700' => 'Quicksand', 
			'Montserrat:400,700' => 'Montserrat', 
			'Cookie' => 'Cookie', 
			'Roboto+Slab:400,700&subset=latin,latin-ext'=> 'Roboto+Slab' ,
			
		);
		
		
		return $fonts;
	}
}



// Theme Settings Font Weights List
if (!function_exists('cmsmasters_font_weight_list')) {
	function cmsmasters_font_weight_list() {
		$list = array( 
			'normal' => 	'normal', 
			'100' => 		'100', 
			'200' => 		'200', 
			'300' => 		'300', 
			'400' => 		'400', 
			'500' => 		'500', 
			'600' => 		'600', 
			'700' => 		'700', 
			'800' => 		'800', 
			'900' => 		'900', 
			'bold' => 		'bold', 
			'bolder' => 	'bolder', 
			'lighter' => 	'lighter', 
		);
		
		
		return $list;
	}
}



// Theme Settings Font Styles List
if (!function_exists('cmsmasters_font_style_list')) {
	function cmsmasters_font_style_list() {
		$list = array( 
			'normal' => 	'normal', 
			'italic' => 	'italic', 
			'oblique' => 	'oblique', 
			'inherit' => 	'inherit', 
		);
		
		
		return $list;
	}
}



// Theme Settings Text Transforms List
if (!function_exists('cmsmasters_text_transform_list')) {
	function cmsmasters_text_transform_list() {
		$list = array( 
			'none' => 'none', 
			'uppercase' => 'uppercase', 
			'lowercase' => 'lowercase', 
			'capitalize' => 'capitalize', 
		);
		
		
		return $list;
	}
}



// Theme Settings Text Decorations List
if (!function_exists('cmsmasters_text_decoration_list')) {
	function cmsmasters_text_decoration_list() {
		$list = array( 
			'none' => 'none', 
			'underline' => 'underline', 
			'overline' => 'overline', 
			'line-through' => 'line-through', 
		);
		
		
		return $list;
	}
}



// Theme Settings Custom Color Schemes
if (!function_exists('cmsmasters_custom_color_schemes_list')) {
	function cmsmasters_custom_color_schemes_list() {
		$list = array( 
			'first' => esc_html__('Custom 1', 'mall'), 
			'second' => esc_html__('Custom 2', 'mall'), 
			'third' => esc_html__('Custom 3', 'mall') 
		);
		
		
		return $list;
	}
}



// WP Color Picker Palettes
if (!function_exists('cmsmasters_color_picker_palettes')) {
	function cmsmasters_color_picker_palettes() {
		$palettes = array( 
			'#000000', 
			'#ffffff', 
			'#d43c18', 
			'#5173a6', 
			'#959595', 
			'#c0c0c0', 
			'#f4f4f4', 
			'#e1e1e1' 
		);
		
		
		return $palettes;
	}
}

/*** STOP EDIT THEME PARAMETERS HERE ***/



// Theme Plugin Support Constants
if (!defined('CMSMASTERS_WOOCOMMERCE') && class_exists('woocommerce')) {
	define('CMSMASTERS_WOOCOMMERCE', true);
} elseif (!defined('CMSMASTERS_WOOCOMMERCE')) {
	define('CMSMASTERS_WOOCOMMERCE', false);
}

if (!defined('CMSMASTERS_EVENTS_CALENDAR') && class_exists('Tribe__Events__Main')) {
	define('CMSMASTERS_EVENTS_CALENDAR', true);
} elseif (!defined('CMSMASTERS_EVENTS_CALENDAR')) {
	define('CMSMASTERS_EVENTS_CALENDAR', false);
}

if (!defined('CMSMASTERS_PAYPALDONATIONS') && class_exists('PayPalDonations')) {
	define('CMSMASTERS_PAYPALDONATIONS', true);
} elseif (!defined('CMSMASTERS_PAYPALDONATIONS')) {
	define('CMSMASTERS_PAYPALDONATIONS', false);
}

if (!defined('CMSMASTERS_DONATIONS') && class_exists('Cmsmasters_Donations')) {
	define('CMSMASTERS_DONATIONS', false);
} elseif (!defined('CMSMASTERS_DONATIONS')) {
	define('CMSMASTERS_DONATIONS', false);
}

if (!defined('CMSMASTERS_TIMETABLE') && function_exists('timetable_events_init')) {
	define('CMSMASTERS_TIMETABLE', false);
} elseif (!defined('CMSMASTERS_TIMETABLE')) {
	define('CMSMASTERS_TIMETABLE', false);
}

if (!defined('CMSMASTERS_TC_EVENTS') && class_exists('TC')) {
	define('CMSMASTERS_TC_EVENTS', true);
} elseif (!defined('CMSMASTERS_TC_EVENTS')) {
	define('CMSMASTERS_TC_EVENTS', false);
}


// Theme Colored Categories Constant
if (!defined('CMSMASTERS_COLORED_CATEGORIES')) {
	define('CMSMASTERS_COLORED_CATEGORIES', true);
}

// Theme Projects Compatible
if (!defined('CMSMASTERS_PROJECT_COMPATIBLE')) {
	define('CMSMASTERS_PROJECT_COMPATIBLE', true);
}

// Theme Profiles Compatible
if (!defined('CMSMASTERS_PROFILE_COMPATIBLE')) {
	define('CMSMASTERS_PROFILE_COMPATIBLE', true);
}



// Theme Image Thumbnails Size
if (!function_exists('cmsmasters_image_thumbnail_list')) {
	function cmsmasters_image_thumbnail_list() {
		$list = array( 
			'small-thumb' => array( 
				'width' => 		60, 
				'height' => 	60, 
				'crop' => 		true 
			), 
			'square-thumb' => array( 
				'width' => 		300, 
				'height' => 	300, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Square', 'mall') 
			), 
			'blog-masonry-thumb' => array( 
				'width' => 		580, 
				'height' => 	375, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Masonry Blog', 'mall') 
			), 
			'project-thumb' => array( 
				'width' => 		580, 
				'height' => 	390, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Project', 'mall') 
			), 
			'project-masonry-thumb' => array( 
				'width' => 		580, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry Project', 'mall') 
			), 
			'post-thumbnail' => array( 
				'width' => 		860, 
				'height' => 	480, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Featured', 'mall') 
			), 
			'masonry-thumb' => array( 
				'width' => 		860, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry', 'mall') 
			), 
			'full-thumb' => array( 
				'width' => 		1160, 
				'height' => 	750, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Full', 'mall') 
			), 
			'project-full-thumb' => array( 
				'width' => 		1160, 
				'height' => 	648, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Project Full', 'mall') 
			), 
			'full-masonry-thumb' => array( 
				'width' => 		1160, 
				'height' => 	9999, 
				'title' => 		esc_attr__('Masonry Full', 'mall') 
			) 
		);
		
		
		if (CMSMASTERS_EVENTS_CALENDAR) {
			$list['event-thumb'] = array( 
				'width' => 		580, 
				'height' => 	380, 
				'crop' => 		true, 
				'title' => 		esc_attr__('Event', 'mall') 
			);
		}
		
		
		return $list;
	}
}



// Theme Settings All Color Schemes List
if (!function_exists('cmsmasters_all_color_schemes_list')) {
	function cmsmasters_all_color_schemes_list() {
		$list = array( 
			'default' => 		esc_html__('Default', 'mall'), 
			'header' => 		esc_html__('Header', 'mall'), 
			'navigation' => 	esc_html__('Navigation', 'mall'), 
			'header_top' => 	esc_html__('Header Top', 'mall'), 
			'footer' => 		esc_html__('Footer', 'mall') 
		);
		
		
		$out = array_merge($list, cmsmasters_custom_color_schemes_list());
		
		
		return $out;
	}
}



// Theme Settings Color Schemes List
if (!function_exists('cmsmasters_color_schemes_list')) {
	function cmsmasters_color_schemes_list() {
		$list = cmsmasters_all_color_schemes_list();
		
		
		unset($list['header']);
		
		unset($list['navigation']);
		
		unset($list['header_top']);
		
		
		$out = array_merge($list, cmsmasters_custom_color_schemes_list());
		
		
		return $out;
	}
}



// Theme Settings Color Schemes Default Colors
if (!function_exists('cmsmasters_color_schemes_defaults')) {
	function cmsmasters_color_schemes_defaults() {
		$list = array( 
			'default' => array( // content default color scheme
				'color' => 		'#878787', 
				'link' => 		'#ff6c2f', 
				'hover' => 		'#3b3b3b', 
				'heading' => 	'#292929', 
				'bg' => 		'#fbfbfb', 
				'alternate' => 	'#ffffff', 
				'border' => 	'#e4e4e4' 
			), 
			'header' => array( // Header color scheme
				'mid_color' => 		'#878787', 
				'mid_link' => 		'#292929', 
				'mid_hover' => 		'#fa6426', 
				'mid_bg' => 		'#ffffff', 
				'mid_bg_scroll' => 	'rgba(255,255,255,0.9)', 
				'mid_border' => 	'#e4e4e4', 
				'bot_color' => 		'#878787', 
				'bot_link' => 		'#292929', 
				'bot_hover' => 		'#fa6426', 
				'bot_bg' => 		'#ffffff', 
				'bot_bg_scroll' => 	'rgba(255,255,255,0.9)', 
				'bot_border' => 	'#e4e4e4' 
			), 
			'navigation' => array( // Navigation color scheme
				'title_link' => 			'#393939', 
				'title_link_hover' => 		'#ff6f33', 
				'title_link_current' => 	'#ffffff', 
				'title_link_subtitle' => 	'#ed1c24', 
				'title_link_bg' => 			'rgba(255,255,255,0)', 
				'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
				'title_link_bg_current' => 	'#ff6f33', 
				'title_link_border' => 		'rgba(255,255,255,0)', 
				'dropdown_text' => 			'#ffffff', 
				'dropdown_bg' => 			'#292929', 
				'dropdown_border' => 		'rgba(255,255,255,0)', 
				'dropdown_link' => 			'#ffffff', 
				'dropdown_link_hover' => 	'#ff6f33', 
				'dropdown_link_subtitle' => '#ffffff', 
				'dropdown_link_highlight' => 'rgba(255,255,255,0)', 
				'dropdown_link_border' => 	'rgba(255,255,255,0)' 
			), 
			'header_top' => array( // Header Top color scheme
				'color' => 					'#ffffff', 
				'link' => 					'#ffffff', 
				'hover' => 					'#ff6f33', 
				'bg' => 					'#292929', 
				'border' => 				'#484848', 
				'title_link' => 			'#2dcecf', 
				'title_link_hover' => 		'#ffffff', 
				'title_link_bg' => 			'#292929', 
				'title_link_bg_hover' => 	'rgba(255,255,255,0)', 
				'title_link_border' => 		'rgba(255,255,255,0)', 
				'dropdown_bg' => 			'#292929', 
				'dropdown_border' => 		'rgba(255,255,255,0)', 
				'dropdown_link' => 			'#ffffff', 
				'dropdown_link_hover' => 	'#2dcecf', 
				'dropdown_link_highlight' => 'rgba(255,255,255,0)', 
				'dropdown_link_border' => 	'rgba(255,255,255,0)' 
			), 
			'footer' => array( // Footer color scheme
				'color' => 		'#898989', 
				'link' => 		'#ffffff', 
				'hover' => 		'#1ad28a', 
				'heading' => 	'#ffffff', 
				'bg' => 		'#292929', 
				'alternate' => 	'rgba(255,255,255,0)', 
				'border' => 	'rgba(255,255,255,0)' 
			), 
			'first' => array( // custom color scheme 1
				'color' => 		'#595959', 
				'link' => 		'#ff6c2f', 
				'hover' => 		'#3b3b3b', 
				'heading' => 	'#292929', 
				'bg' => 		'#ffffff', 
				'alternate' => 	'#ffffff', 
				'border' => 	'#e4e4e4' 
			), 
			'second' => array( // custom color scheme 2
				'color' => 		'#878787', 
				'link' => 		'#ff6c2f', 
				'hover' => 		'#3b3b3b', 
				'heading' => 	'#292929', 
				'bg' => 		'#fbfbfb', 
				'alternate' => 	'#ffffff', 
				'border' => 	'#e4e4e4' 
			), 
			'third' => array( // custom color scheme 3
				'color' => 		'#878787', 
				'link' => 		'#ff6c2f', 
				'hover' => 		'#3b3b3b', 
				'heading' => 	'#292929', 
				'bg' => 		'#fbfbfb', 
				'alternate' => 	'#ffffff', 
				'border' => 	'#e4e4e4' 
			) 
		);
		
		
		return $list;
	}
}



// CMSMasters Framework Directories Constants
if (!defined('CMSMASTERS_FRAMEWORK')) {
	define('CMSMASTERS_FRAMEWORK', get_template_directory() . '/framework');
}

if (!defined('CMSMASTERS_ADMIN')) {
	define('CMSMASTERS_ADMIN', CMSMASTERS_FRAMEWORK . '/admin');
}

if (!defined('CMSMASTERS_SETTINGS')) {
	define('CMSMASTERS_SETTINGS', CMSMASTERS_ADMIN . '/settings');
}

if (!defined('CMSMASTERS_OPTIONS')) {
	define('CMSMASTERS_OPTIONS', CMSMASTERS_ADMIN . '/options');
}

if (!defined('CMSMASTERS_ADMIN_INC')) {
	define('CMSMASTERS_ADMIN_INC', CMSMASTERS_ADMIN . '/inc');
}

if (!defined('CMSMASTERS_CLASS')) {
	define('CMSMASTERS_CLASS', CMSMASTERS_FRAMEWORK . '/class');
}

if (!defined('CMSMASTERS_FUNCTION')) {
	define('CMSMASTERS_FUNCTION', CMSMASTERS_FRAMEWORK . '/function');
}


if (!defined('CMSMASTERS_COMPOSER')) {
	define('CMSMASTERS_COMPOSER', get_template_directory() . '/cmsmasters-c-c');
}



// Load Framework Parts
require_once(CMSMASTERS_SETTINGS . '/cmsmasters-theme-settings.php');

require_once(CMSMASTERS_OPTIONS . '/cmsmasters-theme-options.php');

require_once(CMSMASTERS_ADMIN_INC . '/admin-scripts.php');

require_once(CMSMASTERS_ADMIN_INC . '/plugin-activator.php');

require_once(CMSMASTERS_CLASS . '/likes-posttype.php');

require_once(CMSMASTERS_CLASS . '/twitteroauth.php');

require_once(CMSMASTERS_CLASS . '/widgets.php');

require_once(CMSMASTERS_FUNCTION . '/breadcrumbs.php');

require_once(CMSMASTERS_FUNCTION . '/likes.php');

require_once(CMSMASTERS_FUNCTION . '/pagination.php');

require_once(CMSMASTERS_FUNCTION . '/single-comment.php');

require_once(CMSMASTERS_FUNCTION . '/theme-functions.php');

require_once(CMSMASTERS_FUNCTION . '/theme-fonts.php');

require_once(CMSMASTERS_FUNCTION . '/theme-colors-primary.php');

require_once(CMSMASTERS_FUNCTION . '/theme-colors-secondary.php');

require_once(CMSMASTERS_FUNCTION . '/template-functions.php');

require_once(CMSMASTERS_FUNCTION . '/template-functions-post.php');

require_once(CMSMASTERS_FUNCTION . '/template-functions-project.php');

require_once(CMSMASTERS_FUNCTION . '/template-functions-profile.php');

require_once(CMSMASTERS_FUNCTION . '/template-functions-shortcodes.php');

require_once(CMSMASTERS_FUNCTION . '/template-functions-widgets.php');


// Theme Colored Categories Functions
if (CMSMASTERS_COLORED_CATEGORIES) {
	require_once(CMSMASTERS_FUNCTION . '/theme-colored-categories.php');
}


if (class_exists('Cmsmasters_Content_Composer')) {
	require_once(CMSMASTERS_COMPOSER . '/filters/cmsmasters-c-c-atts-filters.php');
}


// CMSMASTERS Donations functions
if (CMSMASTERS_DONATIONS) {
	require_once(get_template_directory() . '/cmsmasters-donations/function/template-functions-donation.php');
}

// Woocommerce functions
if (CMSMASTERS_WOOCOMMERCE) {
	require_once(get_template_directory() . '/woocommerce/cmsmasters-woo-functions.php');
}

// Events functions
if (CMSMASTERS_EVENTS_CALENDAR) {
	require_once(get_template_directory() . '/tribe-events/cmsmasters-events-functions.php');
}



// Load Theme Local File
if (!function_exists('cmsmasters_load_theme_textdomain')) {
	function cmsmasters_load_theme_textdomain() {
		load_theme_textdomain('mall', CMSMASTERS_FRAMEWORK . '/languages');
	}
}

// Load Theme Local File Action
if (!has_action('after_setup_theme', 'cmsmasters_load_theme_textdomain')) {
	add_action('after_setup_theme', 'cmsmasters_load_theme_textdomain');
}



// Framework Activation & Data Import
if (!function_exists('cmsmasters_theme_activation')) {
	function cmsmasters_theme_activation() {
		if (get_option('cmsmasters_active_theme') != CMSMASTERS_SHORTNAME) {
			add_option('cmsmasters_active_theme', CMSMASTERS_SHORTNAME, '', 'yes');
			
			
			cmsmasters_add_global_options();
			
			
			cmsmasters_regenerate_styles();
			
			
			cmsmasters_add_global_icons();
			
			
			flush_rewrite_rules();
			
			
			wp_redirect(esc_url(admin_url('admin.php?page=cmsmasters-settings&upgraded=true')));
		}
	}
}

add_action('after_switch_theme', 'cmsmasters_theme_activation');



// Framework Deactivation
if (!function_exists('cmsmasters_theme_deactivation')) {
	function cmsmasters_theme_deactivation() {
		delete_option('cmsmasters_active_theme');
	}
}

// Framework Deactivation Action
if (!has_action('switch_theme', 'cmsmasters_theme_deactivation')) {
	add_action('switch_theme', 'cmsmasters_theme_deactivation');
}