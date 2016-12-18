<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.0
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


function cmsmasters_theme_fonts() {
	$cmsmasters_option = cmsmasters_get_global_options();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.0
 * 
 * Theme Fonts Rules
 * Created by CMSMasters
 * 
 */


/***************** Start Theme Font Styles ******************/

	/* Start Content Font */
	body, 
	.cmsmasters_open_project .cmsmasters_project_likes a span, 
	.cmsmasters_open_project .cmsmasters_project_comments a span, 
	.cmsmasters_open_profile .cmsmasters_profile_likes a span, 
	.cmsmasters_open_profile .cmsmasters_profile_comments a span {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_font_style'] . ";
	}
	
	.header_top, 
	.header_top a {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_font_size'] - 3) . "px;
	}
	
	.footer_copyright {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_font_size'] - 2) . "px;
		text-transform:uppercase;
	}
	/* Finish Content Font */


	/* Start Link Font */
	a {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_link_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_link_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_link_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_link_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_link_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_link_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_link_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_link_font_text_decoration'] . ";
	}
	
	a:hover {
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_link_hover_decoration'] . ";
	}
	/* Finish Link Font */


	/* Start Navigation Title Font */
	.navigation > li > a, 
	.top_line_nav > li > a, 
	.footer_nav > li > a {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_title_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_title_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_title_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_title_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_title_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_title_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_title_font_text_transform'] . ";
	}
	
	.top_line_nav > li > a, 
	.cmsmasters_footer_small .footer_nav > li > a {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_title_font_font_size'] - 3) . "px;
	}
	
	.navigation > li > a .nav_subtitle {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_title_font_font_size'] - 4) . "px;
		font-weight:600;
		text-transform:uppercase;
	}
	
	.navigation > li > a .nav_tag {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_title_font_font_size'] - 5) . "px;
		line-height:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_title_font_font_size'] - 2) . "px;
		font-weight:700;
		text-transform:uppercase;
	}
	/* Finish Navigation Title Font */


	/* Start Navigation Dropdown Font */
	.navigation ul li a,
	.top_line_nav ul li a {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_dropdown_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_dropdown_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_dropdown_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_dropdown_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_dropdown_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_dropdown_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_dropdown_font_text_transform'] . ";
	}
	
	.top_line_nav ul li a {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_dropdown_font_font_size'] - 3) . "px;
	}
	
	.navigation ul li a .nav_tag {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_dropdown_font_font_size'] - 3) . "px;
		line-height:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_dropdown_font_font_size'] - 2) . "px;
		font-weight:700;
		text-transform:uppercase;
	}
	
	@media only screen and (min-width: 1025px) {
		.navigation .menu-item-mega-container > ul > li > a .nav_title {
			font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_nav_dropdown_font_font_size'] + 3) . "px;
			font-weight:600;
			text-transform:uppercase;
			vertical-align:bottom;
		}
	}
	/* Finish Navigation Dropdown Font */


	/* Start H1 Font */
	h1,
	h1 a,
	.logo .title, 
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap, 
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap, 
	.cmsmasters_pricing_table .cmsmasters_price_wrap {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_text_decoration'] . ";
	}
	
	.cmsmasters_dropcap {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_system_font'] . ";
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_text_decoration'] . ";
	}
	
	.cmsmasters_icon_list_items.cmsmasters_icon_list_icon_type_number .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before,
	.cmsmasters_icon_box.box_icon_type_number:before,
	.cmsmasters_icon_box.cmsmasters_icon_heading_left.box_icon_type_number .icon_box_heading:before {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_system_font'] . ";
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_font_style'] . ";
	}
	
	.cmsmasters_dropcap.type1 {
		font-size:36px; /* static */
	}
	
	.cmsmasters_dropcap.type2 {
		font-size:20px; /* static */
	}
	
	.headline_outer .headline_inner .headline_icon:before {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_font_size'] + 5) . "px;
	}
	
	.headline_outer .headline_inner.align_center .headline_icon:before {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_line_height'] + 15) . "px;
	}
	
	.headline_outer .headline_inner.align_left .headline_icon {
		padding-left:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_font_size'] + 5) . "px;
	}
	
	.headline_outer .headline_inner.align_right .headline_icon {
		padding-right:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_font_size'] + 5) . "px;
	}
	
	.headline_outer .headline_inner.align_center .headline_icon {
		padding-top:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_line_height'] + 15) . "px;
	}
	/* Finish H1 Font */


	/* Start H2 Font */
	h2,
	h2 a,
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a, 
	.comment-respond .comment-reply-title {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_text_decoration'] . ";
	}
	/* Finish H2 Font */


	/* Start H3 Font */
	h3,
	h3 a, 
	.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat_title, 
	.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_title, 
	.cmsmasters_table tr.cmsmasters_table_row_header > td, 
	.cmsmasters_table tr.cmsmasters_table_row_header > th, 
	.cmsmasters_table tr.cmsmasters_table_row_footer > td, 
	.cmsmasters_table tr.cmsmasters_table_row_footer > th {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_text_decoration'] . ";
	}
	/* Finish H3 Font */


	/* Start H4 Font */
	h4, 
	h4 a, 
	.cmsmasters_stats .cmsmasters_stat_wrap .cmsmasters_stat_title, 
	.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a, 
	.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a, 
	.post_nav > span a, 
	.cmsmasters_table caption, 
	.cmsmasters_clients_item span, 
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_list_item, 
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_list_item a {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_text_decoration'] . ";
	}
	
	.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat {
		padding-top:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_line_height'] * 2 + 13) . "px;
	}
	
	.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat_container {
		height:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_line_height'] * 2 + 220 + 13) . "px;
	}
	
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_list_item, 
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_list_item a {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_font_size'] - 2) . "px;
		line-height:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_line_height'] - 2) . "px;
	}
	
	.about_author .about_author_cont_title, 
	.about_author .about_author_cont_title a, 
	.cmsmasters_comment_item .cmsmasters_comment_item_title, 
	.cmsmasters_comment_item .cmsmasters_comment_item_title a {
		text-transform:none;
	}
	/* Finish H4 Font */


	/* Start H5 Font */
	h5,
	h5 a, 
	.share_posts a, 
	.cmsmasters_comment_item .cmsmasters_comment_item_cont_info > a, 
	.comment-respond .comment-reply-title a, 
	.cmsmasters_post_default .cmsmasters_post_read_more, 
	.cmsmasters_post_masonry .cmsmasters_post_read_more, 
	.cmsmasters_post_timeline .cmsmasters_post_read_more, 
	.cmsmasters_open_project .project_details_item_title, 
	.cmsmasters_open_project .project_features_item_title, 
	.cmsmasters_open_project .project_details_item_desc > a, 
	.cmsmasters_open_project .project_features_item_desc > a, 
	.cmsmasters_open_project .cmsmasters_project_category, 
	.cmsmasters_open_project .cmsmasters_project_category a, 
	.cmsmasters_open_project .cmsmasters_project_tags, 
	.cmsmasters_open_project .cmsmasters_project_tags a, 
	.cmsmasters_slider_post .cmsmasters_slider_post_read_more, 
	.cmsmasters_open_profile .profile_details_item_title, 
	.cmsmasters_open_profile .profile_features_item_title, 
	.cmsmasters_open_profile .profile_details_item_desc > a, 
	.cmsmasters_open_profile .profile_features_item_desc > a, 
	.cmsmasters_open_profile .cmsmasters_profile_category, 
	.cmsmasters_open_profile .cmsmasters_profile_category a, 
	.cmsmasters_toggles .cmsmasters_toggles_filter, 
	.cmsmasters_toggles .cmsmasters_toggles_filter a, 
	.cmsmasters_toggles .cmsmasters_toggle_title a, 
	.cmsmasters_tabs .cmsmasters_tabs_list_item a, 
	.cmsmasters_pricing_table .cmsmasters_period, 
	.widget_pages ul li, 
	.widget_pages ul li a, 
	.widget_categories ul li, 
	.widget_categories ul li a, 
	.widget_archive ul li, 
	.widget_archive ul li a, 
	.widget_meta ul li, 
	.widget_meta ul li a, 
	.widget_recent_comments ul li, 
	.widget_recent_comments ul li a, 
	.widget_recent_entries ul li, 
	.widget_recent_entries ul li a, 
	#wp-calendar caption, 
	#wp-calendar thead th, 
	.widget_nav_menu ul li a {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_text_decoration'] . ";
	}
	
	.cmsmasters_open_profile .cmsmasters_profile_header .cmsmasters_profile_subtitle {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_font_size'] + 4) . "px;
	}
	
	.cmsmasters_toggles .cmsmasters_toggle_title a, 
	.cmsmasters_tabs .cmsmasters_tabs_list_item a, 
	.cmsmasters_quotes_slider .cmsmasters_quote_subtitle, 
	.cmsmasters_quotes_grid .cmsmasters_quote_subtitle, 
	.cmsmasters_pricing_table .cmsmasters_period {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_line_height'] + 2) . "px;
	}
	/* Finish H5 Font */


	/* Start H6 Font */
	h6,
	h6 a, 
	.cmsmasters_comment_item .cmsmasters_comment_item_date, 
	.headline_outer, 
	.headline_outer a, 
	.cmsmasters_wrap_pagination ul li .page-numbers, 
	.cmsmasters_post_default .cmsmasters_post_cont_info, 
	.cmsmasters_post_default .cmsmasters_post_cont_info a, 
	.cmsmasters_post_masonry .cmsmasters_post_date, 
	.cmsmasters_post_masonry .cmsmasters_post_cont_info, 
	.cmsmasters_post_masonry .cmsmasters_post_cont_info a, 
	.cmsmasters_post_timeline .cmsmasters_post_cont_info, 
	.cmsmasters_post_timeline .cmsmasters_post_cont_info a, 
	.cmsmasters_open_post .cmsmasters_post_date, 
	.cmsmasters_open_post .cmsmasters_post_cont_info, 
	.cmsmasters_open_post .cmsmasters_post_cont_info a, 
	.cmsmasters_open_post .cmsmasters_post_tags, 
	.cmsmasters_open_post .cmsmasters_post_tags a, 
	.cmsmasters_project_grid .cmsmasters_project_cont_info, 
	.cmsmasters_project_grid .cmsmasters_project_cont_info a, 
	.cmsmasters_project_puzzle .cmsmasters_project_cont_info, 
	.cmsmasters_project_puzzle .cmsmasters_project_cont_info a, 
	.cmsmasters_slider_post .cmsmasters_slider_post_date, 
	.cmsmasters_slider_post .cmsmasters_slider_post_cont_info, 
	.cmsmasters_slider_post .cmsmasters_slider_post_cont_info a, 
	.cmsmasters_slider_project .cmsmasters_slider_project_cont_info, 
	.cmsmasters_slider_project .cmsmasters_slider_project_cont_info a, 
	.cmsmasters_quotes_slider .cmsmasters_quote_site, 
	.cmsmasters_quotes_slider .cmsmasters_quote_site a, 
	.cmsmasters_quotes_grid .cmsmasters_quote_site, 
	.cmsmasters_quotes_grid .cmsmasters_quote_site a, 
	.cmsmasters_twitter_wrap .published, 
	.widget_custom_contact_info_entries > span, 
	.widget_custom_contact_info_entries > span a, 
	.widget_custom_contact_info_entries .adress_wrap, 
	.widget_custom_contact_info_entries .adress_wrap a, 
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > a, 
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > .published, 
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li > a, 
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li > span, 
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li .published, 
	.widget_rss ul li .rsswidget, 
	.widget_rss ul li .rss-date, 
	.widget_custom_twitter_entries .tweet_time, 
	.cmsmasters_archive_type .cmsmasters_archive_item_user_name, 
	.cmsmasters_archive_type .cmsmasters_archive_item_user_name a, 
	.cmsmasters_archive_type .cmsmasters_archive_item_category, 
	.cmsmasters_archive_type .cmsmasters_archive_item_category a, 
	.cmsmasters_archive_type .cmsmasters_archive_item_date_wrap {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_text_decoration'] . ";
	}
	
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > a, 
	.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li > a, 
	.widget_rss ul li .rsswidget {
		text-transform:uppercase;
	}
	/* Finish H6 Font */


	/* Start Button Font */
	.cmsmasters_button, 
	.button, 
	input[type=submit], 
	input[type=button], 
	button, 
	.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li, 
	.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_button_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_button_font_text_transform'] . ";
	}
	
	.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li, 
	.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a {
		text-transform:none;
	}
	
	.gform_wrapper .gform_footer input.button, 
	.gform_wrapper .gform_footer input[type=submit] {
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_button_font_font_size'] . "px !important;
	}
	
	.cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg, 
	.cmsmasters_button.cmsmasters_but_icon_divider, 
	.cmsmasters_button.cmsmasters_but_icon_inverse {
		padding-left:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_button_font_line_height'] + 20) . "px;
	}
	
	.cmsmasters_button.cmsmasters_but_icon_dark_bg:before, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg:before, 
	.cmsmasters_button.cmsmasters_but_icon_divider:before, 
	.cmsmasters_button.cmsmasters_but_icon_inverse:before, 
	.cmsmasters_button.cmsmasters_but_icon_dark_bg:after, 
	.cmsmasters_button.cmsmasters_but_icon_light_bg:after, 
	.cmsmasters_button.cmsmasters_but_icon_divider:after, 
	.cmsmasters_button.cmsmasters_but_icon_inverse:after {
		width:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_button_font_line_height'] . "px;
	}
	/* Finish Button Font */


	/* Start Small Text Font */
	small
	form .formError .formErrorContent {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_small_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_small_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_small_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_small_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_small_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_small_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_small_font_text_transform'] . ";
	}
	
	.gform_wrapper .description, 
	.gform_wrapper .gfield_description, 
	.gform_wrapper .gsection_description, 
	.gform_wrapper .instruction {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_small_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_small_font_system_font'] . " !important;
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_small_font_font_size'] . "px !important;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_small_font_line_height'] . "px !important;
	}
	/* Finish Small Text Font */


	/* Start Text Fields Font */
	input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	textarea,
	select,
	option,
	code {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_input_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_input_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_input_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_input_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_input_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_input_font_font_style'] . ";
	}
	
	.header_mid .search_wrap .search_bar_wrap .search_field input {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_input_font_font_size'] - 2) . "px;
	}
	
	.gform_wrapper input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.gform_wrapper textarea, 
	.gform_wrapper select {
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_input_font_font_size'] . "px !important;
	}
	/* Finish Text Fields Font */


	/* Start Blockquote Font */
	blockquote {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_quote_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_quote_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_quote_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_quote_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_quote_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_quote_font_font_style'] . ";
	}
	
	q {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_quote_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_quote_font_system_font'] . ";
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_quote_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_quote_font_font_style'] . ";
	}
	/* Finish Blockquote Font */

