<?php
require_once 'masters/Cltvo_Input_Repeater.php';

class Input_Repeater_Test extends Cltvo_Input_Repeater {

	protected $post_type = 'page';

	/* Define el método donde se mostrará el meta */
	public static function metaboxDisplayRule() {
		return isSpecialPage(__('test',TRANSDOMAIN));
	}

}