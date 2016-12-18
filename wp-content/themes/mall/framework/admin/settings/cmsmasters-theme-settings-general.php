<?php 
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.0
 * 
 * Admin Panel General Options
 * Created by CMSMasters
 * 
 */


function cmsmasters_options_general_tabs() {
	$cmsmasters_option = cmsmasters_get_global_options();
	
	$tabs = array();
	
	$tabs['general'] = esc_attr__('General', 'mall');
	
	if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_theme_layout'] === 'boxed') {
		$tabs['bg'] = esc_attr__('Background', 'mall');
	}
	
	$tabs['header'] = esc_attr__('Header', 'mall');
	$tabs['content'] = esc_attr__('Content', 'mall');
	$tabs['footer'] = esc_attr__('Footer', 'mall');
	
	return $tabs;
}


function cmsmasters_options_general_sections() {
	$tab = cmsmasters_get_the_tab();
	
	switch ($tab) {
	case 'general':
		$sections = array();
		
		$sections['general_section'] = esc_attr__('General Options', 'mall');
		
		break;
	case 'bg':
		$sections = array();
		
		$sections['bg_section'] = esc_attr__('Background Options', 'mall');
		
		break;
	case 'header':
		$sections = array();
		
		$sections['header_section'] = esc_attr__('Header Options', 'mall');
		
		break;
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_attr__('Content Options', 'mall');
		
		break;
	case 'footer':
		$sections = array();
		
		$sections['footer_section'] = esc_attr__('Footer Options', 'mall');
		
		break;
	}
	
	return $sections;
} 


