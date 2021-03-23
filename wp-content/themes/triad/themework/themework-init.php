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
	}

	public static function themeworkConst(){
		
	}

	public static function themeworkAction(){
		add_action('init','themework_core');
		add_action("admin_menu", "add_theme_menu_item");
		add_action('wp_enqueue_scripts', 'themework_load_scripts');
	}

	public static function themeworkFilter(){
	}
}