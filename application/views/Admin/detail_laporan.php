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
                            <img src="<?= base_url('uploads/thumbnail_peta/' . $map['report_thumb']) ?>" class="product-image">
                        </div>
                        <div class="col-12 product-image-thumbs">
                            <p><strong>Posted by : </strong><?= $map['username']; ?></p>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <h3 class="my-3"><?= $map['title']; ?></h3>
                        <h4>Information :</h4>
                        <div class="form-group"><strong>Nama Pemilik :</strong> <?= $map['owner_name']; ?></div>
                        <div class="form-group"><strong>Nama Kuliner :</strong> <?= $map['culinary_name']; ?></div>
                        <div class="form-group"><strong>Alamat usaha :</strong> <?= $map['address']; ?></div>
                        <div class="form-group"><strong>Kecamatan :</strong> <?= $map['nama_kecamatan']; ?></div>
                        <div class="form-group"><strong>Jam operasional:</strong> <?= $map['open_time'] . '  -  ' .  $map['close_time'] . ' WIB'; ?></div>
                        <hr>
                        <h3>Description</h3>
                        <p><?= $map['description']; ?></p>

                        <div class="mt-4">
                            <a href="<?= base_url('Admin/terima_laporan/' . $map['id']); ?>">
                                <div class="btn btn-success btn-lg btn-flat"> <i class="fa-regular fa-circle-check"></i> Terima Laporan</div>
                            </a>
                            <a href="<?= base_url('Admin/tolak_laporan/' . $map['id']) ?>">
                                <div class="btn btn-danger btn-lg btn-flat"><i class="fa-regular fa-circle-xmark"></i> Tolak Laporan</div>
                            </a>
                        </div>

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