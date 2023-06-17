<?php
	include("Header.php");
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$Password=$_POST['Password'];
		$Name=$_POST['Name'];
		$MobileNo=$_POST['MobileNo'];
		$LastLoginDateTime=date("d-m-y h:m:s");
		$query="INSERT INTO `admin` (`email`, `password`, `name`, `mobile no`, `last_login_date_time`) VALUES ('$email', '$Password', '$Name', '$MobileNo', '$LastLoginDateTime')";
		if($c->isUnique("select * from admin where email='$email'"))
		{
			mysqli_query($c->con,$query) or die("Error:".mysqli_error($c->con));
			echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Success!</strong>Admin Created
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

	<h3>Create New Staff</h3>
	<form action="" method="post">
	<div class="form-group">	
    <label for="exampleInputPassword1">Enter Staff Name</label>
    <input type="text" name="StaffName" class="form-control" placeholder="Staff Name">
	</div>
	<div class="form-group">
    <label for="exampleInputPassword1">Enter Mobile No</label>
    <input type="text" name="MobileNo" class="form-control" placeholder="Mobile No">
	</div>
	<div class="form-group">
    <label for="exampleInputEmail1">Enter Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	</div>
	<div class="form-group">
    <label for="exampleInputPassword1">Enter Password</label>
    <input type="text" name="Password" class="form-control" placeholder="Password">
	</div>
	<div class="form-group">
    <label for="exampleInputPassword1">Enter Password</label>
    <input type="date" name="Date_of_Birth" class="form-control" placeholder="Date of Birth">
	</div>
	<div class="form-group">
    <label for="exampleInputPassword1">Photo</label>
    <input type="file" name="Photo" class="form-control">
	</div>
	<div class="form-group">
    <label for="exampleInputPassword1">is_active</label>
    <input type="text" name="is_active" class="form-control" placeholder="is_active">
	</div>
	<div class="form-group">
    <label for="exampleInputPassword1">register_data</label>
    <input type="text" name="register_data" class="form-control" placeholder="register data">
	</div>
	<button type="submit" name="submit" class="btn btn-primary">Create Admin</button>
	</form>
<?php
include("Footer.php");
?> 