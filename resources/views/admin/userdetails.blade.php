<!DOCTYPE html>
<html>
<head>
  <title>User Details</title>
    <link rel="stylesheet" type="text/css" href="{{asset('frontside/css/bootstrap.css')}}">
    <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <link href="{{asset('frontside/css1/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" type="text/css" href="{{asset('frontside/style_userdetails.css')}}">

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
          <div class="panel-heading title-space">
            <h2 class="title">User Details</h2>
            <div class="pull-right" style="display:inline;">
              <span class="clickable filter search" data-toggle="tooltip" title="Toggle table filter" data-container="body">
                <i class="glyphicon glyphicon-search"></i><span> Search</span>
              </span>
            </div>
          </div>
          <div class="panel-body">
            <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Search by User name, Author name, Email, phone, Book ID, Issue date, Return date ..." />
          </div>
          <table class="table table-hover" id="dev-table">
            <thead>
                  <tr>
      <th>Username</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Book1</th>
      <th>Book2</th>
      <th>Issue Date[book1]</th>
      <th>Return Date[book1]</th>
     <th>Issue Date[book2]</th>
      <th>Return Date[book2]</th>

    </tr>
  </thead>
  <tbody id="myTable">
 @foreach($res as $value)
@if($value->book1!='0' && $value->book2=='0')
  <tr>
    <td>{{$value->name}}</td>
    <td>{{$value->email}}</td>
    <td>{{$value->phone}}</td>
    <td><a href="../return1/{{$value->id}}/{{$value->book1}}">Return {{$value->book1}}</a></td>
    <td>-</td>
    <td>{{$value->issue1}}</td>
    <td>{{$value->return1}}</td>
    <td>-</td>
    <td>-</td>
  </tr>
@elseif($value->book1=='0' && $value->book2!='0')
  <tr>
    <td>{{$value->name}}</td>
    <td>{{$value->email}}</td>
    <td>{{$value->phone}}</td>
    <td>-</td>
    <td><a href="../return2/{{$value->id}}/{{$value->book2}}">Return {{$value->book2}}</a></td>
    <td>-</td>
    <td>-</td>
    <td>{{$value->issue2}}</td>
    <td>{{$value->return2}}</td>
</tr>
@elseif($value->book1!='0' && $value->book2!='0')
  <tr>
    <td>{{$value->name}}</td>
    <td>{{$value->email}}</td>
    <td>{{$value->phone}}</td>
    <td><a href="../return1/{{$value->id}}/{{$value->book1}}">Return {{$value->book1}}</a></td>
    <td><a href="../return2/{{$value->id}}/{{$value->book2}}">Return {{$value->book2}}</a></td>
    <td>{{$value->issue1}}</td>
    <td>{{$value->return1}}</td>
    <td>{{$value->issue2}}</td>
    <td>{{$value->return2}}</td>
</tr>
@else
  <tr>
    <td>{{$value->name}}</td>
    <td>{{$value->email}}</td>
    <td>{{$value->phone}}</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
    <td>-</td>
</tr>
@endif
@endforeach
</tbody>
</table>
</div>
<br>
</div>
      
</body>
</html>


