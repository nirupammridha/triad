<?php
/**
 * Template Name: Current openings
 * 
 */
get_header(); 
global $wpdb;
$q = 'SELECT * FROM '.CURRENT_OPENING_TBL;
$data = $wpdb->get_results($q);
if(isset($_POST['search_btn'])) {
    $title = $_POST['title'];
    $location = $_POST['location'];
    $q = "SELECT * FROM ".CURRENT_OPENING_TBL." WHERE title LIKE '$title%' and location LIKE '$location%'";
    $data = $wpdb->get_results($q);
    //echo "<pre>";print_r($q);exit();
}
?>

<section class="other-banner">
<img src="assets/images/other-banner.jpg" alt="" class="img-fluid" >
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
  	<li class="active"><a href="<?php echo site_url();?>/current-openings">Current Openings</a></li>
  	<li><a href="<?php echo site_url();?>/online-application">Online Application</a></li>
  </ul>
  </div>
<div class="clr height30"></div>

<div class="col-lg-12">
<div class="job-search">
<ul>
<form method="POST">
<li><input type="text" class="form-control" placeholder="Job Tittle, Skill" name="title" required></li>	
<li><input type="text" class="form-control" placeholder="City or state" name="location" required></li>	
<li><button class="btn btn-search btn-style" type="submit" name="search_btn"><i class="icon-search"></i>Search</button></li>
</form>	
</ul>
</div>
</div>	
<?php $i=1; foreach($data as $key => $value){ ?>	
<div class="col-lg-12">	
<div class="blockbg">
	<h4><?=$value->title;?></h4>
	<p><?=$value->short_description;?></p>
	<p><strong>Location:</strong> <?=$value->location;?><a href="" class="btn btn-style float-end" data-bs-toggle="modal" data-bs-target="#exampleModal<?=$i;?>">More</a></p>	
</div>		
</div>

<!-- Modal-Box -->

<div class="modal fade" id="exampleModal<?=$i;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <strong class="modal-title" id="exampleModalLabel"><?=$value->title;?></strong>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <?=$value->long_description;?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
<?php $i++; } ?>		
	
</div>
<div class="clr"></div>
</div>	
</section>



<?php
get_footer();