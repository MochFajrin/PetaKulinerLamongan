<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-light elevation-4">
    <!-- Brand Logo -->
    <img src="<?= base_url('uploads/logo_brand/logo-lamongan-megilan.png'); ?>" class="border-bottom p-2" style="width :100%; " alt="">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex border-bottom">
            <div class="user-block">
                <img class="img-circle img-bordered-sm" src="<?= base_url('uploads/profile_pict/blank.png'); ?>">
            </div>
            <div class="info mt-1">
                <p class="text-primary">Admin</p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('Admin/data_pemetaan') ?>" class="nav-link">
                        <i class="nav-icon fa-solid fa-map-location-dot"></i>
                        <p>Data Pemetaan</p>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <a href="<?= base_url('Admin/data_laporan') ?>" class="nav-link">
                        <i class="nav-icon fa-solid fa-clipboard-user"></i>
                        <p>Data Laporan Pengguna</p>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <a href="<?= base_url('Admin/data_pengguna') ?>" class="nav-link">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p>Data Pengguna</p>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <a href="<?= base_url('Admin/data_kuliner') ?>" class="nav-link">
                        <i class="nav-icon fa-solid fa-bowl-food"></i>
                        <p>Data Kuliner</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>