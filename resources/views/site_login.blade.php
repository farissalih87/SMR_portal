<!DOCTYPE html>
<html lang="{{__('messages.lang')}}" dir="{{__('messages.direc')}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Panagea - Premium site template for travel agencies, hotels and restaurant listing.">
    <meta name="author" content="Ansonika">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ asset(__('messages.lang').'/site_assets/img/favicon.ico')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ asset(__('messages.lang').'/site_assets/img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ asset(__('messages.lang').'/site_assets/img/apple-touch-icon-72x72-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ asset(__('messages.lang').'/site_assets/img/apple-touch-icon-114x114-precomposed.png') }}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ asset(__('messages.lang').'/site_assets/img/apple-touch-icon-144x144-precomposed.png') }}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

    <!-- BASE CSS -->
    <link href="{{ asset(__('messages.lang').'/site_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    @if(App::getLocale()=='ar')<link href="{{ asset(__('messages.lang').'/site_assets/css/bootstrap-rtl.min.css') }}" rel="stylesheet">@endif
    <link href="{{ asset(__('messages.lang').'/site_assets/css/style.css') }}" rel="stylesheet">
    @if(App::getLocale()=='ar') <link href="{{ asset(__('messages.lang').'/site_assets/css/style-rtl.css') }}" rel="stylesheet"> @endif
	<link href="{{ asset(__('messages.lang').'/site_assets/css/vendors.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset(__('messages.lang').'/site_assets/css/custom.css') }}" rel="stylesheet">

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
				<a href="index.html"><img src="{{ asset(__('messages.lang').'/site_assets/img/logo_sticky.png')}}" width="155" height="36" data-retina="true" alt="" class="logo_sticky"></a>
			</figure>
            <form method="post" action="{{ route('login') }}">
                @csrf
				<div class="access_social">
					<a href="#0" class="social_bt facebook">{{ __('messages.login_with_facebook') }}</a>
					<a href="#0" class="social_bt google">{{ __('messages.login_with_google') }}</a>

				</div>
				<div class="divider"><span>{{ __('messages.or') }}</span></div>
				<div class="form-group">
					<label>{{ __('messages.email') }}</label>
					<<input  class="form-control" type="email" name="email" :value="old('email')" required autofocus />
					<i class="icon_mail_alt"></i>
				</div>
				<div class="form-group">
					<label>{{ __('messages.password') }}</label>
					<input class="form-control" id="password" type="password" name="password" required autocomplete="current-password" />
					<i class="icon_lock_alt"></i>
				</div>
				<div class="clearfix add_bottom_30">
					<div class="checkboxes float-left">
						<label class="container_check">{{ __('messages.remember_me') }}
                            <input type="checkbox" id="remember_me" name="remember">
						  <span class="checkmark"></span>
						</label>
					</div>
					<div class="float-right mt-1"><a id="forgot" href="javascript:void(0);">{{ __('messages.forget_password') }}</a></div>
				</div>
				<div class="text-center"><input type="submit" value="{{ __('messages.sign_in') }}" class="btn_1 full-width"></div>
				<div class="text-center add_top_10">
                    {{ __('messages.dont_have_an_account') }} <a href="{{ route('register') }}">{{ __('messages.sign_up') }}</a>
                </div>
			</form>
			<div class="copy">© 2021 Serve My Ride</div>
		</aside>
	</div>
	<!-- /login -->

	<!-- COMMON SCRIPTS -->
    <script src="{{ asset(__('messages.lang').'/site_assets/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset(__('messages.lang').'/site_assets/js/common_scripts.js') }}"></script>
    <script src="{{ asset(__('messages.lang').'/site_assets/js/main.js') }}"></script>
	<script src="{{ asset(__('messages.lang').'/site_assets/assets/validate.js') }}"></script>

</body>
</html>
