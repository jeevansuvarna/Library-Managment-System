<!DOCTYPE html>
<html>
<head>
  <title>User registration</title>
  <link rel="stylesheet" type="text/css" href="{{asset('frontside/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontside/style_userSignin.css') }}">
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
    <form action="/user_register" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="login-wrap">
      <div class="login-html">
      <label for="tab-1" class="tab">New user registration</label>
      <div class="login-form">
            <div class="group">
              <label for="name" class="label">Username</label>
              <input name="name" type="text" class="input" pattern="[a-zA-Z0-9_ ]+" title="No usage of special characters other than space and underscore" placeholder="Used for future login" value="{{old('name')}}" autofocus required>
            </div>
            <div class="group">
            <label for="email" class="label">Email</label>
            <input name ="email" type="email" placeholder="Enter valid email" class="input" value="{{old('email')}}" required>
           </div>
          <div class="group">
           <label for="phone" class="label">Phone Number</label>
           <input name ="phone" type="phone" pattern="[0-9]{10}" title="10-digit mobile number" placeholder="Ente valid phone number" class="input" value="{{old('phone')}}" required>
          </div>
            <div class="group">
              <label for="pass" class="label">Password</label>
              <input name ="pass" type="password" minlength="8" maxlength="15" class="input" data-type="password" placeholder="8-15 character password" required>
            </div>
            <br>
            <div class="group">
              <input type="submit" class="button" value="Sign Up">
            </div>
        </div>
      </div>
      </div>
    </form>
</div>
</div>

</body>
</html>