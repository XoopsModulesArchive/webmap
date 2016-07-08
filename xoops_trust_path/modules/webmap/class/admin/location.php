<?php
// $Id: location.php,v 1.1.1.1 2009/02/23 03:26:43 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

//=========================================================
// class webmap_admin_location
//=========================================================
class webmap_admin_location extends webmap_admin_base
{
	var $_config_item;

	var $_THIS_FCT = 'location';
	var $_THIS_URL = null;

	var $_MAP_WIDTH  = '95%' ;
	var $_MAP_HEIGHT = '650px' ;

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_admin_location( $dirname )
{
	$this->webmap_admin_base( $dirname );

	$this->_config_item = new webmap_base_xoops_config_item( $dirname );
	$this->_THIS_URL = $this->build_this_url( $this->_THIS_FCT ) ;

}

function &getInstance( $dirname )
{
	static $instance;
	if (!isset($instance)) {
		$instance = new webmap_admin_location( $dirname );
	}
	return $instance;
}

//---------------------------------------------------------
// function
//---------------------------------------------------------
function main()
{
	$op = isset($_POST['op']) ? $_POST['op'] : null ;

	if ( $op == 'edit' ) {
		if ( $this->check_token() ) {
			$this->save();
			redirect_header( $this->_THIS_URL, 1, _EDIT );
		}
	}

	xoops_cp_header();

	echo $this->build_admin_menu();
	echo $this->build_admin_title( 'location' );

	if ( $this->_token_error_flag ) {
		xoops_error('Ticket Error');
	}

	$this->print_template();

	xoops_cp_footer();
	exit();
}

function save()
{
	$this->_config_item->get_objects();
	if ( isset($_POST['webmap_address']) ) {
		$this->_config_item->save( 'address', $_POST['webmap_address'] );
	}
	if ( isset($_POST['webmap_latitude']) ) {
		$this->_config_item->save( 'latitude', floatval($_POST['webmap_latitude']) );
	}
	if ( isset($_POST['webmap_longitude']) ) {
		$this->_config_item->save( 'longitude', floatval($_POST['webmap_longitude']) );
	}
	if ( isset($_POST['webmap_zoom']) ) {
		$this->_config_item->save( 'zoom', intval($_POST['webmap_zoom']) );
	}
}

function print_template()
{
	$tmplate = 'db:'. $this->_DIRNAME .'_admin_location.html' ;
	$param   = $this->build_template_param();

	$tpl = new XoopsTpl();
	$tpl->assign( $param );
	$tpl->display( $tmplate );
}

function build_template_param()
{
	$arr = array(
		'xoops_dirname' => $this->_DIRNAME ,
		'ticket'        => $this->get_token() ,
		'module_name'   => $this->_xoops_param->get_module_name() ,
		'mid'           => $this->_xoops_param->get_module_mid() ,
		'map_width'     => $this->_MAP_WIDTH ,
		'map_height'    => $this->_MAP_HEIGHT ,
		'api_key'       => $this->get_config('apikey') ,
		'latitude'      => $this->get_config('latitude') ,
		'longitude'     => $this->get_config('longitude') ,
		'zoom'          => $this->get_config('zoom') ,
		'address_s'     => $this->get_config_text('address', 's') ,

		'lang_address'          => $this->get_lang('ADDRESS') ,
		'lang_latitude'         => $this->get_lang('LATITUDE') ,
		'lang_longitude'        => $this->get_lang('LONGITUDE') ,
		'lang_zoom'             => $this->get_lang('ZOOM') ,
		'lang_search'           => $this->get_lang('SEARCH') ,
		'lang_search_list'      => $this->get_lang('SEARCH_LIST') ,
		'lang_current_location' => $this->get_lang('CURRENT_LOCATION') ,
		'lang_current_address'  => $this->get_lang('CURRENT_ADDRESS') ,
		'lang_no_match_place'   => $this->get_lang('NO_MATCH_PLACE') ,
		'lang_not_compatible'   => $this->get_lang('NOT_COMPATIBLE') ,
		'lang_js_invalid'       => $this->get_lang('JS_INVALID') ,
		'lang_module_desc'      => _MI_WEBMAP_DESC ,
		'lang_goto_module'      => _AM_WEBMAP_MYMENU_GOTO_MODULE ,
		'lang_conf_location'    => _AM_WEBMAP_LOCATION ,
		'lang_conf_address'     => _AM_WEBMAP_ADDRESS ,
		'lang_preferences'      => _PREFERENCES ,
		'lang_close'            => _CLOSE ,
		'lang_edit'             => _EDIT ,
	);

	return $arr;
}

// --- class end ---
}

?>