<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Default Page Template
 * Created by CMSMasters
 * 
 */


get_header();


list($cmsmasters_layout) = cmsmasters_theme_page_layout_scheme();


echo '<!--_________________________ Start Content _________________________ -->' . "\n";


if ($cmsmasters_layout == 'r_sidebar') {
	echo '<div class="content entry" role="main">' . "\n\t";
} elseif ($cmsmasters_layout == 'l_sidebar') {
	echo '<div class="content entry fr" role="main">' . "\n\t";
} else {
	echo '<div class="middle_content entry" role="main">' . "\n\t";
}


if (have_posts()) : the_post();
	$content_start = substr(get_post_field('post_content', get_the_ID()), 0, 15);
	
	
	if ($cmsmasters_layout == 'fullwidth' && $content_start === '[cmsmasters_row') {
		echo '</div>' . 
		'</div>';
	}
	
	
	the_content();
	
	echo '<div class="cl"></div>';
	
	
	if ($cmsmasters_layout == 'fullwidth' && $content_start === '[cmsmasters_row') {
		echo '<div class="content_wrap ' . $cmsmasters_layout . 
		((is_singular('project')) ? ' project_page' : '') . 
		((is_singular('profile')) ? ' profile_page' : '') . 
		'">' . "\n\n" . 
			'<div class="middle_content entry" role="main">' . "\n\t";
	}
	
	
	wp_link_pages(array( 
		'before' => '<div class="subpage_nav" role="navigation">' . '<strong>' . esc_html__('Pages', 'mall') . ':</strong>', 
		'after' => '</div>' . "\n", 
		'link_before' => ' [ ', 
		'link_after' => ' ] ' 
	));
	
	
	comments_template();
endif;


echo '</div>' . "\n" . 
'<!-- _________________________ Finish Content _________________________ -->' . "\n\n";


if ($cmsmasters_layout == 'r_sidebar') {
	echo "\n" . '<!-- _________________________ Start Sidebar _________________________ -->' . "\n" . 
	'<div class="sidebar" role="complementary">' . "\n";
	
	get_sidebar();
	
	echo "\n" . '</div>' . "\n" . 
	'<!-- _________________________ Finish Sidebar _________________________ -->' . "\n";
} elseif ($cmsmasters_layout == 'l_sidebar') {
	echo "\n" . '<!-- _________________________ Start Sidebar _________________________ -->' . "\n" . 
	'<div class="sidebar fl" role="complementary">' . "\n";
	
	get_sidebar();
	
	echo "\n" . '</div>' . "\n" . 
	'<!-- _________________________ Finish Sidebar _________________________ -->' . "\n";
}


get_footer();

