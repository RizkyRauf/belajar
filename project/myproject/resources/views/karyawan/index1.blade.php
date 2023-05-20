@extends('layouts.master')

@section('karyawan')


<section class="container-fluid">
    <!-- alert -->
    <div class="row">
        <div class="col-12">
            @if(session('sukses'))
                <div class="alert alert-success" role="alert">
                    {{session('sukses')}}
                </div>
            @endif

            <script>
                setTimeout(function() {
                    document.querySelector('.alert').setAttribute('hidden', true);
                }, 3000); // ganti angka 5000 dengan jumlah milidetik yang diinginkan (misalnya 3000 untuk 3 detik)
            </script>
        </div>
    </div>
    <!-- end alert -->

    <!-- desktop title -->
    <div class="row d-none d-md-flex">
        <div class="col-12 col-md-6">
            <h3 class="float-left pl-md-4">Data karyawan</h3>
        </div>
        <div class="col-12 col-md-6">
            <div class="float-right pr-md-4">
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
            <div class="float-right pr-md-4" method="GET" action="/karyawan">
                <form class="form-inline my-2 my-lg-0">
                    <input name="cari" class="form-control mr-sm-2" type="search" placeholder="Search Name" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                    <i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <!-- end desktop -->
    
    <!-- desktop table -->
    <div class="row">
        <div class="col-12">
            <div class="table-responsive d-none d-md-flex">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nik</th>
                            <th>Divisi</th>
                            <th>Nama Lengkap</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Pendidikan</th>
                            <th>No Telpon</th>
                            <th>Lokasi Kantor</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data_karyawan as $p)
                            <?php $i = 1; ?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td>{{ $p->nik }}</td>
                                <td>{{ $p->divisi }}</td>
                                <td>{{ $p->nama_lengkap }}</td>
                                <td>{{ $p->tanggal }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>{{ $p->pendidikan }}</td>
                                <td><a>+62</a>{{ $p->nomer_telepon}}</td>
                                <td>{{ $p->lokasi_kantor }}</td>
                                <td>
                                    <a href="/karyawan/{{$p->id}}/edit" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="/karyawan/{{$p->id}}/delete" onclick="return confirm('yakin mau di hapus?')" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>

                                    <!-- button views detail data keryawan menggunakan modal -->
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalViews-{{$p->id}}">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </td> 
                            </tr>
                            <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end desktop -->

    <!-- mobile title -->
    <div class="row d-md-none mt-3 ">
        <div class="col-md-12">
            <hr>
            <div class="col-md-2">
                <h3 class="float-left">Data karyawan</h3>
            </div>

            <div class="col-md-2">
                <div class="float-right">
                    <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                        <i class="fas fa-user-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- end mobile -->

    <!-- mobile table -->
    <div class="row">
        @foreach($data_karyawan as $p)
        <div class="col-6 d-md-none">
            <br>
            <div class="card">
                <div class="card-header">
                    {{ $p->divisi }}
                </div>
        
                <div class="card-body row">
                    <div class="col-12">
                        
                        <div class="card-text">
                            <i class="fa fa-user-circle"></i>
                            <span>
                            : {{ $p->nama_lengkap }}
                            </span>
                        </div>

                        <div class="card-text">
                            <i class="fa fa-calendar-alt"></i>
                            <span>
                            : {{ $p->tanggal }}
                            </span>
                        </div>

                        <div class="card-text">
                            <i class="fa fa-graduation-cap"></i>
                            <span>
                            : {{ $p->pendidikan }}
                            </span>
                        </div>

                        <div class="card-text">
                            <i class="fa fa-phone-alt"></i>
                            <span>
                            : +62{{ $p->nomer_telepon }}
                            </span>
                        </div>

                        <div class="card-text">
                            <i class="fa fa-map-marked"></i>
                            <span>
                            : {{ $p->lokasi_kantor }}
                            </span>
                        </div>

                    </div>   
                </div>      
            </div>
            <br>
        </div>
        @endforeach
    </div> 
    <!-- end table -->
</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Tambah Karyawan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="/karyawan/create" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id"> <br/>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleFormControlSelect1">Role</label>
                            <select name="role" class="form-control" autocomplete="off">
                                <option value="Staff">Staff</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Nik</label>
                            <input name="nik" type="text" class="form-control" autocomplete="off">
                        </div>
                    </div>
               
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Nama Lengkap</label>
                            <input name="nama_lengkap" type="text" class="form-control" autocomplete="off" >
                        </div>
                        
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1">Nama Panggilan</label>
                            <input name="nama_panggilan" type="text" class="form-control" autocomplete="off" >
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Tempat Lahir</label>
                            <input name="tempat_lahir" type="text" class="form-control" autocomplete="off">
                        </div>
                        
                        <div class="form-group col-md-4">
                            <label for="exampleInputEmail1">Tanggal Lahir</label>
                            <input name="tanggal" type="date" class="form-control" autocomplete="off">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="exampleFormControlSelect1">Agama</label>
                            <select name="agama" class="form-control" autocomplete="off">
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Kong Hu Cu">Kong Hu Cu</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="exampleFormControlSelect1">Golongan Darah</label>
                            <select name="golongan_darah" class="form-control" autocomplete="off">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="AB">AB</option>
                                <option value="O">O</option>
                            </select>
                        </div>
    
                        <div class="form-group col-md-3">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" autocomplete="off">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
    
                        <div class="form-group col-md-3">
                            <label>Status</label>
                            <select name="status" class="form-control" autocomplete="off">
                                <option value="Menikah">Menikah</option>
                                <option value="Belum Menikah">Belum Menikah</option>
                            </select>
                        </div>
    
                        <div class="form-group col-md-3">
                            <label>Jumlah Anak</label>
                            <input name="jumlah_anak" type="text" class="form-control" autocomplete="off" >
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Nik KTP</label>
                            <input name="nik_ktp" type="text" class="form-control" autocomplete="off">
                        </div>
    
                        <div class="form-group col-md-6">
                            <label>No NPWP</label>
                            <input name="no_npwp" type="text" class="form-control" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Pendidikan</label>
                            <select name="pendidikan" class="form-control" autocomplete="off">
                                <option value=" "> </option>
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
                                <option value=" "> </option>
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
                            <input name="email" type="email" class="form-control" autocomplete="off">
                            <div class="from-group-prepend text-black">
                                <span class="from-group-text text-sm fas fa-envelope"> Contoh: Bino@gmail.com</span>
                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <label>Email Kantor</label>
                            <input name="email_kantor" type="text" class="form-control" autocomplete="off">
                            <div class="from-group-prepend text-black">
                                <span class="from-group-text text-sm fas fa-envelope"> Contoh: Bino@binokular.net</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Skype</label>
                            <input name="skype" type="text" class="form-control" autocomplete="off" >
                        </div>

                        <div class="form-group col-md-4">
                            <label>No HP</label>
                            <input name="nomer_telepon" type="text" class="form-control" autocomplete="off" >
                        </div>

                        <div class="form-group col-md-4">
                            <label>Lokasi Kantor</label>
                            <select name="lokasi_kantor" class="form-control" >
                                <option value="Jakarta">Jakarta</option>
                                <option value="Jogja">Jogja</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="alamat" type="text" class="form-control" autocomplete="off">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Views -->
@foreach($data_karyawan as $p)
    <div class="modal fade" id="ModalViews-{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- konten modal Views -->
                    <section class="container-fluid">
                        <div class="row">
                            <div class="container-fluid">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <img src="assets/img/user-medium.png" class="img-circle" alt="Avatar">
                                        <h2 class="name">{{ $p->nama_lengkap }}</h2>
                                        <span class="name">{{ $p->nik }}</span>
                                    </div>
                                </div>
                                <!-- <div class="overlay"></div>
                                <div class="profile-main">
                                    <img src="assets/img/user-medium.png" class="img-circle" alt="Avatar">
                                    <h3 class="name">{{ $p->nama_lengkap }}</h3>
                                    <span class="online-status status-available">Available</span>
                                </div> -->
                                <div class="card text-white bg-info mb-3">
                                    <div class="col-12 text-center">
                                        <div class="col-md-4">
                                                <i class="fas fa-calendar-week"></i> <span>{{ $p->divisi }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i class="fas fa-calendar-week"></i> <span>{{ $p->tanggal }}</span>
                                        </div>
                                        <div class="col-md-4">
                                            <i class="fas fa-calendar-week"></i> <span> +62{{ $p->nomer_telepon }}</span>
                                        </div>
                                    </div>
                                </div>  
                            </div>

                            <div class="col-12 col-md-6">
                                <div class="float-left">
                                    <span>Nama = {{ $p->nama_lengkap }} </span>
                                </div>
                            </div>
                            
                            <div class="col-12 col-md-6">
                                <div class="float-right">
                                    <span> Divisi = {{ $p->divisi }} </span>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endforeach
@endsection
