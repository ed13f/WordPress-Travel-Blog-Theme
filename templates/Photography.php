<?php
# Template Name: Photography
$nav_class = "photo_page";
global $page_id;
$page_id = $post->ID;



$args=array(
	'posts_per_page' => -1, 
    'post_type'      => 'photograph',
    'category'       => 'featured-image',
    '_shuffle_and_pick'     =>  -1,
);

$wp_query = new WP_Query( $args );
$posts = $wp_query->posts;
$post_count = count($posts);
$post_count % 3 != 0 ? array_pop($posts)  : "";
$post_count % 3 != 0 ? array_pop($posts)  : "";
wp_reset_query();

the_post();
get_header();

partial('heros.photography', ["wp_query"=> $wp_query, "nav_class"=> $nav_class, "page_id"=> $page_id]);
partial('sections.photo-grid-display', ["wp_query"=> $wp_query]);
get_footer();
?>