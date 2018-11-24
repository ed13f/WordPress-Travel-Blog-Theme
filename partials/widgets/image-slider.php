<?php
$counter = 1;

$posts = $query->posts;

$image_count = count($posts);
// $image_count % 2 != 0 ? array_pop($posts)  : "";
?>


<section class="<?php echo $container_class; ?>">
	<?php if($image_count != 1 || $arrow_class == true){ partial('widgets.destination-scroll-arrows', ['arrow_class' => $arrow_class, "slide_arrow" => $slide_arrow]); } ?>
		<?php foreach($posts as $post){ ?>
			<article class="slider-image-wrapper <?php echo $counter == 1 ? 'active-img first-image' :''; ?> " name="id<?php echo strval($post->ID);?>">
				<?php  echo get_the_post_thumbnail($post->ID); ?>
				<div class="photo-location-wrapper">
					<h3 class="photo-location"><em><?php echo get_the_title($post->ID); ?></em></h3>
					<p class="photo-subtext"><?php echo the_post_thumbnail_caption($post->ID); ?></p>
				</div>
			<?php $counter +=1; ?>
			</article>
		<?php } ?>
	<?php if($image_count != 1){ ?>		
	<div class="<?php echo $dot_class; ?>">
		<?php for ($x = 1; $x <= $image_count; $x++) { ?>
   			 <span class="slider-dot <?php echo $x == 1 ? 'active-dot' :''; ?>">&#x25A0;</span>
		<?php } ?>
	</div>	
<?php } ?>
</section>	
