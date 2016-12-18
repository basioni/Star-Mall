<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Blog Post Image Post Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = cmsmasters_get_global_options();


$cmsmasters_post_title = get_post_meta(get_the_ID(), 'cmsmasters_post_title', true);

$cmsmasters_post_image_link = get_post_meta(get_the_ID(), 'cmsmasters_post_image_link', true);


list($cmsmasters_layout) = cmsmasters_theme_page_layout_scheme();

if ($cmsmasters_layout == 'fullwidth') {
	$cmsmasters_image_thumb_size = 'full-masonry-thumb';
} else {
	$cmsmasters_image_thumb_size = 'masonry-thumb';
}

?>

<!--_________________________ Start Image Article _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_open_post'); ?>>
	<?php 
	if (!post_password_required()) {
		if ($cmsmasters_post_image_link != '') {
			cmsmasters_thumb(get_the_ID(), $cmsmasters_image_thumb_size, false, 'img_' . get_the_ID(), true, true, true, true, $cmsmasters_post_image_link);
		} elseif (has_post_thumbnail()) {
			cmsmasters_thumb(get_the_ID(), $cmsmasters_image_thumb_size, false, 'img_' . get_the_ID(), true, true, true, true, false);
		}
	}
	
	
	if ($cmsmasters_post_title == 'true') {
		echo '<header class="cmsmasters_post_header entry-header">' . 
			cmsmasters_post_title_nolink(get_the_ID(), 'h2', false) . 
		'</header>';
	}
	
	
	if (
		$cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_date'] || 
		$cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_author'] || 
		$cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_cat'] 
	) {
		echo '<div class="cmsmasters_post_cont_info entry-meta">';
			
			cmsmasters_post_date('post');
			
			cmsmasters_post_author('post');
			
			cmsmasters_post_category(get_the_ID(), 'category', 'post');
			
		echo '</div>';
	}
	
	
	if (get_the_content() != '') {
		echo '<div class="cmsmasters_post_content entry-content">';
			
			the_content();
			
			
			wp_link_pages(array( 
				'before' => '<div class="subpage_nav" role="navigation">' . '<strong>' . esc_html__('Pages', 'mall') . ':</strong>', 
				'after' => '</div>', 
				'link_before' => ' [ ', 
				'link_after' => ' ] ' 
			));
			
		echo '</div>';
	}
	
	
	if (
		$cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_tag'] || 
		$cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_like'] || 
		$cmsmasters_option[CMSMASTERS_SHORTNAME . '_blog_post_comment'] 
	) {
		echo '<footer class="cmsmasters_post_footer entry-meta">';
			
			cmsmasters_post_tags();
			
			cmsmasters_post_likes('post');
			
			cmsmasters_post_comments('post');
			
		echo '</footer>';
	}
	?>
</article>
<!--_________________________ Finish Image Article _________________________ -->

