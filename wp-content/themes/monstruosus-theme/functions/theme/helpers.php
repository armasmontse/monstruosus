<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

function is_active($slug) {
	return strpos($_SERVER['REQUEST_URI'], $slug) !== false;
}
