<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Likes Functions
 * Changed by CMSMasters
 * 
 */


function cmsmastersLike($class = false, $show = false) {
	$post_ID = get_the_ID();
	
	
	$ip = $_SERVER['REMOTE_ADDR'];
	
	$ip_name = str_replace('.', '-', $ip);
	
	
	$likes = (get_post_meta($post_ID, 'cmsmasters_likes', true) != '') ? get_post_meta($post_ID, 'cmsmasters_likes', true) : '0';
	
	
	$ipPost = new WP_Query(array( 
		'post_type' => 		'cmsmasters_like', 
		'post_status' => 	'draft', 
		'post_parent' => 	$post_ID, 
		'name' => 			$ip_name 
	));
	
	
	$ipCheck = $ipPost->posts;
	
	
	if (isset($_COOKIE['like-' . $post_ID]) || count($ipCheck) != 0) {
		$counter = '<span class="cmsmasters_likes' . ($class ? ' ' . $class : '') . '">' . 
			'<a href="#" onclick="return false;" id="cmsmastersLike-' . esc_attr($post_ID) . '" class="cmsmastersLike active cmsmasters_theme_icon_like">' . 
				'<span>' . esc_html($likes) . '</span>' . 
			'</a>' . 
		'</span>';
	} else {
		$counter = '<span class="cmsmasters_likes' . ($class ? ' ' . $class : '') . '">' . 
			'<a href="#" onclick="cmsmastersLike(' . esc_attr($post_ID) . '); return false;" id="cmsmastersLike-' . esc_attr($post_ID) . '" class="cmsmastersLike cmsmasters_theme_icon_like">' . 
				'<span>' . esc_html($likes) . '</span>' . 
			'</a>' . 
		'</span>';
	}
	
	
	if ($show) {
		echo $counter;
	} else {
		return $counter;
	}
}

