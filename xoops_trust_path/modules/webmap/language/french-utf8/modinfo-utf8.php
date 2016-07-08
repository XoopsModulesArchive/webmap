<?php
// $Id: modinfo-utf8.php,v 1.1 2009/09/05 20:53:10 ohwada Exp $ 

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
define($constpref."DESC","Gestionnaire de Cartes Googlemaps");

// module config
define($constpref."CFG_APIKEY","Cl&eacute; Google API");
define($constpref."CFG_APIKEY_DSC", 'Pour obtenir votre cl&eacute; Google API :<br/><a href="http://www.google.com/apis/maps/signup.html" target="_blank">Cl&eacute; Google API</a><br /><br />Pour plus d/informations :<br /><a href="http://www.google.com/apis/maps/documentation/reference.html" target="_blank">Documentation Google Maps API</a>' );
define($constpref."CFG_ADDRESS",   "Adresse");
define($constpref."CFG_LATITUDE",  "Latitude");
define($constpref."CFG_LONGITUDE", "Longitude");
define($constpref."CFG_ZOOM", "Echelle");
define($constpref."CFG_MAP_TYPE",  "Type de vue [GMapType]");
define($constpref."CFG_MAP_TYPE_DSC",  "Choisir le type d'affichage");
define($constpref."OPT_MAP_TYPE_NORMAL",   "Vue Plan");
define($constpref."OPT_MAP_TYPE_SATELLITE","Vue satellite");
define($constpref."OPT_MAP_TYPE_HYBRID",   "Hybride (Plan + Satellite)");
define($constpref."OPT_MAP_TYPE_PHYSICAL", "Terrain");
define($constpref."CFG_MAP_CONTROL",  "Outils de navigation sur la carte [GLargeMapControl] [GSmallMapControl] [GSmallZoomControl]");
define($constpref."CFG_MAP_CONTROL_DSC",  "Afficher les contr&ocirc;les de d&eacute;placement et de zoom");
define($constpref."OPT_MAP_CONTROL_NON",   "Aucun outil");
define($constpref."OPT_MAP_CONTROL_LARGE", "Outils de d&eacute;placement et &eacute;chelle du zoom");
define($constpref."OPT_MAP_CONTROL_SMALL", "Outils de d&eacute;placement et ic&ocirc;nes + et - du zoom");
define($constpref."OPT_MAP_CONTROL_ZOOM",  "Seulement les ic&ocirc;nes + et - du zoom");
define($constpref."CFG_TYPE_CONTROL",  "Autoriser le choix de la vue [GMapTypeControl] [addMapType]");
define($constpref."CFG_TYPE_CONTROL_DSC",  "Choix possibles pour l'utilisateur");
define($constpref."OPT_TYPE_CONTROL_DEFAULT",  "D&eacute;faut : Carte, Satellite, Hybride");
define($constpref."OPT_TYPE_CONTROL_PHYSICAL", "Ajouter 'Relief' ");
define($constpref."CFG_USE_SCALE_CONTROL",  "Afficher le r&eacute;glage du zoom [GScaleControl]");
define($constpref."CFG_USE_SCALE_CONTROL_DSC",  "Contr&ocirc;le de l'&eacute;chelle d'affichage");
define($constpref."CFG_USE_OVERVIEW_MAP",  "Outils de pr&eacute;sentation [GOverviewMapControl]");
define($constpref."CFG_USE_OVERVIEW_MAP_DSC",  "");
define($constpref."CFG_USE_DRAGGABLE_MARKER",  "Recherche : Utiliser les marqueurs mobiles ?");
define($constpref."CFG_USE_DRAGGABLE_MARKER_DSC",  "Permet au visiteur de placer (de mani&egrave;re temporaire) ses propres marqueurs sur la Carte");
define($constpref."CFG_USE_SEARCH_MARKER",  "Recherche : utiliser les marqueurs pour les positions trouv&eacute;es ?");
define($constpref."CFG_USE_SEARCH_MARKER_DSC",  "");
define($constpref."CFG_USE_LOC_MARKER",  "Localisation : utiliser les marqueurs ?");
define($constpref."CFG_USE_LOC_MARKER_DSC",  "");
define($constpref."CFG_USE_LOC_MARKER_CLICK",  "Localisation : utiliser les marqueurs cliquables [GEvent] [addListener]");
define($constpref."CFG_USE_LOC_MARKER_CLICK_DSC",  "");
define($constpref."CFG_LOC_MARKER_INFO",  "Localisation : contenu affich&eacute; au clic sur le marqueur [GMarker - openInfoWindowHtml]");
define($constpref."CFG_LOC_MARKER_INFO_DSC",  "Affichage de la fen&ecirc;tre html");
define($constpref."CFG_GEO_URL",  "Flux GeoRSS : URL [GGeoXml]");
define($constpref."CFG_GEO_URL_DSC",  "Indiquer l'URL du flux RSS supportant la localisation");
define($constpref."CFG_GEO_TITLE", "Flux GeoRSS : Titre");
define($constpref."CFG_GICON_PATH" , "Ic&ocirc;nes Google : chemin du t&eacute;l&eacute;chargement" ) ;
define($constpref."CFG_GICON_PATH_DSC" , "<ul><li>R&eacute;pertoire de stockage pour les ic&ocirc;nes</li>
<li>Le chemin doit &ecirc;tre relatif au r&eacute;pertoire d'installation de Xoops (XOOOPS_ROOT_PATH)</li><li>Le premier et le dernier caract&egrave;re ne doivent pas &ecirc;tre '/'. </li><li>Le r&eacute;pertoire de stockage doit &ecirc;tre chmod&eacute; en 777 (ou 707 sous unix)</li></ul>" ) ;
define($constpref."CFG_GICON_FSIZE" , "Ic&ocirc;nes Google : poids maximum du fichier (bytes)" ) ;
define($constpref."CFG_GICON_FSIZE_DSC" , "" ) ;
define($constpref."CFG_GICON_WIDTH" , "Ic&ocirc;nes Google : largeur et hauteur maximales (pixels)" ) ;
define($constpref."CFG_GICON_WIDTH_DSC" , "Les images seront redimensionn&eacute;es pour &ecirc;tre conformes &agrave; ces limitation." ) ;
define($constpref."CFG_GICON_QUALITY" ,  "Ic&ocirc;nes Google : qualit&eacute; de la compression JPEG" ) ;
define($constpref."CFG_GICON_QUALITY_DSC" ,  "Choisir une valeur entre 1 et 100 %" ) ;

define($constpref."ADMENU_INDEX","Accueil");
define($constpref."ADMENU_LOCATION","Localisation");
define($constpref."ADMENU_KML","Code KML");
define($constpref."ADMENU_GICON_MANAGER","Gestionnaire d'ic&ocirc;nes Google");
define($constpref."ADMENU_GICON_TABLE_MANAGE","Administration des marqueurs");

}
// === define begin ===

?>