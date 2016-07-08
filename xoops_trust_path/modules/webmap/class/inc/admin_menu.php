<?php
// $Id: admin_menu.php,v 1.1.1.1 2009/02/23 03:26:47 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_inc_admin_menu
// caller webmap_lib_admin_menu admin/menu.php
//=========================================================
class webmap_inc_admin_menu extends webmap_base_inc_admin_menu
{

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_inc_admin_menu( $dirname )
{
	$this->webmap_base_inc_admin_menu( $dirname );
}

function &getSingleton( $dirname )
{
	static $singletons;
	if ( !isset( $singletons[ $dirname ] ) ) {
		$singletons[ $dirname ] = new webmap_inc_admin_menu( $dirname );
	}
	return $singletons[ $dirname ];
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function define_main_menu()
{
	$menu[0]['title']  = 'INDEX' ;
	$menu[0]['fct']    = '';
	$menu[1]['title']  = 'LOCATION' ;
	$menu[1]['fct']    = 'location';
	$menu[2]['title']  = 'KML' ;
	$menu[2]['fct']    = 'kml';
	$menu[2]['target'] = '_blank';
	$menu[3]['title']  = 'GICON_MANAGER' ;
	$menu[3]['fct']    = 'gicon_manager';
	$menu[4]['title']  = 'GICON_TABLE_MANAGE' ;
	$menu[4]['fct']    = 'gicon_table_manage';

	return $menu;
}

// --- class end ---
}

?>