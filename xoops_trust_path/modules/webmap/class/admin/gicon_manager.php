<?php
// $Id: gicon_manager.php,v 1.1.1.1 2009/02/23 03:26:44 ohwada Exp $

//=========================================================
// webphoto module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webphoto_admin_gicon_manager
//=========================================================
class webmap_admin_gicon_manager extends webmap_admin_base
{
	var $_gicon_handler;
	var $_uploader_class;
	var $_gd_class ;
	var $_utility_class ;
	var $_config_class;
	var $_image_mime;

	var $_cfg_gicon_fsize;
	var $_cfg_gicon_width;
	var $_cfg_gicon_quality;

	var $_post_gicon_id;
	var $_post_delgicon;

// token
	var $_token_errors = null;
	var $_token_error_flag  = false;

	var $_THIS_FCT = 'gicon_manager';
	var $_THIS_URL;

	var $_ERR_ALLOW_EXTS = null;

	var $_IMAGE_FIELD_NAME  = 'gicon' ;
	var $_SHADOW_FIELD_NAME = 'gshadow' ;

	var $_INFO_Y_DEFAULT   = 3;

	var $_UPLOADER_PREFIX = 'tmp_';

	var $_TIME_SUCCESS = 1;
	var $_TIME_FAIL    = 5;

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_admin_gicon_manager( $dirname )
{
	$this->webmap_admin_base( $dirname );

	$this->_image_mime     =  new webmap_base_lib_image_mime();
	$this->_post_class     =  new webmap_base_lib_post();
	$this->_utility_class  =  new webmap_base_lib_utility();
	$this->_gicon_handler  =& webmap_compo_handler_gicon::getSingleton( $dirname );

	$this->_cfg_gicon_fsize   = $this->_xoops_param->get_module_config_by_name('gicon_fsize') ;
	$this->_cfg_gicon_width   = $this->_xoops_param->get_module_config_by_name('gicon_width') ;
	$this->_cfg_gicon_quality = $this->_xoops_param->get_module_config_by_name('gicon_quality') ;

	$this->_init_gd();
	$this->_init_uploader();

	$image_exts = $this->_image_mime->get_exts();
	$this->_ERR_ALLOW_EXTS = 'allowed file type is '. implode( ',' , $image_exts ) ;

	$this->_ADMIN_INDEX_URL = $this->_MODULE_URL .'/admin/index.php';
	$this->_THIS_URL        = $this->_ADMIN_INDEX_URL .'?fct='.$this->_THIS_FCT;
}

function &getInstance( $dirname )
{
	static $instance;
	if (!isset($instance)) {
		$instance = new webmap_admin_gicon_manager( $dirname );
	}
	return $instance;
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function main()
{
	$this->_check();

	switch ( $this->_get_action() )
	{
		case 'insert':
			$this->_insert();
			exit();

		case 'update':
			$this->_update();
			exit();

		case 'delete':
			$this->_delete();
			exit();

		default:
			break;
	}

	xoops_cp_header() ;

	echo $this->build_admin_menu();
	echo $this->build_admin_title( 'GICON_MANAGER' );

	switch ( $this->_get_disp() )
	{
		case 'edit_form':
			$this->_print_edit_form();
			break;

		case 'new_form':
			$this->_print_new_form();
			break;

		case 'list':
		default:
			$this->_print_list();
			break;
	}

	xoops_cp_footer();
	exit();
}

function _get_action()
{
	$this->_post_gicon_id = $this->_post_class->get_post_get_int( 'gicon_id' );
	$this->_post_delgicon = $this->_post_class->get_post_int('delgicon' );
	$post_action   = $this->_post_class->get_post_text( 'action' );

	if ( $post_action == 'insert' ) {
		return 'insert';
	} elseif ( ( $post_action == 'update' ) && ( $this->_post_gicon_id > 0 ) ) {
		return 'update';
	} elseif ( $this->_post_delgicon > 0 ) {
		return 'delete';
	}

	return 'list';
}

function _get_disp()
{
	$get_disp = $this->_post_class->get_get_text( 'disp' );

	if ( ( $get_disp == 'edit' ) && ( $this->_post_gicon_id > 0 ) ) {
		return 'edit_form';
	} else if( $get_disp == 'new' ) {
		return 'new_form';
	}

	return 'list';
}

//---------------------------------------------------------
// check
//---------------------------------------------------------
function _check()
{
	$ret = $this->_exec_check();
	switch ( $ret )
	{
		case _C_WEBMAP_ERR_CHECK_DIR :
			redirect_header( $this->_ADMIN_INDEX_URL, $this->_TIME_FAIL, $this->get_format_error() );
			exit();

		case 0:
		default;
			break;
	}
}

function _exec_check()
{
	$ret1 = $this->check_dir( $this->_TMP_DIR );
	if ( $ret1 < 0 ) { return $ret1; }

	$ret2 = $this->check_dir( $this->_GICONS_DIR );
	if ( $ret2 < 0 ) { return $ret2; }

	return 0;
}

//---------------------------------------------------------
// insert
//---------------------------------------------------------
function _insert()
{
	if ( ! $this->check_token() ) {
		redirect_header( $this->_THIS_URL, $this->_TIME_FAIL, $this->get_token_errors() );
		exit();
	}

	$ret = $this->_excute_insert();
	switch ( $ret )
	{
		case _C_WEBMAP_ERR_DB:
			$msg  = 'DB error <br />';
			$msg .= $this->get_format_error();
			redirect_header( $this->_THIS_URL, $this->_TIME_FAIL, $msg );
			exit();

		case _C_WEBMAP_ERR_UPLOAD;
			$msg  = 'File Upload Error';
			$msg .= '<br />'.$this->get_format_error( false );
			redirect_header( $this->_THIS_URL , $this->_TIME_FAIL , $msg ) ;
			exit();

		case _C_WEBMAP_ERR_FILEREAD:
			redirect_header( $this->_THIS_URL, $this->_TIME_FAIL, _WEBMAP_ERR_FILEREAD ) ;
			exit();

		case _C_WEBMAP_ERR_NO_IMAGE;
			redirect_header( $this->_THIS_URL, $this->_TIME_FAIL, _WEBMAP_ERR_NOIMAGESPECIFIED ) ;
			exit();

		case _C_WEBMAP_ERR_NOT_ALLOWED_EXT:
			redirect_header( $this->_THIS_URL, $this->_TIME_FAIL, $this->_ERR_ALLOW_EXTS );
			exit();

		default:
			break;
	}

	redirect_header( $this->_THIS_URL, $this->_TIME_SUCCESS, _WEBMAP_DBUPDATED );
	exit();

}

function _excute_insert()
{
	$shadow_tmp_name = null;

	$ret1 = $this->_fetch_image( true );
	if ( $ret1 < 0 ) {
		return $ret1;
	}

	$image_tmp_name   = $this->_uploader_get_file_name();
	$image_media_name = $this->_uploader_get_media_name();

// check image tmp name
	if ( empty($image_tmp_name) ) {
echo ' bb ';
		return _C_WEBMAP_ERR_NO_IMAGE;
	}

	$ret2 = $this->_fetch_shadow();
	if ( $ret2 < 0 ) {
		return $ret2;
	} elseif ( $ret2 == 1 ) {
		$shadow_tmp_name = $this->_uploader_get_file_name();
	}

	$row   = $this->_gicon_handler->create();
	$newid = $this->_gicon_handler->insert( $row );
	if ( !$newid ) { return $newid; }

	$row['gicon_id'] = $newid;
	$row['gicon_time_create'] = time();

	$ret4 = $this->_update_common( $row, $image_tmp_name, $shadow_tmp_name, $image_media_name );
	if ( !$ret4 ) { return $ret4; }

	return 0;
}

function _fetch_image( $need_upload )
{
	return $this->_uploader_fetch( $this->_IMAGE_FIELD_NAME, $need_upload );
}

function _fetch_shadow()
{
	return $this->_uploader_fetch( $this->_SHADOW_FIELD_NAME, false );
}

function _update_common( $row, $image_tmp_name, $shadow_tmp_name, $image_media_name=null )
{
	$gicon_id = $row['gicon_id'];

	$title = $this->_post_class->get_post_text('gicon_title');

// create image if upload
	if ( $image_tmp_name ) {
		$row = $this->create_main_row( $row, $image_tmp_name );

		if ( empty($title) ) {
			$title = $image_media_name ;
		}
	}

// create shadow if upload
	if ( $shadow_tmp_name ) {
		$row = $this->create_shadow_row( $row, $shadow_tmp_name );
	}

	if ( $title ) {
		$row['gicon_title'] = $title;
	}

	$row['gicon_time_update'] = time();

	$ret3 = $this->_gicon_handler->update( $row );
	if ( !$ret3 ) {
		$this->set_error( $this->_gicon_handler->get_errors() );
		return _C_WEBMAP_ERR_DB;
	}

	return 0;
}

//---------------------------------------------------------
// update
//---------------------------------------------------------
function _update()
{
	if ( ! $this->check_token() ) {
		redirect_header( $this->_THIS_URL, $this->_TIME_FAIL, $this->get_token_errors() );
		exit();
	}

	$ret = $this->_excute_update();
	switch ( $ret )
	{
		case _C_WEBMAP_ERR_NO_RECORD:
			redirect_header( $this->_THIS_URL, $this->_TIME_FAIL, _AM_WEBMAP_ERR_NO_RECORD );
			exit();

		case _C_WEBMAP_ERR_DB:
			$msg  = 'DB error <br />';
			$msg .= $this->get_format_error();
			redirect_header( $this->_THIS_URL, $this->_TIME_FAIL, $msg );
			exit();

		case _C_WEBMAP_ERR_UPLOAD;
			$msg  = 'File Upload Error';
			$msg .= '<br />'.$this->get_format_error( false );
			redirect_header( $this->_THIS_URL , $this->_TIME_FAIL , $msg ) ;
			exit();

		case _C_WEBMAP_ERR_FILEREAD:
			redirect_header( $this->_THIS_URL, $this->_TIME_FAIL, _WEBMAP_ERR_FILEREAD ) ;
			exit();

		case _C_WEBMAP_ERR_NOT_ALLOWED_EXT:
			redirect_header( $this->_THIS_URL, $this->_TIME_FAIL, $this->_ERR_ALLOW_EXTS );
			exit();

		default:
			break;
	}

	redirect_header( $this->_THIS_URL, $this->_TIME_SUCCESS, _WEBMAP_DBUPDATED );
	exit();

}

function _excute_update()
{
	$image_tmp_name  = null;
	$shadow_tmp_name = null;

	$post_shadow_del = $this->_post_class->get_post_int( 'shadow_del' );

	$row = $this->_gicon_handler->get_row_by_id( $this->_post_gicon_id );
	if ( !is_array($row) ) {
		return _C_WEBMAP_ERR_NO_RECORD;
	}

// set by post
	$row['gicon_anchor_x'] = $this->_post_class->get_post_int('gicon_anchor_x') ;
	$row['gicon_anchor_y'] = $this->_post_class->get_post_int('gicon_anchor_y') ;
	$row['gicon_info_x']   = $this->_post_class->get_post_int('gicon_info_x') ;
	$row['gicon_info_y']   = $this->_post_class->get_post_int('gicon_info_y') ;

	$ret1 = $this->_fetch_image( false );
	if ( $ret1 < 0 ) {
		return $ret1;
	} elseif ( $ret1 == 1 ) {
		$image_tmp_name = $this->_uploader_get_file_name();
	}

	$ret2 = $this->_fetch_shadow();
	if ( $ret2 < 0 ) {
		return $ret2;
	} elseif ( $ret2 == 1 ) {
		$shadow_tmp_name = $this->_uploader_get_file_name();
	}

//delete old files
	if ( $post_shadow_del || $shadow_tmp_name ){

// default icons have no name value
		if ( $row['gicon_shadow_path'] && $row['gicon_shadow_name'] ) {
			$this->_unlink_path( $row['gicon_shadow_path'] );
			$row['gicon_shadow_path']   = '' ;
			$row['gicon_shadow_name']   = '' ;
			$row['gicon_shadow_ext']    = '' ;
			$row['gicon_shadow_width']  = 0 ;
			$row['gicon_shadow_height'] = 0 ;
		}
	}

	$ret4 = $this->_update_common( $row, $image_tmp_name, $shadow_tmp_name );
	if ( !$ret4 ) { return $ret4; }

	return 0;
}

function _unlink_path( $path )
{
	$file = XOOPS_ROOT_PATH . $path ;
	if ( $path && is_file($file) ) {
		unlink( $file );
	}
}

//---------------------------------------------------------
// delete
//---------------------------------------------------------
function _delete()
{
	$gicon_id = $this->_post_delgicon;

	if ( ! $this->check_token() ) {
		redirect_header( $this->_THIS_URL, $this->_TIME_FAIL, $this->get_token_errors() );
		exit();
	}

	$row = $this->_gicon_handler->get_row_by_id( $gicon_id );
	if ( !is_array($row) ) {
		redirect_header( $this->_THIS_URL, $this->_TIME_FAIL, _AM_WEBMAP_ERR_NO_RECORD );
		exit();
	}

// delete image files
// default icons have no name value
	if ( $row['gicon_image_path'] && $row['gicon_image_name'] ) {
		$this->_unlink_path( $row['gicon_image_path'] );
	}
	if ( $row['gicon_shadow_path'] && $row['gicon_shadow_name'] ) {
		$this->_unlink_path( $row['gicon_shadow_path'] );
	}

	$ret = $this->_gicon_handler->delete_by_id( $gicon_id );
	if ( ! $ret ) {
		$this->set_error( $this->_gicon_handler->get_errors() );
		$msg  = 'DB error <br />';
		$msg .= $this->get_format_error();
		redirect_header( $this->_THIS_URL, $this->_TIME_FAIL, $msg );
		exit();
	}

	redirect_header( $this->_THIS_URL, $this->_TIME_SUCCESS, _WEBMAP_DBUPDATED );
	exit();
}

//---------------------------------------------------------
// form
//---------------------------------------------------------
function _print_edit_form()
{
	$row = $this->_gicon_handler->get_row_by_id( $this->_post_gicon_id );
	if ( !is_array($row) ) {
		redirect_header( $this->_THIS_URL , $this->_TIME_FAIL , _AM_WEBMAP_ERR_NO_RECORD ) ;
	}

	$this->_print_gicon_form( 'edit' , $row );
}

function _print_new_form()
{
	$row = $this->_gicon_handler->create();

	$this->_print_gicon_form( 'new' , $row );
}

//---------------------------------------------------------
// list
//---------------------------------------------------------
function _print_list()
{
	echo '<p><a href="'. $this->_THIS_URL .'&amp;disp=new">';
	echo _AM_WEBMAP_GICON_ADD;
	echo '</a></p>'."\n" ;

	$rows = $this->_gicon_handler->get_rows_all_asc();

	$this->_print_gicon_list( $rows );

}

//---------------------------------------------------------
// create image
//---------------------------------------------------------
function create_main_row( $row, $tmp_name )
{
	if ( empty($tmp_name) ) {
		return $row;
	}

	$gicon_id   = $row['gicon_id'];
	$image_info = $this->resize_image( $gicon_id, $tmp_name, $this->_SUB_DIR_GICONS );

	if ( !is_array($image_info) || !$image_info['is_image'] ) {
		return $row;
	}

	$image_width  = $image_info['width'] ;
	$image_height = $image_info['height'] ;

	$row['gicon_image_path']   = $image_info['path'] ;
	$row['gicon_image_name']   = $image_info['name'] ;
	$row['gicon_image_ext']    = $image_info['ext'] ;
	$row['gicon_image_width']  = $image_width ;
	$row['gicon_image_height'] = $image_height ;
	$row['gicon_anchor_x']     = $image_width / 2;
	$row['gicon_anchor_y']     = $image_height ;
	$row['gicon_info_x']       = $image_width / 2;
	$row['gicon_info_y']       = $this->_INFO_Y_DEFAULT ;

	return $row ;
}

function create_shadow_row( $row, $tmp_name )
{
	if ( empty($tmp_name) ) {
		return $row;
	}

	$gicon_id   = $row['gicon_id'];
	$image_info = $this->resize_image( $gicon_id, $tmp_name, $this->_SUB_DIR_GSHADOWS );

	if ( !is_array($image_info) || !$image_info['is_image'] ) {
		return $row;
	}

	$row['gicon_shadow_path']   = $image_info['path'] ;
	$row['gicon_shadow_name']   = $image_info['name'] ;
	$row['gicon_shadow_ext']    = $image_info['ext'] ;
	$row['gicon_shadow_width']  = $image_info['width'] ;
	$row['gicon_shadow_height'] = $image_info['height'] ;

	return $row ;
}

function resize_image( $gicon_id, $tmp_name, $sub_dir )
{
	$max_width  = $this->_cfg_gicon_width ;
	$max_height = $this->_cfg_gicon_width ;

	$width    = 0;
	$height   = 0;
	$is_image = false;

	$ext      = $this->parse_ext( $tmp_name );
	$tmp_file = $this->_TMP_DIR   .'/'. $tmp_name;

	$name = 'g'. sprintf( '%05d', $gicon_id ) .'.'. $ext ;
	$path = $this->_UPLOADS_PATH .'/'. $sub_dir .'/'. $name ;
	$file = XOOPS_ROOT_PATH . $path ;
	$url  = XOOPS_URL       . $path ;

	if ( $this->check_resize( $tmp_file, $max_width, $max_height ) ) {
		$ret = $this->_gd_resize_rotate( 
			$tmp_file, $file, $max_width, $max_height );
		if ( ! $ret ) {
			return null ;
		}

	} else {
		copy( $tmp_file, $file );
	}

	$size = GetImageSize( $file ) ;
	if ( is_array($size) ) {
		$width    = $size[0];
		$height   = $size[1];
		$is_image = true;
	}

	$arr = array(
		'url'      => $url ,
		'path'     => $path ,
		'name'     => $name ,
		'ext'      => $ext ,
		'width'    => $width ,
		'height'   => $height ,
		'is_image' => $is_image ,
	);

	return $arr;
}

function check_resize( $file, $max_width, $max_height )
{
	$size = GetImageSize( $file ) ;
	if ( ! is_array($size) ) {
		return false;
	}
	$width  = $size[0];
	$height = $size[1];
	if ( $width > $max_width ) {
		return true;
	}
	if ( $height > $max_height ) {
		return true;
	}
	return false;
}

//---------------------------------------------------------
// gd class
//---------------------------------------------------------
function _init_gd()
{ 
	$this->_gd_class =  new webmap_base_lib_gd();
	$this->_gd_class->set_jpeg_quality( $this->_cfg_gicon_quality );
}

function _gd_resize_rotate( 
	$src_file, $dst_file, $max_width, $max_height, $rotate=0 )
{
	return $this->_gd_class->resize_rotate( 
		$src_file, $dst_file, $max_width, $max_height, $rotate );
}

//---------------------------------------------------------
// uploader
//---------------------------------------------------------
function _init_uploader()
{
	$this->_uploader_class = new webmap_base_lib_uploader_lang( 
		$this->_DIRNAME, $this->_TRUST_DIRNAME );

	$this->_uploader_class->setPrefix( $this->_UPLOADER_PREFIX ) ;
	$this->_uploader_class->setUploadDir( $this->_TMP_DIR );
	$this->_uploader_class->setAllowedExtensions( $this->_image_mime->get_exts() );
	$this->_uploader_class->setAllowedMimeTypes(  $this->_image_mime->get_mimes() );
	$this->_uploader_class->setMaxFileSize( $this->_cfg_gicon_fsize );
	$this->_uploader_class->init_errors();
}

function _uploader_fetch( $field, $need_upload )
{
	$this->clear_errors() ;

	$ret = $this->_uploader_class->fetchMedia( $field );
	if ( !$ret ) {
		$error_num = $this->_uploader_class->getMediaError();
		if ( $error_num == UPLOAD_ERR_NO_FILE ) {
			if ( $need_upload ) {
				return _C_WEBMAP_ERR_NO_IMAGE;
			}
			return 0;	// no action
		}

		$this->set_error( $this->_uploader_class->build_uploader_errors() ) ;
		return _C_WEBMAP_ERR_UPLOAD ;
	}

	$ret = $this->_uploader_class->upload();
	if ( !$ret ) {
		$this->set_error( $this->_uploader_class->build_uploader_errors() ) ;
		return _C_WEBMAP_ERR_UPLOAD ;
	}

	return 1 ;	// success
}

function _uploader_get_file_name()
{
	return $this->_uploader_class->getSavedFileName();
}

function _uploader_get_media_name()
{
	return $this->_uploader_class->getMediaName();
}

//---------------------------------------------------------
// token
//---------------------------------------------------------
function check_token( $allow_repost=false )
{
	global $xoopsGTicket;
	if ( is_object($xoopsGTicket) ) {
		if ( ! $xoopsGTicket->check( true , '',  $allow_repost ) ) {
			$this->_token_error_flag  = true;
			$this->_token_errors = $xoopsGTicket->getErrors();
			return false;
		}
	}
	$this->_token_error_flag = false;
	return true;
}

//---------------------------------------------------------
// utility
//---------------------------------------------------------
function parse_ext( $file )
{
	return $this->_utility_class->parse_ext( $file );
}

//---------------------------------------------------------
// admin_gicon_form
//---------------------------------------------------------
function _print_gicon_form( $mode , $row )
{
	$form =& webmap_admin_gicon_form::getInstance( 
		$this->_DIRNAME , $this->_TRUST_DIRNAME );
	$form->print_form( $mode, $row );
}

function _print_gicon_list( $rows )
{
	$form =& webmap_admin_gicon_form::getInstance( 
		$this->_DIRNAME , $this->_TRUST_DIRNAME );
	$form->print_list( $rows );
}

// --- class end ---
}

?>