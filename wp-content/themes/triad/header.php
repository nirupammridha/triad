<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	
<title>Triad</title>
<link rel="icon" type="image/x-icon" href="favicon.png">

<?php wp_head(); ?>
</head>
<body>
	
 <button onclick="topFunction()" id="myBtn" title="Go to top" ><i class="icon-arrow-up"></i></button> 

<header id="myHeader">
<div class="container">
<div class="row">
<div class="col-lg-3 col-5 position-relative">
<div class="logo">
	<?php if ( get_theme_mod( 'custom_logo' )){ $logo = wp_get_attachment_image_src(get_theme_mod( 'custom_logo'), 'full'); ?>
	<a href="<?php echo get_site_url(); ?>"><img src="<?php echo esc_url($logo[0]); ?>" alt="" class="img-size"></a>
	<?php } ?>
</div>
</div>
<div class="col-lg-9 col-7">
	
	<div class="moboverlay"></div>
	<div class="menu" id="myDIV">
	<div class="moblogo">
		<?php if ( get_theme_mod( 'custom_logo' )){ $logo = wp_get_attachment_image_src(get_theme_mod( 'custom_logo'), 'full'); ?>
		<img src="<?php echo esc_url($logo[0]); ?>" alt="">
		<?php } ?>
	</div>	
	<ul>
	<?php $menuitems = wp_get_nav_menu_items('header-menu'); 
	$count = 0;
    $submenu = false;
	foreach ($menuitems as $item) {
		// set up title and url
        $title = $item->title;
        $link = $item->url;

        // item does not have a parent so menu_item_parent equals 0 (false)
        if ( !$item->menu_item_parent ){
        // save this id for later comparison with sub-menu items
        $parent_id = $item->ID;
        $child_count = nav_count_children($parent_id);

		?>
		<li>
			<a <?php if($child_count > 0){?>class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"<?php }?> href="<?php echo $link; ?>"><?php echo $title; ?></a>
		
		<?php } ?>

		
		
		<?php if ( $parent_id == $item->menu_item_parent ){ ?>		
			<?php if ( !$submenu ){ $submenu = true; ?>	
			<ul class="dropdown-menu dmenu">
			<?php } ?>
	              <li><a class="dropdown-item" href="<?php echo $link; ?>"><?php echo $title; ?></a></li>
	    	<?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id && $submenu ){ ?>
	        </ul>
			<?php $submenu = false; } ?>
		<?php if ( $menuitems[ $count + 1 ]->menu_item_parent != $parent_id ){ ?>
		</li>
	    <?php }
	    } ?>

	<?php $count++; } 

	function nav_count_children($parent_id){
	    global $wpdb;
	    $query = "SELECT COUNT(*) FROM $wpdb->postmeta 
	            WHERE meta_key='_menu_item_menu_item_parent' 
	            AND meta_value=$parent_id";
	    $count_children = $wpdb->get_var( $query );
	    return $count_children;
	}
	?>
	</ul>
	
	</div>
	<div class="loginblock">
	<span class="mobmenu" onclick="myFunction2()"><i class="icon-menu"></i></span>	
	</div>
</div>
</div>
<div class="clr"></div>
</div>
</header>