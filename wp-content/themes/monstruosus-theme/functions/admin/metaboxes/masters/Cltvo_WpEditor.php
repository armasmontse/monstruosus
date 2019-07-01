<?php


class Cltvo_WpEditor extends Cltvo_Metabox_Master {

	/* Sobre escribiendo las opcciones del master */
	protected $description_metabox = 'Agrega tu texto';
	protected $post_type = 'page';
	protected $prioridad = 'high';

	protected static $media_buttons = false;

	/* Define el metodo que inicializa el valor del meta */
	public static function setMetaValue($meta){
		return isset($meta) ? $meta :  '';
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
							'media_buttons'	=> 	self::$media_buttons
						)) ?>							
					</tr>
				</tbody>
			</table>
	<?php 
	}
}


