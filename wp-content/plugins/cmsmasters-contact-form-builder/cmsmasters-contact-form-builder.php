<?php 
/*
Plugin Name: CMSMasters Contact Form Builder
Plugin URI: http://cmsmasters.net/
Description: CMSMasters Contact Form Builder created by <a href="http://cmsmasters.net/" title="CMSMasters">CMSMasters</a> team. Contact form plugin with visual form builder create form shortcode & widget for <a href="http://themeforest.net/user/cmsmasters/portfolio" title="cmsmasters">cmsmasters</a> WordPress themes.
Version: 1.3.5
Author: cmsmasters
Author URI: http://cmsmasters.net/
*/

/*  Copyright 2014 CMSMasters (email : cmsmstrs@gmail.com). All Rights Reserved.
	
	This software is distributed exclusively as appendant 
	to Wordpress themes, created by CMSMasters studio and 
	should be used in strict compliance to the terms, 
	listed in the License Terms & Conditions included 
	in software archive.
	
	If your archive does not include this file, 
	you may find the license text by url 
	http://cmsmasters.net/files/license/cmsmasters-contact-form-builder/license.txt 
	or contact CMSMasters Studio at email 
	copyright.cmsmasters@gmail.com 
	about this.
	
	Please note, that any usage of this software, that 
	contradicts the license terms is a subject to legal pursue 
	and will result copyright reclaim and damage withdrawal.
*/


