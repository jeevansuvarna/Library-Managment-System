<!DOCTYPE html>
<html>
<head>
  <title>Book Details</title>
    <link rel="stylesheet" type="text/css" href="{{asset('frontside/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('frontside/style_bookdetails.css')}}">
        <link href="frontside/css1/font-awesome.css" rel="stylesheet">

    <link href="{{asset('frontside/css1/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">

    <script src="{{asset('frontside/js1/jquery-2.1.4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('frontside/hide_search.js') }}"></script>
</head>

<body>
  <div id="sticky">
  <header>  Library Management System </header>
  <nav class="navigation navbar navbar-expand-sm">
      <ul class="navbar-nav">
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
</div>
<br>

<div class="container-width">
      <div class="row">
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h2 class="title">Book Details</h2>
            <div class="pull-right" style="display:inline;">
              <span class="clickable filter search" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                <i class="glyphicon glyphicon-search"></i><span> Search</span>
              </span>
            </div>
          </div>
          <div class="panel-body" >
            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Search by ID, Book name, Author name, Genre, Edition ..." />
          </div>
          <table class="table table-hover" id="dev-table">
            <thead>
                 <tr >
      <th>Book ID</th>
      <th>Book Title</th>
      <th>Author Name</th>
      <th>Genre</th>
      <th>Edition</th>
      <th>Copies</th>
      <th>Modify</th>
      </tr>
  </thead>
  <tbody id="myTable">

 @foreach($res as $value)
 
  <tr>
    <td>{{$value->id}}</td>
    <td>{{$value->book_name}}</td>
    <td>{{$value->Author_name}}</td>
    <td>{{$value->genre}}</td>
    <td>{{$value->edition}}</td>
    @if($value->copies>'0')
      <td>{{$value->copies}}</td>
    @else
      <td>Out Of Stock</td>
    @endif
    <td><a href="/edit/{{$value->id}}"><i class="fa fa-edit"></i></a></td>
  </tr>
  @endforeach
  </tbody>
  </table>
 </div>
 <br>
</div>
      
</body>
</html>


