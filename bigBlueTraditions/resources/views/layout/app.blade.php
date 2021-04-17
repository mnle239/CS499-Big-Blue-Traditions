<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Big Blue Traditions</title>

		<link rel="stylesheet" href=" {{ asset('css/app.css') }}">
		<style>
			body {
				font-family: "Trebuchet MS";
			}
			div.container {
      			display: block;
				margin-right: 20px;
				position: relative;
				right: -170%;
    		}
			footer {
				position: fixed;
				padding: 10px 10px 0px 10px;
				bottom: 0;
				width: 100%;
				/* Height of the footer*/ 
				height: 40px;
				background: lightgray;
        	}
    	</style>
	</head>
	<body class="bg-gray-200">
		<nav class="p-6 bg-blue-800 flex justify-between mb-6 text-white">

			<ul class="flex items-center">
				<li>
					<a href="/" class="p-3">Home</a> 
				</li>
				<li>
					<a href="{{ route('traditionList') }}" class="p-3">Traditions</a>
				</li>
				<li>
					<a href="{{ route('resourceList') }}" class="p-3"> Resources</a>
				</li>
				<li>
					<a href="{{ route('couponList') }}" class="p-3">Local Coupons and Deals</a>
				</li>
				<li>
					<a href="{{ route('prizeList') }}" class="p-3">Prizes</a>
				</li>
			</ul>

			<ul class="flex items-center">
				<div class="container">
					<img src="{{url('1200px-University_of_Kentucky_seal.svg.png')}}" alt="UKY Seal" height="60" width="60">
				</div>
				<div class="container">
					<img src="{{url('UK_SPB_Seal.JPG')}}" alt="UK SPB Seal" height="60" width="60">
				</div>
			</ul>

			<ul class="flex items-center">
				@auth
				<li>
					<a href="{{ route('userInfo') }}" class="p-3">{{ auth()->user()->name }}</a>
				</li>
				<li>
					<form action="{{ route('logout') }}" method="post" class="p-3 inline">
						@csrf
						<button type="submit">Logout</button>
					</form>
				</li>
				@endauth

				@guest
				<li>
					<a href="{{ route('login') }}" class="p-3">Login</a>
				</li>
				<li>
					<a href="{{ route('register') }}" class="p-3">Register</a>
				</li>
				@endguest
			</ul>
		</nav>
			
		@yield('content')

	</body>
	<footer>
		<p>UKY Student Philanthropy Board 2021      
        <a href="mailto:ukspb.activities@gmail.com">ukspb.activities@gmail.com</a></p>
	</footer>
</html>
<!-- vim:filetype=php:-->