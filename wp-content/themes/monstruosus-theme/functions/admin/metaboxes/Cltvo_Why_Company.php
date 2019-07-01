<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

require_once 'masters/Cltvo_WpEditor.php';

class Cltvo_Why_Company extends Cltvo_WpEditor {
	
	protected $post_type = 'page';

	protected $description_metabox = 'Why';

	/* Define el método donde se mostrará el meta */
	public static function metaboxDisplayRule() {
		return isSpecialPage('company');
	}

}