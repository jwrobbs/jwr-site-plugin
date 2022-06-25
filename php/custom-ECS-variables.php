<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_filter( 'ecs_vars', function ( $custom_vars) {

	// Format
	/*
	$custom_vars['VARIABLE TO ADD'] = OUTPUT;
	*/

	//? can this be dynamic? Does it know the page data?




	return $custom_vars;
});