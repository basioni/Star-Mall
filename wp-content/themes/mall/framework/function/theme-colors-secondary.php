<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.0
 * 
 * Theme Secondary Color Schemes Rules
 * Created by CMSMasters
 * 
 */


function cmsmasters_theme_colors_secondary() {
	$cmsmasters_option = cmsmasters_get_global_options();
	
	
	$cmsmasters_color_schemes = cmsmasters_color_schemes_list();
	
	
	$custom_css = "/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.0
 * 
 * Theme Secondary Color Schemes Rules
 * Created by CMSMasters
 * 
 */

";
	
	
	foreach ($cmsmasters_color_schemes as $scheme => $title) {
		$rule = (($scheme != 'default') ? "html .cmsmasters_color_scheme_{$scheme} " : '');
		
		
		if (CMSMASTERS_DONATIONS) {
			$custom_css .= "
/***************** Start {$title} CMSMASTERS Donations Color Scheme Rules ******************/

	/* Start Header Donation Button Colors */
	#header .header_donation_but .cmsmasters_button {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_hover_bg']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_hover']) . "
	}
	
	#header .header_donation_but .cmsmasters_button:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_link']) . "
	}
	
	#header .header_top_donation_but {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_hover']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_border']) . "
	}
	
	#header .header_top_donation_but:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_border']) . "
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_hover']) . "
	}
	/* Finish Header Donation Button Colors */
	
	
	/* Start Main Content Font Color */
	{$rule}.opened-article > .campaign .campaign_meta_wrap .cmsmasters_campaign_donations_count_number, 
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_campaign, 
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_campaign a, 
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_campaign, 
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_campaign a {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}.opened-article > .campaign .campaign_meta_wrap .cmsmasters_campaign_target_number, 
	{$rule}.related_posts_tabs_campaign .rel_post_content .related_posts_campaign_wrap .related_posts_campaign_togo > span, 
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_amount_currency, 
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_campaign a:hover, 
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_amount_currency, 
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_campaign a:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_featured_campaign .campaign .cmsmasters_campaign_wrap_heading {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.cmsmasters_campaigns .campaign .cmsmasters_img_wrap .preloader:hover:after {
		background-color:rgba(" . color2rgb($cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . ", 0.85);
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}.cmsmasters_campaigns .owl-buttons {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}.cmsmasters_campaigns .owl-buttons span:hover,
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_details_item_title, 
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_amount_title, 
	{$rule}.opened-article > .campaign .cmsmasters_campaign_cont_info > span, 
	{$rule}.cmsmasters_campaigns .campaign .cmsmasters_stats.stats_mode_bars.stats_type_horizontal .cmsmasters_stat_wrap .cmsmasters_stat_title_wrap {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.donation_confirm .donation_confirm_info_title {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}.cmsmasters_campaigns .campaign .cmsmasters_img_wrap .preloader:before {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.cmsmasters_featured_campaign .campaign .cmsmasters_campaign_donated_percent .cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat canvas {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}.opened-article > .campaign .campaign_meta_wrap > div {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}.donation_confirm .donation_confirm_info_title {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.opened-article > .campaign .campaign_meta_wrap > div,
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_info, 
	{$rule}.donation_confirm .donation_confirm_info, 
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_cont_wrap, 
	{$rule}.cmsmasters_featured_campaign .campaign, 
	{$rule}.cmsmasters_featured_campaign .campaign .cmsmasters_campaign_donated_percent .cmsmasters_stats.stats_mode_circles .cmsmasters_stat_wrap .cmsmasters_stat .cmsmasters_stat_inner {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.cmsmasters_donations .donation .img_placeholder, 
	{$rule}.cmsmasters_featured_campaign .campaign .cmsmasters_campaign_wrap_img .img_placeholder, 
	{$rule}.cmsmasters_campaigns .campaign .cmsmasters_img_wrap .img_placeholder {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.donations.opened-article > .donation .cmsmasters_donation_details_item, 
	{$rule}.cmsmasters_donations .donation .cmsmasters_donation_footer, 
	{$rule}.campaign .cmsmasters_campaign_cont_info {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */

/***************** Finish {$title} CMSMASTERS Donations Color Scheme Rules ******************/


";
		}
		
		
		if (CMSMASTERS_WOOCOMMERCE) {
			$custom_css .= "
/***************** Start {$title} WooCommerce Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	{$rule}.select2-container .select2-choice, 
	{$rule}.select2-container.select2-drop-above .select2-choice, 
	{$rule}.select2-container.select2-container-active .select2-choice, 
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice, 
	{$rule}.select2-drop.select2-drop-active, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}.required, 
	{$rule}.cmsmasters_star_rating .cmsmasters_star_color_wrap, 
	{$rule}.comment-form-rating .stars > span a:hover, 
	{$rule}.comment-form-rating .stars > span a.active, 
	{$rule}#page .remove:hover, 
	{$rule}.cmsmasters_product .price ins, 
	{$rule}.cmsmasters_single_product .price ins, 
	{$rule}.shop_table thead th, 
	{$rule}.shop_table a:not(.button):hover, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .order-total th, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .order-total td, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .cart-subtotal th, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .cart-subtotal td, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .product-name strong, 
	{$rule}.shop_table.order_details tfoot tr:last-child th, 
	{$rule}.shop_table.order_details tfoot tr:last-child td, 
	{$rule}.shop_table.order_details .product-name strong, 
	{$rule}.shop_table.order_details tfoot tr:first-child th, 
	{$rule}.shop_table.order_details tfoot tr:first-child td, 
	{$rule}.widget_layered_nav ul li a:hover, 
	{$rule}.widget_layered_nav ul li.chosen a, 
	{$rule}.widget_layered_nav_filters ul li a:hover, 
	{$rule}.widget_layered_nav_filters ul li.chosen a, 
	{$rule}.widget_product_categories ul li a:hover, 
	{$rule}.widget_product_categories ul li.current-cat a, 
	{$rule}.widget > .product_list_widget a:hover, 
	{$rule}.widget > .product_list_widget ins .amount, 
	{$rule}.widget_shopping_cart .cart_list a:hover, 
	{$rule}.widget_shopping_cart .cart_list .quantity {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.input-checkbox + label:after, 
	{$rule}.input-radio + label:after, 
	{$rule}input.shipping_method + label:after, 
	{$rule}.onsale, 
	{$rule}ul.order_details li, 
	{$rule}.widget_price_filter .ui-slider-handle {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}.select2-container.select2-container-active .select2-choice, 
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice, 
	{$rule}.select2-drop.select2-drop-active, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}.link_hover_color {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}.woocommerce-info, 
	{$rule}.woocommerce-message, 
	{$rule}.woocommerce-error li, 
	{$rule}#page .remove, 
	{$rule}.cmsmasters_woo_wrap_result .woocommerce-result-count, 
	{$rule}.cmsmasters_product .cmsmasters_product_cat, 
	{$rule}.cmsmasters_product .price, 
	{$rule}.cmsmasters_product .cmsmasters_product_add_inner .button:hover, 
	{$rule}.cmsmasters_single_product .price, 
	{$rule}.cmsmasters_single_product .product_meta, 
	{$rule}.shop_attributes th, 
	{$rule}.shop_table, 
	{$rule}.shop_table a:not(.button), 
	{$rule}.cart_totals table, 
	{$rule}ul.order_details strong, 
	{$rule}.widget_layered_nav ul li, 
	{$rule}.widget_layered_nav ul li a, 
	{$rule}.widget_layered_nav_filters ul li, 
	{$rule}.widget_layered_nav_filters ul li a, 
	{$rule}.widget_product_categories ul li, 
	{$rule}.widget_product_categories ul li a, 
	{$rule}.widget > .product_list_widget a, 
	{$rule}.widget > .product_list_widget .amount, 
	{$rule}.widget_shopping_cart .cart_list a, 
	{$rule}.widget_shopping_cart .cart_list .quantity .amount, 
	{$rule}.widget_shopping_cart .total, 
	{$rule}.widget_price_filter .price_slider_amount .price_label {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.out-of-stock, 
	{$rule}.stock {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}.widget_price_filter .price_slider {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}.onsale, 
	{$rule}.out-of-stock, 
	{$rule}.stock, 
	{$rule}ul.order_details {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.woocommerce-info, 
	{$rule}.woocommerce-message, 
	{$rule}.woocommerce-error, 
	{$rule}.select2-container .select2-choice, 
	{$rule}.select2-container.select2-drop-above .select2-choice, 
	{$rule}.select2-container.select2-container-active .select2-choice, 
	{$rule}.select2-container.select2-container-active.select2-drop-above .select2-choice, 
	{$rule}.select2-drop.select2-drop-active, 
	{$rule}.select2-drop.select2-drop-above.select2-drop-active, 
	{$rule}.input-checkbox + label:before, 
	{$rule}.input-radio + label:before, 
	{$rule}input.shipping_method + label:before, 
	{$rule}#page .remove, 
	{$rule}.cmsmasters_product, 
	{$rule}.cmsmasters_product .cmsmasters_product_add_inner .button:hover, 
	{$rule}.shop_table thead th, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .order-total th, 
	{$rule}.shop_table.woocommerce-checkout-review-order-table .order-total td, 
	{$rule}.shop_table.order_details tfoot tr:last-child th, 
	{$rule}.shop_table.order_details tfoot tr:last-child td, 
	{$rule}.woocommerce-checkout-payment, 
	{$rule}ul.order_details strong, 
	{$rule}.widget > .product_list_widget li, 
	{$rule}.widget_shopping_cart .cart_list, 
	{$rule}.widget_price_filter .ui-slider-range {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}.cmsmasters_star_rating .cmsmasters_star_trans_wrap, 
	{$rule}.comment-form-rating .stars > span {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.cmsmasters_woo_tabs:before, 
	{$rule}div.products:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.select2-container .select2-choice, 
	{$rule}.select2-container.select2-drop-above .select2-choice, 
	{$rule}.input-checkbox + label:before, 
	{$rule}.input-radio + label:before, 
	{$rule}input.shipping_method + label:before, 
	{$rule}#page .remove, 
	{$rule}.shop_table th, 
	{$rule}.shop_table td, 
	{$rule}.cart_totals table th, 
	{$rule}.cart_totals table td, 
	{$rule}.widget_price_filter .price_slider, 
	{$rule}.shop_table .cart_item {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */

/***************** Finish {$title} WooCommerce Color Scheme Rules ******************/


";
		}
		
		
		if (CMSMASTERS_EVENTS_CALENDAR) {
			$custom_css .= "
/***************** Start {$title} Events Color Scheme Rules ******************/

	/* Start Main Content Font Color */
	{$rule}#tribe-bar-views .tribe-bar-views-list li.tribe-bar-active a, 
	{$rule}#tribe-bar-views .tribe-bar-views-list li.tribe-bar-active a:hover, 
	{$rule}.tribe-this-week-events-widget .tribe-events-page-title, 
	{$rule}.tribe-this-week-events-widget .tribe-this-week-event .tribe-venue a {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_color']) . "
	}
	/* Finish Main Content Font Color */
	
	
	/* Start Primary Color */
	{$rule}#tribe-events-content > .tribe-events-button:hover, 
	{$rule}#tribe-bar-views .tribe-bar-views-list li a:hover, 
	{$rule}.tribe-events-sub-nav li a:hover, 
	{$rule}table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] a:hover, 
	{$rule}.tribe-events-list .tribe-events-event-meta .author > div:before, 
	{$rule}.tribe-events-grid .tribe-grid-header .tribe-week-today span, 
	{$rule}.cmsmasters_single_event .tribe-events-cost:before, 
	{$rule}.cmsmasters_single_event .cmsmasters_single_event_header_right a:before, 
	{$rule}.cmsmasters_single_event .cmsmasters_single_event_header_right a:hover, 
	{$rule}.tribe-events-venue .cmsmasters_events_venue_header_right a:before, 
	{$rule}.tribe-events-venue .cmsmasters_events_venue_header_right a:hover, 
	{$rule}.tribe-events-organizer .cmsmasters_events_organizer_header_right a:before, 
	{$rule}.tribe-events-organizer .cmsmasters_events_organizer_header_right a:hover, 
	{$rule}.tribe-mini-calendar tbody a:hover, 
	{$rule}.tribe-mini-calendar tbody .tribe-events-present, 
	{$rule}.tribe-mini-calendar tbody .tribe-events-present a, 
	{$rule}.widget .vcalendar [class*=cmsmasters_theme_icon]:before, 
	{$rule}.tribe-mini-calendar-list-wrapper [class*=cmsmasters_theme_icon]:before, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-venue-name a:hover, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-venue-name:before, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-text a:hover, 
	{$rule}.tribe-this-week-events-widget .tribe-this-week-event .duration:before, 
	{$rule}.tribe-this-week-events-widget .tribe-this-week-event .tribe-venue:before, 
	{$rule}.tribe-this-week-events-widget .tribe-this-week-event .tribe-venue a:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	
	{$rule}table.tribe-events-calendar thead th, 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-present div[id*=tribe-events-daynum-], 
	{$rule}.tribe-events-list .tribe-events-event-cost, 
	{$rule}.tribe-events-grid .tribe-grid-header a:hover, 
	{$rule}.tribe-events-grid .tribe-week-event .vevent .entry-title a, 
	{$rule}.tribe-mini-calendar .tribe-mini-calendar-nav, 
	{$rule}.tribe-mini-calendar tbody a:before, 
	{$rule}.cmsmasters_event_date, 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-has-events:before, 
	{$rule}.tribe-this-week-events-widget .this-week-today .tribe-this-week-widget-header-date {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_link']) . "
	}
	/* Finish Primary Color */
	
	
	/* Start Highlight Color */
	{$rule}.event_hover {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_hover']) . "
	}
	
	{$rule}#tribe-bar-views.tribe-bar-views-open .button {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_hover']) . "
	}
	/* Finish Highlight Color */
	
	
	/* Start Headings Color */
	{$rule}.tribe-bar-filters-inner > div label, 
	{$rule}#tribe-bar-views .tribe-bar-views-list li, 
	{$rule}#tribe-bar-views .tribe-bar-views-list li a, 
	{$rule}.tribe-events-sub-nav li a, 
	{$rule}.tribe-events-notices, 
	{$rule}#tribe-events-content > .tribe-events-button, 
	{$rule}table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-], 
	{$rule}table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-] a, 
	{$rule}.tribe-events-list .tribe-events-list-separator-month, 
	{$rule}.tribe-events-list .tribe-events-event-meta, 
	{$rule}.tribe-events-photo .tribe-events-event-meta, 
	{$rule}.tribe-events-grid .tribe-week-event:hover .vevent .entry-title a, 
	{$rule}.cmsmasters_single_event .tribe-events-schedule, 
	{$rule}.cmsmasters_single_event .cmsmasters_single_event_header_right a, 
	{$rule}.cmsmasters_single_event_meta .cmsmasters_event_meta_info_item_title, 
	{$rule}.cmsmasters_single_event_meta dt, 
	{$rule}.tribe-events-venue .tribe-events-event-meta, 
	{$rule}.tribe-events-venue .cmsmasters_events_venue_header_right a, 
	{$rule}.tribe-events-organizer .tribe-events-event-meta, 
	{$rule}.tribe-events-organizer .cmsmasters_events_organizer_header_right a, 
	{$rule}.tribe-mini-calendar thead a:hover, 
	{$rule}.tribe-mini-calendar tbody, 
	{$rule}.tribe-mini-calendar tbody a, 
	{$rule}.widget .vcalendar .cmsmasters_widget_event_info, 
	{$rule}.tribe-mini-calendar-list-wrapper .cmsmasters_widget_event_info, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-venue-name a, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-time, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-text, 
	{$rule}.tribe-events-countdown-widget .tribe-countdown-text a, 
	{$rule}.tribe-mobile-day .tribe-events-event-schedule-details, 
	{$rule}.tribe-mobile-day .tribe-event-schedule-details {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_heading']) . "
	}
	
	{$rule}.tribe-events-tooltip, 
	{$rule}.tribe-events-grid .tribe-grid-header, 
	{$rule}.tribe-mini-calendar thead, 
	{$rule}.tribe-mini-calendar tbody .tribe-mini-calendar-today a:before, 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-has-events.mobile-active:before {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_heading']) . "
	}
	/* Finish Headings Color */
	
	
	/* Start Main Background Color */
	{$rule}.event_bg {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	
	{$rule}table.tribe-events-calendar tbody td div[id*=tribe-events-daynum-], 
	{$rule}.tribe-events-grid .tribe-scroller, 
	{$rule}.tribe-events-grid .tribe-week-grid-hours {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_bg']) . "
	}
	/* Finish Main Background Color */
	
	
	/* Start Alternate Background Color */
	{$rule}table.tribe-events-calendar thead th, 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-present div[id*=tribe-events-daynum-], 
	{$rule}table.tribe-events-calendar tbody td.tribe-events-present div[id*=tribe-events-daynum-] a, 
	{$rule}.tribe-events-tooltip, 
	{$rule}.tribe-events-tooltip *, 
	{$rule}.tribe-events-list .tribe-events-event-cost, 
	{$rule}.tribe-events-grid .tribe-grid-header a:hover span, 
	{$rule}.tribe-events-grid .tribe-grid-header span, 
	{$rule}.tribe-events-grid .tribe-week-event .vevent .entry-title a, 
	{$rule}.tribe-mini-calendar thead, 
	{$rule}.tribe-mini-calendar thead a, 
	{$rule}.cmsmasters_event_date, 
	{$rule}.tribe-this-week-events-widget .this-week-today .tribe-this-week-widget-header-date {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.tribe-events-sub-nav li span:not([class]), 
	{$rule}.tribe-events-notices, 
	{$rule}table.tribe-events-calendar, 
	{$rule}.tribe-events-photo .tribe-events-photo-event-wrap, 
	{$rule}.tribe-events-grid .tribe-grid-allday, 
	{$rule}ul.tribe-related-events li, 
	{$rule}.tribe-mini-calendar, 
	{$rule}.tribe-events-venue-widget .tribe-venue-widget-venue {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	
	{$rule}.tribe-events-grid .tribe-week-event .vevent .entry-title {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_alternate']) . "
	}
	/* Finish Alternate Background Color */
	
	
	/* Start Borders Color */
	{$rule}table.tribe-events-calendar tbody td.tribe-events-othermonth div[id*=tribe-events-daynum-], 
	{$rule}.tribe-mini-calendar tbody .tribe-events-othermonth, 
	{$rule}.tribe-mini-calendar tbody .tribe-events-othermonth a {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	.tribe-events-single .post_nav:before, 
	.tribe-events-single .post_nav:after {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	
	{$rule}.tribe-events-sub-nav li span:not([class]), 
	{$rule}table.tribe-events-calendar tbody td, 
	{$rule}table.tribe-events-calendar tbody td .tribe_events, 
	{$rule}.tribe-events-list .tribe-events-list-separator-month, 
	{$rule}.tribe-events-list .tribe-events-day-time-slot > h5, 
	{$rule}.tribe-events-list .type-tribe_events, 
	{$rule}.tribe-events-photo .tribe-events-page-title, 
	{$rule}.tribe-events-map .tribe-events-page-title, 
	{$rule}.tribe-events-grid .tribe-scroller, 
	{$rule}.tribe-events-grid .tribe-week-grid-block div, 
	{$rule}.tribe-events-grid .tribe-grid-allday, 
	{$rule}.tribe-events-grid .tribe-grid-content-wrap .column, 
	{$rule}.tribe-events-grid .tribe-week-grid-hours div, 
	{$rule}.cmsmasters_single_event, 
	{$rule}.widget .vcalendar .type-tribe_events, 
	{$rule}.tribe-mini-calendar-list-wrapper .type-tribe_events, 
	{$rule}.tribe-mobile-day .tribe-events-mobile, 
	{$rule}.tribe-this-week-events-widget .tribe-this-week-widget-day {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_' . $scheme . '_border']) . "
	}
	/* Finish Borders Color */

/***************** Finish {$title} Events Color Scheme Rules ******************/


";
		}
	}
	
	
	$custom_css .= "
/***************** Start Header Middle Color Scheme Rules ******************/

	/* Start Header Middle Content Color */
	.header_mid,
	.header_mid input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_mid textarea,
	.header_mid select,
	.header_mid option {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_mid_color']) . "
	}
	/* Finish Header Middle Content Color */
	
	
	/* Start Header Middle Primary Color */
	.header_mid a {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_mid_link']) . "
	}
	
	.header_mid .button:hover, 
	.header_mid input[type=submit]:hover, 
	.header_mid input[type=button]:hover, 
	.header_mid button:hover, 
	.header_mid .search_wrap .search_bar_wrap .search_button button:hover, 
	.header_mid .search_wrap.search_opened .search_bar_wrap .search_button button, 
	.header_mid .resp_mid_nav_wrap .resp_mid_nav:hover, 
	.header_mid .resp_mid_nav_wrap .resp_mid_nav.active, 
	.cmsmasters_dynamic_cart .cmsmasters_dynamic_cart_button:hover, 
	.cmsmasters_dynamic_cart:hover .cmsmasters_dynamic_cart_button {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_mid_link']) . "
	}
	
	@media only screen and (max-width: 768px) {
		#header .header_mid .search_wrap .search_bar_wrap .search_button button {
			" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_mid_link']) . "
		}
	}
	/* Finish Header Middle Primary Color */
	
	
	/* Start Header Middle Rollover Color */
	.header_mid a:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_mid_hover']) . "
	}
	
	.header_mid .button, 
	.header_mid input[type=submit], 
	.header_mid input[type=button], 
	.header_mid button,
	.header_mid .search_wrap .search_bar_wrap .search_button button, 
	.header_mid .resp_mid_nav_wrap .resp_mid_nav, 
	.cmsmasters_dynamic_cart .cmsmasters_dynamic_cart_button {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_mid_hover']) . "
	}
	
	.header_mid input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]):focus,
	.header_mid textarea:focus,
	.header_mid select:focus {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_mid_hover']) . "
	}
	/* Finish Header Middle Rollover Color */
	
	
	/* Start Header Middle Background Color */
	.header_mid .button, 
	.header_mid input[type=submit], 
	.header_mid input[type=button], 
	.header_mid button, 
	.header_mid .button:hover, 
	.header_mid input[type=submit]:hover, 
	.header_mid input[type=button]:hover, 
	.header_mid button:hover, 
	.header_mid .search_wrap .search_bar_wrap .search_button button, 
	.header_mid .resp_mid_nav_wrap .resp_mid_nav, 
	.header_mid .resp_mid_nav_wrap .resp_mid_nav:hover, 
	.header_mid .resp_mid_nav_wrap .resp_mid_nav.active, 
	.cmsmasters_dynamic_cart .cmsmasters_dynamic_cart_button, 
	.cmsmasters_dynamic_cart .cmsmasters_dynamic_cart_button:hover, 
	.cmsmasters_dynamic_cart:hover .cmsmasters_dynamic_cart_button {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_mid_bg']) . "
	}
	
	.header_mid,
	.header_mid input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_mid textarea,
	.header_mid select,
	.header_mid option {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_mid_bg']) . "
	}
	/* Finish Header Middle Background Color */
	
	
	/* Start Header Middle Background Color on Scroll */
	.header_mid.header_mid_scroll {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_mid_bg_scroll']) . "
	}
	
	@media only screen and (max-width: 1024px) {
		.header_mid {
			" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_mid_bg_scroll']) . "
		}
	}
	/* Finish Header Middle Background Color on Scroll */
	
	
	/* Start Header Middle Borders Color */
	.header_mid input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_mid textarea,
	.header_mid select,
	.header_mid option {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_mid_border']) . "
	}
	/* Finish Header Middle Borders Color */
	
	
	/* Start Header Middle Custom Rules */
	.header_mid ::selection {
		" . cmsmasters_color_css('background', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_mid_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_mid_bg']) . "
	}
	
	.header_mid ::-moz-selection {
		" . cmsmasters_color_css('background', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_mid_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_mid_bg']) . "
	}
	/* Finish Header Middle Custom Rules */

/***************** Finish Header Middle Color Scheme Rules ******************/



/***************** Start Header Bottom Color Scheme Rules ******************/

	/* Start Header Bottom Content Color */
	.header_bot,
	.header_bot input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_bot textarea,
	.header_bot select,
	.header_bot option {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_bot_color']) . "
	}
	/* Finish Header Bottom Content Color */
	
	
	/* Start Header Bottom Primary Color */
	.header_bot a {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_bot_link']) . "
	}
	
	.header_bot .button:hover, 
	.header_bot input[type=submit]:hover, 
	.header_bot input[type=button]:hover, 
	.header_bot button:hover, 
	.header_bot .search_wrap .search_bar_wrap .search_button button:hover, 
	.header_bot .search_wrap.search_opened .search_bar_wrap .search_button button, 
	.header_bot .resp_bot_nav_wrap .resp_bot_nav:hover, 
	.header_bot .resp_bot_nav_wrap .resp_bot_nav.active {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_bot_link']) . "
	}
	/* Finish Header Bottom Primary Color */
	
	
	/* Start Header Bottom Rollover Color */
	.header_bot a:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_bot_hover']) . "
	}
	
	.header_bot .button, 
	.header_bot input[type=submit], 
	.header_bot input[type=button], 
	.header_bot button,
	.header_bot .search_wrap .search_bar_wrap .search_button button, 
	.header_bot .resp_bot_nav_wrap .resp_bot_nav {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_bot_hover']) . "
	}
	
	.header_bot input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]):focus,
	.header_bot textarea:focus,
	.header_bot select:focus {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_bot_hover']) . "
	}
	/* Finish Header Bottom Rollover Color */
	
	
	/* Start Header Bottom Background Color */
	.header_bot .button, 
	.header_bot input[type=submit], 
	.header_bot input[type=button], 
	.header_bot button, 
	.header_bot .search_wrap .search_bar_wrap .search_button button, 
	.header_bot .resp_bot_nav_wrap .resp_bot_nav, 
	.header_bot .resp_bot_nav_wrap .resp_bot_nav:hover, 
	.header_bot .resp_bot_nav_wrap .resp_bot_nav.active {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_bot_bg']) . "
	}
	
	.header_bot,
	.header_bot input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_bot textarea,
	.header_bot select,
	.header_bot option {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_bot_bg']) . "
	}
	/* Finish Header Bottom Background Color */
	
	
	/* Start Header Bottom Background Color on Scroll */
	.header_bot.header_bot_scroll {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_bot_bg_scroll']) . "
	}
	
	@media only screen and (max-width: 1024px) {
		.header_bot {
			" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_bot_bg_scroll']) . "
		}
	}
	/* Finish Header Bottom Background Color on Scroll */
	
	
	/* Start Header Bottom Borders Color */
	.header_bot input:not([type=submit]):not([type=button]):not([type=radio]):not([type=checkbox]),
	.header_bot textarea,
	.header_bot select,
	.header_bot option {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_bot_border']) . "
	}
	/* Finish Header Bottom Borders Color */
	
	
	/* Start Header Bottom Custom Rules */
	.header_bot ::selection {
		" . cmsmasters_color_css('background', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_bot_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_bot_bg']) . "
	}
	
	.header_bot ::-moz-selection {
		" . cmsmasters_color_css('background', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_bot_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_bot_bg']) . "
	}
	/* Finish Header Bottom Custom Rules */

