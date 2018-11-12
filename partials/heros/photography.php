<header class="photography">
	<!-- <div class="hero-short-screen"></div> -->
	<?php 
	$dot_class = "slider-tracking-container photo-header";
	// $wp_count = count($wp_query);
	// $wp_count % 2 != 0 ? array_pop($wp_query)  : "";
	// wp_reset_query();

	partial('widgets.image-slider', ["query"=> $wp_query, "dot_class"=> $dot_class]);   ?>
</header>