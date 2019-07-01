<?php

/**
 * En este archivo se incluyen las Funciones del cultivo
 *
 * No agregar funciones del tema
 */

/** ==============================================================================================================
 *                                       Funciones del cultivo
 *  ==============================================================================================================
 */


// ???
    function cltvo_wpURL_2_path( $url ){
        $path = get_theme_root();
        $path = str_replace('wp-content/themes', '', $path);
        $path = str_replace(home_url('/'), $path, $url);
        return $path;
    }
//convierte int a string con signo de pesos, con punto decimal y dos ceros al final
    if( !function_exists('cltvo_dinero') ){
        function cltvo_dinero( $numero ){
            return '$ ' . number_format($numero, 2);
        }
    }


 /**
  * Easily includes files within the theme directory
  *
  * @param  string  	$path 	path to the image from theme directory
  * @return string  			full path
  */
 function themeInc($path, $global_post=true)
 {
 	if ($global_post) {
 		global $post;
 	}
 	include ( get_stylesheet_directory() . $path );
 }


 /**
  * Como themeInc, pero permite pasar variables al archivo incluido mediate un array llamado $opts
  *
  * @param  string  	$path 	path to the image from theme directory
  * @return string  			full path
  */
 function cltvo_superInc($path, $opts = array(), $global_post = true) {
 	if ($global_post) {
 		global $post;
 	}
 	include ( get_stylesheet_directory() . $path );
 }




  /**
   * Determines if an attachment is of the specified MIME Type
   * @param  number  $attachment_id
   * @param  string  $mime_type
   * @return boolean                False if MIME Type does not match.
   */
  function isMimeType($attachment_id, $mime_type) {
  	return strpos( get_post_mime_type( $attachment_id ), $mime_type ) !== false;
  }

  /**
   * Adds class to selected menu item
   *
   * @param  string $name Slug, custom post type name, or categroy name.
   * @param  string $type Page, single, category, or custom
   * @return string       CSS class
   */
  function selectMenuItem($name, $type='page') {
  	global $post;

  	if ($type === 'page') {
  		if ( is_page($name) ) {
  			return 'selected';
  		}
  	}

  	if ($type === 'custom') {
  		if ( is_post_type_archive($name) ) {
  			return 'selected';
  		}
  	}

  	 if ($type === 'category') {
  		if ( is_category($name) ) {
  			return 'selected';
  		}
  	}

  	if ($type === 'single') {
  		if (is_single() && get_the_category($post->ID)[0]->slug === $name) {
  			return 'selected';
  		}
  	}
  }




  /**
   * genera la direccion donde se encuentr actualemnte
   * @return string  url actual
   */
  function cltvo_current_url(){
  		$s = &$_SERVER;
  		$ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
  		$sp = strtolower($s['SERVER_PROTOCOL']);
  		$protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
  		$port = $s['SERVER_PORT'];
  		$port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
  		$host = isset($s['HTTP_X_FORWARDED_HOST']) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
  		$host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
  		$uri = $protocol . '://' . $host . $s['REQUEST_URI'];
  		$segments = explode('?', $uri, 2);
  		$url = $segments[0];
  		return $url;
  }



  function getTermNames($terms) {
  	return join(', ',
  		array_map(function($term){
  			return $term->name;
  		}, $terms)
  	);
  }






  /** ==============================================================================================================
   *                                       Funciones de paginas
   *  ==============================================================================================================
   */

   /**
    * Get Page ID from Page Slug
    * @param  string $page_slug      	Slug
    * @param  string $slug_page_type 	Post Type
    * @return string                	ID
    */
   function get_id_by_slug($page_slug, $slug_page_type = 'page')
   {
   	$found_page = get_page_by_path($page_slug, OBJECT, $slug_page_type);

   	if ( ! $found_page) {
   		return null;
   	}
   	return $found_page->ID;
   }


   /**
    * Get Page by from Page Slug
    * @param  string $page_slug      	Slug
    * @param  string $slug_page_type 	Post Type
    * @return string                	ID
    */
   function getPageFromSlug($page_slug, $slug_page_type = 'page')
   {
   	$found_page = get_page_by_path($page_slug, OBJECT, $slug_page_type);

   	if ( ! $found_page) {
   		return null;
   	}
   	return $found_page;
   }


   function queryChildrenBySlug( $parent_slug, $default_args = true , $query_args = [] ){
   	$cltvo_wp_query = new WP_Query();

   	if (true == $default_args)
   	{
   		$queried_pages = $cltvo_wp_query->query(
   			array(
   				'posts_per_page'	=> 	-1,
   				'post_type' => 'page',
   				'orderby' => 'menu_order',
   				'order'   => 'ASC'
   			)
   		);
   		return get_page_children( get_id_by_slug($parent_slug), $queried_pages );
   	}
   	$queried_pages = $cltvo_wp_query->query($query_args);
   	return get_page_children( get_id_by_slug($parent_slug), $queried_pages );

   }

   function queryChildren( $post, $default_args = true , $query_args = [] ){
   	$cltvo_wp_query = new WP_Query();

   	if (true == $default_args)
   	{
   		$queried_pages = $cltvo_wp_query->query(array('post_type' => 'page'));
   		return get_page_children( $post->ID, $queried_pages );
   	}

   	$query = $cltvo_wp_query->query($query_args);
   	return get_page_children( $post->ID, $query );

   }


   function isChildOfPage($parent_id, $child_id) {
   	$children = get_children(
   		array(
   			'post_parent' => $parent_id,
   			'numberposts' => -1
   		)
   	);

   	$ids = array_map(function($child) {return $child->ID;}, $children);

   	return in_array($child_id, $ids);
   }
