<?php
// $Id: kml.php,v 1.1.1.1 2009/02/23 03:26:43 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_admin_kml
//=========================================================
class webmap_admin_kml
{
	var $_builder;

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_admin_kml( $dirname )
{
	$this->_builder =& webmap_view_kml::getInstance( $dirname );
}

function &getInstance( $dirname )
{
	static $instance;
	if (!isset($instance)) {
		$instance = new webmap_admin_kml( $dirname );
	}
	return $instance;
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function main()
{
	$this->_builder->view_webmap_kml();
}

// --- class end ---
}

?>