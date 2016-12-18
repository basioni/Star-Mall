<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Quotes Grid Format Template
 * Created by CMSMasters
 * 
 */


global $quote_content,
	$quote_image,
	$quote_name,
	$quote_subtitle,
	$quote_link,
	$quote_website;

?>

<!--_________________________ Start Grid Article _________________________ -->

<article class="cmsmasters_quote_inner">
<?php 
	if ($quote_image != '' || $quote_name != '' || $quote_subtitle != '' || $quote_website != '' || $quote_link != '') {
		echo '<div class="cmsmasters_quote_img_info_wrap">';
			
			if ($quote_image != '') {
				echo '<figure class="cmsmasters_quote_image">' . 
					wp_get_attachment_image($quote_image, 'square-thumb') . 
				'</figure>';
			}
			
			
			if ($quote_name != '' || $quote_subtitle != '' || $quote_website != '' || $quote_link != '') {
				echo '<div class="cmsmasters_quote_info_wrap">';
					
					if ($quote_name != '') {
						echo '<header class="cmsmasters_quote_header">' . 
							'<h3 class="cmsmasters_quote_title">' . esc_html($quote_name) . '</h3>' . 
						'</header>';
					}
					
					if ($quote_subtitle != '' || $quote_website != '' || $quote_link != '') {
						echo '<div class="cmsmasters_quote_subtitle_wrap">' . 
							
							($quote_subtitle != '' ? '<h5 class="cmsmasters_quote_subtitle">' . esc_html($quote_subtitle) . '</h5>' : '');
							
							
							if ($quote_website != '' || $quote_link != '') {
								echo '<span class="cmsmasters_quote_site">' . 
									($quote_link != '' ? '<a href="' . esc_url($quote_link) . '" target="_blank">' : '') . 
									
									($quote_website != '' ? esc_html($quote_website) : esc_html($quote_link)) . 
									
									($quote_link != '' ? '</a>' : '') . 
								'</span>';
							}
							
						echo '</div>';
					}
					
				echo '</div>';
			}
			
		echo '</div>';
	}
	
	
	echo cmsmasters_divpdel('<div class="cmsmasters_quote_content">' . 
		do_shortcode(wpautop($quote_content)) . 
	'</div>');
?>
</article>
<!--_________________________ Finish Grid Article _________________________ -->

