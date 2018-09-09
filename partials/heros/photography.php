<header class="photography">
	<div class="hero-short-screen"></div>
	<?php 
	$args=array(
		'posts_per_page' => -1, 
	    'post_type'      => 'photograph',
	    'category'       => 'featured-image',
	    '_shuffle_and_pick'     =>  -1,
	);
 
	$wp_query = new WP_Query( $args );
	$wp_count = count($wp_query);
	$wp_count % 2 != 0 ? array_pop($wp_query)  : "";
	wp_reset_query();

	partial('widgets.image-slider', ["query"=> $wp_query]);   ?>
</header>