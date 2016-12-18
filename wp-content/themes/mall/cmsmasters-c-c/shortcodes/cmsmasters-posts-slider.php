<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.0
 * 
 * Content Composer Posts Slider Shortcode
 * Created by CMSMasters
 * 
 */


extract(shortcode_atts($new_atts, $atts));


$unique_id = uniqid();


global $cmsmasters_post_metadata;

$cmsmasters_post_metadata = $blog_metadata;


global $cmsmasters_project_metadata;

$cmsmasters_project_metadata = $portfolio_metadata;


$args = array( 
	'post_type' => 				$post_type,
	'orderby' => 				$orderby, 
	'order' => 					$order, 
	'posts_per_page' => 		$count, 
	'ignore_sticky_posts' => 	true 
);


if ($post_type == 'post' && $blog_categories != '') {
	$args['category_name'] = $blog_categories;
} elseif ($post_type == 'project' && $portfolio_categories != '') {
	$cat_array = explode(",", $portfolio_categories);
	
	$args['tax_query'] = array(
		array( 
			'taxonomy' => 	'pj-categs', 
			'field' => 		'slug', 
			'terms' => 		$cat_array 
		)
	);
}


$query = new WP_Query($args);


$pause = ($pause == '' ? 0 : $pause);


$out = "";


if ($query->have_posts()) : 
	
	$out .= "<div class=\"cmsmasters_posts_slider" . 
		(($classes != '') ? ' ' . $classes : '') . 
	"\" " . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	">
		<script type=\"text/javascript\">
			jQuery(document).ready(function () { 
				var container = jQuery('.cmsmasters_slider_{$unique_id}');
					containerWidth = container.width(), 
					firstPost = container.find('article'), 
					postMinWidth = Number(firstPost.css('minWidth').replace('px', '')), 
					postThreeColumns = (postMinWidth * 4) - 1;
					postTwoColumns = (postMinWidth * 3) - 1;
					postOneColumns = (postMinWidth * 2) - 1; 
				
				
				jQuery('.cmsmasters_slider_{$unique_id}').owlCarousel( {
					items : {$columns}, 
					itemsDesktop : false,
					itemsDesktopSmall : [postThreeColumns," . (($columns > 3) ? '3' : $columns) . "], 
					itemsTablet : [postTwoColumns," . (($columns > 2) ? '2' : $columns) . "], 
					itemsMobile : [postOneColumns,1], 
					transitionStyle : false, 
					rewindNav : true, 
					slideSpeed : 200, 
					paginationSpeed : 800, 
					rewindSpeed : 1000, " . 
					(($pause == '0') ? 'autoPlay : false, ' : 'autoPlay : ' . ($pause * 1000) . ', ') . 
					"stopOnHover : true, 
					autoHeight : true, 
					addClassActive : true, 
					responsiveBaseWidth : '.cmsmasters_slider_{$unique_id}', 
					pagination : false, 
					navigation : true, 
					navigationText : [ " . 
						'"<span class=\"cmsmasters_prev_arrow\"><span></span></span>", ' . 
						'"<span class=\"cmsmasters_next_arrow\"><span></span></span>" ' . 
					"] 
				} );
			} );
		</script>
		<div id=\"cmsmasters_owl_carousel_{$unique_id}\" class=\"" . 
			'cmsmasters_owl_slider ' . 
			'cmsmasters_slider_' . $unique_id . '">';
			
			
			while ($query->have_posts()) : $query->the_post();
				
				$out .= '<div>';
					
					if (get_post_format() != '') {
						if ($post_type == 'post') {
							$out .= load_template_part('framework/postType/posts-slider/blog/' . get_post_format());
						} elseif ($post_type == 'project') {
							$out .= load_template_part('framework/postType/posts-slider/portfolio/' . get_post_format());
						}
					} else {
						if ($post_type == 'post') {
							$out .= load_template_part('framework/postType/posts-slider/blog/standard');
						} elseif ($post_type == 'project') {
							$out .= load_template_part('framework/postType/posts-slider/portfolio/standard');
						}
					}
					
				$out .= '</div>';
				
			endwhile;
			
			
		$out .= '</div>' . 
	'</div>';

endif;


wp_reset_postdata();


return $out;
