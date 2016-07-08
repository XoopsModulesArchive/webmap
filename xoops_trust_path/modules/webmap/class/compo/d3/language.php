<?php
// $Id: language.php,v 1.1.1.1 2009/02/23 03:26:47 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_compo_d3_language
//=========================================================
class webmap_compo_d3_language extends webmap_base_d3_language
{

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_compo_d3_language( $dirname )
{
	$this->webmap_base_d3_language( $dirname, WEBMAP_TRUST_DIRNAME );
	$this->get_lang_array();
}

function &getSingleton( $dirname )
{
	static $singletons;
	if ( !isset( $singletons[ $dirname ] ) ) {
		$singletons[ $dirname ] = new webmap_compo_d3_language( $dirname );
	}
	return $singletons[ $dirname ];
}

//----- class end -----
}

?>