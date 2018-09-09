<?php

# Template Name: Photography
 
the_post();
get_header();
partial('nav.main-nav');
partial('heros.photography');
partial('sections.photo-grid-display');
get_footer();
?>