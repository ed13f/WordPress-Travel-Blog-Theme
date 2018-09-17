<?php
$counter = 1;

$posts = $query->posts;

$image_count = count($posts);
// $image_count % 2 != 0 ? array_pop($posts)  : "";
?>


<article class="featured-image-slider-container">
		<?php foreach($posts as $post){ ?>
			<!-- <?php var_dump(get_the_post_thumbnail_url($post->ID)); ?> -->
			<div class="slider-image-wrapper <?php echo $counter == 1 ? 'active-img first-image' :''; ?> " style="background-image:url('<?php echo get_the_post_thumbnail_url($post->ID); ?>')" name="id<?php echo strval($post->ID);?>">
				<div class="photo-location-wrapper">
					<div class="photo-location"><em><?php echo get_the_title($post->ID); ?></em></div>
					<div class="photo-subtext"><?php echo get_the_content($post->ID); ?></div>
				</div>
			<?php $counter +=1; ?>
			</div>
		<?php } ?>
				
	<div class="slider-tracking-container">
		<?php for ($x = 1; $x <= $image_count; $x++) { ?>
   			 <span class="slider-dot <?php echo $x == 1 ? 'active-dot' :''; ?>">&#x25A0;</span>
		<?php } ?>
	</div>	
</article>	
