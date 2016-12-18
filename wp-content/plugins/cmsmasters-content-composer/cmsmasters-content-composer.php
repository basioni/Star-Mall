<?php 
/*
Plugin Name: CMSMasters Content Composer
Plugin URI: http://cmsmasters.net/
Description: CMSMasters Content Composer created by <a href="http://cmsmasters.net/" title="CMSMasters">CMSMasters</a> team. Content Composer plugin create custom visual editor with shortcodes & settings integrated to WordPress default content editor for new <a href="http://themeforest.net/user/cmsmasters/portfolio" title="cmsmasters">cmsmasters</a> WordPress themes.
Version: 1.5.1
Author: cmsmasters
Author URI: http://cmsmasters.net/
*/

/*  Copyright 2014 CMSMasters (email : cmsmstrs@gmail.com). All Rights Reserved.
	
	This software is distributed exclusively as appendant 
	to Wordpress themes, created by CMSMasters studio and 
	should be used in strict compliance to the terms, 
	listed in the License Terms & Conditions included 
	in software archive.
	
	If your archive does not include this file, 
	you may find the license text by url 
	http://cmsmasters.net/files/license/cmsmasters-content-composer/license.txt 
	or contact CMSMasters Studio at email 
	copyright.cmsmasters@gmail.com 
	about this.
	
	Please note, that any usage of this software, that 
	contradicts the license terms is a subject to legal pursue 
	and will result copyright reclaim and damage withdrawal.
*/


