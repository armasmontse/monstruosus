<?php

/**
 * En este archivo se incluyen las Funciones para debug
 *
 * No agregar funciones del tema
 */

/** ==============================================================================================================
 *                                       Funciones para debug
 *  ==============================================================================================================
 */

/**
 * Wrapper sobre var_dump
 * @param   $variable
 * @return  var_dump con <pre> tags
 */
function vd($variable)
{
	echo "<pre>";
	var_dump($variable);
	echo "</pre>";
}

/**
 * Wrapper sobre var_dump que además ejecuta die
 * @param   $variable
 * @return  var_dump con <pre> tags
 */
function dd($variable)
{
	echo "<pre>";
	var_dump($variable);
	echo "</pre>";
	die;
}


// modificacion de la funcion print_r
if( !function_exists('cltvo_print_r') ){
	function cltvo_print_r($var){
		echo "<pre>";
		print_r($var);
		echo "</pre>";
	}
}
