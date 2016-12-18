<?php 
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.0
 * 
 * Admin Panel Element Options
 * Created by CMSMasters
 * 
 */


function cmsmasters_options_element_tabs() {
	$tabs = array();
	
	$tabs['sidebar'] = esc_attr__('Sidebars', 'mall');
	$tabs['icon'] = esc_attr__('Social Icons', 'mall');
	$tabs['lightbox'] = esc_attr__('Lightbox', 'mall');
	$tabs['sitemap'] = esc_attr__('Sitemap', 'mall');
	$tabs['error'] = esc_attr__('404', 'mall');
	$tabs['code'] = esc_attr__('Custom Codes', 'mall');
	
	if (class_exists('Cmsmasters_Form_Builder')) {
		$tabs['recaptcha'] = esc_attr__('reCAPTCHA', 'mall');
	}
	
	return $tabs;
}


function cmsmasters_options_element_sections() {
	$tab = cmsmasters_get_the_tab();
	
	switch ($tab) {
	case 'sidebar':
		$sections = array();
		
		$sections['sidebar_section'] = esc_attr__('Custom Sidebars', 'mall');
		
		break;
	case 'icon':
		$sections = array();
		
		$sections['icon_section'] = esc_attr__('Social Icons', 'mall');
		
		break;
	case 'lightbox':
		$sections = array();
		
		$sections['lightbox_section'] = esc_attr__('Theme Lightbox Options', 'mall');
		
		break;
	case 'sitemap':
		$sections = array();
		
		$sections['sitemap_section'] = esc_attr__('Sitemap Page Options', 'mall');
		
		break;
	case 'error':
		$sections = array();
		
		$sections['error_section'] = esc_attr__('404 Error Page Options', 'mall');
		
		break;
	case 'code':
		$sections = array();
		
		$sections['code_section'] = esc_attr__('Custom Codes', 'mall');
		
		break;
	case 'recaptcha':
		$sections = array();
		
		$sections['recaptcha_section'] = esc_attr__('Form Builder Plugin reCAPTCHA Keys', 'mall');
		
		break;
	}
	
	return $sections;	
} 


