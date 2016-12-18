<?php
/**
 * @package 	WordPress
 * @subpackage 	Mall
 * @version 	1.0.0
 * 
 * Custom Theme Widgets
 * Created by CMSMasters
 * 
 */


/**
 * Advertisement Widget Class
 */
class WP_Widget_Custom_Advertisement extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_advertisement_entries', 
			'description' => 	esc_attr__('Your advertisement', 'mall') 
		);
		
		$control_ops = array( 
			'width' => 	600 
		);
		
		parent::__construct('custom-advertisement', esc_attr__('Advertisement', 'mall'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Advertisement', 'mall') : $instance['title'], $instance, $this->id_base);
        $image1 = isset($instance['image1']) ? $instance['image1'] : '';
        $link1 = isset($instance['link1']) ? $instance['link1'] : '';
        $image2 = isset($instance['image2']) ? $instance['image2'] : '';
        $link2 = isset($instance['link2']) ? $instance['link2'] : '';
        $image3 = isset($instance['image3']) ? $instance['image3'] : '';
        $link3 = isset($instance['link3']) ? $instance['link3'] : '';
        $image4 = isset($instance['image4']) ? $instance['image4'] : '';
        $link4 = isset($instance['link4']) ? $instance['link4'] : '';
        $image5 = isset($instance['image5']) ? $instance['image5'] : '';
        $link5 = isset($instance['link5']) ? $instance['link5'] : '';
        $image6 = isset($instance['image6']) ? $instance['image6'] : '';
        $link6 = isset($instance['link6']) ? $instance['link6'] : '';
		
		echo $before_widget;
		
		if ($title) { 
			echo $before_title . esc_html($title) . $after_title;
		}
		
		echo '<div class="adv_image_wrap">';
		
		if ($image1 != '' && $link1 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link1) . '" target="_blank">' . 
					'<img src="' . esc_url($image1) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image2 != '' && $link2 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link2) . '" target="_blank">' . 
					'<img src="' . esc_url($image2) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image3 != '' && $link3 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link3) . '" target="_blank">' . 
					'<img src="' . esc_url($image3) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image4 != '' && $link4 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link4) . '" target="_blank">' . 
					'<img src="' . esc_url($image4) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image5 != '' && $link5 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link5) . '" target="_blank">' . 
					'<img src="' . esc_url($image5) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}

		if ($image6 != '' && $link6 != '') {
			echo '<figure class="adv_widget_image">' . 
				'<a href="' . esc_url($link6) . '" target="_blank">' . 
					'<img src="' . esc_url($image6) . '" width="125" height="125" alt="" />' . 
				'</a>' . 
			'</figure>';
		}
		
        echo '</div>';
		
        echo $after_widget;
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['image1'] = strip_tags($new_instance['image1']);
        $instance['link1'] = strip_tags($new_instance['link1']);
        $instance['image2'] = strip_tags($new_instance['image2']);
        $instance['link2'] = strip_tags($new_instance['link2']);
        $instance['image3'] = strip_tags($new_instance['image3']);
        $instance['link3'] = strip_tags($new_instance['link3']);
        $instance['image4'] = strip_tags($new_instance['image4']);
        $instance['link4'] = strip_tags($new_instance['link4']);
        $instance['image5'] = strip_tags($new_instance['image5']);
        $instance['link5'] = strip_tags($new_instance['link5']);
        $instance['image6'] = strip_tags($new_instance['image6']);
        $instance['link6'] = strip_tags($new_instance['link6']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$image1 = isset($instance['image1']) ? esc_attr($instance['image1']) : '';
		$link1 = isset($instance['link1']) ? esc_attr($instance['link1']) : '';
		$image2 = isset($instance['image2']) ? esc_attr($instance['image2']) : '';
		$link2 = isset($instance['link2']) ? esc_attr($instance['link2']) : '';
		$image3 = isset($instance['image3']) ? esc_attr($instance['image3']) : '';
		$link3 = isset($instance['link3']) ? esc_attr($instance['link3']) : '';
		$image4 = isset($instance['image4']) ? esc_attr($instance['image4']) : '';
		$link4 = isset($instance['link4']) ? esc_attr($instance['link4']) : '';
		$image5 = isset($instance['image5']) ? esc_attr($instance['image5']) : '';
		$link5 = isset($instance['link5']) ? esc_attr($instance['link5']) : '';
		$image6 = isset($instance['image6']) ? esc_attr($instance['image6']) : '';
		$link6 = isset($instance['link6']) ? esc_attr($instance['link6']) : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('image1')); ?>"><?php esc_html_e('Image', 'mall'); ?> #1:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image1')); ?>" name="<?php echo esc_attr($this->get_field_name('image1')); ?>" type="text" value="<?php echo esc_attr($image1); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('link1')); ?>"><?php esc_html_e('Link', 'mall'); ?> #1:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link1')); ?>" name="<?php echo esc_attr($this->get_field_name('link1')); ?>" type="text" value="<?php echo esc_attr($link1); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('image2')); ?>"><?php esc_html_e('Image', 'mall'); ?> #2:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image2')); ?>" name="<?php echo esc_attr($this->get_field_name('image2')); ?>" type="text" value="<?php echo esc_attr($image2); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('link2')); ?>"><?php esc_html_e('Link', 'mall'); ?> #2:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link2')); ?>" name="<?php echo esc_attr($this->get_field_name('link2')); ?>" type="text" value="<?php echo esc_attr($link2); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('image3')); ?>"><?php esc_html_e('Image', 'mall'); ?> #3:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image3')); ?>" name="<?php echo esc_attr($this->get_field_name('image3')); ?>" type="text" value="<?php echo esc_attr($image3); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('link3')); ?>"><?php esc_html_e('Link', 'mall'); ?> #3:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link3')); ?>" name="<?php echo esc_attr($this->get_field_name('link3')); ?>" type="text" value="<?php echo esc_attr($link3); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('image4')); ?>"><?php esc_html_e('Image', 'mall'); ?> #4:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image4')); ?>" name="<?php echo esc_attr($this->get_field_name('image4')); ?>" type="text" value="<?php echo esc_attr($image4); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('link4')); ?>"><?php esc_html_e('Link', 'mall'); ?> #4:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link4')); ?>" name="<?php echo esc_attr($this->get_field_name('link4')); ?>" type="text" value="<?php echo esc_attr($link4); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('image5')); ?>"><?php esc_html_e('Image', 'mall'); ?> #5:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image5')); ?>" name="<?php echo esc_attr($this->get_field_name('image5')); ?>" type="text" value="<?php echo esc_attr($image5); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('link5')); ?>"><?php esc_html_e('Link', 'mall'); ?> #5:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link5')); ?>" name="<?php echo esc_attr($this->get_field_name('link5')); ?>" type="text" value="<?php echo esc_attr($link5); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('image6')); ?>"><?php esc_html_e('Image', 'mall'); ?> #6:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('image6')); ?>" name="<?php echo esc_attr($this->get_field_name('image6')); ?>" type="text" value="<?php echo esc_attr($image6); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('link6')); ?>"><?php esc_html_e('Link', 'mall'); ?> #6:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('link6')); ?>" name="<?php echo esc_attr($this->get_field_name('link6')); ?>" type="text" value="<?php echo esc_attr($link6); ?>" />
            </label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Contact Information Widget Class
 */
