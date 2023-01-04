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
                            <!-- <p class="text-danger">Jika lokasi dirasa kurang akurat, tolong klik peta dan atur sesuai lokasi anda</p> -->
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
                            <label for="open_time">Jam Buka</label>
                            <input type="time" id="open_time" name="open_time" class="form-control">
                        </div>
                        <div class="form-grub mb-3">
                            <label for="close">Jam Tutup</label>
                            <input type="time" id="close_time" name="close_time" class="form-control">
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
                                    <input type="file" id="report_thumb" name="report_thumb" id="report_thumb" class="custom-file-input">
                                    <label class="custom-file-label">Choose file</label>
                                </div>
                            </div>
                            <?= form_error('report_thumb', '<small class="text-danger pl-3">', '</small>'); ?>
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