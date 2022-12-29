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
                                        <th>Status</th>
                                        <th>Kelolah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($mapping as $map) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $map->title; ?></td>
                                            <td><?= $map->owner_name; ?></td>
                                            <td><?= $map->address; ?></td>
                                            <?php if ($map->status == 'pending') { ?>
                                                <td><span class="badge badge-pill badge-danger"><?= $map->status; ?></span></td>
                                            <?php } else { ?>
                                                <td><span class="badge badge-pill badge-success"><?= $map->status; ?></span></td>
                                            <?php } ?>
                                            <td>
                                                <a href="<?= base_url('Admin/detail_report/' . $map->id) ?>"><button class="btn btn-primary btn-sm">Detail</button></a>
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