/***************** Finish Header Bottom Color Scheme Rules ******************/



/***************** Start Navigation Color Scheme Rules ******************/

	/* Start Navigation Title Link Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li > a {
			" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_title_link']) . "
		}
	}
	/* Finish Navigation Title Link Color */
	
	
	/* Start Navigation Title Link Hover Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li > a:hover,
		ul.navigation > li > a:hover .nav_subtitle,
		ul.navigation > li:hover > a,
		ul.navigation > li:hover > a .nav_subtitle {
			" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_title_link_hover']) . "
		}
	}
	/* Finish Navigation Title Link Hover Color */
	
	
	/* Start Navigation Title Link Current Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li.menu-item.current-menu-item > a, 
		ul.navigation > li.menu-item.current-menu-item > a .nav_subtitle, 
		ul.navigation > li.menu-item.current-menu-ancestor > a, 
		ul.navigation > li.menu-item.current-menu-ancestor > a .nav_subtitle, 
		ul.navigation > li > a .nav_tag {
			" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_title_link_current']) . "
		}
	}
	/* Finish Navigation Title Link Current Color */
	
	
	/* Start Navigation Title Link Subtitle Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li > a .nav_subtitle {
			" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_title_link_subtitle']) . "
		}
		
		ul.navigation > li > a .nav_tag {
			" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_title_link_subtitle']) . "
		}
		
		ul.navigation > li > a .nav_tag:before {
			" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_title_link_subtitle']) . "
		}
	}
	/* Finish Navigation Title Link Subtitle Color */
	
	
	/* Start Navigation Title Link Background Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_title_link_bg']) . "
		}
	}
	/* Finish Navigation Title Link Background Color */
	
	
	/* Start Navigation Title Link Hover Background Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li > a:hover,
		ul.navigation > li:hover > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_title_link_bg_hover']) . "
		}
	}
	/* Finish Navigation Title Link Hover Background Color */
	
	
	/* Start Navigation Title Link Current Background Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li.menu-item.current-menu-item > a, 
		ul.navigation > li.menu-item.current-menu-ancestor > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_title_link_bg_current']) . "
		}
	}
	/* Finish Navigation Title Link Current Background Color */
	
	
	/* Start Navigation Title Link Border Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation > li:before {
			" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_title_link_border']) . "
		}
	}
	/* Finish Navigation Title Link Border Color */
	
	
	/* Start Navigation Dropdown Text Color */
	.navigation li .menu-item-mega-description-container, 
	.navigation li .menu-item-mega-description-container * {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_dropdown_text']) . "
	}
	/* Finish Navigation Dropdown Tex Color */
	
	
	/* Start Navigation Dropdown Background Color */
	.cmsmasters_dynamic_cart .widget_shopping_cart_content, 
	.cmsmasters_added_product_info {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_dropdown_bg']) . "
	}
	
	@media only screen and (max-width: 1024px) {
		ul.navigation {
			" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_dropdown_bg']) . "
		}
	}
	
	@media only screen and (min-width: 1025px) {
		ul.navigation ul, 
		ul.navigation .menu-item-mega-container {
			" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_dropdown_bg']) . "
		}
	}
	/* Finish Navigation Dropdown Background Color */
	
	
	/* Start Navigation Dropdown Border Color */
	@media only screen and (min-width: 1025px) {
		ul.navigation ul, 
		ul.navigation .menu-item-mega-container {
			" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_dropdown_border']) . "
		}
	}
	/* Finish Navigation Dropdown Border Color */
	
	
	/* Start Navigation Dropdown Link Color */
	.navigation li a, 
	.cmsmasters_added_product_info, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list a, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .total, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .button, 
	#page .cmsmasters_dynamic_cart .remove {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_dropdown_link']) . "
	}
	
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .button:hover {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_dropdown_link']) . "
	}
	/* Finish Navigation Dropdown Link Color */
	
	
	/* Start Navigation Dropdown Link Hover Color */
	.navigation li > a:hover,
	.navigation li > a:hover .nav_subtitle,
	.navigation li.current-menu-item > a, 
	.navigation li.current-menu-item > a .nav_subtitle, 
	.navigation li a .nav_tag, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .cart_list a:hover, 
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .button:hover, 
	#page .cmsmasters_dynamic_cart .remove:hover {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_dropdown_link_hover']) . "
	}
	
	@media only screen and (min-width: 1025px) {
		ul.navigation li > ul li:hover > a, 
		ul.navigation li > ul li:hover > a .nav_subtitle, 
		ul.navigation li > ul li.current-menu-ancestor > a, 
		ul.navigation li > ul li.current-menu-ancestor > a .nav_subtitle {
			" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_dropdown_link_hover']) . "
		}
	}
	
	.cmsmasters_dynamic_cart .widget_shopping_cart_content .button {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_dropdown_link_hover']) . "
	}
	/* Finish Navigation Dropdown Link Hover Color */
	
	
	/* Start Navigation Dropdown Link Subtitle Color */
	.navigation li a .nav_subtitle {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_dropdown_link_subtitle']) . "
	}
	
	.navigation li a .nav_tag {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_dropdown_link_subtitle']) . "
	}
	/* Finish Navigation Dropdown Link Subtitle Color */
	
	
	/* Start Navigation Dropdown Link Hover Highlight Color */
	.navigation li > a:hover,
	.navigation li.current-menu-item > a {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_dropdown_link_highlight']) . "
	}
	
	@media only screen and (min-width: 1025px) {
		ul.navigation li > ul li:hover > a, 
		ul.navigation li > ul li.current-menu-ancestor > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_dropdown_link_highlight']) . "
		}
	}
	/* Finish Navigation Dropdown Link Hover Highlight Color */
	
	
	/* Start Navigation Dropdown Link Border Color */
	.navigation li {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_navigation_dropdown_link_border']) . "
	}
	/* Finish Navigation Dropdown Link Border Color */

