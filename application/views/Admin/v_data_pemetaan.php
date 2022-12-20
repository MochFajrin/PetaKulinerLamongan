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
            <div class="card">
                <div class="card-body">
                    <div id="map" style="width: 100%; height: 400px;"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul Laporan</th>
                                        <th>Nama Pengunggah</th>
                                        <th>Address</th>
                                        <th>Latidute</th>
                                        <th>Longidute</th>
                                        <th>Status</th>
                                        <th>Kelolah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($reports as $report) { ?>
                                        <tr>
                                            <td><?= $report->id; ?></td>
                                            <td><?= $report->nama_pemilik; ?></td>
                                            <td><?= $report->alamat; ?></td>
                                            <td><?= $report->deskripsi; ?></td>
                                            <td><?= $report->latitude; ?></td>
                                            <td><?= $report->longitude; ?></td>
                                            <td><span class="badge badge-pill badge-success">Disetujui</span></td>
                                            <td><a href=""><button class="btn btn-primary btn-sm">Detail</button></a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    //type
    var streets = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.    mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11'
    });

    var satellite = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/satellite-v9'
    });


    var openStreetMap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    var dark = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/dark-v10'
    });

    const map = L.map('map', {
        center: [-2.4948486736431805, 118.7519626470474],
        zoom: 5,
        layers: [streets],
    });

    L.polyline([
        [-7.117515530095236, 112.42267572578366],
        [-7.118934165164256, 112.42246626400863],
        [-7.121302703654033, 112.42034952226192]
    ], {
        color: 'red'
    }).bindPopup('Rute nasi boran').addTo(map);
    //polygon
    L.polygon([
        [-7.114019357387522, 112.42877481733484],
        [-7.114134861030247, 112.42977530601942],
        [-7.112718909059917, 112.43022591711281],
        [-7.112564538092401, 112.42907793170825],
    ], {
        color: 'lightblue'
    }).bindPopup("<img src = 'https://upload.wikimedia.org/wikipedia/commons/b/b4/Stadion_Surajaya_Lamongan.jpg' width = '150px'>" + '<br>Stadiun Surajaya').addTo(map);

    //geo  json jawa timur
    $.getJSON("<?= base_url('assets/json/provinsi/35.geojson') ?>", function(data) {
        geoLayer = L.geoJson(data, {
            style: (feature) => {
                return {
                    color: 'red'
                }
            }
        }).addTo(map);
        //menampilkan informasi saat di klik
        geoLayer.eachLayer(function(layer) {
            layer.bindPopup('Jawa timur');
        });
    });


    <?php foreach ($reports as $report) { ?>
        L.marker([<?= $report->latitude ?>, <?= $report->longitude ?>]).bindPopup('<?= $report->culinary_name ?>').addTo(map);
    <?php } ?>
</script>