class WP_Widget_Custom_Contact_Info extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_contact_info_entries', 
			'description' => 	esc_html__('Your contact information', 'mall') 
		);
		
		$control_ops = array( 
			'width' => 	600 
		);
		
		parent::__construct('custom-contact-info', esc_attr__('Contact Information', 'mall'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Contact Information', 'mall') : $instance['title'], $instance, $this->id_base);
        $name = isset($instance['name']) ? esc_html($instance['name']) : '';
        $url = isset($instance['url']) ? esc_url($instance['url']) : '';
        $email = isset($instance['email']) ? sanitize_email($instance['email']) : '';
        $phone = isset($instance['phone']) ? esc_html($instance['phone']) : '';
        $address = isset($instance['address']) ? esc_html($instance['address']) : '';
        $city = isset($instance['city']) ? esc_html($instance['city']) : '';
        $state = isset($instance['state']) ? esc_html($instance['state']) : '';
        $zip = isset($instance['zip']) ? esc_html($instance['zip']) : '';
        $country = isset($instance['country']) ? esc_html($instance['country']) : '';
        $time = isset($instance['time']) ? esc_html($instance['time']) : '';
		
		echo $before_widget;
		
		if ($title) { 
			echo $before_title . esc_html($title) . $after_title;
		}
		
		if ( 
			$address != '' || 
			$city != '' || 
			$state != '' || 
			$zip != '' || 
			$country != '' 
		) {
			echo '<div class="adr adress_wrap cmsmasters_theme_icon_user_address">';
		}
		
		if ($address != '') { 
			echo '<span class="street-address contact_widget_address">' . esc_html($address) . '</span>';
		}
		
		if ($city != '') { 
			echo '<span class="locality contact_widget_city">' . esc_html($city) . '</span>';
		}
		
		if ($state != '') { 
			echo '<span class="region contact_widget_state">' . esc_html($state) . '</span>';
		}
		
		if ($zip != '') { 
			echo '<span class="postal-code contact_widget_zip">' . esc_html($zip) . '</span>';
		}
		
		if ($country != '') { 
			echo '<span class="country-name contact_widget_country">' . esc_html($country) . '</span>';
		}
		
		if ( 
			$address != '' || 
			$city != '' || 
			$state != '' || 
			$zip != '' || 
			$country != '' 
		) {
			echo '</div>';
		}
		
		if ($time != '') { 
            echo '<span class="contact_widget_time cmsmasters_theme_icon_time">' . 
				'<span class="time">' . esc_html($time) . '</span>' . 
			'</span>';
		}
		
		if ($name != '') { 
            echo '<span class="contact_widget_name cmsmasters_theme_icon_person">' . 
				'<span class="fn contact_widget_name_inner">' . esc_html($name) . '</span>' . 
			'</span>';
		}
		
        if ($url != '') { 
            echo '<span class="contact_widget_url cmsmasters_theme_icon_user_website">' . 
				'<a class="url" href="' . esc_url($url) . '">' . esc_html($url) . '</a>' . 
			'</span>';
		}
		
        if ($email != '') { 
            echo '<span class="contact_widget_email cmsmasters_theme_icon_user_mail">' . 
				'<a class="email" href="mailto:' . antispambot($email, 1) . '">' . antispambot($email) . '</a>' . 
			'</span>';
		}
		
		if ($phone != '') { 
            echo '<span class="contact_widget_phone cmsmasters_theme_icon_user_phone">' . 
				'<span class="tel">' . esc_html($phone) . '</span>' . 
			'</span>';
		}
		
        echo $after_widget;
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['name'] = strip_tags($new_instance['name']);
        $instance['url'] = strip_tags($new_instance['url']);
        $instance['email'] = strip_tags($new_instance['email']);
        $instance['phone'] = strip_tags($new_instance['phone']);
        $instance['address'] = strip_tags($new_instance['address']);
        $instance['city'] = strip_tags($new_instance['city']);
        $instance['state'] = strip_tags($new_instance['state']);
        $instance['zip'] = strip_tags($new_instance['zip']);
        $instance['country'] = strip_tags($new_instance['country']);
        $instance['time'] = strip_tags($new_instance['time']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $name = isset($instance['name']) ? esc_attr($instance['name']) : '';
        $url = isset($instance['url']) ? esc_attr($instance['url']) : '';
        $email = isset($instance['email']) ? esc_attr($instance['email']) : '';
        $phone = isset($instance['phone']) ? esc_attr($instance['phone']) : '';
        $address = isset($instance['address']) ? esc_attr($instance['address']) : '';
        $city = isset($instance['city']) ? esc_attr($instance['city']) : '';
        $state = isset($instance['state']) ? esc_attr($instance['state']) : '';
        $zip = isset($instance['zip']) ? esc_attr($instance['zip']) : '';
        $country = isset($instance['country']) ? esc_attr($instance['country']) : '';
        $time = isset($instance['time']) ? esc_attr($instance['time']) : '';
        ?>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('name')); ?>"><?php esc_html_e('Name', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('name')); ?>" name="<?php echo esc_attr($this->get_field_name('name')); ?>" type="text" value="<?php echo esc_attr($name); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('url')); ?>"><?php esc_html_e('Website', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" type="text" value="<?php echo esc_attr($url); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('email')); ?>"><?php esc_html_e('Email', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('email')); ?>" name="<?php echo esc_attr($this->get_field_name('email')); ?>" type="text" value="<?php echo esc_attr($email); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('phone')); ?>"><?php esc_html_e('Phone', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('phone')); ?>" name="<?php echo esc_attr($this->get_field_name('phone')); ?>" type="text" value="<?php echo esc_attr($phone); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" type="text" value="<?php echo esc_attr($address); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('city')); ?>"><?php esc_html_e('City', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('city')); ?>" name="<?php echo esc_attr($this->get_field_name('city')); ?>" type="text" value="<?php echo esc_attr($city); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('state')); ?>"><?php esc_html_e('State', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('state')); ?>" name="<?php echo esc_attr($this->get_field_name('state')); ?>" type="text" value="<?php echo esc_attr($state); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('zip')); ?>"><?php esc_html_e('Zip', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('zip')); ?>" name="<?php echo esc_attr($this->get_field_name('zip')); ?>" type="text" value="<?php echo esc_attr($zip); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('country')); ?>"><?php esc_html_e('Country', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('country')); ?>" name="<?php echo esc_attr($this->get_field_name('country')); ?>" type="text" value="<?php echo esc_attr($country); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('time')); ?>"><?php esc_html_e('Time', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('time')); ?>" name="<?php echo esc_attr($this->get_field_name('time')); ?>" type="text" value="<?php echo esc_attr($time); ?>" />
            </label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Divider Widget Class
 */
class WP_Widget_Custom_Divider extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_divider_entries', 
			'description' => 	esc_html__('Divider for widgets rows', 'mall') 
		);
		
		parent::__construct('custom-divider', esc_attr__('Divider', 'mall'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
        $divider = isset($instance['divider']) ? $instance['divider'] : false;
        $divider_bdr = isset($instance['divider_bdr']) ? $instance['divider_bdr'] : 'solid';
		
		if ($divider) {
			echo '<div class="cmsmasters_widget_divider ' . esc_attr($divider_bdr) . '"></div>';
		} else {
			echo '<div class="cl"></div>';
		}
    }
	
	function update($new_instance, $old_instance) {
		$new_instance = (array) $new_instance;
		
		$instance = array( 
			'divider' => 0 
		);
		
		foreach ($instance as $field => $val) {
			if (isset($new_instance[$field])) {
				$instance[$field] = 1;
			}
		}
		
		$instance['divider_bdr'] = strip_tags($new_instance['divider_bdr']);
		
		return $instance;
	}
	
	function form($instance) {
		$instance = wp_parse_args((array) $instance, array( 
			'divider' => false 
		) );
		$divider_bdr = isset($instance['divider_bdr']) ? esc_attr($instance['divider_bdr']) : 'solid';
        ?>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['divider'], true); ?> id="<?php echo esc_attr($this->get_field_id('divider')); ?>" name="<?php echo esc_attr($this->get_field_name('divider')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('divider')); ?>"><?php esc_html_e('Show Divider Line', 'mall'); ?></label>
		</p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('divider_bdr')); ?>"><?php esc_html_e('Divider Type', 'mall'); ?>:<br />
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id('divider_bdr')); ?>" name="<?php echo esc_attr($this->get_field_name('divider_bdr')); ?>">
					<option value="solid"<?php if ($divider_bdr == 'solid') { echo ' selected="selected"'; } ?>><?php esc_html_e('Solid Line', 'mall'); ?></option>
					<option value="dashed"<?php if ($divider_bdr == 'dashed') { echo ' selected="selected"'; } ?>><?php esc_html_e('Dashed Line', 'mall'); ?></option>
					<option value="dotted"<?php if ($divider_bdr == 'dotted') { echo ' selected="selected"'; } ?>><?php esc_html_e('Dotted Line', 'mall'); ?></option>
					<option value="transparent"<?php if ($divider_bdr == 'transparent') { echo ' selected="selected"'; } ?>><?php esc_html_e('Transparent Line', 'mall'); ?></option>
				</select>
            </label>
        </p>
		<?php
	}
}


