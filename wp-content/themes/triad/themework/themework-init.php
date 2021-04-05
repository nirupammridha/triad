<?php

/**
* 
*/
class ThemeworkInit
{
	
	function __construct()
	{
		
	}

	public static function init(){
		self::includes();
		self::themeworkConst();
		self::themeworkAction();
		self::themeworkFilter();
	}

	public static function includes(){
		include_once(THEMEWORK_PATH . 'themework-inc'.DIRECTORY_SEPARATOR.'themework-admin-menu.php');
		include_once(THEMEWORK_PATH . 'themework-inc'.DIRECTORY_SEPARATOR.'themework-core.php');
		include_once(THEMEWORK_PATH . 'themework-inc'.DIRECTORY_SEPARATOR.'themework-scripts.php');
		include_once(THEMEWORK_PATH . 'themework-inc'.DIRECTORY_SEPARATOR.'themework-ajax.php');
		include_once(THEMEWORK_PATH . 'themework-lib'.DIRECTORY_SEPARATOR.'themework-general-class.php');
	}

	public static function themeworkConst(){
		global $wpdb;

		if(!defined('APPLICATION_TBL')) {
			define('APPLICATION_TBL', $wpdb->prefix.'online_applications');
		}
		
		if(!defined('CURRENT_OPENING_TBL')) {
			define('CURRENT_OPENING_TBL', $wpdb->prefix.'current_openings');
		}
		if(!defined('CAREER')) {
		   define('CAREER', site_url().'/online-application');
		}
		
	}

	public static function themeworkAction(){
		add_action('init','themework_core');
		add_action("admin_menu", "add_theme_menu_item");
		add_action('admin_menu', 'current_openings');
		add_action('wp_enqueue_scripts', 'themework_load_scripts');
		add_action('admin_enqueue_scripts', 'themework_admin_scripts');

		/*
		* add action for online application.
		*/
		add_action('wp_ajax_online_application', 'online_application_ajax');
		add_action('wp_ajax_nopriv_online_application', 'online_application_ajax');
	}

	public static function themeworkFilter(){
	}
}