
<!DOCTYPE HTML>
<html>
<head>
  <title>Change password</title>

<link href="frontside/css1/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="{{asset('frontside/css/bootstrap.css')}}">
<link href="frontside/css1/style.css" rel='stylesheet' type='text/css' />   <!-- Custom CSS -->
<link rel="stylesheet" type="text/css" href="{{ asset('frontside/style_changeuserpassword.css') }}">
<script src="frontside/js1/jquery-2.1.4.min.js"></script>   <!-- jQuery -->
</head> 

<body>
   <div class="page-container sidebar-collapsed">
    <header>  Library Management System </header>
   <div class="left-content"></div>
 
   <div class="login-wrap">
   <div class="login-html">   
    <form action="/update_user_password" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="login-wrap">
      <div class="login-html">
      <label for="tab-1" class="tab">Change Password</label>
      <div class="login-form">
            <div class="group">
              <div class="group">
              <label for="cpass" class="label"><b>Current Password</b></label>
              <input name ="cpass" type="password" class="input" data-type="password" required>
              </div>
              <div class="group">
              <label for="pass" class="label"><b>New Password</b></label>
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
      </div>
    </form>
</div>
</div>
<div class="sidebar-menu">
          <header class="logo1">
            <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
            </header>
            <div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                <div class="menu">
                  <ul id="menu" >
                    <li><a href="/userpage"><i class="fa fa-tachometer"></i> <span>Dashboard</span><div class="clearfix"></div></a></li>
                    <li><a href="/profile"><i class="fa fa-user" aria-hidden="true"></i><span>Profile</span><div class="clearfix"></div></a></li>
                    <li><a href="/books"><i class="fa fa-book" aria-hidden="true"></i><span>Book Search</span><div class="clearfix"></div></a></li>
                    <li><a href="/change_userpassword"><i class="fa fa-shield" aria-hidden="true"></i> <span>Change Password</span><div class="clearfix"></div></a></li>
                    <li><a href="/delete_user"><i class="fa fa-remove" aria-hidden="true"></i> <span>Delete Account</span><div class="clearfix"></div></a></li>
                    <li id="menu-academico" ><a href="/userlogout"><i class="fa fa-sign-out" ></i><span> Log Out</span><div class="clearfix"></div></a></li>
                  </ul>
            </div>
      </div>
   </div> 
   <script src="frontside/toggle_menu_bar.js"></script>
 </body>
</html>