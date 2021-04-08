<?php

get_header(); 
$term = get_queried_object();
$image = get_field('page_banner', $term);
$parent = get_term_top_most_parent( $term->term_id, $term->taxonomy );
//echo "<pre>"; print_r($parent->term_id); exit();
$categories = array();
if($parent->term_id == 12){
	$categories = get_categories( array( 
	    'child_of'      => 12,
	    'taxonomy'      => $term->taxonomy,
	    'hide_empty'    => false,
	) );
}
?>

<section class="other-banner">
<?php if(!empty($image)):?>
<img src="<?php echo $image; ?>" alt="" class="img-fluid" >
<?php endif; ?>
<div class="container relative-block">
<div class="block-content-other">	
<h2 class="font-size24 text-white">Products</h2>
</div>	
</div>	
</section>


<section class="bg-off">
<div class="container">
<div class="clr height10"></div>	
<div class="row">
	<div class="col-lg-12">
	<h2 class="section-title"><?=$term->name;?></h2>
	</div>	
	
	
<div class="col-lg-3">
<div class="pronamelist" style="display: none;">
<ul>
<li><a href="">Municipal Castings</a></li>	
<li><a href="">Pipe Fittings</a></li>	
<li><a href="">Agricultural Castings</a></li>	
<li><a href="">Electrical Castings</a></li>	
</ul>	
</div>	
	
<div class="accordion bg-white accordion-height" id="accordionExample" >
<?php foreach($categories as $category) {
		if($category->parent == 12 && category_has_children( $category->term_id, $taxonomy )){
		$subcategories = get_terms($term->taxonomy,array('child_of' => $category->term_id));
		$image = get_field('icon', "productcategories_".$category->term_id );
?>
  <div class="accordion-item">
    <h2 class="accordion-header" id="heading<?=$category->term_id?>">
      <button class="accordion-button <?php if($category->term_id != $term->parent){?>collapsed<?php }?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?=$category->term_id?>" aria-expanded="true" aria-controls="collapse<?=$category->term_id?>">
        <?=$category->name;?>
      </button>
    </h2>
    <div id="collapse<?=$category->term_id?>" class="accordion-collapse collapse <?php if($category->term_id == $term->parent){?>show<?php }?>" aria-labelledby="heading<?=$category->term_id?>" data-bs-parent="#accordionExample">
      <div class="accordion-body pad0">
		  
	<ul class="listcusting">
		<?php foreach($subcategories as $subcat) {?>
		<li><a href="<?php echo get_term_link($subcat->slug, $taxonomy); ?>">
			<?php if(!empty($image)):?>
			<img src="<?php echo $image; ?>" alt="">
			<?php endif; ?>
		<?=$subcat->name;?></a>
		</li>
		<?php }?>
	</ul> 
      </div>
    </div>
  </div>
<?php }?>	
<?php }?>	
		
</div>	
	
</div>	

<div class="col-lg-9">
<div class="row">
<?php if ( have_posts() ) : 
while ( have_posts() ) : the_post(); ?> 
<div class="col-lg-4 padmar10">
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
<?php   endwhile; 
    endif; ?>	
	
</div>
</div>	
</div>		
		
<div class="clr"></div>
<div class="row">
<div class="col-lg-12">
	<div class="description">
	<h4 class="heading">Description</h4>
	<ul>
		<li>
		<div class="nwme"><strong>Material </strong></div>	
		<div class="value">Ductile Iron</div>	
		</li>

		<li>
		<div class="nwme"><strong>Standard </strong></div>	
		<div class="value">ANSI AWWA C153 and ANSI AWWA C110</div>	
		</li>

		<li>
		<div class="nwme"><strong>Sizes </strong></div>	
		<div class="value">2" upto 24"</div>	
		</li>	

		<li>
		<div class="nwme"><strong>Lining </strong></div>	
		<div class="value">Cement Inside Lining</div>	
		</li>

		<li>
		<div class="nwme"><strong>Coating </strong></div>	
		<div class="value">Coating with NSF approved paint and epoxy coating available</div>	
		</li>

		<li>
		<div class="nwme"><strong>Range </strong></div>	
		<div class="value">Bends, Tees, Crosses, Wyes, Concentric / Eccentric Reducers, Swivels, Flanges and Sleeves</div>	
		</li>	
	</ul>
	</div>

</div>
</div>	
<div class="clr height20"></div>
</div>	
</section>

<?php
get_footer();
?>