<?php

# Template Name: Destinations
$id = get_the_ID();
$post = get_post($id);
$hero_image_url = get_the_post_thumbnail_url($id);
$main_content = $post->post_content;
$preview_word_count = 55;
$main_content = apply_filters('the_content', $main_content);

the_post();
get_header();

partial('heros.destination-hero', ['hero_image_url' => $hero_image_url]);
// partial('heros.image-slider-hero');
partial('sections.content', ['content'=> $main_content]);
partial('sections.continent-destination-groupings', ['preview_word_count'=> $preview_word_count]);
get_footer();
?>