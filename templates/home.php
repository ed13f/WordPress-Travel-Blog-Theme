<?php
# Template Name: Home

$args=array(
	'posts_per_page' => 3, 
	'orderby' => 'publish_date',
    'order' => 'ASC',
    'post_type'      => 'destination',
    '_shuffle_and_pick'     => 3,
);
$feat_img_args=array(
	'posts_per_page' => -1, 
    'post_type'      => 'photograph',
    'category'       => 'featured-image',
    '_shuffle_and_pick'     => 10,
);
$id = get_the_ID();
$post = get_post($id);
$main_content = $post->post_content;
$main_content = apply_filters('the_content', $main_content);
$lower_content = get_field('lower_content', $id);

the_post();
get_header();
partial('nav.main-nav');
partial('sections.map');
partial('sections.region-section');
partial('sections.content', ['content'=> $main_content]);
partial('sections.featured-image-slider', ['args' => $feat_img_args]);
partial('sections.content', ['content'=> $lower_content]);
partial('sections.recent-trips', ['args' => $args, 'title'=>'Checkout My Most Recent Trips']);

?>


<?php
get_footer();
?>

