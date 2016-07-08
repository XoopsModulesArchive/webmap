/* ========================================================
 * $Id: gmap.js,v 1.1.1.1 2009/02/23 03:29:33 ohwada Exp $
 * http://code.google.com/apis/maps/index.html
 * ========================================================
 */

var webmap_gmap_init_flag = false;

/* georss */
var webmap_gmap_map_obj = null;
var webmap_gmap_client_geocoder  = null;
var webmap_gmap_location_marker  = null;
var webmap_gmap_draggable_marker = null;
var webmap_gmap_bounds      = null;
var webmap_gmap_bounds_zoom = null;
var webmap_gmap_drag_icon   = null;
var webmap_gmap_base_icon   = null;
var webmap_gmap_small_icon  = null;

/* japanese inverse geocoder */
var webmap_gmap_address_jp;
var webmap_gmap_pref_jp;
var webmap_gmap_city_jp;
var webmap_gmap_town_jp;
var webmap_gmap_number_jp;

/* 37.0 -95.0 : Chetopa Kansas: center point of USA */
var webmap_gmap_default_latitude  =  37.0;
var webmap_gmap_default_longitude = -95.0;
var webmap_gmap_default_zoom = 4;
var webmap_gmap_location_marker_html = "Chetopa Kansas, USA";

var webmap_gmap_geo_url = "";

var webmap_gmap_zoom_max = 17;
var webmap_gmap_zoom_geocode_default = 12;
var webmap_gmap_zoom_accuracy = 12;
var webmap_gmap_zoom_accuracy_tokyo_univ = 12;

var webmap_gmap_lang_latitude  = "Latitude";
var webmap_gmap_lang_longitude = "Longitude";
var webmap_gmap_lang_zoom      = "Zoom Level";
var webmap_gmap_lang_not_compatible = "Your browser cannot use GoogleMaps";
var webmap_gmap_lang_no_match_place = "There are no place to match the address";
var webmap_gmap_module_url   = "";
var webmap_gmap_marker_url   = "";
var webmap_gmap_opener_mode  = "";
var webmap_gmap_drag_icon_image   = "marker_green_cross_s.png";
var webmap_gmap_small_icon_image  = "marker_small.png";
var webmap_gmap_element_latitude  = "webmap_latitude";
var webmap_gmap_element_longitude = "webmap_longitude";
var webmap_gmap_element_zoom      = "webmap_zoom";
var webmap_gmap_element_map       = "webmap_gmap_map";
var webmap_gmap_element_search    = "webmap_gmap_search";
var webmap_gmap_element_list      = "webmap_gmap_list";
var webmap_gmap_element_current_location = "webmap_gmap_current_location";
var webmap_gmap_element_current_address  = "webmap_gmap_current_address";

var webmap_gmap_map_control  = 'large';
var webmap_gmap_map_type     = '';
var webmap_gmap_geocode_kind = '';
var webmap_gmap_type_control = 'default';

var webmap_gmap_use_scale_control         = false;
var webmap_gmap_use_overview_map_control  = true;
var webmap_gmap_use_location_marker       = false;
var webmap_gmap_use_location_marker_click = true;
var webmap_gmap_use_draggable_marker = true;
var webmap_gmap_use_search_marker    = true;
var webmap_gmap_set_current_location = true;

var webmap_gmap_use_nishioka_inverse    = false;
var webmap_gmap_use_set_parent_location = false;
var webmap_gmap_use_set_parent_address  = false;
var webmap_gmap_use_get_parent_location = false;

var webmap_gmap_makers = new Array();
var webmap_gmap_icons  = new Array();

/* debug */
var webmap_gmap_debug_geocoder_tokyo_univ = false;
var webmap_gmap_debug_inverse_nishioka    = false;

/* --------------------------------------------------------
 * public functon
 * --------------------------------------------------------
 */
