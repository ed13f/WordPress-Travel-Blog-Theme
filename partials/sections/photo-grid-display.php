<?php 
// $num_array = [225, 250, 275, 235];
$num_array = [180, 245, 215, 225, 210, 200];
// $num_array = [180, 245, 220, 200, 220, 245];
// $num_array = [180, 200, 210, 215, 225, 245];
$height_staddered_array = [10, 40, 20, 35, 5, 30];
// $height_staddered_array = [10, 40, 5, 35, 5, 40];
// $height_staddered_array = [ 5,10, 20, 30, 35, 40];
$count = $left_image_count = 0;

$wp_count = count($wp_query);
// $wp_count % 2 != 0 ? array_pop($wp_query)  : "";
$posts = $wp_query->posts;
wp_reset_query();

?>

<section class="photo-grid-display continent-group-wrapper">
	<?php partial('widgets.destination-scroll-arrows'); ?>
	<div class="grid-wrapper continent-group-container">
		<?php foreach($posts as $post){ ?>
			<div class="image-gallery-image<?php echo( in_array($left_image_count, [0,1,2]) ? ' left-column' : ''); ?>" style="background-image:url(<?php  echo get_the_post_thumbnail_url($post->ID); ?>); height:<?php echo $num_array[$count]; ?>px; margin-top:<?php echo is_float( $count / 3 ) ? '' : $height_staddered_array[$count]; ?>px; " name="id<?php echo strval($post->ID);?>">
				<div class="content-container">
					<h2 class="individual-photography-header"><?php echo get_the_title($post->ID); ?></h2>
					<div class="view-photo">View</div>
				</div>
				<div class="image-screen">
				</div>
			</div>
			<?php  $count += 1;
			$left_image_count += 1; 
			$count == 6 ? $count = 0 : ""; ?>
		<?php } ?>
	</div>
</section>