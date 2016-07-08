<?php
// $Id: gd_check.php,v 1.1.1.1 2009/02/23 03:26:44 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if ( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_admin_gd_check
//=========================================================
class webmap_admin_gd_check extends webmap_base_admin_gd_check
{

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_admin_gd_check()
{
	$this->webmap_base_admin_gd_check();
	$this->set_lang_success( _AM_WEBMAP_CHK_GD_SUCCESS );
	$this->set_lang_failed(  _AM_WEBMAP_CHK_GD_FAILED );
}

function &getInstance()
{
	static $instance;
	if (!isset($instance)) {
		$instance = new webmap_admin_gd_check();
	}
	return $instance;
}

// --- class end ---
}

?>