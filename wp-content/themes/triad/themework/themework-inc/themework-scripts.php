<?php

if(!function_exists('themework_load_scripts')) {
	function themework_load_scripts() {
		wp_enqueue_script('jquery');						
		wp_enqueue_script('bootstrap-bundle-min-js', THEME_URL . '/assets/js/bootstrap.bundle.min.js', '', array(), false, true);	
		wp_enqueue_script('javascript-js', THEME_URL . '/assets/js/javascript.js', '', array(), false, true);
		
		wp_localize_script('theme-js', 'Front', [
				'ajaxURl' => admin_url('admin-ajax.php')
			]);


		wp_enqueue_style('bootstrap-min', THEME_URL . '/assets/css/bootstrap.min.css');
		wp_enqueue_style('icon', THEME_URL . '/assets/css/icon.css');
		wp_enqueue_style('app-css', THEME_URL . '/assets/css/app.css');
	
	}
}