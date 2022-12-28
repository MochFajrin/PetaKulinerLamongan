<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-light elevation-4">
    <a href="<?= base_url('assets/templates/adminLte/'); ?>index3.html">
        <img src="<?= base_url('uploads/logo_brand/logo-lamongan-megilan.png'); ?>" class="border-bottom p-2" style="width :100%; " alt="">
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex border-bottom">
            <div class="user-block">
                <img class="img-circle img-bordered-sm" src="<?= base_url('uploads/thumbnail_peta/' . $profile['profile_pict']); ?>">
            </div>
            <div class="info">
                <p class="text-primary mt-1">Jhon Doe</p>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item mb-2">
                    <a href="<?= base_url('') ?>" class="nav-link">
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
                <li class="nav-item" style="margin-top: 80%;">
                    <a href="<?= base_url('Auth/logout'); ?>" class="nav-link">
                        <i class="nav-icon fa-solid fa-arrow-right-from-bracket mr-3"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>