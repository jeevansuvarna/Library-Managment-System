<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="{{asset('frontside/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontside/style_adminLogin.css') }}">
</head>

<body>
  <header>  Library Management System </header>
<nav class="navigation navbar navbar-expand-sm">
  <ul class="navbar-nav">
    <li class="nav-color">
      <a id="home" class="nav-link nav-item" href="/home"><b>HOME</b></a>
    </li>
    <li class="nav-color">
      <a class="nav-link nav-item" href="/adminlogin">Admin Login</a>
    </li>
    <li class="nav-color">
      <a class="nav-link nav-item" href="/userlogin">User Login</a>
    </li>
  </ul>
</nav>


<div class="login-wrap">
<div class="login-html">   
    <form action="/verify_admin_login" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="login-wrap">
      <div class="login-html">
      <label for="tab-1" class="tab">Admin Login</label>
      <div class="login-form">
            <div class="group">
              <label for="name" class="label">Admin name</label>
              <input name="name" type="text" class="input" required autofocus="">
            </div>
            <div class="group">
              <label for="pass" class="label">Admin Password</label>
              <input name ="pass" type="password" class="input" data-type="password" required>
            </div>
            <br>
            <div class="group">
              <input type="submit" class="button" value="Log In">
            </div>
            <div class="hr"></div>
        </div>
      </div>
      </div>
    </form>
</div>
</div>
</body>
</html>