<?php 
	$class = "continent-group-tile destination-tile";
?>


<article class="continent-group">
	<h2><?php echo $continent_name ?></h2>
	<div class="continent-group-wrapper">
		<?php partial('widgets.destination-scroll-arrows'); ?>
		<div class="continent-group-container">
			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
				  if( ( $query->current_post + 1 ) == $query->post_count ){ $class .= ' last'; }
				  if( $query->current_post == 0){ $class .= ' first'; } ?>

				<?php partial('widgets.single-destination-tile', ['class' => $class]); ?>

				<?php $class = "destination-tile"; ?>
			<?php endwhile; endif; ?>
		</div>
	<div>	
	

</article>


