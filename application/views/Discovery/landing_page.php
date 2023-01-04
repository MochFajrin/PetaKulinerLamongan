<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url() ?>assets/templates/landing_page/assets/css/style.css">
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
            <h2 class="text-center">Apa yang saya tawarkan</h2>
            <div class="row text-center">
                <div class="col-md-4 features">
                    <img src="<?= base_url() ?>assets/templates/landing_page/assets/img/worldwide.png" class="img-fluid" alt="">
                    <h4>Menggunakan </h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially
                        unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and morerecently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                </div>

                <div class="col-md-4 features">
                    <img src="<?= base_url() ?>assets/templates/landing_page/assets/img/map1.png" class="img-fluid" alt="">
                    <h4>SAMPLE 2</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                        a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially
                        unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and morerecently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                </div>

                <div class="col-md-4 features">
                    <img src="<?= base_url() ?>assets/templates/landing_page/assets/img/map2.png" class="img-fluid" alt="">
                    <h4>SAMPLE 1</h4>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                        standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make
                        a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,
                        remaining essentially
                        unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                        and morerecently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                </div>

            </div>
        </div>
    </div>

    <!--pricing-->
    <section id="pricing">
        <div class="container">
            <h2 class="text-center mb-3">menagapa harus melihat GIS</h2>
            <div class="row">
                <div class="col-md-6">
                    <h4>benefit yang didapatkan</h4>
                    <ul>
                        <li><span>contoh sample 1</span><a href="#" class="btn btn-primary">nominal 1</a></li>
                        <li><span>contoh sample 2</span><a href="#" class="btn btn-primary">nominal 2</a></li>
                        <li><span>contoh sample 3</span><a href="#" class="btn btn-primary">nominal 3</a></li>
                        <li><span>contoh sample 4</span><a href="#" class="btn btn-primary">nominal 4</a></li>
                        <li><span>contoh sample 5</span><a href="#" class="btn btn-primary">nominal 5</a></li>
                        <li><span>contoh sample 6</span><a href="#" class="btn btn-primary">nominal 6</a></li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <img src="<?= base_url() ?>assets/templates/landing_page/assets/img/maps2.jpg" class="img-fluid" alt="">
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
</body>

</html>