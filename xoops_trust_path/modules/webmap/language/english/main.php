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
define("_WEBMAP_TITLE_SEARCH", "Search Map");
define("_WEBMAP_TITLE_SEARCH_DESC",  "Search map from address");
define("_WEBMAP_TITLE_LOCATION", "Show Map");
define("_WEBMAP_TITLE_LOCATION_DESC", "Show map which is specified latitude and longitude");
define("_WEBMAP_TITLE_GEORSS", "Show GeoRSS");
define("_WEBMAP_TITLE_GEORSS_DESC", "Show marker on the map, getting latitude and longitude by RSS supporing GeoRSS");

// google icon table
define("_WEBMAP_GICON_TABLE" , "Google Icon Table" ) ;
define("_WEBMAP_GICON_ID" ,          "Icon ID" ) ;
define("_WEBMAP_GICON_TIME_CREATE" , "Create Time" ) ;
define("_WEBMAP_GICON_TIME_UPDATE" , "Update Time" ) ;
define("_WEBMAP_GICON_TITLE" ,     "Icon Title" ) ;
define("_WEBMAP_GICON_IMAGE_PATH" ,  "Image Path" ) ;
define("_WEBMAP_GICON_IMAGE_NAME" ,  "Image Name" ) ;
define("_WEBMAP_GICON_IMAGE_EXT" ,   "Image Extntion" ) ;
define("_WEBMAP_GICON_SHADOW_PATH" , "Shadow Path" ) ;
define("_WEBMAP_GICON_SHADOW_NAME" , "Shadow Name" ) ;
define("_WEBMAP_GICON_SHADOW_EXT" ,  "Shadow Extention" ) ;
define("_WEBMAP_GICON_IMAGE_WIDTH" ,  "Image Width" ) ;
define("_WEBMAP_GICON_IMAGE_HEIGHT" , "Image Height" ) ;
define("_WEBMAP_GICON_SHADOW_WIDTH" ,  "Shadow Height" ) ;
define("_WEBMAP_GICON_SHADOW_HEIGHT" , "Shadow Y Size" ) ;
define("_WEBMAP_GICON_ANCHOR_X" , "Anchor X Size" ) ;
define("_WEBMAP_GICON_ANCHOR_Y" , "Anchor Y Size" ) ;
define("_WEBMAP_GICON_INFO_X" , "WindowInfo X Size" ) ;
define("_WEBMAP_GICON_INFO_Y" , "WindowInfo Y Size" ) ;

// google_js
define("_WEBMAP_ADDRESS",  "Address");
define("_WEBMAP_LATITUDE", "Latitude");
define("_WEBMAP_LONGITUDE","Longitude");
define("_WEBMAP_ZOOM","Zoom");
define("_WEBMAP_NOT_COMPATIBLE", "Your browser cannot use GoogleMaps");

// search
define("_WEBMAP_SEARCH", "Search");
define("_WEBMAP_SEARCH_LIST",  "Search Results");
define("_WEBMAP_CURRENT_LOCATION",  "Current Location");
define("_WEBMAP_CURRENT_ADDRESS",  "Current Address");
define("_WEBMAP_NO_MATCH_PLACE",  "There are no place to match the address");
define("_WEBMAP_JS_INVALID", "Your browser cannot use JavaScript");

// kml
define("_WEBMAP_DOWNLOAD_KML", "Download KML and show in GoogleEarth");

// get_location
define("_WEBMAP_TITLE_GET_LOCATION", "Setting of Latitude and Longitude");
define("_WEBMAP_GET_LOCATION", "Get latitude and longitude");

// form
define("_WEBMAP_DBUPDATED","Database Updated Successfully");
define("_WEBMAP_DELETED","Deleted¤¿");
define("_WEBMAP_ERR_NOIMAGESPECIFIED","No image was uploaded");
define("_WEBMAP_ERR_FILE","Image is too big or there is a problem with the configuration");
define("_WEBMAP_ERR_FILEREAD","Image is not readable.");

// PHP upload error
// http://www.php.net/manual/en/features.file-upload.errors.php
define("_WEBMAP_UPLOADER_PHP_ERR_OK", "There is no error, the file uploaded with success.");
define("_WEBMAP_UPLOADER_PHP_ERR_INI_SIZE", "The uploaded file exceeds the upload_max_filesize.");
define("_WEBMAP_UPLOADER_PHP_ERR_FORM_SIZE", "The uploaded file exceeds %s .");
define("_WEBMAP_UPLOADER_PHP_ERR_PARTIAL", "The uploaded file was only partially uploaded.");
define("_WEBMAP_UPLOADER_PHP_ERR_NO_FILE", "No file was uploaded.");
define("_WEBMAP_UPLOADER_PHP_ERR_NO_TMP_DIR", "Missing a temporary folder.");
define("_WEBMAP_UPLOADER_PHP_ERR_CANT_WRITE", "Failed to write file to disk.");
define("_WEBMAP_UPLOADER_PHP_ERR_EXTENSION", "File upload stopped by extension.");

// upload error
define("_WEBMAP_UPLOADER_ERR_NOT_FOUND", "Uploaded File not found");
define("_WEBMAP_UPLOADER_ERR_INVALID_FILE_SIZE", "Invalid File Size");
define("_WEBMAP_UPLOADER_ERR_EMPTY_FILE_NAME", "Filename Is Empty");
define("_WEBMAP_UPLOADER_ERR_NO_FILE", "No file uploaded");
define("_WEBMAP_UPLOADER_ERR_NOT_SET_DIR", "Upload directory not set");
define("_WEBMAP_UPLOADER_ERR_NOT_ALLOWED_EXT", "Extension not allowed");
define("_WEBMAP_UPLOADER_ERR_PHP_OCCURED", "Error occurred: Error #");
define("_WEBMAP_UPLOADER_ERR_NOT_OPEN_DIR", "Failed opening directory: ");
define("_WEBMAP_UPLOADER_ERR_NO_PERM_DIR", "Failed opening directory with write permission: ");
define("_WEBMAP_UPLOADER_ERR_NOT_ALLOWED_MIME", "MIME type not allowed: ");
define("_WEBMAP_UPLOADER_ERR_LARGE_FILE_SIZE", "File size too large: ");
define("_WEBMAP_UPLOADER_ERR_LARGE_WIDTH", "File width must be smaller than ");
define("_WEBMAP_UPLOADER_ERR_LARGE_HEIGHT", "File height must be smaller than ");
define("_WEBMAP_UPLOADER_ERR_UPLOAD", "Failed uploading file: ");

// === define end ===
}

?>