<?php 
	$arrow_class = 'continent-arrows';
	$class = "destination-tile continent-group-tile";
	$tile_count = count($query->posts);
	$tile_count <= 1 ? $arrow_class = $arrow_class . " slide-arrow-hide" : "";
	$tile_count <= 1 ? $slide_arrow = "slide-arrow-hide" : "";
	
	
	
?>

<section class="continent-group <?php echo($class_to_add ? $class_to_add : ''); ?>">
	<header class="continent-group-content">
		<article class="continent-group-content-container">
			<h2><?php echo $continent_name ?></h2>
			<div class="destination-content"><?php the_content();?></div>
		</article>
	</header>
	<section class="continent-group-slider-container">


			<?php partial('widgets.destination-scroll-arrows', ['arrow_class'=> $arrow_class, 'slide_arrow' => $slide_arrow]); ?>
			<div class="continent-group-container">
				<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
					  if( ( $query->current_post + 1 ) == $query->post_count ){ $class .= ' last'; }
					  if( $query->current_post == 0){ $class .= ' first active-destination'; } ?>
					  <?php partial('widgets.single-destination-tile', ['class' => $class, 'preview_word_count'=> $preview_word_count]); ?>
					<?php $class = "destination-tile continent-group-tile"; ?>
				<?php endwhile; endif; ?>
			</div>
	</section>		
</section>




