<div class="<?php echo $class; ?>" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
	<a class="link-screen" href="<?php the_permalink(); ?>"></a>
	<h3 class="tile-title"><?php the_title(); ?></h3> 
	<div class="view-tile">View</div>
</div>