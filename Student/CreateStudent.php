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
<div class="mt-5 container">

<?php
	if(isset($_POST['submit']))
	{
		$Name=$_POST['Name'];
		$MobileNo=$_POST['MobileNo'];
		$email=$_POST['email'];
		$Password=$_POST['Password'];
		$Date_of_Birth=$_POST['Date_of_Birth'];
		$department=$_POST['department'];
		$semester=$_POST['semester'];
		$Photo=$_FILES['Photo']['name'];
		$LastLoginDateTime = date( 'd-m-y h:i:s');
		$query="INSERT INTO `student` (`name`, `mobile`, `email`, `password`,`date_of_birth`, `Department`, `Semester`, `photo`, `last_login_date_time`) VALUES ('$Name', '$MobileNo', '$email','$Password', '$Date_of_Birth', '$department', '$semester', '$Photo',$LastLoginDateTime')";
		if($c->isUnique("select * from student where email='$email'"))
		{
			move_uploaded_file($_FILES['Photo']['tmp_name'],"../public/img/".$_FILES['Photo']['name']);
			mysqli_query($c->con,$query) or die("Error:".mysqli_error($c->con));
			echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Success!</strong>Student Created
			</div>	';
			echo "<script>window.location='index.php'</script>";
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
<script>
    function onlyNumberKey(evt) {
          
        // Only ASCII charactar in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
<br><br><br>
<h3>Create New Student</h3>
	<form action="" method="post" enctype="multipart/form-data">
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Enter Name</label>
      <input type="text" name="Name" class="form-control" id="inputEmail4" placeholder="name">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Enter Mobile No</label>
      <input type="text" name="MobileNo" maxlength="10" onkeypress="return onlyNumberKey(event)" class="form-control" id="inputPassword4" placeholder="Mobile No">
    </div>
	</div>
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Enter Email address</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Enter Password</label>
      <input type="password" name="Password" class="form-control" id="inputPassword4" placeholder="Password">
    </div>
	</div>
	<div class="form-row">
	<div class="form-group col-md-6">
    <label for="inputPassword4">Date of Birth</label>
    <input type="date" name="Date_of_Birth" class="form-control" placeholder="Date of Birth">
	</div>
	<div class="form-group">	
    <label for="form-group col-md-6">Select Photo</label>
    <input type="file" name="Photo" class="form-control" required>
	</div>
	</div>
	<div class="form-row">
	<div class="form-group col-md-6">
	  <label for="input">Department</label>
	  <select  class="form-control" name="department">
		<option selected>Computer</option>
		<option >Electric</option>
		<option >Mechanical</option>
		<option >Transport</option>
		<option >Civil</option>
	  </select>
	</div>
	<div class="form-group col-md-6">
	  <label for="inputState">Semester</label>
	  <select  class="form-control" name="semester">
		<option selected>1st</option>
		<option >2nd</option>
		<option >3rd</option>
		<option >4th</option>
		<option >5th</option>
		<option >6th</option>
		<option >7th</option>
		<option >8th</option>
	  </select>
	</div>    
	</div>
	
	<button type="submit" name="submit" class="btn btn-primary">Create Student</button>
	</form>
<?php
include("Footer.php");
?>  