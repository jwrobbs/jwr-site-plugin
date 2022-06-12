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
	}elseif( 'tutorial' == $post_type){ // return on tutorial
		echo "$post_type <br />";
	}elseif( 'review' == $post_type){ // return on review
		echo do_shortcode( '[jwr-review-footer]' );
	}elseif( 'snippet' == $post_type){ // return on code
		echo "$post_type <br />";
	}else{
		echo "No post type match: $post_type";
	}




    //return output ----------
    wp_reset_postdata();
    $thisOutput = ob_get_clean();
    return $thisOutput;
}
    
add_shortcode( 'jwr-article-footer' , 'jwr_article_footer_fn' );