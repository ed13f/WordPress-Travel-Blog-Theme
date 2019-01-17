<?php
$counter = 1;
$wp_query = new WP_Query( $args );
wp_reset_query();
$image_count = $wp_query->post_count;
$posts = $wp_query->posts;
$arrow_class = "scroll-arrow-homepage";
$slide_arrow = "slider-arrow";
$dot_class = "slider-tracking-container";
$container_class = "featured-image-slider-container homepage";
if($image_count != 0){
?>
<section class="featured-container">
		
		<?php partial('widgets.image-slider', ["query"=> $wp_query, "dot_class"=> $dot_class, "container_class"=> $container_class, "arrow_class"=> $arrow_class]);   ?>
</section>
<?php } ?>
