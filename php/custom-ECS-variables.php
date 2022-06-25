<?php
if ( ! defined( 'ABSPATH' ) ) exit;

add_filter( 'ecs_vars', function ( $custom_vars) {







	return $custom_vars;
});