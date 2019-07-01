<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Cltvo_Product extends Cltvo_PostType_Master {

	public $process;
	public $care_and_use;
	public $material;
	public $dimensions;
	public $gallery;

	public function setMetas() {
		$this->process = Cltvo_Process_Product::getMetaValue($this->post);
		$this->care_and_use = Cltvo_Care_Product::getMetaValue($this->post);
		$this->material = Cltvo_Material_Product::getMetaValue($this->post);
		$this->dimensions = Cltvo_Dimensions_Product::getMetaValue($this->post);
		$this->gallery = array_map(function($image) {
			return new Cltvo_Img($image['imagen']);
		}, Cltvo_Galeria_Product::getMetaValue($this->post));
	}
}