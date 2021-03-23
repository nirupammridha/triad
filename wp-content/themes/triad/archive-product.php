<?php

get_header(); ?>
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
<?php
get_footer();
?>