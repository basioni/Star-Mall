<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.0
 * 
 * Content Composer Sc Name Shortcode
 * Created by CMSMasters
 * 
 */

/* 
	1. Create a separate file for each of the shortcodes that need to be edited. 
	2. Contents of this file will be used to substitute the corresponding code in the shortcodes.php file of the Composer Plugin.
	3. $out variable must contain all the shortcode front-end content
*/


extract(shortcode_atts($new_atts, $atts)); // Extract attrs (start each shortcode file you create with this)


// Shortcode body
