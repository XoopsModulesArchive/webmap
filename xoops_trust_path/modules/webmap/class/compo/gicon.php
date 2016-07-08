<?php
// $Id: gicon.php,v 1.2 2009/05/17 05:56:32 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

//---------------------------------------------------------
// change log
// 2009-05-17 K.OHWADA
// Warning [PHP]: array_flip() : The argument should be an array
//---------------------------------------------------------

//=========================================================
// class webmap_component_gicon
//=========================================================
class webmap_compo_gicon
{
	var $_gicon_handler;
	var $_DIRNAME;

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_compo_gicon( $dirname )
{
	$this->_DIRNAME = $dirname;
	$this->_gicon_handler  =& webmap_compo_handler_gicon::getSingleton( $dirname );
}

function &getSingleton( $dirname )
{
	static $singletons;
	if ( !isset( $singletons[ $dirname ] ) ) {
		$singletons[ $dirname ] = new webmap_compo_gicon( $dirname );
	}
	return $singletons[ $dirname ];
}

//---------------------------------------------------------
// pulic
//---------------------------------------------------------
function get_sel_options( $flag_none=true, $flag_flip=false )
{
	$arr = $this->_gicon_handler->get_sel_options( $flag_none );

// Warning [PHP]: array_flip() : The argument should be an array
	if ( $flag_flip && is_array($arr)  ) {
		$arr = array_flip( $arr );
	}
	return $arr;
}

// --- class end ---
}

?>