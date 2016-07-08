<?php
// $Id: constants.php,v 1.2 2009/03/06 12:05:57 ohwada Exp $

//=========================================================
// webphoto module
// 2009-02-11 K.OHWADA
//=========================================================

if( ! defined( 'XOOPS_TRUST_PATH' ) ) die( 'not permit' ) ;

// === define begin ===
if( !defined("_C_WEBMAP_LOADED") ) 
{

define("_C_WEBMAP_LOADED", 1 ) ;

//=========================================================
// Constant
//=========================================================

// config
define("_C_WEBMAP_CFG_ADDRESS", "Yokohama, Japan" ) ;
define("_C_WEBMAP_CFG_LATITUDE", "35.443924694026" ) ;
define("_C_WEBMAP_CFG_LONGITUDE", "139.63738918304" ) ;
define("_C_WEBMAP_CFG_ZOOM", "10" ) ;
define("_C_WEBMAP_CFG_LOC_MARKER_INFO", '<b>Exsample</b><br/><a href="http://www.city.yokohama.jp/en/" target="_blank"><img src="http://www.city.yokohama.jp/en/img/logo.gif" border="0" /><br />Yokohama City Office</a>' ) ;
define("_C_WEBMAP_CFG_GEO_URL", "http://api.flickr.com/services/feeds/geo/?id=8645522@N06&format=rss_200" ) ;
define("_C_WEBMAP_CFG_GEO_TITLE", "Flickr : ken.ohwada" ) ;
define("_C_WEBMAP_CFG_GICON_FSIZE", "102400" ) ;	// 100 KB
define("_C_WEBMAP_CFG_GICON_WIDTH", "50" ) ;	// 50 pixel
define("_C_WEBMAP_CFG_GICON_QUALITY", "95" ) ;

// error code
define("_C_WEBMAP_ERR_NO_PERM",         -101 ) ;
define("_C_WEBMAP_ERR_NO_RECORD",       -102 ) ;
define("_C_WEBMAP_ERR_TOKEN",           -103 ) ;
define("_C_WEBMAP_ERR_DB",              -104 ) ;
define("_C_WEBMAP_ERR_UPLOAD",          -105 ) ;
define("_C_WEBMAP_ERR_FILE",            -106 ) ;
define("_C_WEBMAP_ERR_FILEREAD",        -107 ) ;
define("_C_WEBMAP_ERR_NO_SPECIFIED",    -108 ) ;
define("_C_WEBMAP_ERR_NO_IMAGE",        -109 ) ;
define("_C_WEBMAP_ERR_NO_TITLE",        -110 ) ;
define("_C_WEBMAP_ERR_CHECK_DIR",       -111 ) ;
define("_C_WEBMAP_ERR_NOT_ALLOWED_EXT", -112 ) ;
define("_C_WEBMAP_ERR_EMPTY_FILE",      -113 ) ;
define("_C_WEBMAP_ERR_EMPTY_CAT",       -114 ) ;
define("_C_WEBMAP_ERR_INVALID_CAT",     -115 ) ;
define("_C_WEBMAP_ERR_NO_CAT_RECORD",   -116 ) ;
define("_C_WEBMAP_ERR_EXT",             -117 ) ;
define("_C_WEBMAP_ERR_FILE_SIZE",       -118 ) ;
define("_C_WEBMAP_ERR_CREATE_PHOTO",    -119 ) ;
define("_C_WEBMAP_ERR_CREATE_THUMB",    -120 ) ;
define("_C_WEBMAP_ERR_GET_IMAGE_SIZE",  -121 ) ;
define("_C_WEBMAP_ERR_EMBED",       -122 ) ;
define("_C_WEBMAP_ERR_PLAYLIST",    -123 ) ;
define("_C_WEBMAP_ERR_NO_FALSHVAR", -124 ) ;
define("_C_WEBMAP_ERR_VOTE_OWN",   -125 ) ;
define("_C_WEBMAP_ERR_VOTE_ONCE",  -126 ) ;
define("_C_WEBMAP_ERR_NO_RATING",  -127 ) ;

// === define end ===
}

?>