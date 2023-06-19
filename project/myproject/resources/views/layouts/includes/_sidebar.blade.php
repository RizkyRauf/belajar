<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link elevation-4">
      <img src="{{asset('admin/assets/img/navbar.png')}}" alt="AdminLTE Logo" class="brand-image mr-3" style="opacity: .8">
      <span class="brand-text"><strong> BINOKULAR</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                <p>
                    Tables
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/karyawan" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tables Karyawan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/cuti" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                            <p>Tables Cuti</p>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-folder-plus nav-icon"></i>
                <p>
                    Form
                    <i class="right fas fa-angle-left"></i>
                </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="/karyawan/tambah" class="nav-link">
                        <i class="fas fa-plus-circle nav-icon"></i>
                        <p>Form Karyawan</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/form/cuti" class="nav-link">
                        <i class="fas fa-plus-circle nav-icon"></i>
                            <p>Form Cuti</p>
                        </a>
                    </li>
                </ul>
            </li>  
        </ul>
    </nav>
</aside>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->