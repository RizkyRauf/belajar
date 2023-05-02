
<section class="container-fluid">
    <!-- menu atas desktop -->
    <div class="row">
        <div class="col-12 col-md-6 d-none d-md-flex">
            <a class="navbar-nav float-left mt-4 pl-5" href="#">
                <img src="https://crawler.internal.binosaurus.com/images/logo.png" width="150" height="30" alt="">
            </a>
        </div>

        <div class="col-12 col-md-6">
            <div class="btn-group float-right mt-4 pr-5 d-none d-md-flex" role="group" aria-label="Button group with nested dropdown">
                <div class="btn-group" role="group">
                    <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                        <a><i class="fa fa-user-check"></i><span> {{auth()->user()->name}}</span></a>
                        <!-- <a><i class="fa fa-user-check"></i><span> rauf</span></a> -->
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="/logout">
                            <i class="fa fa-sign-out"></i> <span>Logout</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end desktop -->

    <!-- menu atas mobile -->
    <div class="row d-md-none">
        <div class="col-md-12">
            <div class="col-md-2">
                <a class="float-left mt-3" href="#">
                    <img src="https://crawler.internal.binosaurus.com/images/logo.png" width="150" height="30" alt="">
                </a>
            </div>
                    
            <div class="col-md-2">
                <button class="btn btn-sm btn-secondary dropdown-toggle float-right mt-3" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-bars"></i> menu
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="/dashboard">
                        <i class="fa fa-tachometer"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                    <a class="dropdown-item" href="/karyawan">
                        <i class="fa fa-users"></i>
                        <span>
                            Data karyawan
                        </span>
                    </a>
                    <a class="dropdown-item" href="/pengajuan">
                        <i class="fa fa-box"></i>
                        <span>
                            Form Barang
                        </span>
                    </a>
                    <a class="dropdown-item" href="/pengajuan">
                        <i class="fa fa-sign-out-alt"></i>
                        <span>
                            Logout
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- end mobile -->

    <!-- menu Desktop -->
    <div class="row d-none d-md-flex">
        <div class="col-12">
            <hr>
                <ul class="nav justify-content-center">
                    <li class="nav-link ">
                        <a href="/dashboard">
                            <span class="text-secondary">
                                <i class="fa fa-home"></i> Dashboard
                            </span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="/karyawan">
                            <span class="text-secondary">
                                <i class="fa fa-users"></i> Data Karyawan
                            </span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <span class="text-secondary">
                                <i class="fa fa-archive"></i> Pengajuan Barang
                            </span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <span class="text-secondary">
                                <i class="fa fa-archive"></i> Pengajuan Barang
                            </span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <span class="text-secondary"><i class="fa fa-archive"></i> Pengajuan Barang</span> 
                        </a>
                    </li>  
                </ul>
            <hr>
        </div>
    </div>
    <!-- end Desktop -->

    <!-- Footer -->
    <!-- <di class="row">
        <dic class="col-12">
        <footer class="footer mt-auto py-3 bg-light fixed-bottom">
            <div class="container">
                <div class="right">
                    <span class="text-muted">Ini adalah footer.</span>
                </div>
            </div>
        </footer>
        </dic>
    </di> -->
    <!-- end Footer -->
</section>
