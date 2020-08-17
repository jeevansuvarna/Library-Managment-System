<!DOCTYPE html>
<html>
<head>
	<title>Change password</title>
  <link rel="stylesheet" type="text/css" href="{{asset('frontside/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontside/style_changepassword.css') }}">
</head>


<body>
  <header>  Library Management System </header>

  <nav class="navigation navbar navbar-expand-sm">
      <ul class="navbar-nav">
        <li class="nav-color">
         <a id="home" class="nav-link nav-item" href="/adminpage"><b>ADMIN HOME</b></a>
        </li>
        <li class="nav-color">
          <a class="nav-link nav-item" href="/change_adminpassword">Change Password</a>
        </li>
        <li class="nav-color">
          <a class="nav-link nav-item" href="/delete_admin">Delete Account</a>
        </li>
        <li class="nav-color">
          <a  class="nav-link nav-item" id="log" href="/adminlogout">Logout</a>
        </li>
      </ul>
  </nav>

  <div class="login-wrap">
<div class="login-html">   
    <form action="/update_admin_password" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="login-wrap">
      <div class="login-html">
      <label for="tab-1" class="tab">Change Password</label>
      <div class="login-form">
            <div class="group">
              <div class="group">
              <label for="cpass" class="label">Current Password</label>
              <input name ="cpass" type="password" class="input" data-type="password" required>
              </div>
              <div class="group">
              <label for="pass" class="label">New Password</label>
              <input name ="pass" type="password" minlength="8" maxlength="15" class="input" data-type="password" placeholder="8-15 character password" required>
              </div>
             <br>
            <div class="group">
              <input type="submit" class="button" value="Update">
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