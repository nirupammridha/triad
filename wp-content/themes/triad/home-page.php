<?php
/* Template Name:Home Temp */
if (!defined('ABSPATH')) exit;
get_header(); 
global $post;
$banner_image = get_field('banner_image',$post->ID);
$welcome_part = get_field('welcome_part',$post->ID);
$image_1 = get_field('image_1',$post->ID);
/*Get banners*/
$_bannerArgs = [
'post_type' => 'banner',
'orderby' => 'ID',
'order' => 'desc',
];

$banners = new WP_Query($_bannerArgs);
/*Get services*/
$_serviceArgs = [
'post_type' => 'service',
'orderby' => 'ID',
'order' => 'asc',
];

$services = new WP_Query($_serviceArgs);
/*Get sustainability*/
$_sustainabilityArgs = [
'post_type' => 'sustainability',
'orderby' => 'ID',
'order' => 'asc',
];

$sustainabilities = new WP_Query($_sustainabilityArgs);
/*Get product*/
$_productArgs = [
'post_type' => 'product',
'orderby' => 'ID',
'order' => 'asc',
];

$products = new WP_Query($_productArgs);

?>
<section class="container-fluid">
	<div class="row">
<div class="col-lg-2 pad0 slider-design">
	<div class="slider-design-content">
	<h1 class="htext">Established	
QUALITY Standard</h1>
		<div class="clr height5"></div>
		<div><strong><i class="icon-mail"></i> abcd@gmail.com</strong></div>
		<div><strong><i class="icon-phone"></i> 98000 00000</strong></div>
		<div class="clr height20"></div>
	<div class="social-block">
	<a href="" target="_blank" title="Facebook" class="facebook"><i class="icon-facebook"></i></a>
	<a href="" target="_blank" title="Twitter" class="twitter"><i class="icon-twitter"></i></a>
	<a href="" target="_blank" title="Linkedin" class="linkedin"><i class="icon-linkedin"></i></a>
	<a href="" target="_blank" title="Youtube" class="youtube"><i class="icon-youtube"></i></a>
	</div>	
	</div>
<?php if(!empty($banner_image)){?>
 <img src="<?php echo $banner_image; ?>" class="sliderstyle-size" alt="">
 <?php } ?>
</div>
<div class="col-lg-10 col-12 pad0">
<div id="carouselExampleIndicators" class="carousel slide fadecarousel" data-bs-ride="carousel">
  <div class="carousel-indicators">
  	<?php $r=0;  while ($banners->have_posts()) : $banners->the_post(); ?>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?=$r;?>" <?php if($r==1){echo 'class="active"';}?> aria-current="true" aria-label="Slide <?=$r+1;?>"></button>
    <?php $r++; endwhile; wp_reset_query();?>
  </div>
  <div class="carousel-inner carousel-fade">
  	<?php $r=1;  while ($banners->have_posts()) : $banners->the_post(); ?>
    <div class="carousel-item <?php if($r==1){echo 'active';}?>">
		<div class="slider-size">
      <img src="<?php the_post_thumbnail( 'full' ); ?>" class="slider-size" alt="">
		</div>
    </div>
    <?php $r++; endwhile; wp_reset_query();?>
    
  </div>
</div>
</div>
</div>		
</section>	

<section class="bg-off">
	<div class="height20 clr"></div>
	<div class="container">
		<div class="row">
		<div class="col-lg-4">
			<div class="aboutimg">
				<?php if(!empty($image_1)){?>
				<img src="<?=$image_1;?>" alt=""  class="img-size" >
				<?php } ?>
			</div>
		</div>
<div class="col-lg-8">
<div class="blockcontent"> 
<?=$welcome_part; ?>

</div>
</div>
</div>
</div>
<div class="clr height20"></div>
</section>
<section class="fixed_img sec-bg1">
<div class="fixed-overlay"></div>
<div class="container block-paralax">

<h2 class="section-title white">Facilities</h2>
<div class="clr"></div>
<div class="facilities">
	<ul>
		<?php while ($services->have_posts()) : $services->the_post(); ?>
		<li>
		<a href="" class="item">
		<h3><?=the_title();?></h3>
		</a>
		</li>	
		<?php endwhile; wp_reset_query();?>
	</ul>
</div>	
	
</div>
	<div class="clr"></div>
</section>	
	
<section class="bg-off"> 
<div class="clr height20"></div>
<div class="container">
<h2 class="section-title">Sustainability</h2>		
<div class="sustainabilitylist">
<ul>
	<?php while ($sustainabilities->have_posts()) : $sustainabilities->the_post(); ?>
	<li>
		<div class="sustainabilitylist-content">
			<a href=""></a>
		<h3><?=the_title();?></h3>
		</div>
		<?php if(has_post_thumbnail()) { 
         $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full');
        ?>
		<div class="sustainabilitylist-image">
		<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" class="img-size" >
		</div>
		<?php } ?>
	</li>
	<?php endwhile; wp_reset_query();?>
</ul>	
</div>
</div>
<div class="clr height30"></div>
</section>

<section class="fixed_img sec-bg2">
<div class="fixed-overlay"></div>
<div class="container block-paralax">
<div class="row">
	
	<h2 class="section-title white">PRODUCTS</h2>
	<?php while ($products->have_posts()) : $products->the_post(); ?>
	<div class="col-lg-3 padmar10">
	<div class="featured-block">
	<div class="imgblock">
		<?php if(has_post_thumbnail()) { 
         $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full');
        ?>
		<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" class="img-size">
		<?php } ?>
	</div>

	<div class="viewblock">
	<a href="" class="viewlink">View</a>
	</div>
	<div class="contentblock">
	<h5><?=the_title();?></h5>
	</div>
	</div>
	</div>
	<?php endwhile; wp_reset_query();?>
	

</div>
</div>
</section>

<section class="bg-off"> 
<div class="clr height20"></div>
<div class="container">
<h2 class="section-title">WHAT PEOPLE SAY</h2>	
	
<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
	<div class="carousel-indicators">
	<?php $c = wp_count_posts('testimonial')->publish;$j=0; for($i=0;$i<$c;$i +=2){ ?>
    <button type="button" data-bs-target="#carouselExampleControls" data-bs-slide-to="<?php echo $j;?>" <?php if($j==0) :?>class="active"<?php endif;?> aria-current="true" aria-label="Slide <?=$j+1;?>"></button>
    <?php $j++;} ?> 
    </div>
	
  <div class="carousel-inner">
  	<?php  $r=0;                    
    for($i=0;$i<$c;$i +=2){?>
    <div class="carousel-item <?php if($i==0) :?>active<?php endif;?>">
      <div class="row">
      	<?php $args = array(
		'post_type'=> 'testimonial',
		'orderby'    => 'ID',
		'post_status' => 'publish',
		'order'    => 'ASC',
		'posts_per_page' => 2,
		'offset' => $r*2
		);
		$testimonials = new WP_Query( $args );
     	while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
		<div class="col-lg-6 mbottom10">
		<div class="people-say">
		<div class="peopleimg">
			<?php if(has_post_thumbnail()) { 
	         $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full');
	        ?>
			<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" class="img-size">
			<?php } ?>
		</div>
			<div class="peoplecontent">
			<?=the_content();?>
				<p><em><strong><?php the_title(); ?></strong></em></p>
				<p><?php the_excerpt(); ?></p>
			</div>
		</div>
		</div>
	<?php endwhile; wp_reset_query();?>	
	</div>
    </div>
    <?php $r++;} ?>
  </div>

</div>
	

</div>
	<div class="clr height20"></div>
</section>

<?php
get_footer();