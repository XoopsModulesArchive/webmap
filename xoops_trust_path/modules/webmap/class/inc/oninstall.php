<?php
// $Id: oninstall.php,v 1.1.1.1 2009/02/23 03:26:47 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_inc_oninstall
//=========================================================
class webmap_inc_oninstall extends webmap_base_inc_oninstall
{

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_inc_oninstall()
{
	$this->webmap_base_inc_oninstall();
	$this->set_trust_dirname( WEBMAP_TRUST_DIRNAME );
}

function &getInstance()
{
	static $instance;
	if (!isset($instance)) {
		$instance = new webmap_inc_oninstall();
	}
	return $instance;
}

// --- class end ---
}

?>