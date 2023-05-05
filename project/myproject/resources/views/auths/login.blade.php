
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | Klorofil - Free Bootstrap Dashboard Template</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/img/favicon.png')}}">
	<!-- Boostrap -->
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
</head>

<body>

<div class="row">
	<div class="vertical-align-wrap">
		<div class="vertical-align-middle">
			<div class="auth-box ">
				<div class="left">
					<div class="content">
						@if (session('error'))
							<div id="errorAlert" class="alert alert-danger">
								{{ session('error') }}
							</div>
							<script>
								setTimeout(function() {
									document.querySelector('#errorAlert').setAttribute('hidden', true);
								}, 2000); // ganti angka 3000 dengan jumlah milidetik yang diinginkan (misalnya 5000 untuk 5 detik)
							</script>
						@endif

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
						<div class="header">
							<div class="logo text-center ">
								<img class="d-none d-md-flex" src="{{asset('admin/assets/img/logo-login.png')}}" width="150" height="" alt="Binokular">
							</div>
							
							<p class="lead">Login Your Account</p>
						</div>
						<form class="form-auth-small" action="/postlogin" method="POST">
							@csrf
							<div class="form-group">
								<label for="signin-name" class="control-label sr-only">Email</label>
								<input name="name" type="name" class="form-control" id="signin-name"  placeholder="User Name">
							</div>
							<div class="form-group">
								<label for="signin-password" class="control-label sr-only">Password</label>
								<input name="password" type="password" class="form-control" id="signin-password" placeholder="Password">
							</div>
							<div class="form-group clearfix">
								
							</div>
							<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
							
						</form>
					</div>
				</div>
				<div class="right bg-white">
					<!-- <div class="overlay"></div> -->
					<div class="content text">
						<img class="mx-auto d-block mt-8 mb-8" src="{{asset('admin/assets/img/logo-login.png')}}" alt="">
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>


</body>

</html>
