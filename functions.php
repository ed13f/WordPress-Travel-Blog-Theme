<?php

//=====================================[FUNCTIONS]=====================================//

function partial($path, $vars = [], $echo = true) {
	foreach($vars as $k => $v) $$k = $v;
	$path = trim(str_replace('.php', '', $path));
	$path = str_replace('.', '/', $path);
	if(!$echo) ob_start();
	include get_template_directory().'/partials/'.$path.'.php';
	if(!$echo) return ob_get_clean();

}



function wpdocs_register_my_setting() {
    register_setting( 'my_options_group', 'general_settings'); 
} 
add_action( 'admin_init', 'wpdocs_register_my_setting' );




//=====================================[INCLUDES]=====================================//
include_once get_template_directory().'/inc/less-compiler.php';
// include_once get_template_directory().'/inc/reset.php';


//=====================================[POST TYPES]=====================================//

function create_post_type_destinations() {
  register_post_type( 'destination',
    array(
      'labels' => array(
        'name' => __( 'Destinations' ),
        'singular_name' => __( 'Destination' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon'   => 'dashicons-location-alt',
      'taxonomies' => array('category'),
      'supports' => array( 'thumbnail', 'title', 'editor' ),
      
    )
  );
}
add_action( 'init', 'create_post_type_destinations' );


function create_post_type_region() {
  register_post_type( 'region',
    array(
      'labels' => array(
        'name' => __( 'Regions' ),
        'singular_name' => __( 'Region' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon'   => 'dashicons-admin-site',
      'taxonomies' => array('category'),
      'supports' => array( 'thumbnail', 'title', 'editor' )
    )
  );
}
add_action( 'init', 'create_post_type_region' );




function create_post_type_photographs() {
  register_post_type( 'photograph',
    array(
      'labels' => array(
        'name' => __( 'Photographs' ),
        'singular_name' => __( 'Photograph' )
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon'   => 'dashicons-format-image',
      'taxonomies' => array('category'),
      'supports' => array( 'thumbnail', 'title', 'editor' )
    )
  );
}
add_action( 'init', 'create_post_type_photographs' );

add_theme_support( 'post-thumbnails' ); 



//=====================================[Misc]=====================================//



function register_my_menu() {
  register_nav_menu('main-menu',__( 'Main Menu' ));
}
add_action( 'init', 'register_my_menu' );

/**
 * Plugin Name: Support for the _shuffle_and_pick WP_Query argument.
 */
add_filter( 'the_posts', function( $posts, \WP_Query $query )
{
    if( $pick = $query->get( '_shuffle_and_pick' ) )
    {
        shuffle( $posts );
        $posts = array_slice( $posts, 0, (int) $pick );
    }
    return $posts;
}, 10, 2 );




















?>

