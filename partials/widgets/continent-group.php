<?php 
	$arrow_class = 'continent-arrows';
	$class = "destination-tile continent-group-tile";
	$tile_count = count($query->posts);
	$tile_count <= 1 ? $arrow_class = $arrow_class . " slide-arrow-hide" : "";
	$tile_count <= 1 ? $slide_arrow = "slide-arrow-hide" : "";
	
	
	
?>

<article class="continent-group <?php echo($class_to_add ? $class_to_add : ''); ?>">
	<div class="continent-group-content">
		<div class="continent-group-content-container">
			<h2><?php echo $continent_name ?></h2>
			<div class="destination-content"><?php the_content();?></div>
		</div>
	</div>
	<div class="continent-group-slider-container">


			<?php partial('widgets.destination-scroll-arrows', ['arrow_class'=> $arrow_class, 'slide_arrow' => $slide_arrow]); ?>
			<div class="continent-group-container">
				<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
					  if( ( $query->current_post + 1 ) == $query->post_count ){ $class .= ' last'; }
					  if( $query->current_post == 0){ $class .= ' first active-destination'; } ?>
					<div class="<?php echo $class; ?>" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
						<a class="link-screen" href="<?php the_permalink(); ?>"></a>
						<h3 class="tile-title h2"><?php the_title(); ?></h3> 
						<div class="view-tile">View</div>
					</div>
					<?php $class = "destination-tile continent-group-tile"; ?>
				<?php endwhile; endif; ?>
			</div>

	</div>		
</article>




