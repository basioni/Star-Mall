<?php
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Contact Form Builder
 * @version 	1.2.1
 * 
 * Contact Form Builder Send Mail Function
 * Created by CMSMasters
 * 
 */


$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);

require_once($parse_uri[0] . 'wp-load.php');


global $post;


if (isset($_POST['formname']) && isset($_POST['contactemail'])) {
	$formname = $_POST['formname'];
	
	
	$mailString = base64_decode($_POST['contactemail']);
	
	
	$mail = explode('|', $mailString);
	
	
	if (get_post($formname) != NULL) {
		$header_from = array();
		
		$header = array();
		
		$header[] = 'MIME-Version: 1.0';
		
		$header[] = 'Content-type: text/plain; charset=utf-8';
		
		
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
				'label' => 			$posts[$i]->post_title, 
				'slug' => 			str_replace('-', '_', $posts[$i]->post_name), 
				'type' => 			$posts[$i]->post_excerpt, 
				'value' => 			unserialize($posts[$i]->post_content), 
				'description' => 	unserialize(get_post_meta($posts[$i]->ID, 'cmsmasters_contact_form_descr', true)) 
			);
		}
		
		
		foreach ($results as $form_result) {
			if ($form_result->type == 'form') {
				$subjects = $form_result->description;
				
				$subject = $subjects[0];
				
				
				$msg = $form_result->value;
			}
		}
		
		
		foreach ($results as $result) {
			if ($result->type != 'form') {
				$field_label = $result->label;
				
				
				$field_name = 'cmsmasters_' . $result->slug;
				
				if (isset($_POST[$field_name])) {
					$subject = str_replace('[%' . $field_label . '%]', $_POST[$field_name], $subject);
					
					
					$msg = str_replace('[%' . $field_label . '%]', $_POST[$field_name], $msg);
				}
			}
		}
		
		
		foreach ($results as $result) {
			if ($result->type == 'email') {
				$field_slug = $_POST['cmsmasters_' . $result->slug];
				
				
				$header_from[] = 'From: ' . $field_slug . ' <' . $field_slug . '>';
				
				$header_from[] = 'Reply-To: ' . $field_slug . ' <' . $field_slug . '>';
			}
		}
		
		
		if (empty($header_from)) {
			$header_from[] = 'From: Example <email@example.com>';
			
			$header_from[] = 'Reply-To: Example <email@example.com>';
		}
		
		
		$header_from[] = 'X-Mailer: PHP/' . phpversion();
		
		
		$headers = array_merge($header, $header_from);
		
		
		if ($mail[0] == $formname && $mail[2] == $formname) {
			$mailTo = explode(',', str_replace(' ', '', $mail[1]));
			
			
			if (!empty($mailTo)) {
				$count = count($mailTo);
				
				
				wp_mail($mailTo, $subject, $msg, $headers);
				
				
				if ($count == 0) {
					echo 'Error!!!';
				} elseif ($count == 1) {
					echo 'Letter was sent.';
				} elseif ($count > 1) {
					echo $count . ' letters have been sent.';
				}
			} else {
				echo 'Error!!!';
			}
		}
	} else {
		echo 'Error!!!';
	}
}

