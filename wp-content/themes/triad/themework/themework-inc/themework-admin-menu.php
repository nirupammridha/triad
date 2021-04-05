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
function display_twitter_element()
{
	?>
    	<input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
    <?php
}
function display_youtube_element()
{
	?>
    	<input type="text" name="youtube_url" id="youtube_url" value="<?php echo get_option('youtube_url'); ?>" />
    <?php
}
function display_email_element()
{
	?>
    	<input type="text" name="email_url" id="email_url" value="<?php echo get_option('email_url'); ?>" />
    <?php
}
function display_phone_element()
{
	?>
    	<input type="text" name="phone_url" id="phone_url" value="<?php echo get_option('phone_url'); ?>" />
    <?php
}

function display_theme_panel_fields()
{
	add_settings_section("section", "All Settings", null, "theme-options");
	
	add_settings_field("linkedIn_url", "LinkedIn Profile Url", "display_linkedIn_element", "theme-options", "section");
    add_settings_field("facebook_url", "Facebook Profile Url", "display_facebook_element", "theme-options", "section");
    add_settings_field("twitter_url", "Twitter Profile Url", "display_twitter_element", "theme-options", "section");
    add_settings_field("youtube_url", "youtube Profile Url", "display_youtube_element", "theme-options", "section");
    add_settings_field("email_url", "Site Email", "display_email_element", "theme-options", "section");
    add_settings_field("phone_url", "Site phone", "display_phone_element", "theme-options", "section");

    register_setting("section", "linkedIn_url");
    register_setting("section", "facebook_url");
    register_setting("section", "twitter_url");
    register_setting("section", "youtube_url");
    register_setting("section", "email_url");
    register_setting("section", "phone_url");
}

add_action("admin_init", "display_theme_panel_fields");


/**
* Menu for commission setting
*/

if(!function_exists('current_openings')) {
   function current_openings() {

       add_submenu_page('options-general.php', 'Current Openings', 'Current Openings', 'manage_options', 'triad_current_opening_posts', 'triad_current_opening_func');
   }
}


if (!function_exists('triad_current_opening_func')) {

   function triad_current_opening_func() {
    global $wpdb;
      if(isset($_POST['triad_job_post_btn'])) {

           $job_id = $_POST['job_id'];
           $title = $_POST['title'];
           $location = $_POST['location'];
           $short_description = $_POST['short_description'];
           $long_description = $_POST['long_description'];
           $dataArr = [
            'title' => $title,
            'location' => $location,
            'short_description' => $short_description,
            'long_description' => $long_description,
            'created_at' => gmdate('Y-m-d H:i:s'),
                
            ];

           if(empty($job_id)){
           $wpdb->insert(CURRENT_OPENING_TBL, $dataArr);
           }
           else{
            $whereArr = [
                'id' => $job_id                    
                ];
            $wpdb->update( 
                    CURRENT_OPENING_TBL, 
                    $dataArr, 
                    $whereArr
                );
           }
           $msg = '<div class="updated"><strong>Successfully Posted.</strong></div>';
           set_transient('job_post_msg', $msg, 30);
           wp_redirect(admin_url().'options-general.php?page=triad_current_opening_posts');
           exit;

       }
       if(isset($_POST['triad_job_edit_btn'])) {
            $job_id = $_POST['job_id'];
            $q = 'SELECT * FROM '.CURRENT_OPENING_TBL.' WHERE id = '.$job_id;
            $data = $wpdb->get_results($q);
            //echo "<pre>";print_r($data[0]->title);exit();
       }

    ?>
      <div class="wrap">
        <h2>Job post</h2>
        <?php $job_post_msg = get_transient('job_post_msg');?>
        <?php if(!empty($job_post_msg)): ?>
        <?php echo $job_post_msg; delete_transient('job_post_msg');?>   
        <?php endif; ?> 
        <form method="POST" action="">
               <table class="widefat">
                 <input type="hidden" name="job_id" value="<?php echo $data[0]->id ?? '';?>">
                 <tr><td>Title</td><td><input type="text" name="title" value="<?php echo $data[0]->title ?? '';?>"></td></tr>
                 <tr><td>Location</td><td><input type="text" name="location" value="<?php echo $data[0]->location ?? '';?>"></td></tr>
                 <tr><td>Short Description</td><td><textarea name="short_description" cols="100" rows="5"><?php echo $data[0]->short_description ?? '';?></textarea></td></tr>
                 <tr><td>Long Description</td><td><textarea name="long_description" cols="100" rows="10"><?php echo $data[0]->long_description ?? '';?></textarea></td></tr>
                 <tr>
                   <td>&nbsp;</td>
                   <td><input type="submit" class="button-primary" name="triad_job_post_btn" value="Save"></td>
                </tr>
               </table>
        </form>
      </div>
      <div class="wrap">
          <table class="widefat fixed" cellspacing="0">
          <thead>
          <tr>
            <th>Sl No.</th><th>Title</th><th>Location</th><th>Short Description</th><th>Action</th>
          </tr>
          </thead>
          <?php 
            $query = 'SELECT * FROM '.CURRENT_OPENING_TBL;
            $getData = $wpdb->get_results($query);            
            //echo "<pre>";print_r($value->title);exit();
          ?>
          <tbody>
        <?php $i=1; foreach ($getData as $key => $value) {?>
          <tr class="alternate">
            <td><?=$i;?></td>
            <td><?=$value->title;?></td>
            <td><?=$value->location;?></td>
            <td><?=$value->short_description;?></td>
            <td>
                <form method="POST">
                    <input type="hidden" name="job_id" value="<?=$value->id;?>">
                    <input type="submit" class="button-primary" name="triad_job_edit_btn" value="Edit">
                </form>
            </td>
          </tr>
        <?php $i++; }?>
          </tbody>
        </table>
      </div>
  <?php }

}