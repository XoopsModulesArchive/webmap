<?php
// $Id: admin.php,v 1.1 2009/09/05 20:53:10 ohwada Exp $

//=========================================================
// webmap module
// 2009-02-11 K.OHWADA
//=========================================================

// === define begin ===
if( !defined("_AM_WEBMAP_LANG_LOADED") ) 
{

define("_AM_WEBMAP_LANG_LOADED" , 1 ) ;

// menu
define("_AM_WEBMAP_MYMENU_TPLSADMIN","Templates");
define("_AM_WEBMAP_MYMENU_BLOCKSADMIN","Blocs / Permissions");
define("_AM_WEBMAP_MYMENU_GOTO_MODULE" , "Page d'accueil du module" ) ;

// index
define("_AM_WEBMAP_CHK_SERVER" , "Environment serveur" ) ;
define("_AM_WEBMAP_CHK_PHP" , "Configuration PHP" ) ;
define("_AM_WEBMAP_CHK_DIR" , "Répertoire de configuration" ) ;
define("_AM_WEBMAP_CHK_BOTH_OK" , "Les deux OK" ) ;
define("_AM_WEBMAP_CHK_NEED_ON" , "Requiert ON" ) ;
define("_AM_WEBMAP_CHK_RECOMMEND_OFF" , "Recommandé OFF" ) ;
define("_AM_WEBMAP_CHK_MB_LINK" , "Vérifier que la fonction 'Charset Convert' foncrtionne correctement sur votre serveur" ) ;
define("_AM_WEBMAP_CHK_MB_DSC" , "Si la page liée ne s'affiche pas correctement, vous devez vous passer de la fonction 'Charset Convert' " ) ;
define("_AM_WEBMAP_CHK_MB_SUCCESS" , "Pouvez-vous lire cette phrase correctement ? " ) ;
define("_AM_WEBMAP_CHK_GD_LINK" , "Vérifier que la librairie GD2 fonctionne correctement ?" ) ;
define("_AM_WEBMAP_CHK_GD_DSC" , "Si la page liée ne s'affiche pas correctement, vous devez vous passer de la librairie GD2 (Truecolor)" ) ;
define("_AM_WEBMAP_CHK_GD_SUCCESS" , "Affichage réussi !<br />Vous pouvez probablement utiliser la librairie GD2" ) ;
define("_AM_WEBMAP_CHK_GD_FAILED" , "Echec de l'affichage !<br />L'emploi de la librairie GD2 est probablement impossible") ;
define("_AM_WEBMAP_CHK_ERR_CHAR_FIRST_NEED" , "Erreur: le premier caractère devrait être '/'" ) ;
define("_AM_WEBMAP_CHK_ERR_CHAR_FIRST_NOT" , "Erreur: le premier caractère ne devrait pas être '/'" ) ;
define("_AM_WEBMAP_CHK_ERR_CHAR_LAST_NEED" , "Erreur: le dernier caractère devrait être '/'" ) ;
define("_AM_WEBMAP_CHK_ERR_CHAR_LAST_NOT" , "Erreur: le dernier caractère ne devrait pas être '/'" );
define("_AM_WEBMAP_CHK_ERR_DIR_PERM" , "Erreur: vous devez au préalable créer ce dossier, avec pour CHMOD 777." ) ;
define("_AM_WEBMAP_CHK_ERR_DIR_NOT" , "Erreur: ceci n'est pas un répertoire valide." ) ;
define("_AM_WEBMAP_CHK_ERR_DIR_WRITE" , "Erreur: ce réperoire n'est pas lisible ou ouvert en écriture. Vous devez appliquer un CHMOD 777 au répertoire." ) ;
define("_AM_WEBMAP_CHK_WARN_DIR_GEUST" ,  "Les utilisateurs anonymes peuvent lire les fichiers du répertoire" ) ;
define("_AM_WEBMAP_CHK_WARN_DIR_RECOMMEND" ,  "Il est recommandé de placer ceci dans la zone securisée du serveur" ) ;

// location
define("_AM_WEBMAP_LOCATION", "Paramètres Latitude et Longitude");
define("_AM_WEBMAP_ADDRESS", "Paramètres Adresses");

// gicon list
define("_AM_WEBMAP_GICON_ADD" , "Ajouter une nouvelle icône Google" ) ;
define("_AM_WEBMAP_GICON_LIST_IMAGE" , "Icône" ) ;
define("_AM_WEBMAP_GICON_LIST_SHADOW" , "Ombre" ) ;
define("_AM_WEBMAP_GICON_ANCHOR" , "Point d'ancrage" ) ;
define("_AM_WEBMAP_GICON_WINANC" , "Fenêtre d'ancrage" ) ;
define("_AM_WEBMAP_GICON_LIST_EDIT" , "Editer une icône" ) ;

// gicon form
define("_AM_WEBMAP_GICON_MENU_NEW" ,  "Ajouter une icône" ) ;
define("_AM_WEBMAP_GICON_MENU_EDIT" , "Editer une icône" ) ;
define("_AM_WEBMAP_GICON_IMAGE_SEL" ,  "Sélectionner l'icône" ) ;
define("_AM_WEBMAP_GICON_SHADOW_SEL" , "Sélectionner l'ombre" ) ;
define("_AM_WEBMAP_GICON_SHADOW_DEL" , "Effacer l'ombre" ) ;
define("_AM_WEBMAP_GICON_DELCONFIRM" , "Confirmer la suppression de l'icône %s ?" ) ;
define("_AM_WEBMAP_CAP_MAXPIXEL","Dimension maximale (pixels)");
define("_AM_WEBMAP_CAP_MAXSIZE","Poids maximal (bytes)");
define("_AM_WEBMAP_DSC_RESIZE", "Redimensionner automatiquement si l'original dépasse cette valeur");

// === define end ===
}

?>