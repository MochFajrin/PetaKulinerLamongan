  //show message
  const alertMessage =  document.getElementsByClassName('btn btn-success')[0];

    alertMessage.addEventListener('click', (e) => {
    const text = document.getElementById('text-danger');
    text.setAttribute('class', 'text-danger');
    alertMessage.setAttribute('disabled', 'disabled');
    console.log(e);
    text.innerText = 'Jika lokasi dirasa kurang akurat, tolong klik peta dan atur sesuai lokasi anda';
});

//get current location
const latitude = document.getElementById("Latitude");
const longitude = document.getElementById("Longitude");
latitude.value = -6.980599;
longitude.value = 112.325913;



//type

const streets = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.    mapbox.com/">Mapbox</a>',
    id: 'mapbox/streets-v11'
});

const satellite = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/satellite-v9'
});


const openStreetMap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
});

const dark = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    id: 'mapbox/dark-v10'
});

const map = L.map('map', {
    center: [latitude.value, longitude.value],
    zoom: 10,
    layers: [streets],
});

const baseLayers = {
    'Streets': streets,
    'Satellite': satellite,
    'Open Street Map ': openStreetMap,
    'Dark': dark
};
const layerControl = L.control.layers(baseLayers).addTo(map);

//get coordinat
const latInput = document.querySelector('[name=latitude]');
const lngInput = document.querySelector('[name=longitude]');

const currentLocation = [-2.4948486736431805, 118.7519626470474];
map.attributionControl.setPrefix(false);

const marker = new L.marker(currentLocation, {
    draggable: 'true'
});

//get current location

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        alertMessage.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {

    latitude.value = position.coords.latitude;
    longitude.value = position.coords.longitude;
    const marker = L.marker([latitude.value, longitude.value], { draggable : 'true'});
    marker.bindPopup("Your Location");
    marker.addTo(map);

    console.log(latitude.value + ' '+ longitude.value);

    marker.on('dragend', function(event) {
        const position = marker.getLatLng();
        marker.setLatLng(position, {
            currentLocation
        }).bindPopup("Your Location").update();
        $('#Latitude').val(position.lat);
        $('#Longitude').val(position.lng);
        console.log(latitude.value +' '+ longitude.value);
    });

}