function webmap_gmap_load_marks() 
{
	if ( GBrowserIsCompatible() ) {
		webmap_gmap_show_marks();
	} else {
		alert( webmap_gmap_lang_not_compatible );
	}
}
function webmap_gmap_load_get_location() 
{
	if ( GBrowserIsCompatible() ) {
		webmap_gmap_show_get_location();
	} else {
		alert( webmap_gmap_lang_not_compatible );
	}
}
function webmap_gmap_load_get_location_marks() 
{
	if ( GBrowserIsCompatible() ) {
		webmap_gmap_show_get_location_marks();
	} else {
		alert( webmap_gmap_lang_not_compatible );
	}
}
function webmap_gmap_load_search() 
{
	if ( GBrowserIsCompatible() ) {
		webmap_gmap_show_search();
	} else {
		alert( webmap_gmap_lang_not_compatible );
	}
}
function webmap_gmap_load_georss() 
{
	if ( GBrowserIsCompatible() ) {
		webmap_gmap_show_georss();
	} else {
		alert( webmap_gmap_lang_not_compatible );
	}
}
function webmap_gmap_searchAddress( addr )
{
	if ( webmap_gmap_geocode_kind == 'latlng' ) {
		webmap_gmap_geocoder_LatLng( addr )
	} else if ( webmap_gmap_geocode_kind == 'tokyo_univ' ) {
		webmap_gmap_geocoder_tokyoUniv( addr );
	} else {
		webmap_gmap_geocoder_Locations( addr );
	}
}
function webmap_gmap_setCenter( lat, lng, zoom )
{
	webmap_gmap_map_obj.setCenter( new GLatLng( parseFloat( lat ) , parseFloat( lng ) ) );
	webmap_gmap_map_obj.setZoom( Math.floor( zoom ) );
}

function webmap_gmap_on_load_marks() 
{
	if ( webmap_gmap_init_flag == false ) {
		webmap_gmap_load_marks();
		webmap_gmap_init_flag = true;
	}
}

function webmap_gmap_on_get_location_marks() 
{
	if ( webmap_gmap_init_flag == false ) {
		webmap_gmap_load_get_location_marks();
		webmap_gmap_init_flag = true;
	}
}

function webmap_gmap_init_flag_true() 
{
	webmap_gmap_init_flag = true;
}

/* --------------------------------------------------------
 * private functon
 * --------------------------------------------------------
 */

function webmap_gmap_show_marks() 
{
	webmap_gmap_initMap();
	webmap_gmap_setCenter( webmap_gmap_default_latitude, webmap_gmap_default_longitude, webmap_gmap_default_zoom );

/* MUST be setMapType() after setCenter() */
	webmap_gmap_setMapType();
	webmap_gmap_addOverviewMapControl();

	if ( webmap_gmap_use_location_marker ) {
		webmap_gmap_location_marker = new GMarker( webmap_gmap_map_obj.getCenter() );
		webmap_gmap_map_obj.addOverlay( webmap_gmap_location_marker );

		if ( webmap_gmap_use_location_marker_click ) {
			webmap_gmap_clickMarker();
		}
	}

	for ( i=0 ; i<webmap_gmap_makers.length ; i++ ) {
		webmap_gmap_map_obj.addOverlay( webmap_gmap_createMarker_info( webmap_gmap_makers[i] ) );
	}
}
function webmap_gmap_show_get_location() 
{
	webmap_gmap_initMap();
	webmap_gmap_initIcon();

	now_lat  = webmap_gmap_default_latitude;
	now_lng  = webmap_gmap_default_longitude;
	now_zoom = webmap_gmap_default_zoom;
	now_addr = null;

	webmap_gmap_client_geocoder = new GClientGeocoder();
	webmap_gmap_moveendMap();

	parent_flag  = false;
	parent_param = webmap_gmap_getParentLatitude();
	if ( parent_param ) {
		parent_flag = parent_param[0];
	}

/* if parent param is set */
	if( parent_flag ) {
		now_lat  = parent_param[1];
		now_lng  = parent_param[2];
		now_zoom = parent_param[3];
	}

	webmap_gmap_setCenter( now_lat, now_lng, now_zoom );

	addr = webmap_gmap_getParentAddress();
	if ( addr ) {
		document.getElementById( webmap_gmap_element_search ).value = addr.webmap_gmap_htmlspecialchars();

/* if parent param is NOT set */
		if( parent_flag == false ) {
			webmap_gmap_searchAddress(addr);
		}
	}

}
function webmap_gmap_show_get_location_marks() 
{
	webmap_gmap_initMap();
	webmap_gmap_initIcon();

	now_lat  = webmap_gmap_default_latitude;
	now_lng  = webmap_gmap_default_longitude;
	now_zoom = webmap_gmap_default_zoom;
	now_addr = null;

	webmap_gmap_client_geocoder = new GClientGeocoder();
	webmap_gmap_moveendMap();

	if ( webmap_gmap_use_get_parent_location) {
		parent_flag  = false;
		parent_param = webmap_gmap_getParentLatitude();
		if ( parent_param ) {
			parent_flag = parent_param[0];
		}

/* if parent param is set */
		if( parent_flag ) {
			now_lat  = parent_param[1];
			now_lng  = parent_param[2];
			now_zoom = parent_param[3];
		}
	}

	webmap_gmap_setCenter( now_lat, now_lng, now_zoom );

	addr = webmap_gmap_getParentAddress();
	if ( addr ) {
		document.getElementById( webmap_gmap_element_search ).value = addr.webmap_gmap_htmlspecialchars();

/* if parent param is NOT set */
		if( parent_flag == false ) {
			webmap_gmap_searchAddress(addr);
		}
	}

/* marks */
	for ( i=0 ; i<webmap_gmap_makers.length ; i++ ) {
		webmap_gmap_map_obj.addOverlay( webmap_gmap_createMarker_info( webmap_gmap_makers[i] ) );
	}

}
function webmap_gmap_show_search() 
{
	webmap_gmap_initMap();
	webmap_gmap_initIcon();
	webmap_gmap_client_geocoder = new GClientGeocoder();
	webmap_gmap_moveendMap();
	webmap_gmap_setCenter( webmap_gmap_default_latitude, webmap_gmap_default_longitude, webmap_gmap_default_zoom );
	webmap_gmap_setMapType();
	webmap_gmap_addOverviewMapControl();

	now_addr = null;
	if ( document.getElementById( webmap_gmap_element_search ) != null ) {
		now_addr = document.getElementById( webmap_gmap_element_search ).value;
	}

	webmap_gmap_searchAddress( now_addr );

}

