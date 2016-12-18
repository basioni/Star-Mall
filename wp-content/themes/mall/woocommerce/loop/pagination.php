<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.2
 * 
 * @cmsmasters_package 	Mall
 * @cmsmasters_version 	1.0.0
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) {
	return;
}
?>
<div class="cmsmasters_wrap_pagination">
	<?php
		echo paginate_links( apply_filters( 'woocommerce_pagination_args', array(
			'base'         => esc_url_raw( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', get_pagenum_link( 999999999, false ) ) ) ),
			'format'       => '',
			'add_args'     => '',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'prev_text'    => '<span class="cmsmasters_theme_icon_slide_' . (!is_rtl() ? 'prev' : 'next') . '"></span>', 
			'next_text'    => '<span class="cmsmasters_theme_icon_slide_' . (!is_rtl() ? 'next' : 'prev') . '"></span>', 
			'type'         => 'list',
			'end_size'     => 3,
			'mid_size'     => 3
		) ) );
	?>
</div>
