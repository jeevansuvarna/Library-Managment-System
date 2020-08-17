
<!DOCTYPE html>
<html>
<head>
	<title>Edit details</title>
	<link rel="stylesheet" type="text/css" href="{{asset('frontside/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontside/style_adminPage.css')}}">
</head>

<body style="background-image:linear-gradient(rgba(250,250,250,1),rgba(250,250,250,1),rgba(250,0,0,0.1),rgba(250,0,0,0.1),rgba(250,0,0,0.2),rgba(250,0,0,0.2),rgba(250,0,0,0.3));">
	<div id="sticky">
	<header>  Library Management System </header>

	<nav class="navigation navbar navbar-expand-sm">
  		<ul class="navbar-nav">
    		<li class="nav-color">
     		 <a id="home" class="nav-link nav-item" href="/adminpage"><b>ADMIN HOME</b></a>
    		</li>
    		<li class="nav-color">
      		<a  class="nav-link nav-item" id="log" href="/adminlogout">Logout</a>
    		</li>
  		</ul>
	</nav>
</div>

	<br>
	@foreach($res as $values)
	<center><h3> <font face="cambria" color="Blue">Update book details</font></h3></center>
	<hr style="width: 30%">
	<table align="center" width="30%">
		<tr>
			<td>
			<form method="post" action="/update_book" class="form-group" enctype="multipart/form-data">	
				<input type="hidden" name="_token" value="{{csrf_token() }}">
				<fieldset class="scheduler-border">
				<legend class="scheduler-border"><font face="Calibri">Edit book details : </font></legend>
				<div class="control-group">
				<label>Book Name</label>
				
				<input type="hidden" name="id" value="{{$values->id}}">
				<input type="text" class="form-control" name="name" placeholder="Enter the book name" value="{{$values->book_name}}" required readonly><br>
				<label>Author</label>
				<input type="text" class="form-control" name="author" placeholder="Enter the Author's name" value="{{$values->Author_name}}" required readonly><br>
				<label>Edition</label>
				<input type="number" class="form-control" name="ed" placeholder="Book edition" value="{{$values->edition}}" min="0"><br>
				<label>Genre</label>
				<input type="text" class="form-control" name="genre" placeholder="Eg: Comedy, Drama, Action ..." value="{{$values->genre}}"><br>
				<label>Description</label>
				<textarea type="text" class="form-control" name="description" placeholder="Describe the book...">{{$values->summary}}</textarea><br>
				<label>Copies</label>
				<input type="number" class="form-control" name="copies" placeholder="Enter Number of copies" value="{{$values->copies}}"><br>
				<label>Upload image : (Size < 2MB)</label>
				<br>
				<input id="file" type="file"  name="image" class="form-control"><br>
				<table align="center">
					<tr>
						<td>
							<center><input style="width: 170px; margin: 5px" type="submit" class="btn btn-info" name="update" value="Update"></center>
						</td>
										<td>
							<center><input style=" width: 170px; margin: 5px" type="submit" class="btn btn-danger" formaction="/delete_book" name="delete" value="Delete Book" ></center>
						</td>
						
					</tr>
				</table>
			</div>
			</fieldset>
			</form>
		</td>
		</tr>
	</table>
	@endforeach
</body>
</html>