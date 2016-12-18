<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version		1.0.0
 * 
 * Website Footer Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = cmsmasters_get_global_options();


if (is_singular()) {
	$cmsmasters_page_id = get_the_ID();
} elseif (CMSMASTERS_WOOCOMMERCE && is_shop()) {
	$cmsmasters_page_id = wc_get_page_id('shop');
}


if ( 
	is_singular() || 
	(CMSMASTERS_WOOCOMMERCE && is_shop())
) {
	$cmsmasters_bottom_sidebar = get_post_meta($cmsmasters_page_id, 'cmsmasters_bottom_sidebar', true) !== '' ? get_post_meta($cmsmasters_page_id, 'cmsmasters_bottom_sidebar', true) : ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_bottom_sidebar'] == 1 ? 'true' : 'false');
	
	$cmsmasters_bottom_sidebar_layout = get_post_meta($cmsmasters_page_id, 'cmsmasters_bottom_sidebar_layout', true) !== '' ? get_post_meta($cmsmasters_page_id, 'cmsmasters_bottom_sidebar_layout', true) : $cmsmasters_option[CMSMASTERS_SHORTNAME . '_bottom_sidebar_layout'];
} else {
	$cmsmasters_bottom_sidebar = $cmsmasters_option[CMSMASTERS_SHORTNAME . '_bottom_sidebar'] == 1 ? 'true' : 'false';
	
	$cmsmasters_bottom_sidebar_layout = $cmsmasters_option[CMSMASTERS_SHORTNAME . '_bottom_sidebar_layout'];
}


echo '</div>' . "\r" . 
	'</div>' . "\n" . 
'</div>' . "\n" . 
'<!-- _________________________ Finish Middle _________________________ -->' . "\n\n\n";


if ( 
	!is_home() && 
	!is_404() && 
	$cmsmasters_bottom_sidebar && 
	$cmsmasters_bottom_sidebar == 'true' 
) {
	echo '<!-- _________________________ Start Bottom _________________________ -->' . "\n" . 
	'<div id="bottom" class="cmsmasters_color_scheme_' . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_bottom_scheme'] . '">' . "\n" . 
		'<div class="bottom_bg">' . "\n" . 
			'<div class="bottom_outer">' . "\n" . 
				'<div class="bottom_inner sidebar_layout_' . $cmsmasters_bottom_sidebar_layout . '">' . "\n";
	
	get_sidebar('bottom');
	
	echo '</div>' . "\r" . 
			'</div>' . "\r" . 
		'</div>' . "\r" . 
	'</div>' . "\r" . 
	'<!-- _________________________ Finish Bottom _________________________ -->' . "\n\n";
}


echo '<a href="javascript:void(0);" id="slide_top" class="cmsmasters_theme_icon_slide_top"></a>' . "\n";
?>
	</div>
<!-- _________________________ Finish Main _________________________ -->

<!-- _________________________ Start Footer _________________________ -->
<footer id="footer" role="contentinfo" class="<?php echo 'cmsmasters_color_scheme_' . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_scheme'] . ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_type'] == 'default' ? ' cmsmasters_footer_default' : ' cmsmasters_footer_small'); ?>">
	<div class="footer_inner">
	<?php 
	if (
		$cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_type'] == 'default' && 
		$cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_logo']
	) {
		echo '<div class="footer_logo_wrap">';
			cmsmasters_footer_logo();
		echo '</div>';
	}
	
	
	if (
		(
			$cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_type'] == 'default' && 
			$cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_html'] !== ''
		) || (
			$cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_type'] == 'small' && 
			$cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_additional_content'] == 'text' && 
			$cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_html'] !== ''
		)
	) {
		echo '<div class="footer_custom_html_wrap">' . 
			'<div class="footer_custom_html">' . 
				do_shortcode(stripslashes($cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_html'])) . 
			'</div>' . 
		'</div>';
	}
	
	
	if (
		has_nav_menu('footer') && 
		(
			(
				$cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_type'] == 'default' && 
				$cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_nav']
			) || (
				$cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_type'] == 'small' && 
				$cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_additional_content'] == 'nav'
			)
		)
	) {
		echo '<div class="footer_nav_wrap">' . 
			'<nav>';
			
			
			wp_nav_menu(array( 
				'theme_location' => 'footer', 
				'menu_id' => 'footer_nav', 
				'menu_class' => 'footer_nav' 
			));
		
		
			echo '</nav>' . 
		'</div>';
	}
	
	
	if (
		isset($cmsmasters_option[CMSMASTERS_SHORTNAME . '_social_icons']) && 
		(
			(
				$cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_type'] == 'default' && 
				$cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_social']
			) || (
				$cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_type'] == 'small' && 
				$cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_additional_content'] == 'social'
			)
		)
	) {
		cmsmasters_social_icons();
	}
	
	
	echo '<span class="footer_copyright copyright">' . stripslashes($cmsmasters_option[CMSMASTERS_SHORTNAME . '_footer_copyright']) . '</span>';
	?>
	</div>
</footer>
<!-- _________________________ Finish Footer _________________________ -->

</div>
<!-- _________________________ Finish Page _________________________ -->

<?php wp_footer(); ?>
</body>
</html>
