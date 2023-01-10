<div class="content-wrapper mt-3">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <div class="text-center">
                            <?php if ($profile['profile_pict'] == '') { ?>
                                <img class="profile-user-img img-fluid img-circle mt-3" src="<?= base_url('uploads/profile_pict/blank.png'); ?>" alt=" User profile picture" style="width : 150px; height: 150px; object-fit: cover; ">
                            <?php } else { ?>
                                <img class="profile-user-img img-fluid img-circle mt-3" src="<?= base_url('uploads/profile_pict/' . $profile['profile_pict']); ?>" alt=" User profile picture" style="width : 150px; height: 150px; object-fit: cover; ">
                            <?php } ?>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fa-solid fa-envelope"></i> Email</strong>
                            <p class="text-muted"><?= $profile['email']; ?></p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                            <p class="text-muted"><?= $profile['address']; ?></p>
                            <hr>
                            <strong><i class="fas fa-pencil-alt mr-1"></i> Join Date</strong>
                            <p class="text-muted"><?= date('d-m-Y', round($profile['join_date'] / 1000)); ?></p>
                            <hr>
                            <strong><i class="far fa-file-alt mr-1"></i> Total Report</strong>
                            <p class="text-muted"><?= $reportCount['count'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                                <li class="nav-item"><a class="nav-link" href="#profile" data-toggle="tab">Profile</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <?php foreach ($activity as $act) { ?>
                                        <div class="post">
                                            <div class="user-block">
                                                <img class="img-circle img-bordered-sm" src="<?= base_url('uploads/thumbnail_peta/' . $act->report_thumb); ?>">
                                                <span class="username">
                                                    <a href="#"><?= $act->title ?></a>
                                                    <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                                                </span>
                                                <span class="description">Shared publicly <?= date('d-m-Y ', round($act->report_time / 1000)); ?></span>
                                            </div>
                                            <!-- /.user-block -->
                                            <p>
                                                <?= $act->description; ?>
                                            </p>

                                        </div>
                                    <?php } ?>
                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="profile">
                                    <div class=" form-group row">
                                        <label for="first_name" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <p class="col-form-label"><?= $profile['first_name'] . ' ' . $profile['last_name']; ?> </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <p class="col-form-label"><?= $profile['email'] ?> </p>
                                        </div>
                                    </div>
                                    <div class=" form-group row">
                                        <label for="birth_date" class="col-sm-2 col-form-label">Birth date</label>
                                        <div class="col-sm-10">
                                            <p class="col-form-label"><?= $profile['birth_date'] ?> </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="address" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10">
                                            <p class="col-form-label"><?= $profile['address'] ?> </p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-10">
                                            <?php
                                            if ($profile['gender'] == 'l') { ?>
                                                <p class="col-form-label">Laki-laki</p>
                                            <?php } else { ?>
                                                <p class="col-form-label">Perempuan</p>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div><!-- /.container-fluid -->