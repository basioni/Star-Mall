<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.1
 * 
 * Theme Primary Color Schemes Rules
 * Created by CMSMasters
 * 
 */


function cmsmasters_theme_colors_primary() {
	$cmsmasters_option = cmsmasters_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.1
 * 
 * Theme Primary Color Schemes Rules
 * Created by CMSMasters
 * 
 */

";
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		$custom_css .= "
/***************** Start {$title} Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	" . (($scheme == 'default') ? "body," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme}," : '') . "
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	{$rule}textarea,
	{$rule}select,
	{$rule}option, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li.current a, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li.current a:hover, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggles_filter a.current_filter, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggles_filter a.current_filter:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_color']) . "
	}
	
	{$rule}input::-webkit-input-placeholder {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_color']) . "
	}
	
	{$rule}input:-moz-placeholder {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}a,
	{$rule}h1 a:hover,
	{$rule}h2 a:hover,
	{$rule}h3 a:hover,
	{$rule}h4 a:hover,
	{$rule}h5 a:hover,
	{$rule}h6 a:hover,
	{$rule}.color_2,
	{$rule}.cmsmasters_dropcap.type1,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_heading_left .icon_box_heading:before,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon:before,
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner:before, 
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner:before, 
	{$rule}.bypostauthor > .comment-body .alignleft:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a:hover,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a:hover,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a:hover,
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_edit a, 
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_meta a, 
	{$rule}.cmsmasters_prev_arrow:hover,
	{$rule}.cmsmasters_next_arrow:hover, 
	{$rule}.post_nav > span a:hover + span, 
	{$rule}.share_posts a:hover, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a:hover, 
	{$rule}.cmsmasters_wrap_pagination ul li a.page-numbers:hover, 
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers.current, 
	{$rule}.cmsmasters_notice .notice_close:hover, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggles_filter a:hover, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_title:hover a, 
	{$rule}.cmsmasters_toggles .current_toggle .cmsmasters_toggle_title a, 
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list_item:hover a, 
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list_item.current_tab a, 
	{$rule}.cmsmasters_quotes_slider .cmsmasters_quote_site, 
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quote_site, 
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quotes_list:after, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_price_wrap, 
	{$rule}.cmsmasters_pricing_table .feature_list li .feature_icon:before, 
	{$rule}.cmsmasters_twitter_wrap .twr_icon, 
	{$rule}.widget_pages ul li a:hover, 
	{$rule}.widget_pages ul li.current_page_item a, 
	{$rule}.widget_categories ul li a:hover, 
	{$rule}.widget_categories ul li.current-cat a, 
	{$rule}.widget_archive ul li a:hover, 
	{$rule}.widget_meta ul li a:hover, 
	{$rule}.widget_recent_comments ul li a:hover, 
	{$rule}.widget_recent_entries ul li a:hover, 
	{$rule}#wp-calendar .today, 
	{$rule}.widget_custom_contact_info_entries > span:before, 
	{$rule}.widget_custom_contact_info_entries .adress_wrap:before, 
	{$rule}.widget_nav_menu ul li a:hover, 
	{$rule}.widget_nav_menu ul li.current-menu-item a, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_list_item a:hover, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_list_item.current_tab a, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > a:hover, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li > a:hover, 
	{$rule}.widget_rss ul li .rsswidget:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	" . (($scheme == 'default') ? "#slide_top," : '') . "
	" . (($scheme == 'default') ? "mark," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme} mark," : '') . "
	{$rule}.cmsmasters_dropcap.type2,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left:before,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_bg .cmsmasters_icon_list_item .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_item:hover .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_stats.stats_mode_bars .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner, 
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner:before, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=checkbox] + span.wpcf7-list-item-label:after, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=checkbox] + label:after, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=radio] + span.wpcf7-list-item-label:after, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=radio] + label:after, 
	{$rule}.owl-pagination .owl-page:hover, 
	{$rule}.owl-pagination .owl-page.active, 
	{$rule}.cmsmasters_comment_item .cmsmasters_comment_item_date, 
	{$rule}.cmsmasters_button, 
	{$rule}.button, 
	{$rule}input[type=submit], 
	{$rule}input[type=button], 
	{$rule}button, 
	{$rule}#page .cmsmasters_social_icon, 
	{$rule}.cmsmasters_post_default .cmsmasters_post_date, 
	{$rule}.cmsmasters_post_masonry .cmsmasters_post_date, 
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_date, 
	{$rule}.cmsmasters_open_post .cmsmasters_post_date, 
	{$rule}.cmsmasters_slider_post .cmsmasters_slider_post_date, 
	{$rule}.cmsmasters_table tr.cmsmasters_table_row_header > td, 
	{$rule}.cmsmasters_table tr.cmsmasters_table_row_header > th, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_title:hover .cmsmasters_toggle_plus span, 
	{$rule}.cmsmasters_toggles .current_toggle .cmsmasters_toggle_title .cmsmasters_toggle_plus span, 
	{$rule}.cmsmasters_hover_slider .cmsmasters_hover_slider_thumbs a:before, 
	{$rule}.cmsmasters_content_slider .owl-buttons > div:hover:before, 
	{$rule}.cmsmasters_pricing_table .pricing_best .cmsmasters_pricing_info_wrap {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_border .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:after, 
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner:before, 
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]):focus,
	{$rule}textarea:focus {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}a:hover,
	{$rule}a.cmsmasters_cat_color:hover,
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_edit a:hover, 
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_meta a:hover, 
	{$rule}.cmsmasters_prev_arrow,
	{$rule}.cmsmasters_next_arrow, 
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers, 
	{$rule}.footer_nav > li.current-menu-item > a, 
	{$rule}.footer_nav > li.current-menu-ancestor > a {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_hover']) . "
	}
	
	" . (($scheme == 'default') ? "#slide_top:hover," : '') . "
	{$rule}#page .cmsmasters_social_icon:hover, 
	{$rule}.cmsmasters_button:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button, 
	{$rule}.button:hover, 
	{$rule}.button.current, 
	{$rule}.button.active, 
	{$rule}input[type=submit]:hover, 
	{$rule}input[type=button]:hover, 
	{$rule}button:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	" . (($scheme == 'default') ? ".headline_outer," : '') . "
	" . (($scheme == 'default') ? ".headline_outer a:hover," : '') . "
	{$rule}h1,
	{$rule}h2,
	{$rule}h3,
	{$rule}h4,
	{$rule}h5,
	{$rule}h6,
	{$rule}h1 a,
	{$rule}h2 a,
	{$rule}h3 a,
	{$rule}h4 a,
	{$rule}h5 a,
	{$rule}h6 a,
	{$rule}fieldset legend,
	{$rule}blockquote footer,
	{$rule}table caption,
	{$rule}.img_placeholder_small, 
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner,
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat_title,
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_counter_wrap,
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat_title, 
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner .cmsmasters_stat_title_counter_wrap, 
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap, 
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_title, 
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li > ul > li > ul li a:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > a,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_category > li > ul li a:before,
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap_archive > li a:before, 
	{$rule}.post_nav > span a, 
	{$rule}.post_nav > span a:hover, 
	{$rule}.share_posts a, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li, 
	{$rule}.cmsmasters_items_filter_wrap .cmsmasters_items_filter_list li a, 
	{$rule}.search_bar_wrap .search_button button, 
	{$rule}.cmsmasters_likes a:hover, 
	{$rule}.cmsmasters_likes a.active, 
	{$rule}.cmsmasters_likes a span, 
	{$rule}.cmsmasters_comments a:hover, 
	{$rule}.cmsmasters_comments a span, 
	{$rule}.cmsmasters_post_default .cmsmasters_post_cont_info, 
	{$rule}.cmsmasters_post_masonry .cmsmasters_post_cont_info, 
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_cont_info, 
	{$rule}.cmsmasters_open_post .cmsmasters_post_cont_info, 
	{$rule}.cmsmasters_open_post .cmsmasters_post_tags, 
	{$rule}.cmsmasters_project_grid .cmsmasters_project_cont_info, 
	{$rule}.cmsmasters_project_puzzle .cmsmasters_project_cont_info, 
	{$rule}.cmsmasters_open_project .project_details_item_title, 
	{$rule}.cmsmasters_open_project .project_features_item_title, 
	{$rule}.cmsmasters_open_project .cmsmasters_project_category, 
	{$rule}.cmsmasters_open_project .cmsmasters_project_tags, 
	{$rule}.cmsmasters_slider_post .cmsmasters_slider_post_cont_info, 
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_cont_info, 
	{$rule}.cmsmasters_open_profile .profile_details_item_title, 
	{$rule}.cmsmasters_open_profile .profile_features_item_title, 
	{$rule}.cmsmasters_open_profile .cmsmasters_profile_category, 
	{$rule}.cmsmasters_table tr.cmsmasters_table_row_footer > td, 
	{$rule}.cmsmasters_table tr.cmsmasters_table_row_footer > th, 
	{$rule}.cmsmasters_notice, 
	{$rule}.cmsmasters_notice .notice_close, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggles_filter, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggles_filter a, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_title a, 
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list_item a, 
	{$rule}.cmsmasters_twitter_wrap .published, 
	{$rule}.cmsmasters_clients_item span, 
	{$rule}.widget_pages ul li, 
	{$rule}.widget_pages ul li a, 
	{$rule}.widget_categories ul li, 
	{$rule}.widget_categories ul li a, 
	{$rule}.widget_archive ul li, 
	{$rule}.widget_archive ul li a, 
	{$rule}.widget_meta ul li, 
	{$rule}.widget_meta ul li a, 
	{$rule}.widget_recent_comments ul li, 
	{$rule}.widget_recent_comments ul li a, 
	{$rule}.widget_recent_entries ul li, 
	{$rule}.widget_recent_entries ul li a, 
	{$rule}.widget_custom_contact_info_entries > span, 
	{$rule}.widget_custom_contact_info_entries .adress_wrap, 
	{$rule}.widget_nav_menu ul li a, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_list_item, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_list_item a, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > a, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_cont > .published, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li > a, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li > span, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tab.tab_comments li .published, 
	{$rule}.widget_rss ul li .rsswidget, 
	{$rule}.widget_rss ul li .rss-date, 
	{$rule}.widget_custom_twitter_entries .tweet_time, 
	{$rule}.cmsmasters_archive_type .cmsmasters_archive_item_user_name, 
	{$rule}.cmsmasters_archive_type .cmsmasters_archive_item_category, 
	{$rule}.cmsmasters_archive_type .cmsmasters_archive_item_date_wrap {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.cmsmasters_icon_list_items .cmsmasters_icon_list_item .cmsmasters_icon_list_icon,
	{$rule}form .formError .formErrorContent, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_plus span {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}mark,
	{$rule}form .formError .formErrorContent,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left_top:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left:before,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top:before,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_border .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before,
	{$rule}.cmsmasters_stats.stats_mode_bars.stats_type_vertical .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	" . (($scheme == 'default') ? "body," : '') . "
	" . (($scheme != 'default') ? ".cmsmasters_color_scheme_{$scheme}," : '') . "
	" . (($scheme == 'default') ? ".middle_inner," : '') . "
	" . (($scheme == 'default') ? ".headline_outer," : '') . "
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	{$rule}textarea,
	{$rule}option, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_lpr_tabs_img .img_placeholder_small {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	" . (($scheme == 'default') ? "#slide_top," : '') . "
	{$rule}.cmsmasters_dropcap.type2,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon_wrap, 
	{$rule}.cmsmasters_counters .cmsmasters_counter_wrap .cmsmasters_counter .cmsmasters_counter_inner:before, 
	{$rule}.cmsmasters_comment_item .cmsmasters_comment_item_date, 
	{$rule}.cmsmasters_button, 
	{$rule}.button, 
	{$rule}input[type=submit], 
	{$rule}input[type=button], 
	{$rule}button, 
	{$rule}.cmsmasters_button:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button, 
	{$rule}.button:hover, 
	{$rule}input[type=submit]:hover, 
	{$rule}input[type=button]:hover, 
	{$rule}button:hover, 
	{$rule}#page .cmsmasters_social_icon, 
	{$rule}.cmsmasters_post_default .cmsmasters_post_date, 
	{$rule}.cmsmasters_post_masonry .cmsmasters_post_date, 
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_date, 
	{$rule}.cmsmasters_open_post .cmsmasters_post_date, 
	{$rule}.cmsmasters_slider_post .cmsmasters_slider_post_date, 
	{$rule}.cmsmasters_table tr.cmsmasters_table_row_header > td, 
	{$rule}.cmsmasters_table tr.cmsmasters_table_row_header > th, 
	{$rule}.cmsmasters_content_slider .owl-buttons > div > span, 
	{$rule}.cmsmasters_pricing_table .pricing_best .cmsmasters_pricing_info_wrap, 
	{$rule}.cmsmasters_pricing_table .pricing_best .cmsmasters_pricing_info_wrap * {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}select,
	{$rule}fieldset,
	{$rule}fieldset legend,
	{$rule}.img_placeholder_small, 
	{$rule}.cmsmasters_featured_block,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon,
	{$rule}.cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner, 
	{$rule}.gallery-item .gallery-icon,
	{$rule}.gallery-item .gallery-caption,
	{$rule}.cmsmasters_img.with_caption, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=checkbox] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=checkbox] + label:before, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=radio] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=radio] + label:before, 
	{$rule}.owl-pagination .owl-page, 
	{$rule}.cmsmasters_prev_arrow,
	{$rule}.cmsmasters_next_arrow, 
	{$rule}.about_author .about_author_inner, 
	{$rule}.cmsmasters_single_slider .cmsmasters_single_slider_item_outer, 
	{$rule}.cmsmasters_comment_item, 
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers, 
	{$rule}.cmsmasters_post_masonry .cmsmasters_post_cont, 
	{$rule}.cmsmasters_post_timeline .cmsmasters_post_cont, 
	{$rule}.cmsmasters_project_grid .project_outer, 
	{$rule}.cmsmasters_project_puzzle .project_inner, 
	{$rule}.cmsmasters_slider_post .cmsmasters_slider_post_outer, 
	{$rule}.cmsmasters_slider_project .cmsmasters_slider_project_outer, 
	{$rule}.cmsmasters_profile_vertical .profile_outer, 
	{$rule}.cmsmasters_table tr.cmsmasters_table_row_footer > td, 
	{$rule}.cmsmasters_table tr.cmsmasters_table_row_footer > th, 
	{$rule}.cmsmasters_notice, 
	{$rule}.cmsmasters_notice .notice_close, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_plus, 
	{$rule}.cmsmasters_toggles.toggles_mode_toggle .cmsmasters_toggle_wrap, 
	{$rule}.cmsmasters_tabs .cmsmasters_tabs_list_item a, 
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quotes_list:after, 
	{$rule}.cmsmasters_pricing_table .cmsmasters_pricing_item_inner, 
	{$rule}.cmsmasters_clients_item:hover, 
	{$rule}.widget_nav_menu .menu > li > a, 
	{$rule}.widget_custom_popular_projects_entries .pj_item, 
	{$rule}.widget_custom_latest_projects_entries .pj_item, 
	{$rule}.widget_custom_posts_tabs_entries .cmsmasters_tabs .cmsmasters_tabs_wrap, 
	{$rule}.widget_custom_twitter_entries .tweet_text {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.cmsmasters_sitemap_wrap .cmsmasters_sitemap > li:before, 
	{$rule}.blog.timeline:before, 
	{$rule}.blog.timeline .post:before, 
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quotes_vert:before, 
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quotes_vert:after, 
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quotes_vert span, 
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quotes_list:before, 
	{$rule}.cmsmasters_quotes_grid .cmsmasters_quote:before, 
	{$rule}.cmsmasters_archive_type .cmsmasters_archive_item_info:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	" . (($scheme == 'default') ? ".headline_outer," : '') . "
	{$rule}.cmsmasters_attach_img .cmsmasters_attach_img_info, 
	{$rule}input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	{$rule}textarea,
	{$rule}option,
	{$rule}hr,
	{$rule}.cmsmasters_divider,
	{$rule}.cmsmasters_widget_divider,
	{$rule}.cmsmasters_img.with_caption,
	{$rule}.cmsmasters_icon_wrap .cmsmasters_simple_icon, 
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_top,
	{$rule}.cmsmasters_icon_box.cmsmasters_icon_box_left,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_icon_list_type_block .cmsmasters_icon_list_item,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_bg .cmsmasters_icon_list_icon:after,
	{$rule}.cmsmasters_icon_list_items.cmsmasters_color_type_icon .cmsmasters_icon_list_icon:after, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=checkbox] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=checkbox] + label:before, 
	{$rule}.wpcf7 form.wpcf7-form span.wpcf7-list-item input[type=radio] + span.wpcf7-list-item-label:before, 
	{$rule}.cmsmasters-form-builder .check_parent input[type=radio] + label:before, 
	{$rule}.cmsmasters_prev_arrow,
	{$rule}.cmsmasters_next_arrow, 
	{$rule}.cmsmasters_wrap_pagination ul li .page-numbers, 
	{$rule}.cmsmasters_post_default .cmsmasters_post_cont, 
	{$rule}.cmsmasters_open_post, 
	{$rule}.cmsmasters_open_project, 
	{$rule}.cmsmasters_open_project .cmsmasters_project_header, 
	{$rule}.cmsmasters_open_project .project_sidebar > div, 
	{$rule}.cmsmasters_profile_horizontal .cmsmasters_profile_header, 
	{$rule}.cmsmasters_open_profile, 
	{$rule}.cmsmasters_open_profile .cmsmasters_profile_header, 
	{$rule}.cmsmasters_open_profile .profile_sidebar > div, 
	{$rule}.cmsmasters_table tr > td, 
	{$rule}.cmsmasters_table tr > th, 
	{$rule}.cmsmasters_notice .notice_close, 
	{$rule}.cmsmasters_toggles .cmsmasters_toggle_plus, 
	{$rule}.cmsmasters_toggles.toggles_mode_accordion .cmsmasters_toggle_wrap {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */
	
	
	/* Start Custom Rules */
	{$rule}::selection {
		" . cmsmasters_color_css('background', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . ";
	}
	
	{$rule}::-moz-selection {
		" . cmsmasters_color_css('background', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	";
	
	
	if ($scheme != 'default') {
		$custom_css .= "
		.cmsmasters_color_scheme_{$scheme}.cmsmasters_row_top_zigzag:before, 
		.cmsmasters_color_scheme_{$scheme}.cmsmasters_row_bot_zigzag:after {
			background-image: -webkit-linear-gradient(135deg, " . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					-webkit-linear-gradient(45deg, " . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
			background-image: -moz-linear-gradient(135deg, " . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					-moz-linear-gradient(45deg, " . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
			background-image: -ms-linear-gradient(135deg, " . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					-ms-linear-gradient(45deg, " . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
			background-image: -o-linear-gradient(135deg, " . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					-o-linear-gradient(45deg, " . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
			background-image: linear-gradient(315deg, " . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg'] . " 25%, transparent 25%), 
					linear-gradient(45deg, " . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg'] . " 25%, transparent 25%);
		}
		";
	}
	
	
	$custom_css .= "
	/* Finish Custom Rules */

/***************** Finish {$title} Color Scheme Rules ******************/


/***************** Start {$title} Button Color Scheme Rules ******************/
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_hover:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_hover {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_hor, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert:hover, 
	{$rule}.cmsmasters_button.cm.sms_but_bg_expand_hor:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_left, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_right, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_top, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_bottom, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_expand_vert, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_expand_hor, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_bg_expand_diag {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_left:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_right:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_top:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_slide_bottom:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_vert:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_hor:after, 
	{$rule}.cmsmasters_button.cmsmasters_but_bg_expand_diag:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_shadow {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_shadow:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_shadow {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_light_bg, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_dark_bg:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_light_bg:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_dark_bg, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_light_bg, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_divider {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_divider:after {
		" . cmsmasters_color_css('border-right-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:before {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_inverse {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover:before, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_inverse:before {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_inverse:hover:after, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_inverse:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_right {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_slide_right:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_slide_left, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_slide_right {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_left, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_right, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_top, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_bottom {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_left:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_right:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_top:hover, 
	{$rule}.cmsmasters_button.cmsmasters_but_icon_hover_slide_bottom:hover, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_hover_slide_left, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_hover_slide_right, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_hover_slide_top, 
	{$rule}.cmsmasters_paypal_donations > form:hover + .cmsmasters_button.cmsmasters_but_icon_hover_slide_bottom {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}

/***************** Finish {$title} Button Color Scheme Rules ******************/


";
	}
	
	
	return $custom_css;
}

