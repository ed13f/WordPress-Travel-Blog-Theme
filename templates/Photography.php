<?php

# Template Name: Photography
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


the_post();
get_header();
partial('nav.main-nav');
partial('heros.photography', ["wp_query"=> $wp_query]);
partial('sections.photo-grid-display', ["wp_query"=> $wp_query]);
get_footer();
?>