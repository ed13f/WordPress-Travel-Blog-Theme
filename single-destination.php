<?php

$id = get_the_ID();
$post = get_post($id);
$main_content = $post->post_content;
$hero_image_url = get_the_post_thumbnail_url($id);
$feature_img_id = get_post_thumbnail_id( $id );

$main_content = apply_filters('the_content', $main_content);
$lower_content = get_field('lower_content', $id);
$categories = get_the_category();
$category_names = [];
foreach ($categories as $category){ array_push($category_names, $category->cat_ID); }

$args=array(
	'posts_per_page' => 20,
    'order' => 'ASC',
    'post_type'      => 'destination',
    'category__in' => $category_names,
    '_shuffle_and_pick'     => 3,
    'post__not_in' => array($id),
);
$feat_img_args=array(
	'posts_per_page' => -1, 
    'post_type'      => 'photograph',
    'category'       => 'featured-image',
    '_shuffle_and_pick'     => 10,
    'meta_query' => array(
		array(
			'key' => 'destination_tag', // name of custom field
			'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
			'compare' => 'LIKE'
		)
	),
);
// $args = [ 'title' => 'Other Related Trips', 'args' => $args];

the_post();
get_header();
partial('nav.main-nav');
partial('heros.destination-hero', ['hero_image_url' => $hero_image_url]);
partial('sections.content', ['content'=> $main_content]);
partial('sections.featured-image-slider', ['args' => $feat_img_args]);
partial('sections.content', ['content'=> $lower_content]);
partial('sections.recent-trips', [ 'title' => 'Other Related Trips', 'args' => $args]);
get_footer();
?>