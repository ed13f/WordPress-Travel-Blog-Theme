<?php 
$wp_query = new WP_Query( $args );
wp_reset_query();
?>

<section class="recent-trips">
	<h2><?php echo($title);?></h2>
	<?php partial('widgets.3-image-widget', ['query' => $wp_query]); ?>
</section>