<?php
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.5.1
 * 
 * CMSMasters Custom Shortcodes
 * Created by CMSMasters
 * 
 */


/**
 * Section
 */
function cmsmasters_row($atts, $content = null) {
    extract(shortcode_atts(array( 
		'data_color' => 				'default', 
		'data_bg_color' => 				'', 
		'data_bg_img' => 				'', 
		'data_bg_position' => 			'top center', 
		'data_bg_repeat' => 			'no-repeat', 
		'data_bg_attachment' => 		'scroll', 
		'data_bg_size' => 				'auto', 
		'data_bg_parallax' => 			'', 
		'data_bg_parallax_ratio' => 	'0.5', 
		'data_color_overlay' => 		'', 
		'data_padding_top' => 			'', 
		'data_padding_bottom' => 		'', 
		'data_width' => 				'boxed', 
		'data_padding_left' => 			'', 
		'data_padding_right' => 		'', 
		'data_no_margin' => 			'', 
		'data_merge' => 				'', 
		'data_top_style' => 			'default', 
		'data_bot_style' => 			'default', 
		'data_id' => 					'', 
		'data_classes' => 				'' 
    ), $atts));
	
	
	global $prev_out;
	
	
	$unique_id = uniqid();
	
	
	$out_style_start = '<style type="text/css"> ' . "\n";
	
	
	$out_style = '';
	
	
	$out_style_content = '';
	
	
	if ( 
		$data_bg_img != '' || 
		$data_bg_color != '' 
	) {
		$out_style .= '#cmsmasters_row_' . $unique_id . ' { ';
		
		
		if ($data_bg_color != '') {
			$out_style .= "\n\t" . cmsmasters_color_css('background-color', $data_bg_color);
		}
		
		
		if ($data_bg_img != '') {
			$new_bg_img = explode('|', $data_bg_img);
			
			
			$new_bg_src = wp_get_attachment_image_src($new_bg_img[0], 'full');
			
			
			$out_style .= "\n\t" . 'background-image: url(' . $new_bg_src[0] . '); ' . 
			"\n\t" . 'background-position: ' . $data_bg_position . '; ' . 
			"\n\t" . 'background-repeat: ' . $data_bg_repeat . '; ' . 
			"\n\t" . 'background-attachment: ' . $data_bg_attachment . '; ' . 
			"\n\t" . 'background-size: ' . $data_bg_size . '; ' . 
			(($data_bg_attachment == 'fixed' && preg_match('/Safari/', $_SERVER['HTTP_USER_AGENT'])) ? "\n\t" . 'position: static; ' : '');
		}
		
		
		$out_style .= "\n" . '} ' . "\n\n";
	}
	
	
	if ($data_padding_top != '') {
		$out_style .= '#cmsmasters_row_' . $unique_id . ' .cmsmasters_row_outer_parent { ' . 
			"\n\t" . 'padding-top: ' . $data_padding_top . 'px; ' . 
		"\n" . '} ' . "\n\n";
	}
	
	
	if ($data_padding_bottom != '') {
		$out_style .= '#cmsmasters_row_' . $unique_id . ' .cmsmasters_row_outer_parent { ' . 
			"\n\t" . 'padding-bottom: ' . $data_padding_bottom . 'px; ' . 
		"\n" . '} ' . "\n\n";
	}
	
	
	if ($data_color_overlay != '') {
		$out_style .= '#cmsmasters_row_' . $unique_id . ' .cmsmasters_row_overlay { ' .
			"\n\t" . cmsmasters_color_css('background-color', $data_color_overlay) . 
		"\n" . '} ' . "\n\n";
	}
	
	
	if ($data_width == 'fullwidth') {
		if ($data_padding_left != '') {
			$out_style_content .= '#cmsmasters_row_' . $unique_id . ' .cmsmasters_row_inner.cmsmasters_row_fullwidth { ' . 
				"\n\t" . 'padding-left:' . $data_padding_left . '%; ' . 
			"\n" . '} ' . "\n";
		}
		
		
		if ($data_padding_right != '') {
			$out_style_content .= '#cmsmasters_row_' . $unique_id . ' .cmsmasters_row_inner.cmsmasters_row_fullwidth { ' . 
				"\n\t" . 'padding-right:' . $data_padding_right . '%; ' . 
			"\n" . '} ' . "\n";
		}
	}
	
	
	if ($data_bg_color != '') {
		if (
			($data_top_style != '' && $data_top_style == 'zigzag') || 
			($data_bot_style != '' && $data_bot_style == 'zigzag')
		) {
			$out_style .= "
			#cmsmasters_row_{$unique_id}.cmsmasters_row_top_zigzag:before, 
			#cmsmasters_row_{$unique_id}.cmsmasters_row_bot_zigzag:after {
				background-image: -webkit-linear-gradient(135deg, {$data_bg_color} 25%, transparent 25%), 
						-webkit-linear-gradient(45deg, {$data_bg_color} 25%, transparent 25%);
				background-image: -moz-linear-gradient(135deg, {$data_bg_color} 25%, transparent 25%), 
						-moz-linear-gradient(45deg, {$data_bg_color} 25%, transparent 25%);
				background-image: -ms-linear-gradient(135deg, {$data_bg_color} 25%, transparent 25%), 
						-ms-linear-gradient(45deg, {$data_bg_color} 25%, transparent 25%);
				background-image: -o-linear-gradient(135deg, {$data_bg_color} 25%, transparent 25%), 
						-o-linear-gradient(45deg, {$data_bg_color} 25%, transparent 25%);
				background-image: linear-gradient(315deg, {$data_bg_color} 25%, transparent 25%), 
						linear-gradient(45deg, {$data_bg_color} 25%, transparent 25%);
			}";
		}
	}
	
	
	$out_style_finish = '</style>';
	
	
	$out_start = '<div id="cmsmasters_row_' . $unique_id . '" class="cmsmasters_row cmsmasters_color_scheme_' . $data_color . 
	(($data_classes != '') ? ' ' . $data_classes : '') . 
	($data_top_style != '' ? ' cmsmasters_row_top_' . $data_top_style : '') . 
	($data_bot_style != '' ? ' cmsmasters_row_bot_' . $data_bot_style : '') . 
	'"' . 
	(($data_bg_parallax != '') ? ' data-stellar-background-ratio="' . $data_bg_parallax_ratio . '"' : '') . 
	'>' . "\n" . 
		'<div' . 
		(($data_id != '') ? ' id="' . $data_id . '"' : '') . 
		' class="cmsmasters_row_outer_parent">' . "\n" . 
			(($data_color_overlay != '') ? '<div class="cmsmasters_row_overlay"></div>' . "\n" : '') . 
			'<div class="cmsmasters_row_outer">' . "\n";
	
	
	$out_content = $prev_out . 
		'<div class="cmsmasters_row_inner' . 
		(($data_width == 'fullwidth') ? ' cmsmasters_row_fullwidth' : '') . 
		(($data_no_margin == 'true') ? ' cmsmasters_row_no_margin' : '') . 
		'">' . "\n" . 
		'<div class="cmsmasters_row_margin">' . "\n" . 
			do_shortcode($content) . 
		'</div>' . "\n" . 
	'</div>' . "\n";
	
	
	$out_finish = '</div>' . "\n" . 
		'</div>' . "\n" . 
	'</div>' . "\n";
	
	
	$out = (($out_style != '' || $out_style_content != '') ? $out_style_start . $out_style . $out_style_content . $out_style_finish : '') . 
		$out_start . 
		$out_content . 
		$out_finish;
	
	
	if ($data_merge == 'true') {
		$prev_out = (($out_style_content != '') ? $out_style_start . $out_style_content . $out_style_finish : '') . 
			$out_content;
	} else {
		$prev_out = '';
		
		
		return $out;
	}
}

add_shortcode('cmsmasters_row', 'cmsmasters_row');



/**
 * Column
 */
function cmsmasters_column($atts, $content = null) {
    extract(shortcode_atts(array( 
		'data_width' => 			'1/1', 
		'data_animation' => 		'', 
		'data_animation_delay' => 	'', 
		'data_classes' => 			'' 
    ), $atts));
	
	
	if ($data_width == '1/1') {
		$new_width = 'one_first';
	} elseif ($data_width == '3/4') {
		$new_width = 'three_fourth';
	} elseif ($data_width == '2/3') {
		$new_width = 'two_third';
	} elseif ($data_width == '1/2') {
		$new_width = 'one_half';
	} elseif ($data_width == '1/3') {
		$new_width = 'one_third';
	} elseif ($data_width == '1/4') {
		$new_width = 'one_fourth';
	}
	
	
    return cmsmasters_divpdel('<div class="cmsmasters_column ' . $new_width . 
	(($data_classes != '') ? ' ' . $data_classes : '') . 
	'"' . 
	(($data_animation != '') ? ' data-animation="' . $data_animation . '"' : '') . 
	(($data_animation != '' && $data_animation_delay != '') ? ' data-delay="' . $data_animation_delay . '"' : '') . 
	'>' . "\n" . 
		do_shortcode(wpautop($content, false)) . 
	'</div>' . "\n");
}

add_shortcode('cmsmasters_column', 'cmsmasters_column');



/**
 * Text Block
 */
function cmsmasters_text($atts, $content = null) {
    extract(shortcode_atts(array( 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ), $atts));
	
	
    return cmsmasters_divpdel('<div class="cmsmasters_text' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		do_shortcode(wpautop($content)) . 
	'</div>' . "\n");
}

add_shortcode('cmsmasters_text', 'cmsmasters_text');



/**
 * Notice
 */
function cmsmasters_notice($atts, $content = null) {
	$new_atts = apply_filters('cmsmasters_notice_atts_filter', array( 
		'type' => 				'cmsmasters_notice_success', 
		'icon' => 				'', 
		'close' => 				'', 
		'bg_color' => 			'', 
		'bd_color' => 			'', 
		'color' => 				'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
	) );
	
	
	$shortcode_name = 'notice';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	$out = '';
	
	
	if ($type == 'cmsmasters_notice_custom') {
		$out .= '<style type="text/css"> ' . "\n" . 
			'#cmsmasters_notice_' . $unique_id . ' { ' . 
				"\n\t" . cmsmasters_color_css('background-color', $bg_color) . 
				"\n\t" . cmsmasters_color_css('border-color', $bd_color) . 
				"\n\t" . cmsmasters_color_css('color', $color) . 
			"\n" . '} ' . "\n" . 
			'.cmsmasters_notice:before {' . "\n" . 
				"\n\t" . cmsmasters_color_css('color', $bd_color) . 
			"\n" . '}' . "\n" . 
		'</style>';
	}
	
	
    $out .= '<div id="cmsmasters_notice_' . $unique_id . '" class="cmsmasters_notice ' . $type . 
	(($icon != '') ? ' ' . $icon : '') . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		(($close != '') ? '<a href="#" class="notice_close cmsmasters_theme_icon_cancel"></a>' : '') . 
		cmsmasters_divpdel('<div class="notice_content">' . "\n" . 
			do_shortcode(wpautop($content)) . 
		'</div>' . "\n") . 
	'</div>' . "\n";
	
	
	return $out;
}

add_shortcode('cmsmasters_notice', 'cmsmasters_notice');



/**
 * Icon Box
 */
