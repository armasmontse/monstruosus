<?php

class Cltvo_Input_Repeater extends Cltvo_Metabox_Master {

	/* sobre escribiendo los args del master */
	protected $description_metabox = 'Repeater';

	/* Detalles */
	private $detalles = array(
		'detalle' 	=> 'Detalle',
		'contenido' => 'Contenido'
	);

	/* Define el metodo que inicializa el valor del meta */
	public static function setMetaValue($meta_value){
		if (is_array($meta_value)) {
			foreach ($meta_value as $key => $value) {
				foreach ((new static)->detalles as $detalle_key => $item) {
					$meta_value[$key][$detalle_key] = (isset($meta_value[$key][$detalle_key]) && !empty($meta_value[$key][$detalle_key])) ? $meta_value[$key][$detalle_key] : '';
				}
			}
		} else {
			$meta_value = array(0 => array('detalle'  => '','contenido' => ''));
		}
		return $meta_value;
	}

	/* 
	Es la funcion que muestra el contenido del metabox
	@param object $object en principio es un objeto de WP_post
	*/
	 public function CltvoDisplayMetabox($object){
		//echo "<pre>"; print_r($this->meta_value); echo "</pre>";
		?>		
		<br>	
		<div id="table__detalles" style="display:flex;flex-wrap:wrap;">
			<div style="width:100%;">
				<table class="table__detalles" style="width:100%;" cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<?php foreach ($this->detalles as $item): ?>
								<th class="th__detalles" align="left" style="padding-bottom:10px;">
									<?php echo $item; ?>
								</th>
							<?php endforeach; ?>
							<th class="th__detalles" style="padding-bottom:10px;">
								&nbsp;
							</th>
						</tr>
					</thead>
					<tbody id="tbody__detalles_JS">
						<?php $this->drawTemplate($this->meta_value); ?>
					</tbody>
				</table>
			</div>
			
			<div style="width:100%;">
				<button type="button" 
						class="button add__detalle add__detalle_JS" 
						style="display:block;margin-top:0px;" 
						meta-name="<?php echo $this->meta_key; ?>">
						Agregar Features
						</button>
			</div>

			<table style="display:none;">
				<tr id="detalle_clone_JS" class="tr_sortable">
					<?php foreach ($this->detalles as $key => $item): ?>
						<td class="td__detalle" style="padding-bottom:10px;">
							<input type="text" style="width: calc(100% - 10px);"
							id="<?php echo $this->meta_key; ?>__<?php echo $key; ?>"
							name="<?php echo $this->meta_key; ?>[][<?php echo $key; ?>]"
							disabled
							class="input__detalle" />
						</td>
					<?php endforeach; ?>
					<td class="td__detalles delete__detalle">
						<button meta-name="<?php echo $this->meta_key; ?>" class="button delete__detalle_JS">Eliminar</button>
						<button class="button move">&varr;</button>
					</td>
				</tr>
			</table>

		</div>

 	<?php }


	public function drawTemplate($meta_value) {
		
		foreach ($meta_value as $key_value => $value) { ?>
			<tr meta-key="<?php echo $key_value; ?>" id="<?php echo $this->meta_key; ?>_<?php echo $key_value; ?>" class="tr_sortable">
				<?php foreach ($this->detalles as $key => $item): ?>
						<td class="td__detalle" style="padding-bottom:10px;">
							<input type="text" style="width: calc(100% - 10px);"
							id="<?php echo $this->meta_key; ?>_<?php echo $key_value; ?>_<?php echo $key; ?>"
							name="<?php echo $this->meta_key; ?>[<?php echo $key_value; ?>][<?php echo $key; ?>]"
							value="<?php echo $value[$key]; ?>"
							class="input__detalle" />
						</td>
				<?php endforeach; ?>
					<td class="td__detalles delete__detalle">
						<button meta-name="<?php echo $this->meta_key; ?>" class="button delete__detalle_JS">Eliminar</button>
						<button class="button move">&varr;</button>
					</td>
			</tr>
		<?php }

	}


 }