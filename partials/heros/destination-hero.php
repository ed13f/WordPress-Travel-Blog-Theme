<?php 
$content_class = "hero-content-wrapper general-content";


?>

<header class="destination-hero" style="background-image: url(<?php echo($hero_image_url); ?>);">
	<?php partial('nav.main-nav'); ?>
	<?php partial('widgets.hero-content', ['content_class' => $content_class]); ?>
	<div class="hero-screen"></div>
</header>