function cmsmasters_options_element_fields($set_tab = false) {
	if ($set_tab) {
		$tab = $set_tab;
	} else {
		$tab = cmsmasters_get_the_tab();
	}
	
	$options = array();
	
	switch ($tab) {
	case 'sidebar':
		$options[] = array( 
			'section' => 'sidebar_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sidebar', 
			'title' => esc_html__('Custom Sidebars', 'mall'), 
			'desc' => '', 
			'type' => 'sidebar', 
			'std' => '' 
		);
		
		break;
	case 'icon':
		$options[] = array( 
			'section' => 'icon_section', 
			'id' => CMSMASTERS_SHORTNAME . '_social_icons', 
			'title' => esc_html__('Social Icons', 'mall'), 
			'desc' => '', 
			'type' => 'social', 
			'std' => array( 
				'cmsmasters-icon-facebook-1|#|' . esc_html__('Facebook', 'mall') . '|true|#4d67a3|#5b7dc1', 
				'cmsmasters-icon-gplus-1|#|' . esc_html__('Google+', 'mall') . '|true|#d74936|#f4403d', 
				'cmsmasters-icon-instagram|#|' . esc_html__('Instagram', 'mall') . '|true|#40719a|#569ace', 
				'cmsmasters-icon-twitter|#|' . esc_html__('Twitter', 'mall') . '|true|#25a7df|#28bfed', 
				'cmsmasters-icon-youtube-play|#|' . esc_html__('YouTube', 'mall') . '|true|#cc171e|#e2184e' 
			) 
		);
		
		break;
	case 'lightbox':
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_skin', 
			'title' => esc_html__('Skin', 'mall'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'dark', 
			'choices' => array( 
				esc_html__('Dark', 'mall') . '|dark', 
				esc_html__('Light', 'mall') . '|light', 
				esc_html__('Mac', 'mall') . '|mac', 
				esc_html__('Metro Black', 'mall') . '|metro-black', 
				esc_html__('Metro White', 'mall') . '|metro-white', 
				esc_html__('Parade', 'mall') . '|parade', 
				esc_html__('Smooth', 'mall') . '|smooth' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_path', 
			'title' => esc_html__('Path', 'mall'), 
			'desc' => esc_html__('Sets path for switching windows', 'mall'), 
			'type' => 'radio', 
			'std' => 'vertical', 
			'choices' => array( 
				esc_html__('Vertical', 'mall') . '|vertical', 
				esc_html__('Horizontal', 'mall') . '|horizontal' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_infinite', 
			'title' => esc_html__('Infinite', 'mall'), 
			'desc' => esc_html__('Sets the ability to infinite the group', 'mall'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_aspect_ratio', 
			'title' => esc_html__('Keep Aspect Ratio', 'mall'), 
			'desc' => esc_html__('Sets the resizing method used to keep aspect ratio within the viewport', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_mobile_optimizer', 
			'title' => esc_html__('Mobile Optimizer', 'mall'), 
			'desc' => esc_html__('Make lightboxes optimized for giving better experience with mobile devices', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_max_scale', 
			'title' => esc_html__('Max Scale', 'mall'), 
			'desc' => esc_html__('Sets the maximum viewport scale of the content', 'mall'), 
			'type' => 'number', 
			'std' => 1, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_min_scale', 
			'title' => esc_html__('Min Scale', 'mall'), 
			'desc' => esc_html__('Sets the minimum viewport scale of the content', 'mall'), 
			'type' => 'number', 
			'std' => 0.2, 
			'min' => 0.1, 
			'max' => 2, 
			'step' => 0.05 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_inner_toolbar', 
			'title' => esc_html__('Inner Toolbar', 'mall'), 
			'desc' => esc_html__('Bring buttons into windows, or let them be over the overlay', 'mall'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_smart_recognition', 
			'title' => esc_html__('Smart Recognition', 'mall'), 
			'desc' => esc_html__('Sets content auto recognize from web pages', 'mall'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_fullscreen_one_slide', 
			'title' => esc_html__('Fullscreen One Slide', 'mall'), 
			'desc' => esc_html__('Decide to fullscreen only one slide or hole gallery the fullscreen mode', 'mall'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_fullscreen_viewport', 
			'title' => esc_html__('Fullscreen Viewport', 'mall'), 
			'desc' => esc_html__('Sets the resizing method used to fit content within the fullscreen mode', 'mall'), 
			'type' => 'select', 
			'std' => 'center', 
			'choices' => array( 
				esc_html__('Center', 'mall') . '|center', 
				esc_html__('Fit', 'mall') . '|fit', 
				esc_html__('Fill', 'mall') . '|fill', 
				esc_html__('Stretch', 'mall') . '|stretch' 
			) 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_toolbar', 
			'title' => esc_html__('Toolbar Controls', 'mall'), 
			'desc' => esc_html__('Sets buttons be available or not', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_arrows', 
			'title' => esc_html__('Arrow Controls', 'mall'), 
			'desc' => esc_html__('Enable the arrow buttons', 'mall'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_fullscreen', 
			'title' => esc_html__('Fullscreen Controls', 'mall'), 
			'desc' => esc_html__('Sets the fullscreen button', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_thumbnail', 
			'title' => esc_html__('Thumbnails Controls', 'mall'), 
			'desc' => esc_html__('Sets the thumbnail navigation', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_keyboard', 
			'title' => esc_html__('Keyboard Controls', 'mall'), 
			'desc' => esc_html__('Sets the keyboard navigation', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_mousewheel', 
			'title' => esc_html__('Mouse Wheel Controls', 'mall'), 
			'desc' => esc_html__('Sets the mousewheel navigation', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_swipe', 
			'title' => esc_html__('Swipe Controls', 'mall'), 
			'desc' => esc_html__('Sets the swipe navigation', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'lightbox_section', 
			'id' => CMSMASTERS_SHORTNAME . '_ilightbox_controls_slideshow', 
			'title' => esc_html__('Slideshow Controls', 'mall'), 
			'desc' => esc_html__('Enable the slideshow feature and button', 'mall'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		break;
	case 'sitemap':
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_nav', 
			'title' => esc_html__('Website Pages', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_categs', 
			'title' => esc_html__('Blog Archives by Categories', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_tags', 
			'title' => esc_html__('Blog Archives by Tags', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_month', 
			'title' => esc_html__('Blog Archives by Month', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_pj_categs', 
			'title' => esc_html__('Portfolio Archives by Categories', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'sitemap_section', 
			'id' => CMSMASTERS_SHORTNAME . '_sitemap_pj_tags', 
			'title' => esc_html__('Portfolio Archives by Tags', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		break;
	case 'error':
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_color', 
			'title' => esc_html__('Text Color', 'mall'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#292929' 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_color', 
			'title' => esc_html__('Background Color', 'mall'), 
			'desc' => '', 
			'type' => 'rgba', 
			'std' => '#fbfbfb' 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_img_enable', 
			'title' => esc_html__('Background Image Visibility', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 0 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_image', 
			'title' => esc_html__('Background Image', 'mall'), 
			'desc' => esc_html__('Choose your custom error page background image.', 'mall'), 
			'type' => 'upload', 
			'std' => '', 
			'frame' => 'select', 
			'multiple' => false 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_rep', 
			'title' => esc_html__('Background Repeat', 'mall'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'no-repeat', 
			'choices' => array( 
				esc_html__('No Repeat', 'mall') . '|no-repeat', 
				esc_html__('Repeat Horizontally', 'mall') . '|repeat-x', 
				esc_html__('Repeat Vertically', 'mall') . '|repeat-y', 
				esc_html__('Repeat', 'mall') . '|repeat' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_pos', 
			'title' => esc_html__('Background Position', 'mall'), 
			'desc' => '', 
			'type' => 'select', 
			'std' => 'top center', 
			'choices' => array( 
				esc_html__('Top Left', 'mall') . '|top left', 
				esc_html__('Top Center', 'mall') . '|top center', 
				esc_html__('Top Right', 'mall') . '|top right', 
				esc_html__('Center Left', 'mall') . '|center left', 
				esc_html__('Center Center', 'mall') . '|center center', 
				esc_html__('Center Right', 'mall') . '|center right', 
				esc_html__('Bottom Left', 'mall') . '|bottom left', 
				esc_html__('Bottom Center', 'mall') . '|bottom center', 
				esc_html__('Bottom Right', 'mall') . '|bottom right' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_att', 
			'title' => esc_html__('Background Attachment', 'mall'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'scroll', 
			'choices' => array( 
				esc_html__('Scroll', 'mall') . '|scroll', 
				esc_html__('Fixed', 'mall') . '|fixed' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_bg_size', 
			'title' => esc_html__('Background Size', 'mall'), 
			'desc' => '', 
			'type' => 'radio', 
			'std' => 'cover', 
			'choices' => array( 
				esc_html__('Auto', 'mall') . '|auto', 
				esc_html__('Cover', 'mall') . '|cover', 
				esc_html__('Contain', 'mall') . '|contain' 
			) 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_search', 
			'title' => esc_html__('Search Line', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_sitemap_button', 
			'title' => esc_html__('Sitemap Button', 'mall'), 
			'desc' => esc_html__('show', 'mall'), 
			'type' => 'checkbox', 
			'std' => 1 
		);
		
		$options[] = array( 
			'section' => 'error_section', 
			'id' => CMSMASTERS_SHORTNAME . '_error_sitemap_link', 
			'title' => esc_html__('Sitemap Page URL', 'mall'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'code':
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_custom_css', 
			'title' => esc_html__('Custom CSS', 'mall'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_custom_js', 
			'title' => esc_html__('Custom JavaScript', 'mall'), 
			'desc' => '', 
			'type' => 'textarea', 
			'std' => '', 
			'class' => 'allowlinebreaks' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_api_key', 
			'title' => esc_html__('Twitter API key', 'mall'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_api_secret', 
			'title' => esc_html__('Twitter API secret', 'mall'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_access_token', 
			'title' => esc_html__('Twitter Access token', 'mall'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'code_section', 
			'id' => CMSMASTERS_SHORTNAME . '_access_token_secret', 
			'title' => esc_html__('Twitter Access token secret', 'mall'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	case 'recaptcha':
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => CMSMASTERS_SHORTNAME . '_recaptcha_public_key', 
			'title' => esc_html__('reCAPTCHA Public Key', 'mall'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		$options[] = array( 
			'section' => 'recaptcha_section', 
			'id' => CMSMASTERS_SHORTNAME . '_recaptcha_private_key', 
			'title' => esc_html__('reCAPTCHA Private Key', 'mall'), 
			'desc' => '', 
			'type' => 'text', 
			'std' => '', 
			'class' => '' 
		);
		
		break;
	}
	
	return $options;	
}

