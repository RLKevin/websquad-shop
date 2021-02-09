// style with https://mapstyle.withgoogle.com/

(function($) {
function render_map( $el ) {
	var $markers = $el.find('.marker');
	var sw = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
	var isDraggable = sw < 800 ? true : true;
	var args = {
		zoom		: 13,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP,
		scrollwheel: false,
		disableDefaultUI: true, // a way to quickly hide all controls
		scaleControl: false,
		zoomControl: true,
		draggable: isDraggable,
		styles: [
			
		  ]
	};
	var map = new google.maps.Map( $el[0], args);
	var mobilePan = sw < 800 ? -0 : -0;
	map.markers = [];
	$markers.each(function(){
    	add_marker( $(this), map );
	});
	center_map( map );
	map.panBy(mobilePan, 40);
}

function add_marker( $marker, map ) {
	var templateUrl = theme.templateUrl;
	console.log('adding marker');
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
	var type, name = "";
	var icon = {
			url			: templateUrl + '/img/pin.svg',
			scaledSize	: new google.maps.Size(52, 52), // size
		};

	
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map,
		icon		: icon,
		// label		: name
	});

	map.markers.push( marker );
	if( $marker.html() )
	{
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});
		google.maps.event.addListener(marker, 'click', function() {
			infowindow.open( map, marker );
		});
	}
}
function center_map( map ) {
	var bounds = new google.maps.LatLngBounds();
	$.each( map.markers, function( i, marker ){
		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
		bounds.extend( latlng );
	});
	if( map.markers.length == 1 )
	{
		map.setCenter( bounds.getCenter() );
	    // Deze zoom!
	    // map.setZoom( 20 ); 
	}
	else
	{
		map.fitBounds( bounds );
	}
}
$(document).ready(function(){
	$('.map__container').each(function(){
		render_map( $(this) );
	});
});
})(jQuery);

