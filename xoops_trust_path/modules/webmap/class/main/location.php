<?php
// $Id: location.php,v 1.1.1.1 2009/02/23 03:26:43 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_main_location
//=========================================================
class webmap_main_location extends webmap_view_map
{

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_main_location( $dirname )
{
	$this->webmap_view_map( $dirname );
}

function &getInstance( $dirname )
{
	static $instance;
	if (!isset($instance)) {
		$instance = new webmap_main_location( $dirname );
	}
	return $instance;
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function main()
{
	$id = 0;

	$arr = $this->build_main();
	$arr['address_s'] = $this->get_config_text('address', 's') ;
	$arr['latitude']  = $this->get_config('latitude');
	$arr['longitude'] = $this->get_config('longitude');
	$arr['zoom']      = $this->get_config('zoom');

	list( $js, $element ) = $this->build_map( $id );
	$arr['map_js']      = $js;
	$arr['element_map'] = $element;

	return $arr;
}

function build_map( $id )
{
	$icon_id = 0;
	$icons   = null;

	$marker = array(
		'latitude'  => $this->get_config('latitude') ,
		'longitude' => $this->get_config('longitude') ,
		'info'      => $this->get_config_text('loc_marker_info', 'textarea') ,
		'icon_id'   => $icon_id ,
	);

	$markers = array( $marker ) ;

	$this->init_map();
	$param   = $this->_map_class->build_marker( $id, $markers, $icons );
	$js      = $this->_map_class->fetch_marker( $param );
	$element = $param['element_map'];

	return array( $js, $element );
}

// --- class end ---
}

?>