<?php

class Cltvo_Select_Repeater extends Cltvo_Metabox_Master {

	/* Sobre escribiendo las opcciones del master */
	protected $description_metabox = 'Integrantes Involucrados';
	protected $post_type = 'cltvo_proyectos';

	/* Galería */
	private $galeria = array(
		'member'  => 'Integrante'
	);


	/* Define el metodo que inicializa el valor del meta */
	public static function setMetaValue($meta_value){
		if (is_array($meta_value)) {
			foreach ($meta_value as $key => $value) {
				foreach ((new static)->galeria as $galeria_key => $item) {
					$meta_value[$key] = (isset($meta_value[$key]) && !empty($meta_value[$key])) ? $meta_value[$key] : '';
				}
			}
		} else {
			$meta_value = array( 0 => '' );
		}
		return $meta_value;
	}


	/* 
	Es la funcion que muestra el contenido del metabox
	@param object $object en principio es un objeto de WP_post
	*/
	public function CltvoDisplayMetabox($object) {
		//echo "<pre>"; print_r($this->meta_value); echo "</pre>";
		?>
				
			<br>

			<div id="table__team" class="repeater">

			<table class="table__galeria" cellpadding="0" cellspacing="0">
				<tbody id="table__team_JS">
					<?php $this->drawTemplate($this->meta_value); ?>
				</tbody>
			</table>

			<button type="button" 
					class="button add__member add__member_JS" 
					style="display: inline-block; margin-top: 10px;" 
					meta-name="<?php echo $this->meta_key; ?>">
					Agregar Integrante
					</button>

			<table style="display:none;">
				<tr id="team_clone_JS">
					
					<td class="td__galeria" id="Cltvo_Select_Repeater_" style="padding:0 10px 10px 0;">
						<select name="Cltvo_Select_Repeater[]" disabled>
							<?php 
							$equipo = new WP_Query(array(
								'post_type' => array('page'),
								'posts_per_page' => -1
							));
							if ( $equipo->have_posts() ) : while ( $equipo->have_posts() ) : $equipo->the_post(); ?>
								<option value="<?= get_the_ID() ?>"><?php the_title() ?></option>
							<?php endwhile; endif; wp_reset_postdata(); ?>
						</select>
						<button meta-name="<?php echo $this->meta_key; ?>" class="button delete__member_JS">Eliminar</button>
					</td>

				</tr>
			</table>

		</div>

	<?php }

	public function drawTemplate($meta_value) {
		//echo "<pre>"; print_r($this->meta_value); echo "</pre>";
		foreach ($meta_value as $key_value => $value) : 
			if ($value) :
		?>

			<tr meta-key="<?php echo $key_value; ?>" id="<?php echo $this->meta_key; ?>_<?php echo $key_value; ?>">
				
				<td class="td__galeria" id="<?php echo $this->meta_key; ?>_<?php echo $key_value; ?>" style="padding:0 10px 10px 0;">
					<select name="Cltvo_Select_Repeater[]">
						<?php 
						$equipo = new WP_Query(array(
							'post_type' => array('page'),
							'posts_per_page' => -1
						));
						if ( $equipo->have_posts() ) : while ( $equipo->have_posts() ) : $equipo->the_post(); ?>
							<option value="<?= get_the_ID() ?>" <?= get_the_ID() == $value ? 'selected' : '' ?> ><?php the_title() ?></option>
						<?php endwhile; endif; wp_reset_postdata(); ?>
					</select>
					<button meta-name="<?php echo $this->meta_key; ?>" class="button delete__member_JS">Eliminar</button>
				</td>

			</tr>
		<?php 
			endif;
		endforeach;
	}



 }