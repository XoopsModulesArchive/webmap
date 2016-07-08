<?php
// $Id: base.php,v 1.1.1.1 2009/02/23 03:26:44 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_admin_base
//=========================================================
class webmap_admin_base extends webmap_base_admin_base
{
	var $_dir_class ;
	var $_xoops_param ;
	var $_language_class ;

	var $_SUB_DIR_GICONS   = 'gicons' ;
	var $_SUB_DIR_GSHADOWS = 'gshadows' ;
	var $_SUB_DIR_TMP      = 'tmp' ;

	var $_UPLOADS_DIR ;
	var $_GICONS_DIR ;
	var $_GSHADOWS_DIR ;
	var $_TMP_DIR ;

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_admin_base( $dirname )
{
	$this->webmap_base_admin_base( $dirname, WEBMAP_TRUST_DIRNAME );

	$this->_dir_class      =  new webmap_base_lib_dir();
	$this->_xoops_param    =  new webmap_base_xoops_param();
	$this->_language_class =& webmap_compo_d3_language::getSingleton( $dirname );

	$UPLOADS_PATH = $this->_xoops_param->get_module_config_by_name('gicon_path') ;
	$this->_UPLOADS_DIR  = XOOPS_ROOT_PATH .'/'. $UPLOADS_PATH ;
	$this->_GICONS_DIR   = $this->_UPLOADS_DIR .'/'. $this->_SUB_DIR_GICONS ;
	$this->_GSHADOWS_DIR = $this->_UPLOADS_DIR .'/'. $this->_SUB_DIR_GSHADOWS ;
	$this->_TMP_DIR      = $this->_UPLOADS_DIR .'/'. $this->_SUB_DIR_TMP ;
}

//---------------------------------------------------------
// admin_menu
//---------------------------------------------------------
function build_admin_menu()
{
	$webmap_base_class =  new webmap_base_admin_menu( $this->_DIRNAME , $this->_TRUST_DIRNAME );
	$webmap_class  =& webmap_inc_admin_menu::getSingleton( $this->_DIRNAME );

	$webmap_base_class->set_main_menu( $webmap_class->build_main_menu() );
	$menu = $webmap_base_class->build_menu_with_sub();
	return $menu ;
}

//---------------------------------------------------------
// dir
//---------------------------------------------------------
function make_dir( $dir )
{
	return $this->_dir_class->make_dir( $dir ) ;
}

function check_dir( $dir )
{
	if ( $this->_dir_class->check_dir( $dir ) ) {
		return 0;
	}
	$this->set_error( 'dir error : '.$dir );
	return _C_WEBMAP_ERR_CHECK_DIR ;
}

//---------------------------------------------------------
// config
//---------------------------------------------------------
function get_config( $name )
{
	return $this->_xoops_param->get_module_config_by_name( $name );
}

function get_config_text( $name )
{
	return $this->_xoops_param->get_module_config_text_by_name( $name );
}

//---------------------------------------------------------
// language
//---------------------------------------------------------
function get_lang( $name )
{
	return $this->_language_class->get_constant( $name );
}

// --- class end ---
}

?>