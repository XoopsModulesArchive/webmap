<?php
// $Id: georss.php,v 1.1.1.1 2009/02/23 03:26:43 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_main_georss
//=========================================================
class webmap_main_georss extends webmap_view_map
{

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_main_georss( $dirname )
{
	$this->webmap_view_map( $dirname );
}

function &getInstance( $dirname )
{
	static $instance;
	if (!isset($instance)) {
		$instance = new webmap_main_georss( $dirname );
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
	$arr['geo_url_s']   = $this->get_config_text('geo_url',   's');
	$arr['geo_title_s'] = $this->get_config_text('geo_title', 's');

	list( $js, $element ) = $this->build_map( $id );
	$arr['map_js']      = $js;
	$arr['element_map'] = $element;

	return $arr;
}

function build_map( $id )
{
	$this->init_map();
	$param   = $this->_map_class->build_geoxml( $id, $this->get_config_text('geo_url') );
	$js      = $this->_map_class->fetch_geoxml( $param );
	$element = $param['element_map'];

	return array( $js, $element );
}

// --- class end ---
}

?>