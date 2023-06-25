@extends('layouts.master')

@section('karyawan')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Karyawan Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Karyawan Profile</li>
                    </ol>
                </div>
            </div>
        </div>
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
                <div class="col-md-3">
                <!-- Profile Image -->
                    <div class="card card-body card-primary card-outline">
                        <div class="text-center">
                            <img src="{{asset('images/'.$karyawan->avatar)}}" width="220" height="300" class="img-rounded">
                            <hr>
                            <a href="#" class="btn btn-primary"><b>{{$karyawan->nama_lengkap }}</b></a>
                        </div>
                    </div>
                </div>

                <!-- content profile -->
                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="row">
                                    <div class="col-3">
                                        <label for="nama">Nik Karyawan</label>
                                        <input type="text" class="form-control" value="{{$karyawan->nik }}" readonly>
                                    </div>
                                    <div class="col-4 ml-3 ">
                                        <label for="nama">Divisi</label>
                                        <input type="text" class="form-control" value="{{$karyawan->divisi }}" readonly>
                                    </div>
                                    <div class="col-4 ml-3">
                                        <label for="nama">Nama Panggilan</label>
                                        <input type="text" class="form-control" value="{{$karyawan->nama_panggilan }}" readonly>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-2">
                                        <label for="lahir">Tempat Lahir</label>
                                        <input type="text" class="form-control" value="{{$karyawan->tempat_lahir }}" readonly>
                                    </div>
                                    <div class="col-3 ml-4">
                                        <label for="tanggal">Tanggal Lahir</label>
                                        <input type="date" class="form-control col-11" value="{{$karyawan->tanggal }}" readonly>
                                    </div>
                                    <div class="col-3 ml-2">
                                        <label for="jenis">Jenis Kelamin</label>
                                        <input type="text" class="form-control col-11" value="{{$karyawan->jenis_kelamin }}" readonly>
                                    </div>
                                    <div class="col-3 ml-2">
                                        <label for="golongan">Agama</label>
                                        <input type="text" class="form-control col-11" value="{{$karyawan->agama }}" readonly>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-2">
                                        <label for="pendidikan">Pendidikan</label>
                                        <input type="text" class="form-control" value="{{$karyawan->pendidikan }}" readonly>
                                    </div>
                                    <div class="col-3 ml-4">
                                        <label for="status">Status</label>
                                        <input type="text" class="form-control col-11" value="{{$karyawan->status }}" readonly>
                                    </div>
                                    <div class="col-3 ml-2">
                                        <label for="anak">Jumlah Anak</label>
                                        <input type="text" class="form-control col-11" value="{{$karyawan->jumlah_anak }}" readonly>
                                    </div>
                                    <div class="col-3 ml-2">
                                        <label for="golongan">Golongan Darah</label>
                                        <input type="text" class="form-control col-11" value="{{$karyawan->golongan_darah }}" readonly>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-2">
                                        <label for="alamat">Lokasi Kantor</label>
                                        <input type="text" class="form-control" value="{{$karyawan->lokasi_kantor }}" readonly>
                                    </div>
                                    
                                    <div class="col-3 ml-4">
                                        <label for="telpon">No Telepon</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">+62</span>
                                            </div>
                                                <input type="text" class="form-control" value="{{$karyawan->nomer_telepon }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-3 ml-2">
                                        <label for="telpon">Skype</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">@</span>
                                            </div>
                                                <input type="text" class="form-control" value="{{$karyawan->skype }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-3 ml-2">
                                        <label for="golongan">Cuti</label>
                                        <input type="text" class="form-control col-11" value="{{$karyawan->cuti_karyawan }}" readonly>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="alamat">Nik KTP</label>
                                        <input type="text" class="form-control col-10" value="{{$karyawan->nik_ktp }}" readonly>
                                    </div>
                                    <div class="col-5 ml-4">
                                        <label for="alamat">Nik NPWP</label>
                                        <input type="text" class="form-control " value="{{$karyawan->no_npwp }}" readonly>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-6">
                                        <label for="pribadi">Email Pribadi</label>
                                        <input type="text" class="form-control col-10" value="{{$karyawan->email }}" readonly>
                                    </div>
                                    <div class="col-5 ml-4">
                                        <label for="kantor">Email Kantor</label>
                                        <input type="text" class="form-control " value="{{$karyawan->email_kantor }}" readonly>
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-12">
                                        <label for="alamat">Alamat</label>
                                        <textarea type="text" class="form-control col-12" value="" readonly>{{$karyawan->alamat }}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>

</div>
@stop