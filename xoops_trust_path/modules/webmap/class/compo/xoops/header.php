<?php
// $Id: header.php,v 1.1.1.1 2009/02/23 03:26:47 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_compo_xoops_header
//=========================================================
class webmap_compo_xoops_header extends webmap_base_xoops_header
{

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_compo_xoops_header( $dirname )
{
	$this->webmap_base_xoops_header( $dirname, WEBMAP_TRUST_DIRNAME );
}

function &getSingleton( $dirname )
{
	static $singletons;
	if ( !isset( $singletons[ $dirname ] ) ) {
		$singletons[ $dirname ] = new webmap_compo_xoops_header( $dirname );
	}
	return $singletons[ $dirname ];
}

//---------------------------------------------------------
// assign
//---------------------------------------------------------
function assign_or_get_default_css( $flag_template=false )
{
	$CSS_CONST = 'default_css' ;
	$CSS_FILE  = 'default.css' ;

	$show_default_css = false ;
	$default_css      = null ;

	if ( $this->check_once_name( $CSS_CONST ) ) {
		$show_default_css = true ;
		$default_css = $this->build_link_css_libs( $CSS_FILE );
	}

	if ( !$flag_template && $this->_FLAG_ASSIGN_HEADER ) {
		$this->assign_xoops_module_header( $default_css );

		$show_default_css = false ;
	}

	$arr = array(
		'show_default_css' => $show_default_css ,
	);

	return $arr;
}

function assign_or_get_map( $apikey, $name, $flag_template=false )
{
	$show_google_js = false ;
	$google_js      = null ;
	$show_map_js    = false ;
	$map_js         = null ;
	$show_gmap_js   = false ;
	$gmap_js        = null ;

	if ( $this->check_gmap_api() ) {
		$show_google_js = true ;
		$google_js = $this->build_gmap_api( $apikey );
	}

	if ( $this->check_name_js( $name ) ) {
		$js = $this->build_name_js( $name );
		if ( $name == 'gmap' ) {
			$show_gmap_js = true ;
			$gmap_js      = $js ;

		} elseif ( $name == 'map' ) {
			$show_map_js = true ;
			$map_js      = $js ;
		}
	}

	if ( !$flag_template && $this->_FLAG_ASSIGN_HEADER ) {
		$str  = $google_js ;
		$str .= $gmap_js ;
		$str .= $map_js ;
		$this->assign_xoops_module_header( $str );

		$show_google_js = false ;
		$show_map_js    = false ;
		$show_gmap_js   = false ;
	}

	$arr = array(
		'show_google_js' => $show_google_js ,
		'show_gmap_js'   => $show_gmap_js ,
		'show_map_js'    => $show_map_js ,
	);

	return $arr;
}

// --- class end ---
}

?>