<?php
// $Id: location.php,v 1.1.1.1 2009/02/23 03:26:42 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//---------------------------------------------------------
// xoops system files
//---------------------------------------------------------
include_once XOOPS_ROOT_PATH.'/class/template.php';

//---------------------------------------------------------
// webmap files
//---------------------------------------------------------
webmap_include_once( 'admin/header.php' );
webmap_include_once( 'class/base/lib/gtickets.php' );
webmap_include_once( 'class/base/xoops/config_item.php' );
webmap_include_once( 'class/admin/location.php' );

//=========================================================
// main
//=========================================================
$manager =& webmap_admin_location::getInstance( WEBMAP_DIRNAME );
$manager->main();
exit();

?>