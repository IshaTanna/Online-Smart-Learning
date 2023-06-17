<?php
require("../Db/Connection.class.php");
$c = new  Connection();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <base url="\">
  <title>Online Smart Learning</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../public/bootstrap.min.css">
  <script src="../public/jquery.min.js"></script>
  <script src="../public//popper.min.js"></script>
  <script src="../public//bootstrap.min.js"></script>
</head>
<style>
button:focus {
    outline: 0;
}

.navbar .dropdown-menu .form-control {
    width: 200px;
}
</style>
<body>


<br>
<div class="mt-5 container">

<?php
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$OTP=$_POST['OTP'];
		$NewPassword=$_POST['NewPassword'];
		$NewConfirmPassword=$_POST['NewConfirmPassword'];
		echo "$email - $OTP - $NewPassword - $NewConfirmPassword";
	}
?>  

	<h3>Forgot Password</h3>
	<form action="" method="post">
	<div class="form-group">
    <label for="exampleInputEmail1">Enter Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	</div>
	<div class="form-group">
    <label for="exampleInputPassword1">Enter New Password</label>
    <input type="password" name="NewPassword" class="form-control" id="exampleInputPassword1" placeholder="Enter New Password">
	</div>
	<div class="form-group">
    <label for="exampleInputPassword1">Enter New Confirm Password</label>
    <input type="password" name="NewConfirmPassword" class="form-control" id="exampleInputPassword1" placeholder="Enter New Confirm Password">
	</div>
	<button type="submit" name="submit" class="btn btn-primary">Forgot Password</button>
	</form>
<?php
include("Footer.php");
?>