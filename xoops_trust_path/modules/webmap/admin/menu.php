<?php
// $Id: menu.php,v 1.1.1.1 2009/02/23 03:26:42 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

//---------------------------------------------------------
// $MY_DIRNAME is set by caller
//---------------------------------------------------------

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//---------------------------------------------------------
// webmap files
//---------------------------------------------------------
include_once XOOPS_TRUST_PATH.'/modules/webmap/init.php';

$MY_DIRNAME= $GLOBALS['MY_DIRNAME'];
webmap_include_once( 'class/base/inc/admin_menu.php', $MY_DIRNAME );
webmap_include_once( 'class/inc/admin_menu.php',      $MY_DIRNAME );
webmap_include_language( 'modinfo.php',               $MY_DIRNAME );

//=========================================================
// main
//=========================================================
$manager =& webmap_inc_admin_menu::getSingleton( $MY_DIRNAME );
$adminmenu = $manager->build_main_menu();

?>