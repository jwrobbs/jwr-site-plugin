<?php
if ( ! defined( 'ABSPATH' ) ) exit;

// format

/*
add_action( 'elementor/query/<the query ID>', function( $query ) {
    $query->set( 'post_type', [ 'custom-post-type1', 'custom-post-type2' ] ); // the query modifications you want to make
} );

/*
	# list of query vars
	https://codex.wordpress.org/WordPress_Query_Vars
	https://developer.wordpress.org/reference/classes/wp_query/

	This solution found originally at https://www.scratchcode.io/add-multiple-post-types-in-posts-widget-in-elementor/
*/

*/
add_action( 'elementor/query/all_posts', function( $query ) {
    $query->set( 'post_type', [ 'post', 'review', 'tutorial', 'review','code-snippet' ] ); 
	$query->set('post_status ','publish');
} );

