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
    <section class="content">

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
                                        <th>Nama Kuliner</th>
                                        <th>Pemilik</th>
                                        <th>Kecamatan</th>
                                        <th>Status</th>
                                        <th>Kelolah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($reports as $report) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $report->title; ?></td>
                                            <td><?= $report->culinary_name; ?></td>
                                            <td><?= $report->owner_name; ?></td>
                                            <td><?= $report->nama_kecamatan; ?></td>
                                            <?php if ($report->status == 'pending') { ?>
                                                <td><span class="badge badge-pill badge-danger"><?= $report->status; ?></span></td>
                                            <?php } else { ?>
                                                <td><span class="badge badge-pill badge-success"><?= $report->status; ?></span></td>
                                            <?php } ?>
                                            <td class="text-center">
                                                <a href=""><button class="btn btn-primary btn-sm">Detail</button></a>
                                                <a href="<?= base_url('User/form_update/' . $report->id) ?>"><button class="btn btn-warning btn-sm mx-3">Edit</button></a>
                                                <a href="<?= base_url('User/delete_laporan/' . $report->id); ?>"><button class="btn btn-danger btn-sm">Hapus</button></a>
                                            </td>
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
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
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
        center: [-7.051553401964953, 112.34223006871754],
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


    <?php foreach ($reports as $report) { ?>
        L.marker([<?= $report->latitude ?>, <?= $report->longitude ?>]).bindPopup("<img src='<?= base_url('uploads/thumbnail_peta/' . $report->thumb) ?>' width = '100px'><br><strong><?= $report->culinary_name ?></strong> ").addTo(map);
    <?php } ?>
</script>