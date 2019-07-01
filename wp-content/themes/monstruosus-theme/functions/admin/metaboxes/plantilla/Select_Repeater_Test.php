<?php
require_once 'masters/Cltvo_Select_Repeater.php';

class Select_Repeater_Test extends Cltvo_Select_Repeater {

	protected $post_type = 'page';

	/* Define el método donde se mostrará el meta */
	public static function metaboxDisplayRule() {
		return isSpecialPage(__('test',TRANSDOMAIN));
	}

}