class Cmsmasters_Content_Composer { 
	function __construct() { 
		define('CMSMASTERS_CONTENT_COMPOSER_VERSION', '1.5.1');
		
		define('CMSMASTERS_CONTENT_COMPOSER_FILE', __FILE__);
		
		define('CMSMASTERS_CONTENT_COMPOSER_PATH', plugin_dir_path(CMSMASTERS_CONTENT_COMPOSER_FILE));
		
		define('CMSMASTERS_CONTENT_COMPOSER_URL', plugin_dir_url(CMSMASTERS_CONTENT_COMPOSER_FILE));
		
		define('CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR', 'cmsmasters-c-c/shortcodes');
		
		
		require_once(CMSMASTERS_CONTENT_COMPOSER_PATH . 'framework/cmsmasters-composer-functions.php');
		
		require_once(CMSMASTERS_CONTENT_COMPOSER_PATH . 'framework/cmsmasters-editor-plugin-register.php');
		
		require_once(CMSMASTERS_CONTENT_COMPOSER_PATH . 'framework/cmsmasters-composer-templates-posttype.php');
		
		require_once(CMSMASTERS_CONTENT_COMPOSER_PATH . 'framework/cmsmasters-composer-lightbox-functions.php');
		
		
		require_once(CMSMASTERS_CONTENT_COMPOSER_PATH . 'framework/inc/editor-additions.php');
		
		
		require_once(CMSMASTERS_CONTENT_COMPOSER_PATH . 'inc/shortcodes.php');
		
		
		require_once(CMSMASTERS_CONTENT_COMPOSER_PATH . 'inc/project/projects-posttype.php');
		
		require_once(CMSMASTERS_CONTENT_COMPOSER_PATH . 'inc/profile/profiles-posttype.php');
		
		
		global $pagenow;
		
		
		add_action('widgets_init', array($this, 'cmsmasters_content_composer_widgets_init'), 1);
		
		
		register_activation_hook(CMSMASTERS_CONTENT_COMPOSER_FILE, array($this, 'cmsmasters_content_composer_activate_deactivate'));
		
		register_deactivation_hook(CMSMASTERS_CONTENT_COMPOSER_FILE, array($this, 'cmsmasters_content_composer_activate_deactivate'));
		
		
		if (is_admin()) {
			add_action('admin_enqueue_scripts', array($this, 'cmsmasters_composer_enqueue_scripts'));
			
			
			add_action('save_post', array($this, 'save_custom_composer_meta'));
			
			
			if ( 
				$pagenow == 'post-new.php' || 
				($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
			) {
				add_action('admin_print_footer_scripts', array($this, 'cmsmasters_composer_init'));
				
				
				add_action('edit_form_after_title', array($this, 'add_composer_button'));
				
				
				add_action('add_meta_boxes', array($this, 'add_custom_composer_meta_box'), 1);
			}
		}
		
		// Load Plugin Local File
		load_plugin_textdomain('cmsmasters_content_composer', false, dirname(plugin_basename(CMSMASTERS_CONTENT_COMPOSER_FILE)) . '/languages/');
	}
	
	
	function cmsmasters_composer_enqueue_scripts($hook) {
		wp_register_style('cmsmasters-admin-styles', CMSMASTERS_CONTENT_COMPOSER_URL . 'framework/css/cmsmasters-admin.css', array(), CMSMASTERS_CONTENT_COMPOSER_VERSION, 'screen');
		
		wp_enqueue_style('cmsmasters-admin-styles');
		
		
		wp_register_style('cmsmasters_content_composer_css', CMSMASTERS_CONTENT_COMPOSER_URL . 'css/jquery.cmsmastersContentComposer.css', array(), CMSMASTERS_CONTENT_COMPOSER_VERSION, 'screen');
		
		wp_register_style('cmsmasters_composer_lightbox_css', CMSMASTERS_CONTENT_COMPOSER_URL . 'css/jquery.cmsmastersComposerLightbox.css', array(), CMSMASTERS_CONTENT_COMPOSER_VERSION, 'screen');
		
		wp_register_style('cmsmasters_content_composer_css_rtl', CMSMASTERS_CONTENT_COMPOSER_URL . 'css/jquery.cmsmastersContentComposer-rtl.css', array(), CMSMASTERS_CONTENT_COMPOSER_VERSION, 'screen');
		
		wp_register_style('cmsmasters_composer_lightbox_css_rtl', CMSMASTERS_CONTENT_COMPOSER_URL . 'css/jquery.cmsmastersComposerLightbox-rtl.css', array(), CMSMASTERS_CONTENT_COMPOSER_VERSION, 'screen');
		
		
		wp_register_script('cmsmasters_composer_shortcodes_js', CMSMASTERS_CONTENT_COMPOSER_URL . 'js/cmsmastersContentComposer-shortcodes.js', array(), CMSMASTERS_CONTENT_COMPOSER_VERSION, true);
		
		wp_localize_script('cmsmasters_composer_shortcodes_js', 'cmsmasters_shortcodes', array( 
		
		/* Start Global Translations */
		
			// Super Global
			'title' =>											__('Title', 'cmsmasters_content_composer'),
			'subtitle' =>										__('Subtitle', 'cmsmasters_content_composer'),
			'content' =>										__('Content', 'cmsmasters_content_composer'),
			'icon' =>											__('Icon', 'cmsmasters_content_composer'),
			'image' =>											__('Image', 'cmsmasters_content_composer'),
			'number' =>											__('Number', 'cmsmasters_content_composer'),
			'size' =>											__('Size', 'cmsmasters_content_composer'),
			'button' =>											__('Button', 'cmsmasters_content_composer'),
			'link' =>											__('Link', 'cmsmasters_content_composer'),
			'divider' =>										__('Divider', 'cmsmasters_content_composer'),
			'color' =>											__('Color', 'cmsmasters_content_composer'),
			'mode' =>											__('Mode', 'cmsmasters_content_composer'),
			'name' => 											__('Name', 'cmsmasters_content_composer'),
			'icon_type' =>										__('Icon Type', 'cmsmasters_content_composer'),
			'orderby_title' =>									__('Order By', 'cmsmasters_content_composer'),
			'order_title' =>									__('Order', 'cmsmasters_content_composer'),
			'order_descr' =>									__("Designates the ascending or descending order of the 'order by' parameter", 'cmsmasters_content_composer'),
			'categories' =>										__('Categories', 'cmsmasters_content_composer'),
			'layout' =>											__('Layout', 'cmsmasters_content_composer'),
			'click_here' => 									__('click here', 'cmsmasters_content_composer'),
			'more_info' => 										__('for more information', 'cmsmasters_content_composer'),
			'columns_count' =>									__('Columns Count', 'cmsmasters_content_composer'),
			'value_number' => 									__('number', 'cmsmasters_content_composer'),
			'value_zero' => 									__('(0 if empty)', 'cmsmasters_content_composer'),
			'clear_color_note' => 								__('If empty, default color scheme will be applied', 'cmsmasters_content_composer'),
			'note' => 											__('Note:', 'cmsmasters_content_composer'),
			'def_text' => 										__('Click here to change this text', 'cmsmasters_content_composer'),
			'size_zero_note' => 								__('number, in pixels (default value if empty or 0)', 'cmsmasters_content_composer'),
			'text_align' => 									__('Text Align', 'cmsmasters_content_composer'),
			'link_target' => 									__('Link Target', 'cmsmasters_content_composer'),
			'link_target_choice_self' =>						__('Open link in a SAME tab/window', 'cmsmasters_content_composer'),
			'link_target_choice_blank' =>						__('Open link in a NEW tab/window', 'cmsmasters_content_composer'),
			'size_note' =>										__('number, in pixels (default value if empty)', 'cmsmasters_content_composer'),	
			'size_note_pixel' =>								__('number, in pixels', 'cmsmasters_content_composer'),	
			'media_def' =>										__('Enter your link here', 'cmsmasters_content_composer'),
			'top_margin' =>										__('Top Margin', 'cmsmasters_content_composer'),
			'bottom_margin' =>									__('Bottom Margin', 'cmsmasters_content_composer'),
			'autoplay' =>										__('Autoplay', 'cmsmasters_content_composer'),
			'autoplay_descr' =>									__('Animate slider automatically', 'cmsmasters_content_composer'),
			'repeat' =>											__('Repeat', 'cmsmasters_content_composer'),
			'preload' =>										__('Preload', 'cmsmasters_content_composer'),
			'audio' =>											__('Audio', 'cmsmasters_content_composer'),
			'layout_mode' =>									__('Layout Mode', 'cmsmasters_content_composer'),
			'metadata' =>										__('Metadata', 'cmsmasters_content_composer'),
			'height' =>											__('Height', 'cmsmasters_content_composer'),
			'border' =>											__('Border', 'cmsmasters_content_composer'),
			'size_note_short' =>								__('number, in pixels', 'cmsmasters_content_composer'),
			'pause_time' =>										__('Pause Time', 'cmsmasters_content_composer'),
			'autoslide_def' =>										__('if \'0\' - autoslide disabled, if empty - \'5\' (in seconds)', 'cmsmasters_content_composer'),
			'pause_on_hover' =>									__('Pause on Hover', 'cmsmasters_content_composer'),
			'border_radius_descr_note_1' =>						__('You can set any border radius rule here.', 'cmsmasters_content_composer'),
			'border_radius_descr_note_2' =>						__('For creating correct rule please use', 'cmsmasters_content_composer'),
			'border_radius_descr_note_3' =>						__('border radius generator', 'cmsmasters_content_composer'),
			'border_radius_descr_note_4' =>						__('But copy only value of the first rule, for example like', 'cmsmasters_content_composer'),
			'border_radius_descr_note_5' =>						__('on this screenshot', 'cmsmasters_content_composer'),
			
			
			
			
			// Choices		
			'choice_default' => 								__('Default', 'cmsmasters_content_composer'),
			'choice_left' => 									__('Left', 'cmsmasters_content_composer'),
			'choice_center' => 									__('Center', 'cmsmasters_content_composer'),
			'choice_right' => 									__('Right', 'cmsmasters_content_composer'),
			'choice_enable' => 									__('Enable', 'cmsmasters_content_composer'),	
			'choice_block' =>									__('Block', 'cmsmasters_content_composer'),
			'choice_inline' =>									__('Inline', 'cmsmasters_content_composer'),
			'choice_inline_block' =>							__('Inline-Block', 'cmsmasters_content_composer'),
			'choice_show' => 									__('Show', 'cmsmasters_content_composer'),
			'choice_date' => 									__('Date', 'cmsmasters_content_composer'),
			'choice_amount' => 									__('Amount', 'cmsmasters_content_composer'),
			'choice_image' => 									__('Image', 'cmsmasters_content_composer'),
			'choice_link' => 									__('Link', 'cmsmasters_content_composer'),
			'choice_campaign' => 								__('Campaign Name', 'cmsmasters_content_composer'),
			'choice_rest_amount' => 							__('Amount of donations still needed', 'cmsmasters_content_composer'),
			'choice_donated_percent' => 						__('Progress percent', 'cmsmasters_content_composer'),
			'choice_donation_but' => 							__('Donation button', 'cmsmasters_content_composer'),
			'choice_id' => 										__('ID', 'cmsmasters_content_composer'),
			'choice_menu' => 									__('Menu Order', 'cmsmasters_content_composer'),
			'choice_popular' => 								__('Popular', 'cmsmasters_content_composer'),
			'choice_rand' => 									__('Random', 'cmsmasters_content_composer'),
			'choice_asc' => 									__('ASC', 'cmsmasters_content_composer'),
			'choice_desc' => 									__('DESC', 'cmsmasters_content_composer'),
			'choice_categories' => 								__('Categories', 'cmsmasters_content_composer'),
			'choice_comments' => 								__('Comments', 'cmsmasters_content_composer'),
			'choice_likes' => 									__('Likes', 'cmsmasters_content_composer'),
			'choice_author' => 									__('Author', 'cmsmasters_content_composer'),
			'choice_tags' => 									__('Tags', 'cmsmasters_content_composer'),
			'choice_title' => 									__('Title', 'cmsmasters_content_composer'),
			'choice_excerpt' => 								__('Excerpt', 'cmsmasters_content_composer'),
			'choice_rollover' => 								__('Image Rollover', 'cmsmasters_content_composer'),
			'choice_more' => 									__("'Read More' button", 'cmsmasters_content_composer'),
			'choice_icon_side' => 								__('Side Icon', 'cmsmasters_content_composer'),
			'choice_icon_top' => 								__('Top Icon', 'cmsmasters_content_composer'),
			'choice_vertical' => 								__('Vertical', 'cmsmasters_content_composer'),
			'choice_horizontal' => 								__('Horizontal', 'cmsmasters_content_composer'),			
			'position_choice_left_side' =>						__('Left side', 'cmsmasters_content_composer'),
			'position_choice_right_side' =>						__('Right side', 'cmsmasters_content_composer'),
			'button_icon_descr' =>								__('Choose icon for your button', 'cmsmasters_content_composer'),
			'choice_slider' =>									__('Slider', 'cmsmasters_content_composer'),
			'choice_grid' =>									__('Grid', 'cmsmasters_content_composer'),
			'choice_short' =>									__('Short', 'cmsmasters_content_composer'),
			'choice_medium' =>									__('Medium', 'cmsmasters_content_composer'),
			'choice_long' =>									__('Long', 'cmsmasters_content_composer'),
			'choice_solid' =>									__('Solid', 'cmsmasters_content_composer'),
			'choice_dotted' =>									__('Dotted', 'cmsmasters_content_composer'),
			'choice_dashed' =>									__('Dashed', 'cmsmasters_content_composer'),
			'choice_double' =>									__('Double', 'cmsmasters_content_composer'),
			'choice_groove' =>									__('Groove', 'cmsmasters_content_composer'),
			'choice_ridge' =>									__('Ridge', 'cmsmasters_content_composer'),
			'choice_inset' =>									__('Inset', 'cmsmasters_content_composer'),
			'choice_outset' =>									__('Outset', 'cmsmasters_content_composer'),
			'choice_decimal' =>									__('Decimal number', 'cmsmasters_content_composer'),
			'choice_decimal_zero' =>							__('Decimal leading zero number', 'cmsmasters_content_composer'),
			'choice_l_roman' =>									__('Lower roman number', 'cmsmasters_content_composer'),
			'choice_u_roman' =>									__('Upper roman number', 'cmsmasters_content_composer'),
			'choice_l_greek' =>									__('Lower greek number', 'cmsmasters_content_composer'),
			'choice_l_latin' =>									__('Lower latin number', 'cmsmasters_content_composer'),
			'choice_u_latin' =>									__('Upper latin number', 'cmsmasters_content_composer'),
			'choice_but_bg_hover' =>							__('Change background on hover', 'cmsmasters_content_composer'),
			'choice_but_bg_slide_left' =>						__('Background slide to left', 'cmsmasters_content_composer'),
			'choice_but_bg_slide_right' =>						__('Background slide to right', 'cmsmasters_content_composer'),
			'choice_but_bg_slide_top' =>						__('Background slide to top', 'cmsmasters_content_composer'),
			'choice_but_bg_slide_bottom' =>						__('Background slide to bottom', 'cmsmasters_content_composer'),
			'choice_but_bg_expand_vert' =>						__('Background expand vertically', 'cmsmasters_content_composer'),
			'choice_but_bg_expand_hor' =>						__('Background expand horizontally', 'cmsmasters_content_composer'),
			'choice_but_bg_expand_diag' =>						__('Background expand diagonally', 'cmsmasters_content_composer'),
			'choice_but_shadow' =>								__('Shadow', 'cmsmasters_content_composer'),
			'choice_but_icon_dark_bg' =>						__('Icon on dark background', 'cmsmasters_content_composer'),
			'choice_but_icon_light_bg' =>						__('Icon on light background', 'cmsmasters_content_composer'),
			'choice_but_icon_divider' =>						__('Icon with divider', 'cmsmasters_content_composer'),
			'choice_but_icon_inverse' =>						__('Inverse icon color', 'cmsmasters_content_composer'),
			'choice_but_slide_left' =>							__('Icon slide from left', 'cmsmasters_content_composer'),
			'choice_but_slide_right' =>							__('Icon slide from right', 'cmsmasters_content_composer'),
			'choice_but_hover_slide_left' =>					__('Replace with icon from left', 'cmsmasters_content_composer'),
			'choice_but_hover_slide_right' =>					__('Replace with icon from right', 'cmsmasters_content_composer'),
			'choice_but_hover_slide_top' =>						__('Replace with icon from top', 'cmsmasters_content_composer'),
			'choice_but_hover_slide_bottom' =>					__('Replace with icon from bottom', 'cmsmasters_content_composer'),
			
			
			// Animation
			'animation_title' => 								__('Animation', 'cmsmasters_content_composer'), 
			'animation_descr' => 								__('Shortcode animation effect when a user scrolls to its position for the first time.', 'cmsmasters_content_composer'), 
			'animation_descr_note' => 							__('This option works only in modern browsers', 'cmsmasters_content_composer'), 
			'animation_delay_title' => 							__('Animation Delay', 'cmsmasters_content_composer'), 
			'animation_delay_descr' => 							__('Delay before shortcode animation starts', 'cmsmasters_content_composer'), 
			'animation_delay_descr_note' => 					__('number, in milliseconds (1 second = 1000 milliseconds)', 'cmsmasters_content_composer'),
			
			// Classes
			'classes_title' => 									__('Additional Classes', 'cmsmasters_content_composer'), 
			'classes_descr' => 									__('You can add additional CSS classes (separated by spaces) to the shortcode, if you wish to style content elements differently', 'cmsmasters_content_composer'),
			
			// Filters & Sorting
			'filter' =>											__('Filter', 'cmsmasters_content_composer'),
			'filter_text_title' =>								__('Filter Button Text', 'cmsmasters_content_composer'),
			'filter_text_descr' =>								__('Enter filter button custom title', 'cmsmasters_content_composer'),
			'filter_text_descr_note' =>							__('if empty, default filter button title will be used', 'cmsmasters_content_composer'),
			'filter_enabled_text_descr_note' =>					__('This option works only if filter enabled', 'cmsmasters_content_composer'),
			'filter_cats_text_title' =>							__("Filter 'All Categories' Text", 'cmsmasters_content_composer'),
			'filter_cats_text_descr' =>							__("Enter filter 'All Categories' custom text", 'cmsmasters_content_composer'),
			'filter_cats_text_descr_note' =>					__("if empty, default filter 'All Categories' text will be used", 'cmsmasters_content_composer'),
			'sorting_name_text_title' =>						__('Sorting By Name Button Text', 'cmsmasters_content_composer'),
			'sorting_name_text_descr' =>						__('Enter sorting by name button custom title', 'cmsmasters_content_composer'),
			'sorting_name_text_descr_note' =>					__('if empty, default sorting by name button title will be used', 'cmsmasters_content_composer'),
			'sorting_date_text_title' =>						__('Sorting By Date Button Text', 'cmsmasters_content_composer'),
			'sorting_date_text_descr' =>						__('Enter sorting by date button custom title', 'cmsmasters_content_composer'),
			'sorting_date_text_descr_note' =>					__('if empty, default sorting by date button title will be used', 'cmsmasters_content_composer'),
			'sorting_enabled_text_descr_note' =>				__('This option works only if sorting enabled', 'cmsmasters_content_composer'),
			'pagination_choice_pagination' =>					__('Pagination', 'cmsmasters_content_composer'),
			'pagination_choice_more' =>							__("'Load More' button", 'cmsmasters_content_composer'),
			'pagination_choice_disabled' =>						__('Disable additional posts', 'cmsmasters_content_composer'),
			'pagination_title' =>								__('Pagination', 'cmsmasters_content_composer'),
			'pagination_descr' =>								__('Choose your method of viewing additional posts', 'cmsmasters_content_composer'),
			'pagination_more_text_title' =>						__("'Load More' Button Text", 'cmsmasters_content_composer'),
			'pagination_more_text_descr' =>						__("Enter 'Load More' button custom title", 'cmsmasters_content_composer'),
			'pagination_more_text_descr_note' =>				__("if empty, default 'Load More' button title will be used", 'cmsmasters_content_composer'),
			'background_color' =>								__('Background Color', 'cmsmasters_content_composer'),
			
		/* Finish Global Translations */
		
		
		
		/* Start cmsmasters_text Translations */
		
			'text_title' => 									__('Text Block', 'cmsmasters_content_composer'), 
			
		/* Finish cmsmasters_text Translations */
		
		
		/* Start cmsmasters_heading Translations */
		
			'heading_title' => 									__('Heading', 'cmsmasters_content_composer'), 
			'heading_field_content_title' => 					__('Heading Text', 'cmsmasters_content_composer'),
			'heading_field_type_title' => 						__('Heading Type', 'cmsmasters_content_composer'),
			'heading_field_font_title' =>						__('Google Font', 'cmsmasters_content_composer'),
			'heading_field_font_size_title' =>					__('Font Size', 'cmsmasters_content_composer'),
			'heading_field_line_height_title' =>				__('Line Height', 'cmsmasters_content_composer'),
			'heading_field_font_weight_title' =>				__('Font Weight', 'cmsmasters_content_composer'),
			'heading_field_font_style_title' =>					__('Font Style', 'cmsmasters_content_composer'),
			'heading_field_icon_title' => 						__('Heading Icon', 'cmsmasters_content_composer'),
			'heading_field_border_radius_title' => 				__('Heading Border Radius', 'cmsmasters_content_composer'),
			'heading_field_border_radius_descr' => 				__('Enter heading background border radius.', 'cmsmasters_content_composer'),
			'heading_field_border_radius_descr_note' => 		__('Works only for headings with background color', 'cmsmasters_content_composer'),
			'heading_field_link_title' =>						__('Heading Link', 'cmsmasters_content_composer'),
			'heading_field_color_title' =>						__('Heading Custom Color', 'cmsmasters_content_composer'),
			'heading_field_color_descr_note' =>					__('If empty, heading will use color of parent section color scheme', 'cmsmasters_content_composer'),
			'heading_field_bg_color_title' =>					__('Heading Custom Background Color', 'cmsmasters_content_composer'),
			'heading_field_divider_color_title' =>				__('Heading Divider Custom Color', 'cmsmasters_content_composer'),
			'heading_field_divider_color_descr_note' =>			__('If empty, heading divider will use border color of parent section color scheme', 'cmsmasters_content_composer'),
				
		/* Finish cmsmasters_heading Translations */
		
		
		/* Start cmsmasters_audios Translations */
			
			'audio_field_audio_descr' => 						__('Here you can add, edit, remove or sort audio links', 'cmsmasters_content_composer'),
			'audio_field_audio_descr_note' => 					__('Please add audio in several formats for your shortcode to work properly in all browsers', 'cmsmasters_content_composer'),
			'audio_field_autoplay_descr' => 					__('If checked, audio will play as soon as the audio is ready', 'cmsmasters_content_composer'),
			'audio_field_repeat_descr' => 						__('If checked, audio will be repeated from the beginning after finishing', 'cmsmasters_content_composer'),
			'audio_field_preload_descr' => 						__('Specifies if and how the audio should be loaded when the page loads', 'cmsmasters_content_composer'),
			'audio_field_preload_choice_none' => 				__('None - the audio should not be loaded when the page loads', 'cmsmasters_content_composer'),
			'audio_field_preload_choice_auto' => 				__('Auto - the audio should be loaded entirely when the page loads', 'cmsmasters_content_composer'),
			'audio_field_preload_choice_metadata' => 			__('Metadata - only metadata should be loaded when the page loads', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_audios Translations */

		/* Start cmsmasters_blog Translations */		
		
			'blog_title' =>										__('Blog', 'cmsmasters_content_composer'),			
			'blog_field_orderby_descr' =>						__('Choose what parameter your posts will be ordered by', 'cmsmasters_content_composer'),			
			'blog_field_postsnumber_title' =>					__('Posts Number', 'cmsmasters_content_composer'),
			'blog_field_postsnumber_descr' =>					__('Enter the number of posts to be shown per page', 'cmsmasters_content_composer'),
			'blog_field_postsnumber_descr_note' =>				__('number, if empty - show all posts', 'cmsmasters_content_composer'),			
			'blog_field_categories_descr' =>					__('Show posts associated with certain categories', 'cmsmasters_content_composer'),
			'blog_field_categories_descr_note' =>				__("If you don't choose any post categories, all your posts will be shown", 'cmsmasters_content_composer'),
			'blog_field_layout_choice_standard' =>				__('Standard', 'cmsmasters_content_composer'),
			'blog_field_layout_choice_columns' =>				__('Columns', 'cmsmasters_content_composer'),
			'blog_field_layout_choice_timeline' =>				__('Timeline', 'cmsmasters_content_composer'),
			'blog_field_layout_mode_descr' =>					__('Choose columns layout mode for your blog posts', 'cmsmasters_content_composer'),
			'blog_field_layout_mode_choice_masonry' =>			__('Masonry', 'cmsmasters_content_composer'),
			'blog_field_columns_count_descr' =>					__('Choose number of posts per row', 'cmsmasters_content_composer'),
			'blog_field_columns_count_descr_note' =>			__('4 columns will be shown for pages with a fullwidth layout only. For pages with a sidebar enabled, maximum columns amount is 3.', 'cmsmasters_content_composer'),
			'blog_field_metadata_descr' =>						__('Choose blog posts metadata you want to be shown', 'cmsmasters_content_composer'),
			'blog_field_filter_descr' =>						__('If checked, blog posts category filter will be shown', 'cmsmasters_content_composer'),
		
		/* Finish cmsmasters_blog Translations */
		
		
		/* Start cmsmasters_button Translations */
		
			'button_field_show_title' =>						__('Show Button', 'cmsmasters_content_composer'),
			'button_field_show_descr' =>						__('If checked, button will be shown', 'cmsmasters_content_composer'),
			'button_field_label_title' =>						__('Button Label', 'cmsmasters_content_composer'),
			'button_field_label_descr' =>						__('Enter button label here', 'cmsmasters_content_composer'),
			'button_field_type_title' =>						__('Button Type', 'cmsmasters_content_composer'),
			'choice_button_type_regular' =>						__('Regular Button', 'cmsmasters_content_composer'),
			'choice_button_type_donation' =>					__('Donation Button', 'cmsmasters_content_composer'),
			'button_field_campaign_title' =>					__('Donation Campaign', 'cmsmasters_content_composer'),
			'button_field_link_title' =>						__('Button Link', 'cmsmasters_content_composer'),
			'button_field_link_descr' =>						__('Enter button link here', 'cmsmasters_content_composer'),
			'button_field_target_title' =>						__('Button Target', 'cmsmasters_content_composer'),
			'button_field_target_descr' =>						__('Enter button target here', 'cmsmasters_content_composer'),
			'button_field_text_align_title' =>					__('Button Position', 'cmsmasters_content_composer'),
			'button_field_text_align_descr' =>					__('Choose horizontal position for your button', 'cmsmasters_content_composer'),
			'button_field_style_title' =>						__('Choose Button Style', 'cmsmasters_content_composer'),
			'button_field_label_google_font_title' =>			__('Button Label Google Font', 'cmsmasters_content_composer'),
			'button_field_label_google_font_descr' =>			__('Choose custom Google font for your button label', 'cmsmasters_content_composer'),
			'button_field_label_google_font_descr_note' =>		__('if empty, theme default button label font will be used', 'cmsmasters_content_composer'),
			'button_field_label_font_size_title' =>				__('Button Label Font Size', 'cmsmasters_content_composer'),
			'button_field_label_font_size_descr' =>				__('Choose custom font size for your button label ', 'cmsmasters_content_composer'),
			'button_field_label_font_size_descr_note' =>		__('if empty, theme default button label font size will be used', 'cmsmasters_content_composer'),
			'button_field_label_line_hight_title' =>			__('Button Label Line Height', 'cmsmasters_content_composer'),
			'button_field_label_line_height_descr' =>			__('Choose custom line height for your button label ', 'cmsmasters_content_composer'),
			'button_field_label_line_height_descr_note' =>		__('if empty, theme default button label line height will be used', 'cmsmasters_content_composer'),
			'button_field_label_font_weight_title' =>			__('Button Label Font Weight', 'cmsmasters_content_composer'),
			'button_field_label_font_weight_descr' =>			__('Set font weight value for your button label', 'cmsmasters_content_composer'),
			'button_field_label_font_style_title' =>			__('Button Label Font Style', 'cmsmasters_content_composer'),
			'button_field_label_font_style_descr' =>			__('Set font style value for your button label', 'cmsmasters_content_composer'),
			'button_field_paddings_title' =>					__('Button Left & Right Paddings', 'cmsmasters_content_composer'),
			'button_field_paddings_descr' =>					__('Set right/left paddings for your button (to make it wider or narrower)', 'cmsmasters_content_composer'),
			'button_field_paddings_descr_note' =>				__('if empty, theme default button paddings will be used', 'cmsmasters_content_composer'),
			'button_field_border_width_title' =>				__('Button Border Width', 'cmsmasters_content_composer'),
			'button_field_border_width_descr' =>				__('Enter button border width', 'cmsmasters_content_composer'),
			'button_field_border_style_title' =>				__('Button Border Style', 'cmsmasters_content_composer'),
			'button_field_border_radius_title' =>				__('Button Border Radius', 'cmsmasters_content_composer'),'button_field_border_radius_descr' =>				__('Enter button border radius (default if empty).', 'cmsmasters_content_composer'),
			'border_radius_descr_note_1' =>						__('You can set any border radius rule here. ', 'cmsmasters_content_composer'),
			'border_radius_descr_note_2' =>						__('For creating correct rule please use ', 'cmsmasters_content_composer'),
			'border_radius_descr_note_3' =>						__('border radius generator', 'cmsmasters_content_composer'),
			'border_radius_descr_note_4' =>						__('But copy only value of the first rule, for example like ', 'cmsmasters_content_composer'),
			'border_radius_descr_note_5' =>						__('on this screenshot', 'cmsmasters_content_composer'),
			'button_field_bg_color_title' =>					__('Button Background Color', 'cmsmasters_content_composer'),
			'button_field_bg_color_descr' =>					__('Choose your custom button background color', 'cmsmasters_content_composer'),
			'button_field_txt_color_title' =>					__('Button Text Color', 'cmsmasters_content_composer'),
			'button_field_txt_color_descr' =>					__('Choose your custom button text color', 'cmsmasters_content_composer'),
			'button_field_bd_color_title' =>					__('Button Border Color', 'cmsmasters_content_composer'),
			'button_field_bd_color_descr' =>					__('Choose your custom button border color', 'cmsmasters_content_composer'),
			'button_field_bg_color_h_title' =>					__('Button Background Color on Mouseover', 'cmsmasters_content_composer'),
			'button_field_bg_color_h_descr' =>					__('Choose your custom button background color on mouseover', 'cmsmasters_content_composer'),
			'button_field_txt_color_h_title' =>					__('Button Text Color on Mouseover', 'cmsmasters_content_composer'),
			'button_field_txt_color_h_descr' =>					__('Choose your custom button text color on mouseover', 'cmsmasters_content_composer'),
			'button_field_bd_color_h_title' =>					__('Button Border Color on Mouseover', 'cmsmasters_content_composer'),
			'button_field_bd_color_h_descr' =>					__('Choose your custom button border color on mouseover', 'cmsmasters_content_composer'),
			'button_field_icon_title' =>						__('Button Icon', 'cmsmasters_content_composer'),
			'button_field_icon_descr' =>						__('Choose an icon for your button', 'cmsmasters_content_composer'),
			'button_field_title_descr' =>						__('Enter button title here', 'cmsmasters_content_composer'),
			'button_field_google_font_descr' =>					__('Choose custom Google font for your button', 'cmsmasters_content_composer'),
			'button_field_google_font_descr_note' =>			__('if empty, theme default button title font will be used', 'cmsmasters_content_composer'),
			'button_field_font_size_descr' =>					__('Choose custom font size for your button title', 'cmsmasters_content_composer'),
			'button_field_font_size_descr_note' =>				__('if empty, theme default button title font size will be used', 'cmsmasters_content_composer'),
			'button_field_line_height_descr' =>					__('Choose custom line height for your button title', 'cmsmasters_content_composer'),
			'button_field_line_height_descr_note' =>			__('if empty, theme default button title line height will be used', 'cmsmasters_content_composer'),
			'button_field_font_weight_descr' =>					__('Set font weight value for your button title', 'cmsmasters_content_composer'),
			'button_field_font_style_descr' =>					__('Choose font style for your button title', 'cmsmasters_content_composer'),
			'button_field_text_align_title' =>					__('Button Position', 'cmsmasters_content_composer'),
			'button_field_text_align_descr' =>					__('Choose horizontal position for your button', 'cmsmasters_content_composer'),
			'button_field_custom_button_colors_title' =>		__('Custom Button Colors', 'cmsmasters_content_composer'),
			'button_field_custom_button_colors_descr' =>		__('If not checked, button will use parent section color scheme colors', 'cmsmasters_content_composer'),
	
		/* Finish cmsmasters_button Translations */		

		
		/* Start cmsmasters_clients Translations */
		
			'clients_title' =>									__('Clients', 'cmsmasters_content_composer'),
			'clients_field_clients_descr' =>					__('Add, edit, remove or sort your clients here to be displayed on page', 'cmsmasters_content_composer'),			
			'clients_field_col_count_descr' =>					__('Choose number of clients per row', 'cmsmasters_content_composer'),			
			'clients_field_height_descr' =>						__('Client items height', 'cmsmasters_content_composer'),
			'clients_field_height_descr_note' =>				__('number, in pixels (default value is 180)', 'cmsmasters_content_composer'),
			
			'clients_field_speed_title' =>						__('Speed', 'cmsmasters_content_composer'),
			'clients_field_speed_descr' =>						__('Slide speed in seconds', 'cmsmasters_content_composer'),
			'clients_field_speed_descr_note' =>					__('If empty - 1 (in seconds)', 'cmsmasters_content_composer'),
			'clients_field_slides_control_title' =>				__('Slides Control', 'cmsmasters_content_composer'),
			'clients_field_arrow_control_title' =>				__('Arrow Control', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_button Translations */		

		
		/* Start cmsmasters_contact_form Translations */
		
			'contact_form_title' =>								__('Contact Form', 'cmsmasters_content_composer'),
			'contact_form_cfb' =>								__('CMSMasters Contact Form Builder', 'cmsmasters_content_composer'),
			'contact_form_cf7' =>								__('Contact Form 7', 'cmsmasters_content_composer'),
			'contact_form_field_form_plugin_title' =>			__('Contact Form Plugin', 'cmsmasters_content_composer'),
			'contact_form_field_form_plugin_descr' =>			__('Choose one of supported contact form plugins', 'cmsmasters_content_composer'),
			'contact_form_field_form_plugin_descr_note' =>		__('Please make sure that the Contact Form plugin you have chosen is currently installed and activated.', 'cmsmasters_content_composer'),
			'contact_form_field_cf7_id_title' =>				__('Contact Form 7 - Form Name', 'cmsmasters_content_composer'),
			'contact_form_field_cf7_id_descr' =>				__('Choose your form name from Contact Form 7 plugin', 'cmsmasters_content_composer'),
			'contact_form_field_cfb_id_title' =>				__('CMSMasters Contact Form Builder - Form Name', 'cmsmasters_content_composer'),
			'contact_form_field_cfb_id_descr' =>				__('Choose your form name from CMSMasters Contact Form Builder plugin', 'cmsmasters_content_composer'),
			'contact_form_field_cfb_email_title' =>				__('CMSMasters Contact Form Builder - Email Address', 'cmsmasters_content_composer'),
			'contact_form_field_cfb_email_descr' =>				__('Enter email address for your CMSMasters Contact Form Builder plugin form', 'cmsmasters_content_composer'),
			'contact_form_field_cfb_email_descr_note' =>		__('You can enter multiple email addresses separated by commas', 'cmsmasters_content_composer'),		
		
		/* Finish cmsmasters_contact_form Translations */
		
		/* Start cmsmasters_divider Translations */
			
			'divider_length' =>									__('Divider Length', 'cmsmasters_content_composer'),
			'divider_width' =>									__('Divider Width', 'cmsmasters_content_composer'),
			'divider_style' =>									__('Divider Style', 'cmsmasters_content_composer'),
			'divider_position' =>								__('Divider Position', 'cmsmasters_content_composer'),
			'divider_custom_color' =>							__('Divider Custom Color', 'cmsmasters_content_composer'),
			'divider_custom_color_descr_note' =>				__('If empty, divider will use border color of parent section color scheme', 'cmsmasters_content_composer'),
		
		/* Finish cmsmasters_divider Translations */	
		
		/* Start cmsmasters_embed Translations */
		
			'embed_title' =>									__('Embed', 'cmsmasters_content_composer'),			
			'embed_field_link_descr' =>							__('Enter your embed link.', 'cmsmasters_content_composer'),
			'embed_field_link_descr_note' =>					__('This field support links from', 'cmsmasters_content_composer'),
			'embed_field_link_descr_note_link' =>				__('such services', 'cmsmasters_content_composer'),
			'embed_field_maxwidth_title' =>						__('Max Width', 'cmsmasters_content_composer'),
			'embed_field_maxwidth_descr' =>						__('Defines max width of the embed', 'cmsmasters_content_composer'),
			'embed_field_maxwidth_descr_note' =>				__("('Media file width' if empty)", 'cmsmasters_content_composer'),
			'embed_field_maxheight_title' =>					__('Max Height', 'cmsmasters_content_composer'),
			'embed_field_maxheight_descr' =>					__('Defines max height of the embed', 'cmsmasters_content_composer'),
			'embed_field_maxheight_descr_note' =>				__("('Media file height' if empty)", 'cmsmasters_content_composer'),
			'embed_field_wrap_title' =>							__('Wrap Video', 'cmsmasters_content_composer'),
			'embed_field_wrap_descr' =>							__('Wrap video into container to ignore default video height/max-height and set a 16:9 proportion instead.', 'cmsmasters_content_composer'),
			'embed_field_wrap_descr_note' =>					__('Recommended only for video embeds', 'cmsmasters_content_composer'),		
					
		/* Finish cmsmasters_embed Translations */	
		
		/* Start cmsmasters_featured_block Translations */
		
			'featured_title' =>									__('Featured Block', 'cmsmasters_content_composer'),
			'featured_field_content_title' =>					__('Content', 'cmsmasters_content_composer'),
			'featured_field_text_width_title' => 				__('Text Block Width', 'cmsmasters_content_composer'), 
			'featured_field_text_width_descr' => 				__('Choose text block width (percentage)', 'cmsmasters_content_composer'), 
			'featured_field_text_position' => 					__('Text Block Position', 'cmsmasters_content_composer'), 
			'featured_field_text_padding_title' => 				__('Text Block Paddings', 'cmsmasters_content_composer'), 
			'featured_field_text_padding_descr' => 				__('Enter full paddings CSS rule for text block', 'cmsmasters_content_composer'), 
			'featured_field_text_padding_descr_note' => 		__('if empty theme default paddings will be used', 'cmsmasters_content_composer'), 
			'featured_field_text_padding_descr_note_1' => 		__('For creating correct rule please use', 'cmsmasters_content_composer'), 
			'featured_field_text_padding_descr_note_2' => 		__('this link', 'cmsmasters_content_composer'), 
			'featured_field_cust_block_color_title' =>			__('Custom Block Colors', 'cmsmasters_content_composer'),
			'featured_field_cust_block_color_descr' =>			__('If not checked, featured block will use parent section color scheme colors', 'cmsmasters_content_composer'),
			'featured_field_block_bg_color_title' =>			__('Background Color', 'cmsmasters_content_composer'),
			'featured_field_bg_size_descr_auto' =>				__('image is added in its actual size regardless of the block dimensions', 'cmsmasters_content_composer'),
			'featured_field_bg_size_descr_cover' =>				__('image is resized to cover the whole block area', 'cmsmasters_content_composer'),
			'featured_field_bg_size_descr_contain' =>			__('image is resized to fit into the block area', 'cmsmasters_content_composer'),
			'featured_field_top_padding_title' =>				__('Featured Block Top Padding', 'cmsmasters_content_composer'),
			'featured_field_bottom_padding_title' =>			__('Featured Block Bottom Padding', 'cmsmasters_content_composer'),
			'featured_field_border_radius_title' =>				__('Featured Block Border Radius', 'cmsmasters_content_composer'),
			'featured_field_border_radius_descr' =>				__('Enter featured block border radius', 'cmsmasters_content_composer'),
						
		/* Finish cmsmasters_featured_block Translations */
		
		/* Start cmsmasters_gallery Translations */
		
			'gallery_title' =>									__('Gallery', 'cmsmasters_content_composer'),
			'gallery_field_images_title' =>						__('Images', 'cmsmasters_content_composer'),
			'gallery_field_images_descr' =>						__('Choose images to be displayed in the gallery', 'cmsmasters_content_composer'),
			'gallery_field_image_size_slider_title' =>			__('Gallery Big Preview Image Size', 'cmsmasters_content_composer'),
			'gallery_field_image_size_title' =>					__('Gallery Preview Image Size', 'cmsmasters_content_composer'),
			'gallery_field_image_size_descr' =>					__('Choose image size for the preview thumbnails', 'cmsmasters_content_composer'),
			'gallery_field_layout_descr_note' =>				__('For Hover Slider it is recommended that you use images with min size of 820&#215;490 or larger, but with the same image ratio', 'cmsmasters_content_composer'),
			'gallery_field_layout_choice_hover' =>				__('Hover Slider', 'cmsmasters_content_composer'),
			'gallery_field_layout_choice_gallery' =>			__('Image Gallery', 'cmsmasters_content_composer'),
			'gallery_field_gallery_type_title' =>				__('Gallery Type', 'cmsmasters_content_composer'),
			'gallery_field_gallery_type_grid' =>				__('Grid Gallery', 'cmsmasters_content_composer'),
			'gallery_field_gallery_type_masonry' =>				__('Masonry Gallery', 'cmsmasters_content_composer'),
			'gallery_field_gallery_count_title' =>				__('Images Number', 'cmsmasters_content_composer'),
			'gallery_field_gallery_count_descr' =>				__('Amount of images that will appear each time a \'Load More\' button is clicked', 'cmsmasters_content_composer'),
			'gallery_field_gallery_count_descr_note' =>			__('number, if empty - show all images at once', 'cmsmasters_content_composer'),
			'gallery_field_gallery_padding_title' =>			__('Gallery Gap', 'cmsmasters_content_composer'),
			'gallery_field_gallery_padding_descr_note' =>		__('number, in pixels, no gap if empty', 'cmsmasters_content_composer'),
			'gallery_field_hoversl_activesl_title' =>			__('Active Slide', 'cmsmasters_content_composer'),
			'gallery_field_hoversl_activesl_descr_note' =>		__('if empty - 1 (number)', 'cmsmasters_content_composer'),
			'gallery_field_sl_animeffect_title' =>				__('Animation Effect', 'cmsmasters_content_composer'),
			'gallery_field_sl_animeffect_choice_slide' =>		__('Slide', 'cmsmasters_content_composer'),
			'gallery_field_sl_animeffect_choice_fade' =>		__('Fade', 'cmsmasters_content_composer'),
			'gallery_field_sl_slideshow_descr' =>				__('Animate slider automatically', 'cmsmasters_content_composer'),
			'gallery_field_sl_slideshow_speed_title' =>			__('Slideshow Speed', 'cmsmasters_content_composer'),
			'gallery_field_sl_slideshow_speed_descr' =>			__('Set time during which each slide will be shown', 'cmsmasters_content_composer'),
			'gallery_field_sl_slideshow_speed_descr_note' =>	__("if empty - '7' (in seconds)", 'cmsmasters_content_composer'),
			'gallery_field_sl_anim_speed_title' =>				__('Animation Speed', 'cmsmasters_content_composer'),
			'gallery_field_sl_anim_speed_descr' =>				__('Set animation transitions speed', 'cmsmasters_content_composer'),
			'gallery_field_sl_anim_speed_descr_note' =>			__("if empty - '600' (in milliseconds, 1 second = 1000 milliseconds)", 'cmsmasters_content_composer'),
			'gallery_field_sl_rewind_title' =>					__('Rewind', 'cmsmasters_content_composer'),
			'gallery_field_sl_rewind_descr' =>					__('Slide to first when you click next on last slide', 'cmsmasters_content_composer'),
			'gallery_field_sl_rewind_speed_title' =>			__('Rewind speed', 'cmsmasters_content_composer'),
			'gallery_field_sl_rewind_speed_descr' =>			__('Speed of sliding to the first slide', 'cmsmasters_content_composer'),
			'gallery_field_sl_rewind_speed_descr_note' =>		__("if empty - '1000' (in milliseconds, 1 second = 1000 milliseconds)", 'cmsmasters_content_composer'),
			'gallery_field_sl_navcontrol_title' =>				__('Navigation Control', 'cmsmasters_content_composer'),
			'gallery_field_sl_arrownav_title' =>				__('Arrow Navigation', 'cmsmasters_content_composer'),
			'gallery_field_sl_arrownav_descr' =>				__('Slider arrow navigation', 'cmsmasters_content_composer'),
			'gallery_field_imagegall_columns_title' =>			__('Gallery Columns Amount', 'cmsmasters_content_composer'),
			'gallery_field_imagegall_columns_choice_four' =>	__('4 Columns', 'cmsmasters_content_composer'),
			'gallery_field_imagegall_columns_choice_three' =>	__('3 Columns', 'cmsmasters_content_composer'),
			'gallery_field_imagegall_columns_choice_two' =>		__('2 Columns', 'cmsmasters_content_composer'),
			'gallery_field_imagegall_columns_choice_one' =>		__('1 Column', 'cmsmasters_content_composer'),
			'gallery_field_imagegall_imglinks_title' =>			__('Images Links Settings', 'cmsmasters_content_composer'),
			'gallery_field_imagegall_imglinks_choice_box' =>	__('Open images in lightbox', 'cmsmasters_content_composer'),
			'gallery_field_imagegall_imglinks_choice_self' =>	__('Open images in current browser tab/window', 'cmsmasters_content_composer'),
			'gallery_field_imagegall_imglinks_choice_blank' =>	__('Open images in a new browser tab/window', 'cmsmasters_content_composer'),
			'gallery_field_imagegall_imglinks_choice_none' =>	__('Disable links on images', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_gallery Translations */
		
		/* Start cmsmasters_google_map_markers Translations */
		
			'map_markers_title' =>								__('Google Map', 'cmsmasters_content_composer'),
			'map_markers_field_markers_title' =>				__('Markers', 'cmsmasters_content_composer'),
			'map_markers_field_markers_descr' =>				__('Here you can add, edit, remove or sort Google map markers', 'cmsmasters_content_composer'),
			'map_markers_field_address_type_title' =>			__('Address Type', 'cmsmasters_content_composer'),
			'map_markers_field_address_type_choice_address' =>	__('address', 'cmsmasters_content_composer'),
			'map_markers_field_address_type_choice_coord' =>	__('coordinates', 'cmsmasters_content_composer'),
			'map_markers_field_address_title' =>				__('Address', 'cmsmasters_content_composer'),
			'map_markers_field_address_descr' =>				__('Enter address to centre your map at', 'cmsmasters_content_composer'),
			'map_markers_field_latitude_title' =>				__('Latitude', 'cmsmasters_content_composer'),
			'map_markers_field_longitude_title' =>				__('Longitude', 'cmsmasters_content_composer'),
			'map_markers_field_type_title' =>					__('Map Type', 'cmsmasters_content_composer'),
			'map_markers_field_type_choice_roadmap' =>			__('Roadmap', 'cmsmasters_content_composer'),
			'map_markers_field_type_choice_terrain' =>			__('Terrain', 'cmsmasters_content_composer'),
			'map_markers_field_type_choice_hybrid' =>			__('Hybrid', 'cmsmasters_content_composer'),
			'map_markers_field_type_choice_sattelite' =>		__('Satellite', 'cmsmasters_content_composer'),
			'map_markers_field_zoom_title' =>					__('Map Zoom', 'cmsmasters_content_composer'),
			'map_markers_field_height_type_title' =>			__('Map Height Type', 'cmsmasters_content_composer'),
			'map_markers_field_height_type_choice_auto' =>		__('Auto', 'cmsmasters_content_composer'),
			'map_markers_field_height_type_choice_fixed' =>		__('Fixed', 'cmsmasters_content_composer'),
			'map_markers_field_height_descr' =>					__('Set map fixed height', 'cmsmasters_content_composer'),
			'map_markers_field_height_descr_note' =>			__('(if empty - 300)', 'cmsmasters_content_composer'),
			'map_markers_field_scrollwheel_title' =>			__('Scrollwheel Zoom', 'cmsmasters_content_composer'),
			'map_markers_field_doubleclick_zoom_title' =>		__('Double Click Zoom', 'cmsmasters_content_composer'),
			'map_markers_field_pan_control_title' =>			__('Pan Control', 'cmsmasters_content_composer'),
			'map_markers_field_zoom_control_title' =>			__('Zoom Control', 'cmsmasters_content_composer'),
			'map_markers_field_maptype_control_title' =>		__('Map Type Control', 'cmsmasters_content_composer'),
			'map_markers_field_scale_control_title' =>			__('Scale Control', 'cmsmasters_content_composer'),
			'map_markers_field_strtview_control_title' =>		__('Street View Control', 'cmsmasters_content_composer'),
			'map_markers_field_strtview_control_descr_note' =>	__('This control is part of the default UI, and should be set to false when displaying a map type on which the Street View road overlay should not appear (e.g. a non-Earth map type)', 'cmsmasters_content_composer'),
			'map_markers_field_overview_map_control_title' =>	__('Overview Map Control', 'cmsmasters_content_composer'),
						
		/* Finish cmsmasters_google_map_markers Translations */
		
		/* Start cmsmasters_simple_icon and cmsmasters_icon_box Translations */
		
			'icon_title' =>										__('Icon Box', 'cmsmasters_content_composer'),
			'icon_field_box_title_title' =>						__('Box Title', 'cmsmasters_content_composer'),
			'icon_field_box_title_descr' =>						__('Enter box title here', 'cmsmasters_content_composer'),
			'icon_field_box_title_def' =>						__('Enter box title', 'cmsmasters_content_composer'),
			'icon_field_box_icon_pos_title' =>					__('Box Type', 'cmsmasters_content_composer'),
			'icon_box_choice_pos_top' =>						__('Centered box with icon above the title', 'cmsmasters_content_composer'),
			'icon_box_choice_pos_box_top' =>					__('Centered box with icon at the top of', 'cmsmasters_content_composer'),
			'icon_box_choice_pos_heading_left' =>				__('Box with icon before title', 'cmsmasters_content_composer'),
			'icon_box_choice_pos_box_left' =>					__('Box with icon at the left of', 'cmsmasters_content_composer'),
			'icon_box_choice_pos_box_left_top' =>				__('Box with icon at the left top of', 'cmsmasters_content_composer'),
			'icon_box_field_icon_image_title' =>				__('Box Icon Image', 'cmsmasters_content_composer'),
			'icon_box_field_icon_space_descr_note' =>			__("number, in pixels (if empty - '50')", 'cmsmasters_content_composer'),
			'icon_field_box_icon_color_title' =>				__('Box Icon Custom Color', 'cmsmasters_content_composer'),
			'icon_field_box_icon_bg_color_title' =>				__('Box Icon Custom Background Color', 'cmsmasters_content_composer'),
			'icon_field_box_icon_bd_color_title' =>				__('Box Icon Custom Border Color', 'cmsmasters_content_composer'),
			'icon_field_box_color_title' =>						__('Box Custom Color', 'cmsmasters_content_composer'),
			'icon_field_box_bg_color_title' =>					__('Box Custom Background Color', 'cmsmasters_content_composer'),
			'icon_field_box_bd_color_title' =>					__('Box Custom Border Color', 'cmsmasters_content_composer'),
			'icon_box_field_icon_border_width_title' =>			__('Box Icon Border Width', 'cmsmasters_content_composer'),
			'icon_box_field_icon_border_radius_title' =>		__('Box Icon Border Radius', 'cmsmasters_content_composer'),
			'icon_box_field_icon_border_radius_descr' =>		__('Enter box icon border radius', 'cmsmasters_content_composer'),
			'icon_box_field_border_width_title' =>				__('Box Border Width', 'cmsmasters_content_composer'),
			'icon_box_field_border_radius_title' =>				__('Box Border Radius', 'cmsmasters_content_composer'),
			'icon_box_field_border_radius_descr' =>				__('Enter box border radius', 'cmsmasters_content_composer'),
			'icon_field_box_icon_title' =>						__('Box Icon', 'cmsmasters_content_composer'),
			'icon_box_field_icon_number_title' => 				__('Box Icon Number', 'cmsmasters_content_composer'),
			'icon_field_button_label_title' =>					__('Button Label', 'cmsmasters_content_composer'),
			'icon_field_button_label_descr' =>					__('Enter button label here', 'cmsmasters_content_composer'),			
			'icon_field_button_link_title' =>					__('Button Link', 'cmsmasters_content_composer'),
			'icon_field_button_link_descr' =>					__('Enter button link here', 'cmsmasters_content_composer'),
			'icon_field_button_target_title' =>					__('Button Target', 'cmsmasters_content_composer'),
			'icon_field_button_target_descr' =>					__('Choose button link target type', 'cmsmasters_content_composer'),
			'icon_field_icon_descr' =>							__('Choose icon for your shortcode', 'cmsmasters_content_composer'),
			'icon_field_size_descr' =>							__('Choose custom size for your icon', 'cmsmasters_content_composer'),
			'icon_field_size_descr_note' =>						__("number, in pixels ('40' - if empty)", 'cmsmasters_content_composer'),
			'icon_field_space_descr_note' =>					__("number, in pixels (if empty - '60')", 'cmsmasters_content_composer'),
			'icon_field_display_title' =>						__('Display', 'cmsmasters_content_composer'),
			'icon_field_display_descr' =>						__('Choose display type for your icon', 'cmsmasters_content_composer'),
			'icon_field_text_align_title' =>					__('Icon Position', 'cmsmasters_content_composer'),
			'icon_field_text_align_descr' =>					__('Choose horizontal position for your icon', 'cmsmasters_content_composer'),			'icon_field_border_width_title' =>					__('Icon Spacer Border Width', 'cmsmasters_content_composer'),
			'icon_field_border_radius_title' =>					__('Icon Spacer Border Radius', 'cmsmasters_content_composer'),
			'icon_field_border_radius_descr' =>					__('Enter icon spacer border radius', 'cmsmasters_content_composer'),
			'icon_field_link_title' =>							__('Icon Link', 'cmsmasters_content_composer'),
			'icon_field_link_descr' =>							__('Enter icon link here', 'cmsmasters_content_composer'),
			'icon_field_target_title' =>						__('Icon Link Target', 'cmsmasters_content_composer'),
			'icon_field_target_descr' =>						__('Choose icon link target type', 'cmsmasters_content_composer'),
			'icon_field_color_title' =>							__('Icon Color', 'cmsmasters_content_composer'),
			'icon_field_bg_color_title' =>						__('Icon Spacer Background Color', 'cmsmasters_content_composer'),
			'icon_field_bd_color_title' =>						__('Icon Spacer Border Color', 'cmsmasters_content_composer'),
		
		/* Finish cmsmasters_simple_icon and cmsmasters_icon_box Translations */		
		
		/* Start cmsmasters_icon_list_items Translations */
		
			'icon_list_title' =>								__('Icon List', 'cmsmasters_content_composer'),
			'icon_list_field_icon_list_descr' =>				__('Here you can add, edit, remove or sort your icon list', 'cmsmasters_content_composer'),
			'icon_list_field_list_type_title' =>				__('List Type', 'cmsmasters_content_composer'),
			'icon_list_field_list_type_descr' =>				__('Choose icon list type', 'cmsmasters_content_composer'),
			'icon_list_field_list_type_choice_block' =>			__('Icon blocks with content', 'cmsmasters_content_composer'),
			'icon_list_field_list_type_choice_list' =>			__('Just list with icons', 'cmsmasters_content_composer'),
			'icon_list_field_icon_type_title' =>				__('Icon Type', 'cmsmasters_content_composer'),
			'icon_list_field_icon_type_descr' =>				__('Choose icon type', 'cmsmasters_content_composer'),
			'icon_list_field_items_color_title' =>				__('List Items Color Type', 'cmsmasters_content_composer'),
			'icon_list_field_items_color_descr' =>				__('Choose list items color type.', 'cmsmasters_content_composer'),
			'icon_list_field_items_color_choice_border' =>		__('Apply a custom color as the color of icon border', 'cmsmasters_content_composer'),
			'icon_list_field_items_color_choice_bg' =>			__('Apply a custom color as the color of icon background', 'cmsmasters_content_composer'),
			'icon_list_field_items_color_choice_icon' =>		__('Apply a custom color as the color of icon', 'cmsmasters_content_composer'),
			'icon_list_field_border_width_title' =>				__('Border Width', 'cmsmasters_content_composer'),
			'icon_list_field_border_width_descr' =>				__('Enter icon border width.', 'cmsmasters_content_composer'),
			'icon_list_field_border_radius_title' =>			__('Border Radius', 'cmsmasters_content_composer'),
			'icon_list_field_border_radius_descr' =>			__('Enter icon border radius', 'cmsmasters_content_composer'),
			'icon_list_field_items_unifier_title' =>			__('List Items Unifier Width', 'cmsmasters_content_composer'),
			'icon_list_field_items_unifier_descr' =>			__('Enter list items unifier width.', 'cmsmasters_content_composer'),
			'icon_list_field_icon_position_title' =>			__('Icon Position', 'cmsmasters_content_composer'),
			'icon_list_field_icon_position_descr' =>			__('Choose icon position.', 'cmsmasters_content_composer'),
			'icon_list_field_icon_position_descr_note' =>		__('This option works only for icon blocks.', 'cmsmasters_content_composer'),
			'icon_list_field_icon_size_title' =>				__('Icon / Number Size', 'cmsmasters_content_composer'),
			'icon_list_field_icon_space_title' =>				__('Icon Space', 'cmsmasters_content_composer'),
			'icon_list_field_icon_space_descr' =>				__('Enter icon space size.', 'cmsmasters_content_composer'),
			'icon_list_field_icon_space_descr_note' =>			__("number, in pixels (if empty - '100')", 'cmsmasters_content_composer'),
			'icon_list_field_item_height_title' =>				__('List Item Height', 'cmsmasters_content_composer'),
			'icon_list_field_item_height_descr' =>				__('Enter list item line height.', 'cmsmasters_content_composer'),
			'icon_list_field_item_height_descr_note' =>			__("number, in pixels (if empty - default line height)", 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_icon_list_items Translations */
		
		
		
		/* Start cmsmasters_image Translations */	
			
			'image_title' =>									__('Image', 'cmsmasters_content_composer'),
			'image_field_image_align_title' =>					__('Image Alignment', 'cmsmasters_content_composer'),
			'image_field_image_align_choice_none' =>			__('No special alignment', 'cmsmasters_content_composer'),
			'image_field_caption_title' =>						__('Image Caption Text', 'cmsmasters_content_composer'),
			'image_field_caption_descr_note' =>					__('No caption if empty', 'cmsmasters_content_composer'),
			'image_field_image_link_title' =>					__('Image Link', 'cmsmasters_content_composer'),
			'image_field_image_link_descr_note' =>				__('No link if empty', 'cmsmasters_content_composer'),
			'image_field_link_target_descr' =>					__('Open link in a new tab/window?', 'cmsmasters_content_composer'),
			'image_field_link_lightbox_title' =>				__('Lightbox', 'cmsmasters_content_composer'),
			'image_field_link_lightbox_descr' =>				__('Open image link in a lightbox?', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_image Translations */	
		
		
		/* Start cmsmasters_notice Translations */	

			'notice_title' =>									__('Notice', 'cmsmasters_content_composer'),
			'notice_field_content_title' =>						__('Notice Text', 'cmsmasters_content_composer'),
			'notice_field_notice_type_title' =>					__('Notice Type', 'cmsmasters_content_composer'),
			'notice_field_notice_type_choice_success' =>		__('Success', 'cmsmasters_content_composer'),
			'notice_field_notice_type_choice_error' =>			__('Error', 'cmsmasters_content_composer'),
			'notice_field_notice_type_choice_info' =>			__('Info', 'cmsmasters_content_composer'),
			'notice_field_notice_type_choice_warning' =>		__('Warning', 'cmsmasters_content_composer'),
			'notice_field_notice_type_choice_download' =>		__('Download', 'cmsmasters_content_composer'),
			'notice_field_notice_type_choice_custom' =>			__('Custom', 'cmsmasters_content_composer'),
			'notice_field_bg_color_descr' =>					__('Set custom background color', 'cmsmasters_content_composer'),
			'notice_field_border_color_title' =>				__('Border Color', 'cmsmasters_content_composer'),
			'notice_field_border_color_descr' =>				__('Set custom border color', 'cmsmasters_content_composer'),
			'notice_field_txt_color_title' =>					__('Text Color', 'cmsmasters_content_composer'),
			'notice_field_txt_color_descr' =>					__('Set custom text color', 'cmsmasters_content_composer'),
			'notice_field_close_button_title' =>				__('Notice Close Button', 'cmsmasters_content_composer'),
			'notice_field_notice_icon_title' =>					__('Notice Icon', 'cmsmasters_content_composer'),
						
		/* Finish cmsmasters_notice Translations */	
		
		
		/* Start cmsmasters_portfolio Translations */	
		
			'portfolio_title' =>								__('Portfolio', 'cmsmasters_content_composer'),			
			'portfolio_field_orderby_descr' =>					__('Choose your portfolio projects order by parameter', 'cmsmasters_content_composer'),			
			'portfolio_field_pj_number_title' =>				__('Projects Number', 'cmsmasters_content_composer'),
			'portfolio_field_pj_number_descr' =>				__('Enter the number of projects for showing per page', 'cmsmasters_content_composer'),
			'portfolio_field_pj_number_descr_note' =>			__('number, if empty - show all projects', 'cmsmasters_content_composer'),			
			'portfolio_field_categories_descr' =>				__('Show projects associated with certain categories.', 'cmsmasters_content_composer'),
			'portfolio_field_categories_descr_note' =>			__("If you don't choose any project categories, all your projects will be shown", 'cmsmasters_content_composer'),			
			'portfolio_field_layout_descr' =>					__('Choose layout type for your portfolio projects', 'cmsmasters_content_composer'),
			'portfolio_field_layout_choice_grid' =>				__('Projects Grid', 'cmsmasters_content_composer'),
			'portfolio_field_layout_choice_puzzle' =>			__('Masonry Puzzle', 'cmsmasters_content_composer'),
			'portfolio_field_layout_mode_descr' =>				__('Choose grid layout mode for your portfolio projects', 'cmsmasters_content_composer'),
			'portfolio_field_layout_mode_choice_perfect' =>		__('Perfect grid', 'cmsmasters_content_composer'),
			'portfolio_field_layout_mode_choice_masonry' =>		__('Masonry grid', 'cmsmasters_content_composer'),			
			'portfolio_field_col_count_descr' =>				__('Choose number of projects per row', 'cmsmasters_content_composer'),
			'portfolio_field_col_count_descr_note' =>			__('4 and 5 columns will be shown for pages with a fullwidth layout only. For pages with a sidebar enabled, maximum columns amount is 3.', 'cmsmasters_content_composer'),
			'portfolio_field_col_count_descr_note_custom' =>	__('And 5 columns will be shown only if custom content width is set and when content area width is 1350px or more.'),
			'portfolio_field_metadata_descr' =>					__('Choose portfolio projects metadata that you want to show', 'cmsmasters_content_composer'),
			'portfolio_field_gap_title' =>						__('Gap', 'cmsmasters_content_composer'),
			'portfolio_field_gap_descr' =>						__('Choose the gap between portfolio projects', 'cmsmasters_content_composer'),
			'portfolio_field_gap_choice_large' =>				__('Large gap', 'cmsmasters_content_composer'),
			'portfolio_field_gap_choice_small' =>				__('1 Pixel gap', 'cmsmasters_content_composer'),
			'portfolio_field_gap_choice_zero' =>				__('No gap', 'cmsmasters_content_composer'),
			'portfolio_field_filter_descr' =>					__('If checked, enable portfolio projects category filter', 'cmsmasters_content_composer'),
			'portfolio_field_sorting_title' =>					__('Sorting', 'cmsmasters_content_composer'),
			'portfolio_field_sorting_descr' =>					__('If checked, enable portfolio projects date & name sorting', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_portfolio Translations */
		
		
		/* Start cmsmasters_posts_slider Translations */
		
			'posts_slider_title' =>								__('Posts Slider', 'cmsmasters_content_composer'),			
			'posts_slider_field_orderby_descr' =>				__('Order posts by one of the given parameters', 'cmsmasters_content_composer'),
			'posts_slider_field_poststype_title' =>				__('Choose Posts Type', 'cmsmasters_content_composer'),
			'posts_slider_field_poststype_choice_post' =>		__('Blog posts', 'cmsmasters_content_composer'),
			'posts_slider_field_poststype_choice_project' =>	__('Portfolio projects', 'cmsmasters_content_composer'),
			'posts_slider_field_postscateg_title' =>			__('Posts Categories', 'cmsmasters_content_composer'),
			'posts_slider_field_postscateg_descr' =>			__('Show blog posts associated with certain categories.', 'cmsmasters_content_composer'),
			'posts_slider_field_postscateg_descr_note' =>		__("If you don't choose any post categories, all your posts will be shown", 'cmsmasters_content_composer'),
			'posts_slider_field_pjcateg_title' =>				__('Projects Categories', 'cmsmasters_content_composer'),
			'posts_slider_field_pjcateg_descr' =>				__('Show projects associated with certain categories.', 'cmsmasters_content_composer'),
			'posts_slider_field_pjcateg_descr_note' =>			__("If you don't choose any project categories, all your projects will be shown", 'cmsmasters_content_composer'),			
			'posts_slider_field_col_count_descr' =>				__('Choose number of posts per row', 'cmsmasters_content_composer'),
			'posts_slider_field_postsamount_title' =>			__('Posts Amount', 'cmsmasters_content_composer'),
			'posts_slider_field_postsamount_descr' =>			__('Amount of posts to be shown at once', 'cmsmasters_content_composer'),
			'posts_slider_field_postsamount_descr_note' =>		__('number, if empty - one post will be shown', 'cmsmasters_content_composer'),
			'posts_slider_field_postsnumber_title' =>			__('Posts Number per Page', 'cmsmasters_content_composer'),
			'posts_slider_field_postsnumber_descr_note' =>		__('number, if empty - show all posts', 'cmsmasters_content_composer'),
			
			'posts_slider_field_pausetime_descr' =>				__('Enter your posts slider pause time', 'cmsmasters_content_composer'),
			
			'posts_slider_field_postsmeta_title' =>				__('Posts Metadata', 'cmsmasters_content_composer'),
			'posts_slider_field_postsmeta_descr' =>				__('Choose blog posts metadata you want to be shown', 'cmsmasters_content_composer'),
			'posts_slider_field_pjmeta_title' =>				__('Projects Metadata', 'cmsmasters_content_composer'),
			'posts_slider_field_pjmeta_descr' =>				__('Choose portfolio projects metadata you want to be shown', 'cmsmasters_content_composer'),
		
		/* Finish cmsmasters_posts_slider Translations */
		
		
		/* Start cmsmasters_pricing_table_items Translations */
		
			'pricing_title' =>									__('Pricing Table', 'cmsmasters_content_composer'),
			'pricing_field_offers_title' =>						__('Offers', 'cmsmasters_content_composer'),
			'pricing_field_offers_descr' =>						__('Here you can add, edit, remove or sort pricing table offers', 'cmsmasters_content_composer'),			
			'pricing_field_col_count_descr' =>					__('Choose number of pricing table offers per row', 'cmsmasters_content_composer'),
			
			
		/* Finish cmsmasters_pricing_table_items Translations */
		
		/* Start cmsmasters_profiles Translations */
		
			'profiles_title' =>									__('Profiles', 'cmsmasters_content_composer'),
			'profiles_field_orderby_descr' =>					__('Choose your profiles order by parameter', 'cmsmasters_content_composer'),
			'profiles_field_profiles_number_title' =>			__('Profiles Number per Page', 'cmsmasters_content_composer'),
			'profiles_field_profiles_number_descr_note' =>		__('number, if empty - show all profiles', 'cmsmasters_content_composer'),
			'profiles_field_categories_descr' =>				__('Show profiles associated with certain categories', 'cmsmasters_content_composer'),
			'profiles_field_categories_descr_note' =>			__("If you don't choose any profile categories, all your profiles will be shown", 'cmsmasters_content_composer'),
			'profiles_field_col_count_descr' =>					__('Choose number of profiles per row', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_profiles Translations */
		
		/* Start cmsmasters_stats & cmsmasters_counters Translations */
		
			'prog_bars_title' =>								__('Progress Bars', 'cmsmasters_content_composer'),
			'prog_bars_field_prog_bars_descr' =>				__('Here you can add, edit, remove or sort progress bars', 'cmsmasters_content_composer'),
			'prog_bars_field_mode_descr' =>						__('Choose mode of your progress bars', 'cmsmasters_content_composer'),
			'prog_bars_field_mode_choice_bars' =>				__('Bars', 'cmsmasters_content_composer'),
			'prog_bars_field_mode_choice_circles' =>			__('Circles', 'cmsmasters_content_composer'),
			'prog_bars_field_type_title' => 					__('Progress Bars Type', 'cmsmasters_content_composer'),
			'prog_bars_field_number_per_row_title' =>			__('Number per Row', 'cmsmasters_content_composer'),
			'prog_bars_field_number_per_row_descr_note' =>		__('This option not work for progress bars with mode bars and type horizontal', 'cmsmasters_content_composer'),
			'counters_title' =>									__('Counters', 'cmsmasters_content_composer'),
			'counters_field_counters_descr' =>					__('Here you can add, edit, remove or sort counters', 'cmsmasters_content_composer'),
			'counters_field_type_title' =>						__('Counters Type', 'cmsmasters_content_composer'),
			'counters_field_number_per_row_title' =>			__('Number per Row', 'cmsmasters_content_composer'),
			'counters_field_number_per_row_descr' =>			__('Choose number of counters per row.', 'cmsmasters_content_composer'),
						
		/* Finish cmsmasters_stats Translations */
		
		
		/* Start cmsmasters_quotes Translations */
		
			'quotes_title' =>									__('Quotes', 'cmsmasters_content_composer'),
			'quotes_field_quotes_descr' =>						__('Here you can add, edit, remove or sort quotes', 'cmsmasters_content_composer'),
			'quotes_field_mode_descr' =>						__('Choose your quotes visibility mode', 'cmsmasters_content_composer'),
			'quotes_field_mode_choice_grid' =>					__('Grid mode', 'cmsmasters_content_composer'),
			'quotes_field_mode_choice_slider' =>				__('Slider mode', 'cmsmasters_content_composer'),			
			'quotes_field_col_count_descr' =>					__('Choose number of quotes per row', 'cmsmasters_content_composer'),
			
			'quotes_field_slideshow_speed_descr' =>				__('Time before next quote will appear', 'cmsmasters_content_composer'),
			'quotes_field_slideshow_speed_descr_note' =>		__("if '0' - autoslide disabled", 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_quotes Translations */
		
		
		/* Start cmsmasters_sidebar Translations */
			'sidebar_title' =>									__('Sidebar', 'cmsmasters_content_composer'),
			'sidebar_field_sidebar_descr' =>					__('Choose one of already existing sidebars here', 'cmsmasters_content_composer'),
			'sidebar_field_sidebar_descr_note' =>				__('or, you can create your own sidebar', 'cmsmasters_content_composer'),
			'sidebar_field_sidebar_descr_note_link' =>			__('here', 'cmsmasters_content_composer'),
			'sidebar_field_sidebar_layout_title' =>				__('Sidebar Layout', 'cmsmasters_content_composer'),
			'sidebar_field_sidebar_layout_descr_note' =>		__('we recommend to use this option for horizontal sidebars', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_sidebar Translations */
		
		
		/* Start cmsmasters_slider Translations */
		
			'slider_title' =>									__('Slider', 'cmsmasters_content_composer'),
			'slider_layer' =>									__('Layer Slider', 'cmsmasters_content_composer'),
			'slider_rev' =>										__('Revolution Slider', 'cmsmasters_content_composer'),
			'slider_field_plugin_title' =>						__('Slider Plugin', 'cmsmasters_content_composer'),
			'slider_field_plugin_descr' =>						__('Choose one of supported slider plugins', 'cmsmasters_content_composer'),
			'slider_field_plugin_descr_note' =>					__('Please make sure that the Slider plugin you have chosen is currently installed and activated.', 'cmsmasters_content_composer'),
			'slider_field_layer_id_title' =>					__('Layer Slider Name', 'cmsmasters_content_composer'),
			'slider_field_layer_id_descr' =>					__('Choose your slider name from Layer Slider plugin', 'cmsmasters_content_composer'),
			'slider_field_rev_id_title' =>						__('Revolution Slider Name', 'cmsmasters_content_composer'),
			'slider_field_rev_id_descr' =>						__('Choose your slider name from Revolution Slider plugin', 'cmsmasters_content_composer'),
		
		/* Finish cmsmasters_slider Translations */
		
		
		/* Start cmsmasters_social Translations */
		
			'social_sharing_title' =>							__('Social Sharing', 'cmsmasters_content_composer'),
			'social_sharing_field_fb_button_title' =>			__('Facebook Like Button', 'cmsmasters_content_composer'),
			'social_sharing_field_twitter_button_title' =>		__('Twitter Tweet Button', 'cmsmasters_content_composer'),
			'social_sharing_field_googleplus_button_title' =>	__('Google+ Button', 'cmsmasters_content_composer'),
			'social_sharing_field_pinterest_button_title' =>	__('Pinterest Pin It Button', 'cmsmasters_content_composer'),
			'social_sharing_field_buttons_type_title' =>		__('Buttons Type', 'cmsmasters_content_composer'),
					
		/* Finish cmsmasters_social Translations */
		
		
		/* Start cmsmasters_table Translations */
		
			'table_title' =>									__('Table', 'cmsmasters_content_composer'),
			'table_field_table_content_title' =>				__('Table Content', 'cmsmasters_content_composer'),
			'table_field_table_content_descr' =>				__('Build your table and fill it with data', 'cmsmasters_content_composer'),
			'table_field_table_caption_title' =>				__('Table Caption', 'cmsmasters_content_composer'),
			'table_field_table_caption_descr' =>				__('Add a short caption for your table so that visitors know what this data is about', 'cmsmasters_content_composer'),
		
		/* Finish cmsmasters_table Translations */
		
		
		/* Start cmsmasters_tabs Translations */
		
			'tabs_title' =>										__('Tabs / Tour', 'cmsmasters_content_composer'),
			'tabs_field_tabs_descr' =>							__('Here you can add, edit, remove or sort tabs', 'cmsmasters_content_composer'),
			'tabs_field_mode_descr' =>							__('How should the tabs be displayed, top or side?', 'cmsmasters_content_composer'),
			'tabs_field_mode_choice_tabs' =>					__('Tabs mode', 'cmsmasters_content_composer'),
			'tabs_field_mode_choice_tour' =>					__('Tour mode', 'cmsmasters_content_composer'),
			'tabs_field_position_title' =>						__('Position', 'cmsmasters_content_composer'),
			'tabs_field_position_descr' =>						__('Choose tour tabs position', 'cmsmasters_content_composer'),
			'tabs_field_active_title' =>						__('Active Tab', 'cmsmasters_content_composer'),
			'tabs_field_active_descr' =>						__('Enter the number of the tab that should be open initially.', 'cmsmasters_content_composer'),
			'tabs_field_active_descr_note' =>					__('If empty first tab should be open on page load', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_tabs Translations */
		
		
		/* Start cmsmasters_toggles Translations */
		
			'toggles_title' =>									__('Toggles / Accordion', 'cmsmasters_content_composer'),
			'toggles_field_toggles_descr' =>					__('Here you can add, edit, remove or sort toggles', 'cmsmasters_content_composer'),
			'toggles_field_mode_descr' =>						__('Should only one toggle be active at a time or can multiple toggles be open at the same time?', 'cmsmasters_content_composer'),
			'toggles_field_mode_choice_toggles' =>				__('Toggles mode', 'cmsmasters_content_composer'),
			'toggles_field_mode_choice_accordion' =>			__('Accordion mode', 'cmsmasters_content_composer'),
			'toggles_field_active_title' =>						__('Active Toggle', 'cmsmasters_content_composer'),
			'toggles_field_active_descr' =>						__('Enter the number of the toggle that should be open initially.', 'cmsmasters_content_composer'),
			'toggles_field_active_descr_note' =>				__('If empty all toggles should be close on page load', 'cmsmasters_content_composer'),
			'toggles_field_sorting_title' =>					__('Sorting', 'cmsmasters_content_composer'),
			'toggles_field_sorting_descr' =>					__('If checked, toggles sorting will be shown', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_toggles Translations */
		
		
		/* Start cmsmasters_twitter Translations */
		
			'twitter_title' =>									__('Twitter Stripe', 'cmsmasters_content_composer'),
			'twitter_field_username_title' =>					__('Twitter Username', 'cmsmasters_content_composer'),
			'twitter_field_username_descr' =>					__('Enter your Twitter username', 'cmsmasters_content_composer'),
			'twitter_field_tweets_number_title' =>				__('Tweets Number', 'cmsmasters_content_composer'),
			'twitter_field_tweets_number_descr' =>				__("Enter the number of latest tweets you'd like to display", 'cmsmasters_content_composer'),
			'twitter_field_tweets_number_descr_note' =>			__('(5 - if empty)', 'cmsmasters_content_composer'),
			'twitter_field_tweets_date_title' =>				__('Date visibility', 'cmsmasters_content_composer'),
			'twitter_field_tweets_date_descr' =>				__('Show or hide tweet date', 'cmsmasters_content_composer'),
			'twitter_field_slider_controls_title' =>			__('Slider Controls', 'cmsmasters_content_composer'),
			'twitter_field_slider_controls_descr' =>			__('If checked, enable tweets slider controls', 'cmsmasters_content_composer'),
			
			'twitter_field_slider_autoplay_descr' =>			__('Animate next tweet automatically', 'cmsmasters_content_composer'),
			
			'twitter_field_slider_speed_descr' =>				__('Time before next slide will appear', 'cmsmasters_content_composer'),
			'twitter_field_slider_speed_descr_note' =>			__('If empty - 3', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_twitter Translations */
		
		
		/* Start cmsmasters_videos Translations */
		
			'video_title' =>									__('Video', 'cmsmasters_content_composer'),
			'video_field_video_descr' =>						__('Here you can add, edit, remove or sort video links', 'cmsmasters_content_composer'),
			'video_field_video_descr_note' =>					__('Please add video in several formats for your shortcode to work properly in all browsers', 'cmsmasters_content_composer'),
			'video_field_poster_title' =>						__('Poster', 'cmsmasters_content_composer'),
			'video_field_poster_descr' =>						__('Defines image to show as placeholder before the media plays', 'cmsmasters_content_composer'),
			'video_field_maxwidth_title' =>						__('Max Width', 'cmsmasters_content_composer'),
			'video_field_maxwidth_descr' =>						__('Defines max width of the media', 'cmsmasters_content_composer'),
			'video_field_maxheight_title' =>					__('Max Height', 'cmsmasters_content_composer'),
			'video_field_maxheight_descr' =>					__('Defines max height of the media', 'cmsmasters_content_composer'),			
			'video_field_autoplay_descr' =>						__('If checked, video will play as soon as the video is ready', 'cmsmasters_content_composer'),
			'video_field_muted_title' =>						__('Muted', 'cmsmasters_content_composer'),
			'video_field_muted_descr' =>						__('If checked, video will play without the sound', 'cmsmasters_content_composer'),			
			'video_field_repeat_descr' =>						__('If checked, video will be repeated from the beginning after finishing', 'cmsmasters_content_composer'),			
			'video_field_preload_descr' =>						__('Specifies if and how the video should be loaded when the page loads', 'cmsmasters_content_composer'),
			'video_field_preload_choice_none' =>				__('None - the video should not be loaded when the page loads', 'cmsmasters_content_composer'),
			'video_field_preload_choice_auto' =>				__('Auto - the video should be loaded entirely when the page loads', 'cmsmasters_content_composer'),
			'video_field_preload_choice_metadata' =>			__('Metadata - only metadata should be loaded when the page loads', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_videos Translations */
		
		/* Start cmsmasters_html Translations */
		
			'custom_html_title' =>								__('Custom HTML', 'cmsmasters_content_composer'),
			'custom_html_field_code_title' =>					__('HTML Code', 'cmsmasters_content_composer'),
			'custom_html_field_code_descr' =>					__('Enter here your custom HTML code', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_html Translations */
		
		
		/* Start cmsmasters_css Translations */
		
			'custom_css_title' =>								__('Custom CSS', 'cmsmasters_content_composer'),
			'custom_css_field_code_title' =>					__('CSS Code', 'cmsmasters_content_composer'),
			'custom_css_field_code_descr' =>					__('Enter here your custom CSS code', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_css Translations */
		
		
		/* Start cmsmasters_js Translations */
		
			'custom_js_title' =>								__('Custom JS', 'cmsmasters_content_composer'),
			'custom_js_field_code_title' =>						__('JavaScript Code', 'cmsmasters_content_composer'),
			'custom_js_field_code_descr' =>						__('Enter here your custom JavaScript code', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_js Translations */
		
		/* Start WooCommerce Extension Translations */
		
			'products_title' =>									__('Products', 'cmsmasters_content_composer'), 
			'products_shortcode_title' =>						__('WooCommerce Shortcode', 'cmsmasters_content_composer'), 
			'products_shortcode_descr' =>						__('Choose a WooCommerce shortcode to use', 'cmsmasters_content_composer'), 
			'choice_recent_products' =>							__('Recent Products', 'cmsmasters_content_composer'), 
			'choice_featured_products' =>						__('Featured Products', 'cmsmasters_content_composer'), 
			'choice_product_categories' =>						__('Product Categories', 'cmsmasters_content_composer'), 
			'choice_sale_products' =>							__('Sale Products', 'cmsmasters_content_composer'), 
			'choice_best_selling_products' =>					__('Best Selling Products', 'cmsmasters_content_composer'), 
			'choice_top_rated_products' =>						__('Top Rated Products', 'cmsmasters_content_composer'), 
			'products_field_orderby_descr' =>					__("Choose your products 'order by' parameter", 'cmsmasters_content_composer'), 
			'products_field_orderby_descr_note' =>				__("Sorting will not be applied for", 'cmsmasters_content_composer'), 
			'products_field_prod_number_title' =>				__('Number of Products', 'cmsmasters_content_composer'), 
			'products_field_prod_number_descr' =>				__('Enter the number of products for showing per page', 'cmsmasters_content_composer'), 
			'products_field_col_count_descr' =>					__('Choose number of products per row', 'cmsmasters_content_composer'), 
			'selected_products_title' =>						__('Selected Products', 'cmsmasters_content_composer'), 
			'selected_products_field_ids' =>					__('Products', 'cmsmasters_content_composer'), 
			'selected_products_field_ids_descr' =>				__('Choose products to be shown', 'cmsmasters_content_composer'), 
			'selected_products_field_ids_descr_note' =>			__('All products will be shown if empty', 'cmsmasters_content_composer'), 
			
		/* Finish WooCommerce Extension Translations */
		
		/* Start PayPal Donations Extension Translations */
		
			'paypal_donations_title' =>							__('PayPal Donations', 'cmsmasters_content_composer'), 
			'paypal_donations_field_amount_title' =>			__('Donation Amount', 'cmsmasters_content_composer'), 
			'paypal_donations_field_amount_descr' =>			__('Enter donation amount', 'cmsmasters_content_composer'), 
			'paypal_donations_field_amount_descr_note' =>		__('If empty, no fixed donation amount will be set', 'cmsmasters_content_composer'), 
			'paypal_donations_field_purpose_title' =>			__('Donation Purpose', 'cmsmasters_content_composer'), 
			'paypal_donations_field_purpose_descr' =>			__('Enter donation purpose', 'cmsmasters_content_composer'), 
			'paypal_donations_field_purpose_descr_note' =>		__('If empty, a Donator will be able to enter any purpose', 'cmsmasters_content_composer'), 
			'paypal_donations_field_reference_title' =>			__('Donation Reference', 'cmsmasters_content_composer'), 
			'paypal_donations_field_reference_descr' =>			__('Enter reference for the donation', 'cmsmasters_content_composer'), 
			'paypal_donations_field_reference_descr_note' =>	__('If empty, no reference will be shown', 'cmsmasters_content_composer'), 
			'paypal_donations_field_button_text_title' =>		__('Button Text', 'cmsmasters_content_composer'), 
			'paypal_donations_field_button_text_descr' =>		__('Enter button text', 'cmsmasters_content_composer'), 
			'paypal_donations_field_button_text_descr_note' =>	__('If empty, no text will be shown', 'cmsmasters_content_composer'),
			
		/* Finish PayPal Donations Extension Translations */
		
		/* Start CMSMASTERS Donations Extension Translations */
		
			/* Donations */
			'donations_title' =>								__('Donations', 'cmsmasters_content_composer'), 
			'donations_field_donations_number_title' =>			__('Number of Donations to Show', 'cmsmasters_content_composer'), 
			'donations_field_donations_number_descr_note' =>	__('Set 0 to show all donations', 'cmsmasters_content_composer'), 
			'donations_field_campaigns_title' =>				__('Campaigns', 'cmsmasters_content_composer'), 
			'donations_field_campaigns_descr' =>				__('Campaigns to show donations from', 'cmsmasters_content_composer'), 
			'donations_field_campaigns_descr_note' =>			__('Donations from all campaigns will be shown if none is selected', 'cmsmasters_content_composer'), 
			'donations_field_postsmeta_title' =>				__('Donations Meta to Display', 'cmsmasters_content_composer'), 
			
			/* Featured Campaign */
			'featured_campaign_title' =>						__('Featured Campaign', 'cmsmasters_content_composer'), 
			'featured_campaign_field_campaign_title' =>			__('Campaign to Show', 'cmsmasters_content_composer'), 
			'featured_campaign_field_postsmeta_title' =>		__('Campaign Meta to Display', 'cmsmasters_content_composer'), 
			
			/* Campaigns */
			'campaigns_title' =>								__('Campaigns', 'cmsmasters_content_composer'), 
			'campaigns_field_campaigns_ids_title' =>			__('Campaigns', 'cmsmasters_content_composer'), 
			'campaigns_field_campaigns_ids_descr' =>			__('Select one or several campaigns', 'cmsmasters_content_composer'), 
			'campaigns_field_campaigns_ids_descr_note' =>		__('All campaigns will be shown if none is selected', 'cmsmasters_content_composer'), 
			'campaigns_field_campaigns_categories_title' =>		__('Categories', 'cmsmasters_content_composer'), 
			'campaigns_field_campaigns_categories_descr' =>		__('Select one or several categories to show campaigns from', 'cmsmasters_content_composer'), 
			'campaigns_field_campaigns_categories_note' =>		__('Can be used only if \'Order By\' parameter is set to \'Date\' or \'Random\'. Select none to show all', 'cmsmasters_content_composer'), 
			'campaigns_field_campaigns_number_title' =>			__('Number of Campaigns to Show', 'cmsmasters_content_composer'), 
			'campaigns_field_campaigns_number_descr_note' =>	__('Set 0 to show all campaigns', 'cmsmasters_content_composer'), 
			'campaigns_field_pausetime_descr' =>				__('Enter your campaigns slider pause time', 'cmsmasters_content_composer'), 
			'campaigns_field_campaigns_metadata_title' =>		__('Campaigns Meta to Display', 'cmsmasters_content_composer'), 
			
		/* Finish CMSMASTERS Donations Extension Translations */
		
		/* Start Timetable Extension Translations */
			
			'timetable_title' =>								__('Timetable', 'cmsmasters_content_composer'), 
			'timetable_field_event_title' =>					__('Events', 'cmsmasters_content_composer'), 
			'timetable_field_event_descr' =>					__('Select the events that are to be displayed in timetable', 'cmsmasters_content_composer'), 
			'timetable_field_event_descr_note' =>				__('Hold the CTRL key to select multiple items', 'cmsmasters_content_composer'), 
			'timetable_field_event_category_title' =>			__('Event categories', 'cmsmasters_content_composer'), 
			'timetable_field_event_category_descr' =>			__('Select the events categories that are to be displayed in timetable', 'cmsmasters_content_composer'), 
			'timetable_field_event_category_descr_note' =>		__('Hold the CTRL key to select multiple items', 'cmsmasters_content_composer'), 
			'timetable_field_hour_category_title' =>			__('Hour categories', 'cmsmasters_content_composer'), 
			'timetable_field_hour_category_descr' =>			__('Select the hour categories (if defined for existing event hours) for events that are to be displayed in timetable', 'cmsmasters_content_composer'), 
			'timetable_field_hour_category_descr_note' =>		__('Hold the CTRL key to select multiple items', 'cmsmasters_content_composer'), 
			'timetable_field_columns_title' =>					__('Columns', 'cmsmasters_content_composer'), 
			'timetable_field_columns_descr' =>					__('Select the columns that are to be displayed in timetable', 'cmsmasters_content_composer'), 
			'timetable_field_columns_descr_note' =>				__('Hold the CTRL key to select multiple items', 'cmsmasters_content_composer'), 
			'timetable_field_measure_title' =>					__('Hour measure', 'cmsmasters_content_composer'), 
			'timetable_field_measure_descr' =>					__('Choose hour measure for event hours', 'cmsmasters_content_composer'), 
			'timetable_field_measure_choice_hour' =>			__('Hour (1h)', 'cmsmasters_content_composer'), 
			'timetable_field_measure_choice_half_hour' =>		__('Half hour (30min)', 'cmsmasters_content_composer'), 
			'timetable_field_measure_choice_quarter_hour' =>	__('Quarter hour (15min)', 'cmsmasters_content_composer'), 
			'timetable_field_filter_style_title' =>				__('Filter style', 'cmsmasters_content_composer'), 
			'timetable_field_filter_style_descr' =>				__('Choose between dropdown menu and tabs for event filtering', 'cmsmasters_content_composer'), 
			'timetable_field_filter_style_choice_dropdown_list' =>	__('Dropdown list', 'cmsmasters_content_composer'), 
			'timetable_field_filter_style_choice_tabs' =>		__('Tabs', 'cmsmasters_content_composer'), 
			'timetable_field_filter_kind_title' =>				__('Filter kind', 'cmsmasters_content_composer'), 
			'timetable_field_filter_kind_descr' =>				__('Choose between filtering by events or events categories', 'cmsmasters_content_composer'), 
			'timetable_field_filter_kind_choice_event' =>		__('By event', 'cmsmasters_content_composer'), 
			'timetable_field_filter_kind_choice_event_category' =>	__('By event category', 'cmsmasters_content_composer'), 
			'timetable_field_filter_label_title' =>				__('Filter label', 'cmsmasters_content_composer'), 
			'timetable_field_filter_label_descr' =>				__('Specify text label for all events', 'cmsmasters_content_composer'), 
			'timetable_field_filter_label_def' =>				__('All Events', 'cmsmasters_content_composer'), 
			'timetable_field_time_format_title' =>				__('Time format', 'cmsmasters_content_composer'), 
			'timetable_field_time_format_choice_custom' =>		__('Custom', 'cmsmasters_content_composer'), 
			'timetable_field_time_format_custom_title' =>		__('Custom Time Format', 'cmsmasters_content_composer'), 
			'timetable_field_hide_all_events_view_title' =>		__('Hide \'All Events\' view', 'cmsmasters_content_composer'), 
			'timetable_field_hide_hours_column_title' =>		__('Hide first (hours) column', 'cmsmasters_content_composer'), 
			'timetable_field_show_end_hour_title' =>			__('Show end hour in first (hours) column', 'cmsmasters_content_composer'), 
			'timetable_field_event_layout_title' =>				__('Event block layout', 'cmsmasters_content_composer'), 
			'timetable_field_event_layout_descr' =>				__('Select one of the available event block layouts', 'cmsmasters_content_composer'), 
			'timetable_field_event_layout_choice_type' =>		__('Type', 'cmsmasters_content_composer'), 
			'timetable_field_hide_empty_title' =>				__('Hide empty rows', 'cmsmasters_content_composer'), 
			'timetable_field_disable_event_url_title' =>		__('Disable event url', 'cmsmasters_content_composer'), 
			'timetable_field_text_align_title' =>				__('Text align', 'cmsmasters_content_composer'), 
			'timetable_field_text_align_descr' =>				__('Specify text align in timetable event block', 'cmsmasters_content_composer'), 
			'timetable_field_id_title' =>						__('Id', 'cmsmasters_content_composer'), 
			'timetable_field_id_descr' =>						__('Assign a unique identifier to a timetable if you use more than one table on a single page', 'cmsmasters_content_composer'), 
			'timetable_field_id_descr_note' =>					__('Otherwise, leave this field blank', 'cmsmasters_content_composer'), 
			'timetable_field_row_height_title' =>				__('Row height', 'cmsmasters_content_composer'), 
			'timetable_field_box_bg_color_title' =>				__('Timetable box background color', 'cmsmasters_content_composer'), 
			'timetable_field_box_hover_bg_color_title' =>		__('Timetable box hover background color', 'cmsmasters_content_composer'), 
			'timetable_field_box_txt_color_title' =>			__('Timetable box text color', 'cmsmasters_content_composer'), 
			'timetable_field_box_hover_txt_color_title' =>		__('Timetable box hover text color', 'cmsmasters_content_composer'), 
			'timetable_field_box_hours_txt_color_title' =>		__('Timetable box hours text color', 'cmsmasters_content_composer'), 
			'timetable_field_box_hours_hover_txt_color_title' =>	__('Timetable box hours hover text color', 'cmsmasters_content_composer'), 
			'timetable_field_row1_bg_color_title' =>			__('Row 1 style background color', 'cmsmasters_content_composer'), 
			'timetable_field_row1_txt_color_title' =>			__('Row 1 style text color', 'cmsmasters_content_composer'), 
			'timetable_field_row2_bg_color_title' =>			__('Row 2 style background color', 'cmsmasters_content_composer'), 
			'timetable_field_row2_txt_color_title' =>			__('Row 2 style text color', 'cmsmasters_content_composer'), 
			
		/* Finish Timetable Extension Translations */
	

	// CMSMasters Custom Multiple Fields Shortcodes Translations
	
		/* Start cmsmasters_audio Translations */
		
			'audio_link_field_audio_link_title' =>				__('Audio Link', 'cmsmasters_content_composer'),
			'audio_link_field_audio_link_descr' =>				__('Enter audio file link here', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_audio Translations */
		
		/* Start cmsmasters_client Translations */
		
			'client_title' =>									__('Client', 'cmsmasters_content_composer'),
			'client_field_name_descr' =>						__('Enter this client name', 'cmsmasters_content_composer'),
			'client_field_logo_title' =>						__('Logo', 'cmsmasters_content_composer'),
			'client_field_logo_descr' =>						__('Choose this client logo', 'cmsmasters_content_composer'),			
			'client_field_link_descr' =>						__('Enter this client website link', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_client Translations */
		
		/* Start cmsmasters_google_map_marker Translations */
		
			'map_marker_title' =>								__('Google Map Marker', 'cmsmasters_content_composer'),
			'map_marker_field_address_type_title' =>			__('Address Type', 'cmsmasters_content_composer'),		
			'map_marker_field_address_type_descr' =>			__('Choose Google map marker address type', 'cmsmasters_content_composer'),
			'map_marker_field_address_descr' =>					__('Enter address to centre this map marker at', 'cmsmasters_content_composer'),
			'map_marker_field_latitude_descr' =>				__('Enter latitude to center your map marker', 'cmsmasters_content_composer'),
			'map_marker_field_longitude_descr' =>				__('Enter longitude to center your map marker', 'cmsmasters_content_composer'),
			'map_marker_field_popup_html_title' =>				__('Popup HTML', 'cmsmasters_content_composer'),
			'map_marker_field_popup_html_descr' =>				__('Enter the content for this marker information popup', 'cmsmasters_content_composer'),
			'map_marker_field_popup_visibility_title' =>		__('Popup Visibility', 'cmsmasters_content_composer'),
			'map_marker_field_popup_visibility_descr' =>		__('If checked, this marker information popup will be shown', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_google_map_marker Translations */
		
		
		/* Start cmsmasters_icon_list_item Translations */
		
			'icon_list_item_title' =>							__('List Item', 'cmsmasters_content_composer'),
			'icon_list_item_field_icon_descr' =>				__('Choose icon for this list item', 'cmsmasters_content_composer'),
			'icon_list_item_field_image_descr' =>				__('Choose image for this list item', 'cmsmasters_content_composer'),
			'icon_list_item_field_title_descr' =>				__('Enter this list item title', 'cmsmasters_content_composer'),
			'icon_list_item_field_content_descr' =>				__('Enter this list item content.', 'cmsmasters_content_composer'),
			'icon_list_item_field_content_descr_note' =>		__('This option works only for icon blocks', 'cmsmasters_content_composer'),
			'icon_list_item_field_item_color_title' =>			__('Custom List Item Color', 'cmsmasters_content_composer'),
			'icon_list_item_field_item_color_descr' =>			__('If not checked, icon list item will use parent section color scheme colors', 'cmsmasters_content_composer'),
			'icon_list_item_field_color_descr' =>				__('Choose list item icon background color.', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_icon_list_item Translations */
		
		
		/* Start cmsmasters_counter Translations */
			'counter_title' =>									__('Counter', 'cmsmasters_content_composer'),
			'counter_subtitle' =>								__('Description', 'cmsmasters_content_composer'),
			'counter_field_counter_value_title' =>				__('Counter Value', 'cmsmasters_content_composer'),
			'counter_field_counter_value_prefix_title' =>		__('Counter Value Prefix', 'cmsmasters_content_composer'),
			'counter_field_counter_value_suffix_title' =>		__('Counter Value Suffix', 'cmsmasters_content_composer'),
			'counter_field_icon_descr' =>						__('Choose icon for your counter', 'cmsmasters_content_composer'),
			'counter_field_counter_color_title' =>				__('Custom Counter Color', 'cmsmasters_content_composer'),
			'counter_field_icon_border_radius_descr' =>			__('Enter counter icon border radius', 'cmsmasters_content_composer'),
			'counter_field_icon_color_title' =>					__('Counter Icon Custom Color', 'cmsmasters_content_composer'),
			'counter_field_icon_bg_color_title' =>				__('Counter Icon Custom Background Color', 'cmsmasters_content_composer'),
			'counter_field_icon_bd_color_title' =>				__('Counter Icon Custom Border Color', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_counter Translations */
		
		
		/* Start cmsmasters_pricing_table_item Translations */
		
			'pricing_offer_title' =>							__('Pricing Table Offer', 'cmsmasters_content_composer'),
			'pricing_offer_field_title_descr' =>				__('Enter this pricing table offer title', 'cmsmasters_content_composer'),
			'pricing_offer_field_price_title' =>				__('Price', 'cmsmasters_content_composer'),
			'pricing_offer_field_price_descr' =>				__('Enter this pricing table offer price', 'cmsmasters_content_composer'),
			'pricing_offer_field_coins_title' =>				__('Coins', 'cmsmasters_content_composer'),
			'pricing_offer_field_coins_descr' =>				__('Enter this pricing table offer price coins', 'cmsmasters_content_composer'),
			'pricing_offer_field_currency_title' =>				__('Currency', 'cmsmasters_content_composer'),
			'pricing_offer_field_currency_descr' =>				__('Enter this pricing table offer currency', 'cmsmasters_content_composer'),
			'pricing_offer_field_period_title' =>				__('Period', 'cmsmasters_content_composer'),
			'pricing_offer_field_period_descr' =>				__('Enter this pricing table offer period', 'cmsmasters_content_composer'),
			'pricing_offer_field_offer_color_title' =>			__('Custom Offer Color', 'cmsmasters_content_composer'),
			'pricing_offer_field_offer_color_descr' =>			__('If not checked, pricing table offer will use parent section color scheme colors', 'cmsmasters_content_composer'),
			'pricing_offer_field_color_descr' =>				__('Choose color for this pricing table offer', 'cmsmasters_content_composer'),
			'pricing_offer_field_features_title' =>				__('Features', 'cmsmasters_content_composer'),
			'pricing_offer_field_features_descr' =>				__('Add pricing table offer features', 'cmsmasters_content_composer'),
			'pricing_offer_field_button_text_title' =>			__('Button Text', 'cmsmasters_content_composer'),
			'pricing_offer_field_button_text_descr' =>			__('Enter this pricing table offer button text', 'cmsmasters_content_composer'),
			'pricing_offer_field_button_link_title' =>			__('Button Link', 'cmsmasters_content_composer'),
			'pricing_offer_field_button_link_descr' =>			__('Enter this pricing table offer button link', 'cmsmasters_content_composer'),
			'pricing_offer_field_best_offer_title' =>			__('Best Offer', 'cmsmasters_content_composer'),
			'pricing_offer_field_best_offer_descr' =>			__('If checked, this pricing table offer will be highlighted', 'cmsmasters_content_composer'),
			'pricing_offer_field_best_offer_custom_bg_title' =>	__('Custom Best Offer Background Color', 'cmsmasters_content_composer'),
			'pricing_offer_field_best_offer_custom_bg_descr' =>	__('If not checked, pricing table best offer will use parent section color scheme colors', 'cmsmasters_content_composer'),
			'pricing_offer_field_best_offer_bg_title' =>		__('Best Offer Background Color', 'cmsmasters_content_composer'),
			'pricing_offer_field_best_offer_bg_descr' =>		__('Choose background color for this pricing table best offer', 'cmsmasters_content_composer'),
			'pricing_offer_field_best_offer_txt_title' =>		__('Best Offer Text Color', 'cmsmasters_content_composer'),
			'pricing_offer_field_best_offer_txt_descr' =>		__('Choose text color for this pricing table best offer', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_pricing_table_item Translations */
		
		/* Start cmsmasters_stat Translations */
		
			'prog_bar_title' =>									__('Progress Bar', 'cmsmasters_content_composer'),
			'prog_bar_field_title_descr' =>						__('Enter this progress bar title', 'cmsmasters_content_composer'),
			'prog_bar_subtitle' =>								__('Description', 'cmsmasters_content_composer'),
			'prog_bar_field_subtitle_descr' =>					__('Enter this progress bar description text', 'cmsmasters_content_composer'),
			'prog_bar_field_progress_title' =>					__('Progress', 'cmsmasters_content_composer'),
			'prog_bar_field_progress_descr' =>					__('Choose this bar progress (percentage)', 'cmsmasters_content_composer'),
			'prog_bar_field_icon_descr' =>						__('Choose icon for your progress bar', 'cmsmasters_content_composer'),
			'prog_bar_field_bar_color_title' =>					__('Bar Color', 'cmsmasters_content_composer'),
			'prog_bar_field_bar_color_descr' =>					__('If not selected, progress bar will use parent section color scheme color', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_stat Translations */
		
		/* Start cmsmasters_quote Translations */
		
			'quote_title' =>									__('Quote', 'cmsmasters_content_composer'),
			'quote_field_image_title' =>						__('Image', 'cmsmasters_content_composer'),
			'quote_field_image_descr' =>						__('Choose this quote author image', 'cmsmasters_content_composer'),
			'quote_field_name_descr' =>							__('Enter this team quote author name', 'cmsmasters_content_composer'),
			'quote_field_subtitle_title' =>						__('Subtitle', 'cmsmasters_content_composer'),
			'quote_field_subtitle_descr' =>						__('Enter this quote subtitle', 'cmsmasters_content_composer'),
			'quote_field_quote_title' =>						__('Quote', 'cmsmasters_content_composer'),
			'quote_field_quote_descr' =>						__('Enter this quote text', 'cmsmasters_content_composer'),
			'quote_field_link_title' =>							__('Website Link', 'cmsmasters_content_composer'),
			'quote_field_link_descr' =>							__('Enter the link of quote author website', 'cmsmasters_content_composer'),
			'quote_field_website_name_title' =>					__('Website Name', 'cmsmasters_content_composer'),
			'quote_field_website_name_descr' =>					__('Enter quote author website name', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_quote Translations */
		
		
		/* Start cmsmasters_tab Translations */
		
			'tab_title' =>										__('Tab', 'cmsmasters_content_composer'),
			'tab_field_title_descr' =>							__('Enter this tab title', 'cmsmasters_content_composer'),
			'tab_field_content_descr' =>						__('Enter this tab content', 'cmsmasters_content_composer'),
			'tab_field_tab_selector_color_title' =>				__('Custom Tab Selector Color', 'cmsmasters_content_composer'),
			'tab_field_tab_selector_color_descr' =>				__('If not checked, tab selector will use parent section color scheme colors', 'cmsmasters_content_composer'),
			'tab_field_tab_color_title' =>						__('Tab Color', 'cmsmasters_content_composer'),
			'tab_field_tab_color_descr' =>						__('Choose tab selector highlight color on mouseover', 'cmsmasters_content_composer'),
			'tab_field_icon_descr' =>							__('Choose icon for this tab', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_tab Translations */
		
		
		/* Start cmsmasters_toggle Translations */
		
			'toggle_title' =>									__('Toggle', 'cmsmasters_content_composer'),
			'toggle_field_title_descr' =>						__('Enter this toggle title', 'cmsmasters_content_composer'),
			'toggle_field_content_descr' =>						__('Enter this toggle content', 'cmsmasters_content_composer'),
			'toggle_field_toggle_tags_title' =>					__('Toggle Tags', 'cmsmasters_content_composer'),
			'toggle_field_toggle_tags_descr' =>					__('Enter additional toggle tags separated with commas.', 'cmsmasters_content_composer'),
			'toggle_field_toggle_tags_descr_note' =>			__('Only for toggles with enabled sorting.', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_toggle Translations */
		
		
		/* Start cmsmasters_video Translations */
		
			'video_link_title' =>								__('Video', 'cmsmasters_content_composer'),
			'video_link_field_video_link_title' =>				__('Video Link', 'cmsmasters_content_composer'),
			'video_link_field_video_link_descr' =>				__('Choose your video file here', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_video Translations */
		
		
	// CMSMasters Editor Shortcodes	Translations
	
		/* Start cmsmasters_dropcap Translations */
		
			'dropcap_title' =>									__('Dropcap', 'cmsmasters_content_composer'), 
			'dropcap_field_content_descr' =>					__('Enter the character/symbol for this dropcap', 'cmsmasters_content_composer'),
			'dropcap_field_type_title' =>						__('Type', 'cmsmasters_content_composer'),
			'dropcap_field_type_descr' =>						__('Choose dropcap type', 'cmsmasters_content_composer'),
			'dropcap_field_type_choice_one' =>					__('Type 1', 'cmsmasters_content_composer'),
			'dropcap_field_type_choice_two' =>					__('Type 2', 'cmsmasters_content_composer'),
			
		/* Finish cmsmasters_dropcap Translations */
		
		
		/* Start CMSMasters Item Shortcode Translations */
		
			'item_title' =>										__('Feature', 'cmsmasters_content_composer'),
			'item_field_title_descr' =>							__('Enter the title for this link', 'cmsmasters_content_composer'),			
			'item_field_link_descr' =>							__('Enter your link here', 'cmsmasters_content_composer'),
			'item_field_icon_descr' =>							__('Choose icon for this link', 'cmsmasters_content_composer'),
			
		/* Finish CMSMasters Item Shortcode Translations */
		
		
		/* Start CMSMasters Column Shortcode Translations */
		
			'column_title' =>									__('Column', 'cmsmasters_content_composer'),
			'column_field_animation_descr' =>					__('Column animation effect when a user scrolls to its position for the first time.', 'cmsmasters_content_composer'),
			'column_field_animation_delay_descr' =>				__('Delay before column animation starts', 'cmsmasters_content_composer'), 
			'column_field_classes_descr' =>						__('You can add additional CSS classes (separated by spaces) to the column, if you wish to style content elements differently', 'cmsmasters_content_composer'),
			
		/* Finish CMSMasters Column Shortcode Translations */
		
		
		/* Start CMSMasters Row Shortcode Translations */
		
			'row_title' =>										__('Section', 'cmsmasters_content_composer'),
			'row_button' =>										__('New Section', 'cmsmasters_content_composer'),
			'row_field_top_style_title' =>						__('Row Top Style', 'cmsmasters_content_composer'),
			'row_field_top_style_descr' =>						__('If not "default", neither "background image" nor "color overlay" should be used', 'cmsmasters_content_composer'),
			'row_field_bot_style_title' =>						__('Row Bottom Style', 'cmsmasters_content_composer'),
			'row_field_bot_style_descr' =>						__('If not "default", neither "background image" nor "color overlay" should be used', 'cmsmasters_content_composer'),
			'row_field_choice_default' =>						__('Default', 'cmsmasters_content_composer'),
			'row_field_choice_left_diagonal' =>					__('Left Diagonal', 'cmsmasters_content_composer'),
			'row_field_choice_right_diagonal' =>				__('Right Diagonal', 'cmsmasters_content_composer'),
			'row_field_choice_zigzag' =>						__('Zigzag', 'cmsmasters_content_composer'),
			'row_field_choice_triangle' =>						__('Triangle', 'cmsmasters_content_composer'),
			'row_field_color_scheme_title' =>					__('Color Scheme', 'cmsmasters_content_composer'),
			'row_field_color_scheme_descr' =>					__('Choose a color scheme to be used for section', 'cmsmasters_content_composer'),
			'row_field_custom_bg_color_title' =>				__('Custom Background Color', 'cmsmasters_content_composer'),
			'row_field_custom_bg_color_descr' =>				__('If not checked, section background color will match background color for this section color scheme', 'cmsmasters_content_composer'),
			'row_field_bg_color_descr' =>						__('Choose background color for this section', 'cmsmasters_content_composer'),
			'row_field_bg_image_title' =>						__('Background Image', 'cmsmasters_content_composer'),
			'row_field_bg_image_descr' =>						__('Choose background image for this section', 'cmsmasters_content_composer'),
			'row_field_bg_position_title' =>					__('Background Position', 'cmsmasters_content_composer'),
			'row_field_bg_position_descr' =>					__('Select background position for this section', 'cmsmasters_content_composer'),
			'row_field_bg_position_choice_vert_top' =>			__('Vertical: top', 'cmsmasters_content_composer'),
			'row_field_bg_position_choice_vert_center' =>		__('Vertical: center', 'cmsmasters_content_composer'),
			'row_field_bg_position_choice_vert_bottom' =>		__('Vertical: bottom', 'cmsmasters_content_composer'),
			'row_field_bg_position_choice_horiz_left' =>		__('Horizontal: left', 'cmsmasters_content_composer'),
			'row_field_bg_position_choice_horiz_center' =>		__('Horizontal: center', 'cmsmasters_content_composer'),
			'row_field_bg_position_choice_horiz_right' =>		__('Horizontal: right', 'cmsmasters_content_composer'),
			'row_field_bg_repeat_title' =>						__('Background Repeat', 'cmsmasters_content_composer'),
			'row_field_bg_repeat_descr' =>						__('Choose background repeat for this section', 'cmsmasters_content_composer'),
			'row_field_bg_repeat_choice_none' =>				__('No Repeat', 'cmsmasters_content_composer'),
			'row_field_bg_repeat_choice_horiz' =>				__('Repeat Horizontally', 'cmsmasters_content_composer'),
			'row_field_bg_repeat_choice_vert' =>				__('Repeat Vertically', 'cmsmasters_content_composer'),
			'row_field_bg_repeat_choice_repeat' =>				__('Repeat', 'cmsmasters_content_composer'),
			'row_field_bg_attachement_title' =>					__('Background Attachment', 'cmsmasters_content_composer'),
			'row_field_bg_attachement_descr' =>					__('Choose background attachment for this section', 'cmsmasters_content_composer'),
			'row_field_bg_attachement_choice_scroll' =>			__('Scroll', 'cmsmasters_content_composer'),
			'row_field_bg_attachement_choice_fixed' =>			__('Fixed', 'cmsmasters_content_composer'),
			'row_field_bg_size_title' =>						__('Background Size', 'cmsmasters_content_composer'),
			'row_field_bg_size_descr' =>						__('Choose background size for this section', 'cmsmasters_content_composer'),
			'row_field_bg_size_descr_auto' =>					__('image is added in its actual size regardless of the section dimensions', 'cmsmasters_content_composer'),
			'row_field_bg_size_descr_cover' =>					__('image is resized to cover the whole section area', 'cmsmasters_content_composer'),
			'row_field_bg_size_descr_contain' =>				__('image is resized to fit into the section area', 'cmsmasters_content_composer'),
			'row_field_bg_size_choice_auto' =>					__('Auto', 'cmsmasters_content_composer'),
			'row_field_bg_size_choice_cover' =>					__('Cover', 'cmsmasters_content_composer'),
			'row_field_bg_size_choice_contain' =>				__('Contain', 'cmsmasters_content_composer'),
			'row_field_bg_parallax_title' =>					__('Background Parallax', 'cmsmasters_content_composer'),
			'row_field_bg_parallax_descr' =>					__('If checked, background image parallax effect will be enabled', 'cmsmasters_content_composer'),
			'row_field_bg_parallax_ratio_title' =>				__('Background Parallax Ratio', 'cmsmasters_content_composer'),
			'row_field_bg_parallax_ratio_descr' =>				__('Background image reposition step on scroll', 'cmsmasters_content_composer'),
			'row_field_color_overlay_visibility_title' =>		__('Color Overlay Visibility', 'cmsmasters_content_composer'),
			'row_field_color_overlay_visibility_descr' =>		__('If checked, section color overlay will be shown over the section background', 'cmsmasters_content_composer'),
			'row_field_color_overlay_title' =>					__('Color Overlay', 'cmsmasters_content_composer'),
			'row_field_color_overlay_descr' =>					__('Choose color overlay for this section', 'cmsmasters_content_composer'),
			'row_field_overlay_opacity_title' =>				__('Overlay Opacity', 'cmsmasters_content_composer'),
			'row_field_overlay_opacity_descr' =>				__('Choose color overlay opacity for this section', 'cmsmasters_content_composer'),
			'row_field_overlay_opacity_descr_note' =>			__('percentage', 'cmsmasters_content_composer'),
			'row_field_top_padding_title' =>					__('Top Padding', 'cmsmasters_content_composer'),
			'row_field_top_padding_descr' =>					__('Enter section top padding', 'cmsmasters_content_composer'),
			'row_field_bottom_padding_title' =>					__('Bottom Padding', 'cmsmasters_content_composer'),
			'row_field_bottom_padding_descr' =>					__('Enter section bottom padding', 'cmsmasters_content_composer'),
			'row_field_content_width_title' =>					__('Content Width', 'cmsmasters_content_composer'),
			'row_field_content_width_descr' =>					__('Choose content width type for this section', 'cmsmasters_content_composer'),
			'row_field_content_width_choice_boxed' =>			__('Boxed', 'cmsmasters_content_composer'),
			'row_field_content_width_choice_custom' =>			__('Custom', 'cmsmasters_content_composer'),
			'row_field_left_custom_padding_title' =>			__('Left Custom Padding', 'cmsmasters_content_composer'),
			'row_field_left_custom_padding_descr' =>			__('Enter section left padding', 'cmsmasters_content_composer'),
			'size_note_percentage' =>							__('number, percentage (default value if empty)', 'cmsmasters_content_composer'),
			'row_field_right_custom_padding_title' =>			__('Right Custom Padding', 'cmsmasters_content_composer'),
			'row_field_right_custom_padding_descr' =>			__('Enter section right padding', 'cmsmasters_content_composer'),
			'row_field_no_margin_title' =>						__('No Margin', 'cmsmasters_content_composer'),
			'row_field_no_margin_descr' =>						__('Disable margins for this section (use this to stick sections together seamlessly)', 'cmsmasters_content_composer'),
			'row_field_merge_title' =>							__('Merge with the Next Section', 'cmsmasters_content_composer'), 
			'row_field_merge_descr' =>							__('If enabled, values for all the settings that are located below, will be imported from the following section. In this case there is NO NEED to apply settings for this section, they will not take effect.', 'cmsmasters_content_composer'),
			'row_field_merge_descr_note' =>						__('Please make sure to enable this ONLY if both are true: <br />1. Another section is present below current section. <br />2. This option is disabled for the section below.', 'cmsmasters_content_composer'), 
			'row_field_section_id_title' =>						__('Section ID', 'cmsmasters_content_composer'),
			'row_field_section_id_descr' =>						__("Apply a custom 'id' attribute to the section, so that you could apply a unique style via CSS. This option is also helpful if you want to use anchor links (build one-page navigation) to scroll to this section when a link is clicked.", 'cmsmasters_content_composer'),
			'row_field_section_id_descr_note' =>				__("Use this option with caution and make sure: <br />1. That you use only allowed characters (a-z). No special characters can be used. <br />2. Please don't use the following id values: page, main, header, middle, bottom, footer.", 'cmsmasters_content_composer'),
			'row_field_classes_descr' =>						__('You can add additional CSS classes (separated by spaces) to the section, if you wish to style content elements differently', 'cmsmasters_content_composer'),
			
		/* Finish CMSMasters Row Shortcode Translations */
		
					
			'admin_url' => 										admin_url(), 
			'theme_url' => 										get_template_directory_uri(), 
			
		
		
		));
		
		
		wp_register_script('cmsmasters_content_composer_js', CMSMASTERS_CONTENT_COMPOSER_URL . 'js/jquery.cmsmastersContentComposer.js', array('jquery'), CMSMASTERS_CONTENT_COMPOSER_VERSION, true);
		
		wp_localize_script('cmsmasters_content_composer_js', 'cmsmasters_composer', array( 
			'remove_section' => 	__('Remove Section', 'cmsmasters_content_composer'), 
			'clone_section' => 		__('Clone Section', 'cmsmasters_content_composer'), 
			'edit_section' => 		__('Edit Section', 'cmsmasters_content_composer'), 
			'edit_column' => 		__('Edit Column', 'cmsmasters_content_composer'), 
			'add_shortcode' => 		__('Add Shortcode', 'cmsmasters_content_composer'), 
			'remove_shortcode' => 	__('Remove Shortcode', 'cmsmasters_content_composer'), 
			'clone_shortcode' => 	__('Clone Shortcode', 'cmsmasters_content_composer'), 
			'edit_shortcode' => 	__('Edit Shortcode', 'cmsmasters_content_composer'), 
			'delete_all' => 		__("Do you really want delete all content?\nAll data will be lost!", 'cmsmasters_content_composer'), 
			'delete_el' => 			__("Do you really want delete this element?\nAll data from this element will be lost!", 'cmsmasters_content_composer'), 
			'delete_tmpl' => 		__("Do you really want delete this template?\nAll data from this template will be lost!", 'cmsmasters_content_composer'), 
			'invalid_tmpl_name' => 	__("Error! Enter valid template name. Minimum 3 character.\nAllowed characters: letters, numbers, whitespace", 'cmsmasters_content_composer'), 
			'new_tmpl_name' => 		__("Enter the name for new template", 'cmsmasters_content_composer'), 
			'error_on_page' => 		__("Error on page!\nPlease reload page and try again", 'cmsmasters_content_composer') 
		));
		
		
		wp_register_script('cmsmasters_composer_lightbox_js', CMSMASTERS_CONTENT_COMPOSER_URL . 'js/jquery.cmsmastersComposerLightbox.js', array('jquery'), CMSMASTERS_CONTENT_COMPOSER_VERSION, true);
		
		wp_localize_script('cmsmasters_composer_lightbox_js', 'cmsmasters_lightbox', array( 
			'palettes' => 				((function_exists('cmsmasters_color_picker_palettes')) ? implode(',', cmsmasters_color_picker_palettes()) : ''), 
			'cancel' => 				__('Cancel', 'cmsmasters_content_composer'), 
			'update' => 				__('Update', 'cmsmasters_content_composer'), 
			'remove' => 				__('Remove', 'cmsmasters_content_composer'), 
			'deselect' => 				__('Deselect', 'cmsmasters_content_composer'), 
			'add_media' => 				__('Add Media', 'cmsmasters_content_composer'), 
			'shcd_settings' => 			__('Shortcode Settings', 'cmsmasters_content_composer'), 
			'shcd_choose' => 			__('Choose Shortcode', 'cmsmasters_content_composer'), 
			'choose_image' => 			__('Choose Image', 'cmsmasters_content_composer'), 
			'choose_video' => 			__('Choose Video', 'cmsmasters_content_composer'), 
			'choose_audio' => 			__('Choose Audio', 'cmsmasters_content_composer'), 
			'insert_image' => 			__('Insert Image', 'cmsmasters_content_composer'), 
			'insert_video' => 			__('Insert Video', 'cmsmasters_content_composer'), 
			'insert_audio' => 			__('Insert Audio', 'cmsmasters_content_composer'), 
			'create_gallery' => 		__('Create Gallery', 'cmsmasters_content_composer'), 
			'edit_gallery' => 			__('Edit Gallery', 'cmsmasters_content_composer'), 
			'create_edit_gallery' => 	__('Create/Edit Gallery', 'cmsmasters_content_composer'), 
			'insert_gallery' => 		__('Insert Gallery', 'cmsmasters_content_composer'), 
			'choose_icon' => 			__('Choose icon', 'cmsmasters_content_composer'), 
			'add_table_col' => 			__('Add Table Column', 'cmsmasters_content_composer'), 
			'add_table_row' => 			__('Add Table Row', 'cmsmasters_content_composer'), 
			'text_align_left' => 		__('Text Align Left', 'cmsmasters_content_composer'), 
			'text_align_right' => 		__('Text Align Right', 'cmsmasters_content_composer'), 
			'text_align_center' => 		__('Text Align Center', 'cmsmasters_content_composer'), 
			'default_row' => 			__('Default Row', 'cmsmasters_content_composer'), 
			'header_row' => 			__('Header Row', 'cmsmasters_content_composer'), 
			'footer_row' => 			__('Footer Row', 'cmsmasters_content_composer'), 
			'delete_row' => 			__('Delete Row', 'cmsmasters_content_composer'), 
			'delete_col' => 			__('Delete Column', 'cmsmasters_content_composer'), 
			'opacity' => 				__('opacity', 'cmsmasters_content_composer'), 
			'error_on_page' => 			__("Error on page!\nReload page and try again.", 'cmsmasters_content_composer') 
		));
		
		
		wp_register_script('jquery-base64', CMSMASTERS_CONTENT_COMPOSER_URL . 'framework/js/jquery.base64.min.js', array(), CMSMASTERS_CONTENT_COMPOSER_VERSION, true);
		
		
		if ( 
			($hook == 'post.php') || 
			($hook == 'post-new.php') 
		) {
			wp_enqueue_style('cmsmasters_content_composer_css');
			
			wp_enqueue_style('cmsmasters_composer_lightbox_css');
			
			
			if (is_rtl()) {
				wp_enqueue_style('cmsmasters_content_composer_css_rtl');
			
				wp_enqueue_style('cmsmasters_composer_lightbox_css_rtl');
			}
			
			
			wp_enqueue_script('jquery-ui-selectable');
			wp_enqueue_script('jquery-ui-draggable');
			wp_enqueue_script('jquery-ui-droppable');
			wp_enqueue_script('jquery-ui-sortable');
			
			
			wp_enqueue_script('jquery-base64');
		}
		
		
		if ( 
			$hook == 'post-new.php' || 
			($hook == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
		) {
			wp_enqueue_script('cmsmasters_composer_shortcodes_js');
			
			
			wp_enqueue_script('cmsmasters_content_composer_js');
			
			wp_enqueue_script('cmsmasters_composer_lightbox_js');
		}
	}
	
	
	function cmsmasters_composer_init() {
		if (wp_script_is('cmsmasters_content_composer_js', 'queue') && wp_script_is('cmsmasters_composer_lightbox_js', 'queue')) {
			echo "
<script type=\"text/javascript\">
	var cmsmastersContentComposer = jQuery('#cmsmasters_composer_content').cmsmastersContentComposer().data('cmsmastersContentComposer'), 
		cmsmastersComposerLightbox = jQuery('#cmsmasters_composer_content').cmsmastersComposerLightbox().data('cmsmastersComposerLightbox');
</script>
";
		}
	}
	
	
	function add_composer_button() {
		global $post;
		
		
		if (post_type_supports($post->post_type, 'editor')) {
			echo '<a href="#" id="cmsmasters_content_composer_button" class="button button-primary button-large admin-icon-composer" data-editor="' . __('Default Editor', 'cmsmasters_content_composer') . '" data-composer="' . __('Content Composer', 'cmsmasters_content_composer') . '">' . __('Content Composer', 'cmsmasters_content_composer') . '</a>';
		}
	}
	
	
	function show_cmsmasters_composer_meta_box() {
		global $post;
		
		
		$admin_post_object = $post;
		
		
		$composer_show = get_post_meta($post->ID, 'cmsmasters_composer_show', true);
		$composer_fullscreen = get_post_meta($post->ID, 'cmsmasters_composer_fullscreen', true);
		$composer_begin = get_post_meta($post->ID, 'cmsmasters_composer_begin', true);
		$composer_confirm = get_post_meta($post->ID, 'cmsmasters_composer_confirm', true);
		
		
		$option_query = new WP_Query(array( 
			'orderby' => 'name', 
			'order' => 'ASC', 
			'post_type' => 'content_template', 
			'posts_per_page' => -1 
		));
		
		
		echo '<input type="hidden" name="custom_composer_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />' . 
		'<div class="cmsmasters_composer_container">' . 
			'<div class="cmsmasters_composer_buttons_container">' . 
				'<div class="cmsmasters_composer_buttons_container_wrap"></div>' . 
				'<div class="cmsmasters_composer_templates_container_wrap">' . 
					'<a href="#" class="cmsmasters_composer_fullscreen admin-icon-fullscreen" title="' . __('Expand Content Composer', 'cmsmasters_content_composer') . '"></a>' . 
					'<a href="#" class="cmsmasters_clear_content admin-icon-clear" title="' . __('Clear Composer Content', 'cmsmasters_content_composer') . '"></a>' . 
					'<a href="#" class="button cmsmasters_preview_trigger">' . __('Preview Changes', 'cmsmasters_content_composer') . '</a>' . 
					'<a href="#" class="button button-primary cmsmasters_update_trigger">' . __('Update', 'cmsmasters_content_composer') . '</a>' . 
					'<label for="cmsmasters_composer_begin" class="cmsmasters_composer_begin">' . 
						'<input type="checkbox" id="cmsmasters_composer_begin" name="cmsmasters_composer_begin" value="true"' . (($composer_begin === 'true') ? ' checked="checked"' : '') . ' />' . 
						__('Add elements to the top', 'cmsmasters_content_composer') . 
					'</label>' . 
					'<label for="cmsmasters_composer_confirm" class="cmsmasters_composer_confirm">' . 
						'<input type="checkbox" id="cmsmasters_composer_confirm" name="cmsmasters_composer_confirm" value="true"' . (($composer_confirm === 'true') ? ' checked="checked"' : '') . ' />' . 
						__("Don't confirm element deleting!", 'cmsmasters_content_composer') . 
					'</label>' . 
					'<div class="cmsmasters_pattern_list">' . 
					'<a class="cmsmasters_pattern_list_button button admin-icon-paste">' . __('Templates', 'cmsmasters_content_composer') . '</a>' . 
						'<ul>' . 
							'<li>' . 
								'<a href="#" class="button button-primary button-large cmsmasters_pattern_save_all">' . __('Save All as Template', 'cmsmasters_content_composer') . '</a>' . 
								'<span>' . __('Choose Template:', 'cmsmasters_content_composer') . '</span>' . 
							'</li>';
					
					
					if ($option_query->have_posts()) : 
						while ($option_query->have_posts() ) : $option_query->the_post();
							echo '<li>' . 
								'<a href="#" class="cmsmasters_pattern_paste" title="' . __('Load Selected Template', 'cmsmasters_content_composer') . '" data-id="' . get_the_ID() . '">' . get_the_title() . '</a>' . 
								'<a href="#" class="cmsmasters_pattern_delete admin-icon-delete" title="' . __('Delete Selected Template', 'cmsmasters_content_composer') . '" data-id="' . get_the_ID() . '"></a>' . 
							'</li>';
						endwhile;
					endif;
					
					
					echo '</ul>' . 
					'</div>' . 
					'<a href="#" class="cmsmasters_pattern_save admin-icon-save" title="' . __('Add New Template', 'cmsmasters_content_composer') . '"></a>' . 
				'</div>' . 
			'</div>' . 
			'<div id="cmsmasters_composer_content" class="cmsmasters_composer_content deactivated"></div>' . 
			'<input type="hidden" id="cmsmasters_composer_show" name="cmsmasters_composer_show" value="' . (($composer_show === 'true') ? 'true' : 'false') . '" />' . 
			'<input type="hidden" id="cmsmasters_composer_fullscreen" name="cmsmasters_composer_fullscreen" value="' . (($composer_fullscreen === 'true') ? 'true' : 'false') . '" />' . 
			'<div id="cmsmasters_composer_message_saved_all" class="cmsmasters_message updated">' . 
				'<p>' . __('All content was saved as template successfully.', 'cmsmasters_content_composer') . '</p>' . 
			'</div>' . 
			'<div id="cmsmasters_composer_message_saved" class="cmsmasters_message updated">' . 
				'<p>' . __('Selected sections was saved as template successfully.', 'cmsmasters_content_composer') . '</p>' . 
			'</div>' . 
			'<div id="cmsmasters_composer_message_added" class="cmsmasters_message updated">' . 
				'<p>' . __('Template was loaded to composer successfully.', 'cmsmasters_content_composer') . '</p>' . 
			'</div>' . 
			'<div id="cmsmasters_composer_message_deleted" class="cmsmasters_message error">' . 
				'<p>' . __('Template was deleted successfully.', 'cmsmasters_content_composer') . '</p>' . 
			'</div>' . 
			'<input type="hidden" id="cmsmasters_composer_url" name="cmsmasters_composer_url" value="' . CMSMASTERS_CONTENT_COMPOSER_URL . 'framework/inc/cmsmasters-composer-templates-operator.php" />' . 
		'</div>';
		
		
		wp_reset_query();
		
		
		$post = $admin_post_object;
	}
	
	
	function add_custom_composer_meta_box() {
		add_meta_box( 
			'cmsmasters_composer_meta_box', 
			__('Visual Content Composer', 'cmsmasters_content_composer'), 
			array($this, 'show_cmsmasters_composer_meta_box'), 
			'', 
			'normal', 
			'high' 
		);
	}
	
	
	function save_custom_composer_meta($post_id) {
		if ( 
			!isset($_POST['custom_composer_meta_box_nonce']) || 
			!wp_verify_nonce($_POST['custom_composer_meta_box_nonce'], basename(__FILE__)) 
		) {
			return $post_id;
		}
		
		
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
			return $post_id;
		}
		
		
		if ($_POST['post_type'] == 'page') {
			if (!current_user_can('edit_page', $post_id)) {
				return $post_id;
			}
		} elseif (!current_user_can('edit_post', $post_id)) {
			return $post_id;
		}
		
		
		$composer_meta_fields = array( 
			'cmsmasters_composer_show', 
			'cmsmasters_composer_fullscreen', 
			'cmsmasters_composer_begin', 
			'cmsmasters_composer_confirm' 
		);
		
		
		foreach ($composer_meta_fields as $field) {
			$old = get_post_meta($post_id, $field, true);
			
			
			if (isset($_POST[$field])) {
				$new = $_POST[$field];
			} else {
				$new = '';
			}
			
			
			if (isset($new) && $new !== $old) {
				update_post_meta($post_id, $field, $new);
			} elseif (isset($old) && $new === '') {
				delete_post_meta($post_id, $field, $old);
			}
		}
	}
	
	
	function cmsmasters_content_composer_widgets_init() {
		if (!is_blog_installed()) {
			return;
		}
		
		
		if (class_exists('WP_Widget_Custom_Latest_Projects')) {
			register_widget('WP_Widget_Custom_Latest_Projects');
		}
		
		
		if (class_exists('WP_Widget_Custom_Popular_Projects')) {
			register_widget('WP_Widget_Custom_Popular_Projects');
		}
	}
	
	
	function cmsmasters_content_composer_activate_deactivate() {
		flush_rewrite_rules();
	}
}


new Cmsmasters_Content_Composer();

