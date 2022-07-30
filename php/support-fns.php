<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/*
ToC
1. Create archive card

*/

//# 1. Create archive card
/**
 * Create archive card
 * 
 * @author Josh Robbs<josh@joshrobbs.com>
 *
 * @param [obj] $post
 * @param integer $version
 * @return string
 */
function create_archive_card( $post, $version = 1 ){
	if( !$post ){
		return "error - no post data submitted to card fn";
	}
	if( 1 == $version ){
		$link = get_permalink($post->ID);
		$post_type = $post->post_type;
		$post_type = strtoupper($post_type);
		$title = $post->post_title;
		$excerpt = $post->post_excerpt;
		
		if( $excerpt == "" || $excerpt == null){
			$excertp_2 = $title;
		}else{
			$excertp_2 = $excerpt;
		}

		echo "<div class='home-card'>";

		//container
			echo "<div class='styled-excerpt-container'><a href='$link'>";
				echo "<div class='styled-excerpt'>$excerpt_2</div>"; // excerpt
			echo "</a></div>";
		
		//title
			echo "<div class='title'>";
				echo "<h2><a href='$link'><span class='post_type'>$post_type:</span> $title</a></h2>";
			echo "</div>";		

			echo "<div class='excerpt-container'>";
				echo "<div class='excerpt'>$excerpt</div>"; // excerpt
			echo "</div>";	

			echo "<div class='byline-container'>";
				echo "<div class='byline'>$excerpt</div>"; // excerpt
			echo "</div>";






		// meta line

		// $taxonomy = get_tax_tag($post->ID); 
		// // echo "taxonomy tag";
		// if( $taxonomy ){
		// 	// echo "<div class='taxonomy-tag'><a href='$taxonmy['url']>$taxonomy['name']</a></div>";
		// 	echo "<div class='taxonomy-tag'>$taxonomy</div>";
		// }

		


		// echo "<div class=''></div>";

		// $date = date_create( $post->post_date );
		// echo "<div class='home-card-footer'>";
		// echo "<div class='date'>" . date_format($date, 'M j, Y') . "</div>";
		//echo "<div class='read-more'><a href='$link'>Keep reading >></a></div>";


		// echo "</div>";
		echo "</div>";    
	}else{
		return "error - version requested does not exist";
	}
             
}
