<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.5.0
 * 
 * Composer Lightbox Functions
 * Created by CMSMasters
 * 
 */


global $pagenow;


if ( 
	is_admin() && 
	$pagenow == 'post-new.php' || 
	($pagenow == 'post.php' && isset($_GET['post']) && get_post_type($_GET['post']) != 'attachment') 
) {
	add_action('admin_footer', 'cmsmasters_composer_shortcodes_init');
}


function cmsmasters_composer_shortcodes_init() {
	if (wp_script_is('cmsmasters_content_composer_js', 'queue') && wp_script_is('cmsmasters_composer_lightbox_js', 'queue')) {
		cmsmasters_composer_colors();
		
		cmsmasters_composer_cf7_forms();
		
		cmsmasters_composer_cfb_forms();
		
		cmsmasters_composer_layer_slider();
		
		cmsmasters_composer_rev_slider();
		
		cmsmasters_composer_fonts();
		
		cmsmasters_composer_font_weight();
		
		cmsmasters_composer_font_style();
		
		cmsmasters_composer_sidebars();
		
		cmsmasters_composer_categories();
		
		cmsmasters_composer_pj_compatible();
		
		cmsmasters_composer_pj_categories();
		
		cmsmasters_composer_pl_compatible();
		
		cmsmasters_composer_pl_categories();
		
		cmsmasters_composer_thumbnail_sizes();
		
		cmsmasters_composer_products();
		
		if (CMSMASTERS_WOOCOMMERCE) {
			cmsmasters_composer_product_ids();
		}
		
		cmsmasters_composer_paypal_donations();
		
		cmsmasters_composer_donations();
		
		if (CMSMASTERS_DONATIONS) {
			cmsmasters_composer_campaign_ids();
			
			cmsmasters_composer_donation_but_campaign_ids();
			
			cmsmasters_composer_campaign_categories();
		}
		
		cmsmasters_composer_timetable();
		
		if (CMSMASTERS_TIMETABLE) {
			cmsmasters_composer_timetable_events();
			
			cmsmasters_composer_timetable_event_categories();
			
			cmsmasters_composer_timetable_hour_categories();
			
			cmsmasters_composer_timetable_columns();
		}
	}
}


