<?php
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Contact Form Builder
 * @version 	1.3.4
 * 
 * Contact Form Widget Class
 * Created by CMSMasters
 * 
 */


class WP_Widget_Custom_Contact_Form extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_contact_form_entries', 
			'description' => 	__('Your website contact form widget', 'cmsmasters_form_builder') 
		);
		
		
		parent::__construct('custom-contact-form', __('Contact Form', 'cmsmasters_form_builder'), $widget_ops);
	}
    
	
    function widget($args, $instance) {
        extract($args);
		
		
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Contact Form', 'cmsmasters_form_builder') : $instance['title'], $instance, $this->id_base);
		
        $email = isset($instance['email']) ? $instance['email'] : '';
		
        $formname = isset($instance['formname']) ? $instance['formname'] : '';
		
		
		$encodedEmail = base64_encode($formname . '|' . $email . '|' . $formname);
		
		
		global $post;
		
		
		wp_enqueue_style('cmsmasters_contact_form_style');
		
		
		if (is_rtl()) {
			wp_enqueue_style('cmsmasters_contact_form_style_rtl');
		}
		
		
		wp_enqueue_script('cmsmastersValidation');
		
		wp_enqueue_script('cmsmastersValidationLang');
		
		
		echo $before_widget;
		
		
		if ($title) { 
			echo $before_title . $title . $after_title;
		}
		
		
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
					$out = '<div class="cmsmasters-form-builder">' . 
						'<div class="cmsmasters_notice cmsmasters_notice_success cmsmasters_theme_icon_check success_box widgetinfo" style="display:none;">' . "\n" . 
							'<div class="notice_icon"></div>' . "\n" . 
							'<div class="notice_content">' . "\n" . 
							'<p>' . ((sizeof($form_descr) > 1) ? $form_descr[1] : $form_descr) . '</p>' . "\n" . 
							'</div>' . "\n" . 
						'</div>' . "\n" . 
						'<script type="text/javascript"> ' .
							'jQuery(document).ready(function () { ' .
								"jQuery('#form_" . $formname . "').validationEngine('attach', { \n\t\t" . 
									"promptPosition : 'topRight', \n\t\t" . 
									"scroll : false, \n\t\t" . 
									"autoPositionUpdate : true, \n\t\t" . 
									"showArrow : false \n\t\t" . 
								"} ); \n\t" . 
								"jQuery('#form_" . $formname . " a#cmsmasters_" . $formname . "_wformsend').click(function () { " .
									"jQuery('#form_" . $formname . " .loading').animate( { opacity : 1 } , 250); ";
				}
			}
			
			
			foreach ($results as $form_result) {
				if ($form_result->type == 'checkbox') {
					$out .= "var var_" . $form_result->slug . " = ''; " . 
					"jQuery('input[name=\'cmsmasters_" . $form_result->slug . "\']:checked').each(function () { " . 
						"var_" . $form_result->slug . " += jQuery(this).val(); " . 
					"} ); ";
				}
			}
			
			
			foreach ($results as $form_result) {
				if ($form_result->type == 'checkboxes') {
					$out .= "var var_" . $form_result->slug . " = ''; " . 
					"jQuery('input[name=\'cmsmasters_" . $form_result->slug . "\']:checked').each(function () { " . 
						"var_" . $form_result->slug . " += jQuery(this).val() + ', '; " . 
					"} ); " . 
					"if (var_" . $form_result->slug . " != '') { " . 
						"var_" . $form_result->slug . " = var_" . $form_result->slug . ".slice(0, -2); " . 
					"} ";
				}
			}
			
			
			foreach ($results as $form_result) {
				if ($form_result->type == 'form') {
					$out .= "if (jQuery('#form_" . $formname . "').validationEngine('validate')) { " .
						"jQuery.post('" . CMSMASTERS_FORM_BUILDER_URL . "inc/form-builder-sendmail.php', { ";
				}
			}
			
			
			foreach ($results as $form_result) {
				if ($form_result->type != 'form') {
					if ($form_result->type == 'checkboxes' || $form_result->type == 'checkbox') {
						$out .= 'cmsmasters_' . $form_result->slug . " : var_" . $form_result->slug . ", ";
					} else if ($form_result->type == 'radiobutton') {
						$out .= 'cmsmasters_' . $form_result->slug . " : jQuery('input[name=\'cmsmasters_" . $form_result->slug . "\']:checked').val(), ";
					} else {
						$out .= 'cmsmasters_' . $form_result->slug . " : jQuery('#cmsmasters_" . $form_result->slug . "').val(), ";
					}
				}
			}
			
			
			foreach ($results as $form_result) {
				if ($form_result->type == 'form') {
					$out .= "contactemail : '" . $encodedEmail . "', " .
										"formname : '" . $formname . "' " .
									'} , function (data) { ' .
										"jQuery('#form_" . $formname . " .loading').animate( { opacity : 0 } , 250); " .
										"jQuery('#form_" . $formname . "').fadeOut('slow'); " .
										"document.getElementById('form_" . $formname . "').reset(); " .
										"jQuery('#form_" . $formname . "').parent().find('.widgetinfo').hide(); " .
										"jQuery('#form_" . $formname . "').parent().find('.widgetinfo').fadeIn('fast'); " .
										"jQuery('html, body').animate( { scrollTop : jQuery('#form_" . $formname . "').offset().top - 140 } , 'slow'); " .
										"jQuery('#form_" . $formname . "').parent().find('.widgetinfo').delay(5000).fadeOut(1000, function () { " . 
											"jQuery('#form_" . $formname . "').fadeIn('slow'); " . 
										"} ); " .
									'} ); ' .
									'return false; ' .
								'} else { ' .
									"jQuery('#form_" . $formname . " .loading').animate( { opacity : 0 } , 250); " .
									'return false; ' .
								'} ' .
							'} ); ' .
						'} ); ' .
					'</script>' .
					'<form action="#" method="post" id="form_' . $formname . '">';
				}
			}
			
			
			foreach ($results as $form_result) {
				if ($form_result->type != 'form') {
					$field_label = $form_result->label;
					
					$field_name = $form_result->slug;
					
					$vals = $form_result->value;
					
					$params = $form_result->parameters;
					
					
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
					
					
					$customEmail = (in_array('custom[email]', $params)) ? 'custom[email],' : '';
					
					$customUrl = (in_array('custom[url]', $params)) ? 'custom[url],' : '';
					
					$customNumber = (in_array('custom[number]', $params)) ? 'custom[number],' : '';
					
					$customOnlyNumberSp = (in_array('custom[onlyNumberSp]', $params)) ? 'custom[onlyNumberSp],' : '';
					
					$customOnlyLetterSp = (in_array('custom[onlyLetterSp]', $params)) ? 'custom[onlyLetterSp],' : '';
					
					$validate_val = $required . $minSize . $maxSize . $customEmail . $customUrl . $customNumber . $customOnlyNumberSp . $customOnlyLetterSp;
					
					$validate = ($validate_val != '') ? ' class="validate[' . substr($validate_val, 0, -1) . ']"' : '';
					
					$descr = (trim($form_result->description) != '') ? '<small class="db">' . stripslashes($form_result->description) . '</small>' : '';
					
					
					switch ($form_result->type) {
					case 'text':
						$out .= '<div class="form_info cmsmasters_input">' . "\n\t" . 
							'<label for="cmsmasters_' . $field_name . '">' . $field_label . $required_label . '</label>' . "\n\t" . 
							'<div class="form_field_wrap">' . "\n\t\t" . 
								'<input type="text" name="cmsmasters_' . $field_name . '" id="cmsmasters_' . $field_name . '" value="" size="35"' . $validate . ' />' . "\r\t" . 
							'</div>' . "\n" . 
							$descr . 
						'</div>' . "\n" . 
						'<div class="cl"></div>' . "\n\n";
						
						
						break;
					case 'email':
						$out .= '<div class="form_info cmsmasters_input">' . "\n\t" . 
							'<label for="cmsmasters_' . $field_name . '">' . $field_label . $required_label . '</label>' . "\n\t" . 
							'<div class="form_field_wrap">' . "\n\t\t" . 
								'<input type="text" name="cmsmasters_' . $field_name . '" id="cmsmasters_' . $field_name . '" value="" size="35"' . $validate . ' />' . "\r\t" . 
							'</div>' . "\n" . 
							$descr . 
						'</div>' . "\n" . 
						'<div class="cl"></div>' . "\n\n";
						
						
						break;
					case 'textarea':
						$out .= '<div class="form_info cmsmasters_textarea">' . "\n\t" . 
							'<label for="cmsmasters_' . $field_name . '">' . $field_label . $required_label . '</label>' . "\n\t" . 
							'<div class="form_field_wrap">' . "\n\t\t" . 
								'<textarea name="cmsmasters_' . $field_name . '" id="cmsmasters_' . $field_name . '" cols="50" rows="5"' . $validate . '></textarea>' . "\r\t" . 
							'</div>' . "\n" . 
							$descr . 
						'</div>' . "\n" . 
						'<div class="cl"></div>' . "\n\n";
						
						
						break;
					case 'dropdown':
						$out .= '<div class="form_info cmsmasters_select">' . "\n\t" . 
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
						'</div>' . "\n" . 
						'<div class="cl"></div>' . "\n\n";
						
						
						break;
					case 'radiobutton':
						$out .= '<div class="form_info cmsmasters_radio">' . "\n\t" . 
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
						'</div>' . "\n" . 
						'<div class="cl"></div>' . "\n\n";
						
						
						break;
					case 'checkbox':
						$out .= '<div class="form_info cmsmasters_checkbox">' . "\n\t" . 
							'<label>' . $field_label . $required_label . '</label>' . "\n\t" . 
							'<div class="check_parent">' . "\n\t\t" . 
								'<input type="checkbox" name="cmsmasters_' . $field_name . '" id="cmsmasters_' . $field_name . '" value="' . $vals[0] . '"' . $validate . ' />' . "\n\t\t" . 
								'<label for="cmsmasters_' . $field_name . '">' . $vals[0] . '</label>' . "\r\t" . 
							'</div>' . "\n" . 
							$descr . 
						'</div>' . "\n" . 
						'<div class="cl"></div>' . "\n\n";
						
						
						break;
					case 'checkboxes':
						$out .= '<div class="form_info cmsmasters_checkboxes">' . "\n\t" . 
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
						'</div>' . "\n" . 
						'<div class="cl"></div>' . "\n\n";
						
						
						break;
					}
				}
			}
			
			
			foreach ($results as $form_result) {
				$form_but = $form_result->description;
				
				
				if ($form_result->type == 'form') {
					$out .= '<div class="loading"></div>' . 
					'<div class="form_info submit_wrap">' . 
					'<div class="fl"><a id="cmsmasters_' . $formname . '_wformsend" class="button" href="#"><span>' . $form_but[2] . '</span></a></div>';
					
					
					if (in_array('reset', $form_result->parameters)) {
						$out .= '<div class="fl" style="padding:0 0 0 10px;"><a id="cmsmasters_' . $formname . '_wformclear" class="button" href="#" onclick="if (confirm(\'' . __('Do you really want to reset the form?', 'cmsmasters_form_builder') . '\')) document.getElementById(\'form_' . $formname . '\').reset(); return false;"><span>' . __('Reset', 'cmsmasters_form_builder') . '</span></a></div>';
					}
					
					
					$out .= '<div class="cl"></div></div>' .
						'</form>' .
					'</div>';
				}
			}
			
			
			echo $out;
		}
		
		
		echo $after_widget;
	}
	
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		
		$instance['title'] = strip_tags($new_instance['title']);
		
		$instance['email'] = strip_tags($new_instance['email']);
		
		$instance['formname'] = strip_tags($new_instance['formname']);
		
		
		return $instance;
	}
	
	
	function form($instance) {
		global $frm_bldr;
		
		
		$title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		
		$email = isset($instance['email']) ? esc_attr($instance['email']) : '';
		
		$formname = (isset($instance['formname']) && $instance['formname'] != '') ? $instance['formname'] : '';
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'cmsmasters_form_builder'); ?>:<br />
				<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('email'); ?>"><?php _e('Email', 'cmsmasters_form_builder'); ?>:<br />
				<input class="widefat" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" type="text" value="<?php echo $email; ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('formname'); ?>"><?php _e('Form Name', 'cmsmasters_form_builder'); ?>:<br />
				<select class="widefat" id="<?php echo $this->get_field_id('formname'); ?>" name="<?php echo $this->get_field_name('formname'); ?>">
					<option value=""><?php _e('Choose Form Name Here', 'cmsmasters_form_builder'); ?> &nbsp;</option>
					<?php
					$forms_array = $frm_bldr->form_builder_forms_list();
					
					
					if (!empty($forms_array)) {
						foreach ($forms_array as $key => $value) {
							if ($formname == $key) {
								$selected = ' selected="selected"';
							} else {
								$selected = '';
							}
							
							
							echo '<option value="' . $key . '"' . $selected . '>' . $value . '</option>';
						}
					}
					?>
				</select>
			</label>
		</p>
		<div style="clear:both;"></div>
		<?php
	}
}



function wp_custom_contact_form_widget_init() {
	if (!is_blog_installed()) {
		return;
	}
	
	
	register_widget('WP_Widget_Custom_Contact_Form');
	
	
	do_action('widgets_init');
}

add_action('init', 'wp_custom_contact_form_widget_init', 1);

