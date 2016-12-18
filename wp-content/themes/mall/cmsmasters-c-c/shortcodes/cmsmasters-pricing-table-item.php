<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.0
 * 
 * Content Composer Single Pricing Table Items Shortcode
 * Created by CMSMasters
 * 
 */


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
		$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_pricing_info_wrap { ' . 
			"\n\t" . cmsmasters_color_css('background-color', $best_bg_color) . 
		"\n" . '} ' . "\n";
	}
	
	
	if ($best_text_color != '') {
		$style_pricing .= '#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_pricing_info_wrap, ' . 
		'#cmsmasters_pricing_item_' . $unique_id . ' .cmsmasters_pricing_info_wrap * { ' . 
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
		'<div class="cmsmasters_pricing_info_wrap">' . 
			'<h2 class="pricing_title">' . $content . '</h2>' . "\n" . 
			'<div class="cmsmasters_price_wrap">' . "\n" . 
				'<span class="cmsmasters_currency">' . $currency . '</span>' . "\n" . 
				'<span class="cmsmasters_price">' . $price . '</span>' . "\n" . 
				(($coins != '') ? '<span class="cmsmasters_coins">' . $coins . '</span>' . "\n" : '') . 
			'</div>' . 
			(($period != '') ? '<span class="cmsmasters_period">' . $period . '</span>' . "\n" : '') . 
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
			$price_out .= '<div class="cmsmasters_pricing_but_wrap">' . 
				'<a href="' . $button_link . '" class="cmsmasters_button' . 
				(($button_style != '') ? ' cmsmasters_but_clear_styles ' . $button_style : '') . 
				(($button_icon != '') ? ' ' . $button_icon : '') . 
				'"' . 
				(($button_target == 'blank') ? ' target="_blank"' : '') . 
				'><span>' . $button_title . '</span></a>' . "\n" . 
			'</div>';
		}
	
	$price_out .= '</div>' . "\n" . 
'</div>' . "\n";


$out = $price_out;


return $out;