/**
 * Embedded Video Widget Class
 */
class WP_Widget_Custom_Video extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_video_entries', 
			'description' => 	esc_attr__('Video from youtube, vimeo or dailymotion', 'mall') 
		);
		
		parent::__construct('custom-video', esc_attr__('Embedded Widget', 'mall'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		global $wp_embed;
		
		$wrap_embed = isset($instance['wrap_embed']) ? $instance['wrap_embed'] : true;
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Embedded Widget', 'mall') : $instance['title'], $instance, $this->id_base);
        $url = isset($instance['url']) ? $instance['url'] : '';
        $width = isset($instance['width']) ? $instance['width'] : '';
        $height = isset($instance['height']) ? $instance['height'] : '';
		
		echo $before_widget;
		
		if ($title) { 
			echo $before_title . esc_html($title) . $after_title;
		}
		
		if ($url != '') {
			if ($wrap_embed) {
				echo '<div class="cmsmasters_video_wrap">';
			}
			
			echo $wp_embed->run_shortcode('[embed' . 
				(($width != '' && $wrap_embed == '') ? ' width="' . esc_attr($width) . '"' : '') . 
				(($height != '' && $wrap_embed == '') ? ' height="' . esc_attr($height) . '"' : '') . 
			']' . esc_url($url) . '[/embed]');
			
			if ($wrap_embed) {
				echo '</div>';
			}
		}
		
        echo $after_widget;
    }
	
	function update($new_instance, $old_instance) {
		$new_instance = (array) $new_instance;
		
		$instance = array( 
			'wrap_embed' => 0 
		);
		
		foreach ($instance as $field => $val) {
			if (isset($new_instance[$field])) {
				$instance[$field] = 1;
			}
		}
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['url'] = strip_tags($new_instance['url']);
        $instance['width'] = strip_tags($new_instance['width']);
        $instance['height'] = strip_tags($new_instance['height']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$url = isset($instance['url']) ? esc_attr($instance['url']) : '';
		$width = isset($instance['width']) ? esc_attr($instance['width']) : '';
		$height = isset($instance['height']) ? esc_attr($instance['height']) : '';
		$instance = wp_parse_args((array) $instance, array( 
			'wrap_embed' => true 
		) );
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('url')); ?>"><?php esc_html_e('Embed URL', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" type="text" value="<?php echo esc_attr($url); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('width')); ?>"><?php esc_html_e('Max Width', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('width')); ?>" name="<?php echo esc_attr($this->get_field_name('width')); ?>" type="text" value="<?php echo esc_attr($width); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('height')); ?>"><?php esc_html_e('Max Height', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('height')); ?>" name="<?php echo esc_attr($this->get_field_name('height')); ?>" type="text" value="<?php echo esc_attr($height); ?>" />
            </label>
        </p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['wrap_embed'], true); ?> id="<?php echo esc_attr($this->get_field_id('wrap_embed')); ?>" name="<?php echo esc_attr($this->get_field_name('wrap_embed')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('wrap_embed')); ?>"><?php esc_html_e('If checked, ignore default video height/max-height and set a 16:9 proportion instead', 'mall'); ?></label>
		</p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Facebook Widget Class
 */
class WP_Widget_Custom_Facebook extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_facebook_entries', 
			'description' => 	esc_attr__('Your Facebook like box', 'mall') 
		);
		
		parent::__construct('custom-facebook', esc_attr__('Facebook', 'mall'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Facebook', 'mall') : $instance['title'], $instance, $this->id_base);
		$url = isset($instance['url']) ? esc_url($instance['url']) : '';
		
		echo $before_widget;
		
		if ($title) { 
			echo $before_title . esc_html($title) . $after_title;
		}
		
		echo '<div id="fb-root"></div>' . 
		'<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4";
			fjs.parentNode.insertBefore(js, fjs);
			}(document, "script", "facebook-jssdk"));
		</script>' . 
		'<div class="fb-page" data-href="' . esc_url($url) . '" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="false"><div class="fb-xfbml-parse-ignore"><blockquote cite="' . esc_url($url) . '"><a href="' . esc_url($url) . '">Facebook</a></blockquote></div></div>' . 
		'<div class="cl"></div>' . 
		$after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['url'] = strip_tags($new_instance['url']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $url = isset($instance['url']) ? esc_attr($instance['url']) : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('url')); ?>"><?php esc_html_e('Facebook Page URL', 'mall'); ?> :<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('url')); ?>" name="<?php echo esc_attr($this->get_field_name('url')); ?>" type="text" value="<?php echo esc_attr($url); ?>" />
            </label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Flickr Widget Class
 */
class WP_Widget_Custom_Flickr extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_flickr_entries', 
			'description' => 	esc_attr__('Your Flickr account latest images', 'mall') 
		);
		
		parent::__construct('custom-flickr', esc_attr__('Flickr', 'mall'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Flickr', 'mall') : $instance['title'], $instance, $this->id_base);
		$user = isset($instance['user']) ? $instance['user'] : '';
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 6;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
		echo $before_widget . 
			'<div id="flickr">';
		
		if ($title) { 
			echo $before_title . esc_html($title) . $after_title;
		}
		
		echo '<div class="wrap">' . 
				'<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=' . $number . '&amp;display=latest&amp;size=s&amp;layout=x&amp;source=user&amp;user=' . $user . '"></script>' . 
			'</div>' . 
			'<div class="cl"></div>' . 
			'<a href="http://www.flickr.com/photos/' . $user . '" class="more_button" target="_blank"><span>' . esc_html__('More flickr images', 'mall') . '</span></a>' . 
			'</div>' . 
		$after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['user'] = strip_tags($new_instance['user']);
        $instance['number'] = absint($new_instance['number']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $user = isset($instance['user']) ? esc_attr($instance['user']) : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 6;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('user')); ?>"><?php esc_html_e('Flickr ID', 'mall'); ?> (<a href="http://www.idgettr.com" target="_blank">idGettr</a>):<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('user')); ?>" name="<?php echo esc_attr($this->get_field_name('user')); ?>" type="text" value="<?php echo esc_attr($user); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e("Enter the number of latest flickr images you'd like to display", 'mall'); ?>:<br /><br />
                <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" />
                <small class="s_red"><?php esc_html_e('default is', 'mall'); ?> 6</small><br />
            </label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * HTML5 Audio Widget Class
 */
class WP_Widget_Custom_HTML5_Audio extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_html5_audio_entries', 
			'description' => 	esc_attr__('Your HTML5 Audio', 'mall') 
		);
		
		$control_ops = array( 
			'width' => 	600 
		);
		
		parent::__construct('custom-html5-audio', esc_attr__('HTML5 Audio', 'mall'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('HTML5 Audio', 'mall') : $instance['title'], $instance, $this->id_base);
        $srcmp3 = isset($instance['srcmp3']) ? $instance['srcmp3'] : '';
        $srcogg = isset($instance['srcogg']) ? $instance['srcogg'] : '';
        $srcwebm = isset($instance['srcwebm']) ? $instance['srcwebm'] : '';
        $preload = isset($instance['preload']) ? $instance['preload'] : 'none';
        $autoplay = isset($instance['autoplay']) ? $instance['autoplay'] : false;
        $loop = isset($instance['loop']) ? $instance['loop'] : false;
		
		echo $before_widget;
		
		if ($title) { 
			echo $before_title . esc_html($title) . $after_title;
		}
		
		$attrs = array( 
			'preload' => esc_attr($preload) 
		);
		
		if ($autoplay) {
			$attrs['autoplay'] = 'on';
		}
		
		if ($loop) {
			$attrs['loop'] = 'on';
		}
		
		if ($srcmp3 != '') {
			$attrs[substr(strrchr($srcmp3, '.'), 1)] = esc_url($srcmp3);
		}
		
		if ($srcogg != '') {
			$attrs[substr(strrchr($srcogg, '.'), 1)] = esc_url($srcogg);
		}
		
		if ($srcwebm != '') {
			$attrs[substr(strrchr($srcwebm, '.'), 1)] = esc_url($srcwebm);
		}
		
		$out = '<div class="cmsmasters_audio">' . 
			wp_audio_shortcode($attrs) . 
		'</div>';
		
		echo $out . 
		$after_widget;
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance = array( 
			'autoplay' 	=> 0, 
			'loop' 		=> 0 
		);
		
		foreach ($instance as $field => $val) {
			if (isset($new_instance[$field])) {
				$instance[$field] = 1;
			}
		}
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['srcmp3'] = strip_tags($new_instance['srcmp3']);
        $instance['srcogg'] = strip_tags($new_instance['srcogg']);
		$instance['srcwebm'] = strip_tags($new_instance['srcwebm']);
		$instance['preload'] = strip_tags($new_instance['preload']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$srcmp3 = isset($instance['srcmp3']) ? esc_attr($instance['srcmp3']) : '';
		$srcogg = isset($instance['srcogg']) ? esc_attr($instance['srcogg']) : '';
		$srcwebm = isset($instance['srcwebm']) ? esc_attr($instance['srcwebm']) : '';
		$preload = isset($instance['preload']) ? esc_attr($instance['preload']) : 'none';
		
		$instance = wp_parse_args((array) $instance, array( 
			'autoplay' 	=> false, 
			'loop' 		=> false 
		) );
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('srcmp3')); ?>"><?php echo esc_html__('Audio', 'mall') . ' .mp3 ' . esc_html__('File Format URL', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('srcmp3')); ?>" name="<?php echo esc_attr($this->get_field_name('srcmp3')); ?>" type="text" value="<?php echo esc_attr($srcmp3); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('srcogg')); ?>"><?php echo esc_html__('Audio', 'mall') . ' .ogg ' . esc_html__('File Format URL', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('srcogg')); ?>" name="<?php echo esc_attr($this->get_field_name('srcogg')); ?>" type="text" value="<?php echo esc_attr($srcogg); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('srcwebm')); ?>"><?php echo esc_html__('Audio', 'mall') . ' .webm ' . esc_html__('File Format URL', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('srcwebm')); ?>" name="<?php echo esc_attr($this->get_field_name('srcwebm')); ?>" type="text" value="<?php echo esc_attr($srcwebm); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('preload')); ?>"><?php esc_html_e('Preload', 'mall'); ?>:<br />
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id('preload')); ?>" name="<?php echo esc_attr($this->get_field_name('preload')); ?>">
					<option value="none"<?php if ($preload == 'none') { echo ' selected="selected"'; } ?>><?php esc_html_e('Not Preload', 'mall'); ?></option>
					<option value="auto"<?php if ($preload == 'auto') { echo ' selected="selected"'; } ?>><?php esc_html_e('Preload Auto', 'mall'); ?></option>
					<option value="metadata"<?php if ($preload == 'metadata') { echo ' selected="selected"'; } ?>><?php esc_html_e('Preload as Metadata', 'mall'); ?></option>
				</select>
            </label>
        </p>
		<p class="l_half">
			<input class="checkbox" type="checkbox" <?php checked($instance['autoplay'], true); ?> id="<?php echo esc_attr($this->get_field_id('autoplay')); ?>" name="<?php echo esc_attr($this->get_field_name('autoplay')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('autoplay')); ?>"><?php esc_html_e('Enable Autoplay', 'mall'); ?></label>
		</p>
		<p class="r_half">
			<input class="checkbox" type="checkbox" <?php checked($instance['loop'], true); ?> id="<?php echo esc_attr($this->get_field_id('loop')); ?>" name="<?php echo esc_attr($this->get_field_name('loop')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('loop')); ?>"><?php esc_html_e('Enable Repeat', 'mall'); ?></label>
		</p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * HTML5 Video Widget Class
 */
