<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Returns a code block
 *
 * @return void
 * 
 * @author	Josh Robbs <josh@joshrobbs.com>
 */

 //? seriously, what is this?
 
function jwr_get_snippet_footer(){
	$the_code = get_field('the_code');
	if( $the_code ){
		$output .= do_shortcode( '[elementor-template id="257"]' ); // this will need updating for other languages
	}

	return $output;
}