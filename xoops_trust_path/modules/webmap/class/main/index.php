<?php
// $Id: index.php,v 1.1.1.1 2009/02/23 03:26:43 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_main_index
//=========================================================
class webmap_main_index extends webmap_view_map
{
	var $_ZOOM_GEOCODE_DEFAULT = 13;

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_main_index( $dirname )
{
	$this->webmap_view_map( $dirname );
}

function &getInstance( $dirname )
{
	static $instance;
	if (!isset($instance)) {
		$instance = new webmap_main_index( $dirname );
	}
	return $instance;
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function main()
{
	$id = 0;

	$addr = $this->get_config('address');
	$lat  = $this->get_config('latitude');
	$lng  = $this->get_config('longitude');
	$zoom = $this->get_config('zoom');

	if ( isset($_GET['lat']) && isset($_GET['lng']) ) {
		$addr = '';
		$lat  = $_GET['lat'];
		$lng  = $_GET['lng'];
		$zoom = $this->_ZOOM_GEOCODE_DEFAULT;
		if ( isset($_GET['zoom']) ) {
			$zoom = $_GET['zoom'];
		}
	}

	$arr = $this->build_main();
	$arr['address_s'] = $this->sanitize( $addr ) ;

	list( $js, $element ) = $this->build_map( $id, $lat, $lng, $zoom );

	$arr['map_js']           = $js;
	$arr['element_map']      = $element;
	$arr['element_list']     = "webmap_gmap_list";
	$arr['element_search']   = "webmap_gmap_search";
	$arr['element_current_location'] = "webmap_gmap_current_location";
	$arr['element_current_address']  = "webmap_gmap_current_address";

	return $arr;
}

function build_map( $id, $lat, $lng, $zoom )
{
	$this->init_map();
	$this->_map_class->set_latitude(  $lat );
	$this->_map_class->set_longitude( $lng );
	$this->_map_class->set_zoom(      $zoom );
	$this->_map_class->set_use_draggable_marker( $this->get_config('use_draggable_marker') );
	$this->_map_class->set_use_search_marker(    $this->get_config('use_search_marker') );

	$param   = $this->_map_class->build_search( $id );
	$js      = $this->_map_class->fetch_search( $param );
	$element = $param['element_map'];

	return array( $js, $element );
}

// --- class end ---
}

?>