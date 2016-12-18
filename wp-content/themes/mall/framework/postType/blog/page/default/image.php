<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Blog Page Default Image Post Format Template
 * Created by CMSMasters
 * 
 */


global $cmsmasters_metadata;


$cmsmasters_post_metadata = explode(',', $cmsmasters_metadata);


$date = (in_array('date', $cmsmasters_post_metadata) || is_home()) ? true : false;
$categories = (get_the_category() && (in_array('categories', $cmsmasters_post_metadata) || is_home())) ? true : false;
$author = (in_array('author', $cmsmasters_post_metadata) || is_home()) ? true : false;
$comments = (comments_open() && (in_array('comments', $cmsmasters_post_metadata) || is_home())) ? true : false;
$likes = (in_array('likes', $cmsmasters_post_metadata) || is_home()) ? true : false;
$more = (in_array('more', $cmsmasters_post_metadata) || is_home()) ? true : false;


$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);

?>

<!--_________________________ Start Image Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_post_default'); ?>>
	<?php 
	if ($date || $likes || $comments) {
		echo '<div class="cmsmasters_post_info entry-meta">';
			
			$date ? cmsmasters_post_date('page', 'default') : '';
			
			$likes ? cmsmasters_post_likes('page') : '';
			
			$comments ? cmsmasters_post_comments('page') : '';
			
		echo '</div>';
	}
	?>
	<div class="cmsmasters_post_cont">
		<?php
		if (!post_password_required()) {
			if ($cmsmasters_post_image_link != '') {
				cmsmasters_thumb(get_the_ID(), 'masonry-thumb', false, 'img_' . get_the_ID(), true, true, true, true, $cmsmasters_post_image_link);
			} elseif (has_post_thumbnail()) {
				cmsmasters_thumb(get_the_ID(), 'masonry-thumb', false, 'img_' . get_the_ID(), true, true, true, true, false);
			}
		}
		
		
		cmsmasters_post_heading(get_the_ID(), 'h3');
		
		
		if ($author || $categories) {
			echo '<div class="cmsmasters_post_cont_info entry-meta">';
				
				$author ? cmsmasters_post_author('page') : '';
				
				$categories ? cmsmasters_post_category(get_the_ID(), 'category', 'page') : '';
				
			echo '</div>';
		}
		
		
		cmsmasters_post_exc_cont();
		
		
		if ($more) {
			echo '<footer class="cmsmasters_post_footer entry-meta">';
				
				$more ? cmsmasters_post_more(get_the_ID()) : '';
				
			echo '</footer>';
		}
		?>
	</div>
</article>
<!--_________________________ Finish Image Article _________________________ -->

