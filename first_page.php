<!DOCTYPE html>
<html>
<head>
	<title>Sri Ramakrishna Hospital</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-dark bg-dark justify-content-between">
 		 <a class="navbar-brand text-white"><h3>Sri Ramakrishna Hospital</h3></a>
 		 <input class="btn btn-danger" type="submit" name="register" value="Register" onclick="reg();">
	</nav>
	<br>
	<div class="container">
		<div class="row border border-primary">
			<div class="col-sm">
				<p>A single point entry for all the doctors in the Hospital</p>
				<input class="btn btn-primary" type="submit" name="doctor_access" value="Doctor Entry" onclick="doc();">
			</div>
			<div class="col-sm">
				<p>A simple and easy way ro make an appointment with your respected doctor</p>
				<input class="btn btn-primary" type="submit" name="patient_access" value="Patient Entry" onclick="patient();">
				<br>
				<br>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	function doc(){
		location.href="doctor_login.php";
	}
	function patient(){
		location.href="patient_login.php";
	}
	function reg(){
		location.href="check.php"
	}
</script>