function cmsmasters_composer_colors() {
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_colors() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	foreach (cmsmasters_color_schemes_list() as $key => $value) {
		$out .= "\t\t\t\"" . $key . "\" : \"" . $value . "\", \n";
	}
	
	
	$out = substr($out, 0, -3);
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_cf7_forms() {
	global $post;
	
	
	$admin_post_object = $post;
	
	
	$option_query = new WP_Query(array( 
		'orderby' => 			'name', 
		'order' => 				'ASC', 
		'post_type' => 			'wpcf7_contact_form', 
		'posts_per_page' => 	-1 
	));
	
	
	$forms = array();
	
	
	if ($option_query->have_posts()) : 
		while ($option_query->have_posts() ) : $option_query->the_post();
			$forms[get_the_ID()] = get_the_title();
		endwhile;
	endif;
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_cf7_forms() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	foreach ($forms as $form_key => $form_value) {
		$out .= "\t\t\t\"" . $form_key . "{|}" . addslashes($form_value) . "\" : \"" . $form_value . "\", \n";
	}
	
	
	if (!empty($forms)) {
		$out = substr($out, 0, -3);
	}
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	wp_reset_query();
	
	
	$post = $admin_post_object;
	
	
	echo $out;
}


function cmsmasters_composer_cfb_forms() {
	global $frm_bldr;
	
	
	if (!empty($frm_bldr)) {
		$forms = $frm_bldr->form_builder_forms_list();
	} else {
		$forms = '';
	}
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_cfb_forms() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	if (!empty($forms)) {
		foreach ($forms as $form_key => $form_value) {
			$out .= "\t\t\t\"" . $form_key . "\" : \"" . $form_value . "\", \n";
		}
		
		
		$out = substr($out, 0, -3);
	}
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_layer_slider() {
	if (class_exists('LS_Sliders')) {
		$sliders = LS_Sliders::find(array( 
			'limit' => 	100 
		));
	}
	
	
	if (!isset($sliders)) {
		$sliders = '';
	}
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_layer_slider() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	if (!empty($sliders)) {
		foreach ($sliders as $item) {
			$name = empty($item['name']) ? __('Unnamed', 'cmsmasters_content_composer') : $item['name'];
			
			
			$out .= "\t\t\t\"" . $item['id'] . "\" : \"" . $name . "\", \n";
		}
		
		
		$out = substr($out, 0, -3);
	}
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_rev_slider() {
	if (class_exists('RevSlider')) {
		$sld = new RevSlider();
		
		$sliders = $sld->getArrSliders();
	}
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_rev_slider() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	if (!empty($sliders)) {
		foreach($sliders as $slider){
			$alias = $slider->getParam('alias','false');
			$title = $slider->getParam('title','false');
			
			if($alias != 'false'){
				$out .= "\t\t\t\"" . $alias . "\" : \"" . (($title != '' && $title != 'false') ? $title : $alias) . "\", \n";
			}
		}
	}
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_fonts() {
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_fonts() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	foreach (cmsmasters_google_fonts_list() as $key => $value) {
		$out .= "\t\t\t\"" . $key . "\" : \"" . $value . "\", \n";
	}
	
	
	$out = substr($out, 0, -3);
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_font_weight() {
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_font_weight() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	foreach (cmsmasters_font_weight_list() as $key => $value) {
		$out .= "\t\t\t\"" . $key . "\" : \"" . $value . "\", \n";
	}
	
	
	$out = substr($out, 0, -3);
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_font_style() {
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_font_style() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	foreach (cmsmasters_font_style_list() as $key => $value) {
		$out .= "\t\t\t\"" . $key . "\" : \"" . $value . "\", \n";
	}
	
	
	$out = substr($out, 0, -3);
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_sidebars() {
	global $wp_registered_sidebars;
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_sidebars() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	foreach ($wp_registered_sidebars as $wp_registered_sidebar) {
		$out .= "\t\t\t\"" . $wp_registered_sidebar['id'] . "\" : \"" . $wp_registered_sidebar['name'] . "\", \n";
	}
	
	
	$out = substr($out, 0, -3);
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_categories() {
	$categories = get_categories(array( 
		'hide_empty' => 0 
	));
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_categories() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	if (!empty($categories)) {
		foreach ($categories as $category) {
			$out .= "\t\t\t\"" . $category->slug . "\" : \"" . esc_html($category->name) . "\", \n";
		}
		
		
		$out = substr($out, 0, -3);
	}
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_pj_compatible() {
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_pj_compatible() { ' . "\n\t\t";
	
	
	if (CMSMASTERS_PROJECT_COMPATIBLE) {
		$out .= "return 'true'; \n";
	} else {
		$out .= "return 'false'; \n";
	}
	
	
	$out .= '} ' . "\n" . 
		'cmsmasters_composer_pj_compatible();' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_pj_categories() {
	$categories = get_terms('pj-categs', array( 
		'hide_empty' => 0 
	));
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_pj_categories() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	if (CMSMASTERS_PROJECT_COMPATIBLE && !empty($categories) && !is_wp_error($categories)) {
		foreach ($categories as $category) {
			$out .= "\t\t\t\"" . $category->slug . "\" : \"" . esc_html($category->name) . "\", \n";
		}
		
		
		$out = substr($out, 0, -3);
	}
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_pl_compatible() {
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_pl_compatible() { ' . "\n\t\t";
	
	
	if (CMSMASTERS_PROFILE_COMPATIBLE) {
		$out .= "return 'true'; \n";
	} else {
		$out .= "return 'false'; \n";
	}
	
	
	$out .= '} ' . "\n" . 
		'cmsmasters_composer_pl_compatible();' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_pl_categories() {
	$categories = get_terms('pl-categs', array( 
		'hide_empty' => 0 
	));
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_pl_categories() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	if (CMSMASTERS_PROFILE_COMPATIBLE && !empty($categories) && !is_wp_error($categories)) {
		foreach ($categories as $category) {
			$out .= "\t\t\t\"" . $category->slug . "\" : \"" . esc_html($category->name) . "\", \n";
		}
		
		
		$out = substr($out, 0, -3);
	}
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_thumbnail_sizes() {
	$cmsmasters_sizes = cmsmasters_image_thumbnail_list();
	
	
	$sizes_array = get_intermediate_image_sizes();
	
	
	array_push($sizes_array, 'full');
	
	
	$sizes = array();
	
	
	foreach($sizes_array as $s) {
		if (in_array($s, array('thumbnail', 'medium', 'large'))) {
			if ($s == 'thumbnail') {
				$sizes[$s][0] = __('Thumbnail', 'cmsmasters_content_composer');
			} elseif ($s == 'medium') {
				$sizes[$s][0] = __('Medium', 'cmsmasters_content_composer');
			} elseif ($s == 'large') {
				$sizes[$s][0] = __('Large', 'cmsmasters_content_composer');
			}
			
			
			$sizes[$s][1] = get_option($s . '_size_w');
			
			
			$sizes[$s][2] = get_option($s . '_size_h');
		} elseif ($s == 'full') {
			$sizes[$s] = array(__('Full Size', 'cmsmasters_content_composer'), __('Original image size', 'cmsmasters_content_composer'), '');
		} else {
			if (isset($cmsmasters_sizes) && isset($cmsmasters_sizes[$s]) && isset($cmsmasters_sizes[$s]['title'])) {
				$sizes[$s] = array($cmsmasters_sizes[$s]['title'], $cmsmasters_sizes[$s]['width'], $cmsmasters_sizes[$s]['height']);
			}
		}
	}
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_thumbnail_sizes() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	foreach ($sizes as $size => $attrs) {
		$out .= "\t\t\t\"" . $size . "\" : \"" . $attrs[0] . " &ndash; " . $attrs[1] . (($attrs[2] != '') ? " &#735; " . $attrs[2] : '') . "\", \n";
	}
	
	
	$out = substr($out, 0, -3);
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_products() {
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_products() { ' . "\n\t\t";
	
	
	if (CMSMASTERS_WOOCOMMERCE) {
		$out .= "return 'true'; \n";
	} else {
		$out .= "return 'false'; \n";
	}
	
	
	$out .= '} ' . "\n" . 
		'cmsmasters_composer_products();' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_product_ids() {
	$product_ids = get_posts(array(
		'numberposts' => -1, 
		'post_type' => 'product'
	));
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_product_ids() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	if (!empty($product_ids)) {
		foreach ($product_ids as $product_id) {
			$out .= "\t\t\t\"" . $product_id->ID . "\" : \"" . esc_html($product_id->post_title) . "\", \n";
		}
		
		
		$out = substr($out, 0, -3);
	}
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_paypal_donations() {
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_paypal_donations() { ' . "\n\t\t";
	
	
	if (CMSMASTERS_PAYPALDONATIONS) {
		$out .= "return 'true'; \n";
	} else {
		$out .= "return 'false'; \n";
	}
	
	
	$out .= '} ' . "\n" . 
		'cmsmasters_composer_paypal_donations();' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_donations() {
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_donations() { ' . "\n\t\t";
	
	
	if (CMSMASTERS_DONATIONS) {
		$out .= "return 'true'; \n";
	} else {
		$out .= "return 'false'; \n";
	}
	
	
	$out .= '} ' . "\n" . 
		'cmsmasters_composer_donations();' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_campaign_ids() {
	$campaign_ids = get_posts(array(
		'numberposts' => -1, 
		'post_type' => 'campaign'
	));
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_campaign_ids() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	if (!empty($campaign_ids)) {
		foreach ($campaign_ids as $campaign_id) {
			$out .= "\t\t\t\"" . $campaign_id->ID . "\" : \"" . esc_html($campaign_id->post_title) . "\", \n";
		}
		
		
		$out = substr($out, 0, -3);
	}
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_donation_but_campaign_ids() {
	$campaign_ids = get_posts(array(
		'numberposts' => -1, 
		'post_type' => 'campaign'
	));
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_donation_but_campaign_ids() { ' . "\n\t\t" . 
			'return { ' . "\n" . 
				"\t\t\t\"\" : \"" . esc_html__('No specific campaign', 'cmsmasters_content_composer') . "\", \n";
	
	
	if (!empty($campaign_ids)) {
		foreach ($campaign_ids as $campaign_id) {
			$out .= "\t\t\t\"" . $campaign_id->ID . "\" : \"" . esc_html($campaign_id->post_title) . "\", \n";
		}
		
		
		$out = substr($out, 0, -3);
	}
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_campaign_categories() {
	$categories = get_terms('cp-categs', array( 
		'hide_empty' => 0 
	));
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_campaign_categories() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	if (!empty($categories)) {
		foreach ($categories as $category) {
			$out .= "\t\t\t\"" . $category->slug . "\" : \"" . esc_html($category->name) . "\", \n";
		}
		
		
		$out = substr($out, 0, -3);
	}
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_timetable() {
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_timetable() { ' . "\n\t\t";
	
	
	if (CMSMASTERS_TIMETABLE) {
		$out .= "return 'true'; \n";
	} else {
		$out .= "return 'false'; \n";
	}
	
	
	$out .= '} ' . "\n" . 
		'cmsmasters_composer_timetable();' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_timetable_events() {
	$timetable_events = get_posts(array(
		'numberposts' => -1, 
		'post_type' => 'events'
	));
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_timetable_events() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	if (!empty($timetable_events)) {
		foreach ($timetable_events as $timetable_event) {
			$out .= "\t\t\t\"" . urldecode($timetable_event->post_name) . "\" : \"" . esc_html($timetable_event->post_title) . "\", \n";
		}
		
		
		$out = substr($out, 0, -3);
	}
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_timetable_event_categories() {
	$categories = get_terms('events_category', array( 
		'hide_empty' => 0 
	));
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_timetable_event_categories() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	if (!empty($categories)) {
		foreach ($categories as $category) {
			$out .= "\t\t\t\"" . urldecode(esc_attr($category->slug)) . "\" : \"" . esc_html($category->name) . "\", \n";
		}
		
		
		$out = substr($out, 0, -3);
	}
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_timetable_hour_categories() {
	global $wpdb;
	
	
	$query = "SELECT distinct(category) AS category FROM " . $wpdb->prefix . "event_hours AS t1
		LEFT JOIN {$wpdb->posts} AS t2 ON t1.event_id=t2.ID 
		WHERE 
		t2.post_type='events'
		AND t2.post_status='publish'
		AND category<>''";
	
	
	$categories = $wpdb->get_results($query);
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_timetable_hour_categories() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	if (!empty($categories)) {
		foreach ($categories as $category) {
			$out .= "\t\t\t\"" . esc_attr($category->category) . "\" : \"" . esc_html($category->category) . "\", \n";
		}
		
		
		$out = substr($out, 0, -3);
	}
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}


function cmsmasters_composer_timetable_columns() {
	$timetable_columns = get_posts(array(
		'numberposts' => -1, 
		'post_type' => 'timetable_weekdays'
	));
	
	
	$out = "\n" . '<script type="text/javascript"> ' . "\n" . 
	'/* <![CDATA[ */' . "\n\t" . 
		'function cmsmasters_composer_timetable_columns() { ' . "\n\t\t" . 
			'return { ' . "\n";
	
	
	if (!empty($timetable_columns)) {
		foreach ($timetable_columns as $timetable_column) {
			$out .= "\t\t\t\"" . urldecode($timetable_column->post_name) . "\" : \"" . esc_html($timetable_column->post_title) . "\", \n";
		}
		
		
		$out = substr($out, 0, -3);
	}
	
	
	$out .= "\n\t\t" . '}; ' . "\n\t" . 
		'} ' . "\n" . 
	'/* ]]> */' . "\n" . 
	'</script>' . "\n\n";
	
	
	echo $out;
}

