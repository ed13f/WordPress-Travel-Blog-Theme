<?php

# Template Name: About

$id = get_the_ID();
$post = get_post($id);
$main_content = $post->post_content;
$main_content = apply_filters('the_content', $main_content);

the_post();
get_header();
partial('nav.main-nav');
partial('heros.destination-hero');
partial('sections.content', ['content'=> $main_content]);
get_footer();
?>