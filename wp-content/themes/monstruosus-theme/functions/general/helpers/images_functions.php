<?php

/**
 * En este archivo se incluyen las Funciones para la imagenes
 *
 * No agregar funciones del tema
 */

/** ==============================================================================================================
 *                                       Funciones para la imagenes
 *  ==============================================================================================================
 */


 /**
  * regresa todas las imagenes del post con sus caracteristicas en un array
  *
  * Parametros:
  *
  * @param int $parentId id del post
  * @param boolean|array $exclude imagenes a ser excluidas (por defecto false)
  *
  * @return array con las imagenes y sus caracteristicas
  */

  function cltvo_todasImgsDelPost($parentId, $exclude= false){
 	 $query_images_args = array(
 	     'post_parent' => $parentId,
 	     'post_type' => 'attachment',
 	     'post_mime_type' =>'image',
 	     'post_status' => 'inherit',
 	     'posts_per_page' => -1
 	 );

 	 if( !empty($exclude) ){
 	     $query_images_args['post__not_in'] = $exclude;
 	 }

 	 $query_images = get_posts( $query_images_args );
 	 $images = array();
 	 foreach ( $query_images as $image) {
 	     $images[] = new Cltvo_Img($image->ID);
 	 }
 	 return $images;
  }
