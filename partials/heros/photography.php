<header class="photography">
	<?php 
	$dot_class = "slider-tracking-container photo-header";
	$container_class = "featured-image-slider-container featured-image-hero";
	$arrow_class = "photography-hero";
	partial('nav.main-nav');
	partial('widgets.image-slider', ["query"=> $wp_query, "dot_class"=> $dot_class, "container_class"=> $container_class , "arrow_class"=> $arrow_class]);   ?>
</header>