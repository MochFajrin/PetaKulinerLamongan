<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/landing_page/assets/css/style.css">
    <link rel="icon" type="image/x-icon" href="<?= base_url('uploads/favicon/favicon.ico'); ?>">
    <!-- lefleat -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
</head>

<body>
    <!--navbar-->
    <section id="nav">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href=""><span>Peta Kuliner Lamongan</span></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </section>

    <!-- banneer-->
    <section id="banner">
        <div class="banner">
            <div class="container">
                <div class="row">
                    <div class="col-md-6" style="z-index: 100;">
                        <h4 class="title">Selamat Datang</h4>
                        <p>Selamat datang di Website Peta Kuliner Lamongan, Temukan lokasi kuliner lamongan favoritmu</p>
                        <a href="<?= base_url('Auth/login_user'); ?>" class="btn btn-warning">Mulai Jelajahi</a>
                    </div>

                    <div class="col-md-6">
                        <img src="<?= base_url() ?>assets/templates/landing_page/assets/img/tim.png" class="ban-img img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>

        <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#fff" fill-opacity="1" d="M0,32L48,42.7C96,53,192,75,288,90.7C384,107,480,117,576,128C672,139,768,149,864,170.7C960,192,1056,224,1152,208C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </section>

    <!--features-->
    <div id="features">
        <div class="container">
            <h2 class="text-center mt-5">Apa yang kami tawarkan</h2>
            <div class="row ">
                <div class="col-md-4 features">
                    <img src="<?= base_url() ?>assets/templates/landing_page/assets/img/worldwide.png" class="rounded mx-auto d-block" alt="">
                    <h4 class="text-center">Kebebasan Berbagi Lokasi Kuliner</h4>
                    <p>Pengguna tidak hanya bisa mendapatkan lokasi kuliner di kota lamongan, Tapi juga bisa ikut berkontribusi untuk saling berbagi lokasi usaha sebuah kuliner agar bisa memberikan informasi usaha-usaha kuliner khas lamongan yang belum ada di Website ini.</p>
                </div>

                <div class="col-md-4 features">
                    <img src="<?= base_url() ?>assets/templates/landing_page/assets/img/map1.png" class="rounded mx-auto d-block" alt="">
                    <h4 class="text-center">Peta Kuliner Khas Lamongan</h4>
                    <p>Memberikan informasi mengenai lokasi lokasi kuliner khas yang ada di kota lamongan, Mulai dari ukm kecil, rombongan, lesehan dan sebagainya</p>
                </div>

                <div class="col-md-4 features">
                    <img src="<?= base_url() ?>assets/templates/landing_page/assets/img/map2.png" class="rounded mx-auto d-block" alt="">
                    <h4 class="text-center">Menggunakan Teknologi Leaflet</h4>
                    <p>Leaflet adalah library JavaScript yang open source untuk peta interaktif yang mobile friendly. Beratnya hanya sekitar 42 KB JS dan memiliki semua fitur pemetaan yang dibutuhkan sebagian besar developer.</p>
                </div>

            </div>
        </div>
    </div>

    <!--pricing-->
    <section id="pricing">
        <div class="container">
            <h2 class="text-center mb-4">Mengapa harus melihat Peta Kuliner Lamongan</h2>
            <div class="row">
                <div class="col-md-6">
                    <h4 class="mb-5">benefit yang didapatkan</h4>
                    <ul>
                        <li><span class="btn btn-primary">1</span> Mempermudahkan pengguna bila ingin mengetahui lokasi yang menyediakan kuliner khas lamongan</li>
                        <li><span class="btn btn-primary">2</span>Membantu para pengusaha yang menyediakan kuliner khas lamongan agar usahanya dapat diketahui oleh banyak orang melalui platform ini</li>
                        <li><span class="btn btn-primary">3</span>Mengajak masyarakat untuk ikut berkontribusi membagikan lokasi usaha yang menyediakan kuliner khas lamongan</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="container-fluid">
                        <div class="card">
                            <div class="card-body">
                                <div id="map" style="width: 100%; height: 400px;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--footer-->
    <section id="footer">
        <div class="container">
            <p class="text-center">&#169; 5B Teknik informatika Angkatan 2020</p>
        </div>
    </section>

    <!--java script-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
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
            center: [-6.995182229772562, 112.33836709376861],
            zoom: 11,
            layers: [streets],
        });




        <?php foreach ($mapping as $map) { ?>
            L.marker([<?= $map->latitude ?>, <?= $map->longitude ?>]).bindPopup("<img src='<?= base_url('uploads/thumbnail_peta/' . $map->thumb) ?>' width = '100px'><br><strong><?= $map->culinary_name ?></strong> ").addTo(map);
        <?php } ?>
    </script>
</body>

</html>