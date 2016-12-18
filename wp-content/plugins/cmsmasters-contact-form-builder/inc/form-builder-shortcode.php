<?php
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Contact Form Builder
 * @version 	1.3.4
 * 
 * Contact Form Shortcode Function
 * Created by CMSMasters
 * 
 */


function cmsmasters_contact_form_sc($atts, $content = null) {
	extract(shortcode_atts(array( 
		'formname' => '', 
		'email' => '' 
	), $atts));
	
	
	wp_enqueue_style('cmsmasters_contact_form_style');
	
	
	if (is_rtl()) {
		wp_enqueue_style('cmsmasters_contact_form_style_rtl');
	}
	
	
	wp_enqueue_script('cmsmastersValidation');
	
	wp_enqueue_script('cmsmastersValidationLang');
	
	
	wp_enqueue_script('reCAPTCHA2');
	
	
	$out = cmsmasters_contact_form_html($formname, $email);
	
	
	return $out;
}

add_shortcode('cmsmasters_contact_form_sc', 'cmsmasters_contact_form_sc');



function cmsmasters_contact_form_html($formname, $email) {
	global $post;
	
	
	$encodedEmail = base64_encode($formname . '|' . $email . '|' . $formname);
	
	
	if (get_post($formname) != NULL) {
		$results = array();
		
		
		$parent_post = array();
		
		$parent_post[] = get_post($formname);
		
		
		$child_posts = get_posts(array( 
			'post_type' => 			'cmsmasters_cform', 
			'post_parent' => 		$formname, 
			'orderby' => 			'menu_order', 
			'order' => 				'ASC', 
			'posts_per_page' => 	-1 
		));
		
		
		$posts = array_merge($parent_post, $child_posts);
		
		
		for ($i = 0; $i < sizeof($posts); $i++) {
			$results[$i] = (object) array( 
				'id' => 			$posts[$i]->ID, 
				'label' => 			$posts[$i]->post_title, 
				'slug' => 			(trim(preg_replace('/[^a-zA-Z0-9_]/', '', str_replace('-', '_', $posts[$i]->post_name))) == '' || strlen(preg_replace('/[^a-zA-Z0-9_]/', '', str_replace('-', '_', $posts[$i]->post_name))) < 3) ? 'field_' . uniqid() : preg_replace('/[^a-zA-Z0-9_]/', '', str_replace('-', '_', $posts[$i]->post_name)), 
				'type' => 			$posts[$i]->post_excerpt, 
				'number' => 		$posts[$i]->menu_order, 
				'parent_slug' => 	$posts[$i]->post_parent, 
				'value' => 			unserialize($posts[$i]->post_content), 
				'description' => 	unserialize(get_post_meta($posts[$i]->ID, 'cmsmasters_contact_form_descr', true)), 
				'parameters' => 	unserialize(get_post_meta($posts[$i]->ID, 'cmsmasters_contact_form_params', true)) 
			);
		}
		
		
		foreach ($results as $form_result) {
			$form_descr = str_replace("\n", '<br />', $form_result->description);
			
			
			if ($form_result->type == 'form') {
				$out = '<div class="cmsmasters-form-builder">' . "\n" . 
					'<div class="cmsmasters_notice cmsmasters_notice_success cmsmasters_theme_icon_check success_box" style="display:none;">' . "\n" . 
						'<div class="notice_icon"></div>' . "\n" . 
						'<div class="notice_content">' . "\n" . 
							'<p>' . ((sizeof($form_descr) > 1) ? $form_descr[1] : $form_descr) . '</p>' . "\n" . 
						'</div>' . "\n" . 
					'</div>' . "\n" . 
					'<script type="text/javascript"> ' . "\n" . 
						'jQuery(document).ready(function () { ' . "\n\t" . 
							"jQuery('#form_" . $formname . "').validationEngine('attach', { \n\t\t" . 
								"promptPosition : 'topRight', \n\t\t" . 
								"scroll : false, \n\t\t" . 
								"autoPositionUpdate : true, \n\t\t" . 
								"showArrow : false \n\t\t" . 
							"} ); \n\t";
				
				
				if (in_array('captcha', $form_result->parameters)) {
					$current_theme = get_option('template');

					$recaptcha_keys = get_option('cmsmasters_options_' . $current_theme . '_element_recaptcha');
					
					$recaptcha_public_key = (isset($recaptcha_keys[$current_theme . '_recaptcha_public_key'])) ? $recaptcha_keys[$current_theme . '_recaptcha_public_key'] : '';
					
					
					$out .= "var captchaWidget, 
						validateCaptcha = function() { 
							captchaWidget = grecaptcha.render('form_{$formname}_builder_captcha', { 
								'sitekey' : 	'{$recaptcha_public_key}', 
								'callback' : 	verifyCallback 
							} );
						}; 
						";
				}
				
				
				$out .= "jQuery('#form_" . $formname . " a#cmsmasters_" . $formname . "_formsend').click(function () { \n\t\t" . 
					"jQuery('#form_" . $formname . " .loading').animate( { opacity : 1 } , 250); \n\t\t";
			}
		}
		
		
		foreach ($results as $form_result) {
			if ($form_result->type == 'checkbox') {
				$out .= "var var_" . $form_result->slug . " = ''; \n\t\t" . 
				"jQuery('input[name=\'cmsmasters_" . $form_result->slug . "\']:checked').each(function () { \n\t\t\t" . 
					"var_" . $form_result->slug . " += jQuery(this).val(); \n\t\t" . 
				"} ); \n\t\t";
			}
		}
		
		
		foreach ($results as $form_result) {
			if ($form_result->type == 'checkboxes') {
				$out .= "var var_" . $form_result->slug . " = ''; \n\t\t" . 
				"jQuery('input[name=\'cmsmasters_" . $form_result->slug . "\']:checked').each(function () { \n\t\t\t" . 
					"var_" . $form_result->slug . " += jQuery(this).val() + ', '; \r\t\t" . 
				"} ); \n\t\t" . 
				"if (var_" . $form_result->slug . " !== '') { \n\t\t\t" . 
					"var_" . $form_result->slug . " = var_" . $form_result->slug . ".slice(0, -2); \r\t\t" . 
				"} \n\t\t";
			}
		}
		
		
		foreach ($results as $form_result) {
			if ($form_result->type == 'form') {
				$out .= "if (jQuery('#form_" . $formname . "').validationEngine('validate')) { \n\t\t\t";
				
				
				if (in_array('captcha', $form_result->parameters)) {
					$out .= "if (phpValidateCaptcha(grecaptcha.getResponse(captchaWidget)) !== 'success') { \n\t\t\t\t" . 
						"jQuery('#form_" . $formname . "_builder_captcha').css( { border : '2px solid #ff0000' } ); \n\t\t\t\t" . 
						"jQuery('#form_" . $formname . " .loading').animate( { opacity : 0 } , 250); \n\t\t\t\t" . 
						'grecaptcha.reset(captchaWidget); ' . "\n\t\t\t\t" . 
						'return false; ' . "\r\t\t\t" . 
					'} else { ' . "\n\t\t\t\t" . 
						"jQuery('#form_" . $formname . "_builder_captcha').removeAttr('style'); \r\t\t\t" . 
					'} ' . "\n\t\t\t";
				}
				
				
				$out .= "jQuery.post('" . CMSMASTERS_FORM_BUILDER_URL . "inc/form-builder-sendmail.php', { \n\t\t\t\t";
			}
		}
		
		
		foreach ($results as $form_result) {
			if ($form_result->type != 'form') {
				if ($form_result->type == 'checkboxes' || $form_result->type == 'checkbox') {
					$out .= 'cmsmasters_' . $form_result->slug . " : var_" . $form_result->slug . ", \n\t\t\t\t";
				} elseif ($form_result->type == 'radiobutton') {
					$out .= 'cmsmasters_' . $form_result->slug . " : jQuery('input[name=\'cmsmasters_" . $form_result->slug . "\']:checked').val(), \n\t\t\t\t";
				} else {
					$out .= 'cmsmasters_' . $form_result->slug . " : jQuery('#cmsmasters_" . $form_result->slug . "').val(), \n\t\t\t\t";
				}
			}
		}
		
		
		foreach ($results as $form_result) {
			if ($form_result->type == 'form') {
				$out .= "contactemail : '" . $encodedEmail . "', \n\t\t\t\t" . 
								"formname : '" . $formname . "' \r\t\t\t" . 
							'}, function (data) { ' . "\n\t\t\t\t" . 
								"jQuery('#form_" . $formname . " .loading').animate( { opacity : 0 } , 250); \n\t\t\t\t" . 
								"jQuery('#form_" . $formname . "').fadeOut('slow'); \n\t\t\t\t" . 
								"document.getElementById('form_" . $formname . "').reset(); \n\t\t\t\t" . 
								"jQuery('#form_" . $formname . "').parent().find('.box').hide(); \n\t\t\t\t" . 
								"jQuery('#form_" . $formname . "').parent().find('.success_box').fadeIn('fast'); \n\t\t\t\t" . 
								"jQuery('html, body').animate( { scrollTop : jQuery('#form_" . $formname . "').offset().top - 140 } , 'slow'); \n\t\t\t\t" . 
								"jQuery('#form_" . $formname . "').parent().find('.success_box').delay(5000).fadeOut(1000, function () { \n\t\t\t\t\t" . 
									"jQuery('#form_" . $formname . "').fadeIn('slow'); \r\t\t\t\t" . 
								"} ); \r\t\t\t";
				
				
				if (in_array('captcha', $form_result->parameters)) {
					$out .= 'grecaptcha.reset(captchaWidget);' . "\r\t\t\t";
				}
				
				
				$out .= '} ); ' . "\n\t\t\t" . 
							'return false; ' . "\r\t\t" . 
						'} else { ' . "\n\t\t\t" . 
							"jQuery('#form_" . $formname . " .loading').animate( { opacity : 0 } , 250); \n\t\t\t" . 
							'return false; ' . "\r\t\t" . 
						'} ' . "\r\t" . 
					'} ); ' . "\r" . 
				'} ); ' . "\n";
				
				
				if (in_array('captcha', $form_result->parameters)) {
					$out .= "function phpValidateCaptcha(captchaServerKey) { " . 
								'var cmsmasters_' . $formname . '_captcha_html = jQuery.ajax( { ' . "\n\t\t\t" . 
									"type : 'post', \n\t\t\t" . 
									"url : '" . CMSMASTERS_FORM_BUILDER_URL . "inc/validate-captcha.php', \n\t\t\t" . 
									"data : 'g-recaptcha-response=' + captchaServerKey, \n\t\t\t" . 
									'async : false ' . "\r\t\t" . 
								'} ).responseText; ' . "\r\t" . 
								'return cmsmasters_' . $formname . '_captcha_html; ' . "\r" . 
							'} ' . "\n";
				}
				
				
				$out .= '</script>' . "\n" .
				'<form action="#" method="post" id="form_' . $formname . '">' . "\n\n";
			}
		}
		
		
		foreach ($results as $form_result) {
			if ($form_result->type != 'form') {
				$field_label = stripslashes($form_result->label);
				
				$field_name = $form_result->slug;
				
				$vals = $form_result->value;
				
				$params = $form_result->parameters;
				
				
				$row = (in_array('row', $params)) ? true : false;
				
				
				$required_label = (in_array('required', $params)) ? ' <span class="color_2">*</span>' : '';
				
				$required = (in_array('required', $params)) ? 'required,' : '';
				
				
				$minSize = '';
				
				$maxSize = '';
				
				
				foreach ($params as $param) {
					if (str_replace('minSize', '', $param) != $param) {
						$minSize = $param . ',';
					}
					
					
					if (str_replace('maxSize', '', $param) != $param) {
						$maxSize = $param . ',';
					}
				}
				
				
				$customWidth11 = (in_array('width[one_first]', $params)) ? ' one_first' : '';
				
				$customWidth12 = (in_array('width[one_half]', $params)) ? ' one_half' : '';
				
				$customWidth13 = (in_array('width[one_third]', $params)) ? ' one_third' : '';
				
				
				$customEmail = (in_array('custom[email]', $params)) ? 'custom[email],' : '';
				
				$customUrl = (in_array('custom[url]', $params)) ? 'custom[url],' : '';
				
				$customNumber = (in_array('custom[number]', $params)) ? 'custom[number],' : '';
				
				$customOnlyNumberSp = (in_array('custom[onlyNumberSp]', $params)) ? 'custom[onlyNumberSp],' : '';
				
				$customOnlyLetterSp = (in_array('custom[onlyLetterSp]', $params)) ? 'custom[onlyLetterSp],' : '';
				
				$validate_val = $required . $minSize . $maxSize . $customEmail . $customUrl . $customNumber . $customOnlyNumberSp . $customOnlyLetterSp;
				
				$validate = ($validate_val != '') ? ' class="validate[' . substr($validate_val, 0, -1) . ']"' : '';
				
				$descr = (trim($form_result->description) != '') ? "\t" . '<small class="db">' . str_replace("\n", '<br />', stripslashes($form_result->description)) . '</small>' . "\r" : '';
				
				
				switch ($form_result->type) {
				case 'text':
					$out .= (($row) ? '<div class="cl"></div>' . "\n" : '') . 
					'<div class="form_info cmsmasters_input' . $customWidth11 . $customWidth12 . $customWidth13 . '">' . "\n\t" . 
						'<label for="cmsmasters_' . $field_name . '">' . $field_label . $required_label . '</label>' . "\n\t" . 
						'<div class="form_field_wrap">' . "\n\t\t" . 
							'<input type="text" name="cmsmasters_' . $field_name . '" id="cmsmasters_' . $field_name . '" value="" size="35"' . $validate . ' />' . "\r\t" . 
						'</div>' . "\n" . 
						$descr . 
					'</div>' . "\n";
					
					
					break;
				case 'email':
					$out .= (($row) ? '<div class="cl"></div>' . "\n" : '') . 
					'<div class="form_info cmsmasters_input' . $customWidth11 . $customWidth12 . $customWidth13 . '">' . "\n\t" . 
						'<label for="cmsmasters_' . $field_name . '">' . $field_label . $required_label . '</label>' . "\n\t" . 
						'<div class="form_field_wrap">' . "\n\t\t" . 
							'<input type="text" name="cmsmasters_' . $field_name . '" id="cmsmasters_' . $field_name . '" value="" size="35"' . $validate . ' />' . "\r\t" . 
						'</div>' . "\n" . 
						$descr . 
					'</div>' . "\n";
					
					
					break;
				case 'textarea':
					$out .= (($row) ? '<div class="cl"></div>' . "\n" : '') . 
					'<div class="form_info cmsmasters_textarea' . $customWidth11 . $customWidth12 . $customWidth13 . '">' . "\n\t" . 
						'<label for="cmsmasters_' . $field_name . '">' . $field_label . $required_label . '</label>' . "\n\t" . 
						'<div class="form_field_wrap">' . "\n\t\t" . 
							'<textarea name="cmsmasters_' . $field_name . '" id="cmsmasters_' . $field_name . '" cols="60" rows="10"' . $validate . '></textarea>' . "\r\t" . 
						'</div>' . "\n" . 
						$descr . 
					'</div>' . "\n";
					
					
					break;
				case 'dropdown':
					$out .= (($row) ? '<div class="cl"></div>' . "\n" : '') . 
					'<div class="form_info cmsmasters_select' . $customWidth11 . $customWidth12 . $customWidth13 . '">' . "\n\t" . 
						'<label>' . $field_label . $required_label . '</label>' . "\n\t" . 
						'<div class="form_field_wrap">' . "\n\t\t" . 
							'<select name="cmsmasters_' . $field_name . '" id="cmsmasters_' . $field_name . '"' . $validate . '>' . "\n\t\t";
					
					
					foreach ($vals as $val) {
						$out .= "\t" . '<option value="' . $val . '">' . $val . '</option>' . "\n\t\t";
					}
					
					
					$out .= '</select>' . "\r\t" . 
						'</div>' . "\n\t" . 
						'<div class="cl"></div>' . "\n" . 
						$descr . 
					'</div>' . "\n";
					
					
					break;
				case 'radiobutton':
					$out .= (($row) ? '<div class="cl"></div>' . "\n" : '') . 
					'<div class="form_info cmsmasters_radio' . $customWidth11 . $customWidth12 . $customWidth13 . '">' . "\n\t" . 
						'<label>' . $field_label . $required_label . '</label>' . "\n";
					
					
					$i = 1;
					
					
					foreach ($vals as $val) {
						$checked = ($i == 1) ? ' checked="checked"' : '';
						
						
						$out .= "\t" . '<div class="check_parent">' . "\n\t\t" . 
							'<input type="radio" name="cmsmasters_' . $field_name . '" id="cmsmasters_' . $field_name . $i . '" value="' . $val . '"' . $validate . $checked . ' />' . "\n\t\t" . 
							'<label for="cmsmasters_' . $field_name . $i . '">' . $val . '</label>' . "\r\t" . 
						'</div>' . "\n\t" . 
						'<div class="cl"></div>' . "\n";
						
						
						$i++;
					}
					
					
					$out .= $descr . 
					'</div>' . "\n";
					
					
					break;
				case 'checkbox':
					$out .= (($row) ? '<div class="cl"></div>' . "\n" : '') . 
					'<div class="form_info cmsmasters_checkbox' . $customWidth11 . $customWidth12 . $customWidth13 . '">' . "\n\t" . 
						'<label>' . $field_label . $required_label . '</label>' . "\n\t" . 
						'<div class="check_parent">' . "\n\t\t" . 
							'<input type="checkbox" name="cmsmasters_' . $field_name . '" id="cmsmasters_' . $field_name . '" value="' . $vals[0] . '"' . $validate . ' />' . "\n\t\t" . 
							'<label for="cmsmasters_' . $field_name . '">' . $vals[0] . '</label>' . "\r\t" . 
						'</div>' . "\n" . 
						$descr . 
					'</div>' . "\n";
					
					
					break;
				case 'checkboxes':
					$out .= (($row) ? '<div class="cl"></div>' . "\n" : '') . 
					'<div class="form_info cmsmasters_checkboxes' . $customWidth11 . $customWidth12 . $customWidth13 . '">' . "\n\t" . 
						'<label>' . $field_label . '</label>' . "\n";
					
					
					$i = 1;
					
					
					foreach ($vals as $val) {
						$out .= "\t" . '<div class="check_parent">' . "\n\t\t" . 
							'<input type="checkbox" name="cmsmasters_' . $field_name . '" id="cmsmasters_' . $field_name . $i . '" value="' . $val . '" />' . "\n\t\t" . 
							'<label for="cmsmasters_' . $field_name . $i . '">' . $val . '</label>' . "\r\t" . 
						'</div>' . "\n\t" . 
						'<div class="cl"></div>' . "\n";
						
						
						$i++;
					}
					
					
					$out .= $descr . 
					'</div>' . "\n";
					
					
					break;
				}
			}
		}
		
		
		foreach ($results as $form_result) {
			$form_but = $form_result->description;
			
			
			if ($form_result->type == 'form') {
				if (in_array('captcha', $form_result->parameters)) {
					$out .= '<div class="cl"></div>' . "\n" . 
					'<div id="form_' . $formname . '_builder_captcha" class="form_info cmsmasters-form-builder-captcha g-recaptcha" data-sitekey="' . $recaptcha_public_key . '"></div>' . "\n";
				}
				
				
				$out .= '<div class="cl"></div>' . "\n" . 
				'<div class="loading"></div>' . "\n" . 
				'<div class="form_info submit_wrap">' . "\n" . 
					'<a id="cmsmasters_' . $formname . '_formsend" class="cmsmasters_button" href="#"><span>' . $form_but[2] . '</span></a>' . "\n";
				
				if (in_array('reset', $form_result->parameters)) {
					$out .= '<a style="margin:0 0 0 10px;" id="cmsmasters_' . $formname . '_formclear" class="cmsmasters_button" href="#" onclick="if (confirm(\'' . __('Do you really want to reset the form?', 'cmsmasters_form_builder') . '\')) document.getElementById(\'form_' . $formname . '\').reset(); return false;"><span>' . __('Reset', 'cmsmasters_form_builder') . '</span></a>' . "\n";
				}
				
				$out .= '</div>' . "\n" . 
				'<div class="cl"></div>' . "\n" . 
					'</form>' . "\n" . 
				'</div>';
			}
		}
		
		
		return $out;
	}
}

