<?php
// $Id: main.php,v 1.1 2009/09/05 20:53:10 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

// === define begin ===
if( !defined("_MB_WEBMAP_LANG_LOADED") ) 
{

define("_MB_WEBMAP_LANG_LOADED" , 1 ) ;

// tilte
define("_WEBMAP_TITLE_SEARCH", "Rechercher une carte");
define("_WEBMAP_TITLE_SEARCH_DESC",  "Rechercher une carte depuis une adresse");
define("_WEBMAP_TITLE_LOCATION", "Afficher la Carte");
define("_WEBMAP_TITLE_LOCATION_DESC", "Afficher la carte selon les latitude et longitude indiquées");
define("_WEBMAP_TITLE_GEORSS", "Afficher le GeoRSS");
define("_WEBMAP_TITLE_GEORSS_DESC", "Afficher le marqueur sur la carte, en obtenant les latitude et longitude par RSS (GeoRSS)");

// google icon table
define("_WEBMAP_GICON_TABLE" , "Tableau des icônes Google" ) ;
define("_WEBMAP_GICON_ID" ,          "ID Icône" ) ;
define("_WEBMAP_GICON_TIME_CREATE" , "Générer l'heure" ) ;
define("_WEBMAP_GICON_TIME_UPDATE" , "Mettre à jour l'heure" ) ;
define("_WEBMAP_GICON_TITLE" ,     "Icône du titre" ) ;
define("_WEBMAP_GICON_IMAGE_PATH" ,  "Chemin de l'image" ) ;
define("_WEBMAP_GICON_IMAGE_NAME" ,  "Nom de l'image" ) ;
define("_WEBMAP_GICON_IMAGE_EXT" ,   "Extension de l'image" ) ;
define("_WEBMAP_GICON_SHADOW_PATH" , "Chemin de l'ombre" ) ;
define("_WEBMAP_GICON_SHADOW_NAME" , "Nom de l'ombre" ) ;
define("_WEBMAP_GICON_SHADOW_EXT" ,  "Extension de l'ombre" ) ;
define("_WEBMAP_GICON_IMAGE_WIDTH" ,  "Largeur de l'image" ) ;
define("_WEBMAP_GICON_IMAGE_HEIGHT" , "Hauteur de l'image" ) ;
define("_WEBMAP_GICON_SHADOW_WIDTH" ,  "Hauteur de l'ombre" ) ;
define("_WEBMAP_GICON_SHADOW_HEIGHT" , "Dimension Y de l'ombre" ) ;
define("_WEBMAP_GICON_ANCHOR_X" , "Dimension de l'ancre (X)" ) ;
define("_WEBMAP_GICON_ANCHOR_Y" , "Dimension de l'ancre (Y)" ) ;
define("_WEBMAP_GICON_INFO_X" , "Dimension de la fenêtre d'information (X)" ) ;
define("_WEBMAP_GICON_INFO_Y" , "Dimension de la fenêtre d'information (Y)" ) ;

// google_js
define("_WEBMAP_ADDRESS",  "Adresse");
define("_WEBMAP_LATITUDE", "Latitude");
define("_WEBMAP_LONGITUDE","Longitude");
define("_WEBMAP_ZOOM","Zoom");
define("_WEBMAP_NOT_COMPATIBLE", "Votre navigateur ne supporte pas GoogleMaps");

// search
define("_WEBMAP_SEARCH", "Rechercher");
define("_WEBMAP_SEARCH_LIST",  "Résultats de la recherche");
define("_WEBMAP_CURRENT_LOCATION",  "Localisation actuelle");
define("_WEBMAP_CURRENT_ADDRESS",  "Adresse actuelle");
define("_WEBMAP_NO_MATCH_PLACE",  "Aucun résultat pour recherche");
define("_WEBMAP_JS_INVALID", "Votre navigateur ne supporte pas JavaScript");

// kml
define("_WEBMAP_DOWNLOAD_KML", "Charger KML et afficher dans GoogleEarth");

// get_location
define("_WEBMAP_TITLE_GET_LOCATION", "Paramètres les latitude et longitude");
define("_WEBMAP_GET_LOCATION", "Obtenir les latitude et longitude");

// form
define("_WEBMAP_DBUPDATED","Mise à jour de la Base de données réussie");
define("_WEBMAP_DELETED","Effacé");
define("_WEBMAP_ERR_NOIMAGESPECIFIED","Aucune image chargée");
define("_WEBMAP_ERR_FILE","L'image est trop grande ou problème de configuration");
define("_WEBMAP_ERR_FILEREAD","L'image ne peut être lue.");

// PHP upload error
// http://www.php.net/manual/en/features.file-upload.errors.php
define("_WEBMAP_UPLOADER_PHP_ERR_OK", "Aucune erreur, le fichier a été chargé avec succès.");
define("_WEBMAP_UPLOADER_PHP_ERR_INI_SIZE", "Le fichier excède le poids maximum autorisé.");
define("_WEBMAP_UPLOADER_PHP_ERR_FORM_SIZE", "Le fichier excède %s .");
define("_WEBMAP_UPLOADER_PHP_ERR_PARTIAL", "Le fichier a été chargé partiellement.");
define("_WEBMAP_UPLOADER_PHP_ERR_NO_FILE", "Aucun fichier n'a été chargé.");
define("_WEBMAP_UPLOADER_PHP_ERR_NO_TMP_DIR", "Le répertoire temporaire est manquant.");
define("_WEBMAP_UPLOADER_PHP_ERR_CANT_WRITE", "Echec de l'écriture.");
define("_WEBMAP_UPLOADER_PHP_ERR_EXTENSION", "Chergement interrompu en raison de son extension impropre.");

// upload error
define("_WEBMAP_UPLOADER_ERR_NOT_FOUND", "Le fichier chargé n'a pu être trouvé");
define("_WEBMAP_UPLOADER_ERR_INVALID_FILE_SIZE", "Poids du fichier incorrect");
define("_WEBMAP_UPLOADER_ERR_EMPTY_FILE_NAME", "Nom du fichier absent");
define("_WEBMAP_UPLOADER_ERR_NO_FILE", "Aucun fichier n'a été chargé");
define("_WEBMAP_UPLOADER_ERR_NOT_SET_DIR", "Le répertoire de chargement n'a pas été défini");
define("_WEBMAP_UPLOADER_ERR_NOT_ALLOWED_EXT", "Extension non autorisée");
define("_WEBMAP_UPLOADER_ERR_PHP_OCCURED", "Erreur survenue : #");
define("_WEBMAP_UPLOADER_ERR_NOT_OPEN_DIR", "Echec de l'ouverture du répertoire : ");
define("_WEBMAP_UPLOADER_ERR_NO_PERM_DIR", "Echec de l'ouverture du répertoire avec le droit d'écriture : ");
define("_WEBMAP_UPLOADER_ERR_NOT_ALLOWED_MIME", "MIME type non autorisé : ");
define("_WEBMAP_UPLOADER_ERR_LARGE_FILE_SIZE", "Dimensions du fichiers trops importantes : ");
define("_WEBMAP_UPLOADER_ERR_LARGE_WIDTH", "La largeur de l'image doit être inférieure à ");
define("_WEBMAP_UPLOADER_ERR_LARGE_HEIGHT", "La hauteur de l'image doit être inférieure à ");
define("_WEBMAP_UPLOADER_ERR_UPLOAD", "Echech de l'ouverture du fichier : ");

// === define end ===
}

?>