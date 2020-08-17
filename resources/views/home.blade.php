<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
  <link rel="stylesheet" type="text/css" href="{{asset('frontside/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontside/style_home.css') }}">
</head>

<body>
	<header>  Library Management System </header>
	<div class="logo">
	  <img src="{{ asset('frontside/logo.png') }}" >
	</div>

	<div class="button">
      <a href="/usersignup" class="btn btn-one">Sign up</a>
	  <a href="/userlogin" class="btn btn-two">Login</a>
	</div>
</body>
</html>