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
                    <h1>Form Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Form Karyawan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card card-outline card-info">
                        <div class="card-header">
                            <div class="row">
                                <button type="button" class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#ModalImport">
                                    <i class="fas fa-file-upload"></i><span> Import File</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2">
                                    <label for="role">Role Karyawan</label>
                                    <select name="role" id="role" class="form-control" autocomplete="off">
                                        <option value="Staff">Staff</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="nik">Nik Karyawan</label>
                                    <input type="text" class="form-control" id="nama" name="nik" placeholder=".....">
                                </div>
                                <div class="col-4">
                                    <label for="nama">Nama Karyawan</label>
                                    <input type="text" class="form-control" id="nama" name="nama_lengkap" placeholder=".....">
                                </div>
                                <div class="col-4">
                                    <label for="nama">Panggilan Karyawan</label>
                                    <input type="text" class="form-control" id="nama" name="nama_panggilan" placeholder=".....">
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-3">
                                    <label for="lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="lahir" name="tempat_lahir" placeholder=".....">
                                </div>
                                <div class="col-3 ml-4">
                                    <label for="tanggal">Tanggal Lahir</label>
                                    <input type="date" class="form-control col-10" id="tanggal" name="tanggal">
                                </div>
                                <div class="col-3">
                                    <label for="kelamin">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control col-10" autocomplete="off">
                                        <option selected>Pilih...</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-2">
                                    <label for="agama">Agama</label>
                                    <select name="agama" class="form-control" autocomplete="off" id="agama">
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
                                    <select name="pendidikan" id="pendidikan" class="form-control" autocomplete="off">
                                        <option selected>Pilih...</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="SMK">SMK</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                                <div class="col-3 ml-4">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control col-10" autocomplete="off">
                                        <option selected>Pilih...</option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="anak">Jumlah anak</label>
                                    <input type="text" class="form-control col-10" id="anak" name="jumlah_anak" placeholder=".....">
                                </div>
                                <div class="col-2 ">
                                    <label for="darah">Golongan Darah</label>
                                    <select name="golongan_darah" class="form-control" autocomplete="off">
                                        <option selected>Pilih...</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="AB">AB</option>
                                        <option value="O">O</option>
                                    </select>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-5 {{ $errors->has('nik_ktp') ? ' has-error' : '' }}">
                                    <label>Nik KTP</label>
                                    <input name="nik_ktp" type="text" class="form-control col-10" autocomplete="off" placeholder="......." value="{{old('nik_ktp')}}">
                                    @if($errors->has('nik_ktp'))
                                        <span class="help-block">{{ $errors->first('nik_ktp')}}</span>
                                    @endif
                                </div>

                                <div class="col-5 {{ $errors->has('no_npwp') ? ' has-error' : '' }}">
                                    <label>Nik NPWP</label>
                                    <input name="no_npwp" type="text" class="form-control" autocomplete="off" placeholder="......" value="{{old('no_npwp')}}">
                                    @if($errors->has('no_npwp'))
                                        <span class="help-block">{{ $errors->first('no_npwp')}}</span>
                                    @endif
                                </div>
                            </div>
                            <br>

                            <div class="row">

                                <div class="col-4">
                                    <label for="kantor"> Lokasi Kantor</label>
                                    <select name="lokasi_kantor" class="form-control col-10" >
                                        <option selected>Pilih...</option>
                                        <option value="Jakarta">Jakarta</option>
                                        <option value="Jogja">Jogja</option>
                                    </select>
                                </div>

                                <div class="col-4 ml-mr-4">
                                    <label for="divisi">Divisi</label>
                                    <select name="divisi" class="form-control col-11" autocomplete="off" >
                                        <option selected>Pilih...</option>
                                        <option value="VP Operation-Office Support">VP Operation-Office Support</option>
                                        <option value="General Manager">General Manager</option>
                                        <option value="Core Engine">Core Engine</option>
                                        <option value="Product Service - Bino Premium (Editor)">Product Service - Bino Premium (Editor)</option>
                                        <option value="Product Service - Analis Bino Premium">Product Service - Analis Bino Premium</option>
                                        <option value="Product Service - Uploader Online">Product Service - Uploader Online</option>
                                        <option value="Product Service - Uploader Cetak">Product Service - Uploader Cetak</option>
                                        <option value="Product Service - Uploader TV">Product Service - Uploader TV</option>
                                        <option value="Product Service - Socindex">Product Service - Socindex</option>
                                        <option value="Product Service - Newstensity">Product Service - Newstensity</option>
                                        <option value="Marketing Research">Marketing Research</option>
                                        <option value="Client Service">Client Service</option>
                                        <option value="Infogram Datalab">Infogram Datalab</option>
                                        <option value="Marketing">Marketing</option>
                                        <option value="Office Support">Office Support</option>
                                    </select>
                                </div>

                                <div class="col-4 ml-mr-4">
                                    <label for="telpon">No Telepon</label>
                                    <div class="input-group col-10">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">+62</span>
                                        </div>
                                            <input type="text" class="form-control" placeholder="....." name="nomer_telepon">
                                    </div>
                                </div>
                                
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-3 ml-mr-4">
                                    <label for="skype">Skype</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">@</span>
                                        </div>
                                            <input type="text" class="form-control" placeholder="....." name="skype">
                                    </div>
                                </div>

                                <div class="col-4 ml-4">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" class="form-control" autocomplete="off" placeholder=".......">
                                </div>

                                <div class="col-4 ml-4">
                                    <label for="email">Email Kantor</label>
                                    <input name="email_kantor" type="email" class="form-control" autocomplete="off" placeholder=".......">
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-4">
                                    <label>Avatar</label>
                                    <input type="file" name="avatar" class="form-control">
                                </div> 

                                <div class="col-4">
                                    <label>KTP</label>
                                    <input type="file" name="ktp" class="form-control">
                                </div> 

                                <div class="col-4">
                                    <label>NPWP</label>
                                    <input type="file" name="npwp" class="form-control"> 
                                </div> 
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-12">
                                    <label>Alamat</label>
                                    <textarea name="alamat" type="text" class="form-control" autocomplete="off" placeholder="Isi alamat anda"></textarea>
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success float-right">submit</button>
                                </div>
                            </div>

                        </div>
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