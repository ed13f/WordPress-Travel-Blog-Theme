<section class="<?php echo $content_class;?>">	
	<div class="hero-short-screen"></div>
	<article class="hero-content">
		<h1><?php echo(get_the_title($page_id));?></h1>
		<p><?php the_field("hero_subtext"); ?></p>
	</article>
</section>	