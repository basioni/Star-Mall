<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Posts Slider Image Post Format Template
 * Created by CMSMasters
 * 
 */


global $cmsmasters_post_metadata;


$cmsmasters_metadata = explode(',', $cmsmasters_post_metadata);

$title = in_array('title', $cmsmasters_metadata) ? true : false;
$excerpt = (in_array('excerpt', $cmsmasters_metadata) && cmsmasters_slider_post_check_exc_cont('post')) ? true : false;
$date = in_array('date', $cmsmasters_metadata) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_metadata))) ? true : false;
$author = in_array('author', $cmsmasters_metadata) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_metadata))) ? true : false;
$likes = in_array('likes', $cmsmasters_metadata) ? true : false;
$more = in_array('more', $cmsmasters_metadata) ? true : false;

?>

<!--_________________________ Start Image Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_slider_post'); ?>>
	<div class="cmsmasters_slider_post_outer">
	<?php
		echo '<div class="cmsmasters_slider_post_date_img_wrap">';
		
			cmsmasters_thumb_rollover(get_the_ID(), 'project-thumb', false, false, false, false, false, false, false, false, true, false, false);
			
			$date ? cmsmasters_slider_post_date('post') : '';
		
		echo '</div>';
		
		
		if ($title || $author || $categories || $excerpt || $likes || $comments || $more) {
			echo '<div class="cmsmasters_slider_post_inner">';
				
				$title ? cmsmasters_slider_post_heading(get_the_ID(), 'post', 'h4') : '';
				
				
				if ($author || $categories) {
					echo '<div class="cmsmasters_slider_post_cont_info entry-meta">';
						
						$author ? cmsmasters_slider_post_author('post') : '';
						
						$categories ? cmsmasters_slider_post_category(get_the_ID(), 'category', 'post') : '';
						
					echo '</div>';
				}
				
				
				$excerpt ? cmsmasters_slider_post_exc_cont('post') : '';
				
				
				if ($more || $likes || $comments) {
					echo '<footer class="cmsmasters_slider_post_footer entry-meta">';
						
						$more ? cmsmasters_slider_post_more('post') : '';
						
						$likes ? cmsmasters_slider_post_like('post') : '';
						
						$comments ? cmsmasters_slider_post_comments('post') : '';
						
					echo '</footer>';
				}
				
			echo '</div>';
		}
	?>
	</div>
</article>
<!--_________________________ Finish Image Article _________________________ -->

