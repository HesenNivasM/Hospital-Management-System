<?php
  $connection = mysqli_connect('localhost','root','hesennivas','dk');
  if(mysqli_connect_errno()){
    echo "Failed to connect";
  }
  session_start();
  if(isset($_POST['submit'])){
    $username=mysqli_real_escape_string($connection,$_POST['uname']);
    $password=mysqli_real_escape_string($connection,$_POST['psw']);
    $_SESSION['username_doctor_access']=$username;
    $query="SELECT * FROM doctor_details WHERE username='$username'";

    $result = mysqli_query($connection,$query);
    
    $count = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    if ($row['password'] == $password){
        echo "Login Successful";
        header('Location:doctor_access.php');
    }else{
      echo "Enter valid details";
    }
}
?>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark justify-content-between">
  <a class="navbar-brand text-white"><h3>Sri Ramakrishna Hospital<h3></a>
</nav>
    <form method="POST" action="<?php $_SERVER['PHP_SELF']; ?>">
      <div class="container">
        <br>
        <br>
        <br>
        <div class="form-group">
      <label><b>Username</b></label>
      <input class="form-control" type="text" placeholder="Enter the Username" name="uname"  required>
      <br>
      <label><b>Password</b></label>
      <input class="form-control" type="password" placeholder="Enter the Password" name="psw" required>
      <br>
      <input class="btn btn-primary" type="submit" name="submit" value="Login"> 
    </div>
    </div>
    </form>
  </body>
</html>