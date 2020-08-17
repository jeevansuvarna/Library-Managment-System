<!DOCTYPE html>
<html>
<head>
  <title>Admin registration</title>
  <link rel="stylesheet" type="text/css" href="{{asset('frontside/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontside/style_addAdmin.css') }}">
</head>

<body>
  <header>  Library Management System </header>
<nav class="navigation navbar navbar-expand-sm">
      <ul class="navbar-nav align_buttons">
        <li class="nav-color">
         <a id="home" class="nav-link nav-item" href="/adminpage"><b>ADMIN HOME</b></a>
        </li>
        <li class="nav-color">
          <a class="nav-link nav-item" href="/userdetails">User Details</a>
        </li>
        <li class="nav-color">
          <a class="nav-link nav-item" href="/bookdetails">Book details</a>
        </li>
        <li class="nav-color">
          <a class="nav-link nav-item" href="/add_admin">Add new admin</a>
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
    <form action="/admin_register" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="login-wrap">
      <div class="login-html">
      <label for="tab-1" class="tab">Add admin</label>
      <div class="login-form">
            <div class="group">
              <label for="adminname" class="label">Admin Name</label>
              <input name="adminname" type="text" class="input" pattern="[a-zA-Z0-9_ ]+" placeholder="Used for future login" value="{{old('name')}}" autofocus required>
            </div>
          <div class="group">
           <label for="phone" class="label">Phone Number</label>
           <input name ="phone" type="phone" title="10-digit valid phone number" pattern="[0-9]{10}" maxlength="10" placeholder="Ente valid phone number" value="{{old('phone')}}" class="input" required>
          </div>
            <div class="group">
              <label for="pass1" class="label">Password</label>
              <input name ="pass1" type="password" minlength="8" maxlength="15" class="input" data-type="password" placeholder="8-15 character password" required>
            </div>
            <div class="group">
              <label for="pass2" class="label">Your password</label>
              <input name ="pass2" type="password" class="input" data-type="password" placeholder="Enter your current password" required>
            </div>
            <br>
            <div class="group">
              <input type="submit" class="button" value="submit">
            </div>
        </div>
      </div>
      </div>
    </form>
</div>
</div>

</body>
</html>