<?php
// $Id: config.php,v 1.1.1.1 2009/02/23 03:26:47 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_compo_xoops_config
//=========================================================
class webmap_compo_xoops_config extends webmap_base_xoops_config_dirname
{

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_compo_xoops_config( $dirname )
{
	$this->webmap_base_xoops_config_dirname( $dirname );
}

function &getSingleton( $dirname )
{
	static $singletons;
	if ( !isset( $singletons[ $dirname ] ) ) {
		$singletons[ $dirname ] = new webmap_compo_xoops_config( $dirname );
	}
	return $singletons[ $dirname ];
}

// --- class end ---
}

?>