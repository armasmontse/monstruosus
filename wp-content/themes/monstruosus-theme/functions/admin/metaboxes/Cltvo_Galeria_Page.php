<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

require_once 'masters/Cltvo_Galeria.php';

class Cltvo_Galeria_Page extends Cltvo_Galeria
{    
    protected $post_type = 'page';

    public static function metaboxDisplayRule() {
    	return isSpecialPage('home');
    }
}
