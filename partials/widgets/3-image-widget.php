<div class="regions-3-section">
<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
<div class="region-widget-wrapper" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
	
	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> 
</div>

<?php endwhile; endif; ?>
</div>
