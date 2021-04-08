<footer>
<div class="container">
	<div class="row ">
		<div class="clr height5"></div>
		<div class="col-lg-4">
		<div class="logofooter">
			<?php if ( get_theme_mod( 'custom_logo' )){ $logo = wp_get_attachment_image_src(get_theme_mod( 'custom_logo'), 'full'); ?>
			<a href="<?php echo get_site_url(); ?>"><img src="<?php echo esc_url($logo[0]); ?>" alt="" class="img-fluid"></a>
			<?php } ?>
		</div>
		<div class="clr height5"></div>
			<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1 500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book...</p>
			<div class="clr"></div>
			
		<h3 class="heading">Follow us on</h3>
		<div class="social-block">
		<a href="<?php echo get_option('facebook_url'); ?>" target="_blank" title="Facebook" class="facebook"><i class="icon-facebook"></i></a>
		<a href="<?php echo get_option('twitter_url'); ?>" target="_blank" title="Twitter" class="twitter"><i class="icon-twitter"></i></a>
		<a href="<?php echo get_option('linkedIn_url'); ?>" target="_blank" title="Linkedin" class="linkedin"><i class="icon-linkedin"></i></a>
		<a href="<?php echo get_option('youtube_url'); ?>" target="_blank" title="Youtube" class="youtube"><i class="icon-youtube"></i></a>
		</div>	
			
		</div>
		<div class="col-lg-2">
		<h3 class="heading">Information</h3>
		<ul class="list">
			<li><a href="<?php echo site_url();?>/company-profile">About Us</a></li>	
			<li><a href="<?php echo site_url();?>/contact">Help Desk</a></li>	
			<li><a href="<?php echo site_url();?>/contact">Support</a></li>	
			<li><a href="<?php echo site_url();?>/privacy-policy">Privacy Policy</a></li>	
			<li><a href="<?php echo site_url();?>/terms-conditions">Terms & Conditions</a></li>	
		</ul>
		</div>
		<div class="col-lg-2">
		<h3 class="heading">Useful Links</h3>
		<ul class="list">
			<li><a href="<?php echo site_url();?>">Homepage</a></li>	
			<li><a href="<?php echo site_url();?>/municipal-castings">Products</a></li>	
			<li><a href="<?php echo site_url();?>/facilities">Facilities</a></li>
			<li><a href="<?php echo site_url();?>/current-openings">Careers</a></li>
			<li><a href="<?php echo site_url();?>/contact">Contact</a></li>	
		</ul>	
			
		</div>
		<div class="col-lg-4">
		<h3 class="heading">Get in touch</h3>
			<div class="row gettouch">
		<?php echo do_shortcode('[contact-form-7 class="row gettouch" id="97" title="Get in touch"]');?>
			</div>
		</div>
		<div class="clr height10"></div>
	</div>
</div>
<div class="copyright">
<div class="container">© <?=date('Y');?> Copyrights <?=get_bloginfo('name');?>, Ail Righis Reserved	</div>
</div>	
</footer>
<?php wp_footer(); ?>
</body> 
</html>
