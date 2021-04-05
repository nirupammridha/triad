<?php

get_header();
?>

<div class="container">
<?php if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); ?>    
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
			</div>
		</div>
	</div>
<?php   endwhile; 
    endif; ?>
</div>

<section class="fixed_img sec-bg1">
<div class="fixed-overlay"></div>
<div class="container block-paralax">

<h2 class="section-title white">Facilities</h2>
<div class="clr"></div>
<div class="facilities">
	<ul>
		<li class="active">
		<a href="facilities.php"></a>
		<div class="item">		
		<h3>Sand Preparation</h3>
		</div>	
		</li>	
		
		<li>
		<a href="making-handling.php"></a>
		<div class="item">	
		<h3>Mould Making and Handling</h3>
		</div>	
		</li>
		
		<li>
		<a href=""></a>
		<div class="item">
		<h3>Shot Blasting</h3>
		</div>		
		</li>
		
		<li>
		<a href=""></a>
		<div class="item">
		<h3>Fettling</h3>
		</div>		
		</li>
		
		<li>
		<a href=""></a>
		<div class="item">	
		<h3>Machining</h3>
		</div>
		</li>
		
		<li>
		<a href=""></a>
		<div class="item">	
		<h3>Fabrication</h3>
		</div>		
		</li>
		
		<li>
		<a href=""></a>
		<div class="item">	
		<h3>Coating</h3>
		</div>		
		</li>
		
		<li>
		<a href="" ></a>
		<div class="item">
		<h3>Packing & Despatch</h3>
		</div>
		</li>
	</ul>
</div>	
	
</div>
	<div class="clr"></div>
</section>


<section class="bg-off">
	<div class="container">
	<div class="row">
		<div class="clr height10"></div>
		<div class="col-lg-12">
		<h3 class="section-title">Sand Preparation</h3>
		</div>
<div class="clr "></div>

	<div class="col-lg-3 padmar10">
	<div class="featured-block">
	<div class="imgblock"><img src="assets/images/facilities/01.jpg" alt="" class="img-size"></div>

	<div class="viewblock">
	<a href="" class="viewlink" data-bs-toggle="modal" data-bs-target="#exampleModal">View</a>
	</div>
	<div class="contentblock">
	<h5>SAND PLANT</h5>
	</div>
	</div>
	</div>
	
	<div class="col-lg-3 padmar10">
	<div class="featured-block">
	<div class="imgblock"><img src="assets/images/facilities/02.jpg" alt="" class="img-size"></div>

	<div class="viewblock">
	<a href="" class="viewlink">View</a>
	</div>
	<div class="contentblock">
	<h5>TM Mixer</h5>
	</div>
	</div>
	</div>
	

	
</div>
<div class="clr height20"></div>
</div>	
</section>


<!-- Modal-Box -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <strong class="modal-title" id="exampleModalLabel">Case Differential Casting</strong>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <img src="assets/images/facilities/01.jpg" alt="" class="img-fluid mx-auto d-block">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<?php
get_footer();
?>