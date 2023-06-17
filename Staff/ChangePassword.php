<?php
	include("Header.php");
	if(isset($_POST['submit']))
	{
		$OldPassword=$_POST['OldPassword'];
		$NewPassword=$_POST['NewPassword'];
		$NewConfirmPassword=$_POST['NewConfirmPassword'];
		if($NewPassword!=$NewConfirmPassword)
		{
			echo '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Not Match:</strong>Old Password Not Match!
				</div>';
		}
		else if($OldPassword!=$_SESSION['AdminData']['password'])
		{
			echo '<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Not Match:</strong>Old Password Not Match!
				</div>';
		}
		else
		{
			$query="UPDATE admin set password='$NewPassword' where email='".$_SESSION['AdminData']['email']."'";
			mysqli_query($c->con,$query) or die("Error: ".mysqli_error($c->con));
			$_SESSION['AdminData']['password']=$NewPassword;
			echo '<div class="alert alert-success alert-dismissible">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
				<strong>Update:</strong>Your Password Change Successful!!
				</div>';
		}
	}
?>  

	<h3>Change Password</h3>
	<form action="" method="post">
	<div class="form-group">
    <label for="exampleInputPassword1">Old Password</label>
    <input type="password" name="OldPassword" class="form-control" id="exampleInputPassword1" placeholder="Old Password">
	</div>
	<div class="form-group">
    <label for="exampleInputPassword1">Enter New Password</label>
    <input type="password" name="NewPassword" class="form-control" id="exampleInputPassword1" placeholder="New Password">
	</div>
	<div class="form-group">
    <label for="exampleInputPassword1">Enter New Confirm Password</label>
    <input type="password" name="NewConfirmPassword" class="form-control" id="exampleInputPassword1" placeholder="New Confirm Password">
	</div>
	<button type="submit" name="submit" class="btn btn-primary">Change Password</button>
	</form>
<?php
include("Footer.php");
?>