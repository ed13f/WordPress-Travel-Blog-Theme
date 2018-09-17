<header class="photography">
	<div class="hero-short-screen"></div>
	<?php 
	// $wp_count = count($wp_query);
	// $wp_count % 2 != 0 ? array_pop($wp_query)  : "";
	// wp_reset_query();

	partial('widgets.image-slider', ["query"=> $wp_query]);   ?>
</header>