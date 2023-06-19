@extends('layouts.master')

@section('cuti')
<div class="content-wrapper">
    <section class="content-header">
        <!-- alert -->
        <div class="row">
            <div class="col-12">
                <!-- alert success -->
                @if(session('sukses'))
                    <div class="alert alert-success" role="alert" id="sukses-alert">
                        {{session('sukses')}}
                    </div>
                @endif

                <!-- alert error -->
                @if($errors->any())
                    <div class="alert alert-danger" role="alert">
                        Terdapat kesalahan dalam mengisi form:
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <script>
                    setTimeout(function() {
                        document.querySelector('.alert').setAttribute('hidden', true);
                    }, 7000); // ganti angka 5000 dengan jumlah milidetik yang diinginkan (misalnya 3000 untuk 3 detik)
                </script>
            </div>
        </div>
        <!-- end alert -->
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tables Cuti</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Tables Cuti</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Buton Top content -->
   <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            
                        </li>
                    </ul>
                </div>
            </div>
        </div>
   </section>

   <!-- Main content -->
   <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="/karyawan/export" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-file-excel"></i><span> Export File</span>
                            </a>

                            <div class="float-right">
                                <form class="form-inline my-2 my-lg-0">
                                    <input name="nama_lengkap" class="form-control mr-sm-2 " type="search" placeholder="Search Name" aria-label="Search">
                                    <input name="divisi" class="form-control mr-sm-2" type="search" placeholder="Search Divisi" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0 btn-sm" type="submit">
                                    <i class="fas fa-search"></i></button>
                                </form> 
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nik Karyawan</th>
                                        <th>Nama Karyawan</th>
                                        <th>Divisi</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cuti as $c)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td><a href="/karyawan/profile/{{$c->nik_karyawan}}">{{ $c->nik_karyawan }}</a></td>
                                            <td>{{ $c->nama_karyawan }}</td>
                                            <td>{{ $c->divisi }}</td>
                                            <td>
                                                <?php
                                                if ($c->status == 'Menunggu') {
                                                    echo '<button class="btn btn-secondary btn-sm">'. $c->status .'</button>'; // Tombol abu-abu
                                                } elseif ($c->status == 'Disetujui') {
                                                    echo '<button class="btn btn-success btn-sm">' . $c->status . '</button>'; // Tombol hijau
                                                } elseif ($c->status == 'Ditolak' ) {
                                                    echo '<button class="btn btn-danger btn-sm">' . $c->status . '</button>'; // Tombol merah
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="/cuti/{{$c->id}}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                            </td> 
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        @if ($cuti instanceof \Illuminate\Pagination\LengthAwarePaginator && $cuti->hasPages())
                            <div class="row">
                                <div class="col-sm-6">
                                    <span>
                                        <div class="dataTables_info ml-3" role="status" aria-live="polite">Showing {{ $cuti->firstItem() }} to {{ $cuti->lastItem() }} of {{ $cuti->total() }} entries</div>
                                    </span>
                                </div>
                                <div class="col-sm-6">
                                    <nav class="float-right">
                                        <ul class="pagination mr-3">
                                            @if ($cuti->onFirstPage())
                                                <li class="disabled page-item">
                                                    <a class="page-link" href="#">Previous</a>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $cuti->previousPageUrl() }}">Previous</a>
                                                </li>
                                            @endif

                                            <!-- Added number for pagination -->
                                            @foreach(range(1, $cuti->lastPage()) as $page)
                                                <li class="page-item{{ $page == $cuti->currentPage() ? ' active' : '' }}">
                                                    <a class="page-link" href="{{ $cuti->url($page) }}">{{ $page }}</a>
                                                </li>
                                            @endforeach

                                            @if ($cuti->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $cuti->nextPageUrl() }}">Next</a>
                                                </li>
                                            @else
                                                <li class="disabled page-item">
                                                    <a class="page-link" href="#">Next</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@stop