<section class="featured-image-hero">
	<?php 
		$args=array(
			'posts_per_page' => -1, 
		    'post_type'      => 'photograph',
		    'category'       => 'featured-image',
		    '_shuffle_and_pick'     => 10,
		);

		$wp_query = new WP_Query( $args );
		wp_reset_query();
		partial('widgets.image-slider', ["query"=> $wp_query]);   ?>
</section>