/***************** Finish Navigation Color Scheme Rules ******************/



/***************** Start Header Top Color Scheme Rules ******************/

	/* Start Header Top Content Color */
	.header_top {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_color']) . "
	}
	/* Finish Header Top Content Color */
	
	
	/* Start Header Top Primary Color */
	.header_top a, 
	.header_top .header_top_but:hover, 
	.header_top .header_top_but.opened, 
	.header_top .responsive_top_nav {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_link']) . "
	}
	
	.header_top .responsive_top_nav:hover, 
	.header_top .responsive_top_nav.active {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_link']) . "
	}
	/* Finish Header Top Primary Color */
	
	
	/* Start Header Top Rollover Color */
	.header_top a:hover,
	.header_top .meta_wrap [class^=cmsmasters-icon-]:before,
	.header_top .meta_wrap [class*= cmsmasters-icon-]:before,
	.header_top .header_top_but {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_hover']) . "
	}
	
	.header_top .responsive_top_nav {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_hover']) . "
	}
	/* Finish Header Top Rollover Color */
	
	
	/* Start Header Top Background Color */
	.header_top .responsive_top_nav:hover, 
	.header_top .responsive_top_nav.active {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_bg']) . "
	}
	
	.header_top {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_bg']) . "
	}
	/* Finish Header Top Background Color */
	
	
	/* Start Header Top Borders Color */
	.header_top .header_top_but {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_border']) . "
	}
	/* Finish Header Top Borders Color */
	
	
	/* Start Header Top Custom Rules */
	.header_top ::selection {
		" . cmsmasters_color_css('background', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_bg']) . "
	}
	
	.header_top ::-moz-selection {
		" . cmsmasters_color_css('background', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_link']) . "
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_bg']) . "
	}
	/* Finish Header Top Custom Rules */

