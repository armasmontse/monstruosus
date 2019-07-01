<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Cltvo_Page_Company extends Cltvo_PostType_Master
{
    public $what;
    public $why;
    public $how;

	function __construct() {
	    parent::__construct(get_post($GLOBALS['special_pages_ids']['company']));
	}

    public function setMetas() {
        $this->what = Cltvo_What_Company::getMetaValue($this->post);
        $this->why = Cltvo_Why_Company::getMetaValue($this->post);
        $this->how = Cltvo_How_Company::getMetaValue($this->post);
    }
}
