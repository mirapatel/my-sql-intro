// alert("hello");

var mainMap;
var allMarkers = [];
var userMarker;
var directionsService;
var directionsDisplay;


function initMap() {

	directionsService = new google.maps.DirectionsService;
  	directionsDisplay = new google.maps.DirectionsRenderer;


	//get a reference for the map container (div)
	var mapContainer = document.querySelector("#map-container");

	//set up some map options JavaScript Object Notations
	var options = {
		center: {
			lat: -41.300873,
			lng: 174.779148
		},
		zoom: 15
	};


	//create a new google map
	mainMap = new google.maps.Map(mapContainer, options);

	directionsDisplay.setMap(mainMap)

	//now ready to show the store markers
	storeMarkers();

	//find out if the user wants to share their location
	getUserLocation();

}

function storeMarkers() {

	//connect to a database and get the locations
	var locations = [
		{
			title: "Hataitai Store",
			lat: -41.304199,
			lng: 174.794836
		},

		{
			title: "Petone Store",
			lat: -41.224220,
			lng: 174.882146
		},

		{
			title: "Newlands Store",
			lat: -41.223472,
			lng: 174.822659
		},

		{
			title: "Lower Hutt Store",
			lat: -41.206461, 
			lng: 174.909592
		},

		{
			title: "CBD Store",
			lat: -41.289011, 
			lng: 174.775540 
		}
	];

	//loop over each location
	for (var i=0; i<locations.length; i++) {

		//create a new marker 

		var marker = new google.maps.Marker({
			position: {
				lat: locations[i].lat,
				lng: locations[i].lng
			},

			map: mainMap,
			title: locations[i].title,
			icon:"http://placehold.it/50x50",
			id: i
		});

		//store this marker in the collection
		allMarkers.push(marker);
	}

	//show the contents of the allMarkers array
	console.log(allMarkers);

	//populate store picker
	populateStorePicker(locations);
}

function populateStorePicker(locations) {
	// console.log(locations);

	//find the store picker variable
	var storePickerElement = document.querySelector("#store-picker");

	//create a "please sele..." option
	var optionElement = document.createElement("option");
	optionElement.innerHTML = "Please select a store...";
	storePickerElement.appendChild(optionElement);

	//create all the location options
	for (var i=0; i<locations.length; i++) {

		//create a new option element
		var optionElement = document.createElement("option");

		//put the name of this store in the option element
		optionElement.innerHTML = locations[i].title;

		//put this new option element in the select
		storePickerElement.appendChild(optionElement);
	}

	//listen for changes in the select element
	storePickerElement.onchange = showChosenLocation; //() attched to function name it will run straight away
}	

function showChosenLocation() {
	// alert("store chosen");
	// console.log(this[selectedIndex].value); (could've writtent this)

	//get the element that triggered this function
	var selectElement = this;

	//get the index of the option that was chosen
	var selectedOptionIndex = selectElement.selectedIndex

	//get the option that was selected
	var optionElement = selectElement[selectedOptionIndex];

	//get the text that is inside this option
	var optionText = optionElement.value;

	//find the marker that matches the option
	var chosenMarker;
	for(var i=0; i<allMarkers.length; i++) {

		//is this this marker
		if(optionText == allMarkers[i].title) {

			//found
			chosenMarker = allMarkers[i];
			//make sure the loop finishes
			i = allMarkers.length;
		}
	}

	// alert(chosenMarker);

	//only if we found a marker
	if(chosenMarker != undefined) {

		//make google maps focus on the marker postion
		// mainMap.setCenter({
		mainMap.panTo ({
			lat: chosenMarker.getPosition().lat(),
			lng: chosenMarker.getPosition().lng()
		});

		mainMap.setZoom(15);
	}
}

function getUserLocation() {
	// 	alert("ready");

	//if geolocation exists as a feature on this device
	if(navigator.geolocation) {

		//ask for the user location
		navigator.geolocation.getCurrentPosition(function(position){

			console.log(position);

			//create a marker for the user
			userMarker = new google.maps.Marker({
				map: mainMap,
				position: {
					lat: position.coords.latitude,
					lng: position.coords.longitude
				},
				icon: "http://placehold.it/20x30/00b9ff"
			});

			//place the marker where the user is

			mainMap.panTo ({
				lat: position.coords.latitude,
				lng: position.coords.longitude
			});

			//work out the closet shop
			var userLocation = new google.maps.LatLng({
				lat: position.coords.latitude, //property, () functions like walk or talk
				lng: position.coords.longitude
			});

			var closestDistance = 999999999999999999;
			var closestMarker;

			//loop over all the locations
			for (var i=0; i<allMarkers.length; i++) {

				//save a marker in a variable
				var marker = allMarkers[i];

				var markerLocation = new google.maps.LatLng({
					lat: marker.getPosition().lat(),
					lng: marker.getPosition().lng()
				});

				var distance = google.maps.geometry.spherical.computeDistanceBetween(userLocation, markerLocation);

				//is this marker closer than the closest one so far?

				if(distance < closestDistance) {

					//this is the new closest store
					closestDistance = distance;
					closestMarker = marker;
				}

			}

			console.log(closestMarker);

			calculateAndDisplayRoute(closestMarker);

		});

	}
}

function calculateAndDisplayRoute(closestMarker) {

	var destination = new google.maps.LatLng({
		lat: closestMarker.getPosition().lat(),
		lng: closestMarker.getPosition().lng()
	});

	var origin = new google.maps.LatLng({
		lat: userMarker.getPosition().lat(),
		lng: userMarker.getPosition().lng()
	});

	var options = {
		travelMode: google.maps.TravelMode.DRIVING,
		origin: origin,
		destination: destination
	}

	 directionsService.route({
		travelMode: google.maps.TravelMode.DRIVING
		origin: origin, 
		destination: 

	});

	directionsService.route(options, function(response, status)) {

		if (status === google.maps.DirectionsStatus.OK) {
      	directionsDisplay.setDirections(response);
    	} else {
      	window.alert('Directions request failed due to ' + status);
    	}

	}
}