function cmsmasters_icon_box($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_icon_box_atts_filter', array( 
		'box_type' => 					'cmsmasters_icon_heading_left', 
		'title' => 						'', 
		'heading_type' => 				'h1', 
		'box_icon_type' => 				'icon', 
		'box_icon' => 					'cmsmasters-icon-heart-7', 
		'box_icon_number' => 			'1', 
		'box_icon_image' => 			'', 
		'box_icon_size' => 				'0', 
		'box_icon_space' => 			'50', 
		'box_icon_border_width' => 		'0', 
		'box_icon_border_radius' => 	'0', 
		'box_icon_color' => 			'', 
		'box_icon_bg_color' => 			'', 
		'box_icon_bd_color' => 			'', 
		'box_border_width' => 			'0', 
		'box_border_radius' => 			'0', 
		'box_color' => 					'', 
		'box_bg_color' => 				'', 
		'box_bd_color' => 				'', 
		'button_show' => 				'', 
		'button_title' => 				'', 
		'button_link' => 				'#', 
		'button_target' => 				'', 
		'button_style' => 				'', 
		'button_font_family' => 		'', 
		'button_font_size' => 			'', 
		'button_line_height' => 		'', 
		'button_font_weight' => 		'', 
		'button_font_style' => 			'', 
		'button_padding_hor' => 		'', 
		'button_border_width' => 		'', 
		'button_border_style' => 		'', 
		'button_border_radius' => 		'', 
		'button_bg_color' => 			'', 
		'button_text_color' => 			'', 
		'button_border_color' => 		'', 
		'button_bg_color_h' => 			'', 
		'button_text_color_h' => 		'', 
		'button_border_color_h' => 		'', 
		'button_icon' => 				'', 
		'animation' => 					'', 
		'animation_delay' => 			'', 
		'classes' => 					'' 
    ) );
	
	
	$shortcode_name = 'icon-box';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	if ($button_font_family != '') {
		$font_family_array = explode(':', $button_font_family);
		
		$font_family_name = "'" . $font_family_array[0] . "'";
		
		
		cmsmasters_theme_google_font($button_font_family, $font_family_array[0]);
	}
	
	
	if (
		$button_style != '' || 
		$button_font_family != '' || 
		$button_font_size != '' || 
		$button_line_height != '' || 
		$button_font_weight != '' || 
		$button_font_style != '' || 
		$button_padding_hor != '' || 
		$button_border_width != '' || 
		$button_border_style != '' || 
		$button_border_radius != '' || 
		$button_bg_color != '' || 
		$button_text_color != '' || 
		$button_border_color != '' || 
		$button_bg_color_h != '' || 
		$button_text_color_h != '' || 
		$button_border_color_h != '' 
	) {
		$button_custom_styles = 'true';
	} else {
		$button_custom_styles = 'false';
	}
	
	
	$out = '<style type="text/css"> ' . "\n" . 
		'#cmsmasters_icon_box_' . $unique_id . ' { ' . 
			(($box_border_width != '') ? "\n\t" . 'border-width:' . $box_border_width . 'px; ' : '') . 
			(((int) $box_border_radius > 0) ? "\n\t" . '-webkit-border-radius:' . $box_border_radius . '; ' . "\n\t" . 'border-radius:' . $box_border_radius . '; ' : '') . 
			(($box_color != '') ? "\n\t" . cmsmasters_color_css('color', $box_color) : '') . 
			(($box_bg_color != '') ? "\n\t" . cmsmasters_color_css('background-color', $box_bg_color) : '') . 
			(($box_bd_color != '') ? "\n\t" . cmsmasters_color_css('border-color', $box_bd_color) : '') . 
		"\n" . '} ' . "\n\n" . 
		'#cmsmasters_icon_box_' . $unique_id . ':before, ' . "\n" . 
		'#cmsmasters_icon_box_' . $unique_id . ' .icon_box_heading:before { ' . 
			"\n\t" . 'font-size:' . $box_icon_size . 'px; ' . 
			"\n\t" . 'line-height:' . ((int) $box_icon_space - ((int) $box_icon_border_width * 2)) . 'px; ' . 
			"\n\t" . 'width:' . $box_icon_space . 'px; ' . 
			"\n\t" . 'height:' . $box_icon_space . 'px; ' . 
			"\n\t" . 'border-width:' . $box_icon_border_width . 'px; ' . 
			(((int) $box_icon_border_radius > 0) ? "\n\t" . '-webkit-border-radius:' . $box_icon_border_radius . '; ' . "\n\t" . 'border-radius:' . $box_icon_border_radius . '; ' : '') . 
			(($box_icon_color != '') ? "\n\t" . cmsmasters_color_css('color', $box_icon_color) : '') . 
			(($box_icon_bg_color != '') ? "\n\t" . cmsmasters_color_css('background-color', $box_icon_bg_color) : '') . 
			(($box_icon_bd_color != '') ? "\n\t" . cmsmasters_color_css('border-color', $box_icon_bd_color) : '') . 
		"\n" . '} ' . "\n\n";
	
	
	if ( 
		$box_bg_color != '' || 
		( 
			$box_bd_color != '' && 
			((int) $box_border_width > 0) 
		) 
	) {
		$out .= '#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_heading_left, ' . "\n" . 
		'#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_top, ' . "\n" . 
		'#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_box_left_top { ' . 
			"\n\t" . 'padding:30px 20px; ' . 
		'} ' . "\n\n" . 
		'#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_top:before { ' . 
			"\n\t" . 'top:30px;' . 
		'} ' . "\n\n";
	}
	
	
	if ($box_color != '') {
		$out .= '#cmsmasters_icon_box_' . $unique_id . ' a:not(.cmsmasters_button), ' . "\n" . 
		'#cmsmasters_icon_box_' . $unique_id . ' a:not(.cmsmasters_button):hover, ' . "\n" . 
		'#cmsmasters_icon_box_' . $unique_id . ' h1, ' . "\n" . 
		'#cmsmasters_icon_box_' . $unique_id . ' h2, ' . "\n" . 
		'#cmsmasters_icon_box_' . $unique_id . ' h3, ' . "\n" . 
		'#cmsmasters_icon_box_' . $unique_id . ' h4, ' . "\n" . 
		'#cmsmasters_icon_box_' . $unique_id . ' h5, ' . "\n" . 
		'#cmsmasters_icon_box_' . $unique_id . ' h6 { ' . 
			"\n\t" . cmsmasters_color_css('color', $box_color) . 
		'} ' . "\n\n" . 
		'#cmsmasters_icon_box_' . $unique_id . ' a:not(.cmsmasters_button) { ' . "\n" . 
			"\n\t" . 'text-decoration:underline;' . 
		'} ' . "\n\n" . 
		'#cmsmasters_icon_box_' . $unique_id . ' a:not(.cmsmasters_button):hover { ' . "\n" . 
			"\n\t" . 'text-decoration:none;' . 
		'} ' . "\n\n";
	}
	
	
	if ($box_type == 'cmsmasters_icon_top' || $box_type == 'cmsmasters_icon_box_top') {
		$out .= '#cmsmasters_icon_box_' . $unique_id . ' { ' . 
			"\n\t" . 'padding-top:' . ((int) $box_icon_space + 30) . 'px; ' . 
		'} ' . "\n\n" . 
		'#cmsmasters_icon_box_' . $unique_id . ':before, ' . "\n" . 
		'#cmsmasters_icon_box_' . $unique_id . ' .icon_box_heading:before { ' . 
			"\n\t" . 'margin-left:-' . ((int) $box_icon_space / 2) . 'px; ' . 
		"\n\t" . '} ' . "\n\n";
	}
	
	
	if ($box_type == 'cmsmasters_icon_top') {
		$out .= '#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_top { ' . 
			"\n\t" . 'padding-top:' . ((int) $box_icon_space + 60) . 'px; ' . 
		"\n\t" . '} ' . "\n\n";
	}
	
	
	if ($box_type == 'cmsmasters_icon_box_top') {
		$out .= '#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_box_top { ' . 
			"\n\t" . 'padding-top:' . ((int) $box_icon_space - ((int) $box_icon_space / 2) + 30) . 'px; ' . 
			"\n\t" . 'margin-top:' . ((int) $box_icon_space / 2) . 'px; ' . 
		"\n\t" . '} ' . "\n\n" . 
		'#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_box_top:before { ' . 
			"\n\t" . 'top:-' . ((int) $box_icon_space / 2) . 'px; ' . 
		"\n\t" . '} ' . "\n\n";
	}
	
	
	if ($box_type == 'cmsmasters_icon_box_left' || $box_type == 'cmsmasters_icon_box_left_top') {
		if (!is_rtl()) {
			$out .= '#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_box_left, ' . "\n" . 
			'#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_box_left_top { ' . 
				"\n\t" . 'padding-left:' . ((int) $box_icon_space - ((int) $box_icon_space / 2) + 30) . 'px; ' . 
				"\n\t" . 'margin-left:' . ((int) $box_icon_space / 2) . 'px; ' . 
			"\n\t" . '} ' . "\n\n" . 
			'#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_box_left:before, ' . "\n" . 
			'#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_box_left_top:before { ' . 
				"\n\t" . 'left:-' . ((int) $box_icon_space / 2) . 'px; ' . 
			"\n\t" . '} ' . "\n\n";
		} else {
			$out .= '#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_box_left, ' . "\n" . 
			'#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_box_left_top { ' . 
				"\n\t" . 'padding-right:' . ((int) $box_icon_space - ((int) $box_icon_space / 2) + 30) . 'px; ' . 
				"\n\t" . 'margin-right:' . ((int) $box_icon_space / 2) . 'px; ' . 
			"\n\t" . '} ' . "\n\n" . 
			'#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_box_left:before, ' . "\n" . 
			'#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_box_left_top:before { ' . 
				"\n\t" . 'right:-' . ((int) $box_icon_space / 2) . 'px; ' . 
			"\n\t" . '} ' . "\n\n";
		}
	}
	
	
	if ($box_type == 'cmsmasters_icon_box_left') {
		$out .= '#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_box_left:before { ' . 
			"\n\t" . 'margin-top:-' . ((int) $box_icon_space / 2) . 'px; ' . 
		"\n\t" . '} ' . "\n\n";
	}
	
	
	if ( 
		$box_type == 'cmsmasters_icon_box_left_top' && 
		( 
			$box_bg_color != '' || 
			( 
				$box_bd_color != '' && 
				((int) $box_border_width > 0) 
			) 
		) 
	) {
		$out .= '#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_box_left_top { ' . 
			"\n\t" . 'padding-top:' . ((int) $box_icon_space - ((int) $box_icon_space / 2)) . 'px; ' . 
			"\n\t" . 'margin-top:' . ((int) $box_icon_space / 2) . 'px; ' . 
		"\n\t" . '} ' . "\n\n" . 
		'#cmsmasters_icon_box_' . $unique_id . '.cmsmasters_icon_box_left_top:before { ' . 
			"\n\t" . 'margin-top:-' . ((int) $box_icon_space / 2) . 'px; ' . 
		"\n\t" . '} ' . "\n\n";
	}
	
	
	if ($box_icon_type == 'image' && $box_icon_image != '') {
		$image_id = explode('|', $box_icon_image);
		
		
		if (is_numeric($image_id[0]) && is_array(wp_get_attachment_image_src($image_id[0], 'full'))) {
			$image_url_src = wp_get_attachment_image_src($image_id[0], 'full');
		
			$image_url = $image_url_src[0];
		} else if ($image_id[0] != '') {
			$image_url = $image_id[0];
		} else {
			$image_url = $image_id[1];
		}
		
		
		$out .= '#cmsmasters_icon_box_' . $unique_id . (($box_type != 'cmsmasters_icon_heading_left') ? ':before' : '.cmsmasters_icon_heading_left .icon_box_heading:before') . ' { ' . 
			"\n\t" . 'background-image:url(' . $image_url . '); ' . 
		"\n" . '} ' . "\n";
	}
	
	
	if ($box_icon_type == 'number') {
		$out .= '#cmsmasters_icon_box_' . $unique_id . (($box_type != 'cmsmasters_icon_heading_left') ? ':before' : '.cmsmasters_icon_heading_left .icon_box_heading:before') . ' { ' . 
			"\n\t" . "content:'" . $box_icon_number . "'; " . 
		"\n" . '} ' . "\n";
	}
	
	
	if ($button_show == 'true') {
		$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button:before { ' . 
			"\n\t" . 'margin-right:' . (($button_title != '') ? '.5em; ' : '0;') . 
			"\n\t" . 'margin-left:0; ' . 
			"\n\t" . 'vertical-align:baseline; ' . 
		"\n" . '} ' . "\n\n";
		
		
		if ($button_custom_styles == 'true') {
			$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button { ' . 
				(($button_font_family != '') ? "\n\t" . 'font-family:' . str_replace('+', ' ', $font_family_name) . '; ' : '') . 
				(($button_font_size != '') ? "\n\t" . 'font-size:' . $button_font_size . 'px; ' : '') . 
				(($button_line_height != '') ? "\n\t" . 'line-height:' . $button_line_height . 'px; ' : '') . 
				(($button_font_weight != '') ? "\n\t" . 'font-weight:' . $button_font_weight . '; ' : '') . 
				(($button_font_style != '') ? "\n\t" . 'font-style:' . $button_font_style . '; ' : '') . 
				(($button_padding_hor != '') ? "\n\t" . 'padding-right:' . $button_padding_hor . 'px; ' : '') . 
				(($button_padding_hor != '') ? "\n\t" . 'padding-left:' . $button_padding_hor . 'px; ' : '') . 
				(($button_border_width != '') ? "\n\t" . 'border-width:' . $button_border_width . 'px; ' : '') . 
				(($button_border_style != '') ? "\n\t" . 'border-style:' . $button_border_style . '; ' : '') . 
				(($button_border_radius != '') ? "\n\t" . '-webkit-border-radius:' . $button_border_radius . '; ' . "\n\t" . 'border-radius:' . $button_border_radius . '; ' : '') . 
				(($button_bg_color != '') ? "\n\t" . cmsmasters_color_css('background-color', $button_bg_color) : '') . 
				(($button_text_color != '') ? "\n\t" . cmsmasters_color_css('color', $button_text_color) : '') . 
				(($button_border_color != '') ? "\n\t" . cmsmasters_color_css('border-color', $button_border_color) : '') . 
			"\n" . '} ' . "\n";
			
			$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button:hover { ' . 
				(($button_bg_color_h != '') ? "\n\t" . cmsmasters_color_css('background-color', $button_bg_color_h) : '') . 
				(($button_text_color_h != '') ? "\n\t" . cmsmasters_color_css('color', $button_text_color_h) : '') . 
				(($button_border_color_h != '') ? "\n\t" . cmsmasters_color_css('border-color', $button_border_color_h) : '') . 
			"\n" . '} ' . "\n";
			
			
			if ($button_style != '') {
				if (
					$button_style == 'cmsmasters_but_bg_slide_left' || 
					$button_style == 'cmsmasters_but_bg_slide_right' || 
					$button_style == 'cmsmasters_but_bg_slide_top' || 
					$button_style == 'cmsmasters_but_bg_slide_bottom' || 
					$button_style == 'cmsmasters_but_bg_expand_vert' || 
					$button_style == 'cmsmasters_but_bg_expand_hor' || 
					$button_style == 'cmsmasters_but_bg_expand_diag' 
				) {
					if ($button_bg_color != '') {
						$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_left:hover, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_right:hover, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_top:hover, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_bottom:hover, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_vert:hover, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_hor:hover, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_diag:hover { ' . 
							"\n\t" . cmsmasters_color_css('background-color', $button_bg_color) . 
						"\n" . '} ' . "\n";
					}
					
					if ($button_bg_color_h != '') {
						$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_left:after, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_right:after, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_top:after, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_bottom:after, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_vert:after, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_hor:after, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_diag:after { ' . 
							"\n\t" . cmsmasters_color_css('background-color', $button_bg_color_h) . 
						"\n" . '} ' . "\n";
					}
				}
				
				
				if (
					$button_style == 'cmsmasters_but_icon_dark_bg' || 
					$button_style == 'cmsmasters_but_icon_light_bg' || 
					$button_style == 'cmsmasters_but_icon_divider' || 
					$button_style == 'cmsmasters_but_icon_inverse' 
				) {
					$but_icon_pad = ($button_padding_hor != '' ? $button_padding_hor : '20') + ($button_line_height != '' ? $button_line_height : '40');
					
					if ($button_padding_hor != '' || $button_line_height != '') {
						$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_dark_bg, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_light_bg, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider, ' .  
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse { ' . 
							"\n\t" . 'padding-left:' . $but_icon_pad . 'px; ' . 
						"\n" . '} ' . "\n";
						
						$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_dark_bg:before, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_light_bg:before, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider:before, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:before, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_dark_bg:after, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_light_bg:after, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider:after, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:after { ' . 
							"\n\t" . 'width:' . $button_line_height . 'px; ' . 
						"\n" . '} ' . "\n";
					}
					
					
					if ($button_border_color != '' || $button_border_color_h != '') {
						$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider:after { ' . 
							"\n\t" . cmsmasters_color_css('border-color', $button_border_color) . 
						"\n" . '} ' . "\n";
						
						$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider:hover:after { ' . 
							"\n\t" . cmsmasters_color_css('border-color', $button_border_color_h) . 
						"\n" . '} ' . "\n";
					}
					
					
					if ($button_style == 'cmsmasters_but_icon_inverse') {
						$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:before { ' . 
							(($button_text_color_h != '') ? "\n\t" . cmsmasters_color_css('color', $button_text_color_h) : '') . 
						"\n" . '} ' . "\n";
					
						$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:after { ' . 
							(($button_bg_color_h != '') ? "\n\t" . cmsmasters_color_css('background-color', $button_bg_color_h) : '') . 
						"\n" . '} ' . "\n";
						
						$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:hover:before { ' . 
							(($button_text_color != '') ? "\n\t" . cmsmasters_color_css('color', $button_text_color) : '') . 
						"\n" . '} ' . "\n";
						
						$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:hover:after { ' . 
							(($button_bg_color != '') ? "\n\t" . cmsmasters_color_css('background-color', $button_bg_color) : '') . 
						"\n" . '} ' . "\n";
					}
				}
				
				
				if (
					$button_style == 'cmsmasters_but_icon_slide_left' || 
					$button_style == 'cmsmasters_but_icon_slide_right' 
				) {
					if ($button_padding_hor != '') {
						$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_left, ' . 
						'#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_right { ' . 
							"\n\t" . 'padding-left:' . ($button_padding_hor * 2) . 'px; ' . 
							"\n\t" . 'padding-right:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n" . '} ' . "\n";
						
						$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_left:before { ' . 
							"\n\t" . 'width:' . ($button_padding_hor * 2) . 'px; ' . 
							"\n\t" . 'left:-' . ($button_padding_hor * 2) . 'px; ' . 
						"\n" . '} ' . "\n";
						
						$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_left:hover:before { ' . 
							"\n\t" . 'left:0; ' . 
						"\n" . '} ' . "\n";
						
						$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_right:before { ' . 
							"\n\t" . 'width:' . ($button_padding_hor * 2) . 'px; ' . 
							"\n\t" . 'right:-' . ($button_padding_hor * 2) . 'px; ' . 
						"\n" . '} ' . "\n";
						
						$out .= '#cmsmasters_icon_box_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_right:hover:before { ' . 
							"\n\t" . 'right:0; ' . 
						"\n" . '} ' . "\n";
					}
				}
			}
		}
	}
	
	
	$box_icon = ($box_icon_type == 'icon') ? $box_icon : '';
	
	
	$out .= '</style>' . "\n" . 
	'<div id="cmsmasters_icon_box_' . $unique_id . '" class="cmsmasters_icon_box ' . $box_type . ' box_icon_type_' . $box_icon_type . 
	(($box_type != 'cmsmasters_icon_heading_left') ? ' ' . $box_icon : '') . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		'<div class="icon_box_inner">' . "\n" . 
			'<' . $heading_type . ' class="icon_box_heading' . (($box_type == 'cmsmasters_icon_heading_left') ? ' ' . $box_icon  . '' : '') . '">' . $title . '</' . $heading_type . '>' . "\n" . 
			cmsmasters_divpdel('<div class="icon_box_text">' . "\n" . 
				do_shortcode(wpautop($content)) . 
			'</div>' . "\n");
	
	
	if ($button_show == 'true') {
		$out .= '<a href="' . $button_link . '" class="cmsmasters_button icon_box_button' . 
		(($button_style != '') ? ' cmsmasters_but_clear_styles ' . $button_style : '') . 
		(($button_icon != '') ? ' ' . $button_icon : '') . 
		'"' . 
		(($button_target == 'blank') ? ' target="_blank"' : '') . 
		'><span>' . $button_title . '</span></a>' . "\n";
	}
	
	
	$out .= '</div>' . "\n" . 
	'</div>' . "\n";
	
	
	return $out;
}

add_shortcode('cmsmasters_icon_box', 'cmsmasters_icon_box');



/**
 * Featured Block
 */
function cmsmasters_featured_block($atts, $content = null) {
	$new_atts = apply_filters('cmsmasters_featured_block_atts_filter', array( 
		'text_width' => 		'100', 
		'text_position' => 		'center', 
		'text_padding' => 		'', 
		'text_align' => 		'left', 
		'color_overlay' => 		'', 
		'fb_bg_color' => 		'', 
		'bg_img' => 			'', 
		'bg_position' => 		'', 
		'bg_repeat' => 			'', 
		'bg_attachment' => 		'', 
		'bg_size' => 			'', 
		'top_padding' => 		'', 
		'bottom_padding' => 	'', 
		'border_radius' => 		'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
	) );
	
	
	$shortcode_name = 'featured-block';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	$out = '<style type="text/css"> ' . "\n\n";
	
	if ( 
		$top_padding != '' || 
		$bottom_padding != '' || 
		$border_radius != '' || 
		$fb_bg_color != '' || 
		$bg_img != '' 
	) {
		$out .= '#cmsmasters_fb_' . $unique_id . ' { ' . 
			(($top_padding != '') ? "\n\t" . 'padding-top:' . $top_padding . 'px; ' : '') . 
			(($bottom_padding != '') ? "\n\t" . 'padding-bottom:' . $bottom_padding . 'px; ' : '') . 
			(($border_radius != '') ? "\n\t" . '-webkit-border-radius:' . $border_radius . '; ' . "\n\t" . 'border-radius:' . $border_radius . '; ' : '') . 
			(($fb_bg_color != '') ? "\n\t" . cmsmasters_color_css('background-color', $fb_bg_color) : '');
		
		
		if ($bg_img != '') {
			$new_bg_img = explode('|', $bg_img);
			
			
			$new_bg_src = wp_get_attachment_image_src($new_bg_img[0], 'full');
			
			
			$out .= "\n\t" . 'background-image: url(' . $new_bg_src[0] . '); ' . 
			"\n\t" . 'background-position: ' . $bg_position . '; ' . 
			"\n\t" . 'background-repeat: ' . $bg_repeat . '; ' . 
			"\n\t" . 'background-attachment: ' . $bg_attachment . '; ' . 
			"\n\t" . 'background-size: ' . $bg_size . '; ' . 
			(($bg_attachment == 'fixed' && preg_match('/Safari/', $_SERVER['HTTP_USER_AGENT'])) ? "\n\t" . 'position: static; ' : '');
		}
		
		
		$out .= "\n" . '} ' . "\n\n";
	}
	
	
	$out .= '#cmsmasters_fb_' . $unique_id . ' .featured_block_inner { ' . 
			"\n\t" . 'width: ' . $text_width . '%; ' . 
			"\n\t" . 'padding: ' . $text_padding . '; ' . 
			"\n\t" . 'text-align: ' . $text_align . '; ' . 
			(($text_position == 'center') ? "\n\t" . 'margin:0 auto; ' : "\n\t" . 'float:' . $text_position . '; ') . 
			(($color_overlay != '') ? "\n\t" . cmsmasters_color_css('background-color', $color_overlay) : '') . 
		"\n" . '} ' . "\n\n" . 
		'#cmsmasters_fb_' . $unique_id . ' .featured_block_text { ' . 
			"\n\t" . 'text-align: ' . $text_align . '; ' . 
		"\n" . '} ' . "\n\n" . 
	'</style>';
	
	
    $out .= '<div id="cmsmasters_fb_' . $unique_id . '" class="cmsmasters_featured_block' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		'<div class="featured_block_inner">' . "\n" . 
			cmsmasters_divpdel('<div class="featured_block_text">' . "\n" . 
				do_shortcode(wpautop($content)) . 
			'</div>' . "\n");
	
	
	$out .= '</div>' . "\n" . 
	'</div>' . "\n";
	
	
	return $out;
}

add_shortcode('cmsmasters_featured_block', 'cmsmasters_featured_block');



/**
 * Special Heading
 */
function cmsmasters_custom_heading($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_custom_heading_atts_filter', array( 
		'type' => 					'h1', 
		'font_family' => 			'', 
		'font_size' => 				'', 
		'line_height' => 			'', 
		'font_weight' => 			'400', 
		'font_style' => 			'normal', 
		'icon' => 					'', 
		'text_align' => 			'left', 
		'color' => 					'', 
		'bg_color' => 				'', 
		'link' => 					'', 
		'target' => 				'', 
		'margin_top' => 			'0', 
		'margin_bottom' => 			'0', 
		'border_radius' => 			'', 
		'divider' => 				'', 
		'divider_type' => 			'short', 
		'divider_height' => 		'1', 
		'divider_style' => 			'solid', 
		'divider_color' => 			'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'custom-heading';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	if ($font_family != '') {
		$font_family_array = str_replace('+', ' ', explode(':', $font_family));
		
		$font_family_name = "'" . $font_family_array[0] . "'";
		
		
		cmsmasters_theme_google_font($font_family, $font_family_array[0]);
	}
	
	
	$out = '<style type="text/css"> ' . "\n" . 
		'#cmsmasters_heading_' . $unique_id . ' { ' . 
			"\n\t" . 'text-align:' . $text_align . '; ' . 
			"\n\t" . 'margin-top:' . $margin_top . 'px; ' . 
			"\n\t" . 'margin-bottom:' . $margin_bottom . 'px; ' . 
		"\n" . '} ' . "\n\n" . 
		'#cmsmasters_heading_' . $unique_id . ' .cmsmasters_heading { ' . 
			"\n\t" . 'text-align:' . $text_align . '; ' . 
			(($bg_color != '') ? "\n\t" . cmsmasters_color_css('background-color', $bg_color) : '') . 
			(($bg_color != '') ? "\n\t" . 'padding-left:1em; ' : '') . 
			(($bg_color != '') ? "\n\t" . 'padding-right:1em; ' : '') . 
			(($divider != '' && $text_align != 'left') ? "\n\t" . 'margin-left:1em; ' : '') . 
			(($divider != '' && $text_align != 'right') ? "\n\t" . 'margin-right:1em; ' : '') . 
			(($border_radius != '') ? "\n\t" . '-webkit-border-radius:' . $border_radius . '; ' . "\n\t" . 'border-radius:' . $border_radius . '; ' : '') . 
		"\n" . '} ' . "\n\n" . 
		'#cmsmasters_heading_' . $unique_id . ' .cmsmasters_heading, ' . 
		'#cmsmasters_heading_' . $unique_id . ' .cmsmasters_heading a { ' . 
			(($font_family != '') ? "\n\t" . 'font-family:' . $font_family_name . '; ' : '') . 
			(($font_size != '' && $font_size != '0') ? "\n\t" . 'font-size:' . $font_size . 'px; ' : '') . 
			(($line_height != '' && $line_height != '0') ? "\n\t" . 'line-height:' . $line_height . 'px; ' : '') . 
			"\n\t" . 'font-weight:' . $font_weight . '; ' . 
			"\n\t" . 'font-style:' . $font_style . '; ' . 
			(($color != '') ? "\n\t" . cmsmasters_color_css('color', $color) : '') . 
		"\n" . '} ' . "\n\n" . 
		'#cmsmasters_heading_' . $unique_id . ' .cmsmasters_heading_divider { ' . 
			(($divider != '') ? "\n\t" . 'border-bottom-width:' . $divider_height . 'px; ' : '') . 
			(($divider != '') ? "\n\t" . 'border-bottom-style:' . $divider_style . '; ' : '') . 
			(($divider != '' && $divider_color != '') ? "\n\t" . cmsmasters_color_css('border-bottom-color', $divider_color) : '') . 
			(($divider != '') ? "\n\t" . 'margin-top:-' . round((int) $divider_height / 2) . 'px; ' : '') . 
		"\n" . '} ' . "\n\n" . 
	'</style>' . "\n";
	
	
	$out .= '<div id="cmsmasters_heading_' . $unique_id . '" class="cmsmasters_heading_wrap cmsmasters_heading_align_' . $text_align . 
	(($divider != '') ? ' cmsmasters_heading_divider_' . $divider_type : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n\t";
	
	
	if ($divider != '' && $text_align != 'left') {
		$out .= '<span class="cmsmasters_heading_divider_left_wrap"><span class="cmsmasters_heading_divider cmsmasters_heading_divider_left"></span></span>' . "\n";
	}
	
	
	$out .= '<' . $type . ' class="cmsmasters_heading' . 
	(($icon != '' && $link == '') ? ' ' . $icon : '') . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">';
	
	
	if ($link != '') {
		$out .= '<a href="' . $link . '"' . 
		(($icon != '') ? ' class="' . $icon . '"' : '') . 
		(($target == 'blank') ? ' target="_blank"' : '') . 
		'>';
	}
	
	
	$out .= $content;
	
	
	if ($link != '') {
		$out .= '</a>';
	}
	
	
	$out .= '</' . $type . '>' . "\n";
	
	
	if ($divider != '' && $text_align != 'right') {
		$out .= '<span class="cmsmasters_heading_divider_right_wrap"><span class="cmsmasters_heading_divider cmsmasters_heading_divider_right"></span></span>' . "\n";
	}
	
	
	$out .= '</div>';
	
	
	return $out;
}

add_shortcode('cmsmasters_heading', 'cmsmasters_custom_heading');



/**
 * Dropcap
 */
function cmsmasters_dropcap($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_dropcap_atts_filter', array( 
		'type' => 		'type1', 
		'classes' => 	'' 
    ) );
	
	
	$shortcode_name = 'dropcap';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$out = '<div class="cmsmasters_dropcap ' . $type . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">' . $content . '</div>';
	
	
	return $out;
}

add_shortcode('cmsmasters_dropcap', 'cmsmasters_dropcap');



/**
 * Toggles
 */
function cmsmasters_toggles($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_toggles_atts_filter', array( 
		'mode' => 				'toggle', 
		'active' => 			'', 
		'sort' => 				'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'toggles';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $sort_toggles, 
		$toggle_active, 
		$toggle_counter;
	
	
	$sort_toggles = array();
	
	$toggle_active = (int) $active;
	
	$toggle_counter = 0;
	
	$toggles_filter = '';
	
	$toggles = do_shortcode($content);
	
	
	if ($sort == 'true') {
		$toggles_filter = '<div class="cmsmasters_toggles_filter">' . "\n\t" . 
			'<a href="#" data-key="all" title="' . __('All', 'cmsmasters_content_composer') . '" class="current_filter">' . __('All', 'cmsmasters_content_composer') . '</a>' . "\n";
		
		foreach ($sort_toggles as $sort_toggle_key => $sort_toggle_value) {
			$toggles_filter .= "\t" . ' / <a href="#" data-key="' . $sort_toggle_key . '" title="' . $sort_toggle_value . '">' . $sort_toggle_value . '</a>' . "\n";
		}
		
		$toggles_filter .= '</div>';
	}
	
	
	return '<div class="cmsmasters_toggles toggles_mode_' . $mode . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . 
		$toggles_filter . "\n" . 
		$toggles . 
	'</div>';
}

add_shortcode('cmsmasters_toggles', 'cmsmasters_toggles');

/**
 * Single Toggle
 */
function cmsmasters_toggle($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_toggle_atts_filter', array( 
		'title' => 		__('Title', 'cmsmasters_content_composer'), 
		'tags' => 		'', 
		'classes' => 	'' 
    ) );
	
	
	$shortcode_name = 'toggle';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $sort_toggles, 
		$toggle_active, 
		$toggle_counter;
	
	
	$toggle_counter++;
	
	
	$toggle_tags = explode(',', $tags);
	
	
	foreach ($toggle_tags as $toggle_tag) {
		if ($toggle_tag != '') {
			$sort_toggles[generateSlug(trim($toggle_tag), 30)] = trim($toggle_tag);
		}
	}
	
	
	$out = '<div class="cmsmasters_toggle_wrap' . 
	(($toggle_active == $toggle_counter) ? ' current_toggle' : '') . 
	(($classes != '') ? ' ' . $classes : '') . 
	'" data-tags="all ';
	
	
	$tgl_tag_str = '';
	
	
	foreach ($toggle_tags as $tgl_tag) {
		$tgl_tag_str .= generateSlug(trim($tgl_tag), 30) . ' ';
	}
	
	
	$out .= substr($tgl_tag_str, 0, strlen($tgl_tag_str) - 1);
	
	
	$out .= '">' . "\n" . 
		'<div class="cmsmasters_toggle_title">' . "\n" . 
			'<span class="cmsmasters_toggle_plus">' . "\n" . 
				'<span class="cmsmasters_toggle_plus_hor"></span>' . "\n" . 
				'<span class="cmsmasters_toggle_plus_vert"></span>' . "\n" . 
			'</span>' . "\n" . 
			'<a href="#">' . $title . '</a>' . "\n" . 
		'</div>' . "\n" . 
		'<div class="cmsmasters_toggle">' . "\n" . 
			cmsmasters_divpdel('<div class="cmsmasters_toggle_inner">' . "\n" . 
				do_shortcode(wpautop($content)) . 
			'</div>' . "\n") . 
		'</div>' . "\n" . 
	'</div>';
	
	
	return $out;
}

add_shortcode('cmsmasters_toggle', 'cmsmasters_toggle');



/**
 * Tabs
 */
function cmsmasters_tabs($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_tabs_atts_filter', array( 
		'mode' => 				'tab', 
		'position' => 			'left', 
		'active' => 			'1', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'tabs';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $style_tab, 
		$out_tabs, 
		$tabs_mode, 
		$tab_active, 
		$tab_counter;
	
	
	$style_tab = '';
	
	$out_tabs = '';
	
	$tabs_mode = $mode;
	
	$tab_active = (int) $active;
	
	$tab_counter = 0;
	
	
	$tabs = do_shortcode($content);
	
	
	$out = (($style_tab != '') ? '<style type="text/css"> ' . $style_tab . '</style> ' . "\n" : '') . 
	'<div class="cmsmasters_tabs tabs_mode_' . $mode . 
	(($mode == 'tour') ? ' ' . 'tabs_pos_' . $position : '') . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		'<ul class="cmsmasters_tabs_list">' . "\n" . 
			$out_tabs . 
		'</ul>' . "\n" . 
		'<div class="cmsmasters_tabs_wrap">' . "\n" . 
			$tabs . 
		'</div>' . "\n" . 
	'</div>';
	
	
	return $out;
}

add_shortcode('cmsmasters_tabs', 'cmsmasters_tabs');

/**
 * Single Tab
 */
function cmsmasters_tab($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_tab_atts_filter', array( 
		'title' => 			__('Title', 'cmsmasters_content_composer'), 
		'custom_colors' => 	'', 
		'bg_color' => 		'', 
		'icon' => 			'', 
		'classes' => 		'' 
    ) );
	
	
	$shortcode_name = 'tab';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	global $style_tab, 
		$out_tabs, 
		$tabs_mode, 
		$tab_active, 
		$tab_counter;
	
	
	$tab_counter++;
	
	if ($custom_colors == 'true') { 
		$style_tab .= "\n" . '#cmsmasters_tabs_list_item_' . $unique_id . ' a:hover,' . 
		'#cmsmasters_tabs_list_item_' . $unique_id . '.current_tab a { ' . 
			"\n\t" . cmsmasters_color_css('background-color', $bg_color) . 
			"\n\t" . cmsmasters_color_css('border-color', $bg_color) . 
		"\n" . '} ' . "\n";
	}
	
	
	$out_tabs .= '<li id="cmsmasters_tabs_list_item_' . $unique_id . '" class="cmsmasters_tabs_list_item' . 
	(($tab_active == $tab_counter) ? ' current_tab' : '') . 
	'">' . "\n" . 
		'<a href="#"' . 
		(($icon != '') ? ' class="' . $icon . '"' : '') . 
		'>' . "\n" . 
			'<span>' . $title . '</span>' . "\n" . 
		'</a>' . "\n" . 
	'</li>';
	
	
	return '<div id="cmsmasters_tab_' . $unique_id . '" class="cmsmasters_tab' . 
	(($tab_active == $tab_counter) ? ' active_tab' : '') . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">' . "\n" . 
		cmsmasters_divpdel('<div class="cmsmasters_tab_inner">' . "\n" . 
			do_shortcode(wpautop($content)) . 
		'</div>' . "\n") . 
	'</div>';
}

add_shortcode('cmsmasters_tab', 'cmsmasters_tab');



/**
 * Icon List Items
 */
function cmsmasters_icon_list_items($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_icon_list_items_atts_filter', array( 
		'type' => 				'block', 
		'icon_type' => 			'icon', 
		'icon' => 				'cmsmasters-icon-thumbs-up-5', 
		'icon_size' => 			'0', 
		'heading' => 			'h4', 
		'items_color_type' => 	'border', 
		'border_width' => 		'10', 
		'border_radius' => 		'50%', 
		'unifier_width' => 		'0', 
		'position' => 			'left', 
		'icon_space' => 		'100', 
		'item_height' => 		'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'icon-list-items';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $style_item, 
		$out_inner, 
		$list_type, 
		$list_icon_type, 
		$list_icon, 
		$list_icon_size, 
		$list_heading, 
		$list_items_color_type, 
		$list_icon_space;
	
	
	$unique_id = uniqid();
	
	
	$list_type = $type;
	
	$list_icon_type = $icon_type;
	
	$list_icon = $icon;
	
	$list_icon_size = $icon_size;
	
	$list_heading = $heading;
	
	$list_items_color_type = $items_color_type;
	
	$list_icon_space = $icon_space;
	
	$style_item = '';
	
	$out_inner = '';
	
	
	if ($list_type == 'block') {
		if ($icon_type != 'icon' && $icon_type != 'image') {
			$style_item .= '#cmsmasters_icon_list_items_' . $unique_id . ' { ' . 
				"\n\t" . 'counter-reset:counter_' . $unique_id . '; ' . 
			"\n" . '} ' . "\n\n" . 
			'#cmsmasters_icon_list_items_' . $unique_id . ' .cmsmasters_icon_list_item { ' . 
				"\n\t" . 'counter-increment:counter_' . $unique_id . '; ' . 
			"\n" . '} ' . "\n\n" . 
			'#cmsmasters_icon_list_items_' . $unique_id . ' .cmsmasters_icon_list_item .cmsmasters_icon_list_icon:before { ' . 
				"\n\t" . 'content:counter(counter_' . $unique_id . ', ' . $icon_type . '); ' . 
			"\n" . '} ' . "\n";
		}
		
		
		if ($position == 'left') {
			$style_item .= "\n" . '#cmsmasters_icon_list_items_' . $unique_id . '.cmsmasters_icon_list_items .cmsmasters_icon_list_item:before { ' . 
				"\n\t" . 'left:' . (((int) $icon_space / 2) - (((int) $unifier_width != 0) ? ($unifier_width / 2) : 0)) . 'px; ' . 
				"\n\t" . 'top:' . $icon_space  . 'px; ' . 
			"\n" . '} ' . "\n";
		} else {
			$style_item .= '#cmsmasters_icon_list_items_' . $unique_id . '.cmsmasters_icon_list_pos_right .cmsmasters_icon_list_item:before { ' . 
				"\n\t" . 'left:auto; ' . 
				"\n\t" . 'right:' . (((int) $icon_space / 2) - (((int) $unifier_width != 0) ? ($unifier_width / 2) : 0)) . 'px; ' . 
				"\n\t" . 'top:' . $icon_space  . 'px; ' . 
			"\n" . '} ' . "\n";
		}
		
		
		$style_item .= '#cmsmasters_icon_list_items_' . $unique_id . '.cmsmasters_icon_list_type_block .cmsmasters_icon_list_item:before { ' . 
			"\n\t" . 'width:' . $unifier_width . 'px; ' . 
		"\n" . '} ' . "\n\n" . 
		'#cmsmasters_icon_list_items_' . $unique_id . ' .cmsmasters_icon_list_icon { ' . 
			"\n\t" . 'width:' . $icon_space . 'px; ' . 
			"\n\t" . 'height:' . $icon_space . 'px; ' . 
			"\n\t" . '-webkit-border-radius:' . $border_radius . '; ' . 
			"\n\t" . 'border-radius:' . $border_radius . '; ' . 
		"\n" . '} ' . "\n\n" . 
		'#cmsmasters_icon_list_items_' . $unique_id . ' .cmsmasters_icon_list_icon:before { ' . 
			"\n\t" . 'font-size:' . $icon_size . 'px; ' . 
			"\n\t" . 'line-height:' . $icon_space . 'px; ' . 
		"\n" . '} ' . "\n\n" . 
		'#cmsmasters_icon_list_items_' . $unique_id . ' .cmsmasters_icon_list_icon:after { ' . 
			"\n\t" . 'border-width:' . $border_width . 'px; ' . 
			"\n\t" . 'width:' . ((int) $icon_space + 2) . 'px; ' . 
			"\n\t" . 'height:' . ((int) $icon_space + 2) . 'px; ' . 
			"\n\t" . '-webkit-border-radius:' . $border_radius . '; ' . 
			"\n\t" . 'border-radius:' . $border_radius . '; ' . 
		"\n" . '} ' . "\n";
	} else {
		$style_item .= '#cmsmasters_icon_list_items_' . $unique_id . ' { ' . 
			"\n\t" . 'padding-left:' . ((int) $icon_size + 20) . 'px; ' . 
		"\n" . '} ' . "\n\n" . 
		'#cmsmasters_icon_list_items_' . $unique_id . ' .cmsmasters_icon_list_item:before { ' . 
			"\n\t" . 'font-size:' . $icon_size . 'px; ' . 
			"\n\t" . 'left:-' . ((int) $icon_size + 20) . 'px; ' . 
		"\n" . '} ' . "\n";
		
		
		if ($item_height != '') {
			$style_item .= '#cmsmasters_icon_list_items_' . $unique_id . ' .cmsmasters_icon_list_item { ' . 
				"\n\t" . 'line-height:' . $item_height . 'px; ' . 
				"\n\t" . 'padding:0; ' . 
			"\n" . '} ' . "\n\n" . 
			'#cmsmasters_icon_list_items_' . $unique_id . ' .cmsmasters_icon_list_item:before { ' . 
				"\n\t" . 'line-height:' . $item_height . 'px; ' . 
				"\n\t" . 'top:0; ' . 
			"\n" . '} ' . "\n";
		}
	}
	
	
	do_shortcode($content);
	
	
	$out = '<style type="text/css"> ' . $style_item . '</style> ' . "\n" . 
	'<ul id="cmsmasters_icon_list_items_' . $unique_id . '" class="cmsmasters_icon_list_items cmsmasters_icon_list_type_' . $type . ' cmsmasters_icon_list_pos_' . $position . ' cmsmasters_color_type_' . $items_color_type . 
	(($icon_type != 'icon' && $icon_type != 'image') ? ' cmsmasters_icon_list_icon_type_number' : '') . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . 
		$out_inner . 
	'</ul>';
	
	
	return $out;
}

add_shortcode('cmsmasters_icon_list_items', 'cmsmasters_icon_list_items');

/**
 * Single Icon List Item
 */
function cmsmasters_icon_list_item($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_icon_list_item_atts_filter', array( 
		'icon' => 			'', 
		'image' => 			'', 
		'title' => 			__('Title', 'cmsmasters_content_composer'), 
		'color' => 			'', 
		'classes' => 		'' 
    ) );
	
	
	$shortcode_name = 'icon-list-item';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $style_item, 
		$out_inner, 
		$list_type, 
		$list_icon_type, 
		$list_icon, 
		$list_icon_size, 
		$list_heading, 
		$list_items_color_type, 
		$list_icon_space;
	
	
	$unique_id = uniqid();
	
	
	$list_type = ($list_type != 'list') ? 'block' : 'list';
	
	
	if ($list_type == 'block') {
		if ($list_icon_type == 'icon') {
			$icon = ($icon != '') ? $icon : $list_icon;
		} else {
			$icon = '';
		}
		
		
		if ($list_icon_type == 'image' && $image != '') {
			$image_id = explode('|', $image);
			
			
			if (is_numeric($image_id[0]) && is_array(wp_get_attachment_image_src($image_id[0], 'full'))) {
				$image_url_src = wp_get_attachment_image_src($image_id[0], 'full');
			
				$image_url = $image_url_src[0];
			} else if ($image_id[0] != '') {
				$image_url = $image_id[0];
			} else {
				$image_url = $image_id[1];
			}
			
			
			$style_item .= "\n" . '.cmsmasters_icon_list_items #cmsmasters_icon_list_item_' . $unique_id . '.cmsmasters_icon_type_image .cmsmasters_icon_list_icon { ' . 
				"\n\t" . 'background-image:url(' . $image_url . '); ' . 
			"\n" . '} ' . "\n";
		}
		
		
		if ($list_items_color_type == 'border') {
			if ($color != '') {
				$style_item .= "\n" . '.cmsmasters_icon_list_items.cmsmasters_color_type_border #cmsmasters_icon_list_item_' . $unique_id . ' .cmsmasters_icon_list_icon:after { ' . 
					"\n\t" . cmsmasters_color_css('border-color', $color) . 
				"\n" . '} ' . "\n";
			}
			
			
			$style_item .= "\n" . '.cmsmasters_icon_list_items.cmsmasters_color_type_border #cmsmasters_icon_list_item_' . $unique_id . ':hover .cmsmasters_icon_list_icon:after { ' . 
				"\n\t" . 'border-color:transparent; ' . 
				"\n\t" . 'border-width:0; ' . 
			"\n" . '} ' . "\n";
		} elseif ($list_items_color_type == 'bg') {
			if ($color != '') {
				$style_item .= "\n" . '.cmsmasters_icon_list_items.cmsmasters_color_type_bg #cmsmasters_icon_list_item_' . $unique_id . ' .cmsmasters_icon_list_icon { ' . 
					"\n\t" . cmsmasters_color_css('background-color', $color) . 
				"\n" . '} ' . "\n";
			}
			
			
			$style_item .= "\n" . '.cmsmasters_icon_list_items.cmsmasters_color_type_bg #cmsmasters_icon_list_item_' . $unique_id . ':hover .cmsmasters_icon_list_icon:after { ' . 
				"\n\t" . 'border-color:transparent; ' . 
				"\n\t" . 'border-width:0; ' . 
			"\n" . '} ' . "\n";
		} elseif ($list_items_color_type == 'icon') {
			if ($color != '') {
				$style_item .= "\n" . '.cmsmasters_icon_list_items.cmsmasters_color_type_icon #cmsmasters_icon_list_item_' . $unique_id . ' .cmsmasters_icon_list_icon:before { ' . 
					"\n\t" . cmsmasters_color_css('color', $color) . 
				"\n" . '} ' . "\n\n" . 
				'.cmsmasters_icon_list_items.cmsmasters_color_type_icon #cmsmasters_icon_list_item_' . $unique_id . ':hover .cmsmasters_icon_list_icon { ' . 
					"\n\t" . cmsmasters_color_css('background-color', $color) . 
				"\n" . '} ' . "\n";
			}
			
			
			$style_item .= "\n" . '.cmsmasters_icon_list_items.cmsmasters_color_type_icon #cmsmasters_icon_list_item_' . $unique_id . ':hover .cmsmasters_icon_list_icon:before { ' . 
				"\n\t" . 'color:inherit; ' . 
			"\n" . '} ' . "\n";
		}
		
		
		$out_inner .= '<li id="cmsmasters_icon_list_item_' . $unique_id . '" class="cmsmasters_icon_list_item' . 
		(($list_icon_type == 'image') ? ' cmsmasters_icon_type_image' : '') . 
		(($classes != '') ? ' ' . $classes : '') . 
		'">' . "\n" . 
			'<div class="cmsmasters_icon_list_item_inner">' . "\n" . 
				'<div class="cmsmasters_icon_list_icon_wrap">' . "\n" . 
					'<span class="cmsmasters_icon_list_icon ' . $icon . '"></span>' . "\n" . 
				'</div>' . "\n" . 
				'<div class="cmsmasters_icon_list_item_content">' . "\n" . 
					'<' . $list_heading . ' class="cmsmasters_icon_list_item_title">' . $title . '</' . $list_heading . '>' . "\n" . 
					cmsmasters_divpdel('<div class="cmsmasters_icon_list_item_text">' . "\n" . 
						do_shortcode(wpautop($content)) . 
					'</div>' . "\n") . 
				'</div>' . "\n" . 
			'</div>' . "\n" . 
		'</li>';
	} else {
		if ($color != '') {
			$style_item .= "\n" . '.cmsmasters_icon_list_items #cmsmasters_icon_list_item_' . $unique_id . ':before { ' . 
				"\n\t" . cmsmasters_color_css('color', $color) . 
			"\n" . '} ' . "\n";
		}
		
		
		$out_inner .= '<li id="cmsmasters_icon_list_item_' . $unique_id . '" class="cmsmasters_icon_list_item ' . $icon . 
		(($classes != '') ? ' ' . $classes : '') . 
		'">' . $title . '</li>';
	}
}

add_shortcode('cmsmasters_icon_list_item', 'cmsmasters_icon_list_item');



/**
 * Progress Bars
 */
function cmsmasters_stats($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_stats_atts_filter', array( 
		'mode' => 				'bars', 
		'type' => 				'horizontal', 
		'count' => 				'5', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'stats';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	if ($mode == 'circles') {
		wp_enqueue_script('easePieChart');
	}
	
	
	global $style_stats, 
		$stats_mode, 
		$stats_type, 
		$stats_count;
	
	
	$style_stats = '';
	
	$stats_mode = $mode;
	
	$stats_type = $type;
	
	
	if ($count == 5) {
		$stats_count = ' one_fifth';
	} elseif ($count == 4) {
		$stats_count = ' one_fourth';
	} elseif ($count == 3) {
		$stats_count = ' one_third';
	} elseif ($count == 2) {
		$stats_count = ' one_half';
	} else {
		$stats_count = ' one_first';
	}
	
	
	$stats = do_shortcode($content);
	
	
	return '<style type="text/css"> ' . $style_stats . '</style> ' . "\n" . 
	'<div class="cmsmasters_stats stats_mode_' . $mode . ' stats_type_' . $type . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . 
		$stats . 
	'</div>';
}

add_shortcode('cmsmasters_stats', 'cmsmasters_stats');

/**
 * Single Progress Bar
 */
function cmsmasters_stat($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_stat_atts_filter', array( 
		'subtitle' => 		'', 
		'progress' => 		'0', 
		'icon' => 			'', 
		'color' => 			'', 
		'classes' => 		'' 
    ) );
	
	
	$shortcode_name = 'stat';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	global $style_stats, 
		$stats_mode, 
		$stats_type, 
		$stats_count;
	
	
	if ($stats_mode == 'bars') {
		$style_stats .= "\n" . '.cmsmasters_stats.shortcode_animated #cmsmasters_stat_' . $unique_id . '.cmsmasters_stat { ' . 
			"\n\t" . (($stats_type == 'horizontal') ? 'width' : 'height') . ':' . $progress . '%; ' . 
		"\n" . '} ' . "\n\n" . 
		'#cmsmasters_stat_' . $unique_id . ' .cmsmasters_stat_inner { ' . 
			(($color != '') ? "\n\t" . cmsmasters_color_css('background-color', $color) : '') . 
		"\n" . '} ' . "\n";
	}
	
	
	return '<div class="cmsmasters_stat_wrap' . (($stats_mode == 'circles' || ($stats_mode == 'bars' && $stats_type == 'vertical')) ? $stats_count : '') . '">' . "\n" . 
		(($stats_mode == 'bars' && $stats_type == 'vertical') ? '<div class="cmsmasters_stat_container">' . "\n" : '') . 
			'<div id="cmsmasters_stat_' . $unique_id . '" class="cmsmasters_stat' . 
			(($classes != '') ? ' ' . $classes : '') . 
			(($content == '' && $icon == '') ? ' stat_only_number' : '') . 
			(($content != '' && $icon != '') ? ' stat_has_titleicon' : '') . '"' . 
			' data-percent="' . $progress . '"' . 
			(($stats_mode == 'circles' && $color != '') ? ' data-bar-color="' . $color . '"' : '') . 
			'>' . "\n" . 
				'<div class="cmsmasters_stat_inner' . 
				(($icon != '') ? ' ' . $icon : '') . 
				'">' . "\n" . 
					(($content != '' && $stats_mode == 'bars' && $stats_type == 'horizontal') ? '<span class="cmsmasters_stat_title">' . $content . '</span>' . "\n" : '') . 
					'<span class="cmsmasters_stat_counter_wrap">' . "\n" . 
						'<span class="cmsmasters_stat_counter">' . (($stats_mode == 'bars') ? $progress : '0') . '</span>' . 
						'<span class="cmsmasters_stat_units">%</span>' . "\n" . 
					'</span>' . "\n" . 
					(($content != '' && $stats_mode == 'circles') ? '<span class="cmsmasters_stat_title">' . $content . '</span>' . "\n" : '') . 
				'</div>' . "\n" . 
			'</div>' . "\n" . 
		(($stats_mode == 'bars' && $stats_type == 'vertical') ? '</div>' . "\n" : '') . 
		(($content != '' && $stats_mode == 'bars' && $stats_type == 'vertical') ? '<span class="cmsmasters_stat_title">' . $content . '</span>' . "\n" : '') . 
		(($subtitle != '') ? '<span class="cmsmasters_stat_subtitle">' . $subtitle . '</span>' . "\n" : '') . 
	'</div>';
}

add_shortcode('cmsmasters_stat', 'cmsmasters_stat');



/**
 * Counters
 */
function cmsmasters_counters($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_counters_atts_filter', array( 
		'type' => 					'horizontal', 
		'count' => 					'5', 
		'icon_size' => 				'0', 
		'icon_space' => 			'0', 
		'icon_border_width' => 		'0', 
		'icon_border_radius' => 	'0', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'counters';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	global $style_counters, 
		$counters_count;
	
	
	if ($count == 5) {
		$counters_count = ' one_fifth';
	} elseif ($count == 4) {
		$counters_count = ' one_fourth';
	} elseif ($count == 3) {
		$counters_count = ' one_third';
	} elseif ($count == 2) {
		$counters_count = ' one_half';
	} else {
		$counters_count = ' one_first';
	}
	
	
	$style_counters = "\n" . '#cmsmasters_counters_' . $unique_id . ' .cmsmasters_counter.counter_has_icon .cmsmasters_counter_inner, ' . "\n" . 
	'#cmsmasters_counters_' . $unique_id . ' .cmsmasters_counter.counter_has_icon .cmsmasters_counter_inner, ' . 
	'#cmsmasters_counters_' . $unique_id . ' .cmsmasters_counter.counter_has_image .cmsmasters_counter_inner { ' . 
		"\n\t" . 'padding-' . (($type == 'horizontal') ? ((is_rtl()) ? 'right' : 'left') : 'top') . ':' . ((int) $icon_space + 10) . 'px; ' . 
	"\n" . '} ' . "\n\n" . 
	'#cmsmasters_counters_' . $unique_id . '.counters_type_vertical .cmsmasters_counter .cmsmasters_counter_inner:before { ' . 
		"\n\t" . 'margin-' . ((is_rtl()) ? 'right' : 'left') . ':-' . ((int) $icon_space / 2) . 'px; ' . 
	"\n" . '} ' . "\n\n" . 
	'#cmsmasters_counters_' . $unique_id . '.counters_type_horizontal .cmsmasters_counter .cmsmasters_counter_inner .cmsmasters_counter_counter_wrap { ' . 
		"\n\t" . 'line-height:' . $icon_space . 'px; ' . 
	"\n" . '} ' . "\n\n" . 
	'#cmsmasters_counters_' . $unique_id . ' .cmsmasters_counter .cmsmasters_counter_inner:before { ' . 
		"\n\t" . 'font-size:' . $icon_size . 'px; ' . 
		"\n\t" . 'line-height:' . ((int) $icon_space - ((int) $icon_border_width * 2)) . 'px; ' . 
		"\n\t" . 'width:' . $icon_space . 'px; ' . 
		"\n\t" . 'height:' . $icon_space . 'px; ' . 
		"\n\t" . 'border-width:' . $icon_border_width . 'px; ' . 
		(((int) $icon_border_radius > 0) ? "\n\t" . '-webkit-border-radius:' . $icon_border_radius . '; ' : '') . 
		(((int) $icon_border_radius > 0) ? "\n\t" . 'border-radius:' . $icon_border_radius . '; ' : '') . 
	"\n" . '} ' . "\n\n";
	
	
	$counters = do_shortcode($content);
	
	
	return '<style type="text/css"> ' . $style_counters . '</style> ' . "\n" . 
	'<div id="cmsmasters_counters_' . $unique_id . '" class="cmsmasters_counters counters_type_' . $type . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . 
		$counters . 
	'</div>';
}

add_shortcode('cmsmasters_counters', 'cmsmasters_counters');

/**
 * Single Counter
 */
function cmsmasters_counter($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_counter_atts_filter', array( 
		'subtitle' => 		'', 
		'value' => 			'0', 
		'value_prefix' => 	'', 
		'value_suffix' => 	'', 
		'color' => 			'', 
		'icon_type' => 		'icon', 
		'icon' => 			'', 
		'image' => 			'', 
		'icon_color' => 	'', 
		'icon_bg_color' => 	'', 
		'icon_bd_color' => 	'', 
		'classes' => 		'' 
    ) );
	
	
	$shortcode_name = 'counter';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	global $style_counters, 
		$counters_count;
	
	
	$style_counters .= "\n" . '#cmsmasters_counter_' . $unique_id . ' .cmsmasters_counter_inner:before { ' . 
		(($icon_color != '') ? "\n\t" . cmsmasters_color_css('color', $icon_color) : '') . 
		(($icon_bg_color != '') ? "\n\t" . cmsmasters_color_css('background-color', $icon_bg_color) : '') . 
		(($icon_bd_color != '') ? "\n\t" . cmsmasters_color_css('border-color', $icon_bd_color) : '') . 
	"\n" . '} ' . "\n\n";
	
	
	if ($icon_type == 'image' && $image != '') {
		$image_id = explode('|', $image);
		
		
		$image_url_array = wp_get_attachment_image_src($image_id[0], 'full');
		
		
		if (is_numeric($image_id[0]) && is_array($image_url_array)) {
			$image_url = $image_url_array[0];
		} else if ($image_id[0] != '') {
			$image_url = $image_id[0];
		} else {
			$image_url = $image_id[1];
		}
		
		
		$style_counters .= '#cmsmasters_counter_' . $unique_id . ' .cmsmasters_counter_inner:before { ' . 
			"\n\t" . "content:''; " . 
			"\n\t" . 'background-image:url(' . $image_url . '); ' . 
		"\n" . '} ' . "\n";
	}
	
	
	if ($color != '') {
		$style_counters .= '#cmsmasters_counter_' . $unique_id . ' .cmsmasters_counter_counter { ' . 
			"\n\t" . cmsmasters_color_css('color', $color) . 
		"\n" . '} ' . "\n";
	}
	
	
	return '<div class="cmsmasters_counter_wrap' . $counters_count . '">' . "\n" . 
		'<div id="cmsmasters_counter_' . $unique_id . '" class="cmsmasters_counter' . 
		(($classes != '') ? ' ' . esc_attr($classes) : '') . 
		(($icon_type == 'icon' && $icon != '') ? ' counter_has_icon' : '') . 
		(($icon_type == 'image' && $image != '') ? ' counter_has_image' : '') . 
		'" data-percent="' . $value . '">' . "\n" . 
			'<div class="cmsmasters_counter_inner' . 
			(($icon != '') ? ' ' . esc_attr($icon) : '') . 
			'">' . "\n" . 
				'<span class="cmsmasters_counter_counter_wrap">' . "\n" . 
					'<span class="cmsmasters_counter_prefix">' . esc_html($value_prefix) . '</span>' . 
					'<span class="cmsmasters_counter_counter">0</span>' . 
					'<span class="cmsmasters_counter_suffix">' . esc_html($value_suffix) . '</span>' . "\n" . 
				'</span>' . "\n" . 
				(($content != '') ? '<span class="cmsmasters_counter_title">' . $content . '</span>' . "\n" : '') . 
			'</div>' . "\n" . 
			(($subtitle != '') ? '<span class="cmsmasters_counter_subtitle">' . $subtitle . '</span>' . "\n" : '') . 
		'</div>' . "\n" . 
	'</div>';
}

add_shortcode('cmsmasters_counter', 'cmsmasters_counter');



/**
 * Embed
 */
function cmsmasters_embed($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_embed_atts_filter', array( 
		'link' => 				'', 
		'width' => 				'', 
		'height' => 			'', 
		'wrap' => 				'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'embed';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $wp_embed;
	
	
    $shcd_out = '';
	
	
	if ($wrap != '') {
		$shcd_out .= '[cmsmasters_video_wrap' . 
		(($width != '') ? ' width="' . $width . '"' : '') . 
		(($animation != '') ? ' animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		(($classes != '') ? ' classes="' . $classes . '"' : '') . 
		']';
	} else {
		$shcd_out .= '<div class="cmsmasters_embed_wrap' . 
		(($classes != '') ? ' ' . $classes : '') . 
		'"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n";
	}
	
	
	$shcd_out .= $wp_embed->run_shortcode('[embed' . 
	(($width != '') ? ' width="' . $width . '"' : '') . 
	(($height != '') ? ' height="' . $height . '"' : '') . 
	']' . $link . '[/embed]');
	
	
	if ($wrap != '') {
		$shcd_out .= '[/cmsmasters_video_wrap]';
	} else {
		$shcd_out .= '</div>';
	}
	
	
	$out = do_shortcode($shcd_out);
	
	
	return $out;
}

add_shortcode('cmsmasters_embed', 'cmsmasters_embed');



/**
 * Videos
 */
function cmsmasters_videos($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_videos_atts_filter', array( 
		'poster' => 			'', 
		'width' => 				'', 
		'height' => 			'', 
		'wrap' => 				'', 
		'autoplay' => 			'', 
		'loop' => 				'', 
		'preload' => 			'none', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'videos';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$out = '';
	
	
	$attrs = array( 
		'preload' => $preload 
	);
	
	
	if ($poster != '') {
		$newPosterArray = explode('|', $poster);
		
		
		$newPoster = wp_get_attachment_image_src($newPosterArray[0], 'full');
		
		
		$attrs['poster'] = $newPoster[0];
	}
	
	
	if ($width != '') {
		$attrs['width'] = $width;
	}
	
	
	if ($height != '') {
		$attrs['height'] = $height;
	}
	
	
	if ($autoplay != '') {
		$attrs['autoplay'] = 'on';
	}
	
	
	if ($loop != '') {
		$attrs['loop'] = 'on';
	}
	
	
	$content = str_replace('[/cmsmasters_video][cmsmasters_video]', ',', $content);
	
	$content = str_replace('[cmsmasters_video]', '', $content);
	
	$content = str_replace('[/cmsmasters_video]', '', $content);
	
	
	$newContentArray = explode(',', $content);
	
	
	foreach ($newContentArray as $newContentItem) {
		$newContentItemArray = explode('|', $newContentItem);
		
		
		if (count($newContentItemArray) > 1) {
			$newContentItemVal = $newContentItemArray[1];
		} else {
			$newContentItemVal = $newContentItemArray[0];
		}
		
		
		$attrs[substr(strrchr($newContentItemVal, '.'), 1)] = $newContentItemVal;
	}
	
	
	if ($wrap != '') {
		$out .= '[cmsmasters_video_wrap' . 
		(($width != '') ? ' width="' . $width . '"' : '') . 
		(($animation != '') ? ' animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		(($classes != '') ? ' classes="' . $classes . '"' : '') . 
		']';
	} else {
		$out .= '<div class="cmsmasters_video' . 
		(($classes != '') ? ' ' . $classes : '') . 
		'"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n";
	}
	
	
	$out .= wp_video_shortcode($attrs);
	
	
	if ($wrap != '') {
		$out .= '[/cmsmasters_video_wrap]';
	} else {
		$out .= '</div>';
	}
	
	
	$out = do_shortcode($out);
	
	
	return $out;
}

add_shortcode('cmsmasters_videos', 'cmsmasters_videos');



/**
 * Video Wrap
 */
function cmsmasters_video_wrap($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_video_wrap_atts_filter', array( 
		'width' => 				'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'video-wrap';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	$out = '';
	
	
	if ($width != '') {
		$out .= '<style type="text/css"> ' . "\n" . 
			'#cmsmasters_video_wrap_' . $unique_id . ' { ' . 
				"\n\t" . 'max-width:' . $width . 'px; ' . 
			"\n" . '} ' . "\n" . 
		'</style>';
	}
	
	
    $out .= cmsmasters_divpdel('<div id="cmsmasters_video_wrap_' . $unique_id . '" class="cmsmasters_video_wrap' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		do_shortcode(wpautop($content)) . 
	'</div>' . "\n");
	
	
	return $out;
}

add_shortcode('cmsmasters_video_wrap', 'cmsmasters_video_wrap');



/**
 * Audio
 */
function cmsmasters_audios($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_audios_atts_filter', array( 
		'autoplay' => 			'', 
		'loop' => 				'', 
		'preload' => 			'none', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'audios';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$attrs = array( 
		'preload' => $preload 
	);
	
	
	if ($autoplay != '') {
		$attrs['autoplay'] = 'on';
	}
	
	
	if ($loop != '') {
		$attrs['loop'] = 'on';
	}
	
	
	$content = str_replace('[/cmsmasters_audio][cmsmasters_audio]', ',', $content);
	
	$content = str_replace('[cmsmasters_audio]', '', $content);
	
	$content = str_replace('[/cmsmasters_audio]', '', $content);
	
	
	$newContentArray = explode(',', $content);
	
	
	foreach ($newContentArray as $newContentItem) {
		$newContentItemArray = explode('|', $newContentItem);
		
		
		if (count($newContentItemArray) > 1) {
			$newContentItemVal = $newContentItemArray[1];
		} else {
			$newContentItemVal = $newContentItemArray[0];
		}
		
		
		$attrs[substr(strrchr($newContentItemVal, '.'), 1)] = $newContentItemVal;
	}
	
	
	return '<div class="cmsmasters_audio' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		wp_audio_shortcode($attrs) . 
	'</div>';
}

add_shortcode('cmsmasters_audios', 'cmsmasters_audios');



/**
 * Table
 */
function cmsmasters_table($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_table_atts_filter', array( 
		'caption' => 			'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'table';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	return '<table class="cmsmasters_table' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . 
		'<caption>' . $caption . '</caption>' . 
		do_shortcode($content) . 
	'</table>';
}

add_shortcode('cmsmasters_table', 'cmsmasters_table');

/**
 * Table Row
 */
function cmsmasters_tr($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_tr_atts_filter', array( 
		'type' => 	'' 
    ) );
	
	
	$shortcode_name = 'tr';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$out = '';
	
	
	if ($type == 'header') {
		$out .= '<thead>';
	} else if ($type == 'footer') {
		$out .= '<tfoot>';
	}
	
	
	$out .= '<tr' . 
		(($type != '') ? ' class="cmsmasters_table_row_' . $type . '"' : '') . 
	'>' . 
		do_shortcode($content) . 
	'</tr>';
	
	
	if ($type == 'header') {
		$out .= '</thead>';
	} else if ($type == 'footer') {
		$out .= '</tfoot>';
	}
	
	
	return $out;
}

add_shortcode('cmsmasters_tr', 'cmsmasters_tr');

/**
 * Table Cell
 */
function cmsmasters_td($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_td_atts_filter', array( 
		'type' => 	'', 
		'align' => 	'left' 
    ) );
	
	
	$shortcode_name = 'td';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	return '<' . (($type == 'header') ? 'th' : 'td') . 
	(($align != '') ? ' class="cmsmasters_table_cell_align' . $align . '"' : '') . 
	'>' . 
		do_shortcode($content) . 
	'</' . (($type == 'header') ? 'th' : 'td') . '>';
}

