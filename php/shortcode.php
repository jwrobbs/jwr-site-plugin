<?php

function jwr_code_fn($atts = array(), $content = null){
    ob_start();
    // start output
    echo "<pre class='jwr-snippet'>";
    echo $content;
    echo "</pre>";
    echo "<textarea>";
    echo $content;
    echo "</textarea>";
    //return output
    wp_reset_postdata();
    $thisOutput = ob_get_clean();
    return $thisOutput;
}
    
add_shortcode( 'jwr-code' , 'jwr_code_fn' );