<?php 
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Admin Panel Theme Settings Import/Export
 * Created by CMSMasters
 * 
 */


function cmsmasters_options_demo_tabs() {
	$tabs = array();
	
	
	$tabs['import'] = esc_attr__('Import', 'mall');
	$tabs['export'] = esc_attr__('Export', 'mall');
	
	
	return $tabs;
}


function cmsmasters_options_demo_sections() {
	$tab = cmsmasters_get_the_tab();
	
	
	switch ($tab) {
	case 'import':
		$sections = array();
		
		$sections['import_section'] = esc_html__('Theme Settings Import', 'mall');
		
		
		break;
	case 'export':
		$sections = array();
		
		$sections['export_section'] = esc_html__('Theme Settings Export', 'mall');
		
		
		break;
	}
	
	
	return $sections;
} 


function cmsmasters_options_demo_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = cmsmasters_get_the_tab();
	}
	
	
	$options = array();
	
	
	switch ($tab) {
	case 'import':
		$options[] = array( 
			'section' => 'import_section', 
			'id' => CMSMASTERS_SHORTNAME . '_demo_import', 
			'title' => esc_html__('Theme Settings', 'mall'), 
			'desc' => esc_html__("Enter your theme settings data here and click 'Import' button", 'mall'), 
			'type' => 'textarea', 
			'std' => '', 
			'class' => '' 
		);
		
		
		break;
	case 'export':
		$options[] = array( 
			'section' => 'export_section', 
			'id' => CMSMASTERS_SHORTNAME . '_demo_export', 
			'title' => esc_html__('Theme Settings', 'mall'), 
			'desc' => esc_html__("Click here to export your theme settings data to the file", 'mall'), 
			'type' => 'button', 
			'std' => esc_html__('Export Theme Settings', 'mall'), 
			'class' => 'cmsmasters-demo-export' 
		);
		
		
		break;
	}
	
	
	return $options;	
}