class WP_Widget_Custom_HTML5_Video extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_html5_video_entries', 
			'description' => 	esc_attr__('Your HTML5 Video', 'mall') 
		);
		
		$control_ops = array( 
			'width' => 	600 
		);
		
		parent::__construct('custom-html5-video', esc_attr__('HTML5 Video', 'mall'), $widget_ops, $control_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('HTML5 Video', 'mall') : $instance['title'], $instance, $this->id_base);
        $srcmp4 = isset($instance['srcmp4']) ? $instance['srcmp4'] : '';
        $srcogg = isset($instance['srcogg']) ? $instance['srcogg'] : '';
        $srcwebm = isset($instance['srcwebm']) ? $instance['srcwebm'] : '';
        $poster = isset($instance['poster']) ? $instance['poster'] : '';
        $text = (isset($instance['text']) && $instance['text'] != '') ? $instance['text'] : esc_attr__('Your browser does not support the video tag.', 'mall');
        $preload = isset($instance['preload']) ? $instance['preload'] : 'none';
        $loop = isset($instance['loop']) ? $instance['loop'] : false;
        $autoplay = isset($instance['autoplay']) ? $instance['autoplay'] : false;
		
		echo $before_widget;
		
		if ($title) { 
			echo $before_title . esc_html($title) . $after_title;
		}
		
		$out = '<div class="cmsmasters_video_wrap">';
		
		$attrs = array( 
			'preload' => esc_attr($preload) 
		);
		
		if ($poster != '') {
			$attrs['poster'] = esc_url($poster);
		}
		
		if ($autoplay) {
			$attrs['autoplay'] = 'on';
		}
		
		if ($loop) {
			$attrs['loop'] = 'on';
		}
		
		if ($srcmp4 != '') {
			$attrs[substr(strrchr($srcmp4, '.'), 1)] = esc_url($srcmp4);
		}
		
		if ($srcogg != '') {
			$attrs[substr(strrchr($srcogg, '.'), 1)] = esc_url($srcogg);
		}
		
		if ($srcwebm != '') {
			$attrs[substr(strrchr($srcwebm, '.'), 1)] = esc_url($srcwebm);
		}
		
		$out .= '<div class="cmsmasters_video">' . 
				wp_video_shortcode($attrs) . 
			'</div>' . 
		'</div>';
		
		echo $out . 
		$after_widget;
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance = array( 
			'autoplay' 	=> 0, 
			'loop' 		=> 0 
		);
		
		foreach ($instance as $field => $val) {
			if (isset($new_instance[$field])) {
				$instance[$field] = 1;
			}
		}
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['srcmp4'] = strip_tags($new_instance['srcmp4']);
        $instance['srcogg'] = strip_tags($new_instance['srcogg']);
		$instance['srcwebm'] = strip_tags($new_instance['srcwebm']);
		$instance['poster'] = strip_tags($new_instance['poster']);
		$instance['text'] = strip_tags($new_instance['text']);
		$instance['preload'] = strip_tags($new_instance['preload']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$srcmp4 = isset($instance['srcmp4']) ? esc_attr($instance['srcmp4']) : '';
		$srcogg = isset($instance['srcogg']) ? esc_attr($instance['srcogg']) : '';
		$srcwebm = isset($instance['srcwebm']) ? esc_attr($instance['srcwebm']) : '';
		$poster = isset($instance['poster']) ? esc_attr($instance['poster']) : '';
		$text = (isset($instance['text']) && $instance['text'] != '') ? esc_attr($instance['text']) : esc_attr__('Your browser does not support the video tag.', 'mall');
		$preload = isset($instance['preload']) ? esc_attr($instance['preload']) : 'none';
		
		$instance = wp_parse_args((array) $instance, array( 
			'autoplay' 	=> false, 
			'loop' 		=> false 
		) );
        ?>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('srcmp4')); ?>"><?php echo esc_html__('Video', 'mall') . ' .mp4 ' . esc_html__('File Format Source', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('srcmp4')); ?>" name="<?php echo esc_attr($this->get_field_name('srcmp4')); ?>" type="text" value="<?php echo esc_attr($srcmp4); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('srcogg')); ?>"><?php echo esc_html__('Video', 'mall') . ' .ogg ' . esc_html__('File Format Source', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('srcogg')); ?>" name="<?php echo esc_attr($this->get_field_name('srcogg')); ?>" type="text" value="<?php echo esc_attr($srcogg); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('srcwebm')); ?>"><?php echo esc_html__('Video', 'mall') . ' .webm ' . esc_html__('File Format Source', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('srcwebm')); ?>" name="<?php echo esc_attr($this->get_field_name('srcwebm')); ?>" type="text" value="<?php echo esc_attr($srcwebm); ?>" />
            </label>
        </p>
        <p class="l_half">
            <label for="<?php echo esc_attr($this->get_field_id('poster')); ?>"><?php esc_html_e('Poster URL', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('poster')); ?>" name="<?php echo esc_attr($this->get_field_name('poster')); ?>" type="text" value="<?php echo esc_attr($poster); ?>" />
            </label>
        </p>
        <p class="r_half">
            <label for="<?php echo esc_attr($this->get_field_id('preload')); ?>"><?php esc_html_e('Preload', 'mall'); ?>:<br />
				<select class="widefat" id="<?php echo esc_attr($this->get_field_id('preload')); ?>" name="<?php echo esc_attr($this->get_field_name('preload')); ?>">
					<option value="none"<?php if ($preload == 'none') { echo ' selected="selected"'; } ?>><?php esc_html_e('Not Preload', 'mall'); ?></option>
					<option value="auto"<?php if ($preload == 'auto') { echo ' selected="selected"'; } ?>><?php esc_html_e('Preload Auto', 'mall'); ?></option>
					<option value="metadata"<?php if ($preload == 'metadata') { echo ' selected="selected"'; } ?>><?php esc_html_e('Preload as Metadata', 'mall'); ?></option>
				</select>
            </label>
        </p>
        <p class="l_half">
			<input class="checkbox" type="checkbox" <?php checked($instance['autoplay'], true); ?> id="<?php echo esc_attr($this->get_field_id('autoplay')); ?>" name="<?php echo esc_attr($this->get_field_name('autoplay')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('autoplay')); ?>"><?php esc_html_e('Enable Autoplay', 'mall'); ?></label>
        </p>
        <p class="r_half">
			<input class="checkbox" type="checkbox" <?php checked($instance['loop'], true); ?> id="<?php echo esc_attr($this->get_field_id('loop')); ?>" name="<?php echo esc_attr($this->get_field_name('loop')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('loop')); ?>"><?php esc_html_e('Enable Repeat', 'mall'); ?></label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Latest Projects Widget Class
 */
