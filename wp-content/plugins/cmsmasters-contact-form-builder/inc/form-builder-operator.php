<?php
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Contact Form Builder
 * @version 	1.3.1
 * 
 * Contact Form Builder Operator
 * Created by CMSMasters
 * 
 */


header('Content-type:text/html; charset=utf-8');


define('DOING_AJAX', true);


$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);

require_once($parse_uri[0] . 'wp-load.php');

require_once($parse_uri[0] . 'wp-admin/includes/admin.php');


if (!is_user_logged_in() || !current_user_can('edit_posts')) {
	die(__('You must be logged in to access this script.', 'cmsmasters_form_builder'));
}


global $post;


if (isset($_POST['type']) && isset($_POST['option']) && isset($_POST['data'])) {
	$post_type = $_POST['type'];
	
	$post_option = $_POST['option'];
	
	$post_data = $_POST['data'];
	
	
	if ($post_type == 'form') {
		if ($post_option == 'try') {
			$args = array( 
				'post_type' => 			'cmsmasters_cform', 
				'name' => 				$post_data, 
				'post_status' => 		'publish', 
				'posts_per_page' => 	1 
			);
			
			
			$new_query = new WP_Query($args);
			
			
			if ($new_query->have_posts()) : 
				while ($new_query->have_posts()) : $new_query->the_post();
					$try = get_post(get_the_ID());
					
					
					echo $try->post_name;
				endwhile;
			endif;
			
			
			wp_reset_query();
		} elseif ($post_option == 'delete') {
			if (get_post($post_data) != NULL) {
				$del_ids = array();
				
				$del_ids[] = $post_data;
				
				
				$args = array( 
					'post_type' => 			'cmsmasters_cform', 
					'post_parent' => 		$post_data, 
					'post_status' => 		'publish' 
				);
				
				
				$new_query = new WP_Query($args);
				
				
				if ($new_query->have_posts()) : 
					while ($new_query->have_posts()) : $new_query->the_post();
						$del_ids[] = get_the_ID();
					endwhile;
				endif;
				
				
				wp_reset_query();
				
				
				foreach ($del_ids as $del_id) {
					$del_post = wp_delete_post($del_id, true);
					
					
					delete_post_meta($del_id, 'cmsmasters_contact_form_descr');
					
					delete_post_meta($del_id, 'cmsmasters_contact_form_params');
					
					
					if (!isset($test_var)) {
						$test_var = true;
						
						
						echo $del_post->ID;
					}
				}
			} else {
				echo 'error';
			}
		} elseif ($post_option == 'edit') {
			if (get_post($post_data) != NULL) {
				$parent_post = array();
				
				
				$parent_post[] = get_post($post_data);
				
				
				$child_posts = get_posts(array( 
					'post_type' => 			'cmsmasters_cform', 
					'post_parent' => 		$post_data, 
					'orderby' => 			'menu_order', 
					'order' => 				'ASC', 
					'posts_per_page' => 	-1 
				));
				
				
				$posts = array_merge($parent_post, $child_posts);
				
				
				$results = array();
				
				
				for ($i = 0; $i < sizeof($posts); $i++) {
					$results[$i] = (object) array( 
						'id' => 			$posts[$i]->ID, 
						'label' => 			$posts[$i]->post_title, 
						'slug' => 			$posts[$i]->post_name, 
						'type' => 			$posts[$i]->post_excerpt, 
						'number' => 		$posts[$i]->menu_order, 
						'parent_slug' => 	$posts[$i]->post_parent, 
						'value' => 			unserialize($posts[$i]->post_content), 
						'description' => 	unserialize(get_post_meta($posts[$i]->ID, 'cmsmasters_contact_form_descr', true)), 
						'parameters' => 	unserialize(get_post_meta($posts[$i]->ID, 'cmsmasters_contact_form_params', true)) 
					);
				}
				
				
				$out = json_encode($results);
				
				
				echo $out;
			} else {
				echo 'error';
			}
		}
	} elseif ($post_type == 'fields') {
		if ($post_option == 'add') {
			$data = json_decode(stripslashes($post_data));
			
			
			if (get_post($data[0]->slug) == NULL) {
				foreach ($data as $data_cell) {
					$ins_post_ID = wp_insert_post(array( 
						'post_title' => 	wp_strip_all_tags($data_cell->label), 
						'post_name' => 		generateSlug(wp_strip_all_tags($data_cell->label), 30), 
						'post_excerpt' => 	$data_cell->type, 
						'menu_order' => 	$data_cell->number, 
						'post_parent' => 	0, 
						'post_content' => 	serialize($data_cell->value), 
						'post_status' => 	'publish', 
						'post_type' => 		'cmsmasters_cform' 
					));
					
					
					add_post_meta($ins_post_ID, 'cmsmasters_contact_form_descr', serialize($data_cell->description));
					
					
					add_post_meta($ins_post_ID, 'cmsmasters_contact_form_params', serialize($data_cell->parameters));
					
					
					if (!isset($test_var)) {
						$test_var = true;
						
						
						$parent_id = $ins_post_ID;
						
						
						echo $parent_id . ':' . $data_cell->label;
					}
					
					
					wp_update_post(array( 
						'ID' => 			$ins_post_ID, 
						'post_parent' => 	$parent_id, 
						'post_type' => 		'cmsmasters_cform' 
					));
				}
			} else {
				echo 'error';
			}
		} elseif ($post_option == 'delete') {
			if (get_post($post_data) != NULL) {
				wp_delete_post($post_data, true);
				
				
				delete_post_meta($post_data, 'cmsmasters_contact_form_descr');
				
				delete_post_meta($post_data, 'cmsmasters_contact_form_params');
			} else {
				echo 'error';
			}
		} elseif ($post_option == 'update') {
			$data = json_decode(stripslashes($post_data));
			
			
			$parent_id = $data[0]->id;
			
			
			if (get_post($data[0]->slug) == NULL) {
				foreach ($data as $data_cell) {
					if ($data_cell->id != '') {
						$upd_post_ID = wp_update_post(array( 
							'ID' => 			$data_cell->id, 
							'post_title' => 	wp_strip_all_tags($data_cell->label), 
							'post_name' => 		generateSlug(wp_strip_all_tags($data_cell->label), 30), 
							'post_excerpt' => 	$data_cell->type, 
							'menu_order' => 	$data_cell->number, 
							'post_parent' => 	$parent_id, 
							'post_content' => 	serialize($data_cell->value), 
							'post_status' => 	'publish', 
							'post_type' => 		'cmsmasters_cform' 
						));
						
						
						update_post_meta($upd_post_ID, 'cmsmasters_contact_form_descr', serialize($data_cell->description));
						
						
						update_post_meta($upd_post_ID, 'cmsmasters_contact_form_params', serialize($data_cell->parameters));
						
						
						if (!isset($test_var)) {
							$test_var = true;
							
							
							$try = get_post($upd_post_ID);
							
							
							echo $parent_id . ':' . $try->post_title;
						}
					} else {
						$ins_post_ID = wp_insert_post(array( 
							'post_title' => 	wp_strip_all_tags($data_cell->label), 
							'post_name' => 		generateSlug(wp_strip_all_tags($data_cell->label), 30), 
							'post_excerpt' => 	$data_cell->type, 
							'menu_order' => 	$data_cell->number, 
							'post_parent' => 	0, 
							'post_content' => 	serialize($data_cell->value), 
							'post_status' => 	'publish', 
							'post_type' => 		'cmsmasters_cform' 
						));
						
						
						add_post_meta($ins_post_ID, 'cmsmasters_contact_form_descr', serialize($data_cell->description));
						
						
						add_post_meta($ins_post_ID, 'cmsmasters_contact_form_params', serialize($data_cell->parameters));
						
						
						wp_update_post(array( 
							'ID' => 			$ins_post_ID, 
							'post_parent' => 	$parent_id, 
							'post_type' => 		'cmsmasters_cform' 
						));
					}
				}
			} else {
				echo 'error';
			}
		} else {
			echo 'error';
		}
	} else {
		echo 'error';
	}
} else {
	echo 'error';
}

