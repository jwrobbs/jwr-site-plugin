<?php
if ( ! defined( 'ABSPATH' ) ) exit;


function jwr_article_footer_fn($atts = array(), $content = null){
    ob_start();
    // start output ----------

	$post_type = get_post_type(  );

	// return on post
	
	if( 'post' == $post_type){
		ob_end_clean();
		wp_reset_postdata();
		return;
	}

	//echo "<h3>footer test</h3>";
	// get post type
	
	echo $post_type;

	// return on post
	/*
	if( 'post' == $post_type){
		ob_end_clean;
		return "test 2";
	}*/
	
	// return on tutorial

	// return on review

	// return on code




    //return output ----------
    wp_reset_postdata();
    $thisOutput = ob_get_clean();
    return $thisOutput;
}
    
add_shortcode( 'jwr-article-footer' , 'jwr_article_footer_fn' );