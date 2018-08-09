<?php 
$class = "region-widget-wrapper destination-tile";


?>


<div class="regions-3-section">
<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); 
	if( ( $query->current_post + 1 ) == $query->post_count ){ $class .= ' last'; } 
?>

	<div class="<?php echo $class; ?>" style="background-image:url(<?php the_post_thumbnail_url(); ?>)">
		<a class="link-screen" href="<?php the_permalink(); ?>"></a>
		<div class="date"><?php echo get_the_date("F / y"); ?></div>
		<h3 class="tile-title"><?php the_title(); ?></h3> 
	</div>

<?php endwhile; endif; ?>
</div>
