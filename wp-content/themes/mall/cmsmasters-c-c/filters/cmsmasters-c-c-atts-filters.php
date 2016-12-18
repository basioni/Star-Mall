<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.0
 * 
 * Content Composer Attributes Filters
 * Created by CMSMasters
 * 
 */

/* // Sc Name Shortcode Attributes Filter
add_filter('sc_name_atts_filter', 'sc_name_atts');

function sc_name_atts() { // copy default atts from shortcodes.php in plugin folder, paste here and add custom atts
	return array( 
		'attr_name_1' => 				'attr_std_val_1', 
		'attr_name_2' => 				'attr_std_val_2', 
		'attr_name_3' => 				'attr_std_val_3', 
		...
		'custom_attr_name_1' => 		'custom_attr_val_1', 
		'custom_attr_name_2' => 		'custom_attr_val_2', 
		'custom_attr_name_3' => 		'custom_attr_val_3' 
	);
} */


/* Register Admin Panel JS Scripts */
function register_admin_js_scripts() {
	global $pagenow;
	
	
	if ( 
		$pagenow == 'post-new.php' || 
		($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
	) {
		wp_enqueue_script('composer-shortcodes-extend', get_template_directory_uri() . '/cmsmasters-c-c/js/cmsmasters-c-c-shortcodes-extend.js', array('cmsmasters_composer_shortcodes_js'), '1.0.0', true);
		
		wp_localize_script('composer-shortcodes-extend', 'composer_shortcodes_extend', array( 
			'translate_name_1' => 					esc_attr__('Translate value 1', 'mall'), 
			'translate_name_2' => 					esc_attr__('Translate value 2', 'mall') 
		));
	}
}

add_action('admin_enqueue_scripts', 'register_admin_js_scripts');

