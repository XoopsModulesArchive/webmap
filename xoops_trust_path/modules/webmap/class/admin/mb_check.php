<?php
// $Id: mb_check.php,v 1.1.1.1 2009/02/23 03:26:44 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if ( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_admin_mb_check
//=========================================================
class webmap_admin_mb_check extends webmap_base_admin_mb_check
{

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_admin_mb_check()
{
	$this->webmap_base_admin_mb_check();
	$this->set_lang_success( _AM_WEBMAP_CHK_MB_SUCCESS );
}

function &getInstance()
{
	static $instance;
	if (!isset($instance)) {
		$instance = new webmap_admin_mb_check();
	}
	return $instance;
}

// --- class end ---
}

?>