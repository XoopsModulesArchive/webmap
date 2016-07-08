<?php
// $Id: init.php,v 1.1.1.1 2009/02/23 03:26:42 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

//---------------------------------------------------------
// $MY_DIRNAME is set by caller
//---------------------------------------------------------

if ( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

if ( !isset($MY_TRUST_DIRNAME) ) {
	$MY_TRUST_DIRNAME = basename( dirname( __FILE__ ) ) ;
}
if ( !defined("WEBMAP_TRUST_DIRNAME") ) {
	define("WEBMAP_TRUST_DIRNAME", $MY_TRUST_DIRNAME );
}
if ( !defined("WEBMAP_TRUST_PATH") ) {
	define("WEBMAP_TRUST_PATH", XOOPS_TRUST_PATH.'/modules/'.WEBMAP_TRUST_DIRNAME );
}

include_once WEBMAP_TRUST_PATH.'/class/base/d3/optional.php';
include_once WEBMAP_TRUST_PATH.'/class/base/d3/preload.php';
include_once WEBMAP_TRUST_PATH.'/include/optional.php';

?>