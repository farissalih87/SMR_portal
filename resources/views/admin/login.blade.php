<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Panagea - Premium site template for travel agencies, hotels and restaurant listing.">
    <meta name="author" content="Ansonika">
    <title>SMR |Admin Login </title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
<link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
	<link href="{{asset('assets/css/vendors.css')}}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">

</head>

<body id="login_bg">

	<nav id="menu" class="fake_menu"></nav>

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->

	<div id="login">
		<aside>
			<figure>
            <a href="index.html"><img src="{{asset('assets/img/logo_sticky.png')}}" width="155" height="36" data-retina="true" alt="" class="logo_sticky"></a>
			</figure>
        <form method="post" action="{{route('admin.login')}}">
            @csrf
				<div class="form-group">
                    <label>Email</label>

                <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                <i class="icon_mail_alt"></i>
                @error('email')
                <span class="text-danger">{{$message}}</span>
                    @enderror
				</div>
				<div class="form-group">
                    <label>Password</label>

                    <input type="password" class="form-control" name="password" id="password" value="">
                  <i class="icon_lock_alt"></i>
                  @error('password')
                  <span class="text-danger">{{$message}}</span>
                      @enderror
				</div>
				<div class="clearfix add_bottom_30">
					<div class="checkboxes float-left">
						<label class="container_check">Remember me
						  <input name="remember" id="remember" type="checkbox">
						  <span class="checkmark"></span>
						</label>
					</div>

				</div>
                <button  type="submit" class="btn_1 rounded full-width">Login</button>

				</form>
			<div class="copy">© 2021 Serve My Ride</div>
		</aside>
	</div>
	<!-- /login -->

	<!-- COMMON SCRIPTS -->
<script src="{{asset('assets/js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('assets/js/common_scripts.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
	<script src="{{asset('assets/assets/validate.js')}}"></script>

</body>
</html>
