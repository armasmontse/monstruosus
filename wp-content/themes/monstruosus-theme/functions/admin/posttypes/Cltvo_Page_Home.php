<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Cltvo_Page_Home extends Cltvo_PostType_Master {
	
    public $gallery;

	function __construct() {
	    parent::__construct(get_post( $GLOBALS['special_pages_ids']['home']));
	}

    public function setMetas() {
    	$this->gallery = array_map(function($image) {
    		return new Cltvo_Img($image['imagen']);
    	}, Cltvo_Galeria_Page::getMetaValue($this->post));
    }
}
