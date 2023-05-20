@extends('layouts.master')

@section('karyawan')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">

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

            <!-- Konten atas table -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <p class="demo-button">
                                    
                                    <button type="button" class="btn btn-default btn-toastr" data-toggle="modal" data-target="#ModalTambah">
                                        <i class="fas fa-plus"></i><span> Karyawan</span>
                                    </button>

                                    <button type="button" class="btn btn-default btn-toastr" data-toggle="modal" data-target="#ModalImport">
                                        <i class="fas fa-file-upload"></i><span> Import File</span>
                                    </button>

                                    <button type="button" class="btn btn-default btn-toastr" data-toggle="modal" data-target="#exampleModal">
                                        <i class="fas fa-file-download"></i><span> Download File</span>
                                    </button>
            

                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- end Konten atas table -->

            <!-- Konten table -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">

                                <h3>Table karyawan</h3>

                                <div class="right">
                                    <form class="form-inline my-2 my-lg-0">
                                        <input name="nama_lengkap" class="form-control mr-sm-2" type="search" placeholder="Search Name" aria-label="Search">
                                        <input name="lokasi_kantor" class="form-control mr-sm-2" type="search" placeholder="Search Kantor" aria-label="Search">
                                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                                        <i class="fas fa-search"></i></button>
                                    </form> 
                                </div>

                            </div>
                            <div class="panel-body no-padding">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nik Karyawan</th>
                                            <th>Nama Lengkap</th>
                                            <th>Divisi</th>
                                            <th>No Telpon</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        @foreach($data_karyawan as $p)
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td>{{ $p->nik }}</td>
                                                <td><a href="/karyawan/profile/{{$p->id}}">{{ $p->nama_lengkap }}</a></td>
                                                <td>{{ $p->divisi }}</td>
                                                <td><span>+62</span>{{ $p->nomer_telepon}}</td>
                                                <td>{{ $p->alamat }}</td>
                                                <td>
                                                    <a href="/karyawan/{{$p->id}}/edit" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                    <a href="/karyawan/{{$p->id}}/delete" onclick="return confirm('yakin mau di hapus?')" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td> 
                                            </tr>
                                        <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Pagination -->
                                    @if ($data_karyawan instanceof \Illuminate\Pagination\LengthAwarePaginator && $data_karyawan->hasPages())
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <span>
                                                    <div class="dataTables_info" role="status" aria-live="polite">Showing {{ $data_karyawan->firstItem() }} to {{ $data_karyawan->lastItem() }} of {{ $data_karyawan->total() }} entries</div>
                                                </span>
                                            </div>
                                            <div class="col-sm-6">
                                                <nav class="float-right">
                                                    <ul class="pagination">
                                                        @if ($data_karyawan->onFirstPage())
                                                        <li class="disabled page-item"><a class="page-link" href="#">Previous</a></li>
                                                        @else
                                                        <li class="page-item"><a class="page-link" href="{{ $data_karyawan->previousPageUrl() }}">Previous</a></li>
                                                        @endif
                                                        @if ($data_karyawan->hasMorePages())
                                                        <li class="page-item"><a class="page-link" href="{{ $data_karyawan->nextPageUrl() }}">Next</a></li>
                                                        @else
                                                        <li class="disabled page-item"><a class="page-link" href="#">Next</a></li>
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
            <!-- end Konten table -->
        </div>
    </div>
</div>

