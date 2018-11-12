<?php

# Template Name: About

$id = get_the_ID();
$post = get_post($id);
$hero_image_url = get_the_post_thumbnail_url($id);
$main_content = $post->post_content;
$lower_content = get_field("lower_content");
$main_content = apply_filters('the_content', $main_content);

the_post();
get_header();
partial('nav.main-nav');
partial('heros.destination-hero', ['hero_image_url' => $hero_image_url]);
partial('sections.content', ['content'=> $main_content]);
partial('sections.image-table-stacked');
partial('sections.content', ['content'=> $lower_content]);
get_footer();
?>