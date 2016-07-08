<?php
// $Id: kml.php,v 1.1.1.1 2009/02/23 03:26:42 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//---------------------------------------------------------
// webmap files
//---------------------------------------------------------
webmap_include_once( 'admin/header.php' );
webmap_include_once( 'include/api_kml.php' );
webmap_include_once( 'class/view/kml.php' );
webmap_include_once( 'class/admin/kml.php' );

//=========================================================
// main
//=========================================================
$manager =& webmap_admin_kml::getInstance( WEBMAP_DIRNAME );
$manager->main();
exit();

?>