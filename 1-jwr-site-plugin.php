<?php
if ( ! defined( 'ABSPATH' ) ) exit;
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
5. Add article footer
6. Add snippet footer
7. Add Ele Custom Themes variables
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
//// 5. Add article footer
include_once(plugin_dir_path( __FILE__ )."php/article-footer.php");
//// 6. Add snippet footer
include_once(plugin_dir_path( __FILE__ )."php/snippet-footer.php");
//// 7. Add Ele Custom Themes variables
include_once(plugin_dir_path( __FILE__ )."php/custom-ECT-variables.php");