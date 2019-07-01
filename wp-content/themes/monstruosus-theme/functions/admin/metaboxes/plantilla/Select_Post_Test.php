<?php
require_once 'masters/Cltvo_Select_Post.php';

class Select_Post_Test extends Cltvo_Select_Post {

	protected $position = 'side';
	protected $post_type = 'page';

	/* Define el método donde se mostrará el meta */
	public static function metaboxDisplayRule() {
		return isSpecialPage(__('test',TRANSDOMAIN));
	}

}