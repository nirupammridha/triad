<?php
/**
 * Template Name: Municipal-castings
 * 
 */
get_header();	
$categories = get_categories( array( 
    'child_of'      => 12,
    'taxonomy'      => 'productcategories',
    'hide_empty'    => false,
) );
//echo "<pre>"; print_r($categories); exit();
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
<?php
$taxonomy = 'productcategories';
$terms = get_terms($taxonomy);
if ( $terms && !is_wp_error( $terms ) ) {
?>
<ul class="productlist">
    <?php foreach ( $terms as $term ) { 	
	if($term->parent == 0 && category_has_children( $term->term_id, $taxonomy )){
    	?>
        <li><a href="<?php echo site_url();?>/municipal-castings" class="activelink"><?php echo $term->name; ?></a></li>
    <?php }elseif ($term->parent == 0 && !category_has_children( $term->term_id, $taxonomy )) {?>
    	<li><a href="<?php echo get_term_link($term->slug, $taxonomy); ?>" class="activelink"><?php echo $term->name; ?></a></li>
    <?php } ?>
   <?php } ?>
</ul>
<?php }?>
</div>
<div class="clr height10"></div>
</div>

<?php foreach($categories as $category) {
	//echo "<pre>"; print_r($category); exit();
	if($category->parent == 12 && category_has_children( $category->term_id, $taxonomy )){
		$subcategories = get_terms($taxonomy,array('child_of' => $category->term_id));
		$image = get_field('icon', "productcategories_".$category->term_id );
?>	
<div class="row custing">
<div class="col-lg-2 padr0">
<div class="custingimg">
	<?php if(!empty($image)):?>
	<img src="<?php echo $image; ?>" alt="" class="imgsize" >
	<?php endif; ?>
</div>
</div>
<div class="col-lg-10 padl0">
<div class="custinglist">
	<?php  ?>
	<h5><?=$category->name;?></h5>
	<ul>
		<?php foreach($subcategories as $subcat) {?>
		<li><a href="<?php echo get_term_link($subcat->slug, $taxonomy); ?>"><?=$subcat->name;?></a></li>
	   <?php }?>
	</ul>
</div>
</div>		
</div>	
<?php }?>	
<?php }?>	

		
<div class="clr height20"></div>
</div>	
</section>

<?php
get_footer();