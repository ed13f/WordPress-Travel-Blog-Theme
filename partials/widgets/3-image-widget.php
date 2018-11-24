<?php 
$post_counter = 1;
$class = "region-widget-wrapper destination-tile";
$three_region_class = "regions-3-section";
$tile_count = count($query->posts);
if($tile_count == 1){
	$class = $class . " one-column";
	$three_region_class = $three_region_class . " one-column";
}elseif($tile_count == 2){
	$class = $class . " two-column";
	$three_region_class = $three_region_class . " two-column";
}else{
	$class = $class . " three-column";
	$three_region_class = $three_region_class . " three-column";
}
?>


<div class="<?php echo($three_region_class); ?>">
<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
	if( ( $query->current_post + 1 ) == $query->post_count ){ $class .= ' last'; }
	$class .= ' tile-' .  strval($post_counter);
?>

<?php partial('widgets.single-destination-tile', ['class' => $class, 'preview_word_count'=> $preview_word_count]); ?>
<?php $post_counter += 1;
$class .= "region-widget-wrapper destination-tile";
?>

<?php endwhile; endif; ?>
</div>
