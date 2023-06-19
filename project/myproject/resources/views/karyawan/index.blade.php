@extends('layouts.master')

@section('karyawan')
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
                    <h1>Tables Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Tables Karyawan</li>
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
                                    <input name="lokasi_kantor" class="form-control mr-sm-2" type="search" placeholder="Search Kantor" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0 btn-sm" type="submit">
                                    <i class="fas fa-search"></i></button>
                                </form> 
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nik</th>
                                    <th>Divisi</th>
                                    <th>Nama Karyawan</th>
                                    <th>Lokasi Kantor</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                                <tbody>
                                @foreach($karyawan as $data)
                                <tr>
                                    <td><a href="/karyawan/profile/{{$data->nik}}">{{ $data->nik }}</a></td>
                                    <td>{{ $data->divisi }}</td>
                                    <td>{{ $data->nama_lengkap }}</td>
                                    <td>{{ $data->lokasi_kantor }}</td>
                                    <td>
                                        <a href="/karyawan/{{$data->id}}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        <a href="/karyawan/{{$data->id}}/delete" onclick="return confirm('yakin mau di hapus?')" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td> 
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- Pagination -->
                        @if ($karyawan instanceof \Illuminate\Pagination\LengthAwarePaginator && $karyawan->hasPages())
                            <div class="row">
                                <div class="col-sm-6">
                                    <span>
                                        <div class="dataTables_info ml-3" role="status" aria-live="polite">Showing {{ $karyawan->firstItem() }} to {{ $karyawan->lastItem() }} of {{ $karyawan->total() }} entries</div>
                                    </span>
                                </div>
                                <div class="col-sm-6">
                                    <nav class="float-right">
                                        <ul class="pagination mr-3">
                                            @if ($karyawan->onFirstPage())
                                                <li class="disabled page-item">
                                                    <a class="page-link" href="#">Previous</a>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $karyawan->previousPageUrl() }}">Previous</a>
                                                </li>
                                            @endif

                                            <!-- Added number for pagination -->
                                            @foreach(range(1, $karyawan->lastPage()) as $page)
                                                <li class="page-item{{ $page == $karyawan->currentPage() ? ' active' : '' }}">
                                                    <a class="page-link" href="{{ $karyawan->url($page) }}">{{ $page }}</a>
                                                </li>
                                            @endforeach

                                            @if ($karyawan->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $karyawan->nextPageUrl() }}">Next</a>
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
                        <!-- end Pagnition -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Import -->
<div class="modal fade" id="ModalImport" tabindex="-1" role="dialog" aria-labelledby="ModalImport" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalImport">Multi Upload Data Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/karyawan/import" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="file" required>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Import -->
@stop