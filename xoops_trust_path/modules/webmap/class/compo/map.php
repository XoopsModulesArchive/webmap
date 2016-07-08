<?php
// $Id: map.php,v 1.5 2009/05/17 05:56:32 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

//---------------------------------------------------------
// change log
// 2009-05-17 K.OHWADA
// escape_markers()
//---------------------------------------------------------

//=========================================================
// class webmap_compo_map
//=========================================================
class webmap_compo_map
{
	var $_gicon_handler;
	var $_config_class ;
	var $_header_class;
	var $_language_class ;
	var $_multibyte_class ;
	var $_utility_class ;

	var $_latitude ;
	var $_longitude ;
	var $_zoom ;
	var $_lang_latitude ;
	var $_lang_longitude ;
	var $_lang_zoom ;
	var $_lang_no_match_place ;
	var $_lang_not_compatible ;

	var $_show_google  = false ;
	var $_show_js      = false ;
	var $_show_element = false ;
	var $_opener_mode  = '';
	var $_map_type     = 'normal';
	var $_map_control  = 'non';
	var $_type_control = 'non';
	var $_use_scale_control    = false ;
	var $_use_overview_map_control = false ;
	var $_use_draggable_marker = false ;
	var $_use_search_marker    = false ;

	var $_info_max   = 100 ;
	var $_info_width = 20 ;
	var $_info_break = '<br />' ;
	var $_info_sanitize = true ;
	var $_max_image_width  = 120 ;
	var $_max_image_height = 120 ;
	var $_flag_zero        = true ;

	var $_element_name = 'webmap_map' ;

	var $_DIRNAME ;
	var $_MODULE_URL ;
	var $_MARKER_URL ;