function cmsmasters_options_general_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = cmsmasters_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'general':
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_theme_layout', 
			'title' => esc_html__('Theme Layout', 'mall'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'liquid', 
			'choices' => array( 
				esc_html__('Liquid', 'mall') . '|liquid', 
				esc_html__('Boxed', 'mall') . '|boxed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_type', 
			'title' => esc_html__('Logo Type', 'mall'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'image', 
			'choices' => array( 
				esc_html__('Image', 'mall') . '|image', 
				esc_html__('Text', 'mall') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_url', 
			'title' => esc_html__('Logo Image', 'mall'), 
			'desc' => esc_html__('Choose your website logo image.', 'mall'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_url_retina', 
			'title' => esc_html__('Retina Logo Image', 'mall'), 
			'desc' => esc_html__('Choose logo image for retina displays.', 'mall'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_title', 
			'title' => esc_html__('Logo Title', 'mall'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => ((get_bloginfo('name')) ? get_bloginfo('name') : CMSMASTERS_FULLNAME), 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_subtitle', 
			'title' => esc_html__('Logo Subtitle', 'mall'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => 'nohtml' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_custom_color', 
			'title' => esc_html__('Custom Text Colors', 'mall'), 
			'desc' => esc_html__('enable', 'mall'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_title_color', 
			'title' => esc_html__('Logo Title Color', 'mall'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '' 
		);
		
		$options[] = array( 
			'section' => 'general_section', 
			'id' => CMSMASTERS_SHORTNAME . '_logo_subtitle_color', 
			'title' => esc_html__('Logo Subtitle Color', 'mall'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '' 
		);
		
		break;
	case 'bg':
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_col', 
			'title' => esc_html__('Background Color', 'mall'), 
			'desc' => '', 
			'type' => 'color', 
			'std' => '#ffffff' 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_img', 
			'title' => esc_html__('Background Image', 'mall'), 
			'desc' => esc_html__('Choose your custom website background image url.', 'mall'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_rep', 
			'title' => esc_html__('Background Repeat', 'mall'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				esc_html__('No Repeat', 'mall') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'mall') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'mall') . '|repeat-y', 
				esc_html__('Repeat', 'mall') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_pos', 
			'title' => esc_html__('Background Position', 'mall'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'top center', 
			'choices' => array( 
				esc_html__('Top Left', 'mall') . '|top left', 
				esc_html__('Top Center', 'mall') . '|top center', 
				esc_html__('Top Right', 'mall') . '|top right', 
				esc_html__('Center Left', 'mall') . '|center left', 
				esc_html__('Center Center', 'mall') . '|center center', 
				esc_html__('Center Right', 'mall') . '|center right', 
				esc_html__('Bottom Left', 'mall') . '|bottom left', 
				esc_html__('Bottom Center', 'mall') . '|bottom center', 
				esc_html__('Bottom Right', 'mall') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_att', 
			'title' => esc_html__('Background Attachment', 'mall'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				esc_html__('Scroll', 'mall') . '|scroll', 
				esc_html__('Fixed', 'mall') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'bg_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bg_size', 
			'title' => esc_html__('Background Size', 'mall'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				esc_html__('Auto', 'mall') . '|auto', 
				esc_html__('Cover', 'mall') . '|cover', 
				esc_html__('Contain', 'mall') . '|contain' 
			) 
		);
		
		break;
	case 'header':
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_fixed_header', 
			'title' => esc_html__('Fixed Header', 'mall'), 
			'desc' => esc_html__('enable', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_overlaps', 
			'title' => esc_html__('Header Overlaps Content', 'mall'), 
			'desc' => esc_html__('enable', 'mall'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_top_line', 
			'title' => esc_html__('Top Line', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_top_height', 
			'title' => esc_html__('Top Height', 'mall'), 
			'desc' => esc_html__('pixels', 'mall'), 
			'type' => 'number', 
			'std' => '32', 
			'min' => '30' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_top_line_short_info', 
			'title' => esc_html__('Top Short Info', 'mall'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'mall') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
	if (CMSMASTERS_DONATIONS) {
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_top_line_donations_but', 
			'title' => esc_html__('Top Donations Button', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_top_line_donations_but_text', 
			'title' => esc_html__('Top Donations Button Text', 'mall'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => esc_html__('Donate Now!', 'mall'), 
			'class' => 'nohtml' 
		);
	}
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_top_line_add_cont', 
			'title' => esc_html__('Top Additional Content', 'mall'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'social', 
			'choices' => array( 
				esc_html__('None', 'mall') . '|none', 
				esc_html__('Top Line Social Icons', 'mall') . '|social', 
				esc_html__('Top Line Navigation', 'mall') . '|nav' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_styles', 
			'title' => esc_html__('Header Styles', 'mall'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'default', 
			'choices' => array( 
				esc_html__('Default Style', 'mall') . '|default', 
				esc_html__('Compact Style Left Navigation', 'mall') . '|l_nav', 
				esc_html__('Compact Style Right Navigation', 'mall') . '|r_nav', 
				esc_html__('Compact Style Center Navigation', 'mall') . '|c_nav'
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_mid_height', 
			'title' => esc_html__('Header Middle Height', 'mall'), 
			'desc' => esc_html__('pixels', 'mall'), 
			'type' => 'number', 
			'std' => '108', 
			'min' => '80' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_bot_height', 
			'title' => esc_html__('Header Bottom Height', 'mall'), 
			'desc' => esc_html__('pixels', 'mall'), 
			'type' => 'number', 
			'std' => '50', 
			'min' => '40' 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_search', 
			'title' => esc_html__('Header Search', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
	if (CMSMASTERS_DONATIONS) {
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_donations_but', 
			'title' => esc_html__('Header Donations Button', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_donations_but_text', 
			'title' => esc_html__('Header Donations Button Text', 'mall'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => esc_html__('Donate Now!', 'mall'), 
			'class' => 'nohtml' 
		);
	}
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_add_cont', 
			'title' => esc_html__('Header Additional Content', 'mall'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'social', 
			'choices' => array( 
				esc_html__('None', 'mall') . '|none', 
				esc_html__('Header Social Icons', 'mall') . '|social', 
				esc_html__('Header Custom HTML', 'mall') . '|cust_html' 
			) 
		);
		
		$options[] = array( 
			'section' => 'header_section', 
			'id' => CMSMASTERS_SHORTNAME . '_header_add_cont_cust_html', 
			'title' => esc_html__('Header Custom HTML', 'mall'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'mall') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_layout', 
			'title' => esc_html__('Layout Type by Default', 'mall'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_archives_layout', 
			'title' => esc_html__('Archives Layout Type', 'mall'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_search_layout', 
			'title' => esc_html__('Search Layout Type', 'mall'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
	if (CMSMASTERS_EVENTS_CALENDAR) {
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_events_layout', 
			'title' => esc_html__('Events Calendar Layout Type', 'mall'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'fullwidth', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
	}
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_other_layout', 
			'title' => esc_html__('Other Layout Type', 'mall'), 
			'desc' => 'Layout for pages of non-listed types', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_alignment', 
			'title' => esc_html__('Heading Alignment by Default', 'mall'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'left', 
			'choices' => array( 
				esc_html__('Left', 'mall') . '|left', 
				esc_html__('Right', 'mall') . '|right', 
				esc_html__('Center', 'mall') . '|center' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_scheme', 
			'title' => esc_html__('Heading Custom Color Scheme by Default', 'mall'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'default', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_image_enable', 
			'title' => esc_html__('Heading Background Image Visibility by Default', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_image', 
			'title' => esc_html__('Heading Background Image by Default', 'mall'), 
			'desc' => esc_html__('Choose your custom heading background image by default.', 'mall'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_repeat', 
			'title' => esc_html__('Heading Background Repeat by Default', 'mall'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				esc_html__('No Repeat', 'mall') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'mall') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'mall') . '|repeat-y', 
				esc_html__('Repeat', 'mall') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_attachment', 
			'title' => esc_html__('Heading Background Attachment by Default', 'mall'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				esc_html__('Scroll', 'mall') . '|scroll', 
				esc_html__('Fixed', 'mall') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_size', 
			'title' => esc_html__('Heading Background Size by Default', 'mall'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				esc_html__('Auto', 'mall') . '|auto', 
				esc_html__('Cover', 'mall') . '|cover', 
				esc_html__('Contain', 'mall') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_bg_color', 
			'title' => esc_html__('Heading Background Color Overlay by Default', 'mall'), 
			'desc' => '',  
			'type' => 'rgba', 
			'std' => '' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_heading_height', 
			'title' => esc_html__('Heading Height by Default', 'mall'), 
			'desc' => esc_html__('pixels', 'mall'), 
			'type' => 'number', 
			'std' => '80', 
			'min' => '0' 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_breadcrumbs', 
			'title' => esc_html__('Breadcrumbs Visibility by Default', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bottom_scheme', 
			'title' => esc_html__('Bottom Custom Color Scheme', 'mall'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'first', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bottom_sidebar', 
			'title' => esc_html__('Bottom Sidebar Visibility by Default', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_bottom_sidebar_layout', 
			'title' => esc_html__('Bottom Sidebar Layout by Default', 'mall'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => '14141414', 
			'choices' => array( 
				'1/1|11', 
				'1/2 + 1/2|1212', 
				'1/3 + 2/3|1323', 
				'2/3 + 1/3|2313', 
				'1/4 + 3/4|1434', 
				'3/4 + 1/4|3414', 
				'1/3 + 1/3 + 1/3|131313', 
				'1/2 + 1/4 + 1/4|121414', 
				'1/4 + 1/2 + 1/4|141214', 
				'1/4 + 1/4 + 1/2|141412', 
				'1/4 + 1/4 + 1/4 + 1/4|14141414' 
			) 
		);
		
		break;
	case 'footer':
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_scheme', 
			'title' => esc_html__('Footer Custom Color Scheme', 'mall'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'footer', 
			'choices' => cmsmasters_color_schemes_list() 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_type', 
			'title' => esc_html__('Footer Type', 'mall'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'small', 
			'choices' => array( 
				esc_html__('Default', 'mall') . '|default', 
				esc_html__('Small', 'mall') . '|small' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_additional_content', 
			'title' => esc_html__('Footer Additional Content', 'mall'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'nav', 
			'choices' => array( 
				esc_html__('None', 'mall') . '|none', 
				esc_html__('Footer Navigation', 'mall') . '|nav', 
				esc_html__('Social Icons', 'mall') . '|social', 
				esc_html__('Custom HTML', 'mall') . '|text' 
			) 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_logo', 
			'title' => esc_html__('Footer Logo', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_logo_url', 
			'title' => esc_html__('Footer Logo', 'mall'), 
			'desc' => esc_html__('Choose your website footer logo image.', 'mall'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_logo_url_retina', 
			'title' => esc_html__('Footer Logo for Retina', 'mall'), 
			'desc' => esc_html__('Choose your website footer logo image for retina.', 'mall'), 
			'type' => 'upload', 
			'std' => '|' . get_template_directory_uri() . '/img/logo_footer_retina.png', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_nav', 
			'title' => esc_html__('Footer Navigation', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_social', 
			'title' => esc_html__('Footer Social Icons', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_html', 
			'title' => esc_html__('Footer Custom HTML', 'mall'), 
			'desc' => '<strong>' . esc_html__('HTML tags are allowed!', 'mall') . '</strong>', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'footer_section', 
			'id' => CMSMASTERS_SHORTNAME . '_footer_copyright', 
			'title' => esc_html__('Copyright Text', 'mall'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => CMSMASTERS_FULLNAME . ' &copy; 2015 / ' . esc_html__('All Rights Reserved', 'mall'), 
			'class' => '' 
		);
		
		break;
	}
	
	return $options;	
}

