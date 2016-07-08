<?php
// $Id: get_location.php,v 1.1.1.1 2009/02/23 03:26:43 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//---------------------------------------------------------
// myself:     default
// new window: mode=opener
// inline:     mode=parent
//---------------------------------------------------------

//=========================================================
// class webphoto_main_get_location
//=========================================================
class webmap_main_get_location extends webmap_view_map
{
	var $_multibyte_class;

	var $_OPNER_MODE  = 'parent';
	var $_STYLE       = 'width:95%; border:1px solid #909090; margin-bottom:6px; ' ;
	var $_GMAP_HEIGHT = 300;

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_main_get_location( $dirname )
{
	$this->webmap_view_map( $dirname );

	$this->_multibyte_class = new webmap_base_lib_multibyte();
}

function &getInstance( $dirname )
{
	static $instance;
	if (!isset($instance)) {
		$instance = new webmap_main_get_location( $dirname );
	}
	return $instance;
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function main()
{
	$apikey = $this->get_config('apikey') ;

	if ( $apikey ) {
		$this->_show_template( $apikey );
	} else {
		$this->_show_error();
	}
}

function _show_template( $apikey )
{
	$template = 'db:'. $this->_DIRNAME.'_main_get_location.html' ;

	$param = $this->_build_template_param( $apikey );

	$this->_http_output( 'pass' );
	header ('Content-Type:text/html; charset=UTF-8');

	$tpl = new XoopsTpl();
	$tpl->assign( $param );
	$tpl->display( $template );
}

function _build_template_param( $apikey )
{
	$id = 0;

	$flag_location = false;
	$show_gmap = false;
	$gmap_list = null;

	list( $code, $latitude, $longitude, $zoom ) = $this->_get_center() ;

	$style = $this->_STYLE.' height:'.$this->_GMAP_HEIGHT.'px; ';

	$arr = $this->build_main( false );
	$arr['latitude']  = $latitude ;
	$arr['longitude'] = $longitude ;
	$arr['zoom']      = $zoom ;
	$arr['style']     = $style ;

	list( $js, $element ) = $this->build_map( $id, $latitude, $longitude, $zoom );

	$arr['map_js']      = $js;
	$arr['element_map'] = $element;
	$arr['element_list']   = "webmap_gmap_list";
	$arr['element_search'] = "webmap_gmap_search";
	$arr['element_current_location'] = "webmap_gmap_current_location";
	$arr['element_current_address']  = "webmap_gmap_current_address";

// utf8
	$ret = array();
	foreach ( $arr as $k => $v ) {
		$ret[ $k ] = $this->_utf8( $v );
	}

	return $ret;
}

function _get_center()
{
	$code      = 1;
	$latitude  = $this->get_config('latitude') ;
	$longitude = $this->get_config('longitude') ;
	$zoom      = $this->get_config('zoom') ;

	return array( $code, $latitude, $longitude, $zoom );
}

function build_map( $id, $lat, $lng, $zoom )
{
	$icons   = null;
	$markers = null;

	$this->init_map();
	$this->_map_class->set_latitude(  $lat );
	$this->_map_class->set_longitude( $lng );
	$this->_map_class->set_zoom(      $zoom );
	$this->_map_class->set_use_draggable_marker( true );
	$this->_map_class->set_use_search_marker(    true );
	$this->_map_class->set_opener_mode( $this->_OPNER_MODE );

	$param   = $this->_map_class->build_get_location( $id, $markers, $icons );
	$js      = $this->_map_class->fetch_get_location( $param );
	$element = $param['element_map'];

	return array( $js, $element );
}

//---------------------------------------------------------
// show error
//---------------------------------------------------------
function _show_error()
{
	$title = $this->get_lang('TITLE_GET_LOCATION');

	header ('Content-Type:text/html; charset='._CHARSET);

// --- raw HTML begin ---
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="content-type" content="text/html; charset='. _CHARSET .'"/>
<title>weblinks - <?php echo $title; ?></title>
</head>
<body>
<h3><?php echo $title; ?></h3>
<h4 style="color: #ff0000;">not set google map api key</h4>
</body>
</html>
<?php
// --- raw HTML end ---
}

//---------------------------------------------------------
// multibyte
//---------------------------------------------------------
function _http_output( $encoding )
{
	return $this->_multibyte_class->m_mb_http_output( $encoding );
}

function _utf8( $str )
{
	return $this->_multibyte_class->convert_to_utf8( $str );
}

function _utf8_lang( $name )
{
	return $this->_utf8( $this->get_lang( $name ) );
}


// --- class end ---
}

?>