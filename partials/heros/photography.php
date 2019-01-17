<header class="photography">
	<div class="mob-hero-img"><?php echo get_the_post_thumbnail($page_id); ?></div>
	<?php 
	// $id = get_the_post_thumbnail();
	
	$dot_class = "slider-tracking-container photo-header";

	$container_class = "featured-image-slider-container featured-image-hero";
	$arrow_class = "photography-hero";
	$content_class = "hero-content-wrapper mobile-header-content";

	partial('widgets.hero-content', ['content_class' => $content_class, 'page_id' => $page_id]);
	partial('nav.main-nav',["nav_class"=> $nav_class]);
	partial('widgets.image-slider', ["query"=> $wp_query, "dot_class"=> $dot_class, "container_class"=> $container_class , "arrow_class"=> $arrow_class]);   
	 ?>
</header>