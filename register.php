<?php
	$connection=mysqli_connect('localhost','root','hesennivas','dk');
	if(mysqli_connect_errno()){
			echo "Failed to connect";
	}
	error_reporting(E_ALL ^ E_NOTICE);
	if(null!==($_POST['submit'])){
		$id = mysqli_real_escape_string($connection,$_POST["id"]);
		$name = mysqli_real_escape_string($connection,$_POST["name"]);
		$qual = mysqli_real_escape_string($connection,$_POST["qual"]);
		$special = mysqli_real_escape_string($connection,$_POST["special"]);
		$phn = mysqli_real_escape_string($connection,$_POST["phn"]);
		$username = mysqli_real_escape_string($connection,$_POST["username"]);
		$password = mysqli_real_escape_string($connection,$_POST["password"]);
		$result = mysqli_query($connection, "INSERT INTO doctor_details(id,name,qual,special,phn,username,password) VALUES ('$id','$name','$qual','$special',$phn,'$username','$password')" );
	}
	if(null!==($_POST['register'])){
		header("Location: first_page.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sri Ramakrishna Engineering College</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<form method="POST">
	<nav class="navbar navbar-dark bg-dark justify-content-between">
 		 <a class="navbar-brand text-white"><h3>Sri Ramakrishna Hospital</h3></a>
 		 <input class="btn btn-danger" type="submit" name="register" value="Back">
	</nav>
	<div class="container"  id="show">
		<br>
		<label>Doctor ID </label>
		<input class="form-control" type="text" name="id">
		<br>
		<label>Doctor Name </label>
		<input class="form-control"  type="text" name="name">
		<br>
		<label>Qualification </label>
		<input class="form-control"  type="text" name="qual">
		<br>
		<label>Specialization</label>
		<select class="form-control"  name="special">
			<option class="level-0" value="Anaesthesiology">Anaesthesiology</option>
			<option class="level-0" value="Cardiology">Cardiology</option>
			<option class="level-0" value="Cardiovascular And Thoracic Surgery">Cardiovascular And Thoracic Surgery</option>
			<option class="level-0" value="Cerebrovascular Functional Neurosurgery">Cerebrovascular &amp; Functional Neurosurgery</option>
			<option class="level-0" value="Clinical Laborator">Clinical Laborator</option>
			<option class="level-0" value="Dentistry">Dentistry</option>
			<option class="level-0" value="Dermatology">Dermatology</option>
			<option class="level-0" value="Diabetology And Endocrinology">Diabetology And Endocrinology</option>
			<option class="level-0" value="Emergency">Emergency</option>
			<option class="level-0" value="ENT">ENT</option>
			<option class="level-0" value="Gastroenterology">Gastroenterology</option>
			<option class="level-0" value="General Medicine">General Medicine</option>
			<option class="level-0" value="General Surgery">General Surgery</option>
			<option class="level-0" value="Haematology">Haematology</option>
			<option class="level-0" value="Interventional Radiology">Interventional Radiology</option>
			<option class="level-0" value="IVF">IVF</option>
			<option class="level-0" value="Liver Transplant Unit">Liver Transplant Unit</option>
			<option class="level-0" value="Maxillofacial Surgery">Maxillofacial Surgery</option>
			<option class="level-0" value="Minimally Invasive Brain">Minimally Invasive Brain</option>
			<option class="level-0" value="Minimally Invasive Brain, Spine, Cerebrovascular Functional Neurosurgery">Minimally Invasive Brain, Spine, Cerebrovascular &amp; Functional Neurosurgery</option>
			<option class="level-0" value="Neonatology">Neonatology</option>
			<option class="level-0" value="Nephrology And Urology">Nephrology And Urology</option>
			<option class="level-0" value="Neurology">Neurology</option>
			<option class="level-0" value="Neurosurgery">Neurosurgery</option>
			<option class="level-0" value="Obstetrician Gynaecologist">Obstetrician &amp; Gynaecologist</option>
			<option class="level-0" value="Oncology – Medical Radiation Nuclear">Oncology – Medical Radiation Nuclear</option>
			<option class="level-0" value="Ophthalmology">Ophthalmology</option>
			<option class="level-0" value="Orthopedics">Orthopedics</option>
			<option class="level-0" value="Paediatrics">Paediatrics</option>
			<option class="level-0" value="Pain Management">Pain Management</option>
			<option class="level-0" value="Plastic Hand Surgery">Plastic &amp; Hand Surgery</option>
			<option class="level-0" value="Psychiatrist">Psychiatrist</option>
			<option class="level-0" value="Pulmonology">Pulmonology</option>
			<option class="level-0" value="Radiology">Radiology</option>
			<option class="level-0" value="Rheumatology and Clinical Immunology">Rheumatology and Clinical Immunology</option>
			<option class="level-0" value="Spine">Spine</option>
			<option class="level-0" value="Vascular-Surgery">Vascular-surgery</option>
		</select>
		<br>
		<label>Mobile Number </label>
		<input  class="form-control" type="number" name="phn">
		<br>
		<label>Username </label>
		<input  class="form-control" type="text" name="username">
		<br>
		<label>Password </label>
		<input  class="form-control" type="password" name="password">
		<br>
		<input class="btn btn-primary" type="submit" name="submit">
	</div>
	</form>
</body>
</html>
