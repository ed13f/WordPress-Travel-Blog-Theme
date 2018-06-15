<?php
$europe_args=array(
	'posts_per_page' => -1, 
    'post_type'      => 'destination',
    'category_name'       => 'europe',
    // '_shuffle_and_pick'     => -1,
);
$wp_europe_query = new WP_Query( $europe_args );
wp_reset_query();
// echo "<pre>";
// var_dump($wp_europe_query);
// echo "</pre>";

$north_america_args=array(
	'posts_per_page' => -1, 
    'post_type'      => 'destination',
    'category_name'       => 'north-america',
    // '_shuffle_and_pick'     => -1,
);
$wp_north_america_query = new WP_Query( $north_america_args );
wp_reset_query();

$south_america_args=array(
	'posts_per_page' => -1, 
    'post_type'      => 'destination',
    'category_name'       => 'south-america',
    // '_shuffle_and_pick'     => -1,
);
$wp_south_america_query = new WP_Query( $south_america_args );
wp_reset_query();

?>


<section class="continent-destination-groupings">
	<?php partial('widgets.continent-group', ['query' => $wp_europe_query, 'continent_name' => "Europe"]); ?>
	<?php partial('widgets.continent-group', ['query' => $wp_north_america_query, 'continent_name' => "North America"]); ?>
	<?php partial('widgets.continent-group', ['query' => $wp_south_america_query, 'continent_name' => "South America"]); ?>
	


</section>