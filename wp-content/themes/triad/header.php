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
	<li><a href="<?php echo get_site_url(); ?>">Home</a></li>	
	<li><a href="" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">About Us</a>
		<ul class="dropdown-menu dmenu">
              <li><a class="dropdown-item" href="#">Company Profile</a></li>
              <li><a class="dropdown-item" href="#">Our Founder</a></li>
              <li><a class="dropdown-item" href="#">Vision & Mission</a></li>
              <li><a class="dropdown-item" href="#">Certificates & Awards</a></li>
        </ul>
	</li>	
	<li><a href="" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Products</a>
		<ul class="dropdown-menu dmenu">
              <li><a class="dropdown-item" href="#">Municipal Castings</a></li>
              <li><a class="dropdown-item" href="#">Pipe Fittings</a></li>
              <li><a class="dropdown-item" href="#">Automotive Castings</a></li>
              <li><a class="dropdown-item" href="#">Agricultural Castings</a></li>
              <li><a class="dropdown-item" href="#">Railway Castings</a></li>
              <li><a class="dropdown-item" href="#">Electrical Castings</a></li>
              <li><a class="dropdown-item" href="#">Counterweights</a></li>
              <li><a class="dropdown-item" href="#">Screw Piles</a></li>
        </ul>
	</li>	
	<li><a href="">Facilities</a></li>
	<li><a href="">Sustainability</a></li>
	<li><a href="">Media</a></li>
	<li><a href="" class="dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Careers</a>
		<ul class="dropdown-menu dmenu">
              <li><a class="dropdown-item" href="#">Current Openings</a></li>
              <li><a class="dropdown-item" href="#">Online Application</a></li>
        </ul>
	</li>	
		
	<li><a href="">contact</a></li>
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