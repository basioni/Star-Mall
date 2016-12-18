<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.3.0
 * 
 * Composer Functions
 * Created by CMSMasters
 * 
 */


function cmsmasters_composer_load_template($template_name, $args = array()) {
	$template = locate_template($template_name);
	
	
	if (is_array($args) && !empty($args)) {
		extract($args);
	}
	
	
	include($template);
	
	
	return $out;
}