function webmap_gmap_show_georss() 
{
	webmap_gmap_initMap();
	webmap_gmap_setCenter( webmap_gmap_default_latitude, webmap_gmap_default_longitude, webmap_gmap_default_zoom );
	webmap_gmap_setMapType();
	webmap_gmap_addOverviewMapControl();

	var webmap_gmap_geo_xml = new GGeoXml( webmap_gmap_geo_url );
	webmap_gmap_map_obj.addOverlay( webmap_gmap_geo_xml );
}

/* init map */
function webmap_gmap_initMap() 
{
	webmap_gmap_map_obj = new GMap2( document.getElementById( webmap_gmap_element_map ) );

	if ( webmap_gmap_map_control == 'large' ) {
		webmap_gmap_map_obj.addControl( new GLargeMapControl() );
	} else if ( webmap_gmap_map_control == 'small' ) {
		webmap_gmap_map_obj.addControl( new GSmallMapControl() );
	} else if ( webmap_gmap_map_control == 'zoom' ) {
		webmap_gmap_map_obj.addControl( new GSmallZoomControl() );
	}

	if ( webmap_gmap_type_control == 'default' ) {
		webmap_gmap_map_obj.addControl( new GMapTypeControl() );
	} else if ( webmap_gmap_type_control == 'physical' ) {
		webmap_gmap_map_obj.addControl( new GMapTypeControl() );
		webmap_gmap_map_obj.addMapType( G_PHYSICAL_MAP );
	}

	if ( webmap_gmap_use_scale_control ) {
		webmap_gmap_map_obj.addControl( new GScaleControl() );
	}
}
function webmap_gmap_setMapType() 
{
	if ( webmap_gmap_map_type == 'satellite' ) {
		webmap_gmap_map_obj.setMapType( G_SATELLITE_MAP );
	} else if ( webmap_gmap_map_type == 'hybrid' ) {
		webmap_gmap_map_obj.setMapType( G_HYBRID_MAP );
	} else if ( webmap_gmap_map_type == 'physical' ) {
		webmap_gmap_map_obj.setMapType( G_PHYSICAL_MAP );
	}
}
function webmap_gmap_addOverviewMapControl() 
{
	if ( webmap_gmap_use_overview_map_control ) {
		webmap_gmap_map_obj.addControl( new GOverviewMapControl() );
	}
}
function webmap_gmap_initIcon() 
{
	webmap_gmap_drag_icon = new GIcon();
	webmap_gmap_drag_icon.image = webmap_gmap_marker_url + "/" + webmap_gmap_drag_icon_image;
	webmap_gmap_drag_icon.iconSize = new GSize(18, 30);
	webmap_gmap_drag_icon.iconAnchor = new GPoint(9, 30);
	webmap_gmap_drag_icon.infoWindowAnchor = new GPoint(9, 2);

	webmap_gmap_base_icon = new GIcon();
	webmap_gmap_base_icon.iconSize = new GSize(20, 34);
	webmap_gmap_base_icon.iconAnchor = new GPoint(9, 34);
	webmap_gmap_base_icon.infoWindowAnchor = new GPoint(9, 2);

	webmap_gmap_small_icon = new GIcon();
	webmap_gmap_small_icon.image = webmap_gmap_marker_url + "/" + webmap_gmap_small_icon_image;
	webmap_gmap_small_icon.iconSize = new GSize(12, 20);
	webmap_gmap_small_icon.iconAnchor = new GPoint(5, 20);
	webmap_gmap_small_icon.infoWindowAnchor = new GPoint(9, 2);
}

