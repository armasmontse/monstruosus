<?php

/**
 * En este archivo se incluyen las Funciones para la tradccion del sitio
 *
 * No agregar funciones del tema
 */

/** ==============================================================================================================
 *                                       Funciones para la tradccion del sitio
 *  ==============================================================================================================
 */


 /**
  * Regresa solo la parte del texto del idioma correpondiete
  *
  * @param  string $text cadena de texto que ontiene los idiomas
  * @param  string $lang idioma al que se le va a traducir (por defecto  qtranxf_getLanguage() )
  * @return string  cadena con el texto en el idioma
  */
 function cltvo_translate($text, $lang = "" ){
 		if ( empty($lang) ) {
 				$lang = qtranxf_getLanguage() ;
 		}
 		return qtranxf_use($lang , $text , false, true);
 }
