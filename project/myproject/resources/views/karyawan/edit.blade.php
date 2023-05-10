@extends('layouts.master')

@section('karyawan')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Form Edit</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                
                                <a href="/karyawan">
                                    <button type="button" class="btn-toggle lnr lnr-cross text-dark"></button>
                                </a>
                               
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="/karyawan/{{$karyawan->id}}/update" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id"> <br/>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Role</label>
                                        <select name="role" class="form-control" autocomplete="off"value="{{$karyawan->role}}">
                                            <option value="Staff" @if($karyawan->role == 'Staff') selected @endif>Staff</option>
                                            <option value="Admin" @if($karyawan->role == 'Admin') selected @endif>Admin</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Nik</label>
                                        <input name="nik" type="text" class="form-control" autocomplete="off" value="{{$karyawan->nik}}">
                                    </div>

                                </div>

                                <div class="form-row">
                                    
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Nama Lengkap</label>
                                        <input name="nama_lengkap" type="text" class="form-control" autocomplete="off" value="{{$karyawan->nama_lengkap}}" >
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Nama Panggilan</label>
                                        <input name="nama_panggilan" type="text" class="form-control" autocomplete="off" value="{{$karyawan->nama_panggilan}}" >
                                    </div>

                                </div>
                                
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Tempat Lahir</label>
                                        <input name="tempat_lahir" type="text" class="form-control" autocomplete="off" value="{{$karyawan->tempat_lahir}}">
                                    </div>
    
                                    <div class="form-group col-md-6">
                                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                                        <input name="tanggal" type="date" class="form-control" autocomplete="off" value="{{$karyawan->tanggal}}">
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Agama</label>
                                        <select name="agama" class="form-control" autocomplete="off" value="{{$karyawan->agama}}">
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Hindu">Hindu</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Kong Hu Cu">Kong Hu Cu</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Golongan Darah</label>
                                        <select name="golongan_darah" class="form-control" autocomplete="off"value="{{$karyawan->golongan_darah}}">
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control" autocomplete="off"value="{{$karyawan->jenis_kelamin}}">
                                            <option value="Laki-Laki" @if($karyawan->jenis_kelamin == 'Laki-Laki') selected @endif>Laki-Laki</option>
                                            <option value="Perempuan" @if($karyawan->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-group col-md-4">
                                        <label>Status</label>
                                        <select name="status" class="form-control" autocomplete="off"value="{{$karyawan->status}}">
                                            <option value="Menikah"  @if($karyawan->status == 'Menikah') selected @endif>Menikah</option>
                                            <option value="Belum Menikah" @if($karyawan->status == 'Belum Menikah') selected @endif>Belum Menikah</option>
                                        </select>
                                    </div>
                                   
                                    <div class="form-group col-md-4">
                                        <label>Jumlah Anak</label>
                                        <input name="jumlah_anak" type="number" class="form-control" autocomplete="off" value="{{$karyawan->jumlah_anak}}">
                                        <span class="text-black">
                                            <h6 class="text-sm fas fa-exclamation-circle fa-xs"> Isi 0 jika tidak ada</h6>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Nik KTP</label>
                                        <input name="nik_ktp" type="text" class="form-control" autocomplete="off"value="{{$karyawan->nik_ktp}}">
                                        <span class="text-black">
                                            <h6 class="text-sm fas fa-exclamation-circle fa-xs">
                                                NIK KTP tidak boleh sama
                                            </h6>
                                        </span>
                                    </div>
    
                                    <div class="form-group col-md-6">
                                        <label>No NPWP</label>
                                        <input name="no_npwp" type="text" class="form-control" autocomplete="off"value="{{$karyawan->no_npwp}}">
                                        <span class="text-black">
                                            <h6 class="text-sm fas fa-exclamation-circle fa-xs">
                                                NIK NPWP tidak boleh sama
                                            </h6>
                                        </span>
                                    </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Pendidikan</label>
                                        <select name="pendidikan" class="form-control" autocomplete="off"value="{{$karyawan->pendidikan}}">
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

                                    <div class="form-group col-md-6">
                                        <label>Divisi</label>
                                        <select name="divisi" class="form-control" autocomplete="off">
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
                                </div>
                                
                                <div class="form-row">

                                    <div class="form-group col-md-6">
                                        <label>Email Pribadi</label>
                                        <input name="email" type="text" class="form-control" autocomplete="off"value="{{$karyawan->email}}">
                                        <span class="text-black">
                                            <h6 class="text-sm fas fa-exclamation-circle fa-xs"> Contoh: Bino@gmail.com</h6>
                                        </span>
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label>Email Kantor</label>
                                        <input name="email_kantor" type="text" class="form-control" autocomplete="off"value="{{$karyawan->email_kantor}}">
                                        <span class="text-black">
                                            <h6 class="text-sm fas fa-exclamation-circle fa-xs"> Contoh: Bino@binokular.net</h6>
                                        </span>
                                    </div>

                                </div>
                               
                                <div class="from-row">
                                   <div class="form-group col-md-4">
                                       <label>Skype</label>
                                       <input name="skype" type="text" class="form-control" autocomplete="off" value="{{$karyawan->skype}}">
                                   </div>
   
                                   <div class="form-group col-md-4">
                                       <label>No HP</label>
                                       <input name="nomer_telepon" type="text" class="form-control" autocomplete="off" value="{{$karyawan->nomer_telepon}}">
                                   </div>
                                   <div class="form-group col-md-4">
                                       <label>Lokasi Kantor</label>
                                       <select name="lokasi_kantor" class="form-control" value="{{$karyawan->lokasi_kantor}}">
                                           <option value="Jakarta">Jakarta</option>
                                           <option value="Jogja">Jogja</option>
                                       </select>
                                   </div> 
                               </div>
                               
                               <div class="form-row">
                                   <div class="form-group col-md-12">
                                       <label>Alamat</label>
                                       <input name="alamat" type="text" class="form-control" autocomplete="off"value="{{$karyawan->alamat}}">
                                   </div>
                               </div>

                               <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label>Avatar</label>
                                        <input type="file" name="avatar" class="form-control" value="{{$karyawan->avatar}}">
                                    </div> 

                                    <div class="form-group col-md-4">
                                        <label>KTP</label>
                                        <input type="file" name="ktp" class="form-control">
                                    </div> 

                                    <div class="form-group col-md-4">
                                        <label>NPWP</label>
                                        <input type="file" name="npwp" class="form-control"> 
                                    </div> 
                               </div>
                                
                                <div class="form-row col-md-12">
                                    <div class="modal-footer">
                                        <a href="/karyawan">
                                            <button type="button" class="btn btn-danger">Close</button>
                                        </a>
                                        <button type="submit" class="btn btn-warning">update</button>
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
@stop