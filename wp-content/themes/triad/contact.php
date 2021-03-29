<?php
/**
 * Template Name: Contact Page
 * 
 */
get_header(); 
?>

<section class="other-banner">
<img src="http://localhost/triad/wp-content/uploads/2021/03/other-banner.jpg" alt="" class="img-fluid" >
<div class="container relative-block">
<div class="block-content-other">	
<h2 class="font-size24 text-white">Contact Us</h2>
</div>	
</div>	
</section>

<section class="bg-off">
<div class="container">
<div class="row">
<div class="clr height10"></div>
<div class="col-lg-6">
</div>
<div class="col-lg-6">
<h3 class="text-theme text-uppercase">Leave Message</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor veniam earum quia culpa.</p>
<div class="height10 clr"></div>
<div class="contact_from">
<?php echo do_shortcode('[contact-form-7 id="126" title="Contact"]');?>
</div>
 </div>
		
</div>
	<div class="height20 clr"></div>
</div>
</section>

<?php
get_footer();