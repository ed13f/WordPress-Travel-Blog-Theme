<?php 
$args=array(
	'posts_per_page' => 3, 
	'orderby' => 'publish_date',
    'order' => 'ASC',
    'post_type'      => 'destination',
    '_shuffle_and_pick'     => 3,
);

$wp_query = new WP_Query( $args );
wp_reset_query();
?>
<section class="recent-trips">
	<h2>Checkout My Most Recent Trips</h2>
		<?php partial('widgets.3-image-widget', ['query' => $wp_query]); ?>
</section>