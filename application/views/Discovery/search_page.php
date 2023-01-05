<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= $title; ?> | Peta Kuliner Lamongan</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('uploads/favicon/favicon.ico'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/templates/landing_page/'); ?>assets_search/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700">
    <link rel="stylesheet" href="<?= base_url('assets/templates/landing_page/'); ?>assets_search/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/templates/landing_page/'); ?>assets_search/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/templates/landing_page/'); ?>assets_search/css/Pretty-Search-Form.css">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-white portfolio-navbar gradient">
        <div class="container"><a class="navbar-brand logo" href="#">PETA KULINER LAMONGAN</a>
            <nav class="navbar navbar-light navbar-expand-md text-right">
                <div class="container-fluid"><button data-toggle="collapse" data-target="#navbarNav" class="navbar-toggler"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                </div>
            </nav>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link active" href="<?= base_url('User/profil'); ?>">MY PROFILE&nbsp;</a></li>
                    <?php if ($this->session->userdata('email') == true) ?>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="<?= base_url('Discovery'); ?>">HOME</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href=" <?= base_url('Discovery/about_us'); ?> ">ABOUT-US</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page projets-page">
        <section class="portfolio-block project-no-images">
            <div class="container mt-2">
                <form action="<?= base_url('Discovery/search') ?>" method="GET" class="search-form" style="width: 824px;max-width: 847px;">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>

                        <input class="form-control" type="text" name="q" value="<?= html_escape($q) ?>" placeholder="Cari nama kuliner yang ingin anda inginkan....">

                        <div class="input-group-append"><button class="btn btn-light" type="submit">Cari</button></div>
                    </div>
                </form>
            </div>
            <div class="container">
                <div class="heading"></div>

                <div class="row">
                    <?php foreach ($mapping as $map) { ?>
                        <div class="col-md-6 col-lg-4">
                            <div class="project-card-no-image">
                                <h3 class="card-title"><?= $map->culinary_name; ?></h3>
                                <p class="text-muted"><?= $map->address; ?></p>
                                <p class="text-muted">Jam Operasioanl : <?= $map->open_time . ' - ' . $map->close_time . ' WIB' ?></p>
                                <p class="text-muted">Kecamatan : <?= $map->nama_kecamatan . ', Lamongan' ?></p>
                                <h4 class="card-title">Posted By : <?= $map->username; ?></h4>
                                <a href="<?= base_url('Discovery/detail_kuliner/' . $map->id) ?>"><button type="button" class="btn btn-outline-primary">
                                        See More
                                    </button></a>
                                <div class="tags"></div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </section>

    </main>


    <footer class="page-footer">
        <div class="container">
            <div class="links"><a href="#">About me</a><a href="#">Contact me</a><a href="#">Projects</a></div>
        </div>
    </footer>
    <script src="<?= base_url('assets/templates/landing_page/'); ?>assets_search/js/jquery.min.js"></script>
    <script src="<?= base_url('assets/templates/landing_page/'); ?>assets_search/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="<?= base_url('assets/templates/landing_page/'); ?>assets_search/js/theme.js"></script>
</body>

</html>