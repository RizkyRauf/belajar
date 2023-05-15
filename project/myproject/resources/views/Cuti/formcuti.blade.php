@extends('layouts.master')

@section('cuti')
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
                            <h3 class="panel-title">Form Cuti</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                
                                <a href="/dashboard">
                                    <button type="button" class="btn-toggle lnr lnr-cross text-dark"></button>
                                </a>
                               
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="/form/cuti/{{ auth()->user()->name }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Nik Karyawan</label>
                                        <input name="nik_karyawan" type="text" class="form-control" autocomplete="off" placeholder=".......">
                                    </div> 
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Divisi Karyawan</label>
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
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Nama Karyawan</label>
                                        <input name="nama_karyawan" type="text" class="form-control" autocomplete="off" placeholder=".......">
                                    </div> 
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Tanggal Mulai</label>
                                        <input name="tanggal_mulai" type="date" class="form-control" autocomplete="off" placeholder=".......">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="exampleInputEmail1">Tanggal Mulai</label>
                                        <input name="tanggal_selesai" type="date" class="form-control" autocomplete="off" placeholder=".......">
                                    </div>
                                    <div class="form-group col-md-4">
                                        
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputEmail1">Keterangan</label>
                                        <textarea name="keterangan" type="text" class="form-control" autocomplete="off" placeholder="...."></textarea>
                                    </div>
                                </div>

                                <div class="form-row col-md-12">
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
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