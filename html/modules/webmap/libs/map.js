/* ========================================================
 * $Id: map.js,v 1.2 2009/02/25 10:53:43 ohwada Exp $
 * http://code.google.com/apis/maps/index.html
 * ========================================================
 */

function webmap_map_geoxml( param ) 
{
	var gmap = webmap_map_init( param );
	gmap.addOverlay( new GGeoXml( param["xml_url"] ) );
}

function webmap_map_marker( param, marker_array, icon_array ) 
{
	var gmap = webmap_map_init( param );

	var icons = new Array();
	for( i=0 ; i< icon_array.length ; i++ ){
		var icon_i = icon_array[i];
		icons[ icon_i["id"] ] = webmap_map_create_icon( icon_i ) ;
	}

	for( i=0 ; i< marker_array.length ; i++ ){
		var marker_i = marker_array[i];
		var icon     = webmap_map_get_icon( marker_i["icon_id"], icons );
		gmap.addOverlay( webmap_map_create_marker( marker_i, icon ) );
	}
}

function webmap_map_init( param ) 
{
	gmap = new GMap2( document.getElementById( param["element_map"] ) );
	gmap.setCenter( new GLatLng( parseFloat( param["latitude"] ) , parseFloat( param["longitude"] ) ) );
	gmap.setZoom( Math.floor( param["zoom"] ) );

	if ( param["use_type"] ) {
		gmap.addControl( new GMapTypeControl() );
	}
	if ( param["use_scale_control"] ) {
		gmap.addControl( new GScaleControl() );
	}
	if ( param["use_overview_map_control"] ) {
		gmap.addControl( new GOverviewMapControl() );
	}

	var type_control = param["type_control"];
	if ( type_control == "default" ) {
		gmap.addControl( new GMapTypeControl() );
	} else if ( type_control == "physical" ) {
		gmap.addControl( new GMapTypeControl() );
		gmap.addMapType( G_PHYSICAL_MAP );
	}

	var map_control = param["map_control"];
	if ( map_control == "large" ) {
		gmap.addControl( new GLargeMapControl() );
	} else if ( map_control == "small" ) {
		gmap.addControl( new GSmallMapControl() );
	} else if ( map_control == "zoom" ) {
		gmap.addControl( new GSmallZoomControl() );
	}

	var map_type = param["map_type"];
	if ( map_type == "satellite" ) {
		gmap.setMapType( G_SATELLITE_MAP );
	} else if ( map_type == "hybrid" ) {
		gmap.setMapType( G_HYBRID_MAP );
	} else if ( map_type == "physical" ) {
		gmap.setMapType( G_PHYSICAL_MAP );
	}

	return gmap;
}

function webmap_map_create_marker( param, icon ) 
{
	var latlng = new GLatLng( parseFloat( param["latitude"] ) , parseFloat( param["longitude"] ) ) ;
	var marker = new GMarker( latlng, { icon: icon } );

	var info = param["info"];
	if ( info != '' ) {
		GEvent.addListener( marker , "click" , function() {
			marker.openInfoWindowHtml( info );
		});
	}

	return marker;
}

function webmap_map_create_icon( param ) 
{
	var icon = new GIcon();
	icon.image = param["image_url"];
	icon.iconSize = new GSize( parseInt( param["image_width"] ), parseInt( param["image_height"] ) );
	icon.iconAnchor = new GPoint( parseInt( param["anchor_x"] ), parseInt( param["anchor_y"] ) ); 
	icon.infoWindowAnchor = new GPoint( parseInt( param["info_x"] ), parseInt( param["info_y"] ) ); 

	if ( param["shadow_url"] != '' ) {
		icon.shadow = param["shadow_url"];
		icon.shadowSize = new GSize( parseInt( param["shadow_width"] ), parseInt( param["shadow_height"] ) );
	}

	return icon;
}

function webmap_map_get_icon( icon_id_in, icons ) 
{
	var icon_id = parseInt( icon_id_in );
	var icon;
	if ( ( icon_id > 0  ) && ( icons[ icon_id ] != null ) ){
		icon = icons[ icon_id ];
	} else {
		icon = G_DEFAULT_ICON ;
	}
	return icon;
}
