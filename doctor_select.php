<?php 
	$connection=mysqli_connect('localhost','root','hesennivas','dk');
	if(mysqli_connect_errno()){
			echo "Failed to connect";
	}
	error_reporting(E_ALL ^ E_NOTICE);
	session_start();
	$special='';
	$patient_id=$_SESSION['patient_id'];
	$get=mysqli_query($connection,"SELECT distinct(special) FROM doctor_details");
	$option = '';
 	while($row = mysqli_fetch_assoc($get))
	{
  		$option .= '<option value = "'.$row['special'].'">'.$row['special'].'</option>';
	}
	if(null!==($_POST['special_select'])){
		$special = mysqli_real_escape_string($connection,$_POST["special"]);
		$_SESSION['special']=$special;
		$get1=mysqli_query($connection,"SELECT name FROM doctor_details where special='$special'");
		$option1 = '';
	 	while($row1 = mysqli_fetch_assoc($get1))
		{
	  		$option1 .= '<option value = "'.$row1['name'].'">'.$row1['name'].'</option>';
		}
	}
	if(null!==($_POST['confirm'])){
		$special=$_SESSION['special'];
		$timing = mysqli_real_escape_string($connection,$_POST["timing"]);
		$doctor = mysqli_real_escape_string($connection,$_POST["doctor"]);
		$dates = mysqli_real_escape_string($connection,$_POST["date"]);
		$query="SELECT * FROM doctor_details WHERE name='$doctor'";
  	 	$result = mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);
    	$doctor_id=$row['id'];
		$query="SELECT * FROM blockchain WHERE doctor_id=$doctor_id";
  	 	$result = mysqli_query($connection,$query);
        $row = mysqli_fetch_assoc($result);
        $check_dates=$row['dates'];
        $check_timing=$row['timing'];
        if($check_timing===$timing&&$check_dates===$dates){
        	echo "Appointment not available";
        }
        else{
		$answer = mysqli_query($connection, "INSERT INTO blockchain(doctor_id,patient_id,dates,timing) VALUES ($doctor_id,$patient_id,'$dates','$timing')" );
		header("Location:patient_confirm.php");
	}
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
 		 <input class="btn btn-danger" type="submit" id="register" value="Back" onclick="summa();">
	</nav>
	<form method="POST">
	<div class="container" id="pwd">
		<label>Select the area of specialization </label>
		<select class="form-control" name="special"> 
			<?php echo $option; ?>
		</select>
		<br>
		<input class="btn btn-primary" type="submit" name="special_select">
		<br>
		<br>
		<label>Select the Doctor in the field of <b><?php echo $special; ?></label></b>
		<select class="form-control" name="doctor"> 
			<?php echo $option1; ?>
		</select>
		<br>
		<label>Select the date and time for appointment with the doctor</label>
		<div class="row">
		<div class="col-sm">
		<select class="form-control" name="timing" id="timing">
			<?php for ($i=9; $i <12; $i++) { ?>
			<option value="<?php echo $i.".00AM";?>"><?php echo $i.".00AM";}?></option>
			<option value="12.00PM">12.00PM</option>
			<?php for ($i=1; $i <=5; $i++) { ?>
			<option value="<?php echo $i.".00PM";?>"><?php echo $i.".00PM";}?></option>
		</select>
		</div>
		<div class="col-sm">
		<input class="form-control" type="date" name="date">
		</div>
		</div>
		<br>
		<input type="submit" name="confirm" value="Confirm" class="btn btn-primary">
	</div>
	</form>
</body>
</html>

<script type="text/javascript">
	function summa(){
		location.href="first_page.php"
	};
</script>