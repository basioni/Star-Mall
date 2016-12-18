<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Profiles Page Vertical Profile Format Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_profile_social = get_post_meta(get_the_ID(), 'cmsmasters_profile_social', true);

$cmsmasters_profile_subtitle = get_post_meta(get_the_ID(), 'cmsmasters_profile_subtitle', true);

?>

<!--_________________________ Start Vertical Profile _________________________ -->

<article id="post-<?php the_ID(); ?>" <?php post_class('cmsmasters_profile_vertical'); ?>>
	<div class="profile_outer">
	<?php
	if (has_post_thumbnail()) {
		cmsmasters_thumb(get_the_ID(), 'square-thumb', true, false, false, false, false);
	}
	
	
	echo '<div class="profile_inner">';
		
		cmsmasters_profile_heading(get_the_ID(), 'h3', $cmsmasters_profile_subtitle, 'h5');
		
		cmsmasters_profile_exc_cont();
		
		cmsmasters_profile_social_icons($cmsmasters_profile_social);
		
	echo '</div>';
	?>
	</div>
</article>
<!--_________________________ Finish Vertical Profile _________________________ -->

