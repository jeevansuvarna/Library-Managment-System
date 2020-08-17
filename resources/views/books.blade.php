<!DOCTYPE HTML>
<html>
<head>
<title>Book Search</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" type="text/css" href="{{asset('frontside/css/bootstrap.css')}}">
<link href="frontside/css1/style.css" rel='stylesheet' type='text/css' />  
<link rel="stylesheet" type="text/css" href="{{ asset('frontside/style_books.css') }}">
<link href="frontside/css1/font-awesome.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="{{asset('frontside/hide_search.js') }}"></script>
</head> 

<body>
  <div class="page-container sidebar-collapsed">
    <header>  Library Management System </header>
   <div class="left-content"></div>
    <br>              
    <div class="container-width">
      <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2 class="title">Books</h2>
            <div class="pull-right" style="display: inline">
              <span class="clickable filter search" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                <i class="glyphicon glyphicon-search"></i><span>Search</span>
              </span>
            </div>
          </div>
          <div class="panel-body">
            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Search by Book name or Author name ..." />
          </div>
          <table class="table table-hover" id="dev-table" >
            <thead id="myTableHead">
                <th>Book Name</th>
                <th>Author's Name</th>
                <th>Status</th>
          </thead>
          <tbody id="myTableBody">
            @foreach($res as $value)
            <tr>
            <td><a href="/describe/{{$value->id}}">"{{$value->book_name}}"</a></td>
            <td>{{$value->Author_name}}</td>
            @if($value->copies > 0)
              <td id="available">Available</td>
            @else
              <td id="unavailable">Out of Stock</td>
            @endif
          </tr>

            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <br>
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
   </div> 
   <script src="frontside/toggle_menu_bar.js"></script>
</body>
</html>