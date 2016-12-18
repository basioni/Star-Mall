<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.1.0
 * 
 * Content Composer Post Type
 * Created by CMSMasters
 * 
 */


class Cmsmasters_Templates {
	function Cmsmasters_Templates() { 
		$template_labels = array( 
			'name' => __('Content Templates', 'cmsmasters_content_composer'), 
			'singular_name' => __('Content Template', 'cmsmasters_content_composer') 
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
		
		
		register_post_type('content_template', $template_args);
	}
}


function cmsmasters_templates_init() {
	global $tpl;
	
	
	$tpl = new Cmsmasters_Templates();
}


add_action('init', 'cmsmasters_templates_init');

