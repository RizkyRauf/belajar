@extends('layouts.master')

@section('cuti1')

<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- alert -->
                        <div class="row">
                            <div class="col-12">
                                <!-- alert success -->
                                @if(session('sukses'))
                                    <div class="alert alert-success" role="alert">
                                        {{session('sukses')}}
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{session('error')}}
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
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Form Edit</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                
                                <a href="/cuti">
                                    <button type="button" class="btn-toggle lnr lnr-cross text-dark"></button>
                                </a>
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="/cuti/{{$cuti->id}}/update" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id"> <br/>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>nik_karyawan</label>
                                        <input type="text" class="form-control" name="nik_karyawan" value="{{$cuti->nik_karyawan}}" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>nama_karyawan</label>
                                        <input type="text" class="form-control" name="nama_karyawan" value="{{$cuti->nama_karyawan}}" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>divisi</label>
                                        <input type="text" class="form-control" name="divisi" value="{{$cuti->divisi}}" readonly>
                                    </div>
                                </div>

                                <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label>tanggal_mulai</label>
                                        <input type="text" class="form-control" name="tanggal_mulai" value="{{$cuti->tanggal_mulai}}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>tanggal_selesai</label>
                                        <input type="text" class="form-control" name="tanggal_selesai" value="{{$cuti->tanggal_selesai}}" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>status</label>
                                        <select name="status" class="form-control" autocomplete="off" value="{{$cuti->status}}">
                                            <option value="Menunggu" @if($cuti->status == 'Menunggu') selected @endif>Menunggu</option>
                                            <option value="Disetujui" @if($cuti->status == 'Disetujui') selected @endif>Disetujui</option>
                                            <option value="Ditolak" @if($cuti->status == 'Ditolak') selected @endif>Ditolak</option>
                                        </select>
                                    </div>  
                                    <div class="form-group col-md-4">
                                        <label>sisa_cuti</label>
                                        <input type="text" class="form-control" name="sisa_cuti" value="{{$cuti->sisa_cuti}}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label>keterangan</label>
                                        <textarea class="form-control" name="keterangan">{{$cuti->keterangan}}</textarea>
                                    </div>
                                </div>

                                <div class="form-row col-md-12">
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('cuti')
<div class="content-wrapper">
    <section class="content-header">
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
                    <h1>Form Edit Cuti</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Form Edit Cuti</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card card-outline card-info">
                        <div class="card-header">
                            <div class="row">
                                <!-- <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#ModalImport">
                                    <i class="fas fa-file-upload"></i><span> Import File</span>
                                </button> -->
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="/cuti/{{$cuti->id}}/update" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id"> <br/>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>nik_karyawan</label>
                                        <input type="text" class="form-control" name="nik_karyawan" value="{{$cuti->nik_karyawan}}" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>nama_karyawan</label>
                                        <input type="text" class="form-control" name="nama_karyawan" value="{{$cuti->nama_karyawan}}" readonly>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>divisi</label>
                                        <input type="text" class="form-control" name="divisi" value="{{$cuti->divisi}}" readonly>
                                    </div>
                                </div>

                                <div class="form-row">    
                                    <div class="form-group col-md-6">
                                        <label>tanggal_mulai</label>
                                        <input type="text" class="form-control" name="tanggal_mulai" value="{{$cuti->tanggal_mulai}}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>tanggal_selesai</label>
                                        <input type="text" class="form-control" name="tanggal_selesai" value="{{$cuti->tanggal_selesai}}" readonly>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>status</label>
                                        <select name="status" class="form-control" autocomplete="off" value="{{$cuti->status}}">
                                            <option value="Menunggu" @if($cuti->status == 'Menunggu') selected @endif>Menunggu</option>
                                            <option value="Disetujui" @if($cuti->status == 'Disetujui') selected @endif>Disetujui</option>
                                            <option value="Ditolak" @if($cuti->status == 'Ditolak') selected @endif>Ditolak</option>
                                        </select>
                                    </div>  
                                    <div class="form-group col-md-4">
                                        <label>sisa_cuti</label>
                                        <input type="text" class="form-control" name="sisa_cuti" value="{{$cuti->sisa_cuti}}" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="form-group col-md-12">
                                        <label>keterangan</label>
                                        <textarea class="form-control" name="keterangan">{{$cuti->keterangan}}</textarea>
                                    </div>
                                </div>

                                <div class="form-row col-md-12">
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">update</button>
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