<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Cltvo_Page_Contact extends Cltvo_Page {
    
    public $social;

    function __construct() {
        parent::__construct(get_post($GLOBALS['special_pages_ids']['contact']));
    }

    public function setMetas() {
        $this->social = Cltvo_Social_Contact::getMetaValue($this->post);
    }
}
