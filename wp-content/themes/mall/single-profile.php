<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Single Profile Template
 * Created by CMSMasters
 * 
 */


get_header();


$cmsmasters_option = cmsmasters_get_global_options();


$cmsmasters_profile_sharing_box = get_post_meta(get_the_ID(), 'cmsmasters_profile_sharing_box', true);


echo '<!--_________________________ Start Content _________________________ -->' . "\n" . 
'<div class="middle_content entry" role="main">' . "\n\t";


if (have_posts()) : the_post();
	echo '<div class="profiles opened-article">' . "\n";
	
	
	get_template_part('framework/postType/profile/post/standard');

	
	if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_profile_post_nav_box']) {
		cmsmasters_prev_next_posts();
	}
	
	
	if ($cmsmasters_profile_sharing_box == 'true') {
		cmsmasters_sharing_box(esc_html__('Like this profile?', 'mall'), 'h2');
	}
	
	
	comments_template(); 
	
	
	echo '</div>';
endif;


echo '</div>' . "\n" . 
'<!-- _________________________ Finish Content _________________________ -->' . "\n\n";


get_footer();

