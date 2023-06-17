<?php
	include("Header.php");
	if(isset($_POST['submit']))
	{
		$StaffName=$_POST['StaffName'];
		$MobileNo=$_POST['MobileNo'];
		$email=$_POST['email'];
		$Password=$_POST['Password'];
		$Date_of_Birth=$_POST['Date_of_Birth'];
		$Photo=$_FILES['Photo']['name'];
		$is_active=$_POST['is_active'];
		$register_data=$_POST['register_data'];
		$LastLoginDateTime = date( 'd-m-y h:i:s');
		$query="INSERT INTO `staff` (`staff_name`, `mobile`, `email`, `password`, `date_of_birth`, `photo`, `is_active`, `register_date`) VALUES ('$StaffName', '$MobileNo', '$email', '$Password', '$Date_of_Birth', '$Photo', '$is_active', '$register_data')";
		if($c->isUnique("select * from staff where email='$email'"))
		{
			move_uploaded_file($_FILES['Photo']['tmp_name'],"../public/img/".$_FILES['Photo']['name']);
			mysqli_query($c->con,$query) or die("Error:".mysqli_error($c->con));
			echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Success!</strong>Staff Created
			</div>	';
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
<h3></h3>
	<h3>Create New Staff</h3>
	<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">	
    <label for="exampleInputPassword1">Enter Staff Name</label>
    <input type="text" name="StaffName" class="form-control" placeholder="Staff Name">
	</div>
	<div class="form-group">
    <label for="exampleInputPassword1">Enter Mobile No</label>
    <input type="number" name="MobileNo" class="form-control" placeholder="Mobile No">
	</div>
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Enter Email address</label>
      <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="email">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Enter Password</label>
      <input type="password" name="Password" class="form-control" id="inputPassword4">
    </div>
	</div>
	<div class="form-row">
	<div class="form-group col-md-6">
    <label for="inputPassword4">Date of Birth</label>
    <input type="date" name="Date_of_Birth" class="form-control" placeholder="Date of Birth">
	</div>
	<div class="form-group col-md-6">
    <label for="inputPassword4">Photo</label>
    <input type="file" name="Photo" class="form-control" required>
	</div>
	</div>
	<div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">is_active</label>
      <input type="text" name="is_active" class="form-control" id="inputEmail4" placeholder="is_active">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">register_data</label>
      <input type="text" name="register_data" class="form-control" id="inputPassword4" placeholder="register_data">
    </div>
	</div>
	<button type="submit" name="submit" class="btn btn-primary">Create Admin</button>
	</form>
<?php
include("Footer.php");
?> 