<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-light elevation-4">
    <a href="<?= base_url('assets/templates/adminLte/'); ?>index3.html">
        <img src="<?= base_url('uploads/logo_brand/logo-lamongan-megilan.png'); ?>" class="border-bottom p-2" style="width :100%; " alt="">
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex border-bottom">
            <div class="image m-2">
                <img class="img-circle elevation-2" src="https://upload.wikimedia.org/wikipedia/commons/a/a2/Logo_of_Ministry_of_Communication_and_Information_Technology_of_the_Republic_of_Indonesia.svg" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block mt-2">Jhon Doe</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item mb-2">
                    <a href="<?= base_url('Admin/data_pemetaan') ?>" class="nav-link">
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
                <li class="nav-item" style="margin-top: 100%;">
                    <a href="../widgets.html" class="nav-link">
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