<?php
/**
 * Template Name: Facilities
 * 
 */
get_header();	
?>

<section class="fixed_img sec-bg1">
<div class="fixed-overlay"></div>
<div class="container block-paralax">

<h2 class="section-title white">Facilities</h2>
<div class="clr"></div>
<div class="facilities">
<?php
$taxonomy = 'servicecategories';
$terms = get_terms($taxonomy);
if ( $terms && !is_wp_error( $terms ) ) {
?>
  <ul>
    <?php $i=0; foreach ( $terms as $term ) {?>
    <li class="<?php if($i==0){echo 'active';}?>">
    <a href="<?php echo get_term_link($term->slug, $taxonomy); ?>"></a>
    <div class="item">    
    <h3><?php echo $term->name; ?></h3>
    </div>  
    </li> 
    <?php $i++; } ?>
  </ul>
<?php }?>
</div>  
  
</div>
  <div class="clr"></div>
</section>

<?php 
/*Get post*/
$args = [
    'post_type' => 'service',
    'tax_query' => [
        [
            'taxonomy' => $taxonomy,
            'terms' => 37,
            'include_children' => false // Remove if you need posts from term 7 child terms
        ],
    ],
    // Rest of your arguments
];

$items = new WP_Query($args);
?>
<section class="bg-off">
  <div class="container">
  <div class="row">
    <div class="clr height10"></div>
    <div class="col-lg-12">
    <h3 class="section-title">Sand Preparation</h3>
    </div>
    <div class="clr "></div>
    <?php while ($items->have_posts()) : $items->the_post(); ?>
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
        <strong class="modal-title" id="exampleModalLabel<?=$post->ID;?>">Case Differential Casting</strong>
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
  <?php endwhile; wp_reset_query();?>  

  
</div>
<div class="clr height20"></div>
</div>  
</section>




<?php
get_footer();