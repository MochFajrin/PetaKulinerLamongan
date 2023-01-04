<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-light elevation-4">
    <img src="<?= base_url('uploads/logo_brand/logo-lamongan-megilan.png'); ?>" class="border-bottom p-2" style="width :100%; ">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex border-bottom">
            <div class="user-block">
                <?php if ($profile['profile_pict'] == null or  $profile['profile_pict'] == '') { ?>
                    <img class="img-circle img-bordered-sm" src="<?= base_url('uploads/profile_pict/blank.png'); ?>">
                <?php } else { ?>
                    <img class="img-circle img-bordered-sm" src="<?= base_url('uploads/profile_pict/' . $profile['profile_pict']); ?>" style="object-fit: cover;">
                <?php } ?>
            </div>
            <div class="info">
                <p class="text-primary mt-1"><?= $profile['first_name'] . ' ' . $profile['last_name']; ?></p>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item mb-2">
                    <a href="<?= base_url('Discovery/search') ?>" class="nav-link">
                        <i class="nav-icon fa-solid fa-house mr-3"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?= base_url('User/profil'); ?>" class="nav-link">
                        <i class="nav-icon fa-solid fa-user mr-3"></i>
                        <p>Profil Saya</p>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?= base_url('User/form_input_laporan') ?>" class="nav-link">
                        <i class="nav-icon fa-solid fa-street-view mr-3"></i>
                        <p>Kirim Laporan</p>
                    </a>
                </li>
                <li class="nav-item mb-2">
                    <a href="<?= base_url('User/riwayat_laporan') ?>" class="nav-link">
                        <i class="nav-icon fa-solid fa-table mr-3"></i>
                        <p>Riwayat Laporan</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>