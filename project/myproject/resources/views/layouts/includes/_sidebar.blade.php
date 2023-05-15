<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="/dashboard" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                <li>
                    <a href="#table" data-toggle="collapse" class="collapsed"><i class="fas fa-table"></i> <span>Tables</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="table" class="collapse ">
                        <ul class="nav">
                            <li><a href="/karyawan" class="">Table Karyawan</a></li>
                            <li><a href="/cuti" class="">Table Cuti</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#form" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>From</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                    <div id="form" class="collapse ">
                        <ul class="nav">
                            <li><a href="/form/cuti/{{ auth()->user()->name }}" class="">Form Cuti</a></li>
                            <li><a href="" class="">Barang</a></li>
                            <li><a href="" class="">Service</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>