/***************** Finish Theme Font Styles ******************/


";


if (CMSMASTERS_DONATIONS) {

	$custom_css .= "
/***************** Start CMSMASTERS Donations Font Styles ******************/

	/* Start Content Font */
	/* Finish Content Font */
	
	
	/* Start Link Font */
	/* Finish Link Font */
	
	
	/* Start Navigation Title Font */
	/* Finish Navigation Title Font */
	
	
	/* Start H1 Font */
	/* Finish H1 Font */
	
	
	/* Start H2 Font */
	/* Finish H2 Font */
	
	
	/* Start H3 Font */
	/* Finish H3 Font */
	
	
	/* Start H4 Font */
	/* Finish H4 Font */
	
	
	/* Start H5 Font */
	/* Finish H5 Font */
	
	
	/* Start H6 Font */
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	/* Finish Button Font */
	
	
	/* Start Small Text Font */
	/* Finish Small Text Font */

/***************** Finish CMSMASTERS Donations Font Styles ******************/


";

}


if (CMSMASTERS_WOOCOMMERCE) {

	$custom_css .= "
/***************** Start WooCommerce Font Styles ******************/

	/* Start Content Font */
	.shop_table.woocommerce-checkout-review-order-table .product-name dl, 
	.shop_table.order_details .product-name dl {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_font_style'] . ";
	}
	
	.shop_table.woocommerce-checkout-review-order-table .product-name dl, 
	.shop_table.order_details .product-name dl {
		text-transform:none;
	}
	/* Finish Content Font */
	
	
	/* Start Link Font */
	/* Finish Link Font */
	
	
	/* Start H1 Font */
	/* Finish H1 Font */
	
	
	/* Start H2 Font */
	.cmsmasters_single_product .price {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_text_decoration'] . ";
	}
	/* Finish H2 Font */
	
	
	/* Start H3 Font */
	.shop_table thead th, 
	.shop_table.woocommerce-checkout-review-order-table .order-total th, 
	.shop_table.woocommerce-checkout-review-order-table .order-total td, 
	.shop_table.order_details tfoot tr:last-child th, 
	.shop_table.order_details tfoot tr:last-child td, 
	.shop_table td > .amount, 
	.shop_table td strong > .amount, 
	.cart_totals table th, 
	.cart_totals table .cart-subtotal .amount, 
	.cart_totals table .order-total .amount, 
	ul.order_details {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_text_decoration'] . ";
	}
	/* Finish H3 Font */
	
	
	/* Start H4 Font */
	.cmsmasters_product .price, 
	.shop_table .product-name a, 
	.shop_table.woocommerce-checkout-review-order-table .product-name, 
	.shop_table.woocommerce-checkout-review-order-table .cart-subtotal th, 
	.shop_table.order_details tfoot tr th {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_text_decoration'] . ";
	}
	/* Finish H4 Font */
	
	
	/* Start H5 Font */
	.cmsmasters_woo_wrap_result .woocommerce-result-count, 
	.shop_attributes th, 
	.shipping-calculator-button, 
	.shop_table.woocommerce-checkout-review-order-table .shipping th, 
	.shop_table.order_details tfoot tr td, 
	ul.order_details strong, 
	.widget_layered_nav ul li, 
	.widget_layered_nav ul li a, 
	.widget_layered_nav_filters ul li, 
	.widget_layered_nav_filters ul li a, 
	.widget_product_categories ul li, 
	.widget_product_categories ul li a, 
	.widget > .product_list_widget .amount, 
	.widget_shopping_cart .cart_list .quantity, 
	.widget_shopping_cart .total, 
	.widget_shopping_cart .total strong, 
	.widget_price_filter .price_slider_amount .price_label, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list .quantity, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .total, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .total strong {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_text_decoration'] . ";
	}
	
	.shipping-calculator-button, 
	.shop_table.woocommerce-checkout-review-order-table .shipping th, 
	.shop_table.order_details tfoot tr td, 
	ul.order_details strong, 
	.widget_shopping_cart .total, 
	.widget_shopping_cart .total strong, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .total, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .total strong {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_line_height'] + 2) . "px;
	}
	/* Finish H5 Font */
	
	
	/* Start H6 Font */
	.onsale, 
	.out-of-stock, 
	.stock, 
	.cmsmasters_product .cmsmasters_product_cat, 
	.cmsmasters_product .cmsmasters_product_cat a, 
	.cmsmasters_single_product .product_meta, 
	.cmsmasters_single_product .product_meta a, 
	.widget > .product_list_widget a, 
	.widget_shopping_cart .cart_list a, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list a {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_text_decoration'] . ";
	}
	
	.onsale, 
	.out-of-stock, 
	.stock {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_font_size'] + 1) . "px;
		line-height:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_line_height'] - 2) . "px;
		text-transform:uppercase;
	}
	
	.widget > .product_list_widget a, 
	.widget_shopping_cart .cart_list a, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list a {
		text-transform:uppercase;
	}
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	/* Finish Button Font */
	
	
	/* Start Small Text Font */
	/* Finish Small Text Font */

/***************** Finish WooCommerce Font Styles ******************/


";

}


