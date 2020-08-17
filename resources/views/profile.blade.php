<!DOCTYPE HTML>
<html>
<head>
  <title>Profile</title>
   <link href="frontside/css1/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="frontside/css1/style.css" rel='stylesheet' type='text/css' />
<link href="frontside/css1/font-awesome.css" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="{{asset('frontside/css/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontside/style_profile.css') }}">

<script src="frontside/js1/jquery-2.1.4.min.js"></script>
</head> 

<body>

<div class="page-container sidebar-collapsed">
  <header>  Library Management System </header>
<div class="left-content"></div>
<br>

<div id="container">
    @foreach($res as $value)
        <h1 id="title" class="site-title">My Profile</h1>
        <div >
            @if($value->image=="")
                <img  src="assets/account.png"  class="rounded-circle" width="200" height="200">
            @else
                <img  src="assets/profile_images/{{$value->image}}"  class="rounded-circle" width="200" height="200">
            @endif
        </div>
        <div id="upload">
            <form action="/upload" method="post"  enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            Upload profile image (Size : < 2MB)<br>(Choose none to remove photo)<input type="file" name="image"><br>
            <input type="submit" value="Upload" class="btn-primary btn" name="submit">
            <hr style="width:100%;border-top:1px ridge grey">
            </form>
        </div>
        <div class="details">
         <div class>
           <h3 class="title" >{{$value->name}} </h3>
         </div>
         <div class="email">
            <u> E-MAIL : </u><br><b>{{$value->email}}</b>
         </div>
         <div class="phone">
            <u> PHONE : </u><br><b>{{$value->phone}}</b>
         </div>
       </div>
       <div class="issue">
            <label>Details of issued books : </label>
            @if($book1=="" && $book2=="")
              <h4>NO BOOK HAS BEEN ISSUED BY YOU</h4>
            @else
              <table id="customers">
                <thead>
                  <th>Book ID</th>
                  <th>Book Name</th>
                  <th>Author name</th>
                  <th>Edition</th>
                  <th>Genre</th>
                  <th>Issue date</th>
                  <th>Return date</th>
                  <th>Status</th>
                </thead>
                <tbody>
                  @if($book1!="")
                    @foreach($b1 as $name)
                    <tr>
                      <td>{{$name->id}}</td>
                      <td>{{$name->book_name}}</td>
                      <td>{{$name->Author_name}}</td>
                      <td>{{$name->edition}}</td>
                      <td>{{$name->genre}}</td>
                      <td>{{$value->issue1}}</td>
                      <td>{{$value->return1}}</td>
                      @if($s1=='0') <td class="nodue">No due</td>
                      @else <td class="due">Due ({{$due1}} Days)</td>
                      @endif
                    </tr>
                    @endforeach
                  @endif
                  @if($book2!="")
                    @foreach($b2 as $name)
                    <tr>
                      <td>{{$name->id}}</td>
                      <td>{{$name->book_name}}</td>
                      <td>{{$name->Author_name}}</td>
                      <td>{{$name->edition}}</td>
                      <td>{{$name->genre}}</td>
                      <td>{{$value->issue2}}</td>
                      <td>{{$value->return2}}</td>
                      @if($s2=='0') <td class="nodue">No due</td>
                      @else <td class="due">Due ({{$due2}} Days)</td>
                      @endif
                    </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
              @endif
         </div>
    @endforeach 
</div>

   <div class="sidebar-menu">
          <header class="logo1">
            <a href="#" id="icon" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> 
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
      <script src="frontside/toggle_menu_bar.js"></script>
</div> 

</body>
</html>