<?php
// $Id: main.php,v 1.1.1.1 2009/02/23 03:26:43 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

// === define begin ===
if( !defined("_MB_WEBMAP_LANG_LOADED") ) 
{

define("_MB_WEBMAP_LANG_LOADED" , 1 ) ;

// tilte
define("_WEBMAP_TITLE_SEARCH", "地図の検索");
define("_WEBMAP_TITLE_SEARCH_DESC",  "住所から地図を検索する");
define("_WEBMAP_TITLE_LOCATION", "地図の表示");
define("_WEBMAP_TITLE_LOCATION_DESC", "緯度経度を指定して特定の場所の地図を表示する");
define("_WEBMAP_TITLE_GEORSS", "GeoRSS の表示");
define("_WEBMAP_TITLE_GEORSS_DESC", "GeoRSS に対応した RSS から緯度経度を取得して、地図上に表示する");

// google icon table
define("_WEBMAP_GICON_TABLE" , "Googleアイコンテーブル" ) ;
define("_WEBMAP_GICON_ID" ,          "アイコンID" ) ;
define("_WEBMAP_GICON_TIME_CREATE" , "作成日時" ) ;
define("_WEBMAP_GICON_TIME_UPDATE" , "更新日時" ) ;
define("_WEBMAP_GICON_TITLE" ,     "アイコン名" ) ;
define("_WEBMAP_GICON_IMAGE_PATH" ,  "本体 パス" ) ;
define("_WEBMAP_GICON_IMAGE_NAME" ,  "本体 ファイル名" ) ;
define("_WEBMAP_GICON_IMAGE_EXT" ,   "本体 拡張子" ) ;
define("_WEBMAP_GICON_SHADOW_PATH" , "シャドー パス" ) ;
define("_WEBMAP_GICON_SHADOW_NAME" , "シャドー ファイル名" ) ;
define("_WEBMAP_GICON_SHADOW_EXT" ,  "シャドー 拡張子" ) ;
define("_WEBMAP_GICON_IMAGE_WIDTH" ,  "本体 画像横幅" ) ;
define("_WEBMAP_GICON_IMAGE_HEIGHT" , "本体 画像高さ" ) ;
define("_WEBMAP_GICON_SHADOW_WIDTH" ,  "シャドー 画像横幅" ) ;
define("_WEBMAP_GICON_SHADOW_HEIGHT" , "シャドー 画像高さ" ) ;
define("_WEBMAP_GICON_ANCHOR_X" , "アンカー Xサイズ" ) ;
define("_WEBMAP_GICON_ANCHOR_Y" , "アンカー Yサイズ" ) ;
define("_WEBMAP_GICON_INFO_X" , "WindowInfo Xサイズ" ) ;
define("_WEBMAP_GICON_INFO_Y" , "WindowInfo Yサイズ" ) ;

// google_js
define('_WEBMAP_ADDRESS',  '住所');
define('_WEBMAP_LATITUDE', '緯度');
define('_WEBMAP_LONGITUDE','経度');
define('_WEBMAP_ZOOM','ズーム');
define('_WEBMAP_NOT_COMPATIBLE', '貴方のブラウザでは GoogleMaps を表示できません');

// search
define('_WEBMAP_SEARCH', '検索');
define('_WEBMAP_SEARCH_LIST',  '検索結果の一覧');
define('_WEBMAP_CURRENT_LOCATION',  '現在の位置');
define('_WEBMAP_CURRENT_ADDRESS',  '現在の住所');
define('_WEBMAP_NO_MATCH_PLACE',  '該当する場所がない');
define('_WEBMAP_JS_INVALID', '貴方のブラウザでは JavaScript が使用できません');

// kml
define('_WEBMAP_DOWNLOAD_KML', 'KML をダウンロードして、GoogleEarth で見る');

// get_location
define('_WEBMAP_TITLE_GET_LOCATION', '緯度・経度を取得する');
define('_WEBMAP_GET_LOCATION', '緯度・経度を取得する');

// form
define("_WEBMAP_DBUPDATED","データベース更新に成功した");
define("_WEBMAP_DELETED","削除しました");
define("_WEBMAP_ERR_NOIMAGESPECIFIED","画像未選択：アップロードすべき画像ファイルを選択して下さい。");
define("_WEBMAP_ERR_FILE","画像アップロードに失敗：画像ファイルが見つからないか容量制限を越えてます。");
define("_WEBMAP_ERR_FILEREAD","画像読込失敗：なんらかの理由でアップロードされた画像ファイルを読み出せません。");

// PHP upload error
// http://www.php.net/manual/en/features.file-upload.errors.php
define("_WEBMAP_UPLOADER_PHP_ERR_OK", "エラーはなく、ファイルアップロードは成功しています");
define("_WEBMAP_UPLOADER_PHP_ERR_INI_SIZE", "アップロードされたファイルは、upload_max_filesize の値を超えています");
define("_WEBMAP_UPLOADER_PHP_ERR_FORM_SIZE", "アップロードされたファイルは、%s を超えています");
define("_WEBMAP_UPLOADER_PHP_ERR_PARTIAL", "アップロードされたファイルは一部のみしかアップロードされていません");
define("_WEBMAP_UPLOADER_PHP_ERR_NO_FILE", "ファイルはアップロードされませんでした");
define("_WEBMAP_UPLOADER_PHP_ERR_NO_TMP_DIR", "テンポラリフォルダがありません");
define("_WEBMAP_UPLOADER_PHP_ERR_CANT_WRITE", "ディスクへの書き込みに失敗しました");
define("_WEBMAP_UPLOADER_PHP_ERR_EXTENSION", "ファイルのアップロードが拡張モジュールによって停止されました");

// upload error
define("_WEBMAP_UPLOADER_ERR_NOT_FOUND", "アップロード・ファイルが見つからない");
define("_WEBMAP_UPLOADER_ERR_INVALID_FILE_SIZE", "ファイル・サイズが設定されていない");
define("_WEBMAP_UPLOADER_ERR_EMPTY_FILE_NAME", "ファイル名が設定されていない");
define("_WEBMAP_UPLOADER_ERR_NO_FILE", "ファイルはアップロードされてない");
define("_WEBMAP_UPLOADER_ERR_NOT_SET_DIR", "アップロード・ディレクトリが設定されていない");
define("_WEBMAP_UPLOADER_ERR_NOT_ALLOWED_EXT", "許可されていない拡張子です");
define("_WEBMAP_UPLOADER_ERR_PHP_OCCURED", "アップローダーでエラーが発生した ");
define("_WEBMAP_UPLOADER_ERR_NOT_OPEN_DIR", "アップロード・ディレクトリがオープンできない ");
define("_WEBMAP_UPLOADER_ERR_NO_PERM_DIR", "アップロード・ディレクトリのアクセス権限がない ");
define("_WEBMAP_UPLOADER_ERR_NOT_ALLOWED_MIME", "許可されていないMIMEタイプです ");
define("_WEBMAP_UPLOADER_ERR_LARGE_FILE_SIZE", "ファイル・サイズが大きすぎる ");
define("_WEBMAP_UPLOADER_ERR_LARGE_WIDTH", "画像横幅が大きすぎる ");
define("_WEBMAP_UPLOADER_ERR_LARGE_HEIGHT", "画像高さが大きすぎる ");
define("_WEBMAP_UPLOADER_ERR_UPLOAD", "アップロードに失敗した ");

// === define end ===
}

?>