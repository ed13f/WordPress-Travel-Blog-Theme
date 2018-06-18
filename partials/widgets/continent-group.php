<article class="continent-group">
	<h2><?php echo $continent_name ?></h2>
	<div class="continent-group-wrapper">
		<?php partial('widgets.destination-scroll-arrows'); ?>
		<div class="continent-group-container">
			<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
				<div class="destination-tile" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
					<div class="date"><?php echo get_the_date("F / y"); ?></div>
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> 
				</div>
			<?php endwhile; endif; ?>
		</div>
	<div>	
	

</article>