<?php
// $Id: gicon_manager.php,v 1.1.1.1 2009/02/23 03:26:42 ohwada Exp $

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
webmap_include_once( 'class/base/lib/image_mime.php' );
webmap_include_once( 'class/base/lib/post.php' );
webmap_include_once( 'class/base/lib/utility.php' );
webmap_include_once( 'class/base/lib/handler_basic.php' );
webmap_include_once( 'class/base/lib/handler_dirname.php' );
webmap_include_once( 'class/base/lib/uploader.php' );
webmap_include_once( 'class/base/lib/uploader_lang.php' );
webmap_include_once( 'class/base/lib/form.php' );
webmap_include_once( 'class/base/lib/form_lang.php' );
webmap_include_once( 'class/compo/handler/gicon.php' );
webmap_include_once( 'class/admin/gicon_form.php' );
webmap_include_once( 'class/admin/gicon_manager.php' );

//=========================================================
// main
//=========================================================
$manager =& webmap_admin_gicon_manager::getInstance( WEBMAP_DIRNAME );
$manager->main();
exit();

?>