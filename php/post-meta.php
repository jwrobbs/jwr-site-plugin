<?php

function jwr_post_meta_fn($atts = array(), $content = null){
    ob_start();
    // start output

	// get post data
	$id = get_the_ID();
	$post_type = get_post_type($id);
	// get relevant data
	// author, date, category, tag, 

	$author = get_the_author_meta('nickname');
	$author_id = get_the_author_meta('ID');
	$author_link = get_author_posts_url($author_id);

	$post_date = get_the_date();

	$category = get_the_term_list($id,'category', "Filed under: ",', ');
	$my_tags = get_the_term_list($id,'post_tag', "Topics: ",', ');
	
		$difficulty = get_the_term_list($id,'difficulties', "Difficulty: ",', ');
		$required_plugins = get_field('required_software');
		$code_topics = get_the_term_list($id,'code-topic', "Topics: ",', ');
		$functions = get_the_term_list($id,'function', "Difficulty: ",', ');
		// these were in an if statement. do i actually need it? Do I save that much time?


	// display data with style
	?>
	<style>
		.custom-meta {
			text-align: right;
		}
	</style>
	<?php
	echo "<div class='custom-meta'>";
	echo "This $post_type was<br />";
	echo "published by <a href='$author_link'>$author</a><br />";
	echo "on $post_date<br />";
	$mod_date = get_the_modified_date( );
	//? add last updated?
	if($category) {
		echo "$category";
	}
	if($my_tags) {
		echo "$my_tags";
	}
	if($difficulty) {
		echo "$difficulty<br />";
	}
	if($required_plugins) {
		echo "<hr>";
		echo "Required plugins:<br />";
		foreach($required_plugins as $plugin){
			$link = get_permalink($plugin->ID);
			$plugin_list_array[] = "<a href='$link->'>$plugin->post_title</a>";
		}
		$plugin_list = implode(", ",$plugin_list_array);
		echo $plugin_list;
		echo "<hr>";
	}
	if($functions) {
		echo "$functions";
	}
	
	if($code_topics) {
		echo "$code_topics<br />";
	}
	echo "</div>";
    //return output
    wp_reset_postdata();
    $thisOutput = ob_get_clean();
    return $thisOutput;
}
    
add_shortcode( 'jwr-post-meta' , 'jwr_post_meta_fn' );