<?php
/**
 * Template Name: Contact Page
 * 
 */
get_header(); 
?>

<section class="other-banner">
<?php if(has_post_thumbnail()) { 
     $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full');
    ?>
<img src="<?php echo esc_url( $image[0] ); ?>" alt="" class="img-fluid" >
<?php } ?>
<div class="container relative-block">
<div class="block-content-other">	
<h2 class="font-size24 text-white">Contact Us</h2>
</div>	
</div>	
</section>

<section>
<div class="inner-banner-area">

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1841.853700283184!2d88.35877276067589!3d22.590044372428263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0277cbb2f9dd87%3A0xe0f8bfd98f9a54d7!2sSuper+Iron+Foundry!5e0!3m2!1sen!2sin!4v1468389465214" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
</section>

<section class="bg-off">
<div class="container">
<div class="row">
<div class="clr height10"></div>
<div class="col-lg-6">
	<?=the_content();?>
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