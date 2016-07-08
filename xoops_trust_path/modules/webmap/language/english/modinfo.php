<?php
// $Id: modinfo.php,v 1.1.1.1 2009/02/23 03:26:43 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

// test
if ( defined( 'FOR_XOOPS_LANG_CHECKER' ) ) {
	$MY_DIRNAME = 'webmap' ;

// normal
} elseif (  isset($GLOBALS['MY_DIRNAME']) ) {
	$MY_DIRNAME = $GLOBALS['MY_DIRNAME'];

// call by altsys/mytplsadmin.php
} elseif ( $mydirname ) {
	$MY_DIRNAME = $mydirname;

// probably error
} else {
	echo "not set dirname in ". __FILE__ ." <br />\n";
	$MY_DIRNAME = 'webmap' ;
}

$constpref = strtoupper( '_MI_' . $MY_DIRNAME. '_' ) ;

// === define begin ===
if( defined( 'FOR_XOOPS_LANG_CHECKER' ) || !defined($constpref."LANG_LOADED") ) 
{

define($constpref."LANG_LOADED" , 1 ) ;

// module name
define($constpref."NAME","Google Maps");
define($constpref."DESC","Show map using Google Maps API");

// module config
define($constpref."CFG_APIKEY","Google API Key");
define($constpref."CFG_APIKEY_DSC", 'Get the API key on <br/><a href="http://www.google.com/apis/maps/signup.html" target="_blank">Sign Up for the Google Maps API</a><br /><br />For the details of the parameter, see the following<br /><a href="http://www.google.com/apis/maps/documentation/reference.html" target="_blank">Google Maps API Reference</a>' );
define($constpref."CFG_ADDRESS",   "Address");
define($constpref."CFG_LATITUDE",  "Latitude");
define($constpref."CFG_LONGITUDE", "Longitude");
define($constpref."CFG_ZOOM", "Zoom");
define($constpref."CFG_MAP_TYPE",  "Map type'");
define($constpref."CFG_MAP_TYPE_DSC",  "GMapType");
define($constpref."OPT_MAP_TYPE_NORMAL",   "Map: Normal");
define($constpref."OPT_MAP_TYPE_SATELLITE","Satellite");
define($constpref."OPT_MAP_TYPE_HYBRID",   "Hybrid");
define($constpref."OPT_MAP_TYPE_PHYSICAL", "Terrain");
define($constpref."CFG_MAP_CONTROL",  "Map Control");
define($constpref."CFG_MAP_CONTROL_DSC",  "GLargeMapControl, GSmallMapControl, GSmallZoomControl");
define($constpref."OPT_MAP_CONTROL_NON",   "Not Show");
define($constpref."OPT_MAP_CONTROL_LARGE", "Large Map Control");
define($constpref."OPT_MAP_CONTROL_SMALL", "Small Map Controll");
define($constpref."OPT_MAP_CONTROL_ZOOM",  "Small Zoom Control");
define($constpref."CFG_TYPE_CONTROL",  "Use Map Type Control");
define($constpref."CFG_TYPE_CONTROL_DSC",  "GMapTypeControl, addMapType");
define($constpref."OPT_TYPE_CONTROL_DEFAULT",  "Default: Map, Satellite, Hybrid");
define($constpref."OPT_TYPE_CONTROL_PHYSICAL", "add 'Terrain' ");
define($constpref."CFG_USE_SCALE_CONTROL",  "Use Scale Control");
define($constpref."CFG_USE_SCALE_CONTROL_DSC",  "GScaleControl");
define($constpref."CFG_USE_OVERVIEW_MAP",  "Use Overview Map");
define($constpref."CFG_USE_OVERVIEW_MAP_DSC",  "GOverviewMapControl");
define($constpref."CFG_USE_DRAGGABLE_MARKER",  "[Search] Use Draggable Marker");
define($constpref."CFG_USE_DRAGGABLE_MARKER_DSC",  "GMarker - draggable");
define($constpref."CFG_USE_SEARCH_MARKER",  "[Search] Use Search Result Marker");
define($constpref."CFG_USE_SEARCH_MARKER_DSC",  "GMarker - icon");
define($constpref."CFG_USE_LOC_MARKER",  "[Location] Use Marker");
define($constpref."CFG_USE_LOC_MARKER_DSC",  "GMarker");
define($constpref."CFG_USE_LOC_MARKER_CLICK",  "[Location] Use Maker Click");
define($constpref."CFG_USE_LOC_MARKER_CLICK_DSC",  "GEvent - addListener");
define($constpref."CFG_LOC_MARKER_INFO",  "[Location] Content when click marker");
define($constpref."CFG_LOC_MARKER_INFO_DSC",  "GMarker - openInfoWindowHtml");
define($constpref."CFG_GEO_URL",  "[GeoRSS] URL of RSS");
define($constpref."CFG_GEO_URL_DSC",  "GGeoXml <br />Set URL supporting GeoRSS");
define($constpref."CFG_GEO_TITLE", "[GeoRSS] Title");
define($constpref."CFG_GICON_PATH" , "Path to uploads" ) ;
define($constpref."CFG_GICON_PATH_DSC" , "[Google Icon] Directory for uploaded files<br />
Relative path from the directory installed XOOPS.<br />The first character should not  '/'. <br />The last character should not be '/' <br />This directory's permission is 777 or 707 in unix." ) ;
define($constpref."CFG_GICON_FSIZE" , "Max of file size" ) ;
define($constpref."CFG_GICON_FSIZE_DSC" , "[Google Icon] The limitation of the size of uploading file.(bytes)" ) ;
define($constpref."CFG_GICON_WIDTH" , "Max of image width and height" ) ;
define($constpref."CFG_GICON_WIDTH_DSC" , "[Google Icon] This means the images's width and height to be resized." ) ;
define($constpref."CFG_GICON_QUALITY" ,  "JPEG Quality" ) ;
define($constpref."CFG_GICON_QUALITY_DSC" ,  "[Google Icon] The quality if resizing when upload<br />1 - 100" ) ;

define($constpref."ADMENU_INDEX","Index");
define($constpref."ADMENU_LOCATION","Get Latitude and Longitude");
define($constpref."ADMENU_KML","Debug view of KML");
define($constpref."ADMENU_GICON_MANAGER","Google Icon Manager");
define($constpref."ADMENU_GICON_TABLE_MANAGE","Google icon table manage");

}
// === define begin ===

?>