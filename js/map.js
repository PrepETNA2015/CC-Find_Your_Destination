// Note: This example requires that you consent to location sharing when
// prompted by your browser. If you see a blank space instead of the map, this
// is probably because you have denied permission for location sharing.

var map;
var geocoder;

function initialize() {
geocoder = new google.maps.Geocoder();
  var mapOptions = {
    zoom: 7
  };
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    
  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

      var infowindow = new google.maps.InfoWindow({
        map: map,
        position: pos,
        content: ''
      });

      map.setCenter(pos);
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
}


function codeAddress(address, id) {
var marker;
  geocoder.geocode( { 'address': address }, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
		marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
      });
	  google.maps.event.addListener(marker, 'click', function(){
	  detail(id);
	  });
    }
	else 
	{
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
  
}
function codeAddress_musee(address) {
  geocoder.geocode( { 'address': address }, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
	  var image = "./museum-historical.png";
      var marker_musee = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location,
		  icon: image
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}

function codeAddress_village(address) {
  geocoder.geocode( { 'address': address }, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
	  var image = "./hotel.png";
      var marker_village = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location,
		  icon: image
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}

function codeAddress_cinema(address) {
  geocoder.geocode( { 'address': address }, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
	  var image = "./cinema.png";
      var marker_cinema = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location,
		  icon: image
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}
function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(60, 105),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
}

function detail(id){
$(document).ready(function(){
       $('#details').load('detail_hotel.php?id='+id);
    });

}


google.maps.event.addDomListener(window, 'load', initialize);

