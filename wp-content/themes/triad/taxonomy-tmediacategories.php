<?php
get_header(); 
$cat = get_queried_object();
$image = get_field('page_banner', $cat);
?>

<section class="other-banner">
<?php if(!empty($image)):?>
<img src="<?php echo $image; ?>" alt="" class="img-fluid" >
<?php endif; ?>
<div class="container relative-block">
<div class="block-content-other"> 
<h2 class="font-size24 text-white">Exhibitions</h2>
</div>  
</div>  
</section>

<section class="bg-off">
  <div class="container">
  <div class="row">
  <div class="clr height10"></div>
<div class="col-lg-12">
<ul class="productlist">
  <li class="active"><a href="<?php echo site_url();?>/download">Download</a></li>
  <li><a href="<?php echo site_url();?>/tmediacategories/exhibitions">Exhibitions</a></li>
</ul>
</div>
<div class="clr height10"></div>
<?php if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); ?> 

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
  <h5><?php the_title(); ?></h5>
  </div>
  </div>
  </div>

  <!-- Modal-Box -->
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
       <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" class="img-fluid mx-auto d-block">
       <?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>        
      </div>
    </div>
  </div>
</div>
<?php   endwhile; 
    endif; ?>
  
</div>
<div class="clr height20"></div>
</div>  
</section>



<?php
get_footer();
?>