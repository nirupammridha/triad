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
<h2 class="font-size24 text-white">Sustainability</h2>
</div>  
</div>  
</section>

<section class="bg-off">
  <div class="container">
  <div class="row">
  
  <div class="col-lg-12">
  <?php
  $taxonomy = 'sustainabilitycategories';
  $terms = get_terms($taxonomy);
  if ( $terms && !is_wp_error( $terms ) ) {
  ?>
  <ul class="aboutlist">
    <?php foreach ( $terms as $term ) { ?>
    <li><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"><?php echo $term->name; ?></a></li>
    <?php } ?> 
  </ul>
  <?php }?>
  </div>
  <div class="clr height5"></div>
  <?php if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); ?> 
  <div class="col-lg-4">
  <div class="aboutimg">
  <?php if(has_post_thumbnail()) { 
      $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full');
  ?>
  <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" class="img-size">
  <?php } ?>
  </div>
  </div>
  <div class="col-lg-8">
  <div class="blockcontent"> 
  <?=the_content();?>

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