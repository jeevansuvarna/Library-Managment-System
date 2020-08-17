<!DOCTYPE html>
<html>
<head>
    <title>Book info</title>
    <link rel="stylesheet" type="text/css" href="{{asset('frontside/css/bootstrap.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('frontside/style_describe.css') }}">
</head>


<body>
  
<header>  Library Management System </header>

  <nav  class="navigation navbar navbar-expand-sm">
      <ul class="navbar-nav">
        <li class="nav-color">
         <a id="home" class="nav-link nav-item" href="/userpage"><b>Dashboard</b></a>
        </li>
        <li class="nav-color">
          <a class="nav-link nav-item" href="/profile">Profile</a>
        </li>
        <li class="nav-color">
          <a class="nav-link nav-item" href="/books">Book Search</a>
        </li>
        <li class="nav-color">
          <a class="nav-link nav-item" href="/delete_user">Delete Account</a>
        </li>
        <li class="nav-color">
          <a  class="nav-link nav-item" id="log" href="/userlogout">Logout</a>
        </li>
      </ul>
  </nav>

@foreach ($res as $value)
<div class="section3" >
<div id="image" class="col-lg-6 col-md-6 col-sm-6 module come-in" >
      <div class="img3">
          <a href="../assets/book_images/{{$value->image}}"><img src="../assets/book_images/{{$value->image}}"></a>
      </div>
</div>
       <div class="container" id="info">
          <div class="title">
            <span>{{$value->book_name}}</span>
          </div>
          <div class="author">
              <span><i>Author</i> : <b>{{$value->Author_name}}</b></span>
          </div>  
          <div class="edition">
              <span><i>Edition</i> : <b>{{$value->edition}}</b></span>
          </div>  
          <div class="genre">
              <span><i>Genre</i> : <b>{{$value->genre}}</b></span>
          </div>   
          <div class="desc">
              <span><i>Description</i> :</span>
              <p>{{$value->summary}}</p>
          </div>
          @if($value->copies > 0)
          <div id="submit">
              <form  action="/borrow" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="id" value="{{$value->id}}">
                <input type="submit" name="issue" value="Issue Book" class="btn-success btn">  
              </form>
          </div> 
         @else
         <div id="submit">
              <form>
                <input type="button" value="Out of stock" class="btn-danger btn">  
              </form>
          </div> 
          @endif
        </div>
      </div>
      @endforeach
</body>
</html>