<!DOCTYPE html>
<html>
<head>
	<title>Sri Ramakrishna Engineering College</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-dark bg-dark justify-content-between">
 		 <a class="navbar-brand text-white"><h3>Sri Ramakrishna Hospital</h3></a>
 		 <input class="btn btn-danger" type="submit" id="register" value="Back" onclick="summa();">
	</nav>
	<div class="container" id="pwd">
		<label>Password</label>
		<input type="text" id="password" class="form-control">
		<br>
		<button class="btn btn-primary" onclick="vanish();">Enter</button>
	</div>
</body>
</html>

<script type="text/javascript">
	function vanish(){
		var password=document.getElementById("password").value;
		if(password=="dk"){
			location.href="register.php";
		}
	}
	function summa(){
		location.href="first_page.php"
	};
</script>