<!-- Modal Tambah -->
    <div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="ModalTambah" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalTambah">Form Tambah Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <div class="modal-body">
                    <form action="/karyawan/create" method="POST" enctype="multipart/form-data">
                        @csrf                        
                        <input type="hidden" name="id">
                        <input type="hidden" name="cuti_karyawan">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlSelect1">Role</label>
                                <select name="role" class="form-control" autocomplete="off">
                                    <option selected>Pilih...</option>
                                    <option value="Staff">Staff</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
        
                            <div class="form-group col-md-6 {{ $errors->has('nik') ? ' has-error' : '' }}">
                                <label for="nik">Nik</label>
                                <input type="text" name="nik" class="form-control" placeholder="Nik...." value="{{old('nik')}}">
                                @if($errors->has('nik'))
                                    <span class="help-block">{{ $errors->first('nik') }}</span>
                                @endif
                            </div>
                        </div>
                    
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Lengkap</label>
                                <input name="nama_lengkap" type="text" class="form-control" autocomplete="off" placeholder="Nama Lengkap....">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama Panggilan</label>
                                <input name="nama_panggilan" type="text" class="form-control" autocomplete="off" placeholder="Nama Panggilan...." >
                            </div>
                        </div>
        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <input name="tempat_lahir" type="text" class="form-control" autocomplete="off" placeholder="Tempat Lahir....">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <input type="date" id="tanggal" name="tanggal" class="form-control" autocomplete="off" placeholder="Tanggal Lahir...." value="{{ date('Y-m-d') }}">
                            </div>  
                        </div>
        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Status</label>
                                <select name="status" class="form-control" autocomplete="off">
                                    <option selected>Pilih...</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                </select>
                            </div>
        
                            <div class="form-group col-md-6">
                                <label>Jumlah Anak</label>
                                <input name="jumlah_anak" type="text" class="form-control" autocomplete="off" placeholder="Jumlah anak....">
                                <span class="text-black">
                                    <h6 class="text-sm fas fa-exclamation-circle fa-xs"> Isi 0 atau '-' jika tidak ada</h6>
                                </span>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlSelect1">Agama</label>
                                <select name="agama" class="form-control" autocomplete="off">
                                    <option selected>Pilih...</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Kong Hu Cu">Kong Hu Cu</option>
                                </select>
                            </div>
        
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlSelect1">Golongan Darah</label>
                                <select name="golongan_darah" class="form-control" autocomplete="off">
                                    <option selected>Pilih...</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
        
                            <div class="form-group col-md-4">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" autocomplete="off">
                                    <option selected>Pilih...</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
        
                        </div>
        
                        <div class="form-row">
                            <div class="form-group col-md-6 {{ $errors->has('nik_ktp') ? ' has-error' : '' }}">
                                <label>Nik KTP</label>
                                <input name="nik_ktp" type="text" class="form-control" autocomplete="off" placeholder="Nik KTP...." value="{{old('nik_ktp')}}">
                                @if($errors->has('nik_ktp'))
                                    <span class="help-block">{{ $errors->first('nik_ktp')}}</span>
                                @endif
                            </div>
        
                            <div class="form-group col-md-6 {{ $errors->has('no_npwp') ? ' has-error' : '' }}">
                                <label>Nik NPWP</label>
                                <input name="no_npwp" type="text" class="form-control" autocomplete="off" placeholder="Nik NPWP...." value="{{old('no_npwp')}}">
                                @if($errors->has('no_npwp'))
                                    <span class="help-block">{{ $errors->first('no_npwp')}}</span>
                                @endif
                            </div>
                        </div>
        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Pendidikan</label>
                                <select name="pendidikan" class="form-control" autocomplete="off">
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
        
                            <div class="form-group col-md-6">
                                <label>Divisi</label>
                                <select name="divisi" class="form-control" autocomplete="off">
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
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Email Pribadi</label>
                                <input name="email" type="email" class="form-control" autocomplete="off" placeholder="Email Pribadi...">
                                <span class="text-black">
                                    <h6 class="text-sm fas fa-exclamation-circle fa-xs"> Contoh: Bino@gmail.com</h6>
                                </span>
                            </div>
        
                            <div class="form-group col-md-6">
                                <label>Email Kantor</label>
                                <input name="email_kantor" type="text" class="form-control" autocomplete="off" placeholder="Email Bino...">
                                <span class="text-black">
                                    <h6 class="text-sm fas fa-exclamation-circle fa-xs"> Contoh: Bino@binokular.net</h6>
                                </span>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Skype</label>
                                <input name="skype" type="text" class="form-control" autocomplete="off" placeholder="Skype...">
                            </div>
        
                            <div class="form-group col-md-4">
                                <label>No HP</label>
                                <input name="nomer_telepon" type="text" class="form-control" autocomplete="off" placeholder="No HP..." >
                            </div>
        
                            <div class="form-group col-md-4">
                                <label>Lokasi Kantor</label>
                                <select name="lokasi_kantor" class="form-control" >
                                    <option selected>Pilih...</option>
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Jogja">Jogja</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label>Avatar</label>
                                <input type="file" name="avatar" class="form-control">
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

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Alamat</label>
                                <textarea name="alamat" type="text" class="form-control" autocomplete="off" placeholder="Isi alamat anda"></textarea>
                            </div>
                        </div>
                        
                        
                        <div class="form-row">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- end Tambah -->

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

<!-- Modal Export -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/karyawan/export" method="POST">
                    @csrf
                    <label>Divisi</label>
                    <select name="divisi" class="form-control" autocomplete="off">
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
                    <div class="panel panel-default"></div>
                    <label>Lokasi Kantor</label>
                    <select name="lokasi_kantor" class="form-control" autocomplete="off">
                        <option selected>Pilih...</option>
                        <option value="Jakarta">Jakarta</option>
                        <option value="Jogja">Jogja</option>
                    </select>
                    <div class="panel panel-default"></div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Export Data Karyawan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Export -->
@stop