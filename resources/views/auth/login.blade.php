<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('assetsLogin/images/icons/favicon.ico')}}"/>
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assetsLogin/vendor/bootstrap/css/bootstrap.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assetsLogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assetsLogin/vendor/animate/animate.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assetsLogin/vendor/css-hamburgers/hamburgers.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assetsLogin/vendor/animsition/css/animsition.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assetsLogin/vendor/select2/select2.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assetsLogin/vendor/daterangepicker/daterangepicker.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('assetsLogin/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('assetsLogin/css/main.css')}}">
	<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action = "{{route('login')}}"
				method="POST">
				<span class="login100-form-title">
					Review.Movie
				</span>
				@csrf

				@if ($errors->any())
				<div class="alert alert-warning">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
				@endif

				<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter email">
					<input class="input100 @error('email') is-invalid @enderror" type="email" name="email"
					placeholder="email">
					<span class="focus-input100"></span>
					@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{$message}}</strong>
					</span>
					@enderror
				</div>

				<div class="wrap-input100 validate-input" data-validate = "Please enter password">
					<input class="input100" type="password" name="password" placeholder="Password">
					<span class="focus-input100"></span>
				</div>
				<br>
				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit">
						Login
					</button>
				</div>
				<br>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn"  data-toggle="modal" data-target="#exampleModalCenter">
						Info AKun
					</button>
				</div>



				<div class="flex-col-c p-t-170 p-b-40">
					<span class="txt1 p-b-9">
						Belum punya akun?
					</span>

					<a href="{{url('/register')}}" class="txt3">
						Daftar Sekarang
					</a>
				</div>
				<div class="flex-col-c p-t-170 p-b-40">


					{{-- <a href="{{url('/forgot_password')}}" class="txt1">
						lupa password
					</a> --}}
				</div>
			</form>
		</div>
	</div>
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Informasi Akun:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <a>login admin:</a>
				<br>
				<a>email:adminku@gmail.com</a>
				<br>
				<a>password: adminku</a>
				<br>
				<br>
				<a>login User:</a>
				<br>
				<a>email:iwanris@gmail.com</a>
				<br>
				<a>password: iwanris</a>
				<br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>

<!--===============================================================================================-->
<script src="{{asset('assetsLogin/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assetsLogin/vendor/animsition/js/animsition.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assetsLogin/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{asset('assetsLogin/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assetsLogin/vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assetsLogin/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{asset('assetsLogin/vendor/daterangepicker/daterangepicker.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assetsLogin/vendor/countdowntime/countdowntime.js')}}"></script>
<!--===============================================================================================-->
<script src="{{asset('assetsLogin/js/main.js')}}"></script>

</body>
</html>
