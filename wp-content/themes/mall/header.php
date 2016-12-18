<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.0
 * 
 * Website Header Template
 * Created by CMSMasters
 * 
 */


$cmsmasters_option = cmsmasters_get_global_options();


?><!DOCTYPE html>
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 8)]><!-->
<html <?php language_attributes(); ?> class="cmsmasters_html">
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php esc_url(bloginfo('pingback_url')); ?>" />

<?php 
$ua = $_SERVER['HTTP_USER_AGENT'];

$checker = array( 
	'ios' => 			preg_match('/iPhone|iPod|iPad/', $ua), 
	'blackberry' => 	preg_match('/BlackBerry/', $ua), 
	'android' => 		preg_match('/Android/', $ua), 
	'mac' => 			preg_match('/Macintosh/', $ua), 
	'chrome' => 		preg_match('/Chrome/', $ua), 
	'safari' => 		preg_match('/Safari/', $ua), 
	'ie' => 			preg_match('/MSIE/', $ua), 
	'ie11' => 			preg_match('/Trident/', $ua) 
);


if (is_singular() && get_option('thread_comments')) {
	wp_enqueue_script('comment-reply');
}


$nav_args = array( 
	'theme_location' => 	'primary', 
	'menu_id' => 			'navigation', 
	'menu_class' => 		'navigation', 
	'link_before' => 		'<span class="nav_item_wrap">', 
	'link_after' => 		'</span>', 
	'fallback_cb' => 		'cmsmasters_fallback_menu' 
);


if (class_exists('Walker_Cmsmasters_Nav_Mega_Menu')) {
	$nav_args['walker'] = new Walker_Cmsmasters_Nav_Mega_Menu();
}


wp_head();

?>
</head>
<body <?php body_class(); ?>>
	
<!-- _________________________ Start Page _________________________ -->
<div id="page" class="<?php 
if ( 
	!$checker['ios'] && 
	!$checker['blackberry'] && 
	!$checker['android'] && 
	!$checker['mac'] 
) { 
	echo 'csstransition '; 
}

if ($checker['chrome']) { 
	echo 'chrome_only '; 
}

if ($checker['safari'] && !$checker['chrome']) { 
	echo 'safari_only '; 
}

if ($checker['ie'] || $checker['ie11']) { 
	echo 'ie_only '; 
}

echo 'cmsmasters_' . $cmsmasters_option[CMSMASTERS_SHORTNAME . '_theme_layout'] . ' ';

if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_fixed_header']) {
	echo 'fixed_header ';
}

if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_line']) {
	echo 'enable_header_top ';
}

if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_styles'] != 'default') {
	echo 'enable_header_bottom ';
}

if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_styles'] == 'r_nav') {
	echo 'enable_header_right ';
}

if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_styles'] == 'c_nav') {
	echo 'enable_header_centered ';
}


if (is_singular()) {
	$cmsmasters_page_id = get_the_ID();
} elseif (CMSMASTERS_WOOCOMMERCE && is_shop()) {
	$cmsmasters_page_id = wc_get_page_id('shop');
}

$cmsmasters_header_overlaps = '';

if (
	is_singular() || 
	(CMSMASTERS_WOOCOMMERCE && is_shop())
) {
	$cmsmasters_header_overlaps = get_post_meta($cmsmasters_page_id, 'cmsmasters_header_overlaps', true);
}

if ($cmsmasters_header_overlaps == '') {
	$cmsmasters_header_overlaps = $cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_overlaps'];
}

if ($cmsmasters_header_overlaps != 'false') {
	echo 'cmsmasters_heading_under_header ';
} else {
	echo 'cmsmasters_heading_after_header ';
}
?>hfeed site">

<!-- _________________________ Start Main _________________________ -->
<div id="main">
	
