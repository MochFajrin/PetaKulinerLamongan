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
                        <div class="form-grub mb-3 mt-4">
                            <p id="text-danger" class="text-success">Silahkan Masukkan lokasi anda</p>
                            <?= form_error('latitude', '<small class="text-danger pl-3">', '</small>'); ?>
                            <button class="btn btn-success btn-sm form-control" onclick="getLocation();">Auto Check</button>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <?= form_open_multipart('User/input_laporan') ?>
                        <div class="form-grub mb-3">
                            <label for="title">Judul Laporan</label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Masukan judul laporan">
                            <?= form_error('title', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-grub mb-3">
                            <label for="owner_name">Nama Pemilik</label>
                            <input type="text" id="owner_name" name="owner_name" class="form-control" placeholder="Masukan nama pemilik usaha kuliner">
                            <?= form_error('owner_name', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-grub mb-3">
                            <label for="culinary_name">Nama Kuliner</label>
                            <select id="culinary_name" name="id_culinary" class="form-control">
                                <option value=""></option>
                                <?php foreach ($culinaries as $culinary) { ?>
                                    <option value="<?= $culinary->id; ?>"><?= $culinary->name; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('id_culinary', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-grub mb-3">
                            <label for="nama_kecamatan">Nama Kecamatan</label>
                            <select id="nama_kecamatan" name="nama_kecamatan" class="form-control">
                                <option value=""></option>
                                <?php foreach ($list_kecamatan as $kecamatan) { ?>
                                    <option value="<?= $kecamatan->nama; ?>"><?= $kecamatan->nama; ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('nama_kecamatan', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-grub mb-3">
                            <label for="address">Alamat</label>
                            <input type="text" id="address" name="address" class="form-control" placeholder="Masukkan alamat dari usaha kuliner">
                            <?= form_error('address', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-grub mb-3">
                            <label>Jam Buka</label><br>
                            <select name="open_hour">

                                <?php for ($i = 0; $i <= 23; $i++) {
                                    if ($i < 10) { ?>
                                        <option value="<?= '0' . $i; ?>"><?= '0' . $i; ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php }
                                } ?>
                            </select>
                            <select name="open_min" id="">

                                <?php for ($i = 0; $i <= 59; $i++) {
                                    if ($i < 10) { ?>
                                        <option value="<?= '0' . $i; ?>"><?= '0' . $i; ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php }
                                } ?>
                            </select>
                            <span>WIB</span>
                            <?= form_error('open_hour', '<p class="text-danger pl-3">', '</p>'); ?>
                            <?= form_error('open_min', '<p class="text-danger pl-3">', '</p>'); ?>
                        </div>
                        <div class="form-grub mb-3">
                            <label>Jam Tutup</label><br>
                            <select name="close_hour" id="">
                                <?php for ($i = 0; $i <= 23; $i++) {
                                    if ($i < 10) { ?>
                                        <option value="<?= '0' . $i; ?>"><?= '0' . $i; ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php }
                                } ?>
                            </select>
                            <select name="close_min" id="">
                                <?php for ($i = 0; $i <= 59; $i++) {
                                    if ($i < 10) { ?>
                                        <option value="<?= '0' . $i; ?>"><?= '0' . $i; ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                <?php }
                                } ?>
                            </select>
                            <span>WIB</span>
                            <?= form_error('close_hour', '<p class="text-danger pl-3">', '</p>'); ?>
                            <?= form_error('close_min', '<p class="text-danger pl-3">', '</p>'); ?>
                        </div>
                        <div class="form-grub mb-3">
                            <label for="description">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Masukkan deskripsi tambahans seperti menu apa saja yang dijual"></textarea>
                            <?= form_error('description', '<small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Foto Toko, Gerobak, atau Kedai</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" id="report_thumb" name="report_thumb" class="custom-file-input">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-grub mb-3">
                            <input type="hidden" id="Latitude" name="latitude" class="form-control">
                        </div>
                        <div class="form-grub mb-3">
                            <input type="hidden" id="Longitude" name="longitude" class="form-control">
                        </div>
                        <div class="form-grub mb-3">
                            <button type="submit" class="btn btn-primary btn-sm form-control">Publish Your Report</button>
                        </div>
                        <?= form_close() ?>
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
    const alertMessage = document.getElementsByClassName("btn btn-success")[0];
    let latVal = document.getElementById("Latitude");
    let longVal = document.getElementById("Longitude");

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
        "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: "mapbox/streets-v11",
        }
    );

    const satellite = L.tileLayer(
        "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: "mapbox/satellite-v9",
        }
    );

    const openStreetMap = L.tileLayer(
        "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }
    );

    const dark = L.tileLayer(
        "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw", {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
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

    let currentLocation = [latitude, longitude];

    function showPosition(position) {
        setTimeout(() => {
            const text = document.getElementById("text-danger");
            text.setAttribute("class", "text-danger");
            text.innerText =
                "Jika lokasi dirasa kurang akurat, tolong klik peta dan atur sesuai lokasi anda";
            latVal.value = position.coords.latitude;
            longVal.value = position.coords.longitude;
            console.log(latVal.value + " " + longVal.value);
            const marker = L.marker([latVal.value, longVal.value], {
                draggable: "true",
            });
            marker.bindPopup("Your Location");
            marker.addTo(map);

            marker.on("dragend", function(event) {
                const position = marker.getLatLng();
                marker
                    .setLatLng(position, {
                        currentLocation,
                    })
                    .bindPopup("Your Location")
                    .update();
                $("#Latitude").val(position.lat);
                $("#Longitude").val(position.lng);

                console.log(latVal.value + ", " + longVal.value);
            });
        }, 5000);
    }
</script>