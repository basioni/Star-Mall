<?php 
/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Contact Form Builder
 * @version 	1.3.0
 * 
 * Contact Form Shortcode reCAPTCHA Validator
 * Changed by CMSMasters
 * 
 */


$parse_uri = explode('wp-content', $_SERVER['SCRIPT_FILENAME']);

require_once($parse_uri[0] . 'wp-load.php');


require_once(CMSMASTERS_FORM_BUILDER_PATH . 'inc/recaptchalib.php');


$current_theme = get_option('template');

$recaptcha_keys = get_option('cmsmasters_options_' . $current_theme . '_element_recaptcha');

$recaptcha_private_key = $recaptcha_keys[$current_theme . '_recaptcha_private_key'];


$reCaptcha = new ReCaptcha($recaptcha_private_key);


if ($_POST['g-recaptcha-response']) {
    $resp = $reCaptcha->verifyResponse(
        $_SERVER['REMOTE_ADDR'],
        $_POST['g-recaptcha-response']
    );
}


if ($resp != null && $resp->success) {
	echo 'success';
} else {
	echo 'error';
}

