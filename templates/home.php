<?php

# Template Name: Home

$args=array(
	'posts_per_page' => 3, 
	'orderby' => 'publish_date',
    'order' => 'ASC',
    'post_type'      => 'destination',
    '_shuffle_and_pick'     => 3,
);

the_post();
get_header();
partial('nav.main-nav');
partial('sections.map');
partial('sections.region-section');
partial('sections.content');
partial('sections.featured-image-slider');
partial('sections.recent-trips', ['args' => $args, 'title'=>'Checkout My Most Recent Trips']);

?>


<?php
get_footer();
?>

