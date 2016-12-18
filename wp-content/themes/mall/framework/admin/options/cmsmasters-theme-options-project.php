<?php 
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.0
 * 
 * Project Options Functions
 * Created by CMSMasters
 * 
 */


if (!function_exists('get_custom_project_meta_fields')) {
function get_custom_project_meta_fields() {
	$cmsmasters_option = cmsmasters_get_global_options();
	
	
	$cmsmasters_global_bottom_sidebar = (isset($cmsmasters_option[CMSMASTERS_SHORTNAME . '_bottom_sidebar']) && $cmsmasters_option[CMSMASTERS_SHORTNAME . '_bottom_sidebar'] !== '') ? (($cmsmasters_option[CMSMASTERS_SHORTNAME . '_bottom_sidebar'] == 1) ? 'true' : 'false') : 'true';
	
	$cmsmasters_global_bottom_sidebar_layout = (isset($cmsmasters_option[CMSMASTERS_SHORTNAME . '_bottom_sidebar_layout'])) ? $cmsmasters_option[CMSMASTERS_SHORTNAME . '_bottom_sidebar_layout'] : '14141414';
	
	$cmsmasters_global_bg = (isset($cmsmasters_option[CMSMASTERS_SHORTNAME . '_theme_layout']) && $cmsmasters_option[CMSMASTERS_SHORTNAME . '_theme_layout'] === 'boxed') ? true : false;
	
	
	$cmsmasters_global_portfolio_project_title = (isset($cmsmasters_option[CMSMASTERS_SHORTNAME . '_portfolio_project_title']) && $cmsmasters_option[CMSMASTERS_SHORTNAME . '_portfolio_project_title'] !== '') ? (($cmsmasters_option[CMSMASTERS_SHORTNAME . '_portfolio_project_title'] == 1) ? 'true' : 'false') : 'true';
	
	$cmsmasters_global_portfolio_project_details_title = (isset($cmsmasters_option[CMSMASTERS_SHORTNAME . '_portfolio_project_details_title']) && $cmsmasters_option[CMSMASTERS_SHORTNAME . '_portfolio_project_details_title'] !== '') ? $cmsmasters_option[CMSMASTERS_SHORTNAME . '_portfolio_project_details_title'] : esc_html__('Project details', 'mall');
	
	$cmsmasters_global_portfolio_project_share_box = (isset($cmsmasters_option[CMSMASTERS_SHORTNAME . '_portfolio_project_share_box']) && $cmsmasters_option[CMSMASTERS_SHORTNAME . '_portfolio_project_share_box'] !== '') ? (($cmsmasters_option[CMSMASTERS_SHORTNAME . '_portfolio_project_share_box'] == 1) ? 'true' : 'false') : 'true';
	
	$cmsmasters_global_portfolio_project_author_box = (isset($cmsmasters_option[CMSMASTERS_SHORTNAME . '_portfolio_project_author_box']) && $cmsmasters_option[CMSMASTERS_SHORTNAME . '_portfolio_project_author_box'] !== '') ? (($cmsmasters_option[CMSMASTERS_SHORTNAME . '_portfolio_project_author_box'] == 1) ? 'true' : 'false') : 'true';
	
	$cmsmasters_global_portfolio_more_projects_box = (isset($cmsmasters_option[CMSMASTERS_SHORTNAME . '_portfolio_more_projects_box'])) ? $cmsmasters_option[CMSMASTERS_SHORTNAME . '_portfolio_more_projects_box'] : 'related';
	
	
	$cmsmasters_option_name = 'cmsmasters_project_';
	
	
	$tabs_array = array();
	
	
	$tabs_array['cmsmasters_project'] = array( 
		'label' => esc_html__('Project', 'mall'), 
		'value'	=> 'cmsmasters_project' 
	);
	
	
	$tabs_array['cmsmasters_layout'] = array( 
		'label' => esc_html__('Layout', 'mall'), 
		'value'	=> 'cmsmasters_layout' 
	);
	
	
	if ($cmsmasters_global_bg) {
		$tabs_array['cmsmasters_bg'] = array( 
			'label' => esc_html__('Background', 'mall'), 
			'value'	=> 'cmsmasters_bg' 
		);
	}
	
	
	$tabs_array['cmsmasters_heading'] = array( 
		'label' => esc_html__('Heading', 'mall'), 
		'value'	=> 'cmsmasters_heading' 
	);
	
	
	$custom_project_meta_fields = array( 
		array( 
			'id'	=> 'cmsmasters_project_images', 
			'type'	=> 'content_start', 
			'box'	=> 'true', 
			'hide'	=> 'true' 
		), 
		array( 
			'label'	=> esc_html__('Project Images', 'mall'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'images', 
			'type'	=> 'images_list', 
			'hide'	=> '', 
			'std'	=> '', 
			'frame' => 'post', 
			'multiple' => true 
		), 
		array( 
			'label'	=> esc_html__('Number of Columns', 'mall'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'columns', 
			'type'	=> 'radio', 
			'hide'	=> 'true', 
			'std'	=> 'three', 
			'options' => array( 
				'three' => array( 
					'label' => esc_html__('Three', 'mall'), 
					'value'	=> 'three' 
				), 
				'two' => array( 
					'label' => esc_html__('Two', 'mall'), 
					'value'	=> 'two' 
				), 
				'one' => array( 
					'label' => esc_html__('One', 'mall'), 
					'value'	=> 'one' 
				) 
			) 
		),
		array( 
			'id'	=> 'cmsmasters_project_images', 
			'type'	=> 'content_finish' 
		), 
		array( 
			'id'	=> 'cmsmasters_project_video', 
			'type'	=> 'content_start', 
			'box'	=> 'true', 
			'hide'	=> 'true' 
		), 
		array( 
			'label'	=> esc_html__('Video Type', 'mall'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'video_type', 
			'type'	=> 'radio', 
			'hide'	=> '', 
			'std'	=> 'embedded', 
			'options' => array( 
				'embedded' => array( 
					'label' => esc_html__('Embedded (YouTube, Vimeo)', 'mall'), 
					'value'	=> 'embedded' 
				), 
				'selfhosted' => array( 
					'label' => esc_html__('Self-Hosted', 'mall'), 
					'value'	=> 'selfhosted' 
				) 
			) 
		), 
		array( 
			'label'	=> esc_html__('Embedded Video Link', 'mall'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'video_link', 
			'type'	=> 'text_long', 
			'hide'	=> 'true', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Self-Hosted Video Links', 'mall'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'video_links', 
			'type'	=> 'repeatable', 
			'hide'	=> 'true', 
			'std'	=> '' 
		), 
		array( 
			'id'	=> 'cmsmasters_project_video', 
			'type'	=> 'content_finish' 
		), 
		array( 
			'id'	=> $cmsmasters_option_name . 'tabs', 
			'type'	=> 'tabs', 
			'std'	=> 'cmsmasters_project', 
			'options' => $tabs_array 
		), 
		array( 
			'id'	=> 'cmsmasters_project', 
			'type'	=> 'tab_start', 
			'std'	=> 'true' 
		), 
		array( 
			'label'	=> esc_html__('Project Title', 'mall'), 
			'desc'	=> esc_html__('Show', 'mall'), 
			'id'	=> $cmsmasters_option_name . 'title', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> $cmsmasters_global_portfolio_project_title 
		), 
		array( 
			'label'	=> esc_html__('Project Size', 'mall'), 
			'desc'	=> esc_html__('Recomended Featured Image dimensions', 'mall') . ' - ', 
			'id'	=> $cmsmasters_option_name . 'size', 
			'type'	=> 'radio_img_pj', 
			'hide'	=> '', 
			'std'	=> 'one_x_one', 
			'options' => array( 
				'one_x_one' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/one_x_one.jpg', 
					'size' => '580 x 580', 
					'label' => '1 x 1', 
					'value'	=> 'one_x_one' 
				), 
				'one_x_two' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/one_x_two.jpg', 
					'size' => '580 x 1160', 
					'label' => '1 x 2', 
					'value'	=> 'one_x_two' 
				), 
				'one_x_three' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/one_x_three.jpg', 
					'size' => '580 x 1740', 
					'label' => '1 x 3', 
					'value'	=> 'one_x_three' 
				), 
				'two_x_one' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/two_x_one.jpg', 
					'size' => '580 x 290', 
					'label' => '2 x 1', 
					'value'	=> 'two_x_one' 
				), 
				'two_x_two' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/two_x_two.jpg', 
					'size' => '580 x 580', 
					'label' => '2 x 2', 
					'value'	=> 'two_x_two' 
				), 
				'two_x_three' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/two_x_three.jpg', 
					'size' => '580 x 870', 
					'label' => '2 x 3', 
					'value'	=> 'two_x_three' 
				), 
				'three_x_one' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/three_x_one.jpg', 
					'size' => '870 x 290', 
					'label' => '3 x 1', 
					'value'	=> 'three_x_one' 
				), 
				'three_x_two' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/three_x_two.jpg', 
					'size' => '870 x 580', 
					'label' => '3 x 2', 
					'value'	=> 'three_x_two' 
				), 
				'three_x_three' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/three_x_three.jpg', 
					'size' => '870 x 870', 
					'label' => '3 x 3', 
					'value'	=> 'three_x_three' 
				), 
				'four_x_four' => array( 
					'img'	=> get_template_directory_uri() . '/framework/admin/inc/img/four_x_four.jpg', 
					'size' => '1160 x 1160', 
					'label' => '4 x 4', 
					'value'	=> 'four_x_four' 
				) 
			) 
		), 
		array( 
			'label'	=> esc_html__('Project Details Title', 'mall'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'details_title', 
			'type'	=> 'text_long', 
			'hide'	=> '', 
			'std'	=> $cmsmasters_global_portfolio_project_details_title 
		), 
		array( 
			'label'	=> esc_html__('Project Info', 'mall'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'features', 
			'type'	=> 'repeatable_multiple', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__("Project Link Text", 'mall'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'link_text', 
			'type'	=> 'text', 
			'hide'	=> '', 
			'std'	=> esc_html__('View Project', 'mall') 
		), 
		array( 
			'label'	=> esc_html__("Project Link URL", 'mall'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'link_url', 
			'type'	=> 'text_long', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> '', 
			'desc'	=> esc_html__('Redirect to project link URL instead of opening project page', 'mall'), 
			'id'	=> $cmsmasters_option_name . 'link_redirect', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> 'true' 
		), 
		array( 
			'label'	=> esc_html__("Project Link Target", 'mall'), 
			'desc'	=> esc_html__('Open link in a new tab', 'mall'), 
			'id'	=> $cmsmasters_option_name . 'link_target', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> 'true' 
		), 
		array( 
			'label'	=> esc_html__('Project Features 1 Title', 'mall'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'features_one_title', 
			'type'	=> 'text_long', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Project Features 1', 'mall'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'features_one', 
			'type'	=> 'repeatable_multiple', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Project Features 2 Title', 'mall'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'features_two_title', 
			'type'	=> 'text_long', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Project Features 2', 'mall'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'features_two', 
			'type'	=> 'repeatable_multiple', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Project Features 3 Title', 'mall'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'features_three_title', 
			'type'	=> 'text_long', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Project Features 3', 'mall'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'features_three', 
			'type'	=> 'repeatable_multiple', 
			'hide'	=> '', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Sharing Box', 'mall'), 
			'desc'	=> esc_html__('Show', 'mall'), 
			'id'	=> $cmsmasters_option_name . 'sharing_box', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> $cmsmasters_global_portfolio_project_share_box 
		), 
		array( 
			'label'	=> esc_html__('About Author Box', 'mall'), 
			'desc'	=> esc_html__('Show', 'mall'), 
			'id'	=> $cmsmasters_option_name . 'author_box', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> $cmsmasters_global_portfolio_project_author_box 
		), 
		array( 
			'label'	=> esc_html__('More Posts Box', 'mall'), 
			'desc'	=> '', 
			'id'	=> $cmsmasters_option_name . 'more_posts', 
			'type'	=> 'select', 
			'hide'	=> '', 
			'std'	=> $cmsmasters_global_portfolio_more_projects_box, 
			'options' => array( 
				'related' => array( 
					'label' => esc_html__('Show Related Tab', 'mall'), 
					'value'	=> 'related' 
				), 
				'popular' => array( 
					'label' => esc_html__('Show Popular Tab', 'mall'), 
					'value'	=> 'popular' 
				), 
				'recent' => array( 
					'label' => esc_html__('Show Recent Tab', 'mall'), 
					'value'	=> 'recent' 
				), 
				'hide' => array( 
					'label' => esc_html__('Hide More Posts Box', 'mall'), 
					'value'	=> 'hide' 
				) 
			) 
		), 
		array( 
			'id'	=> 'cmsmasters_project', 
			'type'	=> 'tab_finish' 
		), 
		array( 
			'id'	=> 'cmsmasters_layout', 
			'type'	=> 'tab_start', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Page Color Scheme', 'mall'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_page_scheme', 
			'type'	=> 'select_scheme', 
			'hide'	=> 'false', 
			'std'	=> 'default' 
		), 
		array( 
			'label'	=> esc_html__('Bottom Sidebar', 'mall'), 
			'desc'	=> esc_html__('Show', 'mall'), 
			'id'	=> 'cmsmasters_bottom_sidebar', 
			'type'	=> 'checkbox', 
			'hide'	=> '', 
			'std'	=> $cmsmasters_global_bottom_sidebar 
		), 
		array( 
			'label'	=> esc_html__('Choose Bottom Sidebar', 'mall'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_bottom_sidebar_id', 
			'type'	=> 'select_sidebar', 
			'hide'	=> 'true', 
			'std'	=> '' 
		), 
		array( 
			'label'	=> esc_html__('Choose Bottom Sidebar Layout', 'mall'), 
			'desc'	=> '', 
			'id'	=> 'cmsmasters_bottom_sidebar_layout', 
			'type'	=> 'select', 
			'hide'	=> 'true', 
			'std'	=> $cmsmasters_global_bottom_sidebar_layout, 
			'options' => array( 
				'11' => array( 
					'label' => '1/1',
					'value'	=> '11' 
				), 
				'1212' => array( 
					'label' => '1/2 + 1/2',
					'value'	=> '1212' 
				), 
				'1323' => array( 
					'label' => '1/3 + 2/3',
					'value'	=> '1323' 
				), 
				'2313' => array( 
					'label' => '2/3 + 1/3',
					'value'	=> '2313' 
				), 
				'1434' => array( 
					'label' => '1/4 + 3/4',
					'value'	=> '1434' 
				), 
				'3414' => array( 
					'label' => '3/4 + 1/4',
					'value'	=> '3414' 
				), 
				'131313' => array( 
					'label' => '1/3 + 1/3 + 1/3',
					'value'	=> '131313' 
				), 
				'121414' => array( 
					'label' => '1/2 + 1/4 + 1/4',
					'value'	=> '121414' 
				), 
				'141214' => array( 
					'label' => '1/4 + 1/2 + 1/4',
					'value'	=> '141214' 
				), 
				'141412' => array( 
					'label' => '1/4 + 1/4 + 1/2',
					'value'	=> '141412' 
				), 
				'14141414' => array( 
					'label' => '1/4 + 1/4 + 1/4 + 1/4',
					'value'	=> '14141414' 
				) 
			) 
		), 
		array( 
			'id'	=> 'cmsmasters_layout', 
			'type'	=> 'tab_finish' 
		) 
	);
	
	
	return $custom_project_meta_fields;
}
}

