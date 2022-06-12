<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function jwr_get_snippet_footer(){
	$the_code = get_field('the_code');
	if( $the_code ){
		$output .= do_shortcode( '[elementor-template id="257"]' ); // this will need updating for other languages
	}

	return $output;
}