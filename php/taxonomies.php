<?php
add_action( 'init', 'jwr_custom_taxonomies', 0 );
 
function jwr_custom_taxonomies() {

	$labels = array(
    	'name' => 'Difficulty',
    	'singular_name' => 'Difficulty',
    	'search_items' =>  'Search Difficulty Levels',
    	'all_items' => 'All Difficulty Levels',
    	'edit_item' => __( 'Edit Difficulty' ), 
    	'update_item' => __( 'Update Difficulty' ),
    	'add_new_item' => __( 'Add New Difficulty' ),
    	'new_item_name' => __( 'New Difficulty' ),
    	'menu_name' => __( 'Difficulties' ),
  	);    
 
// Now register the taxonomy
  	register_taxonomy('difficulties',array('snippet','tutorital'), array(
		'hierarchical' => false,
		'labels' => $labels,
		'public'	=> true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'difficulty' ),
  	));
	/*
	$labels = array(
    	'name' => 'Functions',
    	'singular_name' => 'Function',
    	'search_items' =>  'Search Functions',
    	'all_items' => 'All Functions',
    	'edit_item' => __( 'Edit Function' ), 
    	'update_item' => __( 'Update Function' ),
    	'add_new_item' => __( 'Add New Function' ),
    	'new_item_name' => __( 'New Function' ),
    	'menu_name' => __( 'Functions' ),
  	);    
 
// Now register the taxonomy
  	register_taxonomy('function',array('snippet', 'tutorital'), array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'functions' ),
  	));
	*/


	
	  $labels = array(
    	'name' => 'Code topics',
    	'singular_name' => 'Code topic',
    	'search_items' =>  'Search Code topics',
    	'all_items' => 'All Code topics',
    	'edit_item' => __( 'Edit Code topic' ), 
    	'update_item' => __( 'Update Code topic' ),
    	'add_new_item' => __( 'Add New Code topic' ),
    	'new_item_name' => __( 'New Code topic' ),
    	'menu_name' => __( 'Code topics' ),
  	);    
 
// Now register the taxonomy
  	register_taxonomy('code-topic',array('snippet','tutorital'), array(
		'hierarchical' => false,
		'labels' => $labels,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'code-topics' ),
  	));


 
}