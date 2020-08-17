
<!DOCTYPE html>
<html>
<head>
	<title>Home | Admin</title>
	<link rel="stylesheet" type="text/css" href="{{asset('frontside/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontside/style_adminPage.css')}}">
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
	<center><h3> <font face="cambria" color="Blue">Book Registration</font></h3></center>
	<hr style="width: 30%">
	<table align="center" width="30%">
		<tr>
			<td>
			<form method="post" action="/add_book" class="form-group" enctype="multipart/form-data">	
				<input type="hidden" name="_token" value="{{csrf_token() }}">
				<fieldset class="scheduler-border">
				<legend class="scheduler-border"><font face="Calibri">Add a new book : </font></legend>
				<div class="control-group">
				<label>Book Name</label>
				<input type="text" class="form-control" name="name" placeholder="Enter the book name" value="{{old('name')}}" required autofocus><br>
				<label>Author</label>
				<input type="text" class="form-control" name="author" placeholder="Enter the Author's name" value="{{old('author')}}" required><br>
				<label>Edition</label>
				<input type="number" class="form-control" name="ed" placeholder="Book edition" value="{{old('ed')}}" min="0"><br>
				<label>Genre</label>
				<input type="text" class="form-control" name="genre" placeholder="Eg: Comedy, Drama, Action ..." value="{{old('genre')}}"><br>
				<label>Description</label>
				<textarea type="text" class="form-control" name="description" placeholder="Describe the book..." value="{{old('description')}}"></textarea><br>
				<label>Copies</label>
				<input type="number" class="form-control" name="copies" placeholder="Enter Number of copies" value="{{old('copies')}}"><br>
				<label>Upload image : (Size <2MB)</label>
				<br>
				<input id="file" type="file"  name="image" class="form-control"><br>
				<table align="center">
					<tr>
						<td>
							<center><input style="width: 170px; margin: 5px" type="submit" class="btn btn-info" name="Add" value="Add"></center>
						</td>
										<td>
							<center><input style=" width: 170px; margin: 5px" type="reset" class="btn btn-danger" formnovalidate="adminpage" name="cancel" value="Reset" ></center>
						</td>
						
					</tr>
				</table>
			</div>
			</fieldset>
			</form>
		</td>
		</tr>
	</table>
</body>
</html>