<header>
	<?php 


	$id = get_the_ID();
	$post = get_post($id);
	$select_destination_images = array();

	$args=array(
		'posts_per_page' => -1, 
	    'post_type'      => 'photograph',
	    'category'       => 'featured-image',
	    // '_shuffle_and_pick'     => 10,
	);

$wp_query = new WP_Query( $args );
$posts = $wp_query->posts;
$post = $posts[1];
// var_dump($post);
$post_id = $post->ID;
$field = get_field("destination_tag", $post_id);
$field = $field[0];
foreach($posts as $post){	
	$individual_post_id = $post->ID;
	$field_id = get_field("destination_tag", $individual_post_id);
	$field_id = $field_id[0];
	if($field_id == $id){
		$select_destination_images[] = $post;
	}
}








wp_reset_query();
	partial('widgets.image-slider', ["query"=> $wp_query]); 
	?>
</header>
