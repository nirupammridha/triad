<?php

if(!function_exists('add_theme_menu_item')) {
	require_once( ABSPATH . 'wp-admin/includes/file.php' );
   function add_theme_menu_item() {
       add_menu_page("Theme Panel", "Theme Panel", "manage_options", "theme-panel", "theme_settings_page", null, 99);
   }
}

function theme_settings_page()
{
    ?>
	    <div class="wrap">
	    <h1>Theme Panel</h1>
	    <form method="post" action="options.php" enctype="multipart/form-data">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}

function display_linkedIn_element()
{
	?>
    	<input type="text" name="linkedIn_url" id="linkedIn_url" value="<?php echo get_option('linkedIn_url'); ?>" />
    <?php
}

function display_facebook_element()
{
	?>
    	<input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
    <?php
}

function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");
	
	add_settings_field("linkedIn_url", "LinkedIn Profile Url", "display_linkedIn_element", "theme-options", "section");
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme-options", "section");
    add_settings_field("logo", "Site Logo", "logo_display", "theme-options", "section");
    add_settings_field("expert_logo", "Shopify expert Logo", "expert_logo_display", "theme-options", "section");

    register_setting("section", "linkedIn_url");
    register_setting("section", "facebook_url");
    register_setting("section", "logo", "handle_logo_upload");
    register_setting("section", "expert_logo", "handle_expert_logo_upload");
}

add_action("admin_init", "display_theme_panel_fields");

function logo_display()
{
	?>
        <input type="file" name="logo" /> 
        <?php echo get_option('logo'); ?>
   <?php
}
function expert_logo_display()
{
	?>       
        <input type="file" name="expert_logo" /> 
        <?php echo get_option('expert_logo'); ?>
   <?php
}

function handle_logo_upload()
{	
	if(!empty($_FILES["logo"]["tmp_name"]))
	{ 
		$urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
	    $temp = $urls["url"];
	    return $temp;   
	}
	  
	return false;
}

function handle_expert_logo_upload()
{
	if(!empty($_FILES["expert_logo"]["tmp_name"]))
	{
		$urls = wp_handle_upload($_FILES["expert_logo"], array('test_form' => FALSE));
	    $temp = $urls["url"];
	    return $temp;   
	}
	  
	return false;
}