/***************** Finish Header Top Color Scheme Rules ******************/



/***************** Start Header Top Navigation Color Scheme Rules ******************/

	/* Start Header Top Navigation Title Link Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav > li > a {
			" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_title_link']) . "
		}
	}
	/* Finish Header Top Navigation Title Link Color */
	
	
	/* Start Header Top Navigation Title Link Hover Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav > li > a:hover,
		ul.top_line_nav > li:hover > a,
		ul.top_line_nav > li.current-menu-item > a,
		ul.top_line_nav > li.current-menu-ancestor > a {
			" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_title_link_hover']) . "
		}
	}
	/* Finish Header Top Navigation Title Link Hover Color */
	
	
	/* Start Header Top Navigation Title Link Background Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav > li > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_title_link_bg']) . "
		}
	}
	/* Finish Header Top Navigation Title Link Background Color */
	
	
	/* Start Header Top Navigation Title Link Hover Background Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav > li > a:hover,
		ul.top_line_nav > li:hover > a,
		ul.top_line_nav > li.current-menu-item > a,
		ul.top_line_nav > li.current-menu-ancestor > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_title_link_bg_hover']) . "
		}
	}
	/* Finish Header Top Navigation Title Link Hover Background Color */
	
	
	/* Start Header Top Navigation Title Link Border Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav > li {
			" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_title_link_border']) . "
		}
	}
	/* Finish Header Top Navigation Title Link Border Color */
	
	
	/* Start Header Top Navigation Dropdown Background Color */
	@media only screen and (max-width: 1024px) {
		ul.top_line_nav {
			" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_dropdown_bg']) . "
		}
	}
	
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav ul {
			" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_dropdown_bg']) . "
		}
	}
	/* Finish Header Top Navigation Dropdown Background Color */
	
	
	/* Start Header Top Navigation Dropdown Border Color */
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav ul {
			" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_dropdown_border']) . "
		}
	}
	/* Finish Header Top Navigation Dropdown Border Color */
	
	
	/* Start Header Top Navigation Dropdown Link Color */
	.top_line_nav li a {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_dropdown_link']) . "
	}
	/* Finish Header Top Navigation Dropdown Link Color */
	
	
	/* Start Header Top Navigation Dropdown Link Hover Color */
	.top_line_nav li > a:hover,
	.top_line_nav li.current-menu-item > a {
		" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_dropdown_link_hover']) . "
	}
	
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav ul li:hover > a, 
		ul.top_line_nav ul li.current-menu-ancestor > a {
			" . cmsmasters_color_css('color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_dropdown_link_hover']) . "
		}
	}
	/* Finish Header Top Navigation Dropdown Link Hover Color */
	
	
	/* Start Header Top Navigation Dropdown Link Hover Highlight Color */
	.top_line_nav li > a:hover,
	.top_line_nav li.current-menu-item > a {
		" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_dropdown_link_highlight']) . "
	}
	
	@media only screen and (min-width: 1025px) {
		ul.top_line_nav ul li:hover > a,
		ul.top_line_nav ul li.current-menu-ancestor > a {
			" . cmsmasters_color_css('background-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_dropdown_link_highlight']) . "
		}
	}
	/* Finish Header Top Navigation Dropdown Link Hover Highlight Color */
	
	
	/* Start Header Top Navigation Dropdown Link Border Color */
	.top_line_nav li {
		" . cmsmasters_color_css('border-color', $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_dropdown_link_border']) . "
	}
	/* Finish Header Top Navigation Dropdown Link Border Color */

/***************** Finish Header Top Navigation Color Scheme Rules ******************/

";
	
	
	return $custom_css;
}

