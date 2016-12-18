<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Contact Form Builder
 * @version 	1.2.0
 * 
 * Contact Form Builder Post Type
 * Created by CMSMasters
 * 
 */


class Cmsmasters_Forms {
	function Cmsmasters_Forms() { 
		$template_labels = array( 
			'name' => __('Contact Forms', 'cmsmasters_form_builder'), 
			'singular_name' => __('Contact Form', 'cmsmasters_form_builder') 
		);
		
		
		$template_args = array( 
			'labels' => $template_labels, 
			'public' => false, 
			'capability_type' => 'post', 
			'hierarchical' => false, 
			'exclude_from_search' => true, 
			'publicly_queryable' => false, 
			'show_ui' => false, 
			'show_in_nav_menus' => false 
		);
		
		
		register_post_type('cmsmasters_cform', $template_args);
	}
}


function cmsmasters_forms_init() {
	global $frm;
	
	
	$frm = new Cmsmasters_Forms();
}


add_action('init', 'cmsmasters_forms_init');

