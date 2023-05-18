@extends('layouts.master')

@section('karyawan')
<!-- MAIN -->
    <div class="main">
        <!-- MAIN CONTENT -->
        <div class="main-content">
            <div class="container-fluid">
                <div class="panel panel-profile">
                    <div class="clearfix">
                        <!-- LEFT COLUMN -->
                        <div class="profile-left">
                            <!-- PROFILE HEADER -->
                            <div class="profile-header">
                                <div class="overlay"></div>
                                <div class="profile-main">
                                    <img src="{{asset('images/'.$karyawan->avatar)}}" class="img-circle" alt="Avatar">
                                    <h3 class="name">{{$karyawan->nama_lengkap}}</h3>
                                </div>
                                <div class="profile-stat">
                                    <div class="row">
                                        <div class="col-md-12 stat-item">
                                            <h4 class="designation">{{$karyawan->divisi}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PROFILE HEADER -->
                            <!-- PROFILE DETAIL -->
                            <div class="profile-detail">
                                <div class="profile-info">
                                    <h4 class="heading">Basic Info</h4>
                                    <div class="panel panel-default"></div>
                                    <ul class="list-unstyled list-justify">
                                        <li>Tempat, Tanggal Lahir <span>{{$karyawan->tempat_lahir}}, {{ date('Y-F-d', strtotime($karyawan->tanggal)) }}</span></li>
                                        <div class="panel panel-default"></div>
                                        <li>No Hp <span>(+62) {{$karyawan->nomer_telepon}}</span></li>
                                        <div class="panel panel-default"></div>
                                        <li>Cuti <span>{{$karyawan->cuti_karyawan}}</span></li>
                                        <div class="panel panel-default"></div>
                                    </ul>
                                </div>
                                <div class="text-center"><a href="/karyawan/{{$karyawan->id}}/edit" class="btn btn-primary">Edit Profile</a></div>
                            </div>
                            <!-- END PROFILE DETAIL -->
                        </div>
                        <!-- END LEFT COLUMN -->
                        <!-- RIGHT COLUMN -->
                        <div class="profile-right">
                            
                            <!-- TABBED CONTENT -->
                            <div class="custom-tabs-line tabs-line-bottom left-aligned">
                                <ul class="nav" role="tablist">
                                    <li class="active"><a href="#tab-bottom-left1" role="tab" data-toggle="tab">Detail</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab-bottom-left1">
                                    <div class="row">
                                        <div class="col-md-12">

                                            <div class="col-md-6">
                                                <div class="table-responsive">
                                                    <table class="table project-table">
                                                        <tbody>
                                                            <ul class="list-unstyled list-justify">
                                                                <li><label>Nik</label> <span>{{$karyawan->nik }}</span></li>
                                                                <div class="panel panel-default"></div>
                                                                <li><label>Nama Panggilan</label> <span>{{$karyawan->nama_panggilan}}</span></li>
                                                                <div class="panel panel-default"></div>
                                                                <li><label>Jenis Kelamin</label> <span>{{$karyawan->jenis_kelamin}}</span></li>
                                                                <div class="panel panel-default"></div>
                                                                <li><label>Agama</label> <span>{{$karyawan->agama}}</span></li>
                                                                <div class="panel panel-default"></div>
                                                                <li><label>Pendidikan</label> <span>{{$karyawan->pendidikan}}</span></li>
                                                                <div class="panel panel-default"></div>
                                                                <li><label>Status</label> <span>{{$karyawan->status}}</span></li>
                                                                <div class="panel panel-default"></div>
                                                                <li><label>Jumlah Anak</label> <span>{{$karyawan->jumlah_anak}}</span></li>
                                                                <div class="panel panel-default"></div>
                                                            </ul>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="table-responsive">
                                                    <table class="table project-table">
                                                        <tbody>
                                                            <ul class="list-unstyled list-justify">
                                                                <li><label>Golongan Darah</label> <span>{{$karyawan->golongan_darah}}</span></li>
                                                                <div class="panel panel-default"></div>
                                                                <li><label>Lokasi Kantor</label> <span>{{$karyawan->lokasi_kantor}}</span></li>
                                                                <div class="panel panel-default"></div>
                                                                <li><label>Skype</label> <span>{{$karyawan->skype}}</span></li>
                                                                <div class="panel panel-default"></div>
                                                                <li><label>Email Pribadi</label> <span>{{$karyawan->email}}</span></li>
                                                                <div class="panel panel-default"></div>
                                                                <li><label>Email Kantor</label> <span>{{$karyawan->email_kantor}}</span></li>
                                                                <div class="panel panel-default"></div>
                                                                <li><label>Nik KTP</label> <span>{{$karyawan->nik_ktp}}</span></li>
                                                                <div class="panel panel-default"></div>
                                                                <li><label>Nik NPWP</label> <span>{{$karyawan->no_npwp}}</span></li>
                                                                <div class="panel panel-default"></div>
                                                            </ul>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table class="table project-table">
                                                        <tbody>
                                                            <ul class="list-unstyled list-justify">
                                                                <li><label>Alamat</label></span></li>
                                                                <div class="panel panel-default"></div>
                                                            </ul>
                                                            <span>{{$karyawan->alamat}}</span>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-bottom-left2">
                                    <div class="table-responsive">
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- END TABBED CONTENT -->
                        </div>
                        <!-- END RIGHT COLUMN -->
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT -->
    </div>
<!-- END MAIN -->
@stop