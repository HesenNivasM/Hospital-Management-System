<?php 
	$connection=mysqli_connect('localhost','root','hesennivas','dk');
	if(mysqli_connect_errno()){
			echo "Failed to connect";
	}
		error_reporting(E_ALL ^ E_NOTICE);
		error_reporting(E_ALL ^ E_WARNING);
	session_start();
   	$username=$_SESSION['username_doctor_access'];

   	function resultToArray($result){
   		$rows=array();
   		while($row=$result->fetch_assoc()){
   			$rows[]=$row;
   		}
   		return $rows;
   	}

    $query="SELECT * FROM doctor_details WHERE username='$username'";
	$result = mysqli_query($connection,$query);
    $doctor = mysqli_fetch_assoc($result);

    $doctor_id=$doctor['id'];
	$query="SELECT * FROM blockchain WHERE doctor_id=$doctor_id";
	$result = mysqli_query($connection,$query);
    $no_of_patients = mysqli_num_rows($result);
    $rows=resultToArray($result);
    
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
	<br>
	<form method="POST">
		<div class="container">
			<?php for ($i=0; $i <$no_of_patients ; $i++) { ?>
			<?php $patient_id=$rows[$i]['patient_id'];
    $query="SELECT * FROM patient_details WHERE id=$patient_id";
	$result = mysqli_query($connection,$query);
    $patient = mysqli_fetch_assoc($result); ?>
			<p class="alert alert-info">
				<b>Dr.<?php echo $doctor['name']; ?></b>, you have an appointment with <b><?php echo $patient['name']; ?></b> on <b><?php echo $rows[$i]['dates']; ?></b> at <b><?php echo $rows[$i]['timing']; ?></b> has been confirmed.<br>Thank You,<br>Sri Ramakrishna Hospital
			<?php } ?>
		</div>
	</form>
</body>
</html>

<script type="text/javascript">
	function reg(){
		location.href="first_page.php"
	}
</script>