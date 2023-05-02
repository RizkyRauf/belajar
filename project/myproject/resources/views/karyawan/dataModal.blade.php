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
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nik</label>
                        <input name="nik" type="text" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Lengkap</label>
                        <input name="nama_lengkap" type="text" class="form-control" autocomplete="off" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Panggilan</label>
                        <input name="nama_panggilan" type="text" class="form-control" autocomplete="off" >
                    </div>
                    <div class="form-group">
                            <div col-4>
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <input name="tempat_lahir" type="text" class="form-control" autocomplete="off">
                            </div>
                            <div col-5>
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <input name="tanggal" type="date" class="form-control" autocomplete="off">
                            </div>

                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Golongan Darah</label>
                        <select name="golongan_darah" class="form-control" autocomplete="off">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" autocomplete="off">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Status</label>
                        <select name="status" class="form-control" autocomplete="off">
                            <option value="Menikah">Menikah</option>
                            <option value="Belum Menikah">Belum Menikah</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Anak</label>
                        <input name="jumlah_anak" type="number" class="form-control" autocomplete="off" >
                        <div class="from-group-prepend text-black">
                        <span class="from-group-text text-sm"> Isi kosong jika tidak memiliki</span>
                    </div>
                    <div class="form-group">
                        <label>Nik KTP</label>
                        <input name="nik_ktp" type="text" class="form-control" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <div col-4>
                            <label>Alamat</label>
                            <input name="alamat_npwp" type="text" class="form-control" autocomplete="off">
                        </div>
                        <div col-5>
                            <label>No NPWP</label>
                            <input name="no_npwp" type="text" class="form-control" autocomplete="off">
                        </div>
                    </div>
                    <div col-4>
                        <div class="form-group">
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
                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <label>Email Pribadi</label>
                        <input name="email_pribadi" type="text" class="form-control" autocomplete="off">
                        <div class="from-group-prepend text-black">
                            <span class="from-group-text text-sm fas fa-envelope"> Contoh: Bino@gmail.com</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email Kantor</label>
                        <input name="email_kantor" type="text" class="form-control" autocomplete="off">
                        <div class="from-group-prepend text-black">
                            <span class="from-group-text text-sm fas fa-envelope"> Contoh: Bino@binokular.net</span>
                        </div>
                    </div>
                    <label>Skype</label>
                    <div class="from grup">
                        <input name="skype" type="text" class="form-control" autocomplete="off" >
                    </div>

                    <label>No HP</label>
                    <div class="from grup">
                        <input name="nomer_telepon" type="text" class="form-control" autocomplete="off" >
                    </div>

                    <div class="form-group">
                        <label>Lokasi Kantor</label>
                        <select name="lokasi_kantor" class="form-control" >
                            <option value="Jakarta">Jakarta</option>
                            <option value="Jogja">Jogja</option>
                        </select>
                    </div> 
                        
                        </div>
                    <div class="modal-footer">
                        
                        <button type="submit" class="btn btn-success">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<section class="container-fluid">
    <div class="row">
        @if(session('sukses'))
            <div class="alert alert-success" role="alert">
                {{session('sukses')}}
            </div>
        @endif
        <div class="col-12 col-md-6">
            <h3 class="float-left pl-md-4">Data karyawan</h3>
        </div>
        <div class="col-12 col-md-6">
            <div class="float-right pr-md-4">
                <button type="button" class="btn" data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-user-plus"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive d-none d-md-flex">
                <table class="table">
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
                        <?php $i = 1; ?>
                        @foreach($data_karyawan as $p)
                            <tr>
                                <td><?= $i; ?></td>
                                <td>{{ $p->nik }}</td>
                                <td>{{ $p->divisi }}</td>
                                <td>{{ $p->nama_lengkap }}</td>
                                <td>{{ $p->tanggal }}</td>
                                <td>{{ $p->alamat_npwp }}</td>
                                <td>{{ $p->pendidikan }}</td>
                                <td><a>+62</a>{{ $p->nomer_telepon}}</td>
                                <td>{{ $p->lokasi_kantor }}</td>
                                <td>
                                    <a href="/karyawan/{{$p->id}}/edit" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="/karyawan/hapus/{{ $p->nama_lengkap }}" onclick="return confirm('yakin mau di hapus?')" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td> 
                            </tr>
                        <?php $i++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>