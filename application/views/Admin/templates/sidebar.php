<!-- Main Sidebar Container -->
<aside class="main-sidebar bg-light elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('assets/templates/adminLte/'); ?>index3.html">
        <img src="<?= base_url('uploads/logo_brand/logo-lamongan-megilan.png'); ?>" class="border-bottom p-2" style="width :100%; " alt="">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex border-bottom">
            <div class="image m-2">
                <img class="img-circle elevation-2" src="https://upload.wikimedia.org/wikipedia/commons/a/a2/Logo_of_Ministry_of_Communication_and_Information_Technology_of_the_Republic_of_Indonesia.svg" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Jhon Doe</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('Admin/data_pemetaan') ?>" class="nav-link">
                        <i class="fa-solid fa-map-location-dot"></i>
                        <p>Data Pemetaan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../widgets.html" class="nav-link">
                        <i class="fa-solid fa-clipboard-user"></i>
                        <p>Data Laporan Pengguna</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Admin/data_pengguna') ?>" class="nav-link">
                        <i class="fa-solid fa-users"></i>
                        <p>Data Pengguna</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Admin/input_peta') ?>" class="nav-link">
                        <i class="fa-solid fa-layer-group"></i>
                        <p>Input Peta</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../widgets.html" class="nav-link">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>