class WP_Widget_Custom_Latest_Projects extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_latest_projects_entries', 
			'description' => 	esc_attr__('Latest projects from your portfolio', 'mall') 
		);
		
		parent::__construct('custom-latest-projects', esc_attr__('Latest Projects', 'mall'), $widget_ops);
	}
	
    function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Latest Projects', 'mall') : $instance['title'], $instance, $this->id_base);
		$type = isset($instance['type']) ? $instance['type'] : '';
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
        $autoplay = isset($instance['autoplay']) ? $instance['autoplay'] : false;
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
        $queryArgs = array( 
			'posts_per_page' => 		$number, 
			'post_status' => 			'publish', 
			'ignore_sticky_posts' => 	1, 
			'post_type' => 				'project' 
		);
		
		if ($type != '') {
            $queryArgs['tax_query'] = array(
                array( 
                    'taxonomy' => 	'pj-categs', 
                    'field' => 		'slug', 
                    'terms' => 		$type 
                )
            );
		}
		
        $lp = new WP_Query($queryArgs);
		
        if ($lp->have_posts()) { 
			echo $before_widget . 
				'<script type="text/javascript">' . 
					'jQuery(document).ready(function () { ' . 
						'jQuery("#' . $args['widget_id'] . ' .owl-carousel"' . ').owlCarousel( { ' . 
							'singleItem : true, ' . 
							'slideSpeed : 800, ' . 
							(($autoplay) ? 'autoPlay : true, ' : '') . 
							'autoHeight : true, ' . 
							'pagination: false, ' . 
							'navigation : true, ' . 
							'navigationText : 	[ ' . 
								'"<span class=\"cmsmasters_prev_arrow\"><span></span></span>", ' . 
								'"<span class=\"cmsmasters_next_arrow\"><span></span></span>" ' . 
							'] ' . 
						'} );' . 
					'} ); ' . 
				'</script>';
			
			if ($title) { 
				echo $before_title . esc_html($title) . $after_title;
			}
			
			echo '<div class="widget_custom_projects_entries_slides owl-carousel">';
			
            while ($lp->have_posts()) : $lp->the_post();
				
				$cmsmasters_project_link_url = get_post_meta(get_the_ID(), 'cmsmasters_project_link_url', true);

				$cmsmasters_project_link_redirect = get_post_meta(get_the_ID(), 'cmsmasters_project_link_redirect', true);
				
				echo '<div class="cmsmasters_slider_project">' . 
					'<div class="cmsmasters_slider_project_outer">';
						
						cmsmasters_thumb_rollover(get_the_ID(), 'project-thumb', false, false, false, false, false, false, false, false, true, $cmsmasters_project_link_redirect, $cmsmasters_project_link_url);
						
						
						echo '<div class="cmsmasters_slider_project_inner">';
							
							cmsmasters_slider_post_heading(get_the_ID(), 'project', 'h4', $cmsmasters_project_link_redirect, $cmsmasters_project_link_url);
							
							
							echo '<div class="cmsmasters_slider_project_cont_info entry-meta">';
								
								cmsmasters_slider_post_category(get_the_ID(), 'pj-categs', 'project');
								
							echo '</div>';
							
							
							cmsmasters_slider_post_exc_cont('project');
							
							
							echo '<footer class="cmsmasters_slider_project_footer entry-meta">';
								
								cmsmasters_slider_post_like('project');
								
								cmsmasters_slider_post_comments('project');
								
							echo '</footer>';
							
						echo '</div>' . 
					'</div>' . 
				'</div>';
				
			endwhile;
			
			echo '</div>' . 
			$after_widget;
        }
		
		wp_reset_postdata();
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['type'] = $new_instance['type'];
        $instance['number'] = absint($new_instance['number']);
		
		$instance['autoplay'] = 0;
		
		if ($new_instance['autoplay']) {
			$instance['autoplay'] = 1;
		}
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $type = isset($instance['type']) ? esc_attr($instance['type']) : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
		$instance = wp_parse_args((array) $instance, array( 
			'autoplay' => false 
		) );
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('type')); ?>"><?php esc_html_e('Show Only from Projects Type', 'mall'); ?>:<br />
                <select id="<?php echo esc_attr($this->get_field_id('type')); ?>" name="<?php echo esc_attr($this->get_field_name('type')); ?>" class="widefat">
                    <option value=""><?php esc_html_e('Show all projects', 'mall'); ?>&nbsp;</option>
				<?php 
					$pj_categs = get_terms('pj-categs', 'orderby=name&hide_empty=0');
					
					if (sizeof($pj_categs) > 0) {
						foreach($pj_categs as $pj_categ) {
							if ($type == $pj_categ->slug) {
								echo '<option value="' . esc_attr($pj_categ->slug) . '" selected="selected">' . esc_html($pj_categ->name) . '&nbsp;</option>';
							} else {
								echo '<option value="' . esc_attr($pj_categ->slug) . '">' . esc_html($pj_categ->name) . '&nbsp;</option>';
							}
						}
					}
				?>
                </select>
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e("Enter the number of latest projects you'd like to display", 'mall'); ?>:<br /><br />
                <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" />
                <small class="s_red"><?php esc_html_e('default is', 'mall'); ?> 3</small><br />
            </label>
        </p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['autoplay'], true); ?> id="<?php echo esc_attr($this->get_field_id('autoplay')); ?>" name="<?php echo esc_attr($this->get_field_name('autoplay')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('autoplay')); ?>"><?php esc_html_e('Autoplay', 'mall'); ?></label>
		</p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Popular Projects Widget Class
 */
