<?php

# Template Name: Home

the_post();
get_header();
partial('nav.main-nav');
partial('sections.map');
partial('sections.region-section');
partial('sections.content');
partial('sections.featured-image-slider');
partial('sections.recent-trips');

?>


<?php
get_footer();
?>

