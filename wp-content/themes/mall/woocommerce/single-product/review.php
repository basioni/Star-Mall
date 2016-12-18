<?php
/**
 * Review Comments Template
 *
 * Closing li is left out on purpose!.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/review.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see     http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.5.0
 * 
 * @cmsmasters_package 	Mall
 * @cmsmasters_version 	1.0.1
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>
<li itemprop="review" itemscope itemtype="http://schema.org/Review" <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
	<div id="comment-<?php comment_ID(); ?>" class="comment_container cmsmasters_comment_item">
		<time class="cmsmasters_comment_item_date" itemprop="datePublished" datetime="<?php echo get_comment_date(); ?>"><?php echo get_comment_date(); ?></time>
		<figure class="cmsmasters_comment_item_avatar">
			<?php echo get_avatar( $comment, apply_filters( 'woocommerce_review_gravatar_size', '70' ), '' ); ?>
		</figure>
		<div class="comment-text cmsmasters_comment_item_cont">
			<div class="cmsmasters_comment_item_cont_info">
				<h4 class="cmsmasters_comment_item_title" itemprop="author"><?php 
					comment_author(); 
					
					if ( get_option( 'woocommerce_review_rating_verification_label' ) === 'yes' )
						if ( wc_customer_bought_product( $comment->comment_author_email, $comment->user_id, $comment->comment_post_ID ) )
							echo '<em class="verified">(' . esc_html__( 'verified owner', 'woocommerce' ) . ')</em> ';
				?></h4>
				<?php cmsmasters_woocommerce_rating('cmsmasters_theme_icon_star_empty', 'cmsmasters_theme_icon_star_full', true, $comment->comment_ID); ?>
			</div>
			<div itemprop="description" class="description cmsmasters_comment_item_content">
				<?php 
				comment_text();
				
				if ($comment->comment_approved == '0') {
					echo '<p class="meta">' . 
						'<em>' . esc_html__( 'Your comment is awaiting approval', 'woocommerce' ) . '</em>' . 
					'</p>';
				}
				?>
			</div>
		</div>
	</div>
