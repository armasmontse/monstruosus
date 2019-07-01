<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

require_once 'masters/Cltvo_WpEditor.php';

class Cltvo_Dimensions_Product extends Cltvo_WpEditor {
	
	protected $post_type = 'product';

	protected $description_metabox = 'Dimensions';

	protected static $media_buttons = true;

	/* Define el método donde se mostrará el meta */
	public static function metaboxDisplayRule() {
		return true;
	}

	/* 
	Es la funcion que muestra el contenido del metabox
	@param object $object en principio es un objeto de WP_post
	*/
	public function CltvoDisplayMetabox($object) {
		?>
			<table class="" cellpadding="0" cellspacing="0">
				<tbody id="">
					<tr>
						<?php wp_editor($this->meta_value, strtolower($this->meta_key), array(
							'textarea_name'	=> 	$this->meta_key,
							'media_buttons'	=> 	true
						)) ?>							
					</tr>
				</tbody>
			</table>
	<?php 
	}
}