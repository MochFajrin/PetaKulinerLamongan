<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?> | Peta Kuliner Lamongan</title>
    <!-- fav-icon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('uploads/favicon/favicon.ico'); ?>">
    <!-- custom css -->
    <link rel="stylesheet" href="<?= base_url('assets/style/custom_style.css') ?>">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/templates/adminLte/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('assets/templates/adminLte/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/templates/adminLte/'); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/templates/adminLte/'); ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('assets/templates/adminLte/'); ?>dist/css/adminlte.min.css">
    <!-- lefleat -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <!-- jQuery -->
    <script src="<?= base_url('assets/templates/adminLte/'); ?>plugins/jquery/jquery.min.js"></script>
</head>
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
                        <li class="breadcrumb-item"><a href="<?= base_url('Discovery/search'); ?>">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-6">
                        <h3 class="d-inline-block d-sm-none"><?= $map['title']; ?></h3>

                        <div class="col-12">

                            <strong>Location</strong>
                            <div class="card-body">
                                <div id="map" style="width: 100%; height: 400px;"></div>
                            </div>
                            <div class="form-group"><strong>Koordinat :</strong> <?= $map['latitude'] . '  ,  ' .  $map['longitude']; ?></div>

                        </div>

                        <div class="col-12">
                            <figure class="col-12 ">
                                <?php if ($map['report_thumb'] == null) { ?>
                                    <p>Tidak ada gambar</p>
                                <?php } else { ?>
                                    <img src="<?= base_url('uploads/thumbnail_peta/' . $map['report_thumb']) ?>" class="product-image">
                                <?php } ?>
                                <figcaption>
                                    <p><strong>Posted by : </strong><?= $map['username']; ?></p>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <!-- Pemetaan -->



                    <div class="col-12 col-sm-6">
                        <h3 class="my-3"><strong><?= $map['title']; ?></strong></h3>
                        <h4>Information :</h4>
                        <div class="form-group"><strong>Nama Pemilik :</strong> <?= $map['owner_name']; ?></div>
                        <div class="form-group"><strong>Nama Kuliner :</strong> <?= $map['culinary_name']; ?></div>
                        <div class="form-group"><strong>Alamat usaha :</strong> <?= $map['address']; ?></div>
                        <div class="form-group"><strong>Kecamatan :</strong> <?= $map['nama_kecamatan']; ?></div>
                        <div class="form-group"><strong>Jam operasional:</strong> <?= $map['open_time'] . '  -  ' .  $map['close_time'] . ' WIB'; ?></div>
                        <hr>
                        <h3>Description</h3>
                        <p><?= $map['description']; ?></p>

                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

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
        center: [<?= $map['latitude'] ?>, <?= $map['longitude'] ?>],
        zoom: 18,
        layers: [streets],
    });
    const baseLayers = {
        'Streets': streets,
        'Satellite': satellite,
        'Open Street Map ': openStreetMap,
        'Dark': dark
    };
    const layerControl = L.control.layers(baseLayers).addTo(map);

    L.marker([<?= $map['latitude']; ?>, <?= $map['longitude'] ?>]).bindPopup("<img src='<?= base_url('uploads/thumbnail_peta/' . $map['report_thumb']) ?>' width='100px'><br><strong><?= $map['culinary_name'] ?></strong>").addTo(map);
</script>

<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/templates/adminLte/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url('assets/templates/adminLte/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/templates/adminLte/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/templates/adminLte/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/templates/adminLte/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/templates/adminLte/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/templates/adminLte/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/templates/adminLte/'); ?>plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url('assets/templates/adminLte/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/templates/adminLte/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url('assets/templates/adminLte/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/templates/adminLte/'); ?>dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- font awesome -->
<script src="https://kit.fontawesome.com/fd87c96c60.js" crossorigin="anonymous"></script>
</body>

</html>