<?php
$categories = get_the_category();
$category_names = [];
foreach ($categories as $category){ array_push($category_names, $category->cat_ID); }

$args=array(
	'posts_per_page' => 20,
    'order' => 'ASC',
    'post_type'      => 'destination',
    'category__in' => $category_names,
    '_shuffle_and_pick'     => 3,
);
$args = [ 'title' => 'Other Related Trips', 'args' => $args];

the_post();
get_header();
partial('nav.main-nav');
partial('heros.destination-hero');
partial('sections.content');
partial('sections.featured-image-slider');
partial('sections.content');
partial('sections.recent-trips', $args);
get_footer();
?>