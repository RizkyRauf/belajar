@extends('layouts.master')

@section('cuti')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            
            <!-- alert -->
            <div class="row">
                <div class="col-12">
                    <!-- alert success -->
                    @if(session('sukses'))
                        <div class="alert alert-success" role="alert">
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

            <!-- TABLE-->
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3>Table Cuti</h3>

                            <div class="right">
                                <form class="form-inline my-2 my-lg-0">
                                    <input name="nama_karyawan" class="form-control mr-sm-2" type="search" placeholder="Search Name" aria-label="Search">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                                    <i class="fas fa-search"></i></button>
                                </form> 
                            </div>
                        </div>
                        <div class="panel-body no-padding">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nik Karyawan</th>
                                        <th>Nama Karyawan</th>
                                        <th>Divisi</th>
                                        <th>Status</th>
                                        <th>Sisa Cuti</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cuti as $c)
                                    <?php $i = 1; ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td>{{ $c->nik_karyawan }}</td>
                                            <td>{{ $c->nama_karyawan }}</td>
                                            <td>{{ $c->divisi }}</td>
                                            <td>{{ $c->status }}</td>
                                            <td>{{ $c->sisa_cuti }}</td>
                                        </tr>
                                    @endforeach
                                    <?php $i++; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END TABLE -->
                </div>
            </div>
        </div>
    </div>
</div>

@stop