<?php
/**
 * Plugin Name: 1 - JWR site plugin
 * 
 */

/*
0. Include coding fns
1. Create post types
2. Add shortcode
*/

//// 1. Create post types
include_once(plugin_dir_path( __FILE__ )."php/cpts.php");
//// 1. Create taxonomies
include_once(plugin_dir_path( __FILE__ )."php/taxonomies.php");
//// 3. Add shortcode
include_once(plugin_dir_path( __FILE__ )."php/shortcode.php");


