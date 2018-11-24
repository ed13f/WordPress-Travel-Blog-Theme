<?php
$preview_text = get_field("preview_text");
$preview_text = wp_trim_words( $preview_text, $num_words = $preview_word_count, $more = null ); 

?>



<article class="<?php echo $class; ?>">
	<?php the_post_thumbnail(); ?>
	<a class="link-screen" href="<?php the_permalink(); ?>"></a>
	<div class="tile-content">
	<h2 class="tile-title"><?php the_title(); ?></h2>
	<P><?php echo($preview_text); ?><button class="view-tile">&rarr;</button> </P>
	</div>
	<!-- <button class="view-tile">View</button> -->
</article>