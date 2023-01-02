<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
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
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
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

                                <div class="tab-pane" id="settings">
                                    <?php echo validation_errors(); ?>
                                    <form id="formProfile" class="form-horizontal" action="<?= base_url('User/update_profile') ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="profile_pict" class="col-sm-2 col-form-label">Foto Profil</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="profile_pict" name="profile_pict">
                                                <input type="hidden" name="old_pict" value="<?= base_url('uploads/profile_pict/' . $profile['profile_pict']) ?>">
                                            </div>
                                        </div>
                                        <div class=" form-group row">
                                            <label for="first_name" class="col-sm-2 col-form-label">First name</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?= $profile['first_name'] ?>" class="form-control" id="first_name" name="first_name" placeholder="First name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="last_name" class="col-sm-2 col-form-label">Last name</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?= $profile['last_name']; ?>" class="form-control" id="last_name" name="last_name" placeholder="Last name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?= $profile['email']; ?>" class="form-control" placeholder="Email" disabled>
                                            </div>
                                        </div>
                                        <div id="row-password" class="form-group row">
                                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                                            <p class="text-danger"> <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?></p>
                                            <div class="col-sm-10">
                                                <button type="button" id="buttonPassword" class="btn btn-warning btn-sm">Ubah Password</button>
                                            </div>
                                        </div>
                                        <div class=" form-group row">
                                            <label for="birth_date" class="col-sm-2 col-form-label">Birth date</label>
                                            <div class="col-sm-10">
                                                <input type="date" value="<?= $profile['birth_date']; ?>" class="form-control" id="birth_date" name="birth_date">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="address" class="col-sm-2 col-form-label">Address</label>
                                            <div class="col-sm-10">
                                                <input type="text" value="<?= $profile['address']; ?>" class="form-control" id="address" name="address" placeholder="Masukkan alamat">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="gender" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <select id="gender" name="gender" class="form-control">
                                                    <?php
                                                    if ($profile['gender'] == 'l') { ?>
                                                        <option value="l">Laki-laki</option>
                                                        <option value="p">Perempuan</option>
                                                    <?php } else { ?>
                                                        <option value="p">Perempuan</option>
                                                        <option value="l">Laki-laki</option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button id="submit-form" type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<script>
    const buttonPassword = document.getElementById('buttonPassword');
    const rowPassword = document.getElementById('row-password');

    buttonPassword.addEventListener('click', function(e) {
        rowPassword.innerHTML = " <label for='password' class='col-sm-2 col-form-label'>Password</label><div  class='col-sm-10'><input id='formPassword' type='password' class='form-control' id='birth_date' name='password' placeholder='Masukkan password baru'></div>"
        document.getElementById('submit-form').setAttribute('disabled', 'disabled');

        const checkValidation = setInterval(() => {
            if (document.getElementById('formPassword').value.length < 8) {
                document.getElementById('submit-form').setAttribute('disabled', 'disabled');
            } else if (document.getElementById('formPassword').value.length >= 8) {
                clearInterval(checkValidation);
                document.getElementById('submit-form').removeAttribute('disabled');
            }
        }, 0);

    });
</script>