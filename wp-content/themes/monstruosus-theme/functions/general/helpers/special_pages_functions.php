<?php

/**
 * En este archivo se incluyen las Funciones de las special pages
 *
 * No agregar funciones del tema
 */

/** ==============================================================================================================
 *                                       Funciones de special pages
 *  ==============================================================================================================
 */


/**
 * trae el permalink de una pagina especial
 * @param  string $slug slug de la pagina especial
 * @return string       url de la pagina
 */
function specialPagePermalink($slug) {
	get_permalink( specialPage($slug) );
}

/**
 * verifica si la pagina especial existe
 * @param  string $slug slug de la pagina especial
 * @return boolean       generera una esepcion en caso de  que la pagia especial no exista
 */
function specialPageExists($slug){

	if (!isset( $GLOBALS['special_pages_ids'][$slug] ) ) {

		throw new Exception("Special page -- $slug -- not found");
	}

	return true;
}

/**
 * Trae las paginas especiales
 * @param  string  $slug   Slug de la página especial
 * @param  boolean $object Si se desea traer el un objeto o sólo el id
 * @return objeto o string
 */
function specialPage( $slug, $object = false )
{
	specialPageExists($slug);

	if ($object){
		return get_post($GLOBALS['special_pages_ids'][$slug]);
	}
	return $GLOBALS['special_pages_ids'][$slug];
}

/**
 * funcion auxuliar para las paginas especiales, verifica si la pagina a editar es una pagina especial
 * @param  string  $slug slug de la pagina a verificar
 * @return boolean      si se edita la pagina especual mencionada
 */
function isSpecialPage($slug)
{
	specialPageExists($slug);
	return isset($_GET['post']) && $_GET['post'] == specialPage( $slug);
}


function specialPageMeta($slug, $meta, $single = true) {

 if (!isset( $GLOBALS['special_pages_ids'][$slug] ) ) {
	 throw new Exception("Special page -- $slug -- not found");
 }

 return get_post_meta($GLOBALS['special_pages_ids'][$slug], $meta , $single);
}