class WP_Widget_Custom_Popular_Projects extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_popular_projects_entries', 
			'description' => 	esc_attr__('Popular projects from your portfolio', 'mall') 
		);
		
		parent::__construct('custom-popular-projects', esc_attr__('Popular Projects', 'mall'), $widget_ops);
	}
	
    function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Popular Projects', 'mall') : $instance['title'], $instance, $this->id_base);
		$type = isset($instance['type']) ? $instance['type'] : '';
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
        $autoplay = isset($instance['autoplay']) ? $instance['autoplay'] : false;
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
        $queryArgs = array( 
			'posts_per_page' => 		$number, 
			'post_status' => 			'publish', 
			'ignore_sticky_posts' => 	1, 
			'post_type' => 				'project', 
			'order' => 					'DESC', 
			'orderby' => 				'meta_value', 
			'meta_key' => 				'cmsmasters_likes' 
		);
		
		if ($type != '') {
            $queryArgs['tax_query'] = array(
                array( 
                    'taxonomy' => 	'pj-categs', 
                    'field' => 		'slug', 
                    'terms' => 		array($type) 
                )
            );
		}
		
        $pp = new WP_Query($queryArgs);
		
        if ($pp->have_posts()) { 
			echo $before_widget . 
				'<script type="text/javascript">' . 
					'jQuery(document).ready(function () { ' . 
						'jQuery("#' . $args['widget_id'] . ' .owl-carousel").owlCarousel( { ' . 
							'singleItem : true, ' . 
							'slideSpeed : 800, ' . 
							(($autoplay) ? 'autoPlay : true, ' : '') . 
							'autoHeight : true, ' . 
							'pagination: false, ' . 
							'navigation : true, ' . 
							'navigationText : 	[ ' . 
								'"<span class=\"cmsmasters_prev_arrow\"><span></span></span>", ' . 
								'"<span class=\"cmsmasters_next_arrow\"><span></span></span>" ' . 
							'] ' . 
						'} );' . 
					'} ); ' . 
				'</script>';
			
			if ($title) { 
				echo $before_title . esc_html($title) . $after_title;
			}
			
			echo '<div class="widget_custom_projects_entries_slides owl-carousel">';
			
            while ($pp->have_posts()) : $pp->the_post();
				
				$cmsmasters_project_link_url = get_post_meta(get_the_ID(), 'cmsmasters_project_link_url', true);

				$cmsmasters_project_link_redirect = get_post_meta(get_the_ID(), 'cmsmasters_project_link_redirect', true);
				
				echo '<div class="cmsmasters_slider_project">' . 
					'<div class="cmsmasters_slider_project_outer">';
						
						cmsmasters_thumb_rollover(get_the_ID(), 'project-thumb', false, false, false, false, false, false, false, false, true, $cmsmasters_project_link_redirect, $cmsmasters_project_link_url);
						
						
						echo '<div class="cmsmasters_slider_project_inner">';
							
							cmsmasters_slider_post_heading(get_the_ID(), 'project', 'h4', $cmsmasters_project_link_redirect, $cmsmasters_project_link_url);
							
							
							echo '<div class="cmsmasters_slider_project_cont_info entry-meta">';
								
								cmsmasters_slider_post_category(get_the_ID(), 'pj-categs', 'project');
								
							echo '</div>';
							
							
							cmsmasters_slider_post_exc_cont('project');
							
							
							echo '<footer class="cmsmasters_slider_project_footer entry-meta">';
								
								cmsmasters_slider_post_like('project');
								
								cmsmasters_slider_post_comments('project');
								
							echo '</footer>';
							
						echo '</div>' . 
					'</div>' . 
				'</div>';
				
			endwhile;
			
			echo '</div>' . 
			$after_widget;
        }
		
		wp_reset_postdata();
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['type'] = $new_instance['type'];
        $instance['number'] = absint($new_instance['number']);
		
		$instance['autoplay'] = 0;
		
		if ($new_instance['autoplay']) {
			$instance['autoplay'] = 1;
		}
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $type = isset($instance['type']) ? esc_attr($instance['type']) : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
		$instance = wp_parse_args((array) $instance, array( 
			'autoplay' => false 
		) );
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('type')); ?>"><?php esc_html_e('Show Only from Projects Type', 'mall'); ?>:<br />
                <select id="<?php echo esc_attr($this->get_field_id('type')); ?>" name="<?php echo esc_attr($this->get_field_name('type')); ?>" class="widefat">
                    <option value=""><?php esc_html_e('Show all projects', 'mall'); ?>&nbsp;</option>
				<?php 
					$pj_categs = get_terms('pj-categs', 'orderby=name&hide_empty=0');
					
					if (sizeof($pj_categs) > 0) {
						foreach($pj_categs as $pj_categ) {
							if ($type == $pj_categ->slug) {
								echo '<option value="' . esc_attr($pj_categ->slug) . '" selected="selected">' . esc_html($pj_categ->name) . '&nbsp;</option>';
							} else {
								echo '<option value="' . esc_attr($pj_categ->slug) . '">' . esc_html($pj_categ->name) . '&nbsp;</option>';
							}
						}
					}
				?>
                </select>
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e("Enter the number of popular projects you'd like to display", 'mall'); ?>:<br /><br />
                <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" />
                <small class="s_red"><?php esc_html_e('default is', 'mall'); ?> 3</small><br />
            </label>
        </p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['autoplay'], true); ?> id="<?php echo esc_attr($this->get_field_id('autoplay')); ?>" name="<?php echo esc_attr($this->get_field_name('autoplay')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('autoplay')); ?>"><?php esc_html_e('Autoplay', 'mall'); ?></label>
		</p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Posts Tabs Widget Class
 */
