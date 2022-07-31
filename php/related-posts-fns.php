<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function jwr_related_posts_fn($count = 4){
	// get data
	global $wpdb;
	$post_id = get_the_ID();
	$post_tag_objects = get_the_terms( $post_id, 'post_tag' ); // term objs of this post's tags
	// if( $count < 6 || !is_int($count)){ //if count too low or isn't an interger, use 10
	// 	$query_max = 10;
	// }else{
	// 	$query_max = $count * 2;
	// }

	$post_tags = array(); // term ids of this posts's tags
	
	$term_count = 0;
	$term_string = "("; // term_string is basically a comma separated version of $post_tags for use in a custom query
	// final format ("3", "345", "123")
	foreach( $post_tag_objects as $post_tag_object ){
		if( $term_count != 0 ){
			$term_string .= ", "; 
		}else{
			$term_count = 1;
		}
		$term_string .= '"' . $post_tag_object->term_id . '"';
	}
	$term_string .= ")";

	//query for matches to term_id
	
	$query = "SELECT * FROM `$wpdb->term_relationships` WHERE `term_taxonomy_id` IN $term_string";
	// this query only uses values querried for and generated in this fn
	// $query2 = 'SELECT * FROM `wp_term_relationships` WHERE `term_taxonomy_id` IN ("22", "21", "20")';

	$results = $wpdb->get_results( $query );
	$tally = array(); 

	// post_id => count
	foreach( $results as $result ){
		$this_post_id = $result->object_id;
		// $this_term_id = $result['term_taxonomy_id'];

		if( $this_post_id == $post_id ){
			continue; //skip if is current post
		}
		$tally[$this_post_id] = $tally[$this_post_id] + 1;
		
	}

	//order array
	arsort($tally);
	$related_items = array_keys($tally);
	ob_start();
	// start output
	echo "<div class='related-items'>";
	echo "<h2>Related posts</h3>";
	// var_dump($tally);
	var_dump($related_items);

	$related_loop = new WP_Query( array( 
		'post__in' 		=> $related_items, 
		'post_status'	=> 'publish',
		'post_type'		=> 'any'

		) 
	);




	// $args = array(
	// 	// 'posts_per_page'	=> -1,
	// 	'post__in' 			=> $related_items, 
	// 	'post_status'		=> 'publish',
	// );
	// $posts = get_posts($args); // array of post objects





	echo "<pre>";
	var_dump($related_loop->posts);
	echo "</pre>";
	/* 
	while I could do a single large query to get every post in the list,
	how would I ensure that I'm getting the top posts?
	*/
	// $related_loop = new WP_Query( array( 
	// 	'post_type' 	=> 'page', 
	// 	'post__in' 		=> $related_items, 
	// 	'post_status'	=> 'publish',

	// 	) 
	// );

	/*
	$related_count = 0;
	echo "<ul>";
	foreach( $related_items as $related_item ){
		$this_item = get_post( $related_item, 'OBJECT' );
		if( $this_item->post_status != 'publish' ){
			continue; // skip if it isn't published
		}
		$this_id = $this_item->ID;
		$this_title = $this_item->post_title;
		$this_link = get_permalink($this_id);
		$this_type = $this_item->post_type;
		
		echo "<li><a href='$this_link'><span>$this_type: </span>$this_title</a></li>";
	}
	echo "</ul></div>";
*/

	// var_dump($tally);
	// var_dump($related_items);
	// var_dump($query2);
	// var_dump($tally);
	//return output
	wp_reset_postdata();
	$thisOutput = ob_get_clean();
	return $thisOutput;
	}
	
	
	add_shortcode( 'jwr-related-posts' , 'jwr_related_posts_fn' );