/* map moveend */
function webmap_gmap_moveendMap() 
{
	GEvent.addListener(webmap_gmap_map_obj, "moveend", function() {

		center = webmap_gmap_map_obj.getCenter();
		xx = center.x;
		yy = center.y;
		zz = webmap_gmap_map_obj.getZoom();

		if ( webmap_gmap_use_set_parent_location ) {
			webmap_gmap_setParentLatitude( yy, xx, zz );
		}

		if ( webmap_gmap_set_current_location ) {
			current_location = webmap_gmap_lang_latitude + ': ' + yy + ' / ' + webmap_gmap_lang_longitude + ': ' + xx + ' / ' + webmap_gmap_lang_zoom + ': ' + zz;
			document.getElementById("webmap_gmap_current_location").innerHTML = current_location; 
		}

		if ( webmap_gmap_use_nishioka_inverse ) {
			webmap_gmap_inverse_nishioka( xx, yy );
		}

		if ( webmap_gmap_use_draggable_marker ) {
			webmap_gmap_showDraggableMarker();
		}

	} );

}

/* marker click */
function webmap_gmap_clickMarker() 
{
	GEvent.addListener( webmap_gmap_location_marker, "click", function() {
		webmap_gmap_location_marker.openInfoWindowHtml( webmap_gmap_location_marker_html );
	} );
}

/* draggable marker */
function webmap_gmap_showDraggableMarker() 
{
	if ( webmap_gmap_draggable_marker != null ) {
		webmap_gmap_map_obj.removeOverlay( webmap_gmap_draggable_marker );
	}
	webmap_gmap_draggable_marker = new GMarker( 
		webmap_gmap_map_obj.getCenter(), 
		{ icon:webmap_gmap_drag_icon , draggable:true , bouncy:true , bounceGravity:0.5 } 
	); 
	webmap_gmap_map_obj.addOverlay( webmap_gmap_draggable_marker );
	webmap_gmap_dragendMarker();
}
function webmap_gmap_dragendMarker() 
{
	GEvent.addListener( webmap_gmap_draggable_marker, "dragend", function() {
		window.setTimeout( function() {
			webmap_gmap_map_obj.panTo( webmap_gmap_draggable_marker.getPoint() );
		}, 1000 );
	});
}