class Cmsmasters_Form_Builder {
	var $form_handle = 'form-builder';
	
	
	function __construct() { 
		define('CMSMASTERS_FORM_BUILDER_VERSION', '1.3.5');
		
		define('CMSMASTERS_FORM_BUILDER_FILE', __FILE__);
		
		define('CMSMASTERS_FORM_BUILDER_PATH', plugin_dir_path(CMSMASTERS_FORM_BUILDER_FILE));
		
		define('CMSMASTERS_FORM_BUILDER_URL', plugin_dir_url(CMSMASTERS_FORM_BUILDER_FILE));
		
		
		require_once(CMSMASTERS_FORM_BUILDER_PATH . 'inc/form-builder-posttype.php');
		
		
		require_once(CMSMASTERS_FORM_BUILDER_PATH . 'inc/form-builder-shortcode.php');
		
		require_once(CMSMASTERS_FORM_BUILDER_PATH . 'inc/form-builder-widget.php');
		
		
		add_action('admin_enqueue_scripts', array($this, 'form_builder_admin_scripts'));
		
		
		add_action('wp_enqueue_scripts', array($this, 'form_builder_scripts'));
		
		
		register_activation_hook(CMSMASTERS_FORM_BUILDER_FILE, array($this, 'cmsmasters_form_builder_activate_deactivate'));
		
		register_deactivation_hook(CMSMASTERS_FORM_BUILDER_FILE, array($this, 'cmsmasters_form_builder_activate_deactivate'));
		
		
		add_action('admin_menu', array($this, 'cmsmasters_enable_form_builder'));
		
		// Load Plugin Local File
		load_plugin_textdomain('cmsmasters_form_builder', false, dirname(plugin_basename(CMSMASTERS_FORM_BUILDER_FILE)) . '/languages/');
	}
	
	
	function form_builder_admin_scripts() {
		wp_register_style('cmsmasters_form_builder_css', CMSMASTERS_FORM_BUILDER_URL . 'css/cmsmasters-contact-form-builder.css', array(), CMSMASTERS_FORM_BUILDER_VERSION, 'screen');
		
		wp_register_style('cmsmasters_form_builder_css_rtl', CMSMASTERS_FORM_BUILDER_URL . 'css/cmsmasters-contact-form-builder-rtl.css', array(), CMSMASTERS_FORM_BUILDER_VERSION, 'screen');
		
		
		wp_register_script('cmsmasters_form_builder_js', CMSMASTERS_FORM_BUILDER_URL . 'js/cmsmasters-contact-form-builder.js', array('jquery', 'jquery-ui-sortable'), CMSMASTERS_FORM_BUILDER_VERSION, true);
		
		wp_localize_script('cmsmasters_form_builder_js', 'cmsmasters_fb', array( 
			'enter_form_name' => 		__('Enter Form Name!', 'cmsmasters_form_builder'), 
			'enter_mess_text' => 		__('Enter your message text!', 'cmsmasters_form_builder'), 
			'enter_mess_subj' => 		__('Enter your message subject text!', 'cmsmasters_form_builder'), 
			'enter_success_text' => 	__('Enter the text about your message successfully sending!', 'cmsmasters_form_builder'), 
			'enter_submit_text' => 		__('Enter the contact form submit button text!', 'cmsmasters_form_builder'), 
			'enter_field_labels' => 	__('Please fill all field labels!', 'cmsmasters_form_builder'), 
			'enter_field_options' => 	__('Please fill all field options!', 'cmsmasters_form_builder'), 
			'error_on_page' => 			__('Error on page! Please reload page and try again.', 'cmsmasters_form_builder'), 
			'form_name_exists' => 		__('Form with this name already exists, try another name.', 'cmsmasters_form_builder'), 
			'form_saving_error' => 		__('Form saving error was detected! Please try again.', 'cmsmasters_form_builder'), 
			'save_form_as' => 			__("It is no form with this name in your database. \nSave this form as", 'cmsmasters_form_builder'), 
			'new_form_name' => 			__('Please enter new form name.', 'cmsmasters_form_builder'), 
			'form_name_invalid' => 		__('Form name is invalid.', 'cmsmasters_form_builder'), 
			'cmsmasters_text' => 			__('Text', 'cmsmasters_form_builder'), 
			'cmsmasters_field_label' => 		__('Field Label', 'cmsmasters_form_builder'), 
			'cmsmasters_required' => 		__('Required', 'cmsmasters_form_builder'), 
			'cmsmasters_row' => 				__('New Row', 'cmsmasters_form_builder'), 
			'cmsmasters_field_descr' => 		__('Field Description', 'cmsmasters_form_builder'), 
			'cmsmasters_field_opts' => 		__('Field Options', 'cmsmasters_form_builder'), 
			'cmsmasters_min_text_size' => 	__('Min text size', 'cmsmasters_form_builder'), 
			'cmsmasters_max_text_size' => 	__('Max text size', 'cmsmasters_form_builder'), 
			'cmsmasters_choose_width' => 	__('Choose field width', 'cmsmasters_form_builder'),
			'cmsmasters_choose_verif' => 	__('Choose verification', 'cmsmasters_form_builder'),
			'cmsmasters_email' => 			__('Email', 'cmsmasters_form_builder'),
			'cmsmasters_url' => 				__('URL', 'cmsmasters_form_builder'),
			'cmsmasters_number' => 			__('Number', 'cmsmasters_form_builder'),
			'cmsmasters_only_nb_sp' => 		__('Only Numbers & Spaces', 'cmsmasters_form_builder'),
			'cmsmasters_only_lt_sp' => 		__('Only Letters & Spaces', 'cmsmasters_form_builder'),
			'cmsmasters_items' => 			__('Items', 'cmsmasters_form_builder'),
			'cmsmasters_label' => 			__('Label', 'cmsmasters_form_builder'),
			'cmsmasters_thank_you' => 		__("Thank You! \nYour message has been sent successfully.", 'cmsmasters_form_builder'),
			'cmsmasters_form_subj' => 		__('Form Subject', 'cmsmasters_form_builder'),
			'your_mess_text' => 		__('Your message text...', 'cmsmasters_form_builder'),
			'form_del_error' => 		__("Form deleting error was detected! \nIt is no such form in your database.", 'cmsmasters_form_builder'),
			'del_the_form_first' => 	__('Are you sure you want to delete the form', 'cmsmasters_form_builder'),
			'del_the_form_last' => 		__('and all the fields it contains?', 'cmsmasters_form_builder'),
			'please_choose_form' => 	__('Please choose form!', 'cmsmasters_form_builder'),
			'want_to_proceed' => 		__("All unsaved changes will be lost! \nDo you want to proceed?", 'cmsmasters_form_builder'),
			'error_was_detect' => 		__("Error was detected! \nIt is no such form in your database.", 'cmsmasters_form_builder'),
			'cmsmasters_form_name' => 		__('Form Name', 'cmsmasters_form_builder'),
			'cmsmasters_drag_and_drop' => 	__('Drag & Drop to change fields order', 'cmsmasters_form_builder'),
			'add_remove_edit' => 		__('Add / Remove / Edit Fields', 'cmsmasters_form_builder'),
			'add_new_field' => 			__('Add New Field', 'cmsmasters_form_builder'),
			'cmsmasters_text_field' => 		__('Text Field', 'cmsmasters_form_builder'),
			'cmsmasters_email_field' => 		__('Email Field', 'cmsmasters_form_builder'),
			'cmsmasters_text_area' => 		__('Text Area', 'cmsmasters_form_builder'),
			'cmsmasters_dropdown' => 		__('Dropdown', 'cmsmasters_form_builder'),
			'cmsmasters_radiobuttons' => 	__('Radiobuttons', 'cmsmasters_form_builder'),
			'cmsmasters_checkbox' => 		__('Checkbox', 'cmsmasters_form_builder'),
			'cmsmasters_checkboxes' => 		__('Checkboxes', 'cmsmasters_form_builder'),
			'cmsmasters_mess_comp' => 		__('Message Composer', 'cmsmasters_form_builder'),
			'the_mess_subj' => 			__('The Message Subject', 'cmsmasters_form_builder'),
			'the_mess_button' => 		__('Submit Button Text', 'cmsmasters_form_builder'),
			'cmsmasters_form_button' => 		__('Send Message', 'cmsmasters_form_builder'),
			'success_send_text' => 		__('The Message About Succesful Sending Text', 'cmsmasters_form_builder'),
			'cmsmasters_use_captcha' => 		__('Use CAPTCHA', 'cmsmasters_form_builder'),
			'add_reset_button' => 		__('Add Reset Button', 'cmsmasters_form_builder'),
			'cmsmasters_save_form' => 		__('Save Form', 'cmsmasters_form_builder'),
			'cmsmasters_loading' => 			__('Loading', 'cmsmasters_form_builder'),
			'form_not_saved' => 		__('Form not saved! Form name is invalid.', 'cmsmasters_form_builder'),
			'enter_valid_number' => 	__('Please enter valid number.', 'cmsmasters_form_builder'),
			'choose_field_type' => 		__('Please choose field type!', 'cmsmasters_form_builder'),
			'del_this_field' => 		__('Are you sure you want to delete this field?', 'cmsmasters_form_builder'),
			'field_del_error' => 		__("Field deleting error was detected! \nIt is no such field in your database.", 'cmsmasters_form_builder'),
			'del_this_option' => 		__('Are you sure you want to delete this option?', 'cmsmasters_form_builder'),
			'less_two_options' => 		__('Here can\'t be less than 2 options!', 'cmsmasters_form_builder'),
			'cmsmasters_field' => 			__('Field', 'cmsmasters_form_builder'),
			'settings_lost' => 			__("All unsaved changes will be lost! \nAre you sure you want to leave this page?", 'cmsmasters_form_builder')
		));
		
		
		if (isset($_GET['page']) && $_GET['page'] == $this->form_handle) {
			wp_enqueue_style('cmsmasters_form_builder_css');
			
			
			if (is_rtl()) {
				wp_enqueue_style('cmsmasters_form_builder_css_rtl');
			}
			
			
			wp_enqueue_script('jquery-ui-sortable');
			
			wp_enqueue_script('cmsmasters_form_builder_js');
		}
	}
	
	
	function form_builder_scripts() {
		if (!is_admin()) {
			wp_register_style('cmsmasters_contact_form_style', CMSMASTERS_FORM_BUILDER_URL . 'css/contact-form-style.css', array(), CMSMASTERS_FORM_BUILDER_VERSION, 'screen');
			
			wp_register_style('cmsmasters_contact_form_style_rtl', CMSMASTERS_FORM_BUILDER_URL . 'css/contact-form-style-rtl.css', array(), CMSMASTERS_FORM_BUILDER_VERSION, 'screen');
			
			
			wp_register_script('cmsmastersValidation', CMSMASTERS_FORM_BUILDER_URL . 'js/jquery.validationEngine.min.js', array('jquery'), '2.6.2', true);
			
			wp_register_script('cmsmastersValidationLang', CMSMASTERS_FORM_BUILDER_URL . 'js/jquery.validationEngine-lang.js', array('jquery', 'cmsmastersValidation'), CMSMASTERS_FORM_BUILDER_VERSION, true);
			
			wp_localize_script('cmsmastersValidationLang', 'cmsmasters_ve_lang', array( 
				'required' => 			__('* This field is required', 'cmsmasters_form_builder'), 
				'select_option' => 		__('* Please select an option', 'cmsmasters_form_builder'), 
				'required_checkbox' => 	__('* This checkbox is required', 'cmsmasters_form_builder'), 
				'min' => 				__('* Minimum', 'cmsmasters_form_builder'), 
				'allowed' => 			__(' characters allowed', 'cmsmasters_form_builder'), 
				'max' => 				__('* Maximum', 'cmsmasters_form_builder'), 
				'invalid_email' => 		__('* Invalid email address', 'cmsmasters_form_builder'), 
				'invalid_number' => 	__('* Invalid number', 'cmsmasters_form_builder'), 
				'invalid_url' => 		__('* Invalid URL', 'cmsmasters_form_builder'), 
				'numbers_spaces' => 	__('* Numbers and spaces only', 'cmsmasters_form_builder'), 
				'letters_spaces' => 	__('* Letters and spaces only', 'cmsmasters_form_builder') 
			));
			
			
			wp_register_script('reCAPTCHA2', 'https://www.google.com/recaptcha/api.js?onload=validateCaptcha', array('jquery', 'cmsmastersValidation'), '2.0.0', true);
		}
	}
	
	
	function form_builder_forms_list() {
		global $post;
		
		
		$admin_post_object = $post;
		
		
		$option_query = new WP_Query(array( 
			'orderby' => 			'name', 
			'order' => 				'ASC', 
			'post_type' => 			'cmsmasters_cform', 
			'posts_per_page' => 	-1 
		));
		
		
		$forms = array();
		
		
		if ($option_query->have_posts()) : 
			while ($option_query->have_posts() ) : $option_query->the_post();
				if (get_the_excerpt() == 'form') {
					$forms[get_the_ID()] = get_the_title();
				}
			endwhile;
		endif;
		
		
		wp_reset_query();
		
		
		$post = $admin_post_object;
		
		
		return $forms;
	}
	
	
	function cmsmasters_form_builder() {
	?>
		<div class="wrap" style="position:relative; overflow:hidden;">
			<?php screen_icon('themes'); ?>
			<h2 style="padding-top:12px;"><?php _e('Contact Form Builder', 'cmsmasters_form_builder'); ?></h2>
		</div>
		<div id="settings_save" class="updated fade below-h2 myadminpanel" style="display:none;"><p><strong><?php _e('Form settings succesfully saved.', 'cmsmasters_form_builder'); ?></strong></p></div>
		<div id="settings_error" class="error fade below-h2 myadminpanel" style="display:none;"><p><strong><?php _e('Form succesfully deleted.', 'cmsmasters_form_builder'); ?></strong></p></div>
		<div class="slider wrap">
			<div class="bot">
				<div class="rght form_builder_mp">
					<form method="post" action="" id="adminoptions_form">
						<div id="form_choose_tab" class="tabb top">
							<table class="form-table cmsmasters-options">
								<tr>
									<td>
										<input type="hidden" name="loader_image_url" value="<?php echo CMSMASTERS_FORM_BUILDER_URL; ?>" />
										<button class="button add" type="button" name="add_form"><span class="dashicons-plus"></span><?php _e('Add New', 'cmsmasters_form_builder'); ?></button>
										<input class="button" type="button" name="cancel_form" value="<?php _e('Cancel', 'cmsmasters_form_builder'); ?>" />
										<div class="fr submit_loader spinner"></div>
										<select id="form_choose" class="fl">
											<option value=""><?php _e('Select your form here', 'cmsmasters_form_builder'); ?></option>
										<?php
											$forms_array = $this->form_builder_forms_list();
											
											
											if (!empty($forms_array)) {
												foreach ($forms_array as $key => $value) {
													echo '<option value="' . $key . '">' . $value . '</option>';
												}
											}
										?>
										</select>
										<button class="button edit fl" type="button" name="edit_form"><span class="dashicons-edit"></span><?php _e('Edit', 'cmsmasters_form_builder'); ?></button>
										<div class="fl submit_loader spinner"></div>
										<div class="fl">
											<button class="button delete fl" type="button" name="delete_form"><span class="dashicons-post-trash"></span><?php _e('Delete', 'cmsmasters_form_builder'); ?></button>
											<div class="fl submit_loader spinner"></div>
										</div>
										<div class="fl">
											<input class="button" type="button" name="save_as_form" value="<?php _e('Save As...', 'cmsmasters_form_builder'); ?>" />
											<div class="fl submit_loader spinner"></div>
										</div>
									</td>
								</tr>
								<tr><td style="padding:0; margin:0;"></td></tr>
							</table>
						</div>
						<div class="clsep">
							<div id="form_build_tab" class="tabb bot"></div>
						</div>
					</form>
				</div>
			</div>
		</div>
	<?php
	}
	
	
	function cmsmasters_enable_form_builder() {
		add_menu_page( 
			__('Form Builder', 'cmsmasters_form_builder'), 
			__('Form Builder', 'cmsmasters_form_builder'), 
			'manage_options', 
			$this->form_handle, 
			array($this, 'cmsmasters_form_builder'), 
			'dashicons-email-alt', 
			112 
		);
	}
	
	
	function cmsmasters_form_builder_activate_deactivate() {
		flush_rewrite_rules();
	}
}


global $frm_bldr;


$frm_bldr = new Cmsmasters_Form_Builder();

