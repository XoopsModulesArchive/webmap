<?php
// $Id: xoops_version.php,v 1.2 2009/03/06 12:05:57 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_inc_xoops_version
//=========================================================
class webmap_inc_xoops_version extends webmap_base_inc_xoops_version
{
	var $_HAS_MAIN   = true ;
	var $_HAS_ADMIN  = true ;
	var $_HAS_CONFIG = true ;

	var $_CFG_ADDRESS   = _C_WEBMAP_CFG_ADDRESS ;
	var $_CFG_LATITUDE  = _C_WEBMAP_CFG_LATITUDE ;
	var $_CFG_LONGITUDE = _C_WEBMAP_CFG_LONGITUDE ;
	var $_CFG_ZOOM      = _C_WEBMAP_CFG_ZOOM ;
	var $_CFG_LOC_MARKER_INFO = _C_WEBMAP_CFG_LOC_MARKER_INFO ;
	var $_CFG_GEO_URL   = _C_WEBMAP_CFG_GEO_URL ;
	var $_CFG_GEO_TITLE = _C_WEBMAP_CFG_GEO_TITLE ;
	var $_CFG_GICON_FSIZE   = _C_WEBMAP_CFG_GICON_FSIZE ;
	var $_CFG_GICON_WIDTH   = _C_WEBMAP_CFG_GICON_WIDTH ;
	var $_CFG_GICON_QUALITY = _C_WEBMAP_CFG_GICON_QUALITY ;

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_inc_xoops_version( $dirname )
{
	$this->webmap_base_inc_xoops_version( $dirname );
	$this->_CFG_GICON_PATH = 'uploads/'. $dirname;
}

function &getSingleton( $dirname )
{
	static $singletons;
	if ( !isset( $singletons[ $dirname ] ) ) {
		$singletons[ $dirname ] = 
			new webmap_inc_xoops_version( $dirname );
	}
	return $singletons[ $dirname ];
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function modversion()
{
	return $this->build_modversion();
}

function get_version()
{
	return _C_WEBMAP_VERSION ;
}

//---------------------------------------------------------
// Config Settings
//---------------------------------------------------------
function build_config()
{
	$arr = array();

	$arr[] = array(
		'name'			=> 'apikey' ,
		'title'			=> $this->lang_name( 'CFG_APIKEY' ) ,
		'description'	=> $this->lang_name( 'CFG_APIKEY_DSC' ) ,
		'formtype'		=> 'textarea' ,
		'valuetype'		=> 'text' ,
		'default'		=> '' ,
		'options'		=> array()
	) ;

	$arr[] = array(
		'name'			=> 'address' ,
		'title'			=> $this->lang_name( 'CFG_ADDRESS' ) ,
		'description'	=> $this->lang_name( 'CFG_ADDRESS_DSC' ) ,
		'formtype'		=> 'textbox' ,
		'valuetype'		=> 'text' ,
		'default'		=> $this->_CFG_ADDRESS ,
		'options'		=> array()
	) ;

	$arr[] = array(
		'name'			=> 'latitude' ,
		'title'			=> $this->lang_name( 'CFG_LATITUDE' ) ,
		'description'	=> $this->lang_name( 'CFG_LATITUDE_DSC' ) ,
		'formtype'		=> 'textbox' ,
		'valuetype'		=> 'float' ,
		'default'		=> $this->_CFG_LATITUDE ,
		'options'		=> array()
	) ;

	$arr[] = array(
		'name'			=> 'longitude' ,
		'title'			=> $this->lang_name( 'CFG_LONGITUDE' ) ,
		'description'	=> $this->lang_name( 'CFG_LONGITUDE_DSC' ) ,
		'formtype'		=> 'textbox' ,
		'valuetype'		=> 'float' ,
		'default'		=> $this->_CFG_LONGITUDE ,
		'options'		=> array()
	) ;

	$arr[] = array(
		'name'			=> 'zoom' ,
		'title'			=> $this->lang_name( 'CFG_ZOOM' ) ,
		'description'	=> $this->lang_name( 'CFG_ZOOM_DSC' ) ,
		'formtype'		=> 'textbox' ,
		'valuetype'		=> 'int' ,
		'default'		=> $this->_CFG_ZOOM ,
		'options'		=> array()
	) ;

	$arr[] = array(
		'name'			=> 'map_type' ,
		'title'			=> $this->lang_name( 'CFG_MAP_TYPE' ) ,
		'description'	=> $this->lang_name( 'CFG_MAP_TYPE_DSC' ) ,
		'formtype'		=> 'select' ,
		'valuetype'		=> 'text' ,
		'default'		=> 'normal' ,
		'options'		=> array( 
			$this->lang_name('OPT_MAP_TYPE_NORMAL')    => 'normal',
			$this->lang_name('OPT_MAP_TYPE_SATELLITE') => 'satellite',
			$this->lang_name('OPT_MAP_TYPE_HYBRID')    => 'hybrid',
			$this->lang_name('OPT_MAP_TYPE_PHYSICAL')  => 'physical',
		)
	) ;

	$arr[] = array(
		'name'			=> 'map_control' ,
		'title'			=> $this->lang_name( 'CFG_MAP_CONTROL' ) ,
		'description'	=> $this->lang_name( 'CFG_MAP_CONTROL_DSC' ) ,
		'formtype'		=> 'select' ,
		'valuetype'		=> 'text' ,
		'default'		=> 'large' ,
		'options'		=> array( 
			$this->lang_name('OPT_MAP_CONTROL_NON')   => 'non',
			$this->lang_name('OPT_MAP_CONTROL_LARGE') => 'large',
			$this->lang_name('OPT_MAP_CONTROL_SMALL') => 'small',
			$this->lang_name('OPT_MAP_CONTROL_ZOOM')  => 'zoom',
		)
	) ;

	$arr[] = array(
		'name'			=> 'type_control' ,
		'title'			=> $this->lang_name( 'CFG_TYPE_CONTROL' ) ,
		'description'	=> $this->lang_name( 'CFG_TYPE_CONTROL_DSC' ) ,
		'formtype'		=> 'select' ,
		'valuetype'		=> 'text' ,
		'default'		=> 'default' ,
		'options'		=> array( 
			'_NO' => 'non',
			$this->lang_name('OPT_TYPE_CONTROL_DEFAULT')  => 'default',
			$this->lang_name('OPT_TYPE_CONTROL_PHYSICAL') => 'physical',
		)
	) ;

	$arr[] = array(
		'name'			=> 'use_scale_control' ,
		'title'			=> $this->lang_name( 'CFG_USE_SCALE_CONTROL' ) ,
		'description'	=> $this->lang_name( 'CFG_USE_SCALE_CONTROL_DSC' ) ,
		'formtype'		=> 'yesno' ,
		'valuetype'		=> 'int' ,
		'default'		=> '1' ,
		'options'		=> array() 
	) ;

	$arr[] = array(
		'name'			=> 'use_overview_map_control' ,
		'title'			=> $this->lang_name( 'CFG_USE_OVERVIEW_MAP' ) ,
		'description'	=> $this->lang_name( 'CFG_USE_OVERVIEW_MAP_DSC' ) ,
		'formtype'		=> 'yesno' ,
		'valuetype'		=> 'int' ,
		'default'		=> '1' ,
		'options'		=> array() 
	) ;

	$arr[] = array(
		'name'			=> 'use_draggable_marker' ,
		'title'			=> $this->lang_name( 'CFG_USE_DRAGGABLE_MARKER' ) ,
		'description'	=> $this->lang_name( 'CFG_USE_DRAGGABLE_MARKER_DSC' ) ,
		'formtype'		=> 'yesno' ,
		'valuetype'		=> 'int' ,
		'default'		=> '1' ,
		'options'		=> array() 
	) ;

	$arr[] = array(
		'name'			=> 'use_search_marker' ,
		'title'			=> $this->lang_name( 'CFG_USE_SEARCH_MARKER' ) ,
		'description'	=> $this->lang_name( 'CFG_USE_SEARCH_MARKER_DSC' ) ,
		'formtype'		=> 'yesno' ,
		'valuetype'		=> 'int' ,
		'default'		=> '1' ,
		'options'		=> array() 
	) ;

	$arr[] = array(
		'name'			=> 'use_loc_marker' ,
		'title'			=> $this->lang_name( 'CFG_USE_LOC_MARKER' ) ,
		'description'	=> $this->lang_name( 'CFG_USE_LOC_MARKER_DSC' ) ,
		'formtype'		=> 'yesno' ,
		'valuetype'		=> 'int' ,
		'default'		=> '1' ,
		'options'		=> array() 
	) ;

	$arr[] = array(
		'name'			=> 'use_loc_marker_click' ,
		'title'			=> $this->lang_name( 'CFG_USE_LOC_MARKER_CLICK' ) ,
		'description'	=> $this->lang_name( 'CFG_USE_LOC_MARKER_CLICK_DSC' ) ,
		'formtype'		=> 'yesno' ,
		'valuetype'		=> 'int' ,
		'default'		=> '1' ,
		'options'		=> array() 
	) ;

	$arr[] = array(
		'name'			=> 'loc_marker_info' ,
		'title'			=> $this->lang_name( 'CFG_LOC_MARKER_INFO' ) ,
		'description'	=> $this->lang_name( 'CFG_LOC_MARKER_INFO_DSC' ) ,
		'formtype'		=> 'textarea' ,
		'valuetype'		=> 'other' ,
		'default'		=> $this->_CFG_LOC_MARKER_INFO ,
		'options'		=> array() 
	) ;

	$arr[] = array(
		'name'			=> 'geo_url' ,
		'title'			=> $this->lang_name( 'CFG_GEO_URL' ) ,
		'description'	=> $this->lang_name( 'CFG_GEO_URL_DSC' ) ,
		'formtype'		=> 'textbox' ,
		'valuetype'		=> 'text' ,
		'default'		=> $this->_CFG_GEO_URL ,
		'options'		=> array()
	) ;

	$arr[] = array(
		'name'			=> 'geo_title' ,
		'title'			=> $this->lang_name( 'CFG_GEO_TITLE' ) ,
		'description'	=> $this->lang_name( 'CFG_GEO_TITLE_DSC' ) ,
		'formtype'		=> 'textbox' ,
		'valuetype'		=> 'text' ,
		'default'		=> $this->_CFG_GEO_TITLE ,
		'options'		=> array()
	) ;

	$arr[] = array(
		'name'			=> 'gicon_path' ,
		'title'			=> $this->lang_name( 'CFG_GICON_PATH' ) ,
		'description'	=> $this->lang_name( 'CFG_GICON_PATH_DSC' ) ,
		'formtype'		=> 'textbox' ,
		'valuetype'		=> 'text' ,
		'default'		=> $this->_CFG_GICON_PATH ,
		'options'		=> array()
	) ;

	$arr[] = array(
		'name'			=> 'gicon_fsize' ,
		'title'			=> $this->lang_name( 'CFG_GICON_FSIZE' ) ,
		'description'	=> $this->lang_name( 'CFG_GICON_FSIZE_DSC' ) ,
		'formtype'		=> 'textbox' ,
		'valuetype'		=> 'int' ,
		'default'		=> $this->_CFG_GICON_FSIZE ,
		'options'		=> array()
	) ;

	$arr[] = array(
		'name'			=> 'gicon_width' ,
		'title'			=> $this->lang_name( 'CFG_GICON_WIDTH' ) ,
		'description'	=> $this->lang_name( 'CFG_GICON_WIDTH_DSC' ) ,
		'formtype'		=> 'textbox' ,
		'valuetype'		=> 'int' ,
		'default'		=> $this->_CFG_GICON_WIDTH,
		'options'		=> array()
	) ;

	$arr[] = array(
		'name'			=> 'gicon_quality' ,
		'title'			=> $this->lang_name( 'CFG_GICON_QUALITY' ) ,
		'description'	=> $this->lang_name( 'CFG_GICON_QUALITY_DSC' ) ,
		'formtype'		=> 'textbox' ,
		'valuetype'		=> 'int' ,
		'default'		=> $this->_CFG_GICON_QUALITY ,
		'options'		=> array()
	) ;

	return $arr;
}

// --- class end ---
}

?>