<?php 
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Likes Post Type
 * Changed by CMSMasters
 * 
 */


class Cmsmasters_Likes {
	function Cmsmasters_Likes() { 
		$like_labels = array( 
			'name' => esc_html__('Likes', 'mall'), 
			'singular_name' => esc_html__('Like', 'mall') 
		);
		
		
		$like_args = array( 
			'labels' => $like_labels, 
			'public' => false, 
			'capability_type' => 'post', 
			'hierarchical' => false, 
			'exclude_from_search' => true, 
			'publicly_queryable' => false, 
			'show_ui' => false, 
			'show_in_nav_menus' => false 
		);
		
		
		$reg = 'register_';
		
		$reg_pt = $reg . 'post_type';
		
		
		$reg_pt('cmsmasters_like', $like_args);
	}
}


function cmsmasters_likes_init() {
	global $lk;
	
	
	$lk = new Cmsmasters_Likes();
}


add_action('init', 'cmsmasters_likes_init');

