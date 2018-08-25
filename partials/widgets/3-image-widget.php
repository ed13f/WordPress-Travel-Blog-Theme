<?php 
$class = "region-widget-wrapper destination-tile";


?>


<div class="regions-3-section">
<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
	if( ( $query->current_post + 1 ) == $query->post_count ){ $class .= ' last'; } 
?>

<?php partial('widgets.single-destination-tile', ['class' => $class]); ?>

<?php endwhile; endif; ?>
</div>
