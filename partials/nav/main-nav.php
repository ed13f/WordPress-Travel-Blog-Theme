<nav>
<?php
$menu_class = "menu " . $nav_class;
// $post_id = get_the_ID();
// if($post_id == 12){$menu_class . " photo_page"};
// $post_id == 12 ? $menu_class = $menu_class . " photo_page" : $menu_class);
// var_dump($post_id);


wp_nav_menu( array( 'menu' => 'main-menu', 'menu_class' => $menu_class, 'container_class' => 'main-menu-class', 'container' => 'div') );
?>
<button class="mobile-menu-button">
	<div id="menu-line-1" class="mobile-menu-line"></div>
	<div id="menu-line-2" class="mobile-menu-line"></div>
	<div id="menu-line-3" class="mobile-menu-line"></div>
</button>
</nav>
