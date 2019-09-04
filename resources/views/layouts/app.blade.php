<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'Su-Sea') }}</title>

	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('css/icons.css') }}">

	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/style.css') }}" rel="stylesheet">

	{{-- DataTables --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('datatables/datatables.css') }}">
	<script type="text/javascript" charset="utf8" src="{{ asset('datatables/datatables.js') }}"></script>
</head>
<body>
	<div id="app">
		<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
			<div class="container">
				<a class="navbar-brand text-primary align-middle" href="{{ url('/') }}">
					<img src="{{ url('/image/susea-logo.png') }}" alt="Logo" class="responsive-images" width="150px">
					{{-- <span>{{ config('app.name', 'Laravel') }}</span> --}}
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<a class="ml-md-5 dropdown-toggle text-primary" href="#" role="button" id="dropdownCategory" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-decoration: none;font-weight: 600;">Kategori <span class="caret"></span></a>
					
					<div class="dropdown-menu" id="dropdown-menu-category" style="left: unset" aria-labelledby="dropdownCategory">
						<div class="container">
							@php
								$categories = new \App\Category;
							@endphp
							@foreach ($categories->all() as $category)
								<a href="#" class="dropdown-item text-capitalize">{{$category->category_name}}</a>
							@endforeach
						</div>
					</div>

					<!-- Right Side Of Navbar -->
					<form class="form-inline border border-primary mx-auto row" id="form-search" method="GET" action="{{ url('search') }}">
						<input class="form-control col-11 pl-3 pr-1 form-control-sm border-0" type="search" placeholder="Search" aria-label="Search" id="search-field" name="keyword" autocomplete="off">
						<button class="btn border-0 bg-transparent ml-auto col-1 p-0 pr-3" type="submit"><i class="material-icons md-18 text-primary" style="line-height: inherit">search</i></button>
					</form>

					<ul class="navbar-nav ml-auto">
						{{-- <li class="nav-item mr-5">
						</li> --}}

						{{-- <li class="nav-item dropdown position-static mr-4"> --}}
						{{-- </li> --}}
						
					<!-- Authentication Links -->
						@guest
							<li class="nav-item mr-2">
								{{-- <a class="nav-link text-primary rounded text-center font-weight-bold" style="border-width: 2px !important;letter-spacing: 2px;height: 36px;text-decoration: underline" href="{{ route('login') }}">{{ __('Masuk') }}</a> --}}
								<a class="nav-link text-primary text-center font-weight-bold border border-white" href="{{ route('login') }}">{{ __('Masuk') }}</a>
							</li>
							@if (Route::has('register'))
								<li class="nav-item">
									{{-- <a id="register-nav" class="nav-link text-primary border border-primary rounded text-center font-weight-bold" href="{{ route('register') }}" style="border-width: 2px !important; letter-spacing: 2px;height:36px; text-decoration: underline">{{ __('Daftar') }}</a> --}}
									<a id="register-nav" class="nav-link text-primary border border-primary text-center font-weight-bold" style="border-width: 2px !important;width: 84px;border-radius: 10rem !important;" href="{{ route('register') }}">{{ __('Daftar') }}</a>
								</li>
							@endif
						@else
							<li class="nav-item dropdown">
								<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
									<img src="{{ asset('/storage/'.Auth::user()->avatar)}}" alt="" width="25" height="25" style="border-radius: 50rem;" class="mr-1">
									{{ Auth::user()->fullname }} <span class="caret"></span>
								</a>

								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
									<a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a>
									<a class="dropdown-item" href="{{ route('logout') }}"
									   onclick="event.preventDefault();
													 document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									</a>

									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
										@csrf
									</form>
								</div>
							</li>
						@endguest
					</ul>
				</div>
			</div>
		</nav>

		<main class="py-4">
			@yield('content')
		</main>
	</div>

	<script>
		$(document).ready(function() {
			$('form#form-search input#search-field').focusin(function() {
				$('form#form-search').css('box-shadow', '0 0 3px 1px #3490dc');
				// $('form#form-search button i').removeClass('text-muted');
				// $('form#form-search button i').addClass('text-primary');
			});

			$('form#form-search input#search-field').focusout(function() {
				$('form#form-search').css('box-shadow', 'none');
				// $('form#form-search button i').removeClass('text-primary');
				// $('form#form-search button i').addClass('text-muted');
			});
		});
	</script>
</body>
</html>
