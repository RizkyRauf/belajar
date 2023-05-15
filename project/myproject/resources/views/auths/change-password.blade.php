@extends('layouts.master')

@section('karyawan')
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
                            <h3 class="panel-title">Change Password</h3>
                            <div class="right">
                                <button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
                                
                                <a href="/karyawan">
                                    <button type="button" class="btn-toggle lnr lnr-cross text-dark"></button>
                                </a>
                               
                            </div>
                        </div>
                        <div class="panel-body">
                            <form action="/change-password" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="oldPassword">Old Password</label>
                                        <input name="old_password" type="password" id="oldPassword" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="newPassword">New Password</label>
                                        <input name="new_password" type="password" id="newPassword" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="repeatPassword">Repeat Password</label>
                                        <input name="new_password_confirmation" type="password" id="repeatPassword" class="form-control" >
                                    </div>
                                </div>
                                
                                <div class="form-row col-md-12">
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Save</button>
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