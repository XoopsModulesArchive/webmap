<?php
// $Id: mb_check.php,v 1.1.1.1 2009/02/23 03:26:42 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//---------------------------------------------------------
// webmap files
//---------------------------------------------------------
webmap_include_once( 'class/base/lib/multibyte.php' );
webmap_include_once( 'class/base/admin/mb_check.php' );
webmap_include_once( 'class/admin/mb_check.php' );
webmap_include_language( 'admin.php' );

//=========================================================
// main
//=========================================================
$manager =& webmap_admin_mb_check::getInstance();
$manager->main();
exit();

?>