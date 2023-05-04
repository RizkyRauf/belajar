<nav class="navbar navbar-default navbar-fixed-top">
        @if (session('success'))
			<div class="alert alert-success">
				{{ session('success') }}
			</div>
			<script>
                setTimeout(function() {
                    document.querySelector('.alert').setAttribute('hidden', true);
                }, 2000); // ganti angka 5000 dengan jumlah milidetik yang diinginkan (misalnya 3000 untuk 3 detik)
            </script>
		@endif
    <div class="brand">
        <a href="index.html"><img src="{{asset('admin/assets/img/logo-login.png')}}" alt="Klorofil Logo" width="139" height="21" class="img-responsive logo"></a>
    </div>
    <div class="container-fluid">
        <div class="navbar-btn">
            <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
        </div>


            <!-- <form class="navbar-form navbar-left" method="GET" action="/karyawan">
                <div class="input-group">
                    <input name="cari" type="text" value="" class="form-control" placeholder="Search Data Karyawan">
                    <span class="input-group-btn"><button type="submit" class="btn btn-primary">Go</button></span>
                </div>
            </form> -->
     

        <div id="navbar-menu">
            <ul class="nav navbar-nav navbar-right">
                
                <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset('admin/assets/img/user.jpg')}}" class="img-circle" alt="Avatar"> 
                    <span>{{auth()->user()->name}}</span> 
                    <i class="icon-submenu lnr lnr-chevron-down"></i>
                </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="lnr lnr-cog"></i> <span>Change Password</span></a></li>
                        <li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>