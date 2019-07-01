<?php

/**
 * En este archivo se incluyen las Funciones para la imprimir cosas
 *
 * No agregar funciones del tema
 */

 /** ==============================================================================================================
  *                                       Funciones para filtrar strings 
  *  ==============================================================================================================
  */



/**
* cambia el m2 por m<sup>2</sup>
*
*	Parámetros:
*
* @param string $valor valor a ser verificado
*
* @return string con el cambio
*/

function m2_to_msup2($valor){

  return str_replace( array("m2", "M2", "m 2", "M 2") , "m<sup>2</sup>", $valor ) ;
}


function cltvo_title($post, $translate=false)
{
  if ($translate == true) {
      return cltvo_translate($post->post_title);
  }
   return $post->post_title;
}



 function cltvo_content($post, $translate=false, $filters=false)
 {
  if ($translate==false && $filters==false)
  {
      return wpautop($post->post_content);
  }
  elseif ($translate==false && $filters==true) {
      return apply_filters('the_content', $post->post_content);
  }
  elseif ($translate==true && $filters==false) {
      return cltvo_translate( wpautop($post->post_content) );
  }
  elseif ($translate==true && $filters==true) {
      return cltvo_translate(apply_filters('the_content', $post->post_content) );
  }

 }

/** ==============================================================================================================
 *                                       Funciones para la imprimir cosas
 *  ==============================================================================================================
 */


 function cltvo_siteTitle()
 {
 	echo get_bloginfo( 'name' );

 }

 function cltvo_siteDescription()
 {
 	echo get_bloginfo( 'description' );
 }




function cltvo_slug($post)
{
	 echo $post->post_name;
}




 /**
  * Echo Page Title from Page Slug
  * @param  string $page_slug      	Slug
  * @param  string $slug_page_type 	Post Type
  * @return string                	ID
  */
 function echoPageTitle($page_slug, $slug_page_type = 'page')
 {
 	$page = get_page_by_path($page_slug, OBJECT, $slug_page_type);
 	echo $page->post_title;
 }


 /**
  * Echo Page Content from Page Slug (with wpautop)
  * @param  string $page_slug      	Slug
  * @param  string $slug_page_type 	Post Type
  * @return string                	ID
  */
 function echoPageContent($page_slug, $slug_page_type = 'page')
 {
 	$page = get_page_by_path($page_slug, OBJECT, $slug_page_type);
 	echo wpautop($page->post_content);

 }






  /**
   * Easily includes files withing the theme directory
   *
   * @param  string  	$path 	path to the image from theme directory
   * @return string  			full path
   */
  function echoImg($img_name)
  {
  	echo ( get_stylesheet_directory_uri().'/images/'.$img_name );
  }


   /**
    * Imprime los meta property de la pagina
    * @param  string $title       titulo de la pagina que se le asginara
    * @param  string $descripcion descripccion de la pagina
    * @param  object $image       objeto tipo Cltvo_Img
    */
   function social_properties($title, $descripcion, $image){


   		// if( empty($descripcion ) ){
   		// 		$page = get_post($GLOBALS['special_pages_ids']['acerca-de']);
   		// 		$descripcion = cltvo_translate($page->post_content);
   		// }


   		if(strlen($descripcion) > 160){
   			$pos = strpos($descripcion, ' ', 160);
   			$descripcion = substr($descripcion,0, $pos).'...';
   		}




   		echo '<meta name="description" content="'. $descripcion.'">

   				<!-- Facebook Metadata /-->
   				<!-- <meta property="fb:page_id" content="" /> -->
   				<meta property="og:url" content=" '. cltvo_current_url() .' "/>
   				<meta property="og:image" content=" '. $image->src .' "/>
   				<meta property="og:image:width" content=" '. $image->width .' " />
   				<meta property="og:image:height" content=" '. $image->height .' " />
   				<meta property="og:description" content=" '. $descripcion .' "/>
   				<meta property="og:title" content=" '. $title .' "/>

   				<!-- Google+ Metadata /-->

   				<meta itemprop="name" content=" '. $title .' ">
   				<meta itemprop="description" content=" '. $descripcion .' ">
   				<meta itemprop="image" content=" '. $image->src .' ">';

   }
