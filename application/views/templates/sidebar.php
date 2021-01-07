<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="logo-md" style="font-size: 15px;"><b>Sistem Informasi Kelurahan</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a class="nav-link active" href="<?php echo base_url('Admin/') ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <span>Dashboard<span>
                    </a>
                </li>

                <li class="nav-item has-treeview menu-open">
                    <a class="nav-link active" href="<?php echo base_url('Manage_profile/') ?>">
                        <i class="fas fa-address-card"></i>
                        <span>Manage Profile</span>
                    </a>
                </li>

                <li class="nav-item has-treeview menu-open">
                    <a class="nav-link active" href="<?php echo base_url('Warga/') ?>">
                        <i class="fas fa-user"></i>
                        <span>Data Warga Manage</span>
                    </a>
                </li>

                <li class="nav-item has-treeview menu-open">
                    <a class="nav-link active" href="<?php echo base_url('Rekap_surat/') ?>">
                        <i class="fas fa-file-alt"></i>
                        <span>Rekap Surat</span>
                    </a>
                </li>

                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>