<?php

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php

		// Start the Loop.
		while ( have_posts() ) :
			the_post();?>

			
			<div><?=the_title();?></div>
			<div class="peopleimg">
				<?php if(has_post_thumbnail()) { 
		         $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ),'full');
		        ?>
				<img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php the_title(); ?>" class="img-size">
				<?php } ?>
			</div>

			

		<?php	
		// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

		endwhile; // End the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>