<!-- _________________________ Start Header _________________________ -->
<header id="header">
	<?php if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_line']) { ?>
		<div class="header_top" data-height="<?php echo esc_attr($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_height']); ?>">
			<div class="header_top_outer">
				<div class="header_top_inner">
				<?php 
					if (
						$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_line_add_cont'] !== 'none' || 
						(
							CMSMASTERS_DONATIONS && 
							isset($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_line_donations_but']) && 
							$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_line_donations_but'] &&
							isset($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_line_donations_but_text']) && 
							$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_line_donations_but_text'] != '' 
						)
					) {
						echo '<div class="header_top_right">';
						
						
						if (
							$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_line_add_cont'] == 'social' && 
							isset($cmsmasters_option[CMSMASTERS_SHORTNAME . '_social_icons'])
						) {
							cmsmasters_social_icons();
						} elseif (
							$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_line_add_cont'] == 'nav' && 
							has_nav_menu('top_line')
						) {
							echo '<div class="top_nav_wrap">' . 
								'<a class="responsive_top_nav cmsmasters_theme_icon_resp_nav" href="javascript:void(0);"></a>' . 
								'<nav>';
							
							
							wp_nav_menu(array( 
								'theme_location' => 	'top_line', 
								'menu_id' => 			'top_line_nav', 
								'menu_class' => 		'top_line_nav', 
								'link_before' => 		'<span class="nav_item_wrap">', 
								'link_after' => 		'</span>' 
							));
							
							
							echo '</nav>' . 
							'</div>';
						}
						
						
						if (
							CMSMASTERS_DONATIONS && 
							isset($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_line_donations_but']) && 
							$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_line_donations_but'] &&
							isset($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_line_donations_but_text']) && 
							$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_line_donations_but_text'] != '' 
						) {
							$cmsmasters_donations_form_page = get_option('cmsmasters_donations_form_page');
							
							echo '<a href="' . esc_url(get_permalink($cmsmasters_donations_form_page)) . '" class="header_top_donation_but"><span>' . esc_html($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_line_donations_but_text']) . '</span></a>';
						}
						
						
						echo '</div>';
					}
					
					
					if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_line_short_info'] !== '') {
						echo '<div class="header_top_left">' . 
							'<div class="meta_wrap">' . 
								stripslashes($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_top_line_short_info']) . 
							'</div>' . 
						'</div>';
					} 
				?>
				</div>
			</div>
			<div class="header_top_but closed">
				<span class="cmsmasters_theme_icon_slide_bottom"></span>
			</div>
		</div>
	<?php } ?>
	<div class="header_mid" data-height="<?php echo esc_attr($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_mid_height']); ?>">
		<div class="header_mid_outer">
			<div class="header_mid_inner">
				<div class="logo_wrap">
					<?php cmsmasters_logo(); ?>
				</div>
			
			<?php 
			if (
				CMSMASTERS_DONATIONS && 
				isset($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_donations_but']) && 
				$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_donations_but'] && 
				isset($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_donations_but_text']) && 
				$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_donations_but_text'] != '' && 
				$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_styles'] != 'default' && 
				$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_styles'] != 'c_nav'
			) {
				$cmsmasters_donations_form_page = get_option('cmsmasters_donations_form_page');
				
				echo '<div class="header_donation_but_wrap">' . 
					'<div class="header_donation_but_wrap_inner">' . 
						'<div class="header_donation_but">' . 
							'<a href="' . esc_url(get_permalink($cmsmasters_donations_form_page)) . '" class="cmsmasters_button">' . 
								'<span>' . esc_html($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_donations_but_text']) . '</span>' . 
							'</a>' . 
						'</div>' . 
					'</div>' . 
				'</div>';
			}
			
			
			if (
				CMSMASTERS_WOOCOMMERCE && 
				$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_styles'] != 'c_nav'
			) {
				echo '<div class="cmsmasters_dynamic_cart_wrap">';
					cmsmasters_woocommerce_cart_dropdown(); 
				echo '</div>';
			}
			
			
			if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_styles'] == 'default') {
				?>
				<div class="resp_mid_nav_wrap">
					<div class="resp_mid_nav_outer">
						<a class="responsive_nav resp_mid_nav cmsmasters_theme_icon_resp_nav" href="javascript:void(0);"></a>
					</div>
				</div>
				<?php 
			}
			
			if (
				$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_search'] && 
				$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_styles'] != 'c_nav'
			) {
				?>
				<div class="search_wrap">
					<div class="search_wrap_inner">
						<?php get_search_form(); ?>
					</div>
				</div>
				<?php 
			}
			
			
			if (
				$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_styles'] != 'default' && 
				$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_styles'] != 'c_nav'
			) { 
				if (
					$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_add_cont'] == 'cust_html' && 
					$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_add_cont_cust_html'] !== ''
				) {
			?>
				<div class="slogan_wrap">
					<div class="slogan_wrap_inner">
						<div class="slogan_wrap_text">
							<?php echo stripslashes($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_add_cont_cust_html']) ?>
						</div>
					</div>
				</div>
			<?php 
				} elseif (
					$cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_add_cont'] == 'social' && 
					isset($cmsmasters_option[CMSMASTERS_SHORTNAME . '_social_icons'])
				) {
					cmsmasters_social_icons();
				}
			}
			?>
			
			<?php if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_styles'] == 'default') { ?>
				<!-- _________________________ Start Navigation _________________________ -->
				<div class="mid_nav_wrap">
					<nav role="navigation">
					<?php
						echo "\t";
						
						$nav_args['menu_class'] = 'mid_nav navigation';
						
						wp_nav_menu($nav_args);
						
						
						echo "\r";
					?>
					</nav>
				</div>
				<!-- _________________________ Finish Navigation _________________________ -->
			<?php } ?>
			</div>
		</div>
	</div>
<?php if ($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_styles'] != 'default') { ?>
	<div class="header_bot" data-height="<?php echo esc_attr($cmsmasters_option[CMSMASTERS_SHORTNAME . '_header_bot_height']); ?>">
		<div class="header_bot_outer">
			<div class="header_bot_inner">
				<div class="resp_bot_nav_wrap">
					<div class="resp_bot_nav_outer">
						<a class="responsive_nav resp_bot_nav cmsmasters_theme_icon_resp_nav" href="javascript:void(0);"></a>
					</div>
				</div>
				
				<!-- _________________________ Start Navigation _________________________ -->
				<div class="bot_nav_wrap">
					<nav role="navigation">
					<?php
						echo "\t";
						
						$nav_args['menu_class'] = 'bot_nav navigation';
						
						wp_nav_menu($nav_args);
						
						
						echo "\r";
					?>
					</nav>
				</div>
				<!-- _________________________ Finish Navigation _________________________ -->
				
			</div>
		</div>
	</div>
<?php } ?>
</header>
<!-- _________________________ Finish Header _________________________ -->

	
<!-- _________________________ Start Middle _________________________ -->
<div id="middle"<?php echo (is_404()) ? ' class="error_page"' : ''; ?>>
<?php 
if (!is_404() && !is_home()) {
	cmsmasters_page_heading();
} else {
	echo "<div class=\"headline\">
		<div class=\"headline_outer cmsmasters_headline_disabled\"></div>
	</div>";
}


list($cmsmasters_layout, $cmsmasters_page_scheme) = cmsmasters_theme_page_layout_scheme();


echo '<div class="middle_inner' . (($cmsmasters_page_scheme != 'default') ? ' cmsmasters_color_scheme_' . $cmsmasters_page_scheme : '') . '">' . "\n" . 
	'<div class="content_wrap ' . $cmsmasters_layout . 
	((is_singular('project')) ? ' project_page' : '') . 
	((is_singular('profile')) ? ' profile_page' : '') . 
	((CMSMASTERS_WOOCOMMERCE && (
		is_woocommerce() || 
		is_cart() || 
		is_checkout() || 
		is_checkout_pay_page() || 
		is_account_page() || 
		is_order_received_page() || 
		is_add_payment_method_page()
	)) ? ' cmsmasters_woo' : '') . 
	'">' . "\n\n";