/* geocoder Locations */
function webmap_gmap_geocoder_Locations( addr )
{
	if ( addr ) {
		webmap_gmap_client_geocoder.getLocations( addr , function( response ) {
			if ( !response || response.Status.code != 200 ) {
				alert( webmap_gmap_lang_no_match_place + "\n" + addr );
			} else {
				webmap_gmap_geocoder_LocationsResponse( response );
			}
		} );
	}
}
function webmap_gmap_geocoder_LocationsResponse( response )
{
/* clear all marker */
	webmap_gmap_map_obj.clearOverlays();

	var length = response.Placemark.length;
	var webmap_gmap_list = '<ol>';

	for(var i = 0; i< length; i++) {

/* location */
		place = response.Placemark[i];
		addr = place.address;
		lng  = place.Point.coordinates[0];
		lat  = place.Point.coordinates[1];
		zoom = place.AddressDetails.Accuracy + webmap_gmap_zoom_accuracy;
		zoom = webmap_gmap_maxZoom( zoom );

/* add marker */
		if ( webmap_gmap_use_search_marker ) {
			webmap_gmap_addMarker( i, lat, lng, zoom, addr );
		}
		webmap_gmap_setBounds( i, lat, lng, zoom );
		webmap_gmap_list += webmap_gmap_getSearchList( i, lat, lng, zoom, addr );
	}

	webmap_gmap_list += '</ol>';
	webmap_gmap_setCenterBounds( length );
	document.getElementById( webmap_gmap_element_list ).innerHTML = webmap_gmap_list;
}
function webmap_gmap_addMarker( index, lat, lng, zoom, addr )
{
	icon = webmap_gmap_createIcon( index );
	html = webmap_gmap_getSearchHtml( index, lat, lng, zoom, addr );
	webmap_gmap_map_obj.addOverlay( webmap_gmap_createMarker( lat, lng, icon, html ) );
}
function webmap_gmap_createIcon( index ) 
{
	letter = webmap_gmap_getSmallLetter( index );

	if ( letter ) {
		var icon = new GIcon(webmap_gmap_base_icon);
		icon.image = webmap_gmap_marker_url + "/marker_" + letter + ".png";
	} else {
		var icon = new GIcon(webmap_gmap_small_icon);
	}

	return icon;
}
function webmap_gmap_createMarker( lat, lng, icon, html ) 
{
	var marker = new GMarker( new GLatLng( parseFloat( lat ) , parseFloat( lng ) ), icon );
	GEvent.addListener(marker, "click", function() {
		marker.openInfoWindowHtml( html );
	});
	return marker;
}
function webmap_gmap_createMarker_info( info ) 
{
	var icon_id = parseInt( info[2] );

	var icon;
	if ( ( icon_id > 0  ) && ( webmap_gmap_icons[ icon_id ] != null ) ){
		icon = webmap_gmap_icons[ icon_id ];
	} else {
		icon = G_DEFAULT_ICON;
	}
	var marker = webmap_gmap_createMarker( info[0], info[1], icon, info[3] ) ;
	return marker;
}
function webmap_gmap_setBounds( index, lat, lng, zoom )
{
	var point = new GLatLng( parseFloat( lat ) , parseFloat( lng ) );
	if (( Math.floor( index ) == 0 )||( webmap_gmap_bounds_zoom == null)) {
		webmap_gmap_bounds_zoom = Math.floor( zoom );
		webmap_gmap_bounds = new GLatLngBounds( point );
	}
	webmap_gmap_bounds.extend( point );
}
function webmap_gmap_setCenterBounds( length )
{
	var northEastPoint = webmap_gmap_bounds.getNorthEast();
	var southWestPoint = webmap_gmap_bounds.getSouthWest();
	lat = (northEastPoint.lat() + southWestPoint.lat()) / 2;
	lng = (northEastPoint.lng() + southWestPoint.lng()) / 2;

	zoom = webmap_gmap_bounds_zoom;
	if ( length > 1 ) {
		zoom = webmap_gmap_map_obj.getBoundsZoomLevel( webmap_gmap_bounds );
	}

	webmap_gmap_setCenter( lat, lng, zoom );
}
function webmap_gmap_getSearchList( index, lat, lng, zoom, addr )
{
	html = webmap_gmap_getSearchHtml( index, lat, lng, zoom, addr );
	list = '<li>' + html + '</li>' + "\n";
	return list;
}
function webmap_gmap_getSearchHtml( index, lat, lng, zoom, addr)
{
	letter = webmap_gmap_getCapitalLetter( index );
	if ( letter == '' ) {
		letter = index + 1;
	}

	func = "webmap_gmap_setCenter(" + lat + ', '  + lng + ', ' + zoom + ")";
	link = '<a href="javascript:void(0)" onClick="' + func + '">' + addr.webmap_gmap_htmlspecialchars() + '</a>';
	html = '<b>' + letter + '</b> ' + link;
	return html;
}
function webmap_gmap_getCapitalLetter( index ) 
{
	var char = '';
	if (index < 26)
	{
		char = String.fromCharCode("A".charCodeAt(0) + index);
	}
	return char;
}
function webmap_gmap_getSmallLetter( index ) 
{
	var char = '';
	if (index < 26)
	{
		char = String.fromCharCode("a".charCodeAt(0) + index);
	}
	return char;
}
function webmap_gmap_maxZoom( z )
{
	if ( z > webmap_gmap_zoom_max ) {
		z = webmap_gmap_zoom_max;
	}
	return z;
}

