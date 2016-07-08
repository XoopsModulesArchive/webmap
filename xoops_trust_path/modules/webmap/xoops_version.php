<?php
// $Id: xoops_version.php,v 1.1.1.1 2009/02/23 03:26:42 ohwada Exp $

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

webmap_include_once( 'preload/debug.php',                  $MY_DIRNAME );
webmap_include_once( 'include/constants.php',              $MY_DIRNAME );
webmap_include_once( 'include/version.php',                $MY_DIRNAME );
webmap_include_once( 'class/base/lib/handler_basic.php',   $MY_DIRNAME );
webmap_include_once( 'class/base/xoops/config_modify.php', $MY_DIRNAME );
webmap_include_once( 'class/base/inc/xoops_version.php',   $MY_DIRNAME );
webmap_include_once( 'class/inc/xoops_version.php',        $MY_DIRNAME );
webmap_include_language( 'modinfo.php',                    $MY_DIRNAME );

//---------------------------------------------------------
// main
//---------------------------------------------------------
$webmap_inc_xoops_version =& webmap_inc_xoops_version::getSingleton( $MY_DIRNAME );
$modversion = $webmap_inc_xoops_version->modversion();

?>