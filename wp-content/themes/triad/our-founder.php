<?php
/**
 * Template Name: Our founder
 * 
 */
get_header();
global $post;
$page_banner = get_field('page_banner',$post->ID);
?>

<section class="other-banner">
<?php if(!empty($page_banner)){?>
<img src="<?php echo $page_banner;?>" alt="" class="img-fluid" >
<?php } ?>
<div class="container relative-block">
<div class="block-content-other">	
<h2 class="font-size24 text-white">About Us</h2>
</div>	
	</div>	
</section>

<section class="bg-off">
	<div class="container">
	<div class="row">
	
	<div class="col-lg-12">
		<ul class="aboutlist">
		<li><a href="<?php echo site_url();?>/company-profile">Company Profile</a></li>
		<li class="active"><a href="<?php echo site_url();?>/our-founder">Our Founder</a></li>
		<li><a href="<?php echo site_url();?>/vision-mission">Vision & Mission</a></li>
		<li><a href="<?php echo site_url();?>/certificates-awards">Certificates & Awards</a></li>
		</ul>
		</div>
		<div class="clr height5"></div>
		
<div class="col-lg-4">
<div class="aboutimg">
<?php if(has_post_thumbnail()) { 
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full');
?>
<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>"  class="img-size" >
<?php } ?>
</div>
</div>
<div class="col-lg-8">
<div class="blockcontent"> 
<h2><?php the_title();?></h2>
<?php the_content();?>

</div>
</div>
	</div>
		<div class="clr height20"></div>
	</div>	
</section>



<?php
get_footer();
?>