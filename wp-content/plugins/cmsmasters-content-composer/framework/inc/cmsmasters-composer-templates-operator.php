<?php
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.4.6
 * 
 * Content Composer Template Operator
 * Created by CMSMasters
 * 
 */


header('Content-type:text/html; charset=utf-8');


define('DOING_AJAX', true);


$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);

require_once($parse_uri[0] . 'wp-load.php');

require_once($parse_uri[0] . 'wp-admin/includes/admin.php');


if (!is_user_logged_in() || !current_user_can('edit_posts')) {
	die(__('You must be logged in to access this script.', 'cmsmasters_content_composer'));
}


global $posts;


if (isset($_POST['type']) && $_POST['type'] == 'add') {
	$name = $_POST['name'];
	$content = stripslashes($_POST['content']);
	
	
	$ins_post_ID = wp_insert_post(array( 
		'post_title' => wp_strip_all_tags($name), 
		'post_name' => generateSlug(wp_strip_all_tags($name), 30), 
		'post_content' => $content, 
		'post_status' => 'publish', 
		'post_type' => 'content_template' 
	));
	
	
	echo '<li>' . 
		'<a href="#" class="cmsmasters_pattern_paste" title="' . __('Load Selected Template', 'cmsmasters_content_composer') . '" data-id="' . $ins_post_ID . '">' . $name . '</a>' . 
		'<a href="#" class="cmsmasters_pattern_delete admin-icon-delete" title="' . __('Delete Selected Template', 'cmsmasters_content_composer') . '" data-id="' . $ins_post_ID . '"></a>' . 
	'</li>';
} elseif (isset($_POST['type']) && $_POST['type'] == 'load') {
	$id = $_POST['id'];
	
	
	$template = get_post($id);
	
	
	echo $template->post_content;
} elseif (isset($_POST['type']) && $_POST['type'] == 'del') {
	$id = $_POST['id'];
	
	
	$template = wp_delete_post($id, true);
	
	
	echo $template->ID;
}

