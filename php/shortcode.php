<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Summary
 * 
 * Adds shortcodes to the site
 * 
 */



 /**
  * Wraps $content in <pre> tags
  *
  * @return string
  */
function jwr_code_fn($atts = array(), $content = null){
    ob_start();
    // start output
    echo "<pre class='jwr-snippet'>";
    echo $content;
    echo "</pre>";
    //return output
    wp_reset_postdata();
    $thisOutput = ob_get_clean();
    return $thisOutput;
}
    
add_shortcode( 'jwr-code' , 'jwr_code_fn' );


/**
 * Creates list of post type archives based on $cpt_array
 *
 * @return string
 */
function jwr_home_cpt_links_fn($atts = array(), $content = null){
    ob_start();

    // start output
    $cpt_array = array(
        'post',
        'tutorial',
        'review',
        'code-snippet',
    );
    foreach( $cpt_array as $cpt ){
        // get proper name and url
        $cpt_obj = get_post_type_object($cpt);
        $link = get_post_type_archive_link($cpt);
        
        //output
        $label = $cpt_obj->label;
        if( $label ){
            echo "<a href='$link'>$label</a><br>";
        }
    }

    //return output
    wp_reset_postdata();
    $thisOutput = ob_get_clean();
    if( $thisOutput ){
        $thisOutput = "<div class='home-pt-link-container'>$thisOutput</div>";
    }
    return $thisOutput;
}
    
add_shortcode( 'jwr_home_cpt_links' , 'jwr_home_cpt_links_fn' );