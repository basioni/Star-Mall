<?php 
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Admin Panel Post, Project, Profile & Donations Campaign Settings
 * Created by CMSMasters
 * 
 */


function cmsmasters_options_single_tabs() {
	$tabs = array();
	
	
	$tabs['post'] = esc_attr__('Post', 'mall');
	
	if (CMSMASTERS_PROJECT_COMPATIBLE && class_exists('Cmsmasters_Projects')) {
		$tabs['project'] = esc_attr__('Project', 'mall');
	}
	
	if (CMSMASTERS_PROFILE_COMPATIBLE && class_exists('Cmsmasters_Profiles')) {
		$tabs['profile'] = esc_attr__('Profile', 'mall');
	}
	
	if (CMSMASTERS_DONATIONS) {
		$tabs['campaign'] = esc_attr__('Campaign', 'mall');
	}
	
	
	return $tabs;
}


function cmsmasters_options_single_sections() {
	$tab = cmsmasters_get_the_tab();
	
	
	switch ($tab) {
	case 'post':
		$sections = array();
		
		$sections['post_section'] = esc_attr__('Blog Post Options', 'mall');
		
		
		break;
	case 'project':
		$sections = array();
		
		$sections['project_section'] = esc_attr__('Portfolio Project Options', 'mall');
		
		
		break;
	case 'profile':
		$sections = array();
		
		$sections['profile_section'] = esc_attr__('Person Block Profile Options', 'mall');
		
		
		break;
	case 'campaign':
		$sections = array();
		
		$sections['campaign_section'] = esc_attr__('Donations Campaign Options', 'mall');
		
		
		break;
	}
	
	
	return $sections;
} 


