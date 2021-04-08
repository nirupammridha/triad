<?php
/**
 * Template Name: Download
 * 
 */
get_header();
/*Get download*/
$_downloadArgs = [
'post_type' => 'tmedia',
'tmediacategories' => 'download',
'orderby' => 'ID',
'order' => 'asc',
'posts_per_page' => 8,
];

$downloads = new WP_Query($_downloadArgs);
/*Get video*/
$_videoArgs = [
'post_type' => 'tmedia',
'tmediacategories' => 'video',
'orderby' => 'ID',
'order' => 'asc',
'posts_per_page' => 8,
];

$videos = new WP_Query($_videoArgs);
//echo "<pre>"; print_r($videos); exit();
?>
	
<section class="other-banner">
<?php if(has_post_thumbnail()) { 
     $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full');
    ?>
<img src="<?php echo esc_url( $image[0] ); ?>" alt="" class="img-fluid" >
<?php } ?>
<div class="container relative-block">
<div class="block-content-other">	
<h2 class="font-size24 text-white">Products</h2>
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

<div class="col-lg-12">
<h3>Company Profile</h3>		
</div>

	<?php while ($downloads->have_posts()) : $downloads->the_post(); ?>
		<div class="col-lg-4 padmar10">
		<div class="featured-block">
		<div class="downloadblock">
			<embed src="<?=the_content();?>" width="100%" height="250px" />
		</div>
		<div class="viewblock">
		<a href="" class="viewlink" data-bs-toggle="modal" data-bs-target="#aa<?=$post->ID;?>">View</a>
		</div>
		<div class="contentblock">
		<h5><?=the_title();?></h5>
		</div>
		</div>
		</div>
		
		<!-- Modal-Box -->
		<div class="modal fade" id="aa<?=$post->ID;?>" tabindex="-1" aria-labelledby="exampleModalLabel<?=$post->ID;?>" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		      <div class="modal-header">
		        <strong class="modal-title" id="exampleModalLabel<?=$post->ID;?>"><?=the_title();?></strong>
		        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		      </div>
		      <div class="modal-body">
		       <embed src="<?=the_content();?>" width="100%" height="600px"/>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>		        
		      </div>
		    </div>
		  </div>
		</div>
	<?php endwhile; wp_reset_query();?>

		
<div class="col-lg-12">
<h3>Video</h3>		
</div>
<?php while ($videos->have_posts()) : $videos->the_post(); ?>	
	<div class="col-lg-4 padmar10">
	<div class="featured-block">
	<div class="downloadblock">
		<?=the_content();?>
	</div>
	<div class="contentblock">
	<h5><?=the_title();?></h5>
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