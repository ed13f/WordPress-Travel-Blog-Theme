<?php 
	$class = "destination-tile continent-group-tile";
?>


<article class="continent-group">
	<h2><?php echo $continent_name ?></h2>
	<div class="continent-group-wrapper">
		<?php partial('widgets.destination-scroll-arrows'); ?>
		<div class="continent-group-container">
			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
				  if( ( $query->current_post + 1 ) == $query->post_count ){ $class .= ' last'; }
				  if( $query->current_post == 0){ $class .= ' first'; } ?>

				<div class="<?php echo $class; ?>" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
					<a class="link-screen" href="<?php the_permalink(); ?>"></a>
					<div class="date"><?php echo get_the_date("F / y"); ?></div>
					<h3 class="tile-title"><?php the_title(); ?></h3> 
				</div>
				<?php $class = "destination-tile continent-group-tile"; ?>
			<?php endwhile; endif; ?>
		</div>
	<div>	
	

</article>


