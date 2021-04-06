<?php
if (!function_exists('themework_admin_scripts')) {
	function themework_admin_scripts() {
	wp_enqueue_script('admin-js', THEME_URL . '/assets/js/admin.js', '', array(), false, true);
	
    wp_localize_script('admin-js', 'Admin', [
            'ajaxURl' => admin_url('admin-ajax.php')
        ]);
	}
}

if(!function_exists('themework_load_scripts')) {
	function themework_load_scripts() {
		wp_enqueue_script('javascript-js', THEME_URL . '/assets/js/javascript.js', array(), false, true);
		//wp_enqueue_script('jquery');	

		wp_enqueue_script('jquery-js', THEME_URL . '/assets/js/jquery-1.11.3.min.js', '', array(), false, true);	
		wp_enqueue_script('bootstrap-bundle-min-js', THEME_URL . '/assets/js/bootstrap.bundle.min.js', '', array(), false, true);	
		wp_enqueue_script('notify-js', THEME_URL . '/assets/js/bootstrap-notify.js', '', array(), false, true);
		wp_enqueue_script('owl.carousel-js', THEME_URL . '/assets/js/owl.carousel.min.js', '', array(), false, true);
		wp_enqueue_script('spine-js', THEME_URL . '/assets/js/spin.min.js', '', array(), false, true);
		wp_enqueue_script('ladda-js', THEME_URL . '/assets/js/ladda.min.js', '', array(), false, true);
		wp_enqueue_script('theme-js', THEME_URL . '/assets/js/theme.js', '', array(), false, true);
		
		wp_localize_script('theme-js', 'Front', [
				'ajaxURl' => admin_url('admin-ajax.php')
			]);		
	
		wp_enqueue_style('bootstrap-min', THEME_URL . '/assets/css/bootstrap.min.css');
		wp_enqueue_style('icon', THEME_URL . '/assets/css/icon.css');
		wp_enqueue_style('app-css', THEME_URL . '/assets/css/app.css');
		wp_enqueue_style('owl.carousel-css', THEME_URL . '/assets/css/owl.carousel.min.css');
	}
}