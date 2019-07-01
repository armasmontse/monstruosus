<?php 
require_once 'masters/Cltvo_Input_WYSIWYG.php';

class Input_WYSIWYG_Test extends Cltvo_Input_WYSIWYG {
	
	protected $post_type = 'page';

	/* Define el método donde se mostrará el meta */
	public static function metaboxDisplayRule(){
		return isSpecialPage(__('test',TRANSDOMAIN));
	}

}