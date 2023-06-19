@extends('layouts.master')

@section('cuti')
<div class="content-wrapper">
    <section class="content-header">
        <!-- alert -->
        <div class="row">
            <div class="col-12">
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
                    <h1>Form Cuti</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Form Cuti</li>
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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            
                        </div>

                        <div class="card-body">
                            <form action="/form/cuti" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-4">
                                        <label for="exampleInputEmail1">Nik Karyawan</label>
                                        <input name="nik_karyawan" type="text" class="form-control" value="{{$karyawan->nik}}" readonly>
                                    </div>
                                    <div class="col-4">
                                        <label for="exampleInputEmail1">Nama Karyawan</label>
                                        <input name="nama_karyawan" type="text" class="form-control" value="{{$karyawan->nama_lengkap}}" readonly>
                                    </div>
                                    <div class="col-4">
                                        <label for="exampleInputEmail1">Divisi Karyawan</label>
                                        <input name="divisi" type="text" class="form-control" value="{{$karyawan->divisi}}" readonly>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-2 mt-3">
                                        <label for="exampleInputEmail1">Tanggal Mulai</label>
                                        <input name="tanggal_mulai" type="date" class="form-control">
                                    </div>
                                    <div class="col-2 mt-3">
                                        <label for="exampleInputEmail1">Tanggal Selesai</label>
                                        <input name="tanggal_mulai" type="date" class="form-control">
                                    </div>
                                    <div class="col-8">
                                        <label for="exampleInputEmail1">Keterangan</label>
                                        <textarea name="keterangan" type="text" class="form-control" autocomplete="off" placeholder="...."></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-info float-right">Simpan</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@stop