<div class="<?php echo $class; ?>" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
	<a class="link-screen" href="<?php the_permalink(); ?>"></a>
	<div class="date"><?php echo get_the_date("F / y"); ?></div>
	<h3 class="tile-title"><?php the_title(); ?></h3> 
</div>