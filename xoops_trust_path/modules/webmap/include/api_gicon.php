<?php
// $Id: api_gicon.php,v 1.1.1.1 2009/02/23 03:26:42 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//---------------------------------------------------------
// webmap files
//---------------------------------------------------------
include_once XOOPS_TRUST_PATH.'/modules/webmap/init.php';

webmap_include_once( 'include/constants.php',              $MY_DIRNAME );
webmap_include_once( 'class/base/lib/handler_basic.php',   $MY_DIRNAME );
webmap_include_once( 'class/base/lib/handler_dirname.php', $MY_DIRNAME );
webmap_include_once( 'class/compo/handler/gicon.php',      $MY_DIRNAME );
webmap_include_once( 'class/compo/gicon.php',              $MY_DIRNAME );

?>