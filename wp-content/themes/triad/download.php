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
	<li class="active"><a href="dropdown.php">Download</a></li>
	<li><a href="exhibitions.php">Exhibitions</a></li>
</ul>
</div>
<div class="clr height10"></div>

<div class="col-lg-12">
<h3>Company Profile</h3>		
</div>
	<div class="col-lg-3 padmar10">
	<div class="featured-block">
	<div class="imgblock"><img src="assets/images/profile-img.png" alt="" class="img-size"></div>

	<div class="viewblock">
	<a href="" class="viewlink" data-bs-toggle="modal" data-bs-target="#exampleModal">View</a>
	</div>
	<div class="contentblock">
	<h5>SIF Company Profile</h5>
	</div>
	</div>
	</div>

		
<div class="col-lg-12">
<h3>Video</h3>		
</div>
		
	<div class="col-lg-3 padmar10">
	<div class="featured-block">
	<div class="imgblock"><img src="assets/images/video.jpg" alt="" class="img-size"></div>

	<div class="viewblock">
	<a href="" class="viewlink" data-bs-toggle="modal" data-bs-target="#exampleModal">View</a>
	</div>
	<div class="contentblock">
	<h5>SIF Company Profile</h5>
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
       <img src="assets/images/profile-img.png" alt="" class="img-fluid mx-auto d-block">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
	
<?php
get_footer();	