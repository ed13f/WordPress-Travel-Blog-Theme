<?php
# Template Name: Home

$id = get_the_ID();
$post = get_post($id);
$main_content = $post->post_content;
$feature_img_id = get_post_thumbnail_id( $id );
$main_content = apply_filters('the_content', $main_content);
$lower_content = get_field('lower_content', $id);
$preview_word_count = 15;
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
    'post__not_in' => array($feature_img_id),
);


the_post();
get_header();

partial('sections.map');
partial('sections.region-section', ['preview_word_count'=> $preview_word_count]);
partial('sections.content', ['content'=> $main_content]);
partial('sections.featured-image-slider', ['args' => $feat_img_args]);
partial('sections.content', ['content'=> $lower_content]);
partial('sections.recent-trips', ['args' => $args, 'title'=>'Checkout My Most Recent Trips', 'preview_word_count'=> $preview_word_count]);

?>


<?php
get_footer();
?>

