<?php
// $Id: map.php,v 1.1.1.1 2009/02/23 03:26:43 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_view_map
//=========================================================
class webmap_view_map
{
	var $_xoops_param ;
	var $_map_class;
	var $_language_class;
	var $_header_class;

	var $_DIRNAME;

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_view_map( $dirname )
{
	$this->_DIRNAME = $dirname ;
	$this->_xoops_param    =  new webmap_base_xoops_param();
	$this->_map_class      =& webmap_compo_map::getSingleton( $dirname );
	$this->_language_class =& webmap_compo_d3_language::getSingleton(  $dirname );
	$this->_header_class   =& webmap_compo_xoops_header::getSingleton( $dirname );
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function build_main( $flag_header=true )
{
	$show_default_css = false ;

	if ( $flag_header ) {
		$param = $this->_header_class->assign_or_get_default_css() ;
		$show_default_css = $param['show_default_css'] ;
	}

	$arr = array(
		'xoops_dirname'    => $this->_DIRNAME ,
		'mydirname'        => $this->_DIRNAME ,
		'module_name'      => $this->_xoops_param->get_module_name() ,
		'is_module_admin'  => $this->_xoops_param->is_module_admin() ,
		'apikey'           => $this->get_config('apikey') ,
		'show_default_css' => $show_default_css ,

		'lang_title_search'        => $this->get_lang('TITLE_SEARCH') ,
		'lang_title_location'      => $this->get_lang('TITLE_LOCATION') ,
		'lang_title_location_desc' => $this->get_lang('TITLE_LOCATION_DESC') ,
		'lang_title_georss'        => $this->get_lang('TITLE_GEORSS') ,
		'lang_title_search_desc'   => $this->get_lang('TITLE_SEARCH_DESC') ,
		'lang_title_get_location'  => $this->get_lang('TITLE_GET_LOCATION') ,
		'lang_search'              => $this->get_lang('SEARCH') ,
		'lang_search_list'         => $this->get_lang('SEARCH_LIST') ,
		'lang_current_location'    => $this->get_lang('CURRENT_LOCATION') ,
		'lang_current_address'     => $this->get_lang('CURRENT_ADDRESS') ,
		'lang_no_match_place'      => $this->get_lang('NO_MATCH_PLACE') ,
		'lang_address'             => $this->get_lang('ADDRESS') ,
		'lang_latitude'            => $this->get_lang('LATITUDE') ,
		'lang_longitude'           => $this->get_lang('LONGITUDE'),
		'lang_zoom'                => $this->get_lang('ZOOM') ,
		'lang_js_invalid'          => $this->get_lang('JS_INVALID') ,
		'lang_not_compatible'      => $this->get_lang('NOT_COMPATIBLE') ,
		'lang_download_kml'        => $this->get_lang('DOWNLOAD_KML') ,
		'lang_get_location'        => $this->get_lang('GET_LOCATION') ,

	);
	return $arr;
}

function init_map()
{
	$this->_map_class->set_latitude(  $this->get_config('latitude') );
	$this->_map_class->set_longitude( $this->get_config('longitude') );
	$this->_map_class->set_zoom(      $this->get_config('zoom') );
	$this->_map_class->set_map_type(     $this->get_config('map_type') );
	$this->_map_class->set_map_control(  $this->get_config('map_control') );
	$this->_map_class->set_type_control( $this->get_config('type_control') );
	$this->_map_class->set_use_scale_control(        $this->get_config('use_scale_control') );
	$this->_map_class->set_use_overview_map_control( $this->get_config('use_overview_map_control') );
}

//---------------------------------------------------------
// utility
//---------------------------------------------------------
function sanitize( $str )
{
	return htmlspecialchars( $str, ENT_QUOTES );
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