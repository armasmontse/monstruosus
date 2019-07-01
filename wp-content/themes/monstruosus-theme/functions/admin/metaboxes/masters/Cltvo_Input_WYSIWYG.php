<?php

class Cltvo_Input_WYSIWYG extends Cltvo_Metabox_Master {


	/* Sobre escribiendo las opcciones del master */
	protected $description_metabox = 'Introducción';


	/* Array de metas */
	protected static $fields = [ 
		'wywiwyg' => 'WYSIWYG',
		'input' => 'Input',
	];


	/* Define el metodo que inicializa el valor del meta */
	public static function setMetaValue($meta){
		$meta = is_array($meta) ? $meta : [] ;
		foreach (self::$fields as $red => $imagen) {
			$meta[$red] = isset($meta[$red]) ? $meta[$red] : '';
		}
		return $meta;
	}

	/* Muestra el contenido del metabox */
	/* @param object $object en principio es un objeto de WP_post */
	public function CltvoDisplayMetabox($object) { 
		//echo '<pre>', print_r($this->meta_value,true), '</pre>';
		?>
		<table id="projects-intro" style="width:100%;">
			<tr>
				<td colspan="2">
					<label for="<?php echo	$this->meta_key; ?>[input]" style="display: block;margin-bottom: 10px;">
						<b>Input</b>
					</label>
					<input 
					type="text" 
					style="width: 100%;"
					id="<?php echo $this->meta_key; ?>[input]" 
					name="<?php echo $this->meta_key; ?>[input]" 
					value="<?php echo $this->meta_value['input']; ?>" 
					/>
				</td>
			</tr>
			<tr>
				<td style="width:calc(100% - 150px);">
					<label style="display: inline-block; margin-bottom: -40px;" for="<?php echo	$this->meta_key; ?>[wywiwyg]">
						<b>WYSIWYG</b>
					</label>
					<?php
					$id = $this->meta_key.'[wywiwyg]';
					wp_editor( htmlspecialchars_decode($this->meta_value['wywiwyg']), $this->meta_key,
						$settings = array(
							'textarea_name'=> $id,
							'editor_height' => 30,
							'media_buttons' => false
						)
					);
					?>
				</td>
			</tr>
		</table>
	<?php }

}