add_shortcode('cmsmasters_td', 'cmsmasters_td');



/**
 * Divider
 */
function cmsmasters_divider($atts, $content = null) {
	$new_atts = apply_filters('cmsmasters_divider_atts_filter', array( 
		'width' => 			'short', 
		'height' => 		'1', 
		'style' => 			'solid', 
		'position' => 		'center', 
		'color' => 			'', 
		'margin_top' => 	'0', 
		'margin_bottom' => 	'0', 
		'classes' => 		'' 
	) );
	
	
	$shortcode_name = 'divider';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	$out = '<style type="text/css"> ' . "\n" . 
		'#cmsmasters_divider_' . $unique_id . ' { ' . 
			"\n\t" . 'border-bottom-width:' . $height . 'px; ' . 
			"\n\t" . 'border-bottom-style:' . $style . '; ' . 
			"\n\t" . 'padding-top:' . $margin_top . 'px; ' . 
			"\n\t" . 'margin-bottom:' . $margin_bottom . 'px; ' . 
			(($color != '') ? "\n\t" . cmsmasters_color_css('border-bottom-color', $color) : '') . 
		"\n" . '} ' . "\n" . 
	'</style>' . "\n";
	
	
	$out .= '<div id="cmsmasters_divider_' . $unique_id . '" class="' . 
	(($height < 1) ? 'cl' : 'cmsmasters_divider cmsmasters_divider_width_' . $width . ' cmsmasters_divider_pos_' . $position) . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"></div>';
	
	
	return $out;
}

