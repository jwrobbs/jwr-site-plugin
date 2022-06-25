<?php
if ( ! defined( 'ABSPATH' ) ) exit;


function jwr_article_footer_fn($atts = array(), $content = null){
    ob_start();
    // start output ----------

	$post_type = get_post_type(  );

	
	
	if( 'post' == $post_type){ // return on post
		ob_end_clean();
		wp_reset_postdata();
		return;
	}elseif( 'tutorial' == $post_type){ // tutorial
		ob_end_clean();
		wp_reset_postdata();
		return;
	}elseif( 'review' == $post_type){ // review
		echo do_shortcode( '[jwr-review-footer]' );
	}elseif( 'snippet' == $post_type){ // code
		echo "<h2>The Code</h2>";
		echo jwr_get_snippet_footer(); // this will need updating for other languages
	}else{
		echo "No post type match for '$post_type'";
	}




    //return output ----------
    wp_reset_postdata();
    $thisOutput = ob_get_clean();
    return $thisOutput;
}
    
add_shortcode( 'jwr-article-footer' , 'jwr_article_footer_fn' );