<?php
session_start();
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
</style>
<body>
<script>
    function onlyNumberKey(evt) {
        // Only ASCII charactar in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
<br>
<div class="mt-5 container">
<?php
 if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$Photo=$_FILES['Photo']['name'];
		$Password=$_POST['Password'];
		$Name=$_POST['Name'];
		$MobileNo=$_POST['MobileNo'];
		$LastLoginDateTime = date( 'd-m-y h:i:s');
		$query="INSERT INTO `admin` (`email`, `Photo`, `password`, `name`, `mobileno`, `last_login_date_time`) VALUES ('$email', '$Photo', '$Password', '$Name', '$MobileNo', '$LastLoginDateTime')";
		if($c->isUnique("select * from admin where email='$email'"))
		{
			move_uploaded_file($_FILES['Photo']['tmp_name'],"../public/img/".$_FILES['Photo']['name']);
			mysqli_query($c->con,$query) or die("Error:".mysqli_error($c->con));
			echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Success!</strong>Admin Created
			</div>	';
			echo "<script>window.location='index.php'</script>";
		}
		else
		{
			echo '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Alert!</strong>Email Already Exist</div>';
		}
	}
?>  
<br><br><br>
	<h3>Create New Admin</h3>
	<form action="" method="post" enctype="multipart/form-data">
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Enter Email address</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="email" required >
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Photo</label>
      <input type="file" name="Photo" class="form-control" id="inputPassword4" required>
    </div>
	</div>
	<div class="form-group">
    <label for="exampleInputPassword1">Enter Password</label>
    <input type="password" name="Password" class="form-control" placeholder="Password" required >
	</div>
	<div class="form-group">	
    <label for="exampleInputPassword1">Enter First Name</label>
    <input type="text" name="Name" class="form-control" placeholder="Name" required >
	</div>
	<div class="form-group">
    <label for="exampleInputPassword1">Enter Mobile No</label>
    <input type="text" name="MobileNo" class="form-control" onkeypress="return onlyNumberKey(event)" maxlength="10" placeholder="Mobile No" required >
	</div>
	<button type="submit" name="submit" class="btn btn-primary" >Create Admin</button>
	</form>
</div>
<?php
include("Footer.php");
?>  