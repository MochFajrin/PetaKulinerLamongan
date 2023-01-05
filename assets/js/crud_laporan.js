//show message
const alertMessage = document.getElementsByClassName("btn btn-success")[0];

alertMessage.addEventListener("click", () => {
	const text = document.getElementById("text-danger");
	text.setAttribute("class", "text-warning");
	alertMessage.setAttribute("disabled", "disabled");

	let counter = 5;
	const fetchLocation = setInterval(() => {
		text.innerText = `Tunggu..., Memproses lokasi anda ${counter}`;
		counter--;
		if (counter == 0) {
			clearInterval(fetchLocation);
		}
	}, 1000);
});

//get current location
let latitude = -6.980599;
let longitude = 112.325913;

//type

const streets = L.tileLayer(
	"https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw",
	{
		attribution:
			'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: "mapbox/streets-v11",
	}
);

const satellite = L.tileLayer(
	"https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw",
	{
		attribution:
			'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: "mapbox/satellite-v9",
	}
);

const openStreetMap = L.tileLayer(
	"https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
	{
		attribution:
			'&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
	}
);

const dark = L.tileLayer(
	"https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw",
	{
		attribution:
			'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: "mapbox/dark-v10",
	}
);

const map = L.map("map", {
	center: [latitude, longitude],
	zoom: 10,
	layers: [streets],
});

const baseLayers = {
	Streets: streets,
	Satellite: satellite,
	"Open Street Map ": openStreetMap,
	Dark: dark,
};
const layerControl = L.control.layers(baseLayers).addTo(map);

//get current location

function getLocation() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(showPosition);
	} else {
		alertMessage.innerHTML = "Geolocation is not supported by this browser.";
	}
}

function showPosition(position) {
	setTimeout(() => {
		const text = document.getElementById("text-danger");
		text.setAttribute("class", "text-danger");
		text.innerText =
			"Jika lokasi dirasa kurang akurat, tolong klik peta dan atur sesuai lokasi anda";
		latitude = position.coords.latitude;
		longitude = position.coords.longitude;

		const marker = L.marker([latitude, longitude], {
			draggable: "true",
		});
		marker.bindPopup("Your Location");
		marker.addTo(map);

		console.log(latitude + " " + longitude);

		marker.on("dragend", function (event) {
			const position = marker.getLatLng();
			marker
				.setLatLng(position, {
					currentLocation,
				})
				.bindPopup("Your Location")
				.update();
			$("#Latitude").val(position.lat);
			$("#Longitude").val(position.lng);
			console.log(latitude + ", " + longitude);
		});
	}, 5000);
}
