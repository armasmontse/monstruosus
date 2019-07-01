<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

require_once 'masters/Cltvo_WpEditor.php';

class Cltvo_Process_Product extends Cltvo_WpEditor {
	
	protected $post_type = 'product';

	protected $description_metabox = 'Process';

	/* Define el método donde se mostrará el meta */
	public static function metaboxDisplayRule() {
		return true;
	}

}