/* geocoder LatLng */
function webmap_gmap_geocoder_LatLng( addr )
{
	if ( addr ) {
		webmap_gmap_client_geocoder.getLatLng(addr, function( point ) {
			if ( !point ) {
				alert( webmap_gmap_lang_no_match_place + "\n" + addr );
			} else {
				webmap_gmap_map_obj.setCenter( point, Math.floor( webmap_gmap_zoom_geocode_default ) );
			}
		} );
	}

}

/* set & get parent */
function webmap_gmap_getParentLatitude() 
{
	lat  = 0;
	lng  = 0;
	zoom = 0;
	flag = false;

	if ( webmap_gmap_opener_mode == 'self' ) {
		if ( document.getElementById( webmap_gmap_element_latitude ) != null ) {
			lat  = document.getElementById( webmap_gmap_element_latitude ).value;
		}
		if ( document.getElementById( webmap_gmap_element_longitude ) != null ) {
			lng  = document.getElementById( webmap_gmap_element_longitude ).value;
		}
		if ( document.getElementById( webmap_gmap_element_zoom ) != null ) {
			zoom = document.getElementById( webmap_gmap_element_zoom ).value;
		}
	} else if (( webmap_gmap_opener_mode == 'opener' )&&( opener != null )) {
		if ( opener.document.getElementById( webmap_gmap_element_latitude ) != null ) {
			lat  = opener.document.getElementById( webmap_gmap_element_latitude ).value;
		}
		if ( opener.document.getElementById( webmap_gmap_element_longitude ) != null ) {
			lng  = opener.document.getElementById( webmap_gmap_element_longitude ).value;
		}
		if ( opener.document.getElementById( webmap_gmap_element_zoom ) != null ) {
			zoom = opener.document.getElementById( webmap_gmap_element_zoom ).value;
		}
	} else if (( webmap_gmap_opener_mode == 'parent' )&&( parent != null )) {
		if ( parent.document.getElementById( webmap_gmap_element_latitude ) != null ) {
			lat  = parent.document.getElementById( webmap_gmap_element_latitude ).value;
		}
		if ( parent.document.getElementById( webmap_gmap_element_longitude ) != null ) {
			lng  = parent.document.getElementById( webmap_gmap_element_longitude ).value;
		}
		if ( parent.document.getElementById( webmap_gmap_element_zoom ) != null ) {
			zoom = parent.document.getElementById( webmap_gmap_element_zoom ).value;
		}
	}

/* if parent param is set */
	if( (lat != 0) || (lng != 0) || (zoom != 0) ) {
		flag = true;
	}

	arr = new Array(flag, lat, lng, zoom);
	return arr;
}

