<?php
if ( ! defined( 'ABSPATH' ) ) exit;
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

	$post_date = get_the_date('F j, Y');

	$category = get_the_term_list($id,'category', "Filed under: ",', ');
	$my_tags = get_the_term_list($id,'post_tag', "Topics: ",', ');
	
	$difficulty = get_the_term_list($id,'difficulties', "Difficulty: ",', ');
	$required_plugins = get_field('required_software');
	$related_code_snippets = get_field('related_code_snippets');
	$code_topics = get_the_term_list($id,'code-topic', "Topics: ",', ');
		// these were in an if statement. do i actually need it? Do I save that much time?


	// display data with style
	?>
	<style>
		.custom-meta {
			text-align: right;
		}
		.custom-meta hr {
			margin: 1rem 0;
		}
	</style>
	<?php
	echo "<div class='custom-meta'>";
	echo "This $post_type was";
	echo " published by <a href='$author_link'>$author</a>";
	echo " on $post_date";
	$mod_date = get_the_modified_date('F j, Y');
	if($mod_date != $post_date) {
		echo " (last update: $mod_date)";
	}

	if($category) {
		echo "<br />$category";
	}
	if($my_tags) {
		echo "<br />$my_tags";
	}
	if($difficulty) {
		echo "<hr>";
		echo "$difficulty";
	}
	if($required_plugins) {
		echo "<hr>";
		echo "Required plugins:<br />";
		foreach($required_plugins as $plugin){
			$link = get_permalink($plugin->ID);
			$plugin_list_array[] = "<a href='$link'>$plugin->post_title</a>";
		}
		$plugin_list = implode(", ",$plugin_list_array);
		echo $plugin_list;
	}
	if($related_code_snippets) {
		echo "<hr>";
		echo "Related code snippets:<br />";
		foreach($related_code_snippets as $snippet){
			$link = get_permalink($snippet->ID);
			$snippet_list_array[] = "<a href='$link'>$snippet->post_title</a>";
		}
		$snippet_list = implode(", ",$snippet_list_array);
		echo $snippet_list;
	}
	
	if($code_topics) {
		echo "<hr><div>$code_topics</div>";
	}
	echo "</div>";
    //return output
    wp_reset_postdata();
    $thisOutput = ob_get_clean();
    return $thisOutput;
}
    
add_shortcode( 'jwr-post-meta' , 'jwr_post_meta_fn' );