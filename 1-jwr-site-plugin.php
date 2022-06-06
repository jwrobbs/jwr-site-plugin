<?php
/**
 * Plugin Name: 1 - JWR site plugin
 * Author: Josh Robbs
 */

/*
0. Include coding fns
1. Create post types
	1.1 Create taxonomies
2. Add shortcode
3. Add meta block for single posts
4. Add functions for review
*/

//// 1. Create post types
include_once(plugin_dir_path( __FILE__ )."php/cpts.php");
	//// 1.1 Create taxonomies
	include_once(plugin_dir_path( __FILE__ )."php/taxonomies.php");
//// 2. Add shortcode
include_once(plugin_dir_path( __FILE__ )."php/shortcode.php");
//// 3. Add meta block for single posts
include_once(plugin_dir_path( __FILE__ )."php/post-meta.php");
//// 4. Add functions for review
include_once(plugin_dir_path( __FILE__ )."php/reviews.php");