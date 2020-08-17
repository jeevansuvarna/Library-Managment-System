<!DOCTYPE html>
<html>
<head>
	<title>Oops error</title>
	<style>
		body{
			max-width:100%; max-height: 100%;
			font-family: 'Open Sans',sans-serif;
		}
		div
		{
			width:500px;
			height: 500px;
			margin:auto;
			margin-top:200px;
		}
		h1{
			font-family: 'cooper black';
			display: block;
			text-align: center;
			margin:auto;
			padding:30px 30px 30px 30px;
			border-radius:20px 0px 20px 0px;
			background-color: red;
			background-repeat: no-repeat;
			color:white;
			border: 1px ridge black;
		}
		h3{
			font-family: 'cambria';
			display: block;
			text-align: center;
			margin:auto;
		}
		a{
			margin:auto;
			text-align: center;
			font-size:20px;
			display:block;
			color:blue;
			margin-bottom:10px;
			text-decoration: none;
		}
		a:hover{
			color:red;
			font-weight: bold;

		}
	</style>
</head>
<body>
	<div>
		<h1>You have not logged in!</h1>
		<br>
			<h3><mark>Please login below to view this page</mark></h3><br>
			<a href="/userlogin">Click here to login</a>
			<a href="/home">Home</a>
	</div>

</body>
</html>