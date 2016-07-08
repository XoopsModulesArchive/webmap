<?php
// $Id: api_map.php,v 1.2 2009/02/25 10:37:15 ohwada Exp $

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
include_once XOOPS_TRUST_PATH.'/modules/webmap/init.php';

webmap_include_once( 'include/constants.php',               $MY_DIRNAME );
webmap_include_once( 'include/gmap_api.php',                $MY_DIRNAME );
webmap_include_once( 'class/base/xoops/config.php',         $MY_DIRNAME );
webmap_include_once( 'class/base/xoops/config_dirname.php', $MY_DIRNAME );
webmap_include_once( 'class/base/xoops/header.php',         $MY_DIRNAME );
webmap_include_once( 'class/base/d3/language.php',          $MY_DIRNAME );
webmap_include_once( 'class/base/lib/handler_basic.php',    $MY_DIRNAME );
webmap_include_once( 'class/base/lib/handler_dirname.php',  $MY_DIRNAME );
webmap_include_once( 'class/base/lib/utility.php',          $MY_DIRNAME );
webmap_include_once( 'class/base/lib/multibyte.php',        $MY_DIRNAME );
webmap_include_once( 'class/compo/xoops/config.php',        $MY_DIRNAME );
webmap_include_once( 'class/compo/xoops/header.php',        $MY_DIRNAME );
webmap_include_once( 'class/compo/d3/language.php',         $MY_DIRNAME );
webmap_include_once( 'class/compo/handler/gicon.php',       $MY_DIRNAME );
webmap_include_once( 'class/compo/map.php',                 $MY_DIRNAME );

?>