<?php 
// $num_array = [225, 250, 275, 235];
$num_array = [180, 245, 215, 225, 210];
$count = 0;

$args=array(
	'posts_per_page' => -1, 
    'post_type'      => 'photograph',
    'category'       => 'featured-image',
    '_shuffle_and_pick'     =>  -1,
);

$wp_query = new WP_Query( $args );
$wp_count = count($wp_query);
$wp_count % 2 != 0 ? array_pop($wp_query)  : "";
wp_reset_query();

?>







<section class="photo-grid-display">
	<div class="grid-wrapper">
		<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); 

			?>
			<div class="image-gallery-image" style="background-image:url(<?php the_post_thumbnail_url(); ?>); height:<?php echo $num_array[$count]; ?>px "></div>
			

			<?php $count += 1; 
			$count == 5 ? $count = 0 : ""; ?>
		<?php endwhile; endif; ?>
	</div>
	



</section>