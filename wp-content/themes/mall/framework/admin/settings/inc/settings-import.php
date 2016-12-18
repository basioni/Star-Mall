<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Theme Settings Importer
 * Created by CMSMasters
 * 
 */


$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);

require_once($parse_uri[0] . 'wp-load.php');


if (isset($_POST['settings'])) {
	$base = 'base64_';
	
	$base_d = $base . 'decode';
	
	
	$settings = json_decode($base_d($_POST['settings']), true);
	
	
	foreach ($settings as $name => $value) {
		update_option($name, $value);
	}
	
	
	cmsmasters_regenerate_styles();
}