class WP_Widget_Custom_Posts_Tabs extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_posts_tabs_entries', 
			'description' => 	esc_attr__('Latest, popular posts & recent comments', 'mall') 
		);
		
		parent::__construct('custom-posts-tabs', esc_attr__('Posts Tabs', 'mall'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		$latest = isset($instance['latest']) ? $instance['latest'] : true;
		$popular = isset($instance['popular']) ? $instance['popular'] : true;
		$recent = isset($instance['recent']) ? $instance['recent'] : true;
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
		echo $before_widget;
		
		if ($title) { 
			echo $before_title . esc_html($title) . $after_title;
		}
		
		echo '<div class="cmsmasters_tabs tabs_mode_tab lpr">' . 
				'<ul class="cmsmasters_tabs_list">';
		
		if ($latest) {
			echo '<li class="cmsmasters_tabs_list_item current_tab">' . 
				'<a href="#"><span>' . esc_html__('Latest', 'mall') . '</span></a>' . 
			'</li>'; 
		}
		
		if ($popular) {
			echo '<li class="cmsmasters_tabs_list_item' . ((!$latest) ? ' current_tab' : '') . '">' . 
				'<a href="#"><span>' . esc_html__('Popular', 'mall') . '</span></a>' . 
			'</li>'; 
		}
		
		if ($recent) {
			echo '<li class="cmsmasters_tabs_list_item' . ((!$latest && !$popular) ? ' current_tab' : '') . '">' . 
				'<a href="#"><span>' . esc_html__('Comments', 'mall') . '</span></a>' . 
			'</li>'; 
		}
		
		if (!$latest && !$popular && !$recent) {
			echo '<li class="cmsmasters_tabs_list_item">' . 
				'<a href="#"><span>' . esc_html__('Latest', 'mall') . '</span></a>' . 
			'</li>'; 
		}
		
		echo '</ul>' . 
		'<div class="cmsmasters_tabs_wrap">';
		
		$pt_format = get_post_format();
		
		$widget_icon = 'cmsmasters_theme_icon_image';
		
		if ($latest) {
			$l = new WP_Query(array( 
				'posts_per_page' => 		$number, 
				'post_status' => 			'publish', 
				'ignore_sticky_posts' => 	1, 
				'post_type' => 				'post' 
			));
			
			if ($l->have_posts()) { 
				echo '<div class="cmsmasters_tab tab_latest">' . 
					'<ul>';
				
				while ($l->have_posts()) : $l->the_post();
					
					$attachments = get_children(array(
						'post_type' => 			'attachment', 
						'post_mime_type' => 	'image', 
						'post_parent' => 		get_the_ID(), 
						'orderby' => 			'menu_order', 
						'order' => 				'ASC' 
					));
					
					
					echo '<li>';
					
					if ($pt_format == 'image' || $pt_format == 'gallery') {
						echo '<div class="cmsmasters_lpr_tabs_img">';
						
						if (has_post_thumbnail()) {
							cmsmasters_thumb(get_the_ID(), 'small-thumb', true, false, false, false, false, true, false);
						} elseif (!has_post_thumbnail() && sizeof($attachments) > 0) {
							if (isset($att_counter)) {
								unset($att_counter);
							}
							
							foreach ($attachments as $attachment) { 
								if (!isset($att_counter) && $att_counter = true) { 
									cmsmasters_thumb(get_the_ID(), 'small-thumb', true, false, false, false, false, true, $attachment->ID);
								}
							}
						} else {
							echo '<a href="' . esc_url(get_permalink()) . '"' . ' title="' . cmsmasters_title(get_the_ID(), false) . '">' . 
									'<span class="img_placeholder_small ' . $widget_icon . '"></span>' . 
								'</a>';
						}
						
						echo '</div>';
					} else {
						echo '<div class="cmsmasters_lpr_tabs_img">';
						
						if (has_post_thumbnail() && $pt_format != 'video') {
							cmsmasters_thumb(get_the_ID(), 'small-thumb', true, false, false, false, false, true, false);
						} else {
							echo '<a href="' . esc_url(get_permalink()) . '"' . ' title="' . cmsmasters_title(get_the_ID(), false) . '">' . 
									'<span class="img_placeholder_small ' . $widget_icon . '"></span>' . 
								'</a>';
						}
						
						echo '</div>';
					}
					
						echo '<div class="cmsmasters_lpr_tabs_cont">' . 
							'<a href="' . esc_url(get_permalink()) . '" title="' . cmsmasters_title(get_the_ID(), false) . '">' . cmsmasters_title(get_the_ID(), false) . '</a>' . 
							'<abbr class="published" title="' . esc_attr(get_the_date()) . '">' . 
								esc_html(get_the_date()) . 
							'</abbr>' . 
						'</div>' . 
					'</li>';
				endwhile;
				
				echo '</ul>' . 
				'</div>';
			}
			
			wp_reset_postdata();
		}
		
		if ($popular) {
			$p = new WP_Query(array( 
				'posts_per_page' => 		$number, 
				'post_status' => 			'publish', 
				'ignore_sticky_posts' => 	1, 
				'post_type' => 				'post', 
				'order' => 					'DESC', 
				'orderby' => 				'meta_value', 
				'meta_key' => 				'cmsmasters_likes' 
			));
			
			if ($p->have_posts()) { 
				echo '<div class="cmsmasters_tab tab_popular">' . 
					'<ul>';
				
				while ($p->have_posts()) : $p->the_post();
					$pt_format = get_post_format();
					
					$attachments = get_children(array(
						'post_type' => 			'attachment', 
						'post_mime_type' => 	'image', 
						'post_parent' => 		get_the_ID(), 
						'orderby' => 			'menu_order', 
						'order' => 				'ASC' 
					));
					
					echo '<li>';
					
					if ($pt_format == 'image' || $pt_format == 'gallery') {
						echo '<div class="cmsmasters_lpr_tabs_img">';
						
						if (has_post_thumbnail()) {
							cmsmasters_thumb(get_the_ID(), 'small-thumb', true, false, false, false, false, true, false);
						} elseif (!has_post_thumbnail() && sizeof($attachments) > 0) {
							if (isset($att_counter)) {
								unset($att_counter);
							}
							
							foreach ($attachments as $attachment) { 
								if (!isset($att_counter) && $att_counter = true) { 
									cmsmasters_thumb(get_the_ID(), 'small-thumb', true, false, false, false, false, true, $attachment->ID);
								}
							}
						} else {
							echo '<a href="' . esc_url(get_permalink()) . '"' . ' title="' . cmsmasters_title(get_the_ID(), false) . '">' . 
									'<span class="img_placeholder_small ' . $widget_icon . '"></span>' . 
								'</a>';
						}
						
						echo '</div>';
					} else {
						echo '<div class="cmsmasters_lpr_tabs_img">';
						
						if (has_post_thumbnail() && $pt_format != 'video') {
							cmsmasters_thumb(get_the_ID(), 'small-thumb', true, false, false, false, false, true, false);
						} else {
							echo '<a href="' . esc_url(get_permalink()) . '"' . ' title="' . cmsmasters_title(get_the_ID(), false) . '">' . 
									'<span class="img_placeholder_small ' . $widget_icon . '"></span>' . 
								'</a>';
						}
						
						echo '</div>';
					}
					
						echo '<div class="cmsmasters_lpr_tabs_cont">' . 
							'<a href="' . esc_url(get_permalink()) . '" title="' . cmsmasters_title(get_the_ID(), false) . '">' . cmsmasters_title(get_the_ID(), false) . '</a>' . 
							'<abbr class="published" title="' . esc_attr(get_the_date()) . '">' . 
								esc_html(get_the_date()) . 
							'</abbr>' . 
						'</div>' . 
					'</li>';
				endwhile;
				
				echo '</ul>' . 
				'</div>';
			}
			
			wp_reset_postdata();
		}
		
		if ($recent) {
			$rcomments = get_comments(array( 
				'number' => 	$number, 
				'post_type' => 	'post', 
				'status' => 	'approve' 
			));
			
			if ($rcomments) { 
				echo '<div class="cmsmasters_tab tab_comments">' . 
					'<ul>';
				
				foreach ($rcomments as $comment) {
					$comment_post_ID = $comment->comment_post_ID;
					$comment_author = $comment->comment_author;
					$comment_author_url = $comment->comment_author_url;
					$comment_date = mysql2date('U', $comment->comment_date, false);
					$comment_content = $comment->comment_content;
					$comment_array = explode(' ', $comment_content);
					
					if (sizeof($comment_array) > 10) {
						$new_comment_content = '';
						
						for ($i = 0; $i < 10; $i++) {
							$new_comment_content .= $comment_array[$i] . ' ';
						}
						
						$new_comment_content = trim($new_comment_content) . '...';
					} else {
						$new_comment_content = $comment_content;
					}
					
					echo '<li>' . 
						(($comment_author_url != '') ? '<a href="' . esc_url($comment_author_url) . '" title="' . esc_attr($comment_author_url) . '" target="_blank">' : '') . $comment_author . (($comment_author_url != '') ? '</a>' : '') . 
						' <span class="color_2">' . esc_html__('on', 'mall') . '</span> <a href="' . get_permalink($comment_post_ID) . '#comments" rel="bookmark">' . cmsmasters_title($comment_post_ID, false) . '</a>' . 
						'<small>' . 
							'<abbr class="published" title="' . esc_attr(get_the_time('d-m-Y')) . '">' . human_time_diff($comment_date, current_time('timestamp')) . ' ' . esc_html__('ago', 'mall') . '</abbr>' . 
						'</small>' . 
						'<p>' . esc_html($new_comment_content) . '</p>' . 
					'</li>';
				}
				
				echo '</ul>' . 
				'</div>';
			}
		}
		
		echo '</div>' . 
			'</div>' .
		$after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$new_instance = (array) $new_instance;
		
		$instance = array( 
			'latest' => 0, 
			'popular' => 0, 
			'recent' => 0 
		);
		
		foreach ($instance as $field => $val) {
			if (isset($new_instance[$field])) {
				$instance[$field] = 1;
			}
		}
		
		if ($new_instance['latest'] == '' && $instance['popular'] == '' && $instance['recent'] == '') {
			$instance['latest'] = 1;
		}
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['number'] = absint($new_instance['number']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
		$instance = wp_parse_args((array) $instance, array( 
			'latest' => true, 
			'popular' => true, 
			'recent' => true 
		) );
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['latest'], true); ?> id="<?php echo esc_attr($this->get_field_id('latest')); ?>" name="<?php echo esc_attr($this->get_field_name('latest')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('latest')); ?>"><?php esc_html_e('Latest Posts', 'mall'); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['popular'], true); ?> id="<?php echo esc_attr($this->get_field_id('popular')); ?>" name="<?php echo esc_attr($this->get_field_name('popular')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('popular')); ?>"><?php esc_html_e('Popular Posts', 'mall'); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['recent'], true); ?> id="<?php echo esc_attr($this->get_field_id('recent')); ?>" name="<?php echo esc_attr($this->get_field_name('recent')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('recent')); ?>"><?php esc_html_e('Recent Comments', 'mall'); ?></label>
		</p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e("Enter the number of recent comments, popular and latest posts you'd like to display", 'mall'); ?>:<br /><br />
                <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" />
                <small class="s_red"><?php esc_html_e('default is', 'mall'); ?> 3</small><br />
            </label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * Twitter Widget Class
 */
