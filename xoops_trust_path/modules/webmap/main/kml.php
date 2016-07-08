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
webmap_include_once( 'main/header.php' );
webmap_include_once( 'include/api_kml.php' );
webmap_include_once( 'class/view/kml.php' );
webmap_include_once( 'class/main/kml.php' );

//=========================================================
// main
//=========================================================
$builder =& webmap_main_kml::getInstance( WEBMAP_DIRNAME );
$builder->main();

exit();

?>