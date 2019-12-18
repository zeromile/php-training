<?php
/*
* Plugin Name: Custom Directory Plugin
* Description: A custom post type
*  Author: Me
*  Author URI: Https://www.jasonlee.com
*  Version: 1.0
*/

function register_custom_post_type() {
  $args = [
    'labels' => [
      'name' => 'Directory',
      'singular_name' => 'Directory Listing',
      'add_new_item' => 'Add Directory Listing'
    ],
    'public' => true,
    'supports' => [
      'title', 'thumbnail', 'editor' //these are the options for what shows on the page thing
    ],
    'taxonomies' => []
  ];
  // register our Custom directory using the args above
  // the namd of the post type can't be more than 20 characters
  register_post_type('dir_custom_posts', $args);
}

//finding the template file\directory
function custom_include_template_function( $template_path ) {
  if( get_post_type() == 'my_directory'){
    if(is_single()){
      if ($theme_file == locate_template(['single-my_directory.php']){
        $template_path = $theme_file;
      } else {
        $template_path = plugin_dir_path(__FILE__) . '/single-my_directory.php');
      }
    }
  }
  return $template_path;
}

//add_action ( when, what )
add_action('init', 'register_custom_post_type')

//filters change information
add_filter('template_include', 'custom_include_template_function')
