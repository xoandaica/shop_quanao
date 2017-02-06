(function(A) {
	if (!Array.prototype.forEach)

		A.forEach = A.forEach || function(action, that) {

			for (var i = 0, l = this.length; i < l; i++)

				if (i in this)

					action.call(that, this[i], i, this);

			};
		})(Array.prototype);
		var

		mapObject,

		markers = [];
		var lst_stores = null;
		
		function initialize (markersData) {

			// var markersData = response.stores;

			lst_stores = markersData;

			  

			// Create an array of styles.

			  var styles = [

				{

					"featureType": "administrative",

					"elementType": "labels.text.fill",

					"stylers": [

						{

							"color": "#444444"

						}

					]

				},

				{

					"featureType": "landscape",

					"elementType": "all",

					"stylers": [

						{

							"color": "#f2f2f2"

						}

					]

				},

				{

					"featureType": "poi",

					"elementType": "all",

					"stylers": [

						{

							"visibility": "off"

						}

					]

				},

				{

					"featureType": "road",

					"elementType": "all",

					"stylers": [

						{

							"saturation": -100

						},

						{

							"lightness": 45

						}

					]

				},

				{

					"featureType": "road.highway",

					"elementType": "all",

					"stylers": [

						{

							"visibility": "simplified"

						}

					]

				},

				{

					"featureType": "road.arterial",

					"elementType": "labels.icon",

					"stylers": [

						{

							"visibility": "off"

						}

					]

				},

				{

					"featureType": "transit",

					"elementType": "all",

					"stylers": [

						{

							"visibility": "off"

						}

					]

				},

				{

					"featureType": "water",

					"elementType": "all",

					"stylers": [

						{

							"color": "#46bcec"

						},

						{

							"visibility": "on"

						}

					]

				},

				{

					featureType: "road",

					elementType: "labels",

					stylers: [

					  { visibility: "off" }

					]

				},

			];
			  // Create a new StyledMapType object, passing it the array of styles,

			  // as well as the name to be displayed on the map type control.

			  // var styles = [];

			  // var styledMap = new google.maps.StyledMapType(styles, {name: "Styled Map"});
			var mapOptions = {

				zoom: 12,

				center: new google.maps.LatLng(10.788345,106.699987),

				mapTypeId: google.maps.MapTypeId.ROADMAP,

				
				mapTypeControl: true,

				panControl: true,

				panControlOptions: {

					position: google.maps.ControlPosition.TOP_LEFT

				},

				zoomControl: true,

				zoomControlOptions: {

					style: google.maps.ZoomControlStyle.LARGE,

					position: google.maps.ControlPosition.TOP_LEFT

				},

				scaleControl: true,

				scaleControlOptions: {

					position: google.maps.ControlPosition.TOP_LEFT

				},

				streetViewControl: true,

				streetViewControlOptions: {

					position: google.maps.ControlPosition.LEFT_TOP

				},

				panControl:true,

				zoomControl:true,

				mapTypeControl:true,

				scaleControl:true,

				streetViewControl:true,

				overviewMapControl:true,

				rotateControl:true

				// mapTypeControlOptions: {

			 //      mapTypeIds: [google.maps.MapTypeId.ROADMAP, 'map_style']

			 //    },

			};

			

			var

			marker;

			mapObject = new google.maps.Map(document.getElementById('map'), mapOptions);

			// mapObject.mapTypes.set('map_style', styledMap);

		  	// mapObject.setMapTypeId('map_style');

			//for (var key in markersData)

			markersData.forEach(function (item) {

				marker = new google.maps.Marker({

					position: new google.maps.LatLng(item.location_latitude, item.location_longitude),

					map: mapObject,

					// icon: 'http://beta.kkfashion.vn/map/pin.png',

					marker_id: item.id,

					marker_data: item

				});				

				markers.push(marker);

				google.maps.event.addListener(marker, 'click', (function () {

			      closeInfoBox();

			      getInfoBox(item).open(mapObject, this);

			      // var lat = parseFloat();

			      mapObject.setCenter(new google.maps.LatLng(item.location_latitude+0.04, item.location_longitude));

			      mapObject.setZoom(12);				      

			     }));					

			});

		};
		function hideAllMarkers () {

			//for (var key in markers)

				markers.forEach(function (marker) {

					marker.setMap(null);

				});

		};
		function toggleMarkers (category) {

			hideAllMarkers();

			closeInfoBox();
			if ('undefined' === typeof markers[category])

				return false;

			markers.forEach(function (marker) {

				marker.setMap(mapObject);

				marker.setAnimation(google.maps.Animation.DROP);
			});

		};

		

		function closeInfoBox() {

			$('div.infoBox').remove();

		};
		function getInfoBox(item) {
			var phone_txt = 'Điện thoại';
			var serve_time_txt = 'Giờ mở cửa';
			var address_txt = 'Địa chỉ';
			return new InfoBox({

				content:

				'<div class="marker_info none" id="marker_info">' +

				'<a class="close-info" onclick="closeInfoBox();">X</a>' +

				'<div class="info" id="info">'+				

				'<h2>'+ item.name +'<span></span></h2>' +

				'<span>'+ phone_txt + ': ' + item.phone + '</span>' +

				'<span>'+ serve_time_txt + ': ' + item.serve_time +'</span>' +

				'<span>'+ address_txt + ': ' + item.description_point+'</span>' +				'<span class="arrow"></span>' +

				'</div>' +

				'</div>',

				disableAutoPan: true,

				maxWidth: 0,

				pixelOffset: new google.maps.Size(-148, -378),

				closeBoxMargin: '50px 100px',

				closeBoxURL: '',

				isHidden: false,

				pane: 'floatPane',

				enableEventPropagation: true

			});		};
		
		function getInfoBox_EN(item) {
			var phone_txt = 'Phone';
			var serve_time_txt = 'Serve Time';
			var address_txt = 'Address';
			return new InfoBox({

				content:

				'<div class="marker_info none" id="marker_info">' +

				'<a class="close-info" onclick="closeInfoBox();">X</a>' +

				'<div class="info" id="info">'+				

				'<h2>'+ item.name_point +'<span></span></h2>' +

				'<span>'+ phone_txt + ': ' + item.phone + '</span>' +

				'<span>'+ serve_time_txt + ': ' + item.serve_time +'</span>' +

				'<span>'+ address_txt + ': ' + item.description_point+'</span>' +				'<span class="arrow"></span>' +

				'</div>' +

				'</div>',

				disableAutoPan: true,

				maxWidth: 0,

				pixelOffset: new google.maps.Size(-148, -405),

				closeBoxMargin: '50px 100px',

				closeBoxURL: '',

				isHidden: false,

				pane: 'floatPane',

				enableEventPropagation: true

			});		};