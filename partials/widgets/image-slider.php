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
$image_count = $query->post_count;


?>


<article class="featured-image-slider-container">
	<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="slider-image-wrapper <?php echo $counter == 1 ? 'active-img first-image' :''; ?> " style="background-image:url('<?php the_post_thumbnail_url(); ?>')" name="id<?php echo strval(get_the_id());?>">
		<?php
		$counter +=1; ?>
		</div>
	<?php endwhile; endif; ?>
	</div>	

	<div class="slider-tracking-container">
		<?php for ($x = 1; $x <= $image_count; $x++) { ?>
   			 <span class="slider-dot <?php echo $x == 1 ? 'active-dot' :''; ?>">&#176;</span>
		<?php } ?>
</article>	
