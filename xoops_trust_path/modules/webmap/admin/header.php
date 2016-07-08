<?php
// $Id: header.php,v 1.1.1.1 2009/02/23 03:26:42 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//---------------------------------------------------------
// webmap files
//---------------------------------------------------------
webmap_include_once( 'class/base/xoops/param.php' );
webmap_include_once( 'class/base/d3/language.php' );
webmap_include_once( 'class/base/inc/admin_menu.php' );
webmap_include_once( 'class/base/lib/dir.php' );
webmap_include_once( 'class/base/admin/base.php' );
webmap_include_once( 'class/base/admin/menu.php' );

webmap_include_once( 'include/constants.php' );
webmap_include_once( 'class/inc/admin_menu.php' );
webmap_include_once( 'class/compo/d3/language.php' );
webmap_include_once( 'class/admin/base.php' );

webmap_include_language( 'modinfo.php' );
webmap_include_language( 'main.php' );
webmap_include_language( 'admin.php' );

webmap_include_once_preload_trust();
webmap_include_once_preload();

?>