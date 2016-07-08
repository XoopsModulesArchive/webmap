<?php
// $Id: config.php,v 1.1.1.1 2009/02/23 03:26:44 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_base_xoops_config
//=========================================================
class webmap_base_xoops_config
{

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_base_xoops_config()
{
	$this->_config_handler =& xoops_gethandler('config');
}

//---------------------------------------------------------
// config handler
//---------------------------------------------------------
function get_config_by_dirname( $dirname )
{
	$mid = $this->get_module_mid_by_dirname( $dirname );
	return $this->get_config_by_mid( $mid );
}

function get_config_by_mid( $mid )
{
	return $this->_config_handler->getConfigsByCat( 0, $mid );
}

function get_search_config()
{
	return $this->_config_handler->getConfigsByCat( XOOPS_CONF_SEARCH );
}

//---------------------------------------------------------
// module handler
//---------------------------------------------------------
function get_module_mid_by_dirname( $dirname )
{
	$module_handler =& xoops_gethandler('module');
	$module = $module_handler->getByDirname( $dirname );
	if ( is_object($module) ) {
		return $module->getVar( 'mid' );
	}
	return 0;
}

// --- class end ---
}

?>