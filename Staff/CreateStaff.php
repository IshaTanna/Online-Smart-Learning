<?php
session_start();
require("../Db/Connection.class.php");
$c = new  Connection();
?>
<script>
    function onlyNumberKey(evt) {
          
        // Only ASCII charactar in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
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
    <div class="mt-5 container">

<?php
	if(isset($_POST['submit']))
	{
		$StaffName=$_POST['StaffName'];
		$MobileNo=$_POST['MobileNo'];
		$email=$_POST['email'];
		$Password=$_POST['Password'];
		$Date_of_Birth=$_POST['Date_of_Birth'];
		$Photo=$_FILES['Photo']['name'];
		$LastLoginDateTime = date( 'd-m-y h:i:s');
		$query="INSERT INTO `staff` (`staff_name`, `mobile`, `email`, `password`, `date_of_birth`, `photo`,`last_login_date_time`) VALUES ('$StaffName', '$MobileNo', '$email', '$Password', '$Date_of_Birth', '$Photo','$LastLoginDateTime')";
		if($c->isUnique("select * from staff where email='$email'"))
		{
			move_uploaded_file($_FILES['Photo']['tmp_name'],"../public/img/".$_FILES['Photo']['name']);
			mysqli_query($c->con,$query) or die("Error:".mysqli_error($c->con));
			echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Success!</strong>Staff Created
			</div>	';
			echo "<script>window.location='../Staff_StudentLogin.php'</script>";
		}
		else
		{
			echo '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Error:</strong>Email Already Exist!!!
			</div>';
		}
	}
?>  
<br><br><br>

	<h3>Create New Staff</h3>
	<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">	
    <label for="exampleInputPassword1">Enter Staff Name</label>
    <input type="text" name="StaffName" class="form-control" id="inputEmail4" placeholder="Staff Name" required>
	</div>
	<div class="form-group">
    <label for="exampleInputPassword1">Enter Mobile No</label>
    <input type="text" name="MobileNo" class="form-control" maxlength="10" onkeypress="return onlyNumberKey(event)" 
 id="inputEmail4" placeholder="Mobile No" required>
    
	</div>
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Enter Email address</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="email" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Enter Password</label>
      <input type="password" name="Password" class="form-control" id="inputPassword4" placeholder="password" required>
    </div>
	</div>
	<div class="form-row">
	<div class="form-group col-md-6">
    <label for="inputEmail4">Date of Birth</label>
    <input type="date" name="Date_of_Birth" class="form-control" placeholder="Date of Birth" required>
	</div>
	<div class="form-group col-md-6">
    <label for="inputEmail4">Photo</label>
    <input type="file" name="Photo" class="form-control" required>
	</div>
	</div>
	
	<button type="submit" name="submit" class="btn btn-primary">Create Staff</button>
	</form>
<?php
include("Footer.php");
?> 