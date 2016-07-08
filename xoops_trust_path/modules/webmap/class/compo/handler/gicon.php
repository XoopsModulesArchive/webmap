<?php
// $Id: gicon.php,v 1.1.1.1 2009/02/23 03:26:47 ohwada Exp $

//=========================================================
// webphoto module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_compo_handler_gicon
//=========================================================
class webmap_compo_handler_gicon extends webmap_base_lib_handler_dirname
{

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_compo_handler_gicon( $dirname )
{
	$this->webmap_base_lib_handler_dirname( $dirname );
	$this->set_table_prefix_dirname( 'gicon' );
	$this->set_id_name( 'gicon_id' );

	$constpref = strtoupper( '_P_' . $dirname. '_' ) ;
	$this->set_debug_sql_by_const_name(   $constpref.'DEBUG_SQL' );
	$this->set_debug_error_by_const_name( $constpref.'DEBUG_ERROR' );
}

function &getSingleton( $dirname )
{
	static $singletons;
	if ( !isset( $singletons[ $dirname ] ) ) {
		$singletons[ $dirname ] = new webmap_compo_handler_gicon( $dirname );
	}
	return $singletons[ $dirname ];
}

//---------------------------------------------------------
// create
//---------------------------------------------------------
function create( $flag_new= false )
{
	$time_create = 0;
	$time_update = 0;

	if ( $flag_new ) {
		$time = time();
		$time_create = $time;
		$time_update = $time;
	}

	$arr = array(
		'gicon_id'            => 0,
		'gicon_time_create'   => $time_create,
		'gicon_time_update'   => $time_update,
		'gicon_title'         => '',
		'gicon_image_path'    => '',
		'gicon_image_name'     => '',
		'gicon_image_ext'     => '',
		'gicon_shadow_path'   => '',
		'gicon_shadow_name'   => '',
		'gicon_shadow_ext'    => '',
		'gicon_image_width'   => 0,
		'gicon_image_height'  => 0,
		'gicon_shadow_width'  => 0,
		'gicon_shadow_height' => 0,
		'gicon_anchor_x'      => 0,
		'gicon_anchor_y'      => 0,
		'gicon_info_x'        => 0,
		'gicon_info_y'        => 0,
	);

	return $arr;
}

//---------------------------------------------------------
// insert
//---------------------------------------------------------
function insert( $row )
{
	extract( $row ) ;

	$sql  = 'INSERT INTO '.$this->_table.' (';

	$sql .= 'gicon_time_create, ';
	$sql .= 'gicon_time_update, ';
	$sql .= 'gicon_title, ';
	$sql .= 'gicon_image_path, ';
	$sql .= 'gicon_image_name, ';
	$sql .= 'gicon_image_ext, ';
	$sql .= 'gicon_shadow_path, ';
	$sql .= 'gicon_shadow_name, ';
	$sql .= 'gicon_shadow_ext, ';
	$sql .= 'gicon_image_width, ';
	$sql .= 'gicon_image_height, ';
	$sql .= 'gicon_shadow_width, ';
	$sql .= 'gicon_shadow_height, ';
	$sql .= 'gicon_anchor_x, ';
	$sql .= 'gicon_anchor_y, ';
	$sql .= 'gicon_info_x, ';
	$sql .= 'gicon_info_y ';

	$sql .= ') VALUES ( ';

	$sql .= intval($gicon_time_create).', ';
	$sql .= intval($gicon_time_update).', ';
	$sql .= $this->quote($gicon_title).', ';
	$sql .= $this->quote($gicon_image_path).', ';
	$sql .= $this->quote($gicon_image_name).', ';
	$sql .= $this->quote($gicon_image_ext).', ';
	$sql .= $this->quote($gicon_shadow_path).', ';
	$sql .= $this->quote($gicon_shadow_name).', ';
	$sql .= $this->quote($gicon_shadow_ext).', ';
	$sql .= intval($gicon_image_width).', ';
	$sql .= intval($gicon_image_height).', ';
	$sql .= intval($gicon_shadow_width).', ';
	$sql .= intval($gicon_shadow_height).', ';
	$sql .= intval($gicon_anchor_x).', ';
	$sql .= intval($gicon_anchor_y).', ';
	$sql .= intval($gicon_info_x).', ';
	$sql .= intval($gicon_info_y).' ';

	$sql .= ')';

	$ret = $this->query( $sql );
	if ( !$ret ) { return false; }

	return $this->_db->getInsertId();
}

//---------------------------------------------------------
// update
//---------------------------------------------------------
function update( $row )
{
	extract( $row ) ;

	$sql  = 'UPDATE '.$this->_table.' SET ';

	$sql .= 'gicon_time_create='.intval($gicon_time_create).', ';
	$sql .= 'gicon_time_update='.intval($gicon_time_update).', ';
	$sql .= 'gicon_title='.$this->quote($gicon_title).', ';
	$sql .= 'gicon_image_path='.$this->quote($gicon_image_path).', ';
	$sql .= 'gicon_image_name='.$this->quote($gicon_image_name).', ';
	$sql .= 'gicon_image_ext='.$this->quote($gicon_image_ext).', ';
	$sql .= 'gicon_shadow_path='.$this->quote($gicon_shadow_path).', ';
	$sql .= 'gicon_shadow_name='.$this->quote($gicon_shadow_name).', ';
	$sql .= 'gicon_shadow_ext='.$this->quote($gicon_shadow_ext).', ';
	$sql .= 'gicon_image_width='.intval($gicon_image_width).', ';
	$sql .= 'gicon_image_height='.intval($gicon_image_height).', ';
	$sql .= 'gicon_shadow_width='.intval($gicon_shadow_width).', ';
	$sql .= 'gicon_shadow_height='.intval($gicon_shadow_height).', ';
	$sql .= 'gicon_anchor_x='.intval($gicon_anchor_x).', ';
	$sql .= 'gicon_anchor_y='.intval($gicon_anchor_y).', ';
	$sql .= 'gicon_info_x='.intval($gicon_info_x).', ';
	$sql .= 'gicon_info_y='.intval($gicon_info_y).' ';

	$sql .= 'WHERE gicon_id='.intval($gicon_id);

	return $this->query( $sql );
}

//---------------------------------------------------------
// get rows
//---------------------------------------------------------
function get_sel_options( $flag_none=true )
{
	$rows = $this->get_rows_all_asc();
	if ( !is_array($rows) || !count($rows) ) {
		return null;
	}

	$arr = array();
	if ( $flag_none ) {
		$arr[0] = '---';
	}
	foreach ( $rows as $row ) {
		$arr[ $row['gicon_id'] ] = $row['gicon_title'];
	}
	return $arr;
}

function get_icons( $limit=0, $offset=0 )
{
	$rows = $this->get_rows_all_asc( $limit, $offset );
	if ( !is_array($rows) || !count($rows) ) {
		return null;
	}

	$arr = array();
	foreach ( $rows as $row ) {
		$arr[] = $this->build_single_icon( $row );
	}
	return $arr;
}

function build_single_icon( $row )
{
	$image_url  = null ;
	$shadow_url = null ;

	if ( $row['gicon_image_path'] ) {
		$image_url = XOOPS_URL . $row['gicon_image_path'] ;
	}

	if ( $row['gicon_shadow_path'] ) {
		$shadow_url = XOOPS_URL . $row['gicon_shadow_path'] ;
	}

	$arr = array(
		'id'            => $row['gicon_id'] ,
		'image_url'     => $image_url ,
		'image_width'   => $row['gicon_image_width'] ,
		'image_height'  => $row['gicon_image_height'] ,
		'anchor_x'      => $row['gicon_anchor_x'] ,
		'anchor_y'      => $row['gicon_anchor_y'] ,
		'info_x'        => $row['gicon_info_x'] ,
		'info_y'        => $row['gicon_info_y'] ,
		'shadow_url'    => $shadow_url ,
		'shadow_width'  => $row['gicon_shadow_width'] ,
		'shadow_height' => $row['gicon_shadow_height'] ,
	);
	return $arr;
}

// --- class end ---
}

?>