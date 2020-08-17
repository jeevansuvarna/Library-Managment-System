<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>

  <link rel="stylesheet" type="text/css" href="{{asset('frontside/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontside/style_userLogin.css') }}">
</head>

<body>
  <header>  Library Management System </header>
<nav class="navigation navbar navbar-expand-sm">
  <ul class="navbar-nav">
    <li class="nav-color">
      <a id="home" class="nav-link nav-item" href="/home"><b>HOME</b></a>
    </li>
    <li class="nav-color">
      <a class="nav-link nav-item" href="/usersignup">Sign Up</a>
    </li>
    <li class="nav-color">
      <a class="nav-link nav-item" href="/userlogin">Log In</a>
    </li>
  </ul>
</nav>

<div class="login-wrap">
<div class="login-html">   
    <form action="/verify_user_login" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="login-wrap">
      <div class="login-html">
      <label for="tab-1" class="tab">User Login</label>
      <div class="login-form">
            <div class="group">
              <label for="name" class="label">Username</label>
              <input name="name" type="text" class="input" autofocus required>
            </div>
            <div class="group">
              <label for="pass" class="label">Password</label>
              <input name ="pass" type="password" class="input" data-type="password" required>
            </div>
            <br>
            <div class="group">
              <input type="submit" class="button" value="Log In">
            </div>
            <div class="hr"></div>
            <a id="loginasadmin" href="adminlogin">Login as admin</a>
        </div>
      </div>
      </div>
    </form>
</div>
</div>
</body>
</html>