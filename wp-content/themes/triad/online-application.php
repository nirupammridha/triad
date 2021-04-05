<?php
/**
 * Template Name: Online-application
 * 
 */
get_header(); 
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
	<li><a href="<?php echo site_url();?>/current-openings">Current Openings</a></li>
	<li class="active"><a href="<?php echo site_url();?>/online-application">Online Application</a></li>
</ul>
</div>
<div class="clr height30"></div>
		
<div class="col-lg-12">
<div class="job-search">

<form action="" method="post" id="online_application_frm" enctype="multipart/form-data">
<input type="hidden" name="action" value="online_application">
<div class="contact_input_area">
<div id="success_fail_info"></div>
<div class="row">

<div class="col-sm-6 ">
<div class="form-group">
<input type="text" class="form-control" name="name" id="name" placeholder="Your Name" required>
</div>

<div class="form-group">
<input type="email" class="form-control" name="email" id="email" placeholder="Your E-mail" required>
</div>

<div class="form-group">
<input type="text" class="form-control" name="phone" id="phone" placeholder="Contact No" required>
</div>

<div class="form-group">
<input type="text" class="form-control" name="resume_url" id="resume_url" placeholder="Website / Online Resume URL" required>
</div>
</div>

<div class="col-sm-6">
<div class="form-group">
<textarea name="message" class="form-control" id="message" cols="10" rows="30" placeholder="Your Message *" required></textarea>
</div>
	
<div class="form-group">
    <label for="exampleFormControlFile1">Upload Resume</label>
    <input type="file" name="resume" class="form-control-file" id="exampleFormControlFile1">
  </div>	
	

</div>
	<div class="col-sm-12 text-center">
<div class="form-group">
<button type="submit" class="btn btn-style" id="submit_online_application_btn" data-style="zoom-in" data-size="l">SUBMIT</button>
</div>
</div>

</div>
</div>
</form>
	
	
</div>
</div>	
		
		
</div>
<div class="clr height20"></div>
</div>	
</section>

<?php
get_footer();