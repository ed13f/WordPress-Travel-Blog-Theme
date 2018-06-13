<?php 
wp_reset_query();
$id = get_the_ID();
$post = get_post($id);
$content = $post->post_content;
$content = apply_filters('the_content', $content);

?>



<section class="content">
	<?php echo $content; ?>
</section>