<?php 
$args=array(
	'posts_per_page' => -1, 
    'post_type'      => 'destination',
    'category'       => 'region',
    '_shuffle_and_pick'     => 3,
);

$wp_query = new WP_Query( $args );
wp_reset_query();
?>

<section class="regions-3-section neg-top-margin homepage-map-3-region">
<?php partial('widgets.3-image-widget', ['query' => $wp_query, 'preview_word_count'=> $preview_word_count]); ?>
</section>

