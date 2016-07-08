<?php
// $Id: mytrustdirname.php,v 1.1.1.1 2009/02/23 03:29:33 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// main
//=========================================================
$GLOBALS['MY_DIRNAME'] = $MY_DIRNAME;

$MY_TRUST_DIRNAME = 'webmap' ;

// xoops_virsion.php call many times
if ( !defined("WEBMAP_TIME_START") ) {
	list($usec, $sec) = explode(" ",microtime()); 
	$time = floatval($sec) + floatval($usec); 
	define("WEBMAP_TIME_START", $time );
}
if ( !defined("WEBMAP_TRUST_DIRNAME") ) {
	define("WEBMAP_TRUST_DIRNAME", $MY_TRUST_DIRNAME );
}
if ( !defined("WEBMAP_TRUST_PATH") ) {
	define("WEBMAP_TRUST_PATH", XOOPS_TRUST_PATH.'/modules/'.WEBMAP_TRUST_DIRNAME );
}

?>