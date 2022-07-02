<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Creates custom variables for custom skins for Ele Custom Skins
 *
 * Skins can be used in the loop by Elementor
 * Requires Elementor
 * 
 * This is similar to shortcodes. I don't know the difference.
 *  
 * Filter must return $custom_vars
 * 
 * Format:
		$custom_vars['name'] = $output;
 * 
 * @author	Josh Robbs <josh@joshrobbs.com>
 */
add_filter( 'ecs_vars', function ( $custom_vars ) {


	//? can this be dynamic? Does it know the page data?

	$post_type = get_post_type();

	// this should always return a value, but return default data if it doesn't
	if( $post_type ){
		$id = get_the_ID();
		switch ($post_type) {
			case 'tutorial':
				$difficulties = get_the_terms($id,'difficulties');
				$difficulty = $difficulties[0]->name;
				if( $difficulty == "Apprentice"){
					$article = "an";
				}else {
					$article = "a";
				}
				$output = "$difficulty tutorial";
				break;
			case 'review':
				$review_categories = get_the_terms( $id, 'review-category' );
				$review_category = strtolower($review_categories[0]->name);
				$output = "$review_category review";
				break;
			 case 'code-snippet':
				$output = "code snippet";
				break;
			case 'post':
				$output = "article";
				break;
			default:
				$output = "$post_type";
		}

		$custom_vars['jwr_post_details'] = " ($output)";
	}




	

	return $custom_vars;
});
