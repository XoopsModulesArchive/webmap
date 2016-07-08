<?php
// $Id: index.php,v 1.1.1.1 2009/02/23 03:26:43 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

//=========================================================
// class webmap_admin_index
//=========================================================
class webmap_admin_index extends webmap_admin_base
{

//---------------------------------------------------------
// constructor
//---------------------------------------------------------
function webmap_admin_index( $dirname )
{
	$this->webmap_admin_base( $dirname );

	$this->_dir_class   = new webmap_base_lib_dir();
	$this->_check_class = new webmap_base_admin_server_check( $dirname, WEBMAP_TRUST_DIRNAME );
}

function &getInstance( $dirname )
{
	static $instance;
	if (!isset($instance)) {
		$instance = new webmap_admin_index( $dirname );
	}
	return $instance;
}

//---------------------------------------------------------
// main
//---------------------------------------------------------
function main()
{
	xoops_cp_header();

	echo $this->build_admin_menu();
	echo $this->build_admin_title( 'INDEX' );
	echo _MI_WEBMAP_DESC;
	echo "<br /><br />\n";

	$this->_make_dir();

	echo "<h4>". _AM_WEBMAP_CHK_SERVER ."</h4>\n" ;
	echo $this->_check_class->build_server();

	echo "<h4>". _AM_WEBMAP_CHK_PHP ."</h4>\n";
	echo $this->_check_class->build_php_secure();
	echo $this->_check_class->build_php_upload();
	echo $this->_check_class->build_php_etc();
	echo $this->_check_class->build_php_iconv();
	echo "<br />\n";

	echo "<b>mbstring</b><br />\n" ;
	echo $this->_check_class->build_php_mbstring();
	echo "<br />\n";
	echo $this->_check_class->build_mulitibyte_link();
	echo "<br />\n";
	echo $this->_check_class->build_gd();
	echo "<br />\n";

	echo "<h4>"._AM_WEBMAP_CHK_DIR."</h4>\n" ;
	$this->_check_dir();
	echo "<br />\n"

?>
<hr />
<div style="text-align: right; font-size: 80%;">
<a href="http://linux2.ohwada.net/" target="_blank">
Powered by Happy Linux
</a><br />
&copy; 2007, Kenichi OHWADA<br />
</div>
<?php

	xoops_cp_footer();
	exit();
}

function _make_dir()
{
	echo $this->_dir_class->make_dir( $this->_UPLOADS_DIR );
	echo $this->_dir_class->make_dir( $this->_GICONS_DIR );
	echo $this->_dir_class->make_dir( $this->_GSHADOWS_DIR );
	echo $this->_dir_class->make_dir( $this->_TMP_DIR );
}

function _check_dir()
{
	$path = $this->_xoops_param->get_module_config_by_name('gicon_path') ;

	echo "<b>GICON Path</b><br />\n" ;
	echo XOOPS_ROOT_PATH.'/'.$path." : ";
	echo $this->_check_class->build_path( $path );
}

// --- class end ---
}

?>