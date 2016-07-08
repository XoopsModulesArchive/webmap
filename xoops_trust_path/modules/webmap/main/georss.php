<?php
// $Id: georss.php,v 1.1.1.1 2009/02/23 03:26:42 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

webmap_include_once( 'main/header.php' );
webmap_include_once( 'class/main/georss.php' );

//=========================================================
// main
//=========================================================
$manage =& webmap_main_georss::getInstance( WEBMAP_DIRNAME );

$xoopsOption['template_main'] = WEBMAP_DIRNAME.'_main_georss.html' ;
include XOOPS_ROOT_PATH . "/header.php" ;

$xoopsTpl->assign( $manage->main() ) ;

include( XOOPS_ROOT_PATH . "/footer.php" ) ;

?>