	var $_STYLE       = 'width:95%; border:1px solid #909090; margin-bottom:6px; ' ;
	var $_GMAP_HEIGHT = 300;

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_compo_map( $dirname )
{
	$this->_DIRNAME    = $dirname;
	$this->_MODULE_URL = XOOPS_URL .'/modules/'. $dirname ;
	$this->_MARKER_URL = $this->_MODULE_URL .'/images/markers';

	$this->_gicon_handler   =& webmap_compo_handler_gicon::getSingleton( $dirname );
	$this->_config_class    =& webmap_compo_xoops_config::getSingleton(  $dirname );
	$this->_header_class    =& webmap_compo_xoops_header::getSingleton(  $dirname );
	$this->_language_class  =& webmap_compo_d3_language::getSingleton(   $dirname );
	$this->_multibyte_class = new webmap_base_lib_multibyte();
	$this->_utility_class   = new webmap_base_lib_utility();

	$this->_latitude   = $this->_config_class->get_value_by_name( 'latitude' );
	$this->_longitude  = $this->_config_class->get_value_by_name( 'longitude' );
	$this->_zoom       = $this->_config_class->get_value_by_name( 'zoom' );
	$this->_cfg_apikey = $this->_config_class->get_value_by_name( 'apikey' );

	$this->set_lang_latitude(  $this->get_lang( 'latitude' ) ) ;
	$this->set_lang_longitude( $this->get_lang( 'longitude' ) ) ;
	$this->set_lang_zoom(      $this->get_lang( 'zoom' ) ) ;
	$this->set_lang_not_compatible( $this->get_lang( 'not_compatible' ) ) ;
	$this->set_lang_no_match_place( $this->get_lang( 'no_match_place' ) ) ;
}

function &getSingleton( $dirname )
{
	static $singletons;
	if ( !isset( $singletons[ $dirname ] ) ) {
		$singletons[ $dirname ] = new webmap_compo_map( $dirname );
	}
	return $singletons[ $dirname ];
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function get_icons( $limit=0, $offset=0 )
{
	return $this->_gicon_handler->get_icons( $limit, $offset );
}

function build_geoxml( $id, $xml_url )
{
	$arr = $this->build_param_common( $id, 'map' );
	$arr['xml_url'] = $xml_url ;
	return $arr;
}

function build_marker( $id, $markers, $icons )
{
	$arr = $this->build_param_common( $id, 'map' );
	$arr['gmap_markers'] = $this->escape_markers( $markers ) ;
	$arr['gmap_icons']   = $icons ;
	return $arr;
}

function escape_markers( $markers )
{
	if ( !is_array($markers) || !count($markers) ) {
		return $markers;
	}

	$arr = array();
	foreach ( $markers as $marker )
	{
		if ( isset($marker['info']) ) {
			$marker['info'] = $this->escape_single_quote( $marker['info'] );
		}
		$arr[] = $marker;
	}
	return $arr;
}

function escape_single_quote( $str )
{
	$str = str_replace( "\'", "'",  $str );
	$str = str_replace( "'",  "\'", $str );
	return $str;
}

function build_search( $id )
{
	$arr = $this->build_param_common( $id, 'gmap' );
	return $arr;
}

function build_get_location( $id )
{
	$arr = $this->build_param_common( $id, 'gmap', false );
	return $arr;
}

function fetch_geoxml( $param )
{
	$tmplate = 'db:'. $this->_DIRNAME .'_inc_geoxml_js.html' ;
	$tpl = new XoopsTpl();
	$tpl->assign( $param );
	return $tpl->fetch( $tmplate );
}

function fetch_marker( $param )
{
	$tmplate = 'db:'. $this->_DIRNAME .'_inc_marker_js.html' ;
	$tpl = new XoopsTpl();
	$tpl->assign( $param );
	return $tpl->fetch( $tmplate );
}

function fetch_search( $param )
{
	$tmplate = 'db:'. $this->_DIRNAME .'_inc_search_js.html' ;
	$tpl = new XoopsTpl();
	$tpl->assign( $param );
	return $tpl->fetch( $tmplate );
}

function fetch_get_location( $param )
{
	$tmplate = 'db:'. $this->_DIRNAME .'_inc_get_location_js.html' ;
	$tpl = new XoopsTpl();
	$tpl->assign( $param );
	return $tpl->fetch( $tmplate );
}

function build_param_common( $id, $kind, $flag_header=true )
{
	$style = $this->_STYLE.' height:'.$this->_GMAP_HEIGHT.'px; ';

	$show_google_js = false ;
	$show_map_js    = false ;
	$show_gmap_js   = false ;

	if ( $flag_header ) {
		$param = $this->_header_class->assign_or_get_map( $this->_cfg_apikey, $kind ) ;
		$show_google_js = $param['show_google_js'] ;
		$show_map_js    = $param['show_map_js'] ;
		$show_gmap_js   = $param['show_gmap_js'] ;
	}

	$arr = array(
		'id'              => $id ,
		'element_map'     => $this->build_element_map( $id ) ,
		'xoops_langcode'  => _LANGCODE ,
		'xoops_dirname'   => $this->_DIRNAME ,
		'module_url'      => $this->_MODULE_URL ,
		'marker_url'      => $this->_MARKER_URL ,
		'show_google_js'  => $show_google_js ,
		'show_map_js'     => $show_map_js ,
		'show_gmap_js'    => $show_gmap_js ,
		'apikey'          => $this->_cfg_apikey ,
		'show_element'    => $this->_show_element ,
		'opener_mode'     => $this->_opener_mode ,
		'latitude'        => $this->_latitude ,
		'longitude'       => $this->_longitude ,
		'zoom'            => $this->_zoom ,
		'map_type'        => $this->_map_type ,
		'map_control'     => $this->_map_control ,
		'type_control'    => $this->_type_control ,
		'use_scale_control'        => $this->bool_to_str( $this->_use_scale_control ) ,
		'use_overview_map_control' => $this->bool_to_str( $this->_use_overview_map_control ) ,
		'use_draggable_marker'     => $this->bool_to_str( $this->_use_draggable_marker ) ,
		'style'               => $style ,
		'lang_latitude'       => $this->_lang_latitude ,
		'lang_latitude'       => $this->_lang_latitude ,
		'lang_longitude'      => $this->_lang_longitude ,
		'lang_zoom'           => $this->_lang_zoom ,
		'lang_no_match_place' => $this->_lang_no_match_place ,
		'lang_not_compatible' => $this->_lang_not_compatible ,
	);
	return $arr;
}

function build_element_map( $id )
{
	$str = $this->_element_name.'_'.$id ;
	return $str ;
}

function bool_to_str( $bool )
{
	if ( $bool ) {
		return "true";
	}
	return "false";
}

function build_summary( $str )
{
	return $this->_multibyte_class->build_summary_with_wordwrap( 
		$str, $this->_info_max, $this->_info_width, $this->_info_break, $this->_info_sanitize );
}

function adjust_image_size( $width, $height )
{
	return $this->_utility_class->adjust_image_size( 
		$width, $height, 
		$this->_max_image_width, $this->_max_image_height, $this->_flag_zero );
}

//---------------------------------------------------------
// language
//---------------------------------------------------------
function get_lang( $name )
{
	return $this->_language_class->get_constant( $name );
}

//---------------------------------------------------------
// xoops_config
//---------------------------------------------------------
function get_config( $name )
{
	return $this->_config_class->get_value_by_name( $name );
}

//---------------------------------------------------------
// set param
//---------------------------------------------------------
function set_show_element( $val )
{
	$this->_show_element = (bool)$val ;
}

function set_opener_mode( $val )
{
	$this->_opener_mode = $val;
}

function set_latitude( $val )
{
	$this->_latitude = floatval($val);
}

function set_longitude( $val )
{
	$this->_longitude = floatval($val);
}

function set_zoom( $val )
{
	$this->_zoom = intval($val);
}

function set_element( $val )
{
	$this->_element = $val;
}

function set_map_type( $val )
{
	$this->_map_type = $val;
}

function set_map_control( $val )
{
	$this->_map_control = $val;
}

function set_type_control( $val )
{
	$this->_type_control = $val;
}

function set_use_scale_control( $val )
{
	$this->_use_scale_control = (bool)$val;
}

function set_use_overview_map_control( $val )
{
	$this->_use_overview_map_control = (bool)$val;
}

function set_use_draggable_marker( $val )
{
	$this->_use_draggable_marker = (bool)$val;
}

function set_use_search_marker( $val )
{
	$this->_use_search_marker = (bool)$val;
}

function set_element_name( $val )
{
	$this->_element_name = $val ;
}

function set_lang_latitude( $val )
{
	$this->_lang_latitude = $val ;
}

function set_lang_longitude( $val )
{
	$this->_lang_longitude = $val ;
}

function set_lang_zoom( $val )
{
	$this->_lang_zoom = $val ;
}

function set_lang_not_compatible( $val )
{
	$this->_lang_not_compatible = $val ;
}

function set_lang_no_match_place( $val )
{
	$this->_lang_no_match_place = $val ;
}

function set_info_max( $val )
{
	$this->_info_max = intval($val) ;
}

function set_info_width( $val )
{
	$this->_info_width = intval($val) ;
}

function set_info_break( $val )
{
	$this->_info_break = $val ;
}

function set_max_image_width( $val )
{
	$this->_max_image_width = intval($val) ;
}

function set_max_image_height( $val )
{
	$this->_max_image_height = intval($val) ;
}

// --- class end ---
}

?>