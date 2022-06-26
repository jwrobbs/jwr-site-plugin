<?php
if ( ! defined( 'ABSPATH' ) ) exit;
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
        
        //output
        $label = $cpt_obj->label;
        if( $label ){
            echo "<a href='$cpt'>$label</a><br>";
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