class WP_Widget_Custom_Twitter extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 		'widget_custom_twitter_entries', 
			'description' => 	esc_attr__('Your Twitter account latest tweets', 'mall') 
		);
		
		parent::__construct('custom-twitter', esc_attr__('Twitter', 'mall'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_attr__('Twitter', 'mall') : $instance['title'], $instance, $this->id_base);
		$user = isset($instance['user']) ? $instance['user'] : '';
		$number = isset($instance['number']) ? (int) $instance['number'] : '';
		
		$uid = uniqid();
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 20) {
            $number = 20;
        }
		
		echo $before_widget;
		
		if ($title) { 
			echo $before_title . esc_html($title) . $after_title;
		}
		
		if ($user != '') {
			$tweets = cmsmasters_get_tweets($user, $number);
			
			if ($tweets != '') {
				echo '<ul class="tweet_list">' . "\n";
				
				foreach ($tweets as $t) {
					echo '<li>' . "\n" . 
						'<span class="tweet_time cmsmasters_theme_icon_user_twitter">' . human_time_diff($t['time'], current_time('timestamp')) . ' ' . esc_html__('ago', 'mall') . '</span>' . "\n" . 
						'<span class="tweet_text">' . "\n" . $t['text'] . '</span>' . "\n" . 
					'</li>' . "\n";
				}
			} else {
				echo '<div class="cmsmasters_notice cmsmasters_notice_error cmsmasters_theme_icon_cancel">' . "\n" . 
					'<div class="notice_content">' . "\n" . 
						'<p>' . esc_html__('Please add your Twitter API keys', 'mall') . ', ' . '<a target="_blank" href="http://docs.cmsmasters.net/admin2/twitter-functionality/">' . esc_html__('read more how', 'mall') . '</a></p>' . "\n" . 
					'</div>' . "\n" . 
				'</div>' . "\n";
			}
		}
		
		echo '</ul>' . "\n" . 
		$after_widget;
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
        $instance['user'] = strip_tags($new_instance['user']);
        $instance['number'] = absint($new_instance['number']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        $user = isset($instance['user']) ? esc_attr($instance['user']) : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('user')); ?>"><?php esc_html_e('Twitter Username', 'mall'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('user')); ?>" name="<?php echo esc_attr($this->get_field_name('user')); ?>" type="text" value="<?php echo esc_attr($user); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e("Enter the number of latest tweets you'd like to display", 'mall'); ?>:<br /><br />
                <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr($number); ?>" size="3" />
                <small class="s_red"><?php esc_html_e('default is', 'mall'); ?> 3</small><br />
            </label>
        </p>
        <div class="cl"></div>
        <?php
    }
}


/**
 * PayPal Donations Widget Class
 */
class WP_Widget_Custom_PayPalDonations extends WP_Widget {
	public function __construct() {
		$widget_ops = array(
			'classname' => 'widget_custom_paypal_donations',
			'description' => esc_attr__(
				'PayPal Donation Button',
				'mall'
			)
		);
		parent::__construct('paypal_donations', 'PayPal Donations', $widget_ops);
	}
	
	public function widget($args, $instance) {
		extract($args);
		
		$paypal_donations = PayPalDonations::getInstance();
		
		$title = 		apply_filters('widget_title', $instance['title']);
		$text = 		esc_html($instance['text']);
		$purpose = 		$instance['purpose'];
		$reference = 	$instance['reference'];
		$amount = 		$instance['amount'];
		$button_text = 	esc_html($instance['button_text']);

		echo $before_widget . 
			'<div class="cmsmasters_paypal_donations_widget">' . "\n";
				if ($title) {
					echo $before_title . esc_html($title) . $after_title . "\n";
				}
				
				
				if ($text) {
					echo wpautop($text) . "\n";
				}
				
				echo '<div class="cmsmasters_paypal_donations">' . "\n" . 
					$paypal_donations->generateHtml($purpose, $reference, $amount) . "\n" . 
					'<span class="button">' . ($button_text ? esc_html($button_text) : esc_html__('Donate', 'mall')) . '</span>' . "\n" . 
				'</div>' . "\n" . 
			'</div>' . "\n" . 
		$after_widget;
    }
	
	public function update($new_instance, $old_instance) {
		$instance = $old_instance;

		$instance['title'] = 		strip_tags(stripslashes($new_instance['title']));
		$instance['text'] = 		$new_instance['text'];
		$instance['purpose'] = 		strip_tags(stripslashes($new_instance['purpose']));
		$instance['reference'] = 	strip_tags(stripslashes($new_instance['reference']));
		$instance['amount'] = 		strip_tags(stripslashes($new_instance['amount']));
		$instance['button_text'] = 	strip_tags(stripslashes($new_instance['button_text']));

		return $instance;
	}
	
    public function form($instance) {
		$defaults = array(
			'title' => 			esc_attr__('Donate', 'mall'),
			'text' => 			'',
			'purpose' => 		'',
			'reference' => 		'',
			'amount' => 		'',
			'button_text' => 	''
		);
		
		$instance = wp_parse_args((array) $instance, $defaults);

		$data = array(
			'instance' => 			$instance,
			'title_id' => 			$this->get_field_id('title'),
			'title_name' => 		$this->get_field_name('title'),
			'text_id' => 			$this->get_field_id('text'),
			'text_name' => 			$this->get_field_name('text'),
			'purpose_id' => 		$this->get_field_id('purpose'),
			'purpose_name' => 		$this->get_field_name('purpose'),
			'reference_id' => 		$this->get_field_id('reference'),
			'reference_name' => 	$this->get_field_name('reference'),
			'amount_id' => 			$this->get_field_id('amount'),
			'amount_name' => 		$this->get_field_name('amount'),
			'button_text_id' => 	$this->get_field_id('button_text'),
			'button_text_name' => 	$this->get_field_name('button_text')
		);
		
		($data) ? extract($data) : null;
		?>
		<p>
			<label for="<?php echo esc_attr($title_id); ?>"><?php esc_html_e('Title:', 'mall'); ?> 
			<input class="widefat" id="<?php echo esc_attr($title_id); ?>" name="<?php echo esc_attr($title_name); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr($text_id); ?>"><?php esc_html_e('Text:', 'mall'); ?> 
			<textarea class="widefat" id="<?php echo esc_attr($text_id); ?>" name="<?php echo esc_attr($text_name); ?>"><?php echo esc_attr($instance['text']); ?></textarea>
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr($purpose_id); ?>"><?php esc_html_e('Purpose:', 'mall'); ?> 
			<input class="widefat" id="<?php echo esc_attr($purpose_id); ?>" name="<?php echo esc_attr($purpose_name); ?>" type="text" value="<?php echo esc_attr($instance['purpose']); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr($reference_id); ?>"><?php esc_html_e('Reference:', 'mall'); ?> 
			<input class="widefat" id="<?php echo esc_attr($reference_id); ?>" name="<?php echo esc_attr($reference_name); ?>" type="text" value="<?php echo esc_attr($instance['reference']); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr($amount_id); ?>"><?php esc_html_e('Amount:', 'mall'); ?> 
			<input class="widefat" id="<?php echo esc_attr($amount_id); ?>" name="<?php echo esc_attr($amount_name); ?>" type="text" value="<?php echo esc_attr($instance['amount']); ?>" />
			</label>
		</p>
		<p>
			<label for="<?php echo esc_attr($button_text_id); ?>"><?php esc_html_e('Button Text:', 'mall'); ?> 
			<input class="widefat" id="<?php echo esc_attr($button_text_id); ?>" name="<?php echo esc_attr($button_text_name); ?>" type="text" value="<?php echo esc_attr($instance['button_text']); ?>" />
			</label>
		</p>
		<?php 
	}
}



function wp_custom_widgets_init() {
	if (!is_blog_installed()) {
		return;
	}
	
	
	register_widget('WP_Widget_Custom_Advertisement');
	
	register_widget('WP_Widget_Custom_Contact_Info');
	
	register_widget('WP_Widget_Custom_Divider');
	
	register_widget('WP_Widget_Custom_Video');
	
	register_widget('WP_Widget_Custom_Facebook');
	
	register_widget('WP_Widget_Custom_Flickr');
	
	register_widget('WP_Widget_Custom_HTML5_Audio');
	
	register_widget('WP_Widget_Custom_HTML5_Video');
	
	register_widget('WP_Widget_Custom_Posts_Tabs');
	
	register_widget('WP_Widget_Custom_Twitter');
	
	
	if (CMSMASTERS_PAYPALDONATIONS) {
		register_widget('WP_Widget_Custom_PayPalDonations');
	}
}

add_action('widgets_init', 'wp_custom_widgets_init', 1);

