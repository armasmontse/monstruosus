<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

require_once 'masters/Cltvo_WpEditor.php';

class Cltvo_Care_Product extends Cltvo_WpEditor {
	
	protected $post_type = 'product';

	protected $description_metabox = 'Care & Use';

	/* Define el método donde se mostrará el meta */
	public static function metaboxDisplayRule() {
		return true;
	}

}