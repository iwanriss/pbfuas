<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
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
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action = "{{route('register')}}" method = "POST">
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
						<input class="input100 @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter nama anda">
						<input class="input100" type="text" name="name" placeholder="nama">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter nomer hp anda">
						<input class="input100" type="text" name="nomer_hp" placeholder="Nomor HP">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Please enter tanggal lahir anda">
						<input class="input100" type="text" name="tanggal_lahir" placeholder="Tanggal Lahir">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter password">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-16" data-validate = "Please enter password">
						<input class="input100" type="password" name="password_confirmation" placeholder="Confirm Password">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Daftar
						</button>
					</div>

					<div class="flex-col-c p-t-50 p-b-40">
						<span class="txt1 p-b-9">
							Sudah Punya Akun?
						</span>

						<a href="{{url('/login')}}" class="txt3">
							Masuk
						</a>
					</div>
				</form>
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
