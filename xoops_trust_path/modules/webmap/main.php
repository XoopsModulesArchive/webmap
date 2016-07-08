<?php
// $Id: main.php,v 1.1.1.1 2009/02/23 03:26:42 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

//---------------------------------------------------------
// $MY_DIRNAME is set by caller
//---------------------------------------------------------

if ( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//---------------------------------------------------------
// webmap files
//---------------------------------------------------------
include_once XOOPS_TRUST_PATH.'/modules/webmap/init.php';

if( !defined("WEBMAP_DIRNAME") ) {
	  define("WEBMAP_DIRNAME", $MY_DIRNAME );
}
if( !defined("WEBMAP_ROOT_PATH") ) {
	  define("WEBMAP_ROOT_PATH", XOOPS_ROOT_PATH.'/modules/'.WEBMAP_DIRNAME );
}

webmap_include_once( 'preload/debug.php' );

// fork each pages
$WEBMAP_FCT       = webmap_fct() ;
$file_trust_fct   = WEBMAP_TRUST_PATH .'/main/'. $WEBMAP_FCT .'.php' ;
$file_root_fct    = WEBMAP_ROOT_PATH  .'/main/'. $WEBMAP_FCT .'.php' ;
$file_trust_index = WEBMAP_TRUST_PATH .'/main/index.php' ;
$file_root_index  = WEBMAP_ROOT_PATH  .'/main/index.php' ;

if ( file_exists( $file_root_fct ) ) {
	webmap_debug_msg( $file_root_fct );
	include_once $file_root_fct;

} elseif ( file_exists( $file_trust_fct ) ) {
	webmap_debug_msg( $file_trust_fct );
	include_once $file_trust_fct;

} elseif ( file_exists( $file_root_index ) ) {
	webmap_debug_msg( $file_root_index );
	include_once $file_root_index;

} elseif ( file_exists( $file_trust_index ) ) {
	webmap_debug_msg( $file_trust_index );
	include_once $file_trust_index;

} else {
	die( 'wrong request' ) ;
}

?>