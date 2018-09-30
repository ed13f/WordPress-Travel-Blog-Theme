<?php
$counter = 1;
$wp_query = new WP_Query( $args );
wp_reset_query();
$image_count = $wp_query->post_count;
$arrow_class = "scroll-arrow-homepage";
$slide_arrow = "slider-arrow";
if($image_count != 0){
?>

<section >
	<div class="featered-slider-wrapper">
		<?php partial('widgets.destination-scroll-arrows', ['arrow_class' => $arrow_class, "slide_arrow" => $slide_arrow]); ?>
		<div class="featured-image-slider">
			<article class="featured-image-slider-container">
				<?php if ( $wp_query->have_posts() ) : while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
					<div class="slider-image-wrapper <?php echo $counter == 1 ? 'active-img first-image' :''; ?>">
					<?php the_post_thumbnail();
					$counter +=1; ?>
					</div>
				<?php endwhile; endif; ?>
				<div class="slider-tracking-container">
					<?php for ($x = 1; $x <= $image_count; $x++) { ?>
			   			 <span class="slider-dot <?php echo $x == 1 ? 'active-dot' :''; ?>"><?php echo $x == 1 ? '&#x25A0;' :'&#x25A0;'; ?></span>
					<?php } ?>
				</div>	
			</article>
		</div>	
	</div>
</section>

<?php } ?>