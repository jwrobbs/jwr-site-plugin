<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function jwr_related_posts_fn( $args ){

	$defaults = array(
		'count' => 4,
	);
	$args = wp_parse_args( $args, $defaults );
	$count = $args['count'];
	if( !is_int($count) ){ // if count isn't an interger
		$count = 4;
	}
	/* I don't think I need this. Will leave to test once the site is more populated
	if( $count < 6 ){ //if count too low, use 10 
		// do I still need this malarkey?
		// YES, the initial taxonomy term query cannot separate published posts
		// max query provides padding so that... wait I might be wrong
		$query_max = 10;
	}else{
		$query*/


	// get data
	global $wpdb;
	$post_id = get_the_ID();
	$post_tag_objects = get_the_terms( $post_id, 'post_tag' ); // term objs of this post's tags
	
	// $post_tags = array(); // term ids of this posts's tags - I don't think this is used any longer
	
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

	$results = $wpdb->get_results( $query );
	$tally = array(); 

	// post_id => count
	foreach( $results as $result ){
		$this_post_id = $result->object_id;
		// $this_term_id = $result['term_taxonomy_id'];

		if( $this_post_id == $post_id ){
			continue; //skip if is current post
		}
		$tally[$this_post_id] = $tally[$this_post_id] + 1; // increment on match
		
	}

	//order array
	arsort($tally);
	$related_items = array_keys($tally);

	// get related items

	$related_query_results = new WP_Query( array( 
		'post__in' 			=> $related_items, 
		'post_status'		=> 'publish',
		'post_type'			=> 'any', // this won't be an issue because query is limited by post_ids
		'posts_per_page'	=>	$query_max,
		) 
	);
	$related_loop = $related_query_results->posts;

	ob_start();
	// start output
	echo "<div class='related-items'>";
	echo "<h2>Related articles</h3>";

	// var_dump($related_loop);

	echo "<ul>";
	$this_count = 0;

	// create simpler list of values
	$column_ids = array_column( $related_loop, 'ID' );
	// var_dump($column_ids);
	foreach( $related_items as $related_item ){	
		if( $this_count >= $count ){
			break;
		}

		$this_key = array_search( $related_item, $column_ids );
		$this_post = $related_loop[$this_key];

		$this_post_type = $this_post->post_type;
		$this_title = $this_post->post_title;
		$this_link = get_the_permalink($this_post->ID);
		echo "<li><a href='$this_link'><span>$this_post_type: </span>$this_title</a></li>";

		$this_count++;
	}

	echo "</ul>";

	// var_dump($tally);
	//return output
	wp_reset_postdata();
	$thisOutput = ob_get_clean();
	return $thisOutput;
	}
	
	
	add_shortcode( 'jwr-related-posts' , 'jwr_related_posts_fn' );
