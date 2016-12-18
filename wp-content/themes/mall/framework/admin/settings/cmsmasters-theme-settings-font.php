<?php 
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Admin Panel Fonts Options
 * Created by CMSMasters
 * 
 */


function cmsmasters_options_font_tabs() {
	$tabs = array();
	
	$tabs['content'] = esc_attr__('Content', 'mall');
	$tabs['link'] = esc_attr__('Links', 'mall');
	$tabs['nav'] = esc_attr__('Navigation', 'mall');
	$tabs['heading'] = esc_attr__('Heading', 'mall');
	$tabs['other'] = esc_attr__('Other', 'mall');
	
	return $tabs;
}


function cmsmasters_options_font_sections() {
	$tab = cmsmasters_get_the_tab();
	
	switch ($tab) {
	case 'content':
		$sections = array();
		
		$sections['content_section'] = esc_html__('Content Font Options', 'mall');
		
		break;
	case 'link':
		$sections = array();
		
		$sections['link_section'] = esc_html__('Links Font Options', 'mall');
		
		break;
	case 'nav':
		$sections = array();
		
		$sections['nav_section'] = esc_html__('Navigation Font Options', 'mall');
		
		break;
	case 'heading':
		$sections = array();
		
		$sections['heading_section'] = esc_html__('Headings Font Options', 'mall');
		
		break;
	case 'other':
		$sections = array();
		
		$sections['other_section'] = esc_html__('Other Fonts Options', 'mall');
		
		break;
	}
	
	return $sections;
} 


function cmsmasters_options_font_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = cmsmasters_get_the_tab();
	}
	
	
	$cmsmasters_option = cmsmasters_get_global_options();
	
	
	$options = array();
	
	switch ($tab) {
	case 'content':
		$options[] = array( 
			'section' => 'content_section', 
			'id' => CMSMASTERS_SHORTNAME . '_content_font', 
			'title' => esc_html__('Main Content Font', 'mall'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;
	case 'link':
		$options[] = array( 
			'section' => 'link_section', 
			'id' => CMSMASTERS_SHORTNAME . '_link_font', 
			'title' => esc_html__('Links Font', 'mall'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'link_section', 
			'id' => CMSMASTERS_SHORTNAME . '_link_hover_decoration', 
			'title' => esc_html__('Links Hover Text Decoration', 'mall'), 
			'desc' => '', 
			'type' => 'select_scheme', 
			'std' => 'none', 
			'choices' => cmsmasters_text_decoration_list() 
		);
		
		break;
	case 'nav':
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => CMSMASTERS_SHORTNAME . '_nav_title_font', 
			'title' => esc_html__('Navigation Title Font', 'mall'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'15', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'nav_section', 
			'id' => CMSMASTERS_SHORTNAME . '_nav_dropdown_font', 
			'title' => esc_html__('Navigation Dropdown Font', 'mall'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'13', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		break;
	case 'heading':
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => CMSMASTERS_SHORTNAME . '_h1_font', 
			'title' => esc_html__('H1 Tag Font', 'mall'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'30', 
				'line_height' => 		'36', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => CMSMASTERS_SHORTNAME . '_h2_font', 
			'title' => esc_html__('H2 Tag Font', 'mall'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'24', 
				'line_height' => 		'30', 
				'font_weight' => 		'bold', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => CMSMASTERS_SHORTNAME . '_h3_font', 
			'title' => esc_html__('H3 Tag Font', 'mall'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'18', 
				'line_height' => 		'24', 
				'font_weight' => 		'600', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => CMSMASTERS_SHORTNAME . '_h4_font', 
			'title' => esc_html__('H4 Tag Font', 'mall'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'16', 
				'line_height' => 		'22', 
				'font_weight' => 		'600', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => CMSMASTERS_SHORTNAME . '_h5_font', 
			'title' => esc_html__('H5 Tag Font', 'mall'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'20', 
				'font_weight' => 		'600', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		$options[] = array( 
			'section' => 'heading_section', 
			'id' => CMSMASTERS_SHORTNAME . '_h6_font', 
			'title' => esc_html__('H6 Tag Font', 'mall'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'12', 
				'line_height' => 		'20', 
				'font_weight' => 		'600', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none', 
				'text_decoration' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform', 
				'text_decoration' 
			) 
		);
		
		break;
	case 'other':
		$options[] = array( 
			'section' => 'other_section', 
			'id' => CMSMASTERS_SHORTNAME . '_button_font', 
			'title' => esc_html__('Button Font', 'mall'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'38', 
				'font_weight' => 		'600', 
				'font_style' => 		'normal', 
				'text_transform' => 	'uppercase' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => CMSMASTERS_SHORTNAME . '_small_font', 
			'title' => esc_html__('Small Tag Font', 'mall'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'11', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'normal', 
				'text_transform' => 	'none' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style', 
				'text_transform' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => CMSMASTERS_SHORTNAME . '_input_font', 
			'title' => esc_html__('Text Fields Font', 'mall'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'14', 
				'line_height' => 		'20', 
				'font_weight' => 		'normal', 
				'font_style' => 		'italic' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		$options[] = array( 
			'section' => 'other_section', 
			'id' => CMSMASTERS_SHORTNAME . '_quote_font', 
			'title' => esc_html__('Blockquote Font', 'mall'), 
			'desc' => '', 
			'type' => 'typorgaphy', 
			'std' => array( 
				'system_font' => 		"Arial, Helvetica, 'Nimbus Sans L', sans-serif", 
				'google_font' => 		'Titillium+Web:300,300italic,400,400italic,600,600italic,700,700italic', 
				'font_size' => 			'18', 
				'line_height' => 		'30', 
				'font_weight' => 		'600', 
				'font_style' => 		'normal' 
			), 
			'choices' => array( 
				'system_font', 
				'google_font', 
				'font_size', 
				'line_height', 
				'font_weight', 
				'font_style' 
			) 
		);
		
		break;
	}
	
	return $options;	
}

