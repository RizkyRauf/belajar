@extends('layouts.master')

@section('karyawan')
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
                    <h1>Edit Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Edit Karyawan</li>
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

                        </div>
                        
                        <div class="card-body">
                            <form action="/karyawan/{{$karyawan->id}}/update" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-2">
                                        <label for="role">Role Karyawan</label>
                                        <select name="role" class="form-control" autocomplete="off" value="{{$karyawan->role}}">
                                            <option value="Staff" @if($karyawan->role == 'Staff') selected @endif>Staff</option>
                                            <option value="Admin" @if($karyawan->role == 'Admin') selected @endif>Admin</option>
                                        </select>
                                    </div>
                                    <div class="col-2">
                                        <label for="exampleInputEmail1">Nik</label>
                                        <input name="nik" type="text" class="form-control" autocomplete="off" value="{{$karyawan->nik}}">
                                    </div>
                                    <div class="col-4">
                                        <label for="nama">Nama Karyawan</label>
                                        <input name="nama_lengkap" type="text" class="form-control" autocomplete="off" value="{{$karyawan->nama_lengkap}}">
                                    </div>
                                    <div class="col-4">
                                        <label for="panggilan">Panggilan Karyawan</label>
                                        <input name="nama_panggilan" type="text" class="form-control col-10" value="{{$karyawan->nama_panggilan}}">
                                    </div>
                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-3">
                                        <label for="lahir">Tempat Lahir</label>
                                        <input name="tempat_lahir" type="text" class="form-control col-10" value="{{$karyawan->tempat_lahir}}">
                                    </div>
                                    <div class="col-3 ml-mr-3">
                                        <label for="status">Tanggal Lahir</label>
                                        <input name="tanggal" type="date" class="form-control col-10" value="{{$karyawan->tanggal}}">
                                    </div>
                                    <div class="col-3 ml-mr-3">
                                        <label for="kelamin">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control col-10" autocomplete="off"value="{{$karyawan->jenis_kelamin}}">
                                            <option value="Laki-Laki" @if($karyawan->jenis_kelamin == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                            <option value="Perempuan" @if($karyawan->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-3">
                                        <label for="agama">Agama</label>
                                        <select name="agama" class="form-control col-9" autocomplete="off" value="{{$karyawan->agama}}">
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Kong Hu Cu">Kong Hu Cu</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-3">
                                        <label for="pendidikan">Pendidikan</label>
                                        <select name="pendidikan" class="form-control col-10" autocomplete="off"value="{{$karyawan->pendidikan}}">
                                            <option value="SD" @if($karyawan->pendidikan == 'SD') selected @endif>SD</option>
                                            <option value="SMP" @if($karyawan->pendidikan == 'SMP') selected @endif>SMP</option>
                                            <option value="SMA" @if($karyawan->pendidikan == 'SMA') selected @endif>SMA</option>
                                            <option value="SMK" @if($karyawan->pendidikan == 'SMK') selected @endif>SMK</option>
                                            <option value="D3" @if($karyawan->pendidikan == 'D3') selected @endif>D3</option>
                                            <option value="S1" @if($karyawan->pendidikan == 'S1') selected @endif>S1</option>
                                            <option value="S2" @if($karyawan->pendidikan == 'S2') selected @endif>S2</option>
                                            <option value="S3" @if($karyawan->pendidikan == 'S3') selected @endif>S3</option>
                                        </select>
                                    </div>
                                    <div class="col-3 ml-mr-3">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control col-10" value="{{$karyawan->status}}">
                                            <option value="Menikah">Menikah</option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                        </select>
                                    </div>
                                    <div class="col-3 ml-mr-3">
                                        <label for="anak">Jumlah anak</label>
                                        <input type="text" class="form-control col-10" id="anak" name="jumlah_anak" value="{{$karyawan->jumlah_anak}}">
                                    </div>
                                    <div class="col-3 ">
                                        <label for="darah">Golongan Darah</label>
                                        <select name="golongan_darah" class="form-control col-9" autocomplete="off" value="{{$karyawan->golongan_darah}}">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                
                                <div class="row">
                                    <div class="col-4">
                                        <label for="kantor"> Lokasi Kantor</label>
                                        <select name="lokasi_kantor" class="form-control col-10" value="{{$karyawan->lokasi_kantor}}">
                                            <option value="Jakarta">Jakarta</option>
                                            <option value="Jogja">Jogja</option>
                                        </select>
                                    </div>

                                    <div class="col-4 ml-mr-4">
                                        <label for="divisi">Divisi</label>
                                        <select name="divisi" class="form-control col-11" autocomplete="off" value="divisi">
                                        <option value="VP Operation-Office Support" @if($karyawan->divisi == 'VP Operation-Office Support') selected @endif>VP Operation-Office Support</option>
                                            <option value="General Manager" @if($karyawan->divisi == 'General Manager') selected @endif>General Manager</option>
                                            <option value="Core Engine" @if($karyawan->divisi == 'Core Engine') selected @endif>Core Engine</option>
                                            <option value="Product Service - Bino Premium (Editor)" @if($karyawan->divisi == 'Product Service - Bino Premium (Editor)') selected @endif>Product Service - Bino Premium (Editor)</option>
                                            <option value="Product Service - Analis Bino Premium" @if($karyawan->divisi == 'Product Service - Analis Bino Premium') selected @endif>Product Service - Analis Bino Premium</option>
                                            <option value="Product Service - Uploader Online" @if($karyawan->divisi == 'Product Service - Uploader Online') selected @endif>Product Service - Uploader Online</option>
                                            <option value="Product Service - Uploader Cetak" @if($karyawan->divisi == 'Product Service - Uploader Cetak') selected @endif>Product Service - Uploader Cetak</option>
                                            <option value="Product Service - Uploader TV" @if($karyawan->divisi == 'Product Service - Uploader TV') selected @endif>Product Service - Uploader TV</option>
                                            <option value="Product Service - Socindex" @if($karyawan->divisi == 'Product Service - Socindex') selected @endif>Product Service - Socindex</option>
                                            <option value="Product Service - Newstensity" @if($karyawan->divisi == 'Product Service - Newstensity') selected @endif>Product Service - Newstensity</option>
                                            <option value="Marketing Research" @if($karyawan->divisi == 'Marketing Research') selected @endif>Marketing Research</option>
                                            <option value="Client Service" @if($karyawan->divisi == 'Client Service') selected @endif>Client Service</option>
                                            <option value="Infogram Datalab" @if($karyawan->divisi == 'Infogram Datalab') selected @endif>Infogram Datalab</option>
                                            <option value="Marketing" @if($karyawan->divisi == 'Marketing') selected @endif>Marketing</option>
                                            <option value="Office Support" @if($karyawan->divisi == 'Office Support') selected @endif>Office Support</option>
                                        </select>
                                    </div>

                                    <div class="col-4 ml-mr-4">
                                        <label for="telpon">No Telepon</label>
                                        <div class="input-group col-10">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">+62</span>
                                            </div>
                                                <input name="nomer_telepon" type="text" class="form-control" autocomplete="off" value="{{$karyawan->nomer_telepon}}">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    
                                    <div class="col-4 ml-mr-4">
                                        <label for="email">Email</label>
                                        <input name="email" type="text" class="form-control col-10" autocomplete="off"value="{{$karyawan->email}}">
                                    </div>

                                    <div class="col-4 ml-mr-4">
                                        <label for="email">Email Kantor</label>
                                        <input name="email_kantor" type="text" class="form-control col-11" autocomplete="off"value="{{$karyawan->email_kantor}}">
                                    </div>

                                    <div class="col-4">
                                        <label for="skype">Skype</label>
                                        <div class="input-group col-10">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">@</span>
                                            </div>
                                                <input name="skype" type="text" class="form-control" autocomplete="off" value="{{$karyawan->skype}}">
                                        </div>
                                    </div>

                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <label>Nik KTP</label>
                                        <input name="nik_ktp" type="text" class="form-control col-11" autocomplete="off"value="{{$karyawan->nik_ktp}}">
                                    </div>
                                    <div class="col-4">
                                        <label>Nik NPWP</label>
                                        <input name="no_npwp" type="text" class="form-control col-11" autocomplete="off"value="{{$karyawan->no_npwp}}">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-4">
                                        <label>KTP</label>
                                        <input type="file" name="ktp" class="form-control col-11">
                                    </div> 

                                    <div class="col-4">
                                        <label>NPWP</label>
                                        <input type="file" name="npwp" class="form-control col-10"> 
                                    </div> 

                                    <div class="col-4">
                                        <label>Avatar</label>
                                        <input type="file" name="avatar" class="form-control col-10">
                                    </div> 

                                </div>
                                <br>

                                <div class="row">
                                    <div class="col-12">
                                        <label>Alamat</label>
                                        <textarea name="alamat" type="text" class="form-control" autocomplete="off" placeholder="Isi alamat anda">{{$karyawan->alamat}}</textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-success float-right">submit</button>
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