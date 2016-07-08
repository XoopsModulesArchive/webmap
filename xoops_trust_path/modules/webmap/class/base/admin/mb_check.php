<?php
// $Id: mb_check.php,v 1.1.1.1 2009/02/23 03:26:45 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if ( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_base_admin_mb_check
//=========================================================
class webmap_base_admin_mb_check
{
	var $_multibyte_class ;

	var $_lang_title   = 'Multibyte Check' ;
	var $_lang_success = 'Success' ;

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_base_admin_mb_check()
{
	$this->_multibyte_class = new webmap_base_lib_multibyte();
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function main()
{
	restore_error_handler() ;
	error_reporting( E_ALL ) ;

	$charset = isset($_POST['charset']) ? $_POST['charset'] : _CHARSET ;

	$this->http_output('pass');
	header( 'Content-Type:text/html; charset='.$charset );

	$str  = $this->build_head( $this->_lang_title, $charset );
	$str .= $this->build_body_begin();
	$str .= 'charset : '.$charset."<br />\n";
	$str .= $this->_lang_success ;
	$str .= "<br /><br />\n";
	$str .= '<input class="formButton" value="'. _CLOSE .'" type="button" onclick="javascript:window.close();" />';
	$str .= $this->build_body_end();

	echo $this->conv( $str, $charset );
}

function set_lang_title( $val )
{
	$this->_lang_title = $val ;
}

function set_lang_success( $val )
{
	$this->_lang_success = $val ;
}

//---------------------------------------------------------
// head
//---------------------------------------------------------
function build_head( $title=null, $charset=null )
{
	if ( empty($charset) ) {
		$charset = _CHARSET;
	}

	$str  = '<html><head>'."\n";
	$str .= '<meta http-equiv="Content-Type" content="text/html; charset='. $this->sanitize( $charset ) .'" />'."\n";
	$str .= '<title>'. $this->sanitize( $title ) .'</title>'."\n";
	$str .= '</head>'."\n";
	return $str;
}

function build_body_begin()
{
	$str = '<body>'."\n";
	return $str;
}

function build_body_end()
{
	$str = '</body></html>'."\n";
	return $str;
}

function sanitize( $str )
{
	return htmlspecialchars( $str, ENT_QUOTES );
}

//---------------------------------------------------------
// multibyte
//---------------------------------------------------------
function http_output( $encoding )
{
	return $this->_multibyte_class->m_mb_http_output( $encoding );
}

function conv( $str, $charset )
{
	return $this->_multibyte_class->convert_encoding( $str, $charset, _CHARSET );
}

// --- class end ---
}

?>