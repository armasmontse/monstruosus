<?php

class Cltvo_Checkbox extends Cltvo_Metabox_Master {

	/* sobre escribiendo los args del master */
	protected $description_metabox = 'Checkbox';


	/* Define el metodo que inicializa el valor del meta */
	public static function setMetaValue($meta){
		$meta = is_array($meta) ? $meta : array();
		$meta['ckeckbox'] = isset($meta['ckeckbox']) ? $meta['ckeckbox'] : false;
		return $meta;
	}


	/**
	* Es la funcion que muestra el contenido del metabox
	* @param object $object en principio es un objeto de WP_post
	*/
	public function CltvoDisplayMetabox($object) { 
		//echo '<pre>',print_r($this->meta_value,true),'</pre>'; 
		?>
		<table style="font-size: 18px">
			<tr>
				<td>
					<label 
					for="<?php echo  $this->meta_key; ?>[ckeckbox]" 
					style="padding-right:10px; vertical-align:middle;">
						Checkbox Label
					</label>
				</td>
				<td>
					<input 
					type="hidden" 
					style="vertical-align:bottom;" 
					name="<?php echo $this->meta_key; ?>[init]" 
					value="true" id="<?php echo  $this->meta_key; ?>[ckeckbox]">
					<input 
					type="checkbox" 
					style="vertical-align:bottom;" 
					name="<?php echo $this->meta_key; ?>[ckeckbox]" 
					value="true" id="<?php echo  $this->meta_key; ?>[ckeckbox]"
					<?php if ($this->meta_value['ckeckbox']) : ?> checked <?php endif; ?>>
				</td>
			</tr>
		</table>
	<?php }

}
