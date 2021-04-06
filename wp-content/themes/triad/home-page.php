<?php
/* Template Name:Home Temp */
if (!defined('ABSPATH')) exit;
get_header(); 
global $post;
$banner_image = get_field('banner_image',$post->ID);
$welcome_part = get_field('welcome_part',$post->ID);
$know_more = get_field('know_more',$post->ID);
$image_1 = get_field('image_1',$post->ID);
$exports_map = get_field('exports_map',$post->ID);
/*Get banners*/
$_bannerArgs = [
'post_type' => 'banner',
'orderby' => 'ID',
'order' => 'desc',
];

$banners = new WP_Query($_bannerArgs);
/*Get sustainability*/
$_sustainabilityArgs = [
'post_type' => 'sustainability',
'orderby' => 'ID',
'posts_per_page' => 8,
'order' => 'asc',
];

$sustainabilities = new WP_Query($_sustainabilityArgs);
/*Get product*/
$_productArgs = [
'post_type' => 'product',
'orderby' => 'ID',
'order' => 'asc',
'posts_per_page' => 8,
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
		<div><strong><i class="icon-mail"></i> <?php echo get_option('email_url'); ?></strong></div>
		<div><strong><i class="icon-phone"></i> <?php echo get_option('phone_url'); ?></strong></div>
		<div class="clr height20"></div>
	<div class="social-block">
	<a href="<?php echo get_option('facebook_url'); ?>" target="_blank" title="Facebook" class="facebook"><i class="icon-facebook"></i></a>
	<a href="<?php echo get_option('twitter_url'); ?>" target="_blank" title="Twitter" class="twitter"><i class="icon-twitter"></i></a>
	<a href="<?php echo get_option('linkedIn_url'); ?>" target="_blank" title="Linkedin" class="linkedin"><i class="icon-linkedin"></i></a>
	<a href="<?php echo get_option('youtube_url'); ?>" target="_blank" title="Youtube" class="youtube"><i class="icon-youtube"></i></a>
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
       <!--<img src="" class="img-size" alt="">-->
		<?php the_post_thumbnail( 'full' ); ?>
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

<section class="bg-off">
<div class="container">
<div class="row">
<div class="col-lg-12"><h2 class="section-title">Categories</h2></div>
</div>
	
<div id="carouselExampleProduct" class="carousel slide" data-bs-ride="carousel">
<div class="carousel-indicators">
<button type="button" data-bs-target="#carouselExampleProduct" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
<!--<button type="button" data-bs-target="#carouselExampleProduct" data-bs-slide-to="1" aria-label="Slide 2"></button>-->
</div>

<div class="carousel-inner">
<div class="carousel-item active">
<div class="row">
<?php
$taxonomy = 'productcategories';
$terms = get_terms($taxonomy);
if ( $terms && !is_wp_error( $terms ) ) {
?>
<?php foreach ( $terms as $term ) {
	$image = get_field('icon', "productcategories_".$term->term_id ); 	
	if($term->parent == 0 && category_has_children( $term->term_id, $taxonomy )){
    	?>
	<div class="col-sm-3">
	<div class="product-service">
		<a href="<?php echo site_url();?>/municipal-castings">
	<div class="icon-wrapper">
		<?php if(!empty($image)):?>
		<img src="<?php echo $image; ?>" alt="" class="img-fluid mx-auto d-block">
		<?php endif; ?>
	</div>
	<div class="product-txt"><?php echo $term->name; ?></div>
			</a>
	</div>
	</div>
<?php }elseif ($term->parent == 0 && !category_has_children( $term->term_id, $taxonomy )) {?>
	<div class="col-sm-3">
	<div class="product-service"><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
	<div class="icon-wrapper">
		<?php if(!empty($image)):?>
		<img src="<?php echo $image; ?>" alt="" class="img-fluid mx-auto d-block">
		<?php endif; ?>
	</div>
	<div class="product-txt"><?php echo $term->name; ?></div>
		</a>
	</div>
	</div>
<?php } ?>
<?php } ?>
<?php } ?>
</div>
</div>
</div>
</div>	

</div>
<div class="clr height20"></div>
</section>

<section class="fixed_img sec-bg1">
<div class="fixed-overlay"></div>
<div class="container">

<h2 class="section-title white">Facilities</h2>
<div class="clr"></div>
<div class="facilities">
<?php 
$taxonomy = 'servicecategories';
$serviceterms = get_terms($taxonomy);
	if ( $serviceterms && !is_wp_error( $serviceterms ) ) { ?>
	<ul>
		<?php foreach ( $serviceterms as $term ) { ?>
		<li>
		<a href="<?php echo get_term_link($term->slug, $taxonomy); ?>" class="item">
		<h3><?php echo $term->name; ?></h3>
		</a>
		</li>	
		<?php }?>
	</ul>
	<?php }?>
</div>	
	
</div>
	<div class="clr"></div>
</section>	
	
<section class="bg-off"> 
<div class="clr height20"></div>
<div class="container">
<h2 class="section-title">Sustainability</h2>		
<div class="sustainabilitylist">
<?php 
$taxonomy = 'sustainabilitycategories';
$sustainabilityterms = get_terms($taxonomy);
if ( $sustainabilityterms && !is_wp_error( $sustainabilityterms ) ) { ?>
<ul>
	<?php foreach ( $sustainabilityterms as $term ) { ?>
	<li>
		<div class="sustainabilitylist-content">
		<a href=""></a>
		<h3><?php echo $term->name; ?></h3>
		</div>
		<?php $image = get_field('icon', "sustainabilitycategories_".$term->term_id );
		if(!empty($image)){
        ?>
		<div class="sustainabilitylist-image">
		<img src="<?php echo $image; ?>" alt="<?php echo $term->name; ?>" class="img-size" >
		</div>
		<?php } ?>
	</li>
	<?php }?>
</ul>
<?php }?>	
</div>
</div>
<div class="clr height30"></div>
</section>

<section class="fixed_img sec-bg2">
<div class="fixed-overlay"></div>
<div class="container">
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
	<a href="" class="viewlink" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$post->ID;?>">View</a>
	</div>
	<div class="contentblock">
	<h5><?=the_title();?></h5>
	</div>
	</div>
	<div class="clr"></div>
		<div class="modal fade" id="exampleModal<?=$post->ID;?>" tabindex="-1" aria-labelledby="exampleModalLabel<?=$post->ID;?>" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <strong class="modal-title" id="exampleModalLabel<?=$post->ID;?>"><?php the_title(); ?></strong>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		      	<?php if(has_post_thumbnail()) { 
			        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full');
			    ?>
		       <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" class="img-fluid">
		       <?php } ?>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		        
		      </div>
		    </div>
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

<section class="fixed_img sec-bg1">
<div class="fixed-overlay2"></div>
<div class="container">

<div class="row">
	<div class="col-lg-6 text-white">
		<?=$know_more; ?>
		<a href="<?php echo site_url();?>/company-profile/" class="btn btn-style">Know More</a>
	</div>
<div class="col-lg-6">
	<?php if(!empty($exports_map)){?>
	<img src="<?=$exports_map;?>" alt="" class="img-fluid mx-auto d-block">
	<?php } ?>
</div>	
</div>	
	
</div>
	<div class="clr"></div>
</section>

<?php
get_footer();