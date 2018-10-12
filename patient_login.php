<?php
	$connection=mysqli_connect('localhost','root','hesennivas','dk');
	if(mysqli_connect_errno()){
			echo "Failed to connect";
	}
	error_reporting(E_ALL ^ E_NOTICE);
	if(null!==($_POST['submit'])){
		$name = mysqli_real_escape_string($connection,$_POST["name"]);
		$age = mysqli_real_escape_string($connection,$_POST["age"]);
		$sex = mysqli_real_escape_string($connection,$_POST["sex"]);
		$phn = mysqli_real_escape_string($connection,$_POST["phn"]);
		$result = mysqli_query($connection, "INSERT INTO patient_details(name,age,sex,phn) VALUES ('$name',$age,'$sex',$phn)" );
		$query="SELECT * FROM patient_details WHERE phn=$phn";
  	 	$result = mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);
    	$patient_id=$row['id'];
    	session_start();
		$_SESSION['patient_id']=$patient_id;
		header("Location:doctor_select.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sri Ramakrishna Engineering College</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-dark bg-dark justify-content-between">
 		 <a class="navbar-brand text-white"><h3>Sri Ramakrishna Hospital</h3></a>
 		 <input class="btn btn-danger" type="submit" name="back" value="Back" onclick="reg();">
	</nav>
	<form method="POST">
		<div class="container">
			<br>
			<label>Name </label>
			<input class="form-control" type="text" name="name" required>
			<br>
			<label>Age </label>
			<input class="form-control" type="number" name="age" required>
			<br>
			<label>Sex </label>
			<select class="form-control" name="sex" required>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<option value="Others">Others</option>
			</select>
			<br>
			<label>Phone Number </label>
			<input class="form-control" type="number" name="phn" required>
			<br>
			<input class="btn btn-primary" type="submit" name="submit">
		</div>
	</form>
</body>
</html>

<script type="text/javascript">
	function reg(){
		location.href="first_page.php"
	}
</script>