function webmap_gmap_setParentLatitude( latitude , longitude , zoom )
{
	if ( webmap_gmap_opener_mode == 'self' ) {
		if ( document.getElementById( webmap_gmap_element_latitude ) != null) {
			document.getElementById(  webmap_gmap_element_latitude  ).value = latitude;
		}
		if ( document.getElementById( webmap_gmap_element_longitude ) != null) {
			document.getElementById(  webmap_gmap_element_longitude  ).value = longitude;
		}
		if ( document.getElementById( webmap_gmap_element_zoom ) != null) {
			document.getElementById(  webmap_gmap_element_zoom  ).value = Math.floor( zoom );
		}
	} else if (( webmap_gmap_opener_mode == 'opener' )&&( opener != null)) {
		if ( opener.document.getElementById( webmap_gmap_element_latitude ) != null) {
			opener.document.getElementById(  webmap_gmap_element_latitude  ).value = latitude;
		}
		if ( opener.document.getElementById( webmap_gmap_element_longitude ) != null) {
			opener.document.getElementById(  webmap_gmap_element_longitude  ).value = longitude;
		}
		if ( opener.document.getElementById( webmap_gmap_element_zoom ) != null) {
			opener.document.getElementById(  webmap_gmap_element_zoom  ).value = Math.floor( zoom );
		}
	} else if (( webmap_gmap_opener_mode == 'parent' )&&( parent != null)) {
		if ( parent.document.getElementById( webmap_gmap_element_latitude ) != null) {
			parent.document.getElementById(  webmap_gmap_element_latitude  ).value = latitude;
		}
		if ( parent.document.getElementById( webmap_gmap_element_longitude ) != null) {
			parent.document.getElementById(  webmap_gmap_element_longitude  ).value = longitude;
		}
		if ( parent.document.getElementById( webmap_gmap_element_zoom ) != null) {
			parent.document.getElementById(  webmap_gmap_element_zoom  ).value = Math.floor( zoom );
		}
	}
}
function webmap_gmap_getParentAddress()
{
	addr = '';

	if ( webmap_gmap_opener_mode == 'self' ) {
		if ( document.getElementById("webmap_gmap_address") != null ) {
			addr = document.getElementById("webmap_gmap_address").value;
		}
	} else if (( webmap_gmap_opener_mode == 'opener' )&&( opener != null )) {
		if ( opener.document.getElementById("webmap_gmap_address") != null ) {
			addr = opener.document.getElementById("webmap_gmap_address").value;
		}
	} else if (( webmap_gmap_opener_mode == 'parent' )&&( parent != null )) {
		if ( parent.document.getElementById("webmap_gmap_address") != null ) {
			addr = parent.document.getElementById("webmap_gmap_address").value;
		}
	}

	return addr;
}
function webmap_gmap_setParentAddress( addr )
{
	if (( addr != null )&&( addr != '' )) {
		if ( webmap_gmap_opener_mode == 'self' ) {
			if ( document.getElementById("webmap_gmap_address") != null) {
				document.getElementById("webmap_gmap_address").value = addr.webmap_gmap_htmlspecialchars();
			}
		} else if (( webmap_gmap_opener_mode == 'opener' )&&( opener != null)) {
			if ( opener.document.getElementById("webmap_gmap_address") != null) {
				opener.document.getElementById("webmap_gmap_address").value = addr.webmap_gmap_htmlspecialchars();
			}
		} else if (( webmap_gmap_opener_mode == 'parent' )&&( parent != null)) {
			if ( parent.document.getElementById("webmap_gmap_address") != null) {
				parent.document.getElementById("webmap_gmap_address").value = addr.webmap_gmap_htmlspecialchars();
			}
		}
	}
}

