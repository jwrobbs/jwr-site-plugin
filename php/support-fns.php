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
		echo "<div class='home-card'>";
		$taxonomy = get_tax_tag($post->ID); 
		// echo "taxonomy tag";
		if( $taxonomy ){
			// echo "<div class='taxonomy-tag'><a href='$taxonmy['url']>$taxonomy['name']</a></div>";
			echo "<div class='taxonomy-tag'>$taxonomy</div>";
		}
		$link = get_permalink($post->ID);
		echo "<h2><a href='$link'>$post->post_title</a></h2>";

		$fi = get_the_post_thumbnail( $post->ID, 'jwr-archive-thumbnail' );
		if( $fi ){
			echo "<div class='featured-image'><a href='$link'>";
				echo $fi;
			echo "</a></div>";
		}

		// echo "<div class=''></div>";
		echo "<div class='excerpt'>$post->post_excerpt</div>";
		$date = date_create( $post->post_date );
		echo "<div class='home-card-footer'>";
		echo "<div class='date'>" . date_format($date, 'M j, Y') . "</div>";
		echo "<div class='read-more'><a href='$link'>Keep reading >></a></div>";


		echo "</div>";
		echo "</div>";    
	}else{
		return "error - version requested does not exist";
	}
             
}
