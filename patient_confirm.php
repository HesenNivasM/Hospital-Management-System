<?php 
	$connection=mysqli_connect('localhost','root','hesennivas','dk');
	if(mysqli_connect_errno()){
			echo "Failed to connect";
	}
	session_start();
	$patient_id=$_SESSION['patient_id'];
	$query="SELECT * FROM blockchain WHERE patient_id=$patient_id";
	$result = mysqli_query($connection,$query);
    $row = mysqli_fetch_assoc($result);

    $doctor_id=$row['doctor_id'];
    $query="SELECT * FROM doctor_details WHERE id=$doctor_id";
	$result = mysqli_query($connection,$query);
    $doctor = mysqli_fetch_assoc($result);

    $patient_id=$row['patient_id'];
    $query="SELECT * FROM patient_details WHERE id=$patient_id";
	$result = mysqli_query($connection,$query);
    $patient = mysqli_fetch_assoc($result);
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
 		 <input class="btn btn-danger" type="submit" id="register" value="Back" onclick="summa();">
	</nav>
	<br>
	<div class="container" id="pwd">
		<div class="alert alert-info">
		<p class="large"><b><?php echo $patient['name']; ?></b>, your appointment with <b>DR.<?php echo $doctor['name']; ?></b> on <b><?php echo $row['dates']; ?></b> at <b><?php echo $row['timing']; ?></b> has been confirmed.<br>Thank You,<br>Sri Ramakrishna Hospital</p>
	</div></div>
</body>
</html>

<script type="text/javascript">
	function summa(){
		location.href="first_page.php"
	};
</script>