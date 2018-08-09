<?php 
// $num_array = [225, 250, 275, 235];
$num_array = [180, 245, 215, 225, 210, 200];
// $num_array = [180, 200, 210, 215, 225, 245];
$height_staddered_array = [10, 40, 20, 35, 5, 30];
// $height_staddered_array = [ 5,10, 20, 30, 35, 40];
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
			<div class="image-gallery-image" style="background-image:url(<?php the_post_thumbnail_url(); ?>); height:<?php echo $num_array[$count]; ?>px; margin-top:<?php echo is_float( $count / 3 ) ? '' : $height_staddered_array[$count]; ?>px; " name="id<?php echo strval(get_the_id());?>">
				<h2 class="individual-photography-header"><?php the_title(); ?></h2>
				<div class="image-screen">
					
				</div>
			</div>
			<?php $count += 1; 
			$count == 6 ? $count = 0 : ""; ?>
		<?php endwhile; endif; ?>
	</div>
</section>