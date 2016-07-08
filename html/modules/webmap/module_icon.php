<?php
// $Id: module_icon.php,v 1.1.1.1 2009/02/23 03:29:31 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

$xoopsOption['nocommon'] = true ;
require '../../mainfile.php' ;

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'set XOOPS_TRUST_PATH into mainfile.php' ) ;

$MY_DIRNAME = basename( dirname( __FILE__ ) ) ;

require XOOPS_ROOT_PATH.'/modules/'.$MY_DIRNAME.'/include/mytrustdirname.php' ; // set $mytrustdirname
require XOOPS_TRUST_PATH.'/modules/'.$MY_TRUST_DIRNAME.'/module_icon.php' ;

?>