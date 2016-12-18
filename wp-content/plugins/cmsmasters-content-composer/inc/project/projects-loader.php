<?php
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.4.5
 * 
 * Attachments Projects Loader
 * Created by CMSMasters
 * 
 */


$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);

require_once($parse_uri[0] . 'wp-load.php');


if (isset($_POST['offset'])) {
	$layout = $_POST['layout'];
	$layout_mode = $_POST['layoutmode'];
	$orderby = $_POST['orderby'];
	$order = $_POST['order'];
	$count = $_POST['count'];
	$categories = $_POST['categories'];
	$metadata = $_POST['metadata'];
	$offset = $_POST['offset'];
	
	
	$orderby = ($orderby == 'popular') ? 'meta_value_num' : $orderby;
	
	
	$args_all = array( 
		'post_type' => 'project', 
		'orderby' => $orderby, 
		'order' => $order, 
		'posts_per_page' => -1 
	);
	
	
	if ($categories != '') {
		$all_cat_array = explode(',', $categories);
		
		
		$args_all['tax_query'] = array(
			array(
				'taxonomy' => 'pj-categs',
				'field' => 'slug',
				'terms' => $all_cat_array
			)
		);
	}
	
	
	if ($orderby == 'meta_value_num') {
		$args_all['meta_key'] = 'cmsmasters_likes';
	}
	
	
	$cmsmasters_query_all = new WP_Query($args_all);
	
	
	if ($cmsmasters_query_all->post_count <= ($offset + $count)) {
		echo 'finish';
	}
	
	
	wp_reset_query();
	
	
	global $cmsmasters_pj_metadata;
	
	
	$cmsmasters_pj_metadata = $metadata;
	
	
	global $cmsmasters_pj_layout_mode;
	
	
	$cmsmasters_pj_layout_mode = $layout_mode;
	
	
	$args = array( 
		'post_type' => 'project', 
		'orderby' => $orderby, 
		'order' => $order, 
		'posts_per_page' => $count, 
		'offset' => $offset 
	);
	
	
	if ($categories != '') {
		$cat_array = explode(',', $categories);
		
		
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'pj-categs',
				'field' => 'slug',
				'terms' => $cat_array
			)
		);
	}
	
	
	if ($orderby == 'meta_value_num') {
		$args['meta_key'] = 'cmsmasters_likes';
	}
	
	
	$cmsmasters_query = new WP_Query($args);
	
	
	if ($cmsmasters_query->have_posts()) : 
		while ($cmsmasters_query->have_posts()) : $cmsmasters_query->the_post();
			if ($layout == 'puzzle') {
				if (get_post_format() != '') {
					get_template_part('framework/postType/portfolio/page/puzzle/' . get_post_format());
				} else {
					get_template_part('framework/postType/portfolio/page/puzzle/standard');
				}
			} else {
				if (get_post_format() != '') {
					get_template_part('framework/postType/portfolio/page/grid/' . get_post_format());
				} else {
					get_template_part('framework/postType/portfolio/page/grid/standard');
				}
			}
		endwhile;
	endif;
	
	
	wp_reset_query();
}

