<?php
// $Id: index.php,v 1.1.1.1 2009/02/23 03:26:42 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//---------------------------------------------------------
// webmap files
//---------------------------------------------------------
webmap_include_once( 'admin/header.php' );
webmap_include_once( 'class/base/lib/gd.php' );
webmap_include_once( 'class/base/lib/server_info.php' );
webmap_include_once( 'class/base/admin/server_check.php' );
webmap_include_once( 'class/admin/index.php' );

//=========================================================
// main
//=========================================================
$manager =& webmap_admin_index::getInstance( WEBMAP_DIRNAME );
$manager->main();
exit();

?>