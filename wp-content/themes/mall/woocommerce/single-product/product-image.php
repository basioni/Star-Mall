<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 * 
 * @cmsmasters_package 	Mall
 * @cmsmasters_version 	1.0.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $woocommerce, $product;


echo '<div class="images cmsmasters_product_images">';
	if (method_exists($product, 'get_available_variations')) {
		$cmsmasters_product_variable_items = $product->get_available_variations();
		
		
		echo '<div class="dn">';
		foreach ($cmsmasters_product_variable_items as $cmsmasters_product_variable_item) {
			if ($cmsmasters_product_variable_item['image_link'] != '') {
				echo '<a href="' . esc_url($cmsmasters_product_variable_item['image_link']) . '" itemprop="image" title="' . esc_attr($cmsmasters_product_variable_item['image_title']) . '" rel="ilightbox[cmsmasters_product_gallery]"></a>';
			}
		}
		echo '</div>';
	}
	
	
	if (has_post_thumbnail()) {
		$image_title = 	esc_attr(get_the_title(get_post_thumbnail_id()));
		$image_link = 	wp_get_attachment_url(get_post_thumbnail_id());
		$image = 		get_the_post_thumbnail($post->ID, apply_filters('single_product_large_thumbnail_size', 'shop_single'), array('title' => $image_title));
		
		
		echo apply_filters('woocommerce_single_product_image_html', sprintf('<a href="%s" itemprop="image" class="woocommerce-main-image cmsmasters_product_image" title="%s" rel="ilightbox[cmsmasters_product_gallery]">%s</a>', $image_link, $image_title, $image), $post->ID);
	} else {
		echo apply_filters('woocommerce_single_product_image_html', sprintf('<img src="%s" alt="%s" />', wc_placeholder_img_src(), esc_html__('Placeholder', 'woocommerce')), $post->ID);
	}
	
	
	do_action('woocommerce_product_thumbnails');

echo '</div>';

