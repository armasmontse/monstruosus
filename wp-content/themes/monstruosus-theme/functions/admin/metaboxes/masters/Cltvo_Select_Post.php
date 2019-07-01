<?php

class Cltvo_Select_Post extends Cltvo_Metabox_Master {


	/* Sobre escribiendo las opcciones del master */
	protected $description_metabox = 'Select Post';

	/* Array de metas */
	protected static $fields = [ 
		'post' => 'Post'
	];

	/* Define el metodo que inicializa el valor del meta */
	public static function setMetaValue($meta){
		return $meta;
	}


	/* Muestra el contenido del metabox */
	/* @param object $object en principio es un objeto de WP_post */
	public function CltvoDisplayMetabox($object) { 
		//echo '<pre>',print_r($this->meta_value,true),'</pre>'; 
		?>
		<?php $posts = get_posts(array('post_type' => 'page', 'order' => 'ASC')); ?>
		<table style="font-size: 18px">
			<tr>
				<td>
					<select 
					style="font-size: 16px; width: 100%;"
					id="product_JS" 
					class="<?php echo $this->meta_key; ?>" 
					name="<?php echo $this->meta_key; ?>">
						<option value="" disabled selected><?= __('Selecciona un Post',TRANSDOMAIN) ?></option>
						<?php foreach ($posts as $p): ?>
							<option value="<?= $p->ID ?>" <?= $this->meta_value == $p->ID ? 'selected' : '' ?>><?= $p->post_title ?></option>
						<?php endforeach ?>
					</select>					
				</td>
			</tr>
		</table>
	<?php }

}
