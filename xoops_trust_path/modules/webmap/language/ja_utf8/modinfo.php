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
define($constpref."DESC","Google Maps API を利用して地図を表示する");

// module config
define($constpref."CFG_APIKEY","Google API Key");
define($constpref."CFG_APIKEY_DSC", 'Google Maps を利用する場合は <br /> <a href="http://www.google.com/apis/maps/signup.html" target="_blank">Sign Up for the Google Maps API</a> <br /> にて <br /> API key を取得してください<br /><br />パラメータの詳細は下記をご覧ください<br /><a href="http://www.google.com/apis/maps/documentation/reference.html" target="_blank">Google Maps API Reference</a>' );
define($constpref."CFG_ADDRESS",   "住所");
define($constpref."CFG_LATITUDE",  "緯度");
define($constpref."CFG_LONGITUDE", "経度");
define($constpref."CFG_ZOOM", "ズーム");
define($constpref."CFG_MAP_TYPE",  "地図の形式");
define($constpref."CFG_MAP_TYPE_DSC",  "GMapType");
define($constpref."OPT_MAP_TYPE_NORMAL",   "地図: Normal");
define($constpref."OPT_MAP_TYPE_SATELLITE","航空写真: Satellite");
define($constpref."OPT_MAP_TYPE_HYBRID",   "地図+写真: Hybrid");
define($constpref."OPT_MAP_TYPE_PHYSICAL", "地形: Physical");
define($constpref."CFG_MAP_CONTROL",  "マップ・コントロール");
define($constpref."CFG_MAP_CONTROL_DSC",  "GLargeMapControl, GSmallMapControl, GSmallZoomControl");
define($constpref."OPT_MAP_CONTROL_NON",   "表示しない");
define($constpref."OPT_MAP_CONTROL_LARGE", "大きいコントロール: Large");
define($constpref."OPT_MAP_CONTROL_SMALL", "小さいコントロール: Small");
define($constpref."OPT_MAP_CONTROL_ZOOM",  "ズーム: Zoom");
define($constpref."CFG_TYPE_CONTROL",  "地図形式ボタンを使用する");
define($constpref."CFG_TYPE_CONTROL_DSC",  "GMapTypeControl, addMapType");
define($constpref."OPT_TYPE_CONTROL_DEFAULT",  "デフォルト: 地図, 航空写真, 地図+写真");
define($constpref."OPT_TYPE_CONTROL_PHYSICAL", "「地形」を追加する");
define($constpref."CFG_USE_SCALE_CONTROL",  "距離表示を使用する");
define($constpref."CFG_USE_SCALE_CONTROL_DSC",  "GScaleControl");
define($constpref."CFG_USE_OVERVIEW_MAP",  "右下の小さい地図を使用する");
define($constpref."CFG_USE_OVERVIEW_MAP_DSC",  "GOverviewMapControl");
define($constpref."CFG_USE_DRAGGABLE_MARKER",  "[検索] ドラッグ・マーカーを使用する");
define($constpref."CFG_USE_DRAGGABLE_MARKER_DSC",  "GMarker - draggable");
define($constpref."CFG_USE_SEARCH_MARKER",  "[検索] 検索結果のマーカーを使用する");
define($constpref."CFG_USE_SEARCH_MARKER_DSC",  "GMarker - icon");
define($constpref."CFG_USE_LOC_MARKER",  "[場所] マーカーを使用する");
define($constpref."CFG_USE_LOC_MARKER_DSC",  "GMarker");
define($constpref."CFG_USE_LOC_MARKER_CLICK",  "[場所] マーカーのクリックを使用する");
define($constpref."CFG_USE_LOC_MARKER_CLICK_DSC",  "GEvent - addListener");
define($constpref."CFG_LOC_MARKER_INFO",  "[場所] マーカーをクリックしたときの内容");
define($constpref."CFG_LOC_MARKER_INFO_DSC",  "GMarker - openInfoWindowHtml");
define($constpref."CFG_GEO_URL",  "[GeoRSS] RSS の URL");
define($constpref."CFG_GEO_URL_DSC",  "GGeoXml <br />GeoRSS に対応したURLを指定する");
define($constpref."CFG_GEO_TITLE", "[GeoRSS] タイトル");
define($constpref."CFG_GICON_PATH" , "アップロード・ファイルのディレクトリ" ) ;
define($constpref."CFG_GICON_PATH_DSC" , "[Googleアイコン] アップロード時の保存先ディレクトリ<br />XOOPSインストール先からの相対パスを指定する<br />最初と最後の'/'は不要<br />Unixではこのディレクトリへの書込属性をONにして下さい" ) ;
define($constpref."CFG_GICON_FSIZE" , "最大ファイル容量" ) ;
define($constpref."CFG_GICON_FSIZE_DSC" , "[Googleアイコン] アップロード時のファイル容量制限(byte)" ) ;
define($constpref."CFG_GICON_WIDTH" , "最大の横幅と高さ" ) ;
define($constpref."CFG_GICON_WIDTH_DSC" , "[Googleアイコン] アップロード時の横幅と高さの最大" ) ;
define($constpref."CFG_GICON_QUALITY" ,  "JPEG 品質" ) ;
define($constpref."CFG_GICON_QUALITY_DSC" ,  "[Googleアイコン] アップロード時のサイズ変更したときに品質<br />1 - 100" ) ;

define($constpref."ADMENU_INDEX","目次");
define($constpref."ADMENU_LOCATION","緯度・経度を取得する");
define($constpref."ADMENU_KML","KMLのデバッグ表示");
define($constpref."ADMENU_GICON_MANAGER","Googleアイコン管理");
define($constpref."ADMENU_GICON_TABLE_MANAGE","Googleアイコンテーブル管理");

}
// === define begin ===

?>