<?php
if ( ! defined( 'ABSPATH' ) ) exit;
// [] add toc

/**
 * Summary
 * 
 * Adds shortcodes to the site
 * 
 * @author  Josh Robbs <josh@joshrobbs.com> 
 */


 /**
  * Wraps $content in <pre> tags
  *
  * @return string
  */

  //# code output sc
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
//# cpt links menu
//??? am i even keeping this?
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
            echo "<a href='$link'>$label</a>";
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

//# Shortcode: home page blog grid

function home_grid_fn($atts = array(), $content = null){
    // setup  
    $posts_per_page = 12;
    $cpts = array('tutorial','review','code-snippet', 'post');

    $args = array(
        'numberposts'   => 12,
        'post_type'     => $cpts,
        'post_status'   => 'publish',
    );
       
    $posts = get_posts( $args );

    // start output
    ob_start();

    if( $posts ){
        echo "<div class='archive-grid'>";
        foreach($posts as $post){

            $card = create_archive_card($post);
            echo $card;
       
        }
        echo "</div>";

    }else{
        echo "Something is wrong: no posts.";
    }

    // var_dump($posts);

    //return output
    wp_reset_postdata();
    $thisOutput = ob_get_clean();
    return $thisOutput;
}
    
add_shortcode( 'home-grid' , 'home_grid_fn' );

//# get taxonomy tag info fn
function get_tax_tag($post_id){
    // $terms = wp_get_post_terms( $post_id );
    // if( $terms ){

    // }

    $terms = get_the_term_list($post_id,'category', '',', ');
    return $terms;
}