if (CMSMASTERS_EVENTS_CALENDAR) {

	$custom_css .= "
/***************** Start Events Font Styles ******************/

	/* Start Content Font */
	table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-], 
	table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] a, 
	.tribe-mini-calendar tbody, 
	.tribe-mini-calendar tbody a, 
	.widget .vcalendar .cmsmasters_widget_event_info, 
	.widget .vcalendar .cmsmasters_widget_event_info a, 
	.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info, 
	.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info a, 
	.tribe-events-countdown-widget .tribe-countdown-time span, 
	.tribe-this-week-events-widget .tribe-events-page-title, 
	.tribe-this-week-events-widget .tribe-this-week-widget-header-date {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_font_style'] . ";
	}
	
	table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-], 
	table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] a, 
	.widget .vcalendar .cmsmasters_widget_event_info, 
	.widget .vcalendar .cmsmasters_widget_event_info a, 
	.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info, 
	.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info a, 
	.tribe-this-week-events-widget .tribe-this-week-widget-header-date, 
	.tribe-this-week-events-widget .tribe-this-week-event .duration, 
	.tribe-this-week-events-widget .tribe-this-week-event .tribe-venue {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_font_size'] - 1) . "px;
	}
	
	.tribe-events-tooltip .duration, 
	.tribe-mini-calendar tbody, 
	.tribe-mini-calendar tbody a {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_font_size'] - 2) . "px;
	}
	
	.tribe-events-grid .column.first, 
	.tribe-events-grid .tribe-week-grid-hours {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_content_font_font_size'] - 4) . "px;
	}
	
	.tribe-mini-calendar tbody a {
		font-weight:bold;
	}
	
	.tribe-this-week-events-widget .tribe-events-page-title {
		text-transform:none;
	}
	/* Finish Content Font */
	
	
	/* Start Link Font */
	/* Finish Link Font */
	
	
	/* Start H1 Font */
	.tribe-events-countdown-widget .tribe-countdown-time {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h1_font_text_decoration'] . ";
	}
	/* Finish H1 Font */
	
	
	/* Start H2 Font */
	.tribe-events-page-title, 
	.tribe-events-list .tribe-events-list-separator-month, 
	.tribe-events-list .tribe-events-day-time-slot > h5, 
	.tribe-mobile-day .tribe-mobile-day-date {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_text_decoration'] . ";
	}
	
	.tribe-events-page-title {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_font_size'] + 6) . "px;
		line-height:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h2_font_line_height'] + 6) . "px;
	}
	/* Finish H2 Font */
	
	
	/* Start H3 Font */
	.tribe-events-sub-nav li a, 
	table.tribe-events-calendar thead th, 
	.tribe-events-list .tribe-events-event-cost, 
	.tribe-events-grid .tribe-grid-header span {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h3_font_text_decoration'] . ";
	}
	
	table.tribe-events-calendar thead th, 
	.tribe-events-list .tribe-events-event-cost, 
	.tribe-events-grid .tribe-grid-header span {
		text-transform:none;
	}
	/* Finish H3 Font */
	
	
	/* Start H4 Font */
	.tribe-mini-calendar [id*=tribe-mini-calendar-month], 
	.tribe-events-venue-widget .tribe-venue-widget-venue-name a, 
	.tribe-events-countdown-widget .tribe-countdown-text, 
	.tribe-events-countdown-widget .tribe-countdown-text a {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h4_font_text_decoration'] . ";
	}
	/* Finish H4 Font */
	
	
	/* Start H5 Font */
	.tribe-bar-filters-inner > div label, 
	table.tribe-events-calendar tbody td .tribe-events-month-event-title, 
	table.tribe-events-calendar tbody td .tribe-events-month-event-title a, 
	#tribe-events-content > .tribe-events-button, 
	.tribe-events-list .tribe-events-read-more, 
	.cmsmasters_single_event .tribe-events-cost, 
	.cmsmasters_single_event .cmsmasters_single_event_header_right a, 
	.cmsmasters_single_event_meta .cmsmasters_event_meta_info_item_title, 
	.cmsmasters_single_event_meta .cmsmasters_event_meta_info_item_descr a, 
	.cmsmasters_single_event_meta dt, 
	.cmsmasters_single_event_meta dd a, 
	.tribe-events-venue .cmsmasters_events_venue_header_right a, 
	.tribe-events-organizer .cmsmasters_events_organizer_header_right a, 
	.tribe-events-widget-link a, 
	.tribe-mobile-day .tribe-events-read-more, 
	.tribe-this-week-events-widget .tribe-events-viewmore a {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_text_decoration'] . ";
	}
	
	table.tribe-events-calendar tbody td .tribe-events-month-event-title, 
	table.tribe-events-calendar tbody td .tribe-events-month-event-title a {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_font_size'] - 1) . "px;
	}
	
	.cmsmasters_single_event .tribe-events-cost {
		font-size:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_font_size'] + 2) . "px;
		line-height:" . ((int) $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h5_font_line_height'] + 2) . "px;
	}
	
	
	.tribe-this-week-events-widget .tribe-this-week-event .entry-title, 
	.tribe-this-week-events-widget .tribe-this-week-event .entry-title a {
		text-transform:uppercase;
	}
	/* Finish H5 Font */
	
	
	/* Start H6 Font */
	.tribe-events-list .tribe-events-event-meta, 
	.tribe-events-list .tribe-events-event-meta a, 
	.tribe-events-photo .tribe-events-event-meta, 
	.tribe-events-photo .tribe-events-event-meta a, 
	.cmsmasters_single_event .tribe-events-schedule, 
	.cmsmasters_single_event .tribe-events-schedule a, 
	.tribe-events-venue .tribe-events-event-meta, 
	.tribe-events-venue .tribe-events-event-meta a, 
	.tribe-events-organizer .tribe-events-event-meta, 
	.tribe-events-organizer .tribe-events-event-meta a, 
	.tribe-mini-calendar thead th, 
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .entry-title, 
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .entry-title a, 
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info, 
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info a, 
	.tribe-events-venue-widget .vcalendar .entry-title, 
	.tribe-events-venue-widget .vcalendar .entry-title a, 
	.tribe-events-venue-widget .vcalendar .cmsmasters_widget_event_info, 
	.tribe-events-venue-widget .vcalendar .cmsmasters_widget_event_info a, 
	.tribe-mobile-day .tribe-events-event-schedule-details, 
	.tribe-mobile-day .tribe-event-schedule-details {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_text_transform'] . ";
		text-decoration:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_h6_font_text_decoration'] . ";
	}
	
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .entry-title, 
	.tribe_mini_calendar_widget .tribe-mini-calendar-list-wrapper .entry-title a, 
	.tribe-events-venue-widget .vcalendar .entry-title, 
	.tribe-events-venue-widget .vcalendar .entry-title a {
		text-transform:uppercase;
	}
	/* Finish H6 Font */
	
	
	/* Start Button Font */
	#tribe-bar-views .tribe-bar-views-list li, 
	#tribe-bar-views .tribe-bar-views-list li a {
		font-family:" . cmsmasters_get_google_font($cmsmasters_option[CMSMASTERS_SHORTNAME . '_button_font_google_font']) . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_button_font_system_font'] . ";
		font-size:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_button_font_font_size'] . "px;
		line-height:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_button_font_line_height'] . "px;
		font-weight:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_button_font_font_weight'] . ";
		font-style:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_button_font_font_style'] . ";
		text-transform:" . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_button_font_text_transform'] . ";
	}
	
	#tribe-bar-views .tribe-bar-views-list li, 
	#tribe-bar-views .tribe-bar-views-list li a {
		text-transform:none;
	}
	/* Finish Button Font */
	
	
	/* Start Small Text Font */
	/* Finish Small Text Font */

/***************** Finish Events Font Styles ******************/


";

}
	
	return $custom_css;
}

