<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Posts Slider Standard Project Format Template
 * Created by CMSMasters
 * 
 */


global $cmsmasters_project_metadata;


$cmsmasters_metadata = explode(',', $cmsmasters_project_metadata);

$title = in_array('title', $cmsmasters_metadata) ? true : false;
$excerpt = (in_array('excerpt', $cmsmasters_metadata) && cmsmasters_slider_post_check_exc_cont('project')) ? true : false;
$categories = (get_the_terms(get_the_ID(), 'pj-categs') && in_array('categories', $cmsmasters_metadata)) ? true : false;
$comments = (comments_open() && in_array('comments', $cmsmasters_metadata)) ? true : false;
$likes = in_array('likes', $cmsmasters_metadata) ? true : false;


$cmsmasters_project_link_url = get_post_meta(get_the_ID(), 'cmsmasters_project_link_url', true);

$cmsmasters_project_link_redirect = get_post_meta(get_the_ID(), 'cmsmasters_project_link_redirect', true);

?>

<!--_________________________ Start Standard Project _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_slider_project'); ?>>
	<div class="cmsmasters_slider_project_outer">
	<?php 
		cmsmasters_thumb_rollover(get_the_ID(), 'project-thumb', false, false, false, false, false, false, false, false, true, $cmsmasters_project_link_redirect, $cmsmasters_project_link_url);
		
		
		if ($title || $categories || $excerpt || $likes || $comments) {
			echo '<div class="cmsmasters_slider_project_inner">';
				
				$title ? cmsmasters_slider_post_heading(get_the_ID(), 'project', 'h4', $cmsmasters_project_link_redirect, $cmsmasters_project_link_url) : '';
				
				
				if ($categories) {
					echo '<div class="cmsmasters_slider_project_cont_info entry-meta">';
						
						cmsmasters_slider_post_category(get_the_ID(), 'pj-categs', 'project');
						
					echo '</div>';
				}
				
				
				$excerpt ? cmsmasters_slider_post_exc_cont('project') : '';
				
				
				if ($likes || $comments) {
					echo '<footer class="cmsmasters_slider_project_footer entry-meta">';
						
						($likes) ? cmsmasters_slider_post_like('project') : '';
						
						($comments) ? cmsmasters_slider_post_comments('project') : '';
						
					echo '</footer>';
				}
				
			echo '</div>';
		}
	?>
	</div>
</article>
<!--_________________________ Finish Standard Project _________________________ -->