/* reference: mygmap module's mygwebmap_gmap_map.js */
String.prototype.webmap_gmap_htmlspecialchars = function() {
	var webmap_gmap_tmp = this.toString();
	webmap_gmap_tmp = webmap_gmap_tmp.replace(/\//g, "");
	webmap_gmap_tmp = webmap_gmap_tmp.replace(/&/g, "&amp;");
	webmap_gmap_tmp = webmap_gmap_tmp.replace(/"/g, "&quot;");
	webmap_gmap_tmp = webmap_gmap_tmp.replace(/'/g, "&#39;");
	webmap_gmap_tmp = webmap_gmap_tmp.replace(/</g, "&lt;");
	webmap_gmap_tmp = webmap_gmap_tmp.replace(/>/g, "&gt;");
	return webmap_gmap_tmp;
}

/* --------------------------------------------------------
 * for japanese
 * --------------------------------------------------------
 */
/* japanese inverse geocoder */
function webmap_gmap_geocoder_tokyoUniv( addr )
{
	if ( addr ) {
		var url = webmap_gmap_module_url + '/tokyo_univ_geocode.php?query=' + encodeURI( addr );

		GDownloadUrl( url , function( data , responseCode ) {
			if( webmap_gmap_debug_geocoder_tokyo_univ ) {
				alert( data );
			}
			if( responseCode == 200 ) {
				xml = GXml.parse( data );

/* fixed javascript errors with IE6 by souhalt */
				if ( xml.documentElement != null ) {
					candidate = xml.documentElement.getElementsByTagName("candidate");
					if ( candidate.length == 0 ) {
						alert( webmap_gmap_lang_no_match_place + "\n" + addr );
					} else {
						webmap_gmap_geocoder_tokyoUnivResponse( xml );
					}
				} else {
					alert( webmap_gmap_lang_no_match_place + "\n" + addr );
				}

			}
		});
	}
}
function webmap_gmap_geocoder_tokyoUnivResponse( xml )
{
/* clear all marker */
	webmap_gmap_map_obj.clearOverlays();

	var candidate = xml.documentElement.getElementsByTagName("candidate");
	var iconf = xml.documentElement.getElementsByTagName("iConf")[0].firstChild.nodeValue;
	var length = candidate.length;

	var webmap_gmap_list = '<ol>';

	iconf = Math.floor( iconf );
	if ( iconf >= 2 && iconf <= 5 ) {
		zoom = iconf + webmap_gmap_zoom_accuracy_tokyo_univ;
	} else {
		zoom = webmap_gmap_zoom_geocode_default;
	}
	zoom = webmap_gmap_maxZoom( zoom );

	for(var i = 0; i< length; i++) {

/* location */
		place = candidate[i];
		addr = place.getElementsByTagName("address")[0].firstChild.nodeValue;
		lat  = place.getElementsByTagName('latitude')[0].firstChild.nodeValue;
		lng  = place.getElementsByTagName('longitude')[0].firstChild.nodeValue;

/* add marker */
		if ( webmap_gmap_use_search_marker ) {
			webmap_gmap_addMarker( i, lat, lng, zoom, addr );
		}
		webmap_gmap_setBounds( i, lat, lng, zoom );
		webmap_gmap_list += webmap_gmap_getSearchList( i, lat, lng, zoom, addr );
	}

	webmap_gmap_setCenterBounds( length );
	webmap_gmap_list += '</ol>';
	document.getElementById( webmap_gmap_element_list ).innerHTML = webmap_gmap_list;
}

/* japanese inverse geocoder */
function webmap_gmap_inverse_nishioka( lon, lat )
{
	var url = webmap_gmap_module_url + '/nishioka_inverse.php?lon=' + lon + '&lat=' + lat;

	GDownloadUrl( url , function( data , responseCode ) {
		if( webmap_gmap_debug_inverse_nishioka ) {
			alert( data );
		}
		if( responseCode == 200 ) {
			var xml = GXml.parse( data );

/* fixed javascript errors with IE6 by souhalt */
			if ( xml.documentElement != null ) {
				webmap_gmap_inverse_nishiokaResponse( xml );
			}

		}
	});
}

function webmap_gmap_inverse_nishiokaResponse( xml )
{
	webmap_gmap_address_jp = null;
	webmap_gmap_pref_jp    = null;
	webmap_gmap_city_jp    = null;
	webmap_gmap_town_jp    = null;
	webmap_gmap_number_jp  = null;

	var error = null;
	var addr  = null;

	if ( xml.documentElement.getElementsByTagName("address")[0] != null) {
		webmap_gmap_address_jp = xml.documentElement.getElementsByTagName("address")[0].firstChild.nodeValue;
	}
	if ( xml.documentElement.getElementsByTagName("pref")[0] != null) {
		webmap_gmap_pref_jp = xml.documentElement.getElementsByTagName("pref")[0].firstChild.nodeValue;
	}
	if ( xml.documentElement.getElementsByTagName("city")[0] != null) {
		webmap_gmap_city_jp = xml.documentElement.getElementsByTagName("city")[0].firstChild.nodeValue;
	}
	if ( xml.documentElement.getElementsByTagName("town")[0] != null) {
		webmap_gmap_town_jp = xml.documentElement.getElementsByTagName("town")[0].firstChild.nodeValue;;
	}
	if ( xml.documentElement.getElementsByTagName("number")[0] != null) {
		webmap_gmap_number_jp = xml.documentElement.getElementsByTagName("number")[0].firstChild.nodeValue;
	}
	if ( xml.documentElement.getElementsByTagName("Message")[0] != null) {
		error = xml.documentElement.getElementsByTagName("Message")[0].firstChild.nodeValue;
	}

	if ( webmap_gmap_address_jp != null ) {
		addr = webmap_gmap_address_jp;
	} else if ( error != null ) { 
		addr = error;
	} else {
		addr = "unknown";
	}
	document.getElementById( webmap_gmap_element_current_address ).innerHTML = addr;

	if ( webmap_gmap_use_set_parent_address ) {
		webmap_gmap_setParentAddress( webmap_gmap_address_jp );
	}
}

/* set location*/
function webmap_gmap_setParentCenterLocation()
{
	center = webmap_gmap_map_obj.getCenter();
	xx = center.x;
	yy = center.y;
	zz = webmap_gmap_map_obj.getZoom();
	webmap_gmap_setParentLatitude( yy, xx, zz );
}
