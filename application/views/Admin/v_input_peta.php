<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Pemetaan -->

    <section class="content">
        <div class="container-fluid">
            <div class="card p-2">
                <div class="row">
                    <div class="col-sm-6">
                        <div id="map" style="width: 100%; height: 400px;"></div>
                        <div class="form-grub mt-4">
                            <p id="text-danger" class="text-success">Silahkan Masukkan lokasi anda</p>
                            <!-- <p class="text-danger">Jika lokasi dirasa kurang akurat, tolong klik peta dan atur sesuai lokasi anda</p> -->
                            <button class="btn btn-success btn-sm form-control" onclick="getLocation();">Auto Check</button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <?= form_open(); ?>
                        <div class="form-grub">
                            <label for="title">Judul Laporan</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <div class="form-grub">
                            <label for="owner_name">Nama Pemilik</label>
                            <input type="text" id="owner_name" name="owner_name" class="form-control">
                        </div>
                        <div class="form-grub">
                            <label for="culinary_name">Nama Kuliner</label>
                            <select type="text" id="owner_name" name="id_culinary" class="form-control">
                                <option value=""></option>
                                <?php foreach ($culinaries as $culinary) { ?>
                                    <option value="<?= $culinary->id; ?>"><?= $culinary->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-grub">
                            <label for="address">Alamat</label>
                            <input type="text" id="address" name="address" class="form-control">
                        </div>
                        <div class="form-grub">
                            <label for="description">Deskripsi</label>
                            <input type="text" id="description" name="description" class="form-control">
                        </div>

                        <div class="form-grub">
                            <input type="hidden" id="Latitude" name="latitude" class="form-control">
                        </div>
                        <div class="form-grub">
                            <input type="hidden" id="Longitude" name="longitude" class="form-control">
                        </div>

                        <div class="form-grub mt-3">
                            <button class="btn btn-primary btn-sm form-control" onclick="getLocation();">Publish Your Report</button>
                        </div>
                        <?= form_close(); ?>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- Main content -->

</div>
<!-- /.content-wrapper -->
<script>
    //show message
    document.getElementsByClassName('btn btn-success')[0].addEventListener('click', () => {
        const text = document.getElementById('text-danger');
        text.setAttribute('class', 'text-warning');
        text.innerText = 'Jika lokasi dirasa kurang akurat, tolong klik peta dan atur sesuai lokasi anda';
    });
    //get current location
    const latitude = document.getElementById("Latitude");
    const longitude = document.getElementById("Longitude");
    latitude.value = -6.980599;
    longitude.value = 112.325913;

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            latitude.innerHTML = "Geolocation is not supported by this browser.";
            longitude.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        latitude.value = position.coords.latitude;
        longitude.value = position.coords.longitude;
        L.marker([latitude.value, longitude.value]).bindPopup("Your Location").addTo(map);

    }

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
        zoom: 11,
        layers: [streets],
    });

    const baseLayers = {
        'Streets': streets,
        'Satellite': satellite,
        'Open Street Map ': openStreetMap,
        'Dark': dark
    };
    const layerControl = L.control.layers(baseLayers).addTo(map);


    //marker

    const marker1 = L.marker([latitude.value, longitude.value]).bindPopup("<img src = '<?= base_url('uploads/thumbnail_peta/Screenshot 2022-12-08 100735.png') ?>' width = '150px'> <br><b>Nasi Boran</b><br>Ds. sumberejo").addTo(map);


    //get coordinat
    const latInput = document.querySelector('[name=latitude]');
    const lngInput = document.querySelector('[name=longitude]');

    const currentLocation = [-2.4948486736431805, 118.7519626470474];
    map.attributionControl.setPrefix(false);

    const marker = new L.marker(currentLocation, {
        draggable: 'true'
    });

    //mengambil coordinat saat marker digeser

    marker.on('dragend', function(event) {
        const position = marker.getLatLng();
        marker.setLatLng(position, {
            currentLocation
        }).bindPopup(position).update();
        $('#Latitude').val(position.lat);
        $('#Longitude').val(position.lng);
    });

    //mengambil coordinat saat map diklik

    map.on('click', function(e) {
        const lat = e.latlng.lat;
        const lng = e.latlng.lng;
        if (!marker) {
            marker = L.marker(e.latlng).addTo(map);
        } else {
            marker.setLatLng(e.latlng);
        }
        latInput.value = lat;
        lngInput.value = lng;
    });

    map.addLayer(marker);
</script>