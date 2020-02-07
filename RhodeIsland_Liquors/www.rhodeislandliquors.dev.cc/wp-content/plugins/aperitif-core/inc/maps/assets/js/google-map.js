(function ($) {
	"use strict";
	
	var qodefGoogleMap = {
		initMap: function ($mapHolder) {
			if (typeof google !== 'object') {
				return;
			}
			
			var mapParams = qodefGoogleMap.initMapParams($mapHolder);
			
			var settings = {
				styles: qodefMapsVariables.global.mapStyle,
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				zoom: parseInt(qodefMapsVariables.global.mapZoom),
				scrollwheel: qodefMapsVariables.global.mapScrollable,
				draggable: qodefMapsVariables.global.mapDraggable,
				streetViewControl: qodefMapsVariables.global.streetViewControl,
				zoomControl: qodefMapsVariables.global.zoomControl,
				mapTypeControl: qodefMapsVariables.global.mapTypeControl,
				fullscreenControl: qodefMapsVariables.global.fullscreenControl
			};
			
			var map = new google.maps.Map(document.getElementById(mapParams.holderId), settings);
			var geocoder = new google.maps.Geocoder();
			
			mapParams.addressesLatLng = [];
			for (var index = 0; index < mapParams.addresses.length; ++index) {
				qodefGoogleMap.initGoogleAddress(index, mapParams, map, geocoder);
			}
			
			if (!isNaN(mapParams.mapHeight)) {
				var height = mapParams.mapHeight + 'px',
					holderElement = document.getElementById(mapParams.holderId);
				holderElement.style.height = height;
			}
		},
		
		initMapParams: function ($map) {
			var options = {};
			
			var pin;
			if (typeof $map.data('pin') !== 'undefined' && $map.data('pin') !== false) {
				pin = $map.data('pin');
			}
			options.pin = pin;
			
			var mapHeight;
			if (typeof $map.data('height') !== 'undefined' && $map.data('height') !== false) {
				mapHeight = $map.data('height');
			}
			options.mapHeight = mapHeight;
			
			var uniqueId;
			if (typeof $map.data('unique-id') !== 'undefined' && $map.data('unique-id') !== false) {
				uniqueId = $map.data('unique-id');
			}
			options.uniqueId = uniqueId;
			options.holderId = "qodef-map-id--" + uniqueId;
			
			var addresses;
			if (typeof $map.data('addresses') !== 'undefined' && $map.data('addresses') !== false) {
				addresses = $map.data('addresses');
			}
			options.addresses = addresses;
			
			return options;
		},
		initGoogleAddress: function (index, mapParams, $map, geocoder) {
			var address = mapParams.addresses[index];
			
			if (address === '') {
				return;
			}
			
			var contentString = '<div id="content"><div id="siteNotice"></div><div id="bodyContent"><p>' + address + '</p></div></div>';
			var infowindow = new google.maps.InfoWindow({
				content: contentString
			});
			
			geocoder.geocode({'address': address}, function (results, status) {
				if (status === google.maps.GeocoderStatus.OK) {
					var marker = new google.maps.Marker({
						map: $map,
						position: results[0].geometry.location,
						icon: mapParams.pin,
						title: address.store_title
					});
					google.maps.event.addListener(marker, 'click', function () {
						infowindow.open($map, marker);
					});
					
					google.maps.event.addDomListener(window, 'resize', function () {
						qodefGoogleMap.initMapCenter($map, mapParams.addressesLatLng);
					});
					
					var latLng = {};
					latLng.lat = results[0].geometry.location.lat();
					latLng.lng = results[0].geometry.location.lng();
					mapParams.addressesLatLng[index] = latLng;
					
					if (mapParams.addresses.length === mapParams.addressesLatLng.length) {
						setTimeout(function () {
							qodefGoogleMap.initMapCenter($map, mapParams.addressesLatLng);
						}, 500);
					} else {
						$map.setCenter(results[0].geometry.location);
					}
				}
			});
		},
		
		initMapCenter: function ($map, addressesLatLng) {
			var lat_min = 99999;
			var lat_max = 1;
			var lng_min = 99999;
			var lng_max = 1;
			
			for (var index = 0; index < addressesLatLng.length; ++index) {
				lat_min = Math.abs(addressesLatLng[index].lat) < Math.abs(lat_min) ? addressesLatLng[index].lat : lat_min;
				lat_max = Math.abs(addressesLatLng[index].lat) > Math.abs(lat_max) ? addressesLatLng[index].lat : lat_max;
				
				lng_min = Math.abs(addressesLatLng[index].lng) < Math.abs(lng_min) ? addressesLatLng[index].lng : lng_min;
				lng_max = Math.abs(addressesLatLng[index].lng) > Math.abs(lng_max) ? addressesLatLng[index].lng : lng_max;
			}
			
			$map.setCenter(new google.maps.LatLng(
				((lat_max + lat_min) / 2.0),
				((lng_max + lng_min) / 2.0)
			));
		}
	};
	
	qodefCore.qodefGoogleMap = qodefGoogleMap;
	
})(jQuery);