add_shortcode('cmsmasters_divider', 'cmsmasters_divider');



/**
 * Contact Form
 */
function cmsmasters_contact_form($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_contact_form_atts_filter', array( 
		'form_plugin' => 		'', 
		'form_cf7' => 			'', 
		'form_cfb' => 			'', 
		'email_cfb' => 			'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'contact-form';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
    $out = '<div class="cmsmasters_contact_form' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>';
	
	
	if ($form_plugin == 'cf7' && $form_cf7 != '') {
		$cf7_array = explode('{|}', $form_cf7);
		
		
		$out .= do_shortcode('[contact-form-7 id="' . $cf7_array[0] . '" title="' . stripslashes($cf7_array[1]) . '"]');
	} elseif ($form_plugin == 'cfb' && $form_cfb != '' && $email_cfb != '') {
		$out .= do_shortcode('[cmsmasters_contact_form_sc formname="' . $form_cfb . '" email="' . $email_cfb . '"]');
	}
	
	
	$out .= '</div>';
	
	
	return $out;
}

add_shortcode('cmsmasters_contact_form', 'cmsmasters_contact_form');



/**
 * Slider
 */
function cmsmasters_slider($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_slider_atts_filter', array( 
		'slider_plugin' => 		'', 
		'slider_layer' => 		'', 
		'slider_rev' => 		'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'slider';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
    $out = '<div class="cmsmasters_slider' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">';
	
	
	if ($slider_plugin == 'layer' && $slider_layer != '') {
		$out .= do_shortcode('[layerslider id="' . $slider_layer . '"]');
	} elseif ($slider_plugin == 'rev' && $slider_rev != '') {
		$out .= do_shortcode('[rev_slider alias="' . $slider_rev . '"]');
	}
	
	
	$out .= '</div>';
	
	
	return $out;
}

add_shortcode('cmsmasters_slider', 'cmsmasters_slider');



/**
 * Clients
 */
function cmsmasters_clients($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_clients_atts_filter', array( 
		'columns' => 			'5', 
		'layout' => 			'', 
		'height' => 			'180', 
		'autoplay' => 			'', 
		'speed' => 				'1', 
		'slides_control' => 	'', 
		'arrow_control' => 		'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'clients';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	$clients_col = '';
	
	global $client_out;
	
	$client_out = '';
	
	if ($columns == 1) {
		$clients_col = 'clients_one';
	} elseif ($columns == 2) {
		$clients_col = 'clients_two';
	} elseif ($columns == 3) {
		$clients_col = 'clients_three';
	} elseif ($columns == 4) {
		$clients_col = 'clients_four';
	} elseif ($columns == 5) {
		$clients_col = 'clients_five';
	}
	
	
	do_shortcode($content);
	
	$out = '<style type="text/css"> ' . "\n" . 
		'#cmsmasters_clients_' . $unique_id . ' .cmsmasters_clients_item { ' . 
			'height:' . $height . 'px; ' .  
			'line-height:' . $height . 'px; ' .  
		'} ' . "\n" . 
		'#cmsmasters_clients_' . $unique_id . ' .cmsmasters_clients_item a { ' . 
			'line-height:' . $height . 'px; ' .  
		'} ' . "\n" . 
	'</style>' . "\n";
	
	
	if ($layout == 'slider') {
		$out .= '<script type="text/javascript">' . 
			'jQuery(document).ready(function () { ' . 
				'jQuery("#cmsmasters_clients_' . $unique_id . '").owlCarousel( { ' . 
					'singleItem : false, ' . 
					'items : ' . $columns . ', ' . 
					'itemsDesktopSmall : [768,2], ' . 
					'itemsTablet: [540,1], ' . 
					'slideSpeed : ' . ($speed * 1000) . ', ' . 
					'paginationSpeed : ' . ($speed * 1000) . ', ' . 
					'autoPlay : ' . (($autoplay != 'true') ? 'false' : 'true') . ', ' . 
					'stopOnHover: true, ' . 
					'pagination : ' . (($slides_control != 'true') ? 'false' : 'true') . ', ' . 
					'navigation : ' . (($arrow_control != 'true') ? 'false' : 'true') . ', ' . 
					'navigationText : 	[ ' . 
						'"<span class=\"cmsmasters_prev_arrow\"><span></span></span>", ' . 
						'"<span class=\"cmsmasters_next_arrow\"><span></span></span>" ' . 
					'] ' . 
				'} );' . 
			'} );' . 
		'</script>' . "\n" . 
		'<div class="cmsmasters_clients_slider_wrap"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n" . 
			'<div id="cmsmasters_clients_' . $unique_id . '" class="cmsmasters_clients_slider cmsmasters_owl_slider owl-carousel' . 
			(($classes != '') ? ' ' . $classes : '') . 
			'"' . 
			'>' . "\n" . 
			$client_out . 
			'</div>' . "\n" . 
		'</div>' . "\n";
	} else {
		$out .= '<div class="cmsmasters_clients_grid_wrap"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n" . 
		'<div id="cmsmasters_clients_' . $unique_id . '" class="cmsmasters_clients_grid' . ' ' . $clients_col . 
		(($classes != '') ? ' ' . $classes : '') . 
		'">' . "\n" . 
		'<div class="cmsmasters_clients_items slides">' . "\n" . 
			$client_out . 
		'</div>' . "\n" . 
		'</div>' . "\n" . 
		'</div>' . "\n";
	}
	
	return $out;
}

add_shortcode('cmsmasters_clients', 'cmsmasters_clients');

/**
 * Single Client
 */
function cmsmasters_client($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_client_atts_filter', array( 
		'logo' => 		'', 
		'link' => 		'', 
		'classes' => 	'' 
    ) );
	
	
	$shortcode_name = 'client';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $client_out;
	
	
	$counter = 0;
	
	if ($content == null) {
		$content = __('Name', 'cmsmasters_content_composer');
	}
	
	
	if ($logo != '') {
		$client_logo = wp_get_attachment_image_src($logo, 'full');
		
		if ($link != '') {
			$client_out .= '<div class="cmsmasters_clients_item item' . 
			(($classes != '') ? ' ' . $classes : '') . 
			'">' . "\n" . 
				'<a href="' . (($link != '') ? '' . $link : '') . '" target="_blank">' .  
					'<img src="' . $client_logo[0] . '" alt="' . $content . '" title="' . $content . '" />' . 
				'</a>' . "\n" . 
			'</div>' . "\n";
		} else {
			$client_out .= '<div class="cmsmasters_clients_item item' . 
			(($classes != '') ? ' ' . $classes : '') . 
			'">' . "\n" . 
				'<img src="' . $client_logo[0] . '" alt="' . $content . '" title="' . $content . '" />' . "\n" .
			'</div>' . "\n";
		}
	}
}

add_shortcode('cmsmasters_client', 'cmsmasters_client');



/**
 * Button
 */
