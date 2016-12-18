<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.0
 * 
 * Website WooCommerce Functions
 * Created by CMSMasters
 * 
 */


/* Woocommerce Dynamic Cart */
function cmsmasters_woocommerce_cart_dropdown() {
	$output = '<div class="cmsmasters_dynamic_cart">' .  
		'<a href="javascript:void(0);" class="cmsmasters_dynamic_cart_button cmsmasters_theme_icon_basket"></a>' . 
		'<div class="widget_shopping_cart_content"></div>' . 
	'</div>';
	
	
	echo $output;
}


/* Woocommerce Add to Cart Button */
function cmsmasters_woocommerce_add_to_cart_button() {
	global $woocommerce, 
		$product;
	
	
	if ( 
		$product->is_purchasable() && 
		$product->product_type == 'simple' && 
		$product->is_in_stock() 
	) {
		echo '<a href="' . esc_url($product->add_to_cart_url()) . '" data-product_id="' . esc_attr($product->id) . '" data-product_sku="' . esc_attr($product->get_sku()) . '" class="button add_to_cart_button cmsmasters_add_to_cart_button product_type_simple" title="' . esc_attr__('Add to Cart', 'mall') . '">' . 
			'<span>' . esc_html__('Add to Cart', 'mall') . '</span>' . 
		'</a>' . 
		'<a href="' . esc_url($woocommerce->cart->get_cart_url()) . '" class="button added_to_cart wc-forward" title="' . esc_attr__('View Cart', 'mall') . '">' . 
			'<span>' . esc_html__('View Cart', 'mall') . '</span>' . 
		'</a>';
	}
	
	
	echo '<a href="' . esc_url(get_permalink($product->id)) . '" data-product_id="' . esc_attr($product->id) . '" data-product_sku="' . esc_attr($product->get_sku()) . '" class="button cmsmasters_details_button">' . 
		'<span>' . esc_html__('Show Details', 'mall') . '</span>' . 
	'</a>';
}


/* Woocommerce Rating */
function cmsmasters_woocommerce_rating($icon_trans = '', $icon_color = '', $in_review = false, $comment_id = '', $show = true) {
	global $product;
	
	
	if (get_option( 'woocommerce_enable_review_rating') === 'no') {
		return;
	}
	
	
	$rating = (($in_review) ? intval(get_comment_meta($comment_id, 'rating', true)) : ($product->get_average_rating() ? $product->get_average_rating() : '0'));
	
	$itemprop = $in_review ? 'reviewRating' : 'aggregateRating';
	
	$itemtype = $in_review ? 'Rating' : 'AggregateRating';
	
	
	$out = "
<div class=\"cmsmasters_star_rating\" itemprop=\"{$itemprop}\" itemscope itemtype=\"http://schema.org/{$itemtype}\" title=\"" . sprintf(esc_html__('Rated %s out of 5', 'mall'), $rating) . "\">
<div class=\"cmsmasters_star_trans_wrap\">
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
	<span class=\"{$icon_trans} cmsmasters_star\"></span>
</div>
<div class=\"cmsmasters_star_color_wrap\" style=\"width:" . (($rating / 5) * 100) . "%\">
	<div class=\"cmsmasters_star_color_inner\">
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
		<span class=\"{$icon_color} cmsmasters_star\"></span>
	</div>
</div>
<span class=\"rating dn\"><strong itemprop=\"ratingValue\">" . esc_html($rating) . "</strong> " . esc_html__('out of 5', 'mall') . "</span>
</div>
";
	
	
	if ($show) {
		echo $out;
	} else {
		return $out;
	}
}


/* Woocommerce Price Format */
function cmsmasters_woocommerce_price_format($format, $currency_pos) {
	$format = '%2$s<span>%1$s</span>';

	switch ( $currency_pos ) {
		case 'left' :
			$format = '<span>%1$s</span>%2$s';
		break;
		case 'right' :
			$format = '%2$s<span>%1$s</span>';
		break;
		case 'left_space' :
			$format = '<span>%1$s&nbsp;</span>%2$s';
		break;
		case 'right_space' :
			$format = '%2$s<span>&nbsp;%1$s</span>';
		break;
	}
	
	return $format;
}
 
add_action('woocommerce_price_format', 'cmsmasters_woocommerce_price_format', 1, 2);


add_theme_support('woocommerce');


if (version_compare(WOOCOMMERCE_VERSION, '2.1') >= 0) {
	add_filter('woocommerce_enqueue_styles', '__return_false');
} else {
	define('WOOCOMMERCE_USE_CSS', false);
}

