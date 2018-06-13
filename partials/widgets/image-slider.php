<?php
$counter = 1;

$args=array(
	'posts_per_page' => -1, 
    'post_type'      => 'photograph',
    'category'       => 'featured-image',
    '_shuffle_and_pick'     => 10,
);

$wp_query = new WP_Query( $args );
wp_reset_query();
$image_count = $wp_query->post_count;


?>


<article class="featured-image-slider-container">
	<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
		<div class="slider-image-wrapper <?php echo $counter == 1 ? 'active-img first-image' :''; ?>">
		<?php the_post_thumbnail();
		$counter +=1; ?>
		</div>
	<?php endwhile; endif; ?>
	</div>	

	<div class="slider-tracking-container">
		<?php for ($x = 1; $x <= $image_count; $x++) { ?>
   			 <span class="slider-dot <?php echo $x == 1 ? 'active-dot' :''; ?>">&bull;</span>
		<?php } ?>
</article>	