function cmsmasters_button($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_button_atts_filter', array( 
		'button_title' => 			'', 
		'button_type' => 			'', 
		'button_campaign' => 		'', 
		'button_link' => 			'#',
		'button_target' => 			'', 
		'button_text_align' => 		'center', 
		'button_style' => 			'', 
		'button_font_family' => 	'', 
		'button_font_size' => 		'', 
		'button_line_height' => 	'', 
		'button_font_weight' => 	'', 
		'button_font_style' => 		'', 
		'button_padding_hor' => 	'', 
		'button_border_width' => 	'', 
		'button_border_style' => 	'', 
		'button_border_radius' => 	'', 
		'button_bg_color' => 		'', 
		'button_text_color' => 		'', 
		'button_border_color' => 	'', 
		'button_bg_color_h' => 		'', 
		'button_text_color_h' => 	'', 
		'button_border_color_h' => 	'', 
		'button_icon' => 			'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'button';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	if ($button_font_family != '') {
		$font_family_array = explode(':', $button_font_family);
		
		$font_family_name = "'" . $font_family_array[0] . "'";
		
		
		cmsmasters_theme_google_font($button_font_family, $font_family_array[0]);
	}
	
	
	$out = '';
	
	
	if (
		$button_style != '' || 
		$button_font_family != '' || 
		$button_font_size != '' || 
		$button_line_height != '' || 
		$button_font_weight != '' || 
		$button_font_style != '' || 
		$button_padding_hor != '' || 
		$button_border_width != '' || 
		$button_border_style != '' || 
		$button_border_radius != '' || 
		$button_bg_color != '' || 
		$button_text_color != '' || 
		$button_border_color != '' || 
		$button_bg_color_h != '' || 
		$button_text_color_h != '' || 
		$button_border_color_h != '' 
	) {
		$button_custom_styles = 'true';
	} else {
		$button_custom_styles = 'false';
	}
	
	
	$out .= '<style type="text/css">' . "\n" . 
		'#cmsmasters_button_' . $unique_id . ' { ' . 
			"\n\t" . (($button_text_align == 'center') ? 'text-align' : 'float') . ':' . $button_text_align . '; ' . 
		"\n" . '} ' . "\n\n" . 
		'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button:before { ' . 
			"\n\t" . 'margin-right:' . (($content != null) ? '.5em; ' : '0;') . 
			"\n\t" . 'margin-left:0; ' . 
			"\n\t" . 'vertical-align:baseline; ' . 
		"\n" . '} ' . "\n\n";
		
		if ($button_custom_styles == 'true') {
			$out .= '#cmsmasters_button_' . $unique_id . ' .cmsmasters_button { ' . 
				(($button_font_family != '') ? "\n\t" . 'font-family:' . str_replace('+', ' ', $font_family_name) . '; ' : '') . 
				(($button_font_size != '') ? "\n\t" . 'font-size:' . $button_font_size . 'px; ' : '') . 
				(($button_line_height != '') ? "\n\t" . 'line-height:' . $button_line_height . 'px; ' : '') . 
				(($button_font_weight != '') ? "\n\t" . 'font-weight:' . $button_font_weight . '; ' : '') . 
				(($button_font_style != '') ? "\n\t" . 'font-style:' . $button_font_style . '; ' : '') . 
				(($button_padding_hor != '') ? "\n\t" . 'padding-right:' . $button_padding_hor . 'px; ' : '') . 
				(($button_padding_hor != '') ? "\n\t" . 'padding-left:' . $button_padding_hor . 'px; ' : '') . 
				(($button_border_width != '') ? "\n\t" . 'border-width:' . $button_border_width . 'px; ' : '') . 
				(($button_border_style != '') ? "\n\t" . 'border-style:' . $button_border_style . '; ' : '') . 
				(($button_border_radius != '') ? "\n\t" . '-webkit-border-radius:' . $button_border_radius . '; ' . "\n\t" . 'border-radius:' . $button_border_radius . '; ' : '') . 
				(($button_bg_color != '') ? "\n\t" . cmsmasters_color_css('background-color', $button_bg_color) : '') . 
				(($button_text_color != '') ? "\n\t" . cmsmasters_color_css('color', $button_text_color) : '') . 
				(($button_border_color != '') ? "\n\t" . cmsmasters_color_css('border-color', $button_border_color) : '') . 
			"\n" . '} ' . "\n";
			
			$out .= '#cmsmasters_button_' . $unique_id . ' .cmsmasters_button:hover { ' . 
				(($button_bg_color_h != '') ? "\n\t" . cmsmasters_color_css('background-color', $button_bg_color_h) : '') . 
				(($button_text_color_h != '') ? "\n\t" . cmsmasters_color_css('color', $button_text_color_h) : '') . 
				(($button_border_color_h != '') ? "\n\t" . cmsmasters_color_css('border-color', $button_border_color_h) : '') . 
			"\n" . '} ' . "\n";
		}
		
		
		if ($button_style != '') {
			if (
				$button_style == 'cmsmasters_but_bg_slide_left' || 
				$button_style == 'cmsmasters_but_bg_slide_right' || 
				$button_style == 'cmsmasters_but_bg_slide_top' || 
				$button_style == 'cmsmasters_but_bg_slide_bottom' || 
				$button_style == 'cmsmasters_but_bg_expand_vert' || 
				$button_style == 'cmsmasters_but_bg_expand_hor' || 
				$button_style == 'cmsmasters_but_bg_expand_diag' 
			) {
				if ($button_bg_color != '') {
					$out .= '#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_left:hover, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_right:hover, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_top:hover, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_bottom:hover, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_vert:hover, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_hor:hover, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_diag:hover { ' . 
						"\n\t" . cmsmasters_color_css('background-color', $button_bg_color) . 
					"\n" . '} ' . "\n";
				}
				
				if ($button_bg_color_h != '') {
					$out .= '#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_left:after, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_right:after, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_top:after, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_bottom:after, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_vert:after, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_hor:after, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_diag:after { ' . 
						"\n\t" . cmsmasters_color_css('background-color', $button_bg_color_h) . 
					"\n" . '} ' . "\n";
				}
			}
			
			
			if (
				$button_style == 'cmsmasters_but_icon_dark_bg' || 
				$button_style == 'cmsmasters_but_icon_light_bg' || 
				$button_style == 'cmsmasters_but_icon_divider' || 
				$button_style == 'cmsmasters_but_icon_inverse' 
			) {
				$but_icon_pad = ($button_padding_hor != '' ? $button_padding_hor : '20') + ($button_line_height != '' ? $button_line_height : '40');
				
				if ($button_padding_hor != '' || $button_line_height != '') {
					$out .= '#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_dark_bg, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_light_bg, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider, ' .  
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse { ' . 
						"\n\t" . 'padding-left:' . $but_icon_pad . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_dark_bg:before, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_light_bg:before, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider:before, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:before, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_dark_bg:after, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_light_bg:after, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider:after, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:after { ' . 
						"\n\t" . 'width:' . $button_line_height . 'px; ' . 
					"\n" . '} ' . "\n";
				}
				
				
				if ($button_border_color != '' || $button_border_color_h != '') {
					$out .= '#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider:after { ' . 
						"\n\t" . cmsmasters_color_css('border-color', $button_border_color) . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider:hover:after { ' . 
						"\n\t" . cmsmasters_color_css('border-color', $button_border_color_h) . 
					"\n" . '} ' . "\n";
				}
				
				
				if ($button_style == 'cmsmasters_but_icon_inverse') {
					$out .= '#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:before { ' . 
						(($button_text_color_h != '') ? "\n\t" . cmsmasters_color_css('color', $button_text_color_h) : '') . 
					"\n" . '} ' . "\n";
				
					$out .= '#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:after { ' . 
						(($button_bg_color_h != '') ? "\n\t" . cmsmasters_color_css('background-color', $button_bg_color_h) : '') . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:hover:before { ' . 
						(($button_text_color != '') ? "\n\t" . cmsmasters_color_css('color', $button_text_color) : '') . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:hover:after { ' . 
						(($button_bg_color != '') ? "\n\t" . cmsmasters_color_css('background-color', $button_bg_color) : '') . 
					"\n" . '} ' . "\n";
				}
			}
			
			
			if (
				$button_style == 'cmsmasters_but_icon_slide_left' || 
				$button_style == 'cmsmasters_but_icon_slide_right' 
			) {
				if ($button_padding_hor != '') {
					$out .= '#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_left, ' . 
					'#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_right { ' . 
						"\n\t" . 'padding-left:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'padding-right:' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_left:before { ' . 
						"\n\t" . 'width:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'left:-' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_left:hover:before { ' . 
						"\n\t" . 'left:0; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_right:before { ' . 
						"\n\t" . 'width:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'right:-' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsmasters_button_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_right:hover:before { ' . 
						"\n\t" . 'right:0; ' . 
					"\n" . '} ' . "\n";
				}
			}
		}
	$out .= '</style>' . "\n";
	
	
	if ($button_type == 'donation') {
		$cmsmasters_donations_form_page = get_option('cmsmasters_donations_form_page');
		
		
		if ($button_campaign != '') {
			$link = add_query_arg('campaign_id', urlencode($button_campaign), get_permalink($cmsmasters_donations_form_page));
		} else {
			$link = get_permalink($cmsmasters_donations_form_page);
		}
	} else {
		$link = $button_link;
	}
	
	
	$out .= '<div id="cmsmasters_button_' . $unique_id . '" class="button_wrap">' . 
		'<a href="' . $link . '" class="cmsmasters_button' . 
		(($button_style != '') ? ' cmsmasters_but_clear_styles ' . $button_style : '') . 
		(($button_icon != '') ? ' ' . $button_icon : '') . 
		(($classes != '') ? ' ' . $classes : '') . 
		'"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		(($button_target == 'blank') ? ' target="_blank"' : '') . 
		'><span>' . $content . '</span></a>' . 
	'</div>' . "\n";
	
	
	return $out;
}

add_shortcode('cmsmasters_button', 'cmsmasters_button');



/**
 * Icon
 */
function cmsmasters_simple_icon($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_simple_icon_atts_filter', array( 
		'icon' => 					'', 
		'size' => 					'40', 
		'space' => 					'60', 
		'display' => 				'block', 
		'text_align' => 			'center', 
		'border_width' => 			'0', 
		'border_radius' => 			'0', 
		'link' => 					'', 
		'target' => 				'', 
		'color' => 					'', 
		'bg_color' => 				'', 
		'bd_color' => 				'', 
		'animation' => 				'', 
		'animation_delay' => 		'' 
    ) );
	
	
	$shortcode_name = 'simple-icon';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
    $unique_id = uniqid();
	
	
	$out = '<style type="text/css"> ' . "\n" . 
		'#cmsmasters_icon_' . $unique_id . ' { ' . 
			"\n\t" . 'display:' . $display . '; ' . 
			"\n\t" . 'text-align:' . $text_align . '; ' . 
		'} ' . "\n\n" . 
		'#cmsmasters_icon_' . $unique_id . ' .cmsmasters_simple_icon { ' . 
			"\n\t" . 'border-width:' . $border_width . 'px; ' . 
			"\n\t" . 'width:' . $space . 'px; ' . 
			"\n\t" . 'height:' . $space . 'px; ' . 
			"\n\t" . 'font-size:' . $size . 'px; ' . 
			"\n\t" . 'line-height:' . ((int) $space - ((int) $border_width * 2)) . 'px; ' . 
			"\n\t" . 'text-align:' . $text_align . '; ' . 
			(($border_radius != '') ? "\n\t" . '-webkit-border-radius:' . $border_radius . '; ' . "\n\t" . 'border-radius:' . $border_radius . '; ' : '') . 
			(($color != '') ? "\n\t" . cmsmasters_color_css('color', $color) : '') . 
			(($bg_color != '') ? "\n\t" . cmsmasters_color_css('background-color', $bg_color) : '') . 
			(($bd_color != '') ? "\n\t" . cmsmasters_color_css('border-color', $bd_color) : '') . 
		'} ' . "\n" . 
	'</style>' . "\n";
	
	
    $out .= '<div id="cmsmasters_icon_' . $unique_id . '" class="cmsmasters_icon_wrap">' . 
		(($link != '') ? '<a href="' . $link . '"' . (($target == 'blank') ? ' target="_blank"' : '') . '>' : '') . 
			'<span class="cmsmasters_simple_icon' . 
			(($icon != '') ? ' ' . $icon : '') . 
			(($content != '') ? ' ' . $content : '') . 
			'"' . 
			(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
			(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
			'></span>' . 
		(($link != '') ? '</a>' : '') . 
	'</div>' . "\n";
	
	
	return $out;
}

add_shortcode('cmsmasters_simple_icon', 'cmsmasters_simple_icon');



/**
 * Image
 */
function cmsmasters_image($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_image_atts_filter', array( 
		'align' => 				'', 
		'caption' => 			'', 
		'link' => 				'', 
		'target' => 			'', 
		'lightbox' => 			'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'image';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	if ($align == 'left') {
		$img_align = ' cmsmasters_image_l';
	} elseif ($align == 'right') {
		$img_align = ' cmsmasters_image_r';
	} elseif ($align == 'center') {
		$img_align = ' cmsmasters_image_c';
	} else {
		$img_align = ' cmsmasters_image_n';
	}
	
	
	$out = '';
	
	
	if ($content != null) {
		$new_image_thumb = explode('|', $content);
		
		
		if (!isset($new_image_thumb[2]) || $new_image_thumb[2] == '') {
			$new_image_size = 'full';
		} else {
			$new_image_size = $new_image_thumb[2];
		}
		
		
		if (is_numeric($new_image_thumb[0])) {
			$new_image = wp_get_attachment_image_src($new_image_thumb[0], $new_image_size);
			
			
			$out .= (($align == 'center') ? '<div class="aligncenter">' . "\n" : '');
			
			
			if ($link != '') {
				$out .= '<div class="cmsmasters_img ' . $img_align . 
				(($caption != '') ? ' with_caption' : '') . 
				(($classes != '') ? ' ' . $classes : '') . 
				'"' . 
				(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
				(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
				'>' . "\n" . 
					'<a href="' . $link . '"' . 
					(($lightbox == 'true') ? ' rel="ilightbox"' : '') . 
					(($target == 'true') ? ' target="_blank"' : '') . 
					'>' . 
						'<img src="' . $new_image[0] . '" alt="' . 
						(($caption != '') ? ' ' . $caption : '') . 
						'" />' . 
					'</a>' . "\n" . 
					(($caption != '') ? '<p class="cmsmasters_img_caption">' . $caption . '</p>' : '') . 
				'</div>' . "\n";
			} else {
				$out .= '<div class="cmsmasters_img ' . $img_align . 
				(($caption != '') ? ' with_caption' : '') . 
				(($classes != '') ? ' ' . $classes : '') . 
				'"' . 
				(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
				(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
				'>' . "\n" . 
					'<img src="' . $new_image[0] . '" alt="' . 
					(($caption != '') ? ' ' . $caption : '') . 
					'" />' . "\n" . 
					(($caption != '') ? '<p class="cmsmasters_img_caption">' . $caption . '</p>' : '') . 
				'</div>' . "\n";
			}
			
			
			$out .= (($align == 'center') ? '</div>' . "\n" : '');
		}
	}
	
	
	return $out;
}

add_shortcode('cmsmasters_image', 'cmsmasters_image');



/**
 * Gallery
 */
function cmsmasters_gallery($atts, $content = null) { 
    $new_atts = apply_filters('cmsmasters_gallery_atts_filter', array( 
		'layout' => 				'', 
		'gallery_type' => 			'grid', 
		'gallery_count' => 			'', 
		'gallery_more_text' => 		'', 
		'gallery_padding' => 		'10', 
		'image_size_slider' => 		'', 
		'image_size_gallery' => 	'', 
		'hover_pause' => 			'5', 
		'hover_active' => 			'1', 
		'hover_pause_on_hover' => 	'true', 
		'slider_effect' => 			'', 
		'slider_autoplay' => 		'', 
		'slider_slideshow_speed' => '7', 
		'slider_animation_speed' => '600', 
		'slider_pause_on_hover' => 	'', 
		'slider_rewind' => 			'', 
		'slider_rewind_speed' => 	'1000', 
		'slider_nav_control' => 	'', 
		'slider_nav_arrow' => 		'', 
		'gallery_columns' => 		'', 
		'gallery_links' => 			'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'gallery';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	$images = explode(',', do_shortcode($content));
	
	
	$out = '';
	
	
	if ($layout == 'slider') {
		if ($image_size_slider == 'thumbnail' || $image_size_slider == 'medium' || $image_size_slider == 'large' || $image_size_slider == 'full') {
			$slider_size = get_option($image_size_slider . '_size_w');
		} else {
			$slider_size_array = cmsmasters_image_thumbnail_list();
			
			$slider_size = $slider_size_array[$image_size_slider]['width'];
		}
	} elseif ($layout == 'gallery') {
		if ($image_size_gallery == 'thumbnail' || $image_size_gallery == 'medium' || $image_size_gallery == 'large' || $image_size_gallery == 'full') {
			$slider_size = get_option($image_size_gallery . '_size_w');
		} else {
			$slider_size_array = cmsmasters_image_thumbnail_list();
			
			$slider_size = $slider_size_array[$image_size_gallery]['width'];
		}
	}
	
	if ($content != null) {
		if ($layout == 'hover') {
			$out .= '<script type="text/javascript">' . 
					'jQuery(document).ready(function () { ' . 
						'jQuery("#cmsmasters_hover_slider_' . $unique_id . '").cmsmastersHoverSlider( { ' . 
							'sliderBlock : "#cmsmasters_hover_slider_' . $unique_id . '", ' . 
							'sliderItems : ".cmsmasters_hover_slider_items", ' . 
							'thumbWidth : "100", ' . 
							'thumbHeight : "60", ' . 
							'activeSlide : ' . $hover_active . ', ' . 
							'pauseTime : ' . ($hover_pause * 1000) . ', ' . 
							'pauseOnHover : ' . $hover_pause_on_hover . ' ' . 
						'} );' . 
					'} );' . 
				'</script>' . 
			'<div id="cmsmasters_hover_slider_' . $unique_id . '" class="cmsmasters_hover_slider' . 
			(($classes != '') ? ' ' . $classes : '') . 
			'"' . 
			(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
			(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
			'>' . "\n" . 
			'<ul class="cmsmasters_hover_slider_items">' . "\n";
			
			
			foreach ($images as $image) { 
				$out .= '<li>' . 
					'<figure class="cmsmasters_hover_slider_full_img">' . 
						wp_get_attachment_image($image, 'post-thumbnail') . 
					'</figure>' . 
				'</li>';
			}
			
			$out .= '</ul>' . "\n" . 
			'</div>' . "\n";
		} elseif ($layout == 'slider') {
			$out .= '<div class="cmsmasters_content_slider_wrap" style="max-width:' . $slider_size . 'px;"' . 
			(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
			(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
			'>' . "\n" . 
				'<script type="text/javascript">' . 
					'jQuery(document).ready(function () { ' . 
						'jQuery("#cmsmasters_slider_' . $unique_id . '.cmsmasters_content_slider").owlCarousel( { ' . 
							'singleItem : true, ' . 
							(($slider_effect == 'slide') ? 'transitionStyle: false, ' : 'transitionStyle: "fade", ') . 
							(($slider_rewind != 'true') ? 'rewindNav: false, ' : '') . 
							'rewindSpeed : ' . $slider_rewind_speed . ', ' . 
							'slideSpeed : ' . $slider_animation_speed . ', ' . 
							'autoHeight : true, ' . 
							'paginationSpeed : 	' . $slider_animation_speed . ', ' . 
							(($slider_autoplay != 'true') ? 'autoPlay : false, ' : 'autoPlay : ' . ($slider_slideshow_speed * 1000) . ',') . 
							(($slider_pause_on_hover == 'true') ? 'stopOnHover: true, ' : '') . 
							(($slider_nav_control != 'true') ? 'pagination: false, ' : '') . 
							(($slider_nav_arrow == 'true') ? 'navigation : true, ' : '') . 
							'navigationText : 	[ ' . 
								'"<span class=\"cmsmasters_prev_arrow\"><span></span></span>", ' . 
								'"<span class=\"cmsmasters_next_arrow\"><span></span></span>" ' . 
							'] ' . 
						'} );' . 
					'} );' . 
				'</script>' . "\n" . 
				'<div id="cmsmasters_slider_' . $unique_id . '" class="cmsmasters_content_slider cmsmasters_owl_slider owl-carousel' . 
				(($classes != '') ? ' ' . $classes : '') . 
				'">' . "\n";
			
			
			foreach ($images as $image) { 
				$out .= '<div class="cmsmasters_content_slider_item">' . 
					wp_get_attachment_image($image, $image_size_slider) . 
				'</div>';
			}
			
			$out .= '</div>' . "\n" . 
			'</div>' . "\n";
		} else {
			$gallery_more_text = ($gallery_more_text != '') ? $gallery_more_text : __('Load More', 'cmsmasters');
			
			$out_gallery_items = '';
			
			$gallery_arr = array();
			
			
			$i = 0;
			
			foreach ($images as $image) {
				$i += 1;
				
				$image_src = wp_get_attachment_image_src($image, 'full');
				
				
				$gallery_item = '<li class="cmsmasters_gallery_item' . ((get_post_field('post_excerpt', $image) != '') ? ' cmsmasters_caption' : '') . '">' . 
					'<figure>';
						
						if ($gallery_links != 'none') {
							$gallery_item .= '<a'. (($gallery_links == 'blank') ? ' target="_blank"' : '') . ' href="' . $image_src[0] . '"' . (($gallery_links == 'lightbox') ? ' rel="ilightbox[' . $unique_id . ']"' : '') . '>';
						}
						
						$gallery_item .= wp_get_attachment_image($image, $image_size_gallery);
						
						if ($gallery_links != 'none') {
							$gallery_item .= '</a>';
						}
						
						$gallery_item .= ((get_post_field('post_excerpt', $image) != '') ? '<figcaption>' . get_post_field('post_excerpt', $image) . '</figcaption>' : '') . 
					'</figure>' . 
				'</li>';
				
				
				if ($gallery_count == '' || $i <= $gallery_count) {
					$out_gallery_items .= $gallery_item;
				} else {
					$out_js = $gallery_item;
					
					$gallery_arr[] = "'{$out_js}'";
				}
			}
			
			
			if (!empty($gallery_arr)) {
				$gallery_arr = implode(',', $gallery_arr);
			} else {
				$gallery_arr = '';
			}
			
			
			$out .= '<div id="cmsmasters_gallery_' . $unique_id . '" class="cmsmasters_gallery_wrap' . 
			(($classes != '') ? ' ' . $classes : '') . 
			'"' . 
			(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
			(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
			'>';
			
			
			wp_enqueue_style('isotope');
			
			
			wp_enqueue_script('isotope');
			
			wp_enqueue_script('isotopeMode');
			
			
			$out .= "<style type=\"text/css\">
				#cmsmasters_gallery_{$unique_id} .cmsmasters_gallery {
					margin:0 0 0 -{$gallery_padding}px;
				}
				
				#cmsmasters_gallery_{$unique_id} .cmsmasters_gallery .cmsmasters_gallery_item {
					padding:0 0 {$gallery_padding}px {$gallery_padding}px;
				}
			</style>";
			
			
			$out .= '<ul class="cmsmasters_gallery' . 
				(($gallery_columns != '') ? ' cmsmasters_' . $gallery_columns : '') . 
				' cmsmasters_more_items_loader' . 
			'">' . 
				$out_gallery_items . 
			'</ul>';
			
			
			if ($gallery_arr != '') {
				$out .= '<div class="cmsmasters_wrap_more_items">' . 
					'<div class="cmsmasters_more_gallery_items cmsmasters_wrap_items_loader">' . 
						'<a href="javascript:void(0);" class="cmsmasters_button cmsmasters_gallery_items_loader cmsmasters_items_loader">' . 
							'<span>' . $gallery_more_text . '</span>' . 
						'</a>' . 
					'</div>' . 
				'</div>';
			}
			
			
			$out .= "<script type=\"text/javascript\">
				jQuery(document).ready(function () {
					(function ($) {
						if ($('#cmsmasters_gallery_{$unique_id}').find('.cmsmasters_gallery_item').length == '0') {
							return false;
						}
						
						
						startGallery( 
							'" . $unique_id . "', 
							'" . $gallery_type . "', 
							'" . ($gallery_count != '' ? $gallery_count : 'false') . "', 
							" . ($gallery_arr != '' ? "[{$gallery_arr}]" : "'false'") . " 
						);
					} )(jQuery);
				} );
			</script>
			</div>";
		}
		
		return $out;
	}
}

add_shortcode('cmsmasters_gallery', 'cmsmasters_gallery');



/**
 * Quotes
 */
function cmsmasters_quotes($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_quotes_atts_filter', array( 
		'mode' => 				'grid', 
		'columns' => 			'2', 
		'speed' => 				'10', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'quotes';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	if ($columns == '4') {
		$new_columns = 'quote_four';
	} elseif ($columns == '3') {
		$new_columns = 'quote_three';
	} elseif ($columns == '2') {
		$new_columns = 'quote_two';
	} else {
		$new_columns = 'quote_one';
	}
	
	
	global $quote_mode,
		$quote_counter,
		$column_count;
	
	
	$column_count = $columns;
	
	$unique_id = uniqid();
	
	$quote_mode = $mode;
	
	$quotes_out = '';
	
	$quote_counter = 0;
	
	
	$quote_out = do_shortcode($content);
	
	
	if ($quote_mode == 'slider') {
		$quotes_out .= '<div class="cmsmasters_quotes_slider_wrap"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n" . 
			'<script type="text/javascript">' . 
				'jQuery(document).ready(function () { ' . 
					'jQuery("#cmsmasters_quotes_slider_' . $unique_id . '").owlCarousel( { ' . 
						'singleItem : true, ' . 
						(($speed == 0) ? 'autoPlay : false, ' : 'autoPlay : ' . ($speed * 1000) . ',') . 
						'stopOnHover: true, ' . 
						'pagination: true, ' . 
						'navigation : true, ' . 
						'navigationText : 	[ ' . 
							'"<span class=\"cmsmasters_prev_arrow\"><span></span></span>", ' . 
							'"<span class=\"cmsmasters_next_arrow\"><span></span></span>" ' . 
						'] ' . 
					'} );' . 
				'} );' . 
			'</script>' . "\n" . 
			'<div id="cmsmasters_quotes_slider_' . $unique_id . '" class="cmsmasters_quotes cmsmasters_quotes_slider cmsmasters_owl_slider owl-carousel' . 
			(($classes != '') ? ' ' . $classes : '') . 
			'">' . "\n" . 
				$quote_out . 
			'</div>' . "\n" . 
		'</div>';
	} else {
		$quotes_out .= '<div class="cmsmasters_quotes cmsmasters_quotes_grid ' . $new_columns . 
		(($classes != '') ? ' ' . $classes : '') . 
		'"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n" . 
			'<span class="cmsmasters_quotes_vert"><span></span></span>' . 
			'<div class="cmsmasters_quotes_list">' . "\n" . 
				$quote_out . 
				'<span class="cl"></span>' . 
			'</div>' . "\n" . 
		'</div>';
	}
	
	
	return $quotes_out;
}

add_shortcode('cmsmasters_quotes', 'cmsmasters_quotes');

/**
 * Single Quote
 */
function cmsmasters_quote($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_quote_atts_filter', array( 
		'image' => 		'', 
		'name' => 		'', 
		'subtitle' => 	'', 
		'link' => 		'', 
		'website' => 	'', 
		'classes' => 	'' 
    ) );
	
	
	$shortcode_name = 'quote';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $quote_mode,
		$quote_counter,
		$column_count,
		$quote_content,
		$quote_image,
		$quote_name,
		$quote_subtitle,
		$quote_link,
		$quote_website;
	
	
	if ($content == null || $content == "<br />\n") {
		$quote_content = __('Enter quote text here', 'cmsmasters_content_composer');
	} else {
		$quote_content = $content;
	}
	
	$quote_image = 		$image;
	$quote_name = 		$name;
	$quote_subtitle = 	$subtitle;
	$quote_link = 		$link;
	$quote_website = 	$website;
	
	
	$quote_out = '';
	
	
	if ($quote_mode == 'grid' && ($quote_counter == $column_count)) {
		$quote_out .= '<span class="cl"></span></div><div class="cmsmasters_quotes_list">';
		
		$quote_counter = 0;
	}
	
	$quote_counter++;
	
	
	$quote_out .= '<div class="cmsmasters_quote' . 
		(($classes != '') ? ' ' . $classes : '') . 
	'">' . "\n" . 
	
		load_template_part('framework/postType/quote/' . $quote_mode) . 
		
	'</div>' . "\n";
	
	
	return $quote_out;
}

add_shortcode('cmsmasters_quote', 'cmsmasters_quote');



/**
 * Pricing Table Items
 */
function cmsmasters_pricing_table_items($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_pricing_table_items_atts_filter', array( 
		'columns' => 			'4', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'pricing-table-items';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $style_pricing;
	
	
	$out = '';
	
	
	if ($columns == '4') {
		$price_columns = 'pricing_four';
	} elseif ($columns == '3') {
		$price_columns = 'pricing_three';
	} elseif ($columns == '2') {
		$price_columns = 'pricing_two';
	} else {
		$price_columns = 'pricing_one';
	}
	
	
	$price_out = do_shortcode($content);
	
	
	$out .= (($style_pricing != '') ? '<style type="text/css">' . "\n" . $style_pricing . '</style> ' . "\n" : '') . 
	'<div class="cmsmasters_pricing_table' . ' ' . $price_columns . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		$price_out . 
	'</div>' . "\n";
	
	
	return $out;
}

add_shortcode('cmsmasters_pricing_table_items', 'cmsmasters_pricing_table_items');

/**
 * Single Pricing Table Items
 */
function cmsmasters_pricing_table_item($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_pricing_table_item_atts_filter', array( 
		'price' => 					'100', 
		'coins' => 					'', 
		'currency' => 				'$', 
		'period' => 				'', 
		'features' => 				'', 
		'best' => 					'', 
		'best_bg_color' => 			'', 
		'best_text_color' => 		'', 
		'button_show' => 			'', 
		'button_title' => 			'', 
		'button_link' => 			'#', 
		'button_target' => 			'', 
		'button_style' => 			'', 
		'button_font_family' => 	'', 
		'button_font_size' => 		'', 
		'button_line_height' => 	'', 
		'button_font_weight' => 	'', 
		'button_font_style' => 		'', 
		'button_padding_hor' => 	'', 
		'button_border_width' => 	'', 
		'button_border_style' => 	'', 
		'button_border_radius' => 	'', 
		'button_bg_color' => 		'', 
		'button_text_color' => 		'', 
		'button_border_color' => 	'', 
		'button_bg_color_h' => 		'', 
		'button_text_color_h' => 	'', 
		'button_border_color_h' => 	'', 
		'button_icon' => 			'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'pricing-table-item';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	if ($button_font_family != '') {
		$font_family_array = explode(':', $button_font_family);
		
		$font_family_name = "'" . $font_family_array[0] . "'";
		
		
		cmsmasters_theme_google_font($button_font_family, $font_family_array[0]);
	}
	
	
	if (
		$button_style != '' || 
		$button_font_family != '' || 
		$button_font_size != '' || 
		$button_line_height != '' || 
		$button_font_weight != '' || 
		$button_font_style != '' || 
		$button_padding_hor != '' || 
		$button_border_width != '' || 
		$button_border_style != '' || 
		$button_border_radius != '' || 
		$button_bg_color != '' || 
		$button_text_color != '' || 
		$button_border_color != '' || 
		$button_bg_color_h != '' || 
		$button_text_color_h != '' || 
		$button_border_color_h != '' 
	) {
		$button_custom_styles = 'true';
	} else {
		$button_custom_styles = 'false';
	}
	
	
	$feature_array = explode('||', $features);
	
	
	global $style_pricing;
	
	
	if ($best == 'true') {
		if ($best_bg_color != '') {
			$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' { ' . 
				"\n\t" . cmsmasters_color_css('background-color', $best_bg_color) . 
			"\n" . '} ' . "\n";
		}
		
		
		if ($best_text_color != '') {
			$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .pricing_title, ' . 
			'#cmsmasters_pricing_item_' . $unique_id . ' .pricing_title *, ' . 
			'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_price_wrap, ' . 
			'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_price_wrap *, ' . 
			'#cmsmasters_pricing_item_' . $unique_id . ' .feature_list, ' . 
			'#cmsmasters_pricing_item_' . $unique_id . ' .feature_list * { ' . 
				"\n\t" . cmsmasters_color_css('color', $best_text_color) . 
			"\n" . '} ' . "\n";
		}
	}
	
	
	if ($button_show == 'true') {
		$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button:before { ' . 
			"\n\t" . 'margin-right:' . (($button_title != '') ? '.5em; ' : '0;') . 
			"\n\t" . 'margin-left:0; ' . 
			"\n\t" . 'vertical-align:baseline; ' . 
		"\n" . '} ' . "\n\n";
	
		if ($button_custom_styles == 'true') {
			$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button { ' . 
				(($button_font_family != '') ? "\n\t" . 'font-family:' . str_replace('+', ' ', $font_family_name) . '; ' : '') . 
				(($button_font_size != '') ? "\n\t" . 'font-size:' . $button_font_size . 'px; ' : '') . 
				(($button_line_height != '') ? "\n\t" . 'line-height:' . $button_line_height . 'px; ' : '') . 
				(($button_font_weight != '') ? "\n\t" . 'font-weight:' . $button_font_weight . '; ' : '') . 
				(($button_font_style != '') ? "\n\t" . 'font-style:' . $button_font_style . '; ' : '') . 
				(($button_padding_hor != '') ? "\n\t" . 'padding-right:' . $button_padding_hor . 'px; ' : '') . 
				(($button_padding_hor != '') ? "\n\t" . 'padding-left:' . $button_padding_hor . 'px; ' : '') . 
				(($button_border_width != '') ? "\n\t" . 'border-width:' . $button_border_width . 'px; ' : '') . 
				(($button_border_style != '') ? "\n\t" . 'border-style:' . $button_border_style . '; ' : '') . 
				(($button_border_radius != '') ? "\n\t" . '-webkit-border-radius:' . $button_border_radius . '; ' . "\n\t" . 'border-radius:' . $button_border_radius . '; ' : '') . 
				(($button_bg_color != '') ? "\n\t" . cmsmasters_color_css('background-color', $button_bg_color) : '') . 
				(($button_text_color != '') ? "\n\t" . cmsmasters_color_css('color', $button_text_color) : '') . 
				(($button_border_color != '') ? "\n\t" . cmsmasters_color_css('border-color', $button_border_color) : '') . 
			"\n" . '} ' . "\n";
			
			$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button:hover { ' . 
				(($button_bg_color_h != '') ? "\n\t" . cmsmasters_color_css('background-color', $button_bg_color_h) : '') . 
				(($button_text_color_h != '') ? "\n\t" . cmsmasters_color_css('color', $button_text_color_h) : '') . 
				(($button_border_color_h != '') ? "\n\t" . cmsmasters_color_css('border-color', $button_border_color_h) : '') . 
			"\n" . '} ' . "\n";
		}
		
		
		if ($button_style != '') {
			if (
				$button_style == 'cmsmasters_but_bg_slide_left' || 
				$button_style == 'cmsmasters_but_bg_slide_right' || 
				$button_style == 'cmsmasters_but_bg_slide_top' || 
				$button_style == 'cmsmasters_but_bg_slide_bottom' || 
				$button_style == 'cmsmasters_but_bg_expand_vert' || 
				$button_style == 'cmsmasters_but_bg_expand_hor' || 
				$button_style == 'cmsmasters_but_bg_expand_diag' 
			) {
				if ($button_bg_color != '') {
					$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_left:hover, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_right:hover, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_top:hover, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_bottom:hover, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_vert:hover, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_hor:hover, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_diag:hover { ' . 
						"\n\t" . cmsmasters_color_css('background-color', $button_bg_color) . 
					"\n" . '} ' . "\n";
				}
				
				if ($button_bg_color_h != '') {
					$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_left:after, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_right:after, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_top:after, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_bottom:after, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_vert:after, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_hor:after, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_diag:after { ' . 
						"\n\t" . cmsmasters_color_css('background-color', $button_bg_color_h) . 
					"\n" . '} ' . "\n";
				}
			}
			
			
			if (
				$button_style == 'cmsmasters_but_icon_dark_bg' || 
				$button_style == 'cmsmasters_but_icon_light_bg' || 
				$button_style == 'cmsmasters_but_icon_divider' || 
				$button_style == 'cmsmasters_but_icon_inverse' 
			) {
				$but_icon_pad = ($button_padding_hor != '' ? $button_padding_hor : '20') + ($button_line_height != '' ? $button_line_height : '40');
				
				if ($button_padding_hor != '' || $button_line_height != '') {
					$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_dark_bg, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_light_bg, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider, ' .  
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse { ' . 
						"\n\t" . 'padding-left:' . $but_icon_pad . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_dark_bg:before, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_light_bg:before, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider:before, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:before, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_dark_bg:after, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_light_bg:after, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider:after, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:after { ' . 
						"\n\t" . 'width:' . $button_line_height . 'px; ' . 
					"\n" . '} ' . "\n";
				}
				
				
				if ($button_border_color != '' || $button_border_color_h != '') {
					$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider:after { ' . 
						"\n\t" . cmsmasters_color_css('border-color', $button_border_color) . 
					"\n" . '} ' . "\n";
					
					$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider:hover:after { ' . 
						"\n\t" . cmsmasters_color_css('border-color', $button_border_color_h) . 
					"\n" . '} ' . "\n";
				}
				
				
				if ($button_style == 'cmsmasters_but_icon_inverse') {
					$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:before { ' . 
						(($button_text_color_h != '') ? "\n\t" . cmsmasters_color_css('color', $button_text_color_h) : '') . 
					"\n" . '} ' . "\n";
				
					$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:after { ' . 
						(($button_bg_color_h != '') ? "\n\t" . cmsmasters_color_css('background-color', $button_bg_color_h) : '') . 
					"\n" . '} ' . "\n";
					
					$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:hover:before { ' . 
						(($button_text_color != '') ? "\n\t" . cmsmasters_color_css('color', $button_text_color) : '') . 
					"\n" . '} ' . "\n";
					
					$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:hover:after { ' . 
						(($button_bg_color != '') ? "\n\t" . cmsmasters_color_css('background-color', $button_bg_color) : '') . 
					"\n" . '} ' . "\n";
				}
			}
			
			
			if (
				$button_style == 'cmsmasters_but_icon_slide_left' || 
				$button_style == 'cmsmasters_but_icon_slide_right' 
			) {
				if ($button_padding_hor != '') {
					$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_left, ' . 
					'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_right { ' . 
						"\n\t" . 'padding-left:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'padding-right:' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_left:before { ' . 
						"\n\t" . 'width:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'left:-' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_left:hover:before { ' . 
						"\n\t" . 'left:0; ' . 
					"\n" . '} ' . "\n";
					
					$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_right:before { ' . 
						"\n\t" . 'width:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'right:-' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_right:hover:before { ' . 
						"\n\t" . 'right:0; ' . 
					"\n" . '} ' . "\n";
				}
			}
		}
	}
	
	
	$price_out = '<div id="cmsmasters_pricing_item_' . $unique_id . '" class="cmsmasters_pricing_item' . 
	(($best == 'true') ? ' pricing_best' : '') . 
	(($classes != '') ? ' ' . $classes : '') . 
	'"' . 
	(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
	(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
	'>' . "\n" . 
		'<div class="cmsmasters_pricing_item_inner">' . "\n" . 
			'<h3 class="pricing_title">' . $content . '</h3>' . "\n" . 
			'<div class="cmsmasters_price_wrap">' . "\n" . 
			'<span class="cmsmasters_currency">' . $currency . '</span>' . "\n" . 
			'<span class="cmsmasters_price">' . $price . '</span>' . "\n" . 
			(($coins != '') ? '<span class="cmsmasters_coins">.' . $coins . '</span>' . "\n" : '') . 
			(($period != '') ? '<br /><span class="cmsmasters_period">' . $period . '</span>' . "\n" : '') . 
			'</div>' . "\n";
			
			if (!empty($feature_array)) {
				$price_out .= '<ul class="feature_list">' . "\n";
			}
			
			
			foreach ($feature_array as $feature) { 
				$feature_atts = explode('|', $feature);
				
				
				$feature_atts = preg_replace('/^title\{([^\}]*)\}/','$1', $feature_atts);
				
				$feature_atts = preg_replace('/^link\{([^\}]*)\}/','$1', $feature_atts);
				
				$feature_atts = preg_replace('/^icon\{([^\}]*)\}/','$1', $feature_atts);
				 
				$price_out .= '<li>' . 
				((isset($feature_atts[2]) && $feature_atts[2] != '') ? '<span class="feature_icon ' . $feature_atts[2] . '">' : '') . 
				((isset($feature_atts[1]) && $feature_atts[1] != '') ? '<a href="' . $feature_atts[1] . '" class="feature_link">' : '') . 
				$feature_atts[0] . 
				((isset($feature_atts[1]) && $feature_atts[1] != '') ? '</a>' : '') . 
				((isset($feature_atts[2]) && $feature_atts[2] != '') ? '</span>' : '') . 
				'</li>' . "\n";
			}
			
			
			if (!empty($feature_array)) { 
				$price_out .= '</ul>' . "\n";
			}
			
			
			if ($button_show == 'true') {
				$price_out .= '<a href="' . $button_link . '" class="cmsmasters_button' . 
				(($button_style != '') ? ' cmsmasters_but_clear_styles ' . $button_style : '') . 
				(($button_icon != '') ? ' ' . $button_icon : '') . 
				'"' . 
				(($button_target == 'blank') ? ' target="_blank"' : '') . 
				'><span>' . $button_title . '</span></a>' . "\n";
			}
		
		$price_out .= '</div>' . "\n" . 
	'</div>' . "\n";
	
	
	return $price_out;
}

add_shortcode('cmsmasters_pricing_table_item', 'cmsmasters_pricing_table_item');



/**
 * Google Map Markers
 */
function cmsmasters_google_map_markers($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_google_map_markers_atts_filter', array( 
		'address_type' => 			'', 
		'address' => 				'', 
		'latitude' => 				'', 
		'longitude' => 				'', 
		'type' => 					'', 
		'zoom' => 					'14', 
		'height_type' => 			'', 
		'height' => 				'300', 
		'scroll_wheel' => 			'', 
		'double_click_zoom' => 		'', 
		'pan_control' => 			'', 
		'zoom_control' => 			'', 
		'map_type_control' => 		'', 
		'scale_control' => 			'', 
		'street_view_control' => 	'', 
		'overview_map_control' => 	'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'google-map-markers';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $map_out;
	
	
	$map_out = '';
	
	
	do_shortcode($content);
	
	
	$unique_id = uniqid();
	
	
	$maps_out = (($height_type == 'fixed') ? '<style type="text/css">' . "\n" . 
		'#google_map_' . $unique_id . '{' . "\n\t" . 
			'height: ' . $height . 'px;' . "\n" . 
		'}' . "\n" . 
	'</style>' . "\n" : '') . 
    '<script type="text/javascript">' . 
        'jQuery(document).ready(function () { ' . 
            'jQuery("#google_map_' . $unique_id . '").gMap( { ';
				if ($address_type == 'address') {
					$maps_out .= 'address: "' . $address . '", ' ;
				} else {
					$maps_out .= 'markers: {' . 
						(($latitude != '') ? 'latitude: ' . $latitude  . ', ' : '') . 
						(($longitude != '') ? 'latitude: ' . $longitude  . ' ' : '') . 
					'},';
				}
				$maps_out .= 'maptype: "' . $type . '", ' . 
				'zoom: ' . $zoom . ', ' . 
				(($scroll_wheel == 'true') ? 'scrollwheel: ' . $scroll_wheel  . ', ' : '') . 
				(($double_click_zoom == 'true') ? 'doubleClickZoom: ' . $double_click_zoom  . ', ' : '') . 
				'controls: {' . 
					(($pan_control == 'true') ? 'panControl: ' . $pan_control  . ', ' : '') . 
					(($zoom_control == 'true') ? 'zoomControl: ' . $zoom_control  . ', ' : '') . 
					(($map_type_control == 'true') ? 'mapTypeControl: ' . $map_type_control  . ', ' : '') . 
					(($scale_control == 'true') ? 'scaleControl: ' . $scale_control  . ', ' : '') . 
					(($street_view_control == 'true') ? 'streetViewControl: ' . $street_view_control  . ', ' : '') . 
					(($overview_map_control == 'true') ? 'overviewMapControl: ' . $overview_map_control  . ', ' : '') . 
				'},';
				$maps_out .= 'markers: [' . 
					$map_out . 
				']';
			$maps_out .= ' } );' . 
        ' } );' . 
    '</script>' . "\n" . 
	cmsmasters_divpdel((($height_type != 'fixed') ? '<div class="resizable_block">' . "\n" : '') . 
		'<div id="google_map_' . $unique_id . '" class="google_map' . 
		(($classes != '') ? ' ' . $classes : '') . 
		'"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'></div>' . "\n" . 
	(($height_type != 'fixed') ? '</div>' . "\n" : ''));
	
	
	return $maps_out;
}

add_shortcode('cmsmasters_google_map_markers', 'cmsmasters_google_map_markers');

/**
 * Google Map Marker
 */
function cmsmasters_google_map_marker($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_google_map_marker_atts_filter', array( 
		'address_type' => 	'', 
		'address' => 		'', 
		'latitude' => 		'', 
		'longitude' => 		'', 
		'popup' => 			''
    ) );
	
	
	$shortcode_name = 'google-map-marker';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	global $map_out;
	
	
	$map_out .= '{';
	
	
	if ($address_type == 'address') { 
		$map_out .= 'address: "' . $address . '",'; 
	} elseif  ($address_type == 'coordinates') { 
		$map_out .= 'latitude: ' . $latitude . ',' . 
		'longitude: ' . $longitude . ',';
	} 
	
	
	$map_out .= (($content != '') ? 'html: "' . addslashes(str_replace(array("\r", "\n"), '', cmsmasters_divpdel($content))) . '",' : '') . 
	(($popup == 'true') ? 'popup: true' : '');
	$map_out .= '},';
}

add_shortcode('cmsmasters_google_map_marker', 'cmsmasters_google_map_marker');



/**
 * Social Sharing
 */
function cmsmasters_social($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_social_atts_filter', array( 
		'facebook' => 			'', 
		'twitter' => 			'', 
		'google' => 			'', 
		'pinterest' => 			'', 
		'type' => 				'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'social';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$out = '';
	
	if ($facebook == 'true' || $twitter == 'true' || $google == 'true' || $pinterest == 'true') {
		$out .= '<div class="cmsmasters_sharing' . 
		(($type == 'vertical') ? ' social_vertical' : '') . 
		(($classes != '') ? ' ' . $classes : '') . 
		'"' . 
		(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
		(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n";
		
		if ($twitter == 'true') {
			$out .= '<div class="share_wrap">' . "\n" . 
				'<a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">' . __('Tweet', 'cmsmasters_content_composer') . '</a>' . "\n" . 
				'<script type="text/javascript">
					!function (d, s, id) { 
						var js = undefined, 
							fjs = d.getElementsByTagName(s)[0];
						
						if (d.getElementById(id)) { 
							d.getElementById(id).parentNode.removeChild(d.getElementById(id));
						}
						
						js = d.createElement(s);
						js.id = id;
						js.src = "//platform.twitter.com/widgets.js";
						
						fjs.parentNode.insertBefore(js, fjs);
					} (document, "script", "twitter-wjs");
				</script>' . 
			'</div>' . "\n";
		}
		
		if ($google == 'true') {
			$out .= '<div class="share_wrap">' . "\n" . 
				'<div class="g-plusone" data-size="medium"></div>
				<script type="text/javascript">
					(function () { 
						var po = document.createElement("script"), 
							s = document.getElementsByTagName("script")[0];
						
						po.type = "text/javascript";
						po.async = true;
						po.src = "https://apis.google.com/js/plusone.js";
						
						s.parentNode.insertBefore(po, s);
					} )();
				</script>' . 
			'</div>' . "\n";
		}
		
		if ($pinterest == 'true') {
			$out .= '<div class="share_wrap">' . "\n" . 
				'<a href="http://pinterest.com/pin/create/button/" class="pin-it-button" count-layout="horizontal">
					<img border="0" src="//assets.pinterest.com/images/PinExt.png" title="' . __('Pin It', 'cmsmasters_content_composer') . '" />
				</a>
				<script type="text/javascript">
					(function (d, s, id) { 
						var js = undefined, 
							fjs = d.getElementsByTagName(s)[0];
						
						if (d.getElementById(id)) { 
							d.getElementById(id).parentNode.removeChild(d.getElementById(id));
						}
						
						js = d.createElement(s);
						js.id = id;
						js.src = "//assets.pinterest.com/js/pinit.js";
						
						fjs.parentNode.insertBefore(js, fjs);
					} (document, "script", "pinterest-wjs"));
				</script>' . 
			'</div>' . "\n";
		}
		
		if ($facebook == 'true') {
			$out .= '<div class="share_wrap">' . "\n" . 
				'<div class="fb-like" data-send="false" data-layout="button_count" data-width="200" data-show-faces="false" data-font="arial"></div>
				<script type="text/javascript">
					(function (d, s, id) { 
						var js = undefined, 
							fjs = d.getElementsByTagName(s)[0];
						
						if (d.getElementById(id)) { 
							d.getElementById(id).parentNode.removeChild(d.getElementById(id));
						}
						
						js = d.createElement(s);
						js.id = id;
						js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
						
						fjs.parentNode.insertBefore(js, fjs);
					} (document, "script", "facebook-jssdk"));
				</script>' . "\n" . 
			'</div>' . "\n";
		}
		
		$out .= '<div class="cl"></div>' . "\n" . 
		'</div>' . "\n";
	}
	
	return $out;
}

add_shortcode('cmsmasters_social', 'cmsmasters_social');



/**
 * Custom HTML
 */
function cmsmasters_html($atts, $content = null) {
    extract(shortcode_atts(array( 
		'classes' => 	'' 
    ), $atts));
	
	
	$out = '';
	
	
	if ($content != null ) {
		$out .= cmsmasters_divpdel('<div class="custom_html' . 
		(($classes != '') ? ' ' . $classes : '') . 
		'">' . "\n" . 
		wpautop(base64_decode($content)) . 
		'</div>' . "\n");
	}
	
	
	return $out;
}

add_shortcode('cmsmasters_html', 'cmsmasters_html');



/**
 * Custom JS
 */
function cmsmasters_js($atts, $content = null) {
    extract(shortcode_atts(array( 
		'classes' => 	'' 
    ), $atts));
	
	
	$out = '';
	
	
	if ($content != null ) {
		$out .= '<div class="custom_js' . 
		(($classes != '') ? ' ' . $classes : '') . 
		'">' . "\n" . 
		'<script type="text/javascript">' . "\n" . 
			base64_decode($content) . 
		'</script>' . "\n" . 
		'</div>' . "\n";
	}
	
	
	return $out;
}


add_shortcode('cmsmasters_js', 'cmsmasters_js');



/**
 * Custom CSS
 */
function cmsmasters_css($atts, $content = null) {
    extract(shortcode_atts(array( 
		'classes' => 	'' 
    ), $atts));
	
	
	$out = '';
	
	
	if ($content != null ) {
		$out .= '<div class="custom_css' . 
		(($classes != '') ? ' ' . $classes : '') . 
		'">' . "\n" . 
		'<style type="text/css">' . "\n" . 
			base64_decode($content) . 
		'</style>' . "\n" . 
		'</div>' . "\n";
	}
	
	
	return $out;
}


add_shortcode('cmsmasters_css', 'cmsmasters_css');



/**
 * Sidebar
 */
function cmsmasters_sidebar($atts, $content = null) { 
    extract(shortcode_atts(array( 
		'sidebar' => 	'', 
		'layout' => 	'', 
		'classes' => 	'' 
    ), $atts));
	
	
	$layout_sidebar = '';
	
	$out = '';
	
	
	if ($layout == '') {
		$layout_sidebar = 'sidebar_layout_11';
	} elseif ($layout == '1212') {
		$layout_sidebar = 'sidebar_layout_1212';
	} elseif ($layout == '1323') {
		$layout_sidebar = 'sidebar_layout_1323';
	} elseif ($layout == '2313') {
		$layout_sidebar = 'sidebar_layout_2313';
	} elseif ($layout == '1434') {
		$layout_sidebar = 'sidebar_layout_1434';
	} elseif ($layout == '3414') {
		$layout_sidebar = 'sidebar_layout_3414';
	} elseif ($layout == '131313') {
		$layout_sidebar = 'sidebar_layout_131313';
	} elseif ($layout == '121414') {
		$layout_sidebar = 'sidebar_layout_121414';
	} elseif ($layout == '141214') {
		$layout_sidebar = 'sidebar_layout_141214';
	} elseif ($layout == '141412') {
		$layout_sidebar = 'sidebar_layout_141412';
	} elseif ($layout == '14141414') {
		$layout_sidebar = 'sidebar_layout_14141414';
	}
	
	if(!function_exists('get_dynamic_sidebar')){
		function get_dynamic_sidebar($sidebar = 1) {
			$sidebar_contents = '';
			
			ob_start();
			
			dynamic_sidebar($sidebar);
			
			$sidebar_contents = ob_get_clean();
			
			return $sidebar_contents;
		}
	}
	
	if ($sidebar != '') {
		$out = '<div class="cmsmasters_sidebar ' . $layout_sidebar . 
		(($classes != '') ? ' ' . $classes : '') . 
		'">' . 
		get_dynamic_sidebar($sidebar);
		
		$out .= '<div class="cl"></div>' . "\n" . 
		'</div>';
	}
	
	
	return $out;
}

add_shortcode('cmsmasters_sidebar', 'cmsmasters_sidebar');



/**
 * Twitter Stripe
 */
function cmsmasters_twitter($atts, $content = null) { 
    $new_atts = apply_filters('cmsmasters_twitter_atts_filter', array( 
		'user' => 				'', 
		'count' => 				'', 
		'date' => 				'', 
		'control' => 			'', 
		'autoplay' => 			'', 
		'speed' => 				'1', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'twitter';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$out = '';
	
	
	$unique_id = uniqid();
	
	
	if ($user != '') {
		$out .= '<div class="cmsmasters_twitter_wrap">' . 
			'<div>' . 
				'<script type="text/javascript">' . 
					'jQuery(document).ready(function () { ' . 
						'jQuery("#cmsmasters_twitter_' . $unique_id . '").owlCarousel( { ' . 
							'singleItem : true, ' . 
							'transitionStyle: "fade", ' . 
							'stopOnHover: true, ' . 
							'pagination: true, ' . 
							(($control == 'true') ? 'navigation : true, ' : '') . 
							(($autoplay != 'true') ? 'autoPlay : false, ' : 'autoPlay : ' . ($speed * 1000) . ',') . 
							'navigationText : 	[ ' . 
								'"<span class=\"cmsmasters_prev_arrow\"><span></span></span>", ' . 
								'"<span class=\"cmsmasters_next_arrow\"><span></span></span>" ' . 
							'] ' . 
						'} );' . 
					'} );' . 
				'</script>' . 
			'</div>' . "\n" . 
			'<div class="cmsmasters_theme_icon_user_twitter twr_icon"></div>' . "\n" . 
			'<div id="cmsmasters_twitter_' . $unique_id . '" class="owl-carousel cmsmasters_owl_slider cmsmasters_twitter' . 
			(($classes != '') ? ' ' . $classes : '') . 
			'"' . 
			(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
			(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
			'>' . "\n";
			
				$tweets = cmsmasters_get_tweets($user, $count);
				
				if ($tweets != '') {
					foreach ($tweets as $t) {
						$out .= '<div class="cmsmasters_twitter_item">' . "\n" . 
							(($date == 'true') ? '<abbr title="" class="published">' . human_time_diff( $t['time'], current_time('timestamp') ) . ' ' . __('ago', 'cmsmasters_content_composer') . '</abbr>' : '') . 
							'<span class="cmsmasters_twitter_item_content">' . "\n" . $t['text'] . '</span>' . "\n" . 
						'</div>' . "\n";
					}
				} else {
					echo '<div class="cmsmasters_notice cmsmasters_notice_error cmsmasters_theme_icon_cancel">' . "\n" . 
						'<div class="notice_content">' . "\n" . 
							'<p>' . __('Please add your Twitter API keys', 'cmsmasters') . ', ' . '<a target="_blank" href="http://docs.cmsmasters.net/admin2/twitter-functionality/">' . __('read more how', 'cmsmasters') . '</a></p>' . "\n" . 
						'</div>' . "\n" . 
					'</div>' . "\n";
				}
			
			$out .= '</div>' . 
		'</div>';
	}
	
	
	return $out;
}

add_shortcode('cmsmasters_twitter', 'cmsmasters_twitter');



/**
 * Posts Slider
 */
function cmsmasters_posts_slider($atts, $content = null) { 
    $new_atts = apply_filters('cmsmasters_posts_slider_atts_filter', array( 
		'orderby' => 				'', 
		'order' => 					'', 
		'post_type' => 				'', 
		'blog_categories' => 		'', 
		'portfolio_categories' => 	'', 
		'columns' => 				'', 
		'amount' => 				'', 
		'count' => 					'', 
		'pause' => 					'', 
		'speed' => 					'', 
		'blog_metadata' => 			'', 
		'portfolio_metadata' => 	'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'posts-slider';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	global $cmsmasters_post_metadata;
	
	$cmsmasters_post_metadata = $blog_metadata;
	
	
	global $cmsmasters_project_metadata;
	
	$cmsmasters_project_metadata = $portfolio_metadata;
	
	
	if (!isset($post_type) || $post_type == '') {
		$post_type = 'post';
	}
	
	
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
	
	
	if ($post_type == 'post') {
		$columns = 1;
	}
	
	
	$amount_count = 0;
	
	$amount = ($amount == '' ? 1 : $amount);
	
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
				
				
				if ($post_type == 'post') {
					$out .= '<div>';
				
						while ($query->have_posts()) : $query->the_post();
							
							if ($amount_count == $amount) {
								$out .= '</div><div>';
								
								$amount_count = 0;
							}
							
							if (get_post_format() != '') {
								$out .= load_template_part('framework/postType/posts-slider/blog/' . get_post_format());
							} else {
								$out .= load_template_part('framework/postType/posts-slider/blog/standard');
							}
							
							$amount_count ++;
							
						endwhile;
					
					$out .= '</div>';
				}
				
				
				if ($post_type == 'project') {
					while ($query->have_posts()) : $query->the_post();
						
						$out .= '<div>';
						
							if (get_post_format() != '') {
								$out .= load_template_part('framework/postType/posts-slider/portfolio/' . get_post_format());
							} else {
								$out .= load_template_part('framework/postType/posts-slider/portfolio/standard');
							}
						
						$out .= '</div>';
						
					endwhile;
				}
				
				
			$out .= '</div>' . 
		'</div>';
	
	endif;
	
	
	wp_reset_postdata();
	
	wp_reset_query();
	
	
	return $out;
}

add_shortcode('cmsmasters_posts_slider', 'cmsmasters_posts_slider');



/**
 * Blog
 */
function cmsmasters_blog($atts, $content = null) {
	$new_atts = apply_filters('cmsmasters_blog_atts_filter', array( 
		'orderby' => 			'date', 
		'order' => 				'DESC', 
		'count' => 				'12', 
		'categories' => 		'', 
		'layout' => 			'standard', 
		'layout_mode' => 		'', 
		'columns' => 			'', 
		'metadata' => 			'', 
		'filter' => 			'', 
		'filter_text' => 		'', 
		'filter_cats_text' => 	'', 
		'pagination' => 		'pagination', 
		'more_text' => 			'', 
		'classes' => 			'' 
	) );
	
	
	$shortcode_name = 'blog';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	global $cmsmasters_metadata;
	
	
	$cmsmasters_metadata = $metadata;
	
	
	$more_text = ($more_text != '') ? $more_text : __('Load More Posts', 'cmsmasters');
	
	
	$filter_text = ($filter_text != '') ? $filter_text : __('Filter', 'cmsmasters');
	
	
	$filter_cats_text = ($filter_cats_text != '') ? $filter_cats_text : __('All Categories', 'cmsmasters');
	
	
	$out = "<div class=\"cmsmasters_wrap_blog entry-summary\" id=\"blog_{$unique_id}\">";
	
	
	if ( 
		$layout != 'standard' || 
		($layout == 'standard' && $pagination == 'more') 
	) {
		wp_enqueue_style('isotope');
		
		
		wp_enqueue_script('isotope');
		
		wp_enqueue_script('isotopeMode');
		
		
		$out .= "<script type=\"text/javascript\">
jQuery(document).ready(function () {
	(function ($) {
		if ($('#blog_{$unique_id}').find('article').length == '0') {
			return false;
		}
		
	
		startBlog( 
			'" . $unique_id . "', 
			'" . $layout . "', 
			'" . $layout_mode . "', 
			'" . CMSMASTERS_CONTENT_COMPOSER_URL . "', 
			'" . $orderby . "', 
			'" . $order . "', 
			'" . $count . "', 
			'" . $categories . "', 
			'" . $metadata . "' 
		);
	} )(jQuery);
} );
</script>
";

		if ($filter !== '') {
			$out .= "<div class=\"cmsmasters_post_filter_wrap cmsmasters_items_filter_wrap\">
				<div class=\"cmsmasters_post_filter cmsmasters_items_filter\">
					<span class=\"cmsmasters_post_filter_loader cmsmasters_items_filter_loader\"></span>
					<div class=\"cmsmasters_post_filter_block cmsmasters_items_filter_block\">
						<a class=\"cmsmasters_post_filter_but cmsmasters_items_filter_but cmsmasters_theme_icon_resp_nav button\">
							<span>" . $filter_text . "</span>
						</a>
						<ul class=\"cmsmasters_post_filter_list cmsmasters_items_filter_list\">
							<li class=\"current\">
								<a class=\"button\" data-filter=\"article.post\"  title=\"" . $filter_cats_text . "\" href=\"javascript:void(0);\">
									<span>" . $filter_cats_text . "</span>
								</a>
							</li>";
							
							
							$cat_args = array( 
								'orderby' => 	'name' 
							);
							
							
							if ($categories != '') {
								$cat_array = explode(',', $categories);
								
								
								for ($i = 0; $i < count($cat_array); $i++) {
									$idObj = get_category_by_slug($cat_array[$i]);
									
									$cat_array[$i] = $idObj->term_id;
								}
							} else {
								$cat_array = $categories;
							}
							
							
							if (count($cat_array) == 1 && $categories != '') {
								$cat_args['child_of'] = $categories;
							} elseif (count($cat_array) > 1) {
								$cat_args['include'] = $cat_array;
							}
							
							
							$post_categs = get_terms('category', $cat_args);
							
							
							if (is_array($post_categs) && !empty($post_categs)) {
								foreach ($post_categs as $post_categ) {
									$out .= "<li>
										<a class=\"button\" href=\"#\" data-filter=\"article.post[data-category~='{$post_categ->slug}']\" title=\"{$post_categ->name}\">
											<span>{$post_categ->name}</span>
										</a>
									</li>";
								}
							}
							
						$out .= "</ul>
					</div>
				</div>
			</div>";
		}
	}
	
	$out .= '<div class="blog ' . 
		$layout . 
		(($layout_mode !== '') ? ' ' . $layout_mode : '') . 
		(($columns !== '') ? ' cmsmasters_' . $columns : '') . 
		(($classes !== '') ? ' ' . $classes : '') . 
	'">';
	
	
	$orderby = ($orderby == 'popular') ? 'meta_value_num' : $orderby;
	
	
	$args = array( 
		'post_type' => 				'post', 
		'orderby' => 				$orderby, 
		'order' => 					$order, 
		'posts_per_page' => 		$count, 
		'category_name' => 			$categories 
	);
	
	
	if ($pagination == 'more') {
		$args['ignore_sticky_posts'] = 1;
	}
	
	
	if ($pagination == 'pagination') {
		if (get_query_var('paged')) { 
			$paged = get_query_var('paged'); 
		} elseif (get_query_var('page')) { 
			$paged = get_query_var('page'); 
		} else { 
			$paged = 1; 
		}
		
		
		$args['paged'] = $paged;
	}
	
	
	if ($orderby == 'meta_value_num') {
		$args['meta_key'] = 'cmsmasters_likes';
	}
	
	
	$query = new WP_Query($args);
	
	
	if ($query->have_posts()) : 
		while ($query->have_posts()) : $query->the_post();
			if ($layout == 'columns') {
				if (get_post_format() != '') {
					$out .= load_template_part('framework/postType/blog/page/masonry/' . get_post_format());
				} else {
					$out .= load_template_part('framework/postType/blog/page/masonry/standard');
				}
			} elseif ($layout == 'timeline') {
				if (get_post_format() != '') {
					$out .= load_template_part('framework/postType/blog/page/timeline/' . get_post_format());
				} else {
					$out .= load_template_part('framework/postType/blog/page/timeline/standard');
				}
			} else {
				if (get_post_format() != '') {
					$out .= load_template_part('framework/postType/blog/page/default/' . get_post_format());
				} else {
					$out .= load_template_part('framework/postType/blog/page/default/standard');
				}
			}
		endwhile;
		
		
		if ($pagination == 'more') {
			wp_enqueue_style('mediaelement');
			
			wp_enqueue_style('wp-mediaelement');
			
			
			wp_enqueue_script('mediaelement');
			
			wp_enqueue_script('wp-mediaelement');
		}
	endif;
	
	
	$out .= '</div>';
	
	
	if ($pagination !== 'disabled') {
		$out .= '<div class="cmsmasters_wrap_more_posts cmsmasters_wrap_more_items">';
		
			if ($pagination == 'pagination' && $query->max_num_pages > 1) {
				$out .= pagination($query->max_num_pages);
			} elseif ($pagination == 'more' && $query->found_posts > $count) {
				$out .= "<div class=\"cmsmasters_wrap_post_loader cmsmasters_wrap_items_loader\">
					<a href=\"javascript:void(0);\" class=\"cmsmasters_button cmsmasters_post_loader cmsmasters_items_loader\">
						<span>" . $more_text . "</span>
					</a>
				</div>";
			}
		
		$out .= '</div>';
	}
	
	$out .= '</div>';
	
	
	wp_reset_postdata();
	
	wp_reset_query();
	
	
	return $out;
}

add_shortcode('cmsmasters_blog', 'cmsmasters_blog');



/**
 * Portfolio
 */
function cmsmasters_portfolio($atts, $content = null) {
	$new_atts = apply_filters('cmsmasters_portfolio_atts_filter', array( 
		'orderby' => 			'date', 
		'order' => 				'DESC', 
		'count' => 				'12', 
		'categories' => 		'', 
		'layout' => 			'grid', 
		'layout_mode' => 		'perfect', 
		'columns' => 			'4', 
		'metadata_grid' => 		'', 
		'metadata_puzzle' => 	'', 
		'gap' => 				'large', 
		'filter' => 			'', 
		'filter_text' => 		'', 
		'filter_cats_text' => 	'', 
		'sorting' => 			'', 
		'sorting_name_text' => 	'', 
		'sorting_date_text' => 	'', 
		'pagination' => 		'pagination', 
		'more_text' => 			'', 
		'classes' => 			'' 
	) );
	
	
	$shortcode_name = 'portfolio';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	if ($layout == 'puzzle') {
		$metadata = $metadata_puzzle;
	} else {
		$metadata = $metadata_grid;
	}
	
	
	global $cmsmasters_pj_metadata;
	
	
	$cmsmasters_pj_metadata = $metadata;
	
	
	global $cmsmasters_pj_layout_mode;
	
	
	$cmsmasters_pj_layout_mode = $layout_mode;
	
	
	$more_text = ($more_text != '') ? $more_text : __('Load More Projects', 'cmsmasters');
	
	$filter_text = ($filter_text != '') ? $filter_text : __('Filter', 'cmsmasters');
	
	$filter_cats_text = ($filter_cats_text != '') ? $filter_cats_text : __('All Categories', 'cmsmasters');
	
	$sorting_name_text = ($sorting_name_text != '') ? $sorting_name_text : __('Name', 'cmsmasters');
	
	$sorting_date_text = ($sorting_date_text != '') ? $sorting_date_text : __('Date', 'cmsmasters');
	
	
	$out = "<div class=\"cmsmasters_wrap_portfolio entry-summary\" id=\"portfolio_{$unique_id}\">
<script type=\"text/javascript\">
jQuery(document).ready(function () {
	(function ($) {
		if ($('#portfolio_{$unique_id}').find('article').length == '0') {
			return false;
		}
		
	
		startPortfolio( 
			'" . $unique_id . "', 
			'" . $layout . "', 
			'" . $layout_mode . "', 
			'" . CMSMASTERS_CONTENT_COMPOSER_URL . "', 
			'" . $orderby . "', 
			'" . $order . "', 
			'" . $count . "', 
			'" . $categories . "', 
			'" . $metadata . "' 
		);
	} )(jQuery);
} );
</script>
";
	
	
	if ($filter != '' || $sorting != '') {
		$out .= "<div class=\"cmsmasters_project_filter_wrap cmsmasters_items_filter_wrap\">
			<div class=\"cmsmasters_project_filter cmsmasters_items_filter\">
				<span class=\"cmsmasters_project_filter_loader cmsmasters_items_filter_loader\"></span>";
				
				if ($sorting != '') {
					$out .= "<div class=\"cmsmasters_project_sort_block cmsmasters_items_sort_block\">
						<a href=\"#\" name=\"project_name\" title=\"" . $sorting_name_text . "\" class=\"button cmsmasters_project_sort_but cmsmasters_items_sort_but cmsmasters_theme_icon_slide_bottom" . 
						(($orderby == 'name') ? " current" . 
						(($order == 'DESC') ? " reversed" : "") : "") . 
						"\">
							<span>" . $sorting_name_text . "</span>
						</a>
						<a href=\"#\" name=\"project_date\" title=\"" . $sorting_date_text . "\" class=\"button cmsmasters_project_sort_but cmsmasters_items_sort_but cmsmasters_theme_icon_slide_bottom" . 
						(($orderby == 'date') ? " current" . 
						(($order == 'DESC') ? " reversed" : "") : "") . 
						"\">
							<span>" . $sorting_date_text . "</span>
						</a>
					</div>";
				}
				
				
				if ($filter != '') {
					$out .= "<div class=\"cmsmasters_project_filter_block cmsmasters_items_filter_block\">
						<a class=\"cmsmasters_project_filter_but cmsmasters_items_filter_but cmsmasters_theme_icon_resp_nav button\">
							<span>" . $filter_text . "</span>
						</a>
						<ul class=\"cmsmasters_project_filter_list cmsmasters_items_filter_list\">
							<li class=\"current\">
								<a class=\"button\" data-filter=\"article.project\"  title=\"" . $filter_cats_text . "\" href=\"javascript:void(0);\">
									<span>" . $filter_cats_text . "</span>
								</a>
							</li>";
							
							
							if ($categories != '') {
								$cat_array = explode(',', $categories);
								
								
								for ($i = 0; $i < count($cat_array); $i++) {
									$idObj = get_term_by('slug', $cat_array[$i], 'pj-categs');
									
									$cat_array[$i] = $idObj->term_id;
								}
							} else {
								$cat_array = $categories;
							}
							
							
							$cat_args = array( 
								'orderby' => 	'name', 
								'include' => 	$cat_array 
							);
							
							
							$project_categs = get_terms('pj-categs', $cat_args);
							
							
							if (is_array($project_categs) && !empty($project_categs)) {
								foreach ($project_categs as $project_categ) {
									$out .= "<li>
										<a class=\"button\" href=\"#\" data-filter=\"article.project[data-category~='{$project_categ->slug}']\" title=\"{$project_categ->name}\">
											<span>{$project_categ->name}</span>
										</a>
									</li>";
								}
							}
						
						$out .= "</ul>
					</div>";
				}
				
			$out .= "</div>
		</div>";
	}
	
	$out .= '<div class="portfolio ' . $layout . ' ' . $gap . '_gap ' . $layout_mode . 
		(($layout != 'puzzle') ? ' cmsmasters_' . $columns : '') . 
		(($classes != '') ? ' ' . $classes : '') . 
	'">';
	
	
	$orderby = ($orderby == 'popular') ? 'meta_value_num' : $orderby;
	
	
	$args = array( 
		'post_type' => 				'project', 
		'orderby' => 				$orderby, 
		'order' => 					$order, 
		'posts_per_page' => 		$count 
	);
	
	if ($layout == 'puzzle') {
		$args['ignore_sticky_posts'] = true;
	}
	
	if ($categories != '') {
		$cat_array = explode(",", $categories);
		
		$args['tax_query'] = array( 
			array( 
				'taxonomy' => 'pj-categs', 
				'field' => 'slug', 
				'terms' => $cat_array 
			)
		);
	}
	
	
	if ($pagination == 'pagination') {
		if (get_query_var('paged')) { 
			$paged = get_query_var('paged'); 
		} elseif (get_query_var('page')) { 
			$paged = get_query_var('page'); 
		} else { 
			$paged = 1; 
		}
		
		
		$args['paged'] = $paged;
	}
	
	
	if ($orderby == 'meta_value_num') {
		$args['meta_key'] = 'cmsmasters_likes';
	}
	
	
	$query = new WP_Query($args);
	
	
	if ($query->have_posts()) : 
		while ($query->have_posts()) : $query->the_post();
			if ($layout == 'puzzle') {
				if (get_post_format() != '') {
					$out .= load_template_part('framework/postType/portfolio/page/puzzle/' . get_post_format());
				} else {
					$out .= load_template_part('framework/postType/portfolio/page/puzzle/standard');
				}
			} else {
				if (get_post_format() != '') {
					$out .= load_template_part('framework/postType/portfolio/page/grid/' . get_post_format());
				} else {
					$out .= load_template_part('framework/postType/portfolio/page/grid/standard');
				}
			}
		endwhile;
		
		
		if ($pagination == 'more') {
			wp_enqueue_style('mediaelement');
			
			wp_enqueue_style('wp-mediaelement');
			
			
			wp_enqueue_script('mediaelement');
			
			wp_enqueue_script('wp-mediaelement');
		}
	endif;
	
	
	$out .= '</div>';
	
	
	if ($pagination !== 'disabled') {
		$out .= '<div class="cmsmasters_wrap_more_projects cmsmasters_wrap_more_items">';
		
			if ($pagination == 'pagination' && $query->max_num_pages > 1) {
				$out .= pagination($query->max_num_pages);
			} elseif ($pagination == 'more' && $query->found_posts > $count) {
				$out .= "<div class=\"cmsmasters_wrap_project_loader cmsmasters_wrap_items_loader\">
					<a href=\"javascript:void(0);\" class=\"cmsmasters_button cmsmasters_project_loader cmsmasters_items_loader\">
						<span>" . $more_text . "</span>
					</a>
				</div>";
			}
		
		$out .= '</div>';
	}
	
	$out .= '</div>';
	
	
	wp_reset_postdata();
	
	wp_reset_query();
	
	
	return $out;
}

add_shortcode('cmsmasters_portfolio', 'cmsmasters_portfolio');



/**
 * Profiles
 */
function cmsmasters_profiles($atts, $content = null) { 
    $new_atts = apply_filters('cmsmasters_profiles_atts_filter', array( 
		'orderby' => 			'', 
		'order' => 				'', 
		'count' => 				'', 
		'categories' => 		'', 
		'layout' => 			'', 
		'columns' => 			'', 
		'animation' => 			'', 
		'animation_delay' => 	'', 
		'classes' => 			'' 
    ) );
	
	
	$shortcode_name = 'profiles';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	global $profile_columns;
	
	$profile_columns = $columns;
	
	
	$args = array( 
		'post_type' => 				'profile', 
		'orderby' => 				$orderby, 
		'order' => 					$order, 
		'posts_per_page' => 		$count, 
		'ignore_sticky_posts' => 	true 
	);
	
	
	if ($categories != '') {
		$cat_array = explode(",", $categories);
		
		$args['tax_query'] = array( 
			array( 
				'taxonomy' => 	'pl-categs', 
				'field' => 		'slug', 
				'terms' => 		$cat_array 
			)
		);
	}
	
	
	$query = new WP_Query($args);
	
	
	$out = '';
	
	
	if ($query->have_posts()) :
		
		$out .= '<div id="' . $unique_id . '" class="cmsmasters_profile ' . $layout . 
			(($classes != '') ? ' ' . $classes : '') . 
			'"' . 
			(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
			(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
		'>' . "\n";
		
		
        while ($query->have_posts()) : $query->the_post();
			
			if ($layout == 'vertical') {
				$out .= load_template_part('framework/postType/profile/page/vertical');
			} else {
				$out .= load_template_part('framework/postType/profile/page/horizontal');
			}
			
		endwhile;
		
		
		$out .= '</div>' . "\n";
		
    endif;
	
	
	wp_reset_postdata();
	
	wp_reset_query();
	
	
	return $out;
}

add_shortcode('cmsmasters_profiles', 'cmsmasters_profiles');



/* ==================== Start WooCommerce Shortcodes ==================== */

/**
 * Products
 */
function cmsmasters_products($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_products_atts_filter', array( 
		'products_shortcode' => 	'recent_products', 
		'orderby' => 				'date', 
		'order' => 					'DESC', 
		'count' => 					'10', 
		'columns' => 				'4', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'products';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
    $out = '<div class="cmsmasters_products_shortcode' . ' cmsmasters_' . $products_shortcode . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">';
	
	
	$out .= do_shortcode('[' . $products_shortcode . ' ' . (($products_shortcode != 'best_selling_products' && $products_shortcode != 'top_rated_products') ? 'orderby="' . $orderby . '" order="' . $order . '" ' : '') . 'per_page="' . $count . '" columns="' . $columns . '"]');
	
	
	$out .= '</div>';
	
	
	return $out;
}

add_shortcode('cmsmasters_products', 'cmsmasters_products');



/**
 * Selected Products
 */
function cmsmasters_selected_products($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_selected_products_atts_filter', array( 
		'orderby' => 				'date', 
		'order' => 					'DESC', 
		'ids' => 					'', 
		'columns' => 				'4', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'selected-products';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
    $out = '<div class="cmsmasters_selected_products_shortcode' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">';
	
	
	$out .= do_shortcode('[products orderby="' . $orderby . '" order="' . $order . '" columns="' . $columns . '" ids="' . $ids . '"]');
	
	
	$out .= '</div>';
	
	
	return $out;
}

add_shortcode('cmsmasters_selected_products', 'cmsmasters_selected_products');

/* ==================== Finish WooCommerce Shortcodes ==================== */



/* ==================== Start PayPal Donations Shortcode ==================== */

/**
 * PayPal Donations
 */
function cmsmasters_paypal_donations($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_paypal_donations_atts_filter', array( 
		'amount' => 				'', 
		'purpose' => 				'', 
		'reference' => 				'', 
		'button_title' => 			'', 
		'button_text_align' => 		'center', 
		'button_style' => 			'', 
		'button_font_family' => 	'', 
		'button_font_size' => 		'', 
		'button_line_height' => 	'', 
		'button_font_weight' => 	'', 
		'button_font_style' => 		'', 
		'button_padding_hor' => 	'', 
		'button_border_width' => 	'', 
		'button_border_style' => 	'', 
		'button_border_radius' => 	'', 
		'button_bg_color' => 		'', 
		'button_text_color' => 		'', 
		'button_border_color' => 	'', 
		'button_bg_color_h' => 		'', 
		'button_text_color_h' => 	'', 
		'button_border_color_h' => 	'', 
		'button_icon' => 			'', 
		'animation' => 				'', 
		'animation_delay' => 		'', 
		'classes' => 				'' 
    ) );
	
	
	$shortcode_name = 'paypal-donations';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
	if ($button_font_family != '') {
		$font_family_array = explode(':', $button_font_family);
		
		$font_family_name = "'" . $font_family_array[0] . "'";
		
		
		cmsmasters_theme_google_font($button_font_family, $font_family_array[0]);
	}
	
	
	$out = '';
	
	
	if (
		$button_style != '' || 
		$button_font_family != '' || 
		$button_font_size != '' || 
		$button_line_height != '' || 
		$button_font_weight != '' || 
		$button_font_style != '' || 
		$button_padding_hor != '' || 
		$button_border_width != '' || 
		$button_border_style != '' || 
		$button_border_radius != '' || 
		$button_bg_color != '' || 
		$button_text_color != '' || 
		$button_border_color != '' || 
		$button_bg_color_h != '' || 
		$button_text_color_h != '' || 
		$button_border_color_h != '' 
	) {
		$button_custom_styles = 'true';
	} else {
		$button_custom_styles = 'false';
	}
	
	
	$out .= '<style type="text/css">' . "\n" . 
		'#cmsmasters_paypal_donations_' . $unique_id . ' { ' . 
			"\n\t" . 'text-align:' . $button_text_align . '; ' . 
		"\n" . '} ' . "\n\n" . 
		'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button:before { ' . 
			"\n\t" . 'margin-right:' . (($button_title != '') ? '.5em; ' : '0;') . 
			"\n\t" . 'margin-left:0; ' . 
			"\n\t" . 'vertical-align:baseline; ' . 
		"\n" . '} ' . "\n\n";
		
		if ($button_custom_styles == 'true') {
			$out .= '#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button { ' . 
				(($button_font_family != '') ? "\n\t" . 'font-family:' . str_replace('+', ' ', $font_family_name) . '; ' : '') . 
				(($button_font_size != '') ? "\n\t" . 'font-size:' . $button_font_size . 'px; ' : '') . 
				(($button_line_height != '') ? "\n\t" . 'line-height:' . $button_line_height . 'px; ' : '') . 
				(($button_font_weight != '') ? "\n\t" . 'font-weight:' . $button_font_weight . '; ' : '') . 
				(($button_font_style != '') ? "\n\t" . 'font-style:' . $button_font_style . '; ' : '') . 
				(($button_padding_hor != '') ? "\n\t" . 'padding-right:' . $button_padding_hor . 'px; ' : '') . 
				(($button_padding_hor != '') ? "\n\t" . 'padding-left:' . $button_padding_hor . 'px; ' : '') . 
				(($button_border_width != '') ? "\n\t" . 'border-width:' . $button_border_width . 'px; ' : '') . 
				(($button_border_style != '') ? "\n\t" . 'border-style:' . $button_border_style . '; ' : '') . 
				(($button_border_radius != '') ? "\n\t" . '-webkit-border-radius:' . $button_border_radius . '; ' . "\n\t" . 'border-radius:' . $button_border_radius . '; ' : '') . 
				(($button_bg_color != '') ? "\n\t" . cmsmasters_color_css('background-color', $button_bg_color) : '') . 
				(($button_text_color != '') ? "\n\t" . cmsmasters_color_css('color', $button_text_color) : '') . 
				(($button_border_color != '') ? "\n\t" . cmsmasters_color_css('border-color', $button_border_color) : '') . 
			"\n" . '} ' . "\n";
			
			$out .= '#cmsmasters_paypal_donations_' . $unique_id . ' form:hover + .cmsmasters_button { ' . 
				(($button_bg_color_h != '') ? "\n\t" . cmsmasters_color_css('background-color', $button_bg_color_h) : '') . 
				(($button_text_color_h != '') ? "\n\t" . cmsmasters_color_css('color', $button_text_color_h) : '') . 
				(($button_border_color_h != '') ? "\n\t" . cmsmasters_color_css('border-color', $button_border_color_h) : '') . 
			"\n" . '} ' . "\n";
		}
		
		
		if ($button_style != '') {
			if (
				$button_style == 'cmsmasters_but_bg_slide_left' || 
				$button_style == 'cmsmasters_but_bg_slide_right' || 
				$button_style == 'cmsmasters_but_bg_slide_top' || 
				$button_style == 'cmsmasters_but_bg_slide_bottom' || 
				$button_style == 'cmsmasters_but_bg_expand_vert' || 
				$button_style == 'cmsmasters_but_bg_expand_hor' || 
				$button_style == 'cmsmasters_but_bg_expand_diag' 
			) {
				if ($button_bg_color != '') {
					$out .= '#cmsmasters_paypal_donations_' . $unique_id . ' form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_left, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_right, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_top, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' form:hover + .cmsmasters_button.cmsmasters_but_bg_slide_bottom, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' form:hover + .cmsmasters_button.cmsmasters_but_bg_expand_vert, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' form:hover + .cmsmasters_button.cmsmasters_but_bg_expand_hor, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' form:hover + .cmsmasters_button.cmsmasters_but_bg_expand_diag { ' . 
						"\n\t" . cmsmasters_color_css('background-color', $button_bg_color) . 
					"\n" . '} ' . "\n";
				}
				
				if ($button_bg_color_h != '') {
					$out .= '#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_left:after, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_right:after, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_top:after, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_slide_bottom:after, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_vert:after, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_hor:after, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_bg_expand_diag:after { ' . 
						"\n\t" . cmsmasters_color_css('background-color', $button_bg_color_h) . 
					"\n" . '} ' . "\n";
				}
			}
			
			
			if (
				$button_style == 'cmsmasters_but_icon_dark_bg' || 
				$button_style == 'cmsmasters_but_icon_light_bg' || 
				$button_style == 'cmsmasters_but_icon_divider' || 
				$button_style == 'cmsmasters_but_icon_inverse' 
			) {
				$but_icon_pad = ($button_padding_hor != '' ? $button_padding_hor : '20') + ($button_line_height != '' ? $button_line_height : '40');
				
				if ($button_padding_hor != '' || $button_line_height != '') {
					$out .= '#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_dark_bg, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_light_bg, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider, ' .  
					'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse { ' . 
						"\n\t" . 'padding-left:' . $but_icon_pad . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_dark_bg:before, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_light_bg:before, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider:before, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:before, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_dark_bg:after, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_light_bg:after, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider:after, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:after { ' . 
						"\n\t" . 'width:' . $button_line_height . 'px; ' . 
					"\n" . '} ' . "\n";
				}
				
				
				if ($button_border_color != '' || $button_border_color_h != '') {
					$out .= '#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_divider:after { ' . 
						"\n\t" . cmsmasters_color_css('border-color', $button_border_color) . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsmasters_paypal_donations_' . $unique_id . ' form:hover + .cmsmasters_button.cmsmasters_but_icon_divider:after { ' . 
						"\n\t" . cmsmasters_color_css('border-color', $button_border_color_h) . 
					"\n" . '} ' . "\n";
				}
				
				
				if ($button_style == 'cmsmasters_but_icon_inverse') {
					$out .= '#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:before { ' . 
						(($button_text_color_h != '') ? "\n\t" . cmsmasters_color_css('color', $button_text_color_h) : '') . 
					"\n" . '} ' . "\n";
				
					$out .= '#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_inverse:after { ' . 
						(($button_bg_color_h != '') ? "\n\t" . cmsmasters_color_css('background-color', $button_bg_color_h) : '') . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsmasters_paypal_donations_' . $unique_id . ' form:hover + .cmsmasters_button.cmsmasters_but_icon_inverse:before { ' . 
						(($button_text_color != '') ? "\n\t" . cmsmasters_color_css('color', $button_text_color) : '') . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsmasters_paypal_donations_' . $unique_id . ' form:hover + .cmsmasters_button.cmsmasters_but_icon_inverse:after { ' . 
						(($button_bg_color != '') ? "\n\t" . cmsmasters_color_css('background-color', $button_bg_color) : '') . 
					"\n" . '} ' . "\n";
				}
			}
			
			
			if (
				$button_style == 'cmsmasters_but_icon_slide_left' || 
				$button_style == 'cmsmasters_but_icon_slide_right' 
			) {
				if ($button_padding_hor != '') {
					$out .= '#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_left, ' . 
					'#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_right { ' . 
						"\n\t" . 'padding-left:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'padding-right:' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_left:before { ' . 
						"\n\t" . 'width:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'left:-' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsmasters_paypal_donations_' . $unique_id . ' form:hover + .cmsmasters_button.cmsmasters_but_icon_slide_left:before { ' . 
						"\n\t" . 'left:0; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsmasters_paypal_donations_' . $unique_id . ' .cmsmasters_button.cmsmasters_but_icon_slide_right:before { ' . 
						"\n\t" . 'width:' . ($button_padding_hor * 2) . 'px; ' . 
						"\n\t" . 'right:-' . ($button_padding_hor * 2) . 'px; ' . 
					"\n" . '} ' . "\n";
					
					$out .= '#cmsmasters_paypal_donations_' . $unique_id . ' form:hover + .cmsmasters_button.cmsmasters_but_icon_slide_right:before { ' . 
						"\n\t" . 'right:0; ' . 
					"\n" . '} ' . "\n";
				}
			}
		}
	$out .= '</style>' . "\n";
	
	
	$out .= '<div id="cmsmasters_paypal_donations_' . $unique_id . '" class="cmsmasters_paypal_donations_wrap">' . "\n" . 
		'<div class="cmsmasters_paypal_donations">' . "\n" . 
			do_shortcode('[paypal-donation' . 
				($amount != '' ? ' amount="' . $amount . '"' : '') . 
				($purpose != '' ? ' purpose="' . $purpose . '"' : '') . 
				($reference != '' ? ' reference="' . $reference . '"' : '') . 
			']') . 
			
			'<span class="cmsmasters_button' . 
			(($button_style != '') ? ' cmsmasters_but_clear_styles ' . $button_style : '') . 
			(($button_icon != '') ? ' ' . $button_icon : '') . 
			(($classes != '') ? ' ' . $classes : '') . 
			'"' . 
			(($animation != '') ? ' data-animation="' . $animation . '"' : '') . 
			(($animation != '' && $animation_delay != '') ? ' data-delay="' . $animation_delay . '"' : '') . 
			'>' . 
				'<span>' . $button_title . '</span>' . 
			'</span>' . 
		'</div>' . "\n" . 
	'</div>' . "\n";
	
	
	return $out;
}

add_shortcode('cmsmasters_paypal_donations', 'cmsmasters_paypal_donations');

/* ==================== Finish PayPal Donations Shortcode ==================== */



/* ==================== Start Timetable Shortcodes ==================== */

/**
 * Timetable
 */
function cmsmasters_timetable($atts, $content = null) {
    $new_atts = apply_filters('cmsmasters_timetable_atts_filter', array( 
		'event' => 						'', 
		'event_category' => 			'', 
		'hour_category' => 				'', 
		'columns' => 					'', 
		'measure' => 					'1', 
		'filter_style' => 				'dropdown_list', 
		'filter_kind' => 				'event', 
		'filter_label' => 				'All Events', 
		'time_format' => 				'H.i', 
		'time_format_custom' => 		'', 
		'hide_all_events_view' => 		'0', 
		'hide_hours_column' => 			'0', 
		'show_end_hour' => 				'0', 
		'event_layout' => 				'1', 
		'hide_empty' => 				'0', 
		'disable_event_url' => 			'0', 
		'text_align' => 				'center', 
		'id' => 						'', 
		'row_height' => 				'31', 
		'box_bg_color' => 				'', 
		'box_hover_bg_color' => 		'', 
		'box_txt_color' => 				'', 
		'box_hover_txt_color' => 		'', 
		'box_hours_txt_color' => 		'', 
		'box_hours_hover_txt_color' => 	'', 
		'row1_bg_color' => 				'', 
		'row1_txt_color' => 			'', 
		'row2_bg_color' => 				'', 
		'row2_txt_color' => 			'', 
		'classes' => 					'' 
    ) );
	
	
	$shortcode_name = 'timetable';
	
	$shortcode_path = CMSMASTERS_CONTENT_COMPOSER_TEMPLATE_DIR . '/cmsmasters-' . $shortcode_name . '.php';
	
	
	if (locate_template($shortcode_path)) {
		$template_out = cmsmasters_composer_load_template($shortcode_path, array( 
			'atts' => 		$atts, 
			'new_atts' => 	$new_atts, 
			'content' => 	$content 
		) );
		
		
		return $template_out;
	}
	
	
	extract(shortcode_atts($new_atts, $atts));
	
	
	$unique_id = uniqid();
	
	
    $out = '<div id="cmsmasters_timetable_shortcode_' . $unique_id . '" class="cmsmasters_timetable_shortcode' . 
	(($classes != '') ? ' ' . $classes : '') . 
	'">';
	
	$out .= "
	<style type=\"text/css\">
		#cmsmasters_timetable_shortcode_{$unique_id} .tabs_box_navigation .tabs_box_navigation_selected {
			" . cmsmasters_color_css('color', $box_txt_color) . "
			" . cmsmasters_color_css('background-color', $box_bg_color) . "
		}
		
		#cmsmasters_timetable_shortcode_{$unique_id} .tabs_box_navigation .tabs_box_navigation_selected .sub-menu {
			" . cmsmasters_color_css('background-color', $row1_bg_color) . "
		}
		
		#cmsmasters_timetable_shortcode_{$unique_id} .tabs_box_navigation .tabs_box_navigation_selected .sub-menu li a {
			" . cmsmasters_color_css('color', $row1_txt_color) . "
		}
		
		#cmsmasters_timetable_shortcode_{$unique_id} .tabs_box_navigation .tabs_box_navigation_selected .sub-menu li a:hover, 
		#cmsmasters_timetable_shortcode_{$unique_id} .tabs_box_navigation .tabs_box_navigation_selected .sub-menu li.selected a {
			" . cmsmasters_color_css('color', $box_bg_color) . "
		}
		
		#cmsmasters_timetable_shortcode_{$unique_id} .tt_tabs_navigation li a {
			" . cmsmasters_color_css('color', $row2_txt_color) . "
			" . cmsmasters_color_css('border-color', $row1_bg_color) . "
		}
		
		#cmsmasters_timetable_shortcode_{$unique_id} .tt_tabs_navigation li a:hover,
		#cmsmasters_timetable_shortcode_{$unique_id} .tt_tabs_navigation li a.selected,
		#cmsmasters_timetable_shortcode_{$unique_id} .tt_tabs_navigation li.ui-tabs-active a {
			" . cmsmasters_color_css('border-color', $box_bg_color) . "
		}
		
		
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable tr.row_gray {
			" . cmsmasters_color_css('color', $row1_txt_color) . "
			" . cmsmasters_color_css('background-color', $row1_bg_color) . "
		}
		
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable tr {
			" . cmsmasters_color_css('color', $row2_txt_color) . "
			" . cmsmasters_color_css('background-color', $row2_bg_color) . "
		}
		
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .event {
			" . cmsmasters_color_css('background-color', $box_bg_color) . "
		}
		
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .event hr {
			" . cmsmasters_color_css('background-color', $box_txt_color) . "
		}
		
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .event_container, 
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .tt_single_event {
			" . cmsmasters_color_css('background-color', $box_bg_color) . "
		}
		
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .event_container:hover, 
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .tt_single_event:hover, 
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .tt_tooltip_content {
			" . cmsmasters_color_css('background-color', $box_hover_bg_color) . "
		}
		
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .tt_single_event .event_container, 
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .tt_single_event .event_container:hover {
			background-color:transparent;
			color:inherit;
		}
		
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .tt_tooltip_arrow {
			" . cmsmasters_color_css('border-color', $box_hover_bg_color) . "
		}
		
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .event_container, 
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .tt_single_event, 
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .event_container a, 
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .tt_single_event a {
			" . cmsmasters_color_css('color', $box_txt_color) . "
		}
		
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .event_container:hover, 
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .event_container:hover a, 
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .tt_single_event:hover, 
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .tt_single_event:hover a, 
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .tt_tooltip_content, 
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .tt_tooltip_content a {
			" . cmsmasters_color_css('color', $box_hover_txt_color) . "
		}
		
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .event_container .hours, 
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .tt_single_event .hours {
			" . cmsmasters_color_css('color', $box_hours_txt_color) . "
		}
		
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .event_container:hover .hours, 
		#cmsmasters_timetable_shortcode_{$unique_id} table.tt_timetable .tt_single_event:hover .hours {
			" . cmsmasters_color_css('color', $box_hours_hover_txt_color) . "
		}
	</style>";
	
	
	$out_timetable = do_shortcode('[tt_timetable' . 
		($event != '' ? ' event="' . $event . '"' : '') . 
		($event_category != '' ? ' event_category="' . $event_category . '"' : '') . 
		($hour_category != '' ? ' hour_category="' . $hour_category . '"' : '') . 
		($columns != '' ? ' columns="' . $columns . '"' : '') . 
		' measure="' . $measure . '"' . 
		' filter_style="' . $filter_style . '"' . 
		' filter_kind="' . $filter_kind . '"' . 
		' filter_label="' . $filter_label . '"' . 
		($time_format == 'custom' ? ($time_format_custom != '' ? ' time_format="' . $time_format_custom . '"' : '') : ' time_format="' . $time_format . '"') . 
		' hide_all_events_view="' . $hide_all_events_view . '"' . 
		' hide_hours_column="' . $hide_hours_column . '"' . 
		' show_end_hour="' . $show_end_hour . '"' . 
		' event_layout="' . $event_layout . '"' . 
		' hide_empty="' . $hide_empty . '"' . 
		' disable_event_url="' . $disable_event_url . '"' . 
		' text_align="' . $text_align . '"' . 
		($id != '' ? ' id="' . $id . '"' : '') . 
		(($row_height != '' && $row_height != '0') ? ' row_height="' . $row_height . '"' : '') . 
		' box_bg_color="' . $box_bg_color . '"' . 
		' box_hover_bg_color="' . $box_hover_bg_color . '"' . 
		' box_txt_color="' . $box_txt_color . '"' . 
		' box_hover_txt_color="' . $box_hover_txt_color . '"' . 
		' box_hours_txt_color="' . $box_hours_txt_color . '"' . 
		' box_hours_hover_txt_color="' . $box_hours_hover_txt_color . '"' . 
		' filter_color=""' . 
		' row1_color="' . $row1_bg_color . '"' . 
		' row2_color="' . $row2_bg_color . '"' . 
	']');
	
	
	$out .= preg_replace("/#rgb/", 'rgb', $out_timetable);
	
	
	$out .= '</div>';
	
	
	return $out;
}

add_shortcode('cmsmasters_timetable', 'cmsmasters_timetable');

/* ==================== Finish Timetable Shortcodes ==================== */

