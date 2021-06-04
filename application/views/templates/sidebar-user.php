<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <!--<img src="assets/files/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">-->
        <span class="brand-text font-weight-light">
            <h5><b>CV Dwi Abadi teknik</b></h5>
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>assets/files/dist/img/avatar3.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Diana</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon classwith font-awesome or any other icon font library -->
                <li class="nav-item">
                <li class="nav-item">
                    <a href="<?php echo base_url('User/karyawan'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Kelola Karyawan
                        </p>
                    </a>
                    <class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-id-badge"></i>
                        <p>
                            My Profile
                        </p>
                    </a>
                    <class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('kuesioner'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Kelola Kuesioner
                        </p>
                    </a>
                    <class="bg-secondary">
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('Admin/home'); ?>" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Laporan
                        </p>
                    </a>
                    <!--<hr class="bg-secondary">-->
                </li>

            </ul>
        </nav>
    </div>
</aside>