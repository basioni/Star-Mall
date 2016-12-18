<?php
/**
 * The template for displaying product content within loops.
 *
 * Override this template by copying it to yourtheme/woocommerce/content-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 * 
 * @cmsmasters_package 	Mall
 * @cmsmasters_version 	1.0.1
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;


// Ensure visibility
if ( ! $product || ! $product->is_visible() ) {
	return;
}

?>
<li <?php post_class(); ?>>
	<article class="cmsmasters_product">
		<figure class="cmsmasters_product_img preloader">
			<a href="<?php the_permalink(); ?>">
				<?php woocommerce_template_loop_product_thumbnail(); ?>
			</a>
			<div class="cmsmasters_product_add_wrap">
				<div class="cmsmasters_product_add_inner">
					<?php cmsmasters_woocommerce_add_to_cart_button(); ?>
				</div>
			</div>
			<?php 
				woocommerce_show_product_loop_sale_flash();
				
				$availability = $product->get_availability();

				if (esc_attr($availability['class']) == 'out-of-stock') {
					echo apply_filters('woocommerce_stock_html', '<span class="' . esc_attr( $availability['class'] ) . '">' . esc_html( $availability['availability'] ) . '</span>', $availability['availability']);
				}
			?>
		</figure>
		<div class="cmsmasters_product_inner">
			<header class="cmsmasters_product_header entry-header">
				<h4 class="cmsmasters_product_title entry-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h4>
			</header>
			<?php 
			if (get_the_terms($product->id, 'product_cat')) {
				echo '<div class="cmsmasters_product_cat entry-meta">' . 
					cmsmasters_get_the_category_list($product->id, 'product_cat', ', ') . 
				'</div>';
			}
			?>
			<div class="cmsmasters_product_info">
			<?php
				cmsmasters_woocommerce_rating('cmsmasters_theme_icon_star_empty', 'cmsmasters_theme_icon_star_full');
				
				woocommerce_template_loop_price();
			?>
			</div>
		</div>
	</article>
</li>