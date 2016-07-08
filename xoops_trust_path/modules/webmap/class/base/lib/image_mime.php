<?php
// $Id: image_mime.php,v 1.1.1.1 2009/02/23 03:26:47 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_base_lib_image_mime
//=========================================================
class webmap_base_lib_image_mime
{
	var $_EXTS  = array('gif','jpg','jpeg','png');
	var $_MIMES = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_base_lib_image_mime()
{
	//
}

//---------------------------------------------------------
// get param
//---------------------------------------------------------
function get_exts()
{
	return $this->_EXTS ;
}

function get_mimes()
{
	return $this->_MIMES ;
}

// --- class end ---
}

?>