<!DOCTYPE HTML>
<html>
<head>
  <title>Welcome | {{Session::get('userkey')}}</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <link href="frontside/css1/bootstrap.min.css" rel='stylesheet' type='text/css' /> <!-- Bootstrap Core CSS -->
  <link href="frontside/css1/style.css" rel='stylesheet' type='text/css' />   <!-- Custom CSS -->
  <link href="frontside/css1/font-awesome.css" rel="stylesheet">
  <link href="{{asset('frontside/style_userpage.css')}}" rel='stylesheet' type='text/css' />

  <script src="frontside/js1/jquery-2.1.4.min.js"></script>   <!-- jQuery -->
</head> 

<body>
   <div class="page-container sidebar-collapsed">
   <!--/content-inner-->
<div class="left-content">
     <div class="mother-grid-inner">
             <!--header start here-->
        <div class="header-main">
          <div class="logo-w3-agile">
                <h1><a href="/userpage">Home</a></h1>
          </div>
          <div class="clearfix welcome"> <label>Welcome - <span>{{Session::get('userkey')}} </span></label></div>  
        </div>
<!--heder end here-->
  
    <div class="four-grids">
          <div class="col-md-3 four-grid">
            <div class="four-agileits">
              <div class="icon">
                <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
              </div>
              <div class="four-text">
                <h3>Users</h3>
                <h4> {{$users}} </h4>
              </div>
              
            </div>
          </div>
          <div class="col-md-3 four-grid">
            <div class="four-agileinfo">
              <div class="icon">
                <i class="glyphicon glyphicon-book" aria-hidden="true"></i>
              </div>
              <div class="four-text">
                <h3>Books</h3>
                <h4>{{$books}}</h4>
              </div>
              
            </div>
          </div>
          <div class="col-md-3 four-grid">
            <div class="four-w3ls">
              <div class="icon">
                <i class="glyphicon glyphicon-th-large" aria-hidden="true"></i>
              </div>
              <div class="four-text">
                <h3>Genre</h3>
                <h4>{{$genre}}</h4>
                
              </div>
              
            </div>
          </div>
          <div class="col-md-3 four-grid">
            <div class="four-wthree">
              <div class="icon">
                <i class="glyphicon glyphicon-king" aria-hidden="true"></i>
              </div>
              <div class="four-text">
                
                <h3>Library Admins</h3>
                <h4>{{$admins}}</h4>
              </div>
              
            </div>
          </div>
          <div class="clearfix"></div>
        </div> 
        <div id="contact" class="col-sm-4 w3-agileits-crd">
            
                            <div class="card card-contact-list">
                             <div class="agileinfo-cdr">
                                <div class="card-header">
                                    <center><h3>Contact Admin</h3></center>
                                </div>
                                <div class="card-body p-b-20">
                                    <div class="list-group">
                                      @foreach($res as $admin)
                                        <a class="list-group-item media">
                                             <div class="pull-left">
                                                <img class="lg-item-img" src="frontside/admin.png" alt="Admin">
                                            </div>
                                            <div class="media-body">
                                                <div class="pull-left">
                                                  <div id="name" class="lg-item-heading">{{$admin->name}}</div>
                                                  <div id="phone" class="lg-item-text ">Phone : {{$admin->phone}}</div>
                                                </div>
                                                <div class="pull-right">
                                                  <div class="lg-item-heading"></div>
                                                </div>
                                            </div>
                                            <hr>
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
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