<?php
// $Id: module_icon.php,v 1.1.1.1 2009/02/23 03:26:42 ohwada Exp $

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

webmap_include_once( 'class/base/d3/module_icon.php', $MY_DIRNAME );

//---------------------------------------------------------
// main
//---------------------------------------------------------
$webmap_module_icon = new webmap_base_d3_module_icon( $MY_DIRNAME, WEBMAP_TRUST_DIRNAME );
$webmap_module_icon->output_image();

?>