function cmsmasters_options_single_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = cmsmasters_get_the_tab();
	}
	
	
	$options = array();
	
	
	switch ($tab) {
	case 'post':
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_layout', 
			'title' => esc_html__('Layout Type', 'mall'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_title', 
			'title' => esc_html__('Post Title', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_date', 
			'title' => esc_html__('Post Date', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_cat', 
			'title' => esc_html__('Post Categories', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_author', 
			'title' => esc_html__('Post Author', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_comment', 
			'title' => esc_html__('Post Comments', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_tag', 
			'title' => esc_html__('Post Tags', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_like', 
			'title' => esc_html__('Post Likes', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_nav_box', 
			'title' => esc_html__('Posts Navigation Box', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_share_box', 
			'title' => esc_html__('Sharing Box', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_post_author_box', 
			'title' => esc_html__('About Author Box', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_more_posts_box', 
			'title' => esc_html__('More Posts Box', 'mall'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'popular', 
			'choices' => array( 
				esc_html__('Show Related Posts', 'mall') . '|related', 
				esc_html__('Show Popular Posts', 'mall') . '|popular', 
				esc_html__('Show Recent Posts', 'mall') . '|recent', 
				esc_html__('Hide More Posts Box', 'mall') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_more_posts_count', 
			'title' => esc_html__('More Posts Box Items Number', 'mall'), 
			'desc' => esc_html__('posts', 'mall'), 
			'type' => 'number', 
			'std' => '3', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'post_section', 
			'id' => CMSMASTERS_SHORTNAME . '_blog_more_posts_pause', 
			'title' => esc_html__('More Posts Slider Pause Time', 'mall'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'mall'), 
			'type' => 'number', 
			'std' => '1', 
			'min' => '0', 
			'max' => '20' 
		);
		
		
		break;
	case 'project':
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_title', 
			'title' => esc_html__('Project Title', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_details_title', 
			'title' => esc_html__('Project Details Title', 'mall'), 
			'desc' => esc_html__('Enter a project details block title', 'mall'), 
			'type' => 'text', 
			'std' => 'Project details', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_date', 
			'title' => esc_html__('Project Date', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_cat', 
			'title' => esc_html__('Project Categories', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_author', 
			'title' => esc_html__('Project Author', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_comment', 
			'title' => esc_html__('Project Comments', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_tag', 
			'title' => esc_html__('Project Tags', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_like', 
			'title' => esc_html__('Project Likes', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_link', 
			'title' => esc_html__('Project Link', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_share_box', 
			'title' => esc_html__('Sharing Box', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_nav_box', 
			'title' => esc_html__('Projects Navigation Box', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_author_box', 
			'title' => esc_html__('About Author Box', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_more_projects_box', 
			'title' => esc_html__('More Projects Box', 'mall'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'popular', 
			'choices' => array( 
				esc_html__('Show Related Projects', 'mall') . '|related', 
				esc_html__('Show Popular Projects', 'mall') . '|popular', 
				esc_html__('Show Recent Projects', 'mall') . '|recent', 
				esc_html__('Hide More Projects Box', 'mall') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_more_projects_count', 
			'title' => esc_html__('More Projects Box Items Number', 'mall'), 
			'desc' => esc_html__('projects', 'mall'), 
			'type' => 'number', 
			'std' => '4', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_more_projects_pause', 
			'title' => esc_html__('More Projects Slider Pause Time', 'mall'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'mall'), 
			'type' => 'number', 
			'std' => '1', 
			'min' => '0', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'project_section', 
			'id' => CMSMASTERS_SHORTNAME . '_portfolio_project_slug', 
			'title' => esc_html__('Project Slug', 'mall'), 
			'desc' => esc_html__('Enter a page slug that should be used for your projects single item', 'mall'), 
			'type' => 'text', 
			'std' => 'project', 
			'class' => '' 
		);
		
		
		break;
	case 'profile':
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_post_title', 
			'title' => esc_html__('Profile Title', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_post_details_title', 
			'title' => esc_html__('Profile Details Title', 'mall'), 
			'desc' => esc_html__('Enter a profile details block title', 'mall'), 
			'type' => 'text', 
			'std' => 'Profile details', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_post_cat', 
			'title' => esc_html__('Profile Categories', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_post_comment', 
			'title' => esc_html__('Profile Comments', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_post_like', 
			'title' => esc_html__('Profile Likes', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_post_nav_box', 
			'title' => esc_html__('Profiles Navigation Box', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_post_share_box', 
			'title' => esc_html__('Sharing Box', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'profile_section', 
			'id' => CMSMASTERS_SHORTNAME . '_profile_post_slug', 
			'title' => esc_html__('Profile Slug', 'mall'), 
			'desc' => esc_html__('Enter a page slug that should be used for your profiles single item', 'mall'), 
			'type' => 'text', 
			'std' => 'profile', 
			'class' => '' 
		);
		
		
		break;
	case 'campaign':
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => CMSMASTERS_SHORTNAME . '_donations_campaign_layout', 
			'title' => esc_html__('Layout Type', 'mall'), 
			'desc' => '', 
			'type' => 'radio_img', 
			'std' => 'r_sidebar', 
			'choices' => array( 
				esc_html__('Right Sidebar', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_r.jpg' . '|r_sidebar', 
				esc_html__('Left Sidebar', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/sidebar_l.jpg' . '|l_sidebar', 
				esc_html__('Full Width', 'mall') . '|' . get_template_directory_uri() . '/framework/admin/inc/img/fullwidth.jpg' . '|fullwidth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => CMSMASTERS_SHORTNAME . '_donations_campaign_title', 
			'title' => esc_html__('Campaign Title', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => CMSMASTERS_SHORTNAME . '_donations_campaign_date', 
			'title' => esc_html__('Campaign Date', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => CMSMASTERS_SHORTNAME . '_donations_campaign_cat', 
			'title' => esc_html__('Campaign Categories', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => CMSMASTERS_SHORTNAME . '_donations_campaign_author', 
			'title' => esc_html__('Campaign Author', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => CMSMASTERS_SHORTNAME . '_donations_campaign_comment', 
			'title' => esc_html__('Campaign Comments', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => CMSMASTERS_SHORTNAME . '_donations_campaign_tag', 
			'title' => esc_html__('Campaign Tags', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => CMSMASTERS_SHORTNAME . '_donations_campaign_like', 
			'title' => esc_html__('Campaign Likes', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => CMSMASTERS_SHORTNAME . '_donations_campaign_nav_box', 
			'title' => esc_html__('Campaign Navigation Box', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => CMSMASTERS_SHORTNAME . '_donations_campaign_share_box', 
			'title' => esc_html__('Sharing Box', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => CMSMASTERS_SHORTNAME . '_donations_campaign_author_box', 
			'title' => esc_html__('About Author Box', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => CMSMASTERS_SHORTNAME . '_donations_more_campaigns_box', 
			'title' => esc_html__('More Campaigns Box', 'mall'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'related', 
			'choices' => array( 
				esc_html__('Show Related Campaigns', 'mall') . '|related', 
				esc_html__('Show Popular Campaigns', 'mall') . '|popular', 
				esc_html__('Show Recent Campaigns', 'mall') . '|recent', 
				esc_html__('Hide More Campaigns Box', 'mall') . '|hide' 
			) 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => CMSMASTERS_SHORTNAME . '_donations_more_campaigns_count', 
			'title' => esc_html__('More Campaigns Box Items Number', 'mall'), 
			'desc' => esc_html__('campaigns', 'mall'), 
			'type' => 'number', 
			'std' => '3', 
			'min' => '2', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => CMSMASTERS_SHORTNAME . '_donations_more_campaigns_pause', 
			'title' => esc_html__('More Campaigns Slider Pause Time', 'mall'), 
			'desc' => esc_html__("in seconds, if '0' - autoslide disabled", 'mall'), 
			'type' => 'number', 
			'std' => '0', 
			'min' => '0', 
			'max' => '20' 
		);
		
		$options[] = array( 
			'section' => 'campaign_section', 
			'id' => CMSMASTERS_SHORTNAME . '_donations_campaign_slug', 
			'title' => esc_html__('Campaign Slug', 'mall'), 
			'desc' => esc_html__('Enter a page slug that should be used for your donations campaign single item', 'mall'), 
			'type' => 'text', 
			'std' => 'campaign', 
			'class' => '' 
		);
		
		
		break;
	}
	
	
	return $options;
}

