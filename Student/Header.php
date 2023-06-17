<?php
session_start();
if(!isset($_SESSION['StudentData']))
{
echo "<script>alert('Invalid Request...!Contact to admin');window.location='index.php'</script>";
}
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
  <script src="../public/popper.min.js"></script>
  <script src="../public/bootstrap.min.js"></script>
</head>
<style>
button:focus {
    outline: 0;
}
h1 {
    content: '';
    border-top: 5px solid;
    margin: 0 0px 0 0;
    flex: 1 0 20px;
}
.navbar .dropdown-menu .form-control {
    width: 200px;
}
</style>
<body style="background-color:#F5F5F5;">
<h1></h1>
<nav class="navbar navbar-expand-lg navbar navbar-light" style="background-color: #e3f2fd;" role="navigation">
<a class="navbar-brand" href="Feedback.php">Online Smart Learning</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar" aria-controls="exCollapsingNavbar" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="container">
		<div class="collapse navbar-collapse" id="exCollapsingNavbar">
            <ul class="nav navbar-nav">           
				<li class="nav-item dropdown">
				  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Feedback
				  </a>
				  <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
					<a class="dropdown-item" href="Feedback.php">Add</a>
					<a class="dropdown-item" href="DisplayFeedback.php">Display Feedback </a>
				  </div>
				</li>
				<li class="nav-item">
                    <a class="nav-link" href="DisplayMaterial.php">Display Material</a>
                </li>
				</li>
				 <li class="nav-item">
                    <a class="nav-link" href="AboutUs.php">About Us</a>
                </li></li>
				</ul>
				
            <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                <li class="nav-item order-2 order-md-1"><a href="#" class="nav-link" title="settings"><i class="fa fa-cog fa-fw fa-lg"></i></a></li>
                <li class="dropdown order-1">
                    <button type="button" id="dropdownMenu1" data-toggle="dropdown" class="btn btn-outline-secondary dropdown-toggle">
					<?php echo $_SESSION['StudentData']['email'] ?> <span class="caret"></span></button>
					
					<ul class="dropdown-menu dropdown-menu-right mt-2" style="background-color:black">
                     
                       <li class="px-3 py-2" style="background-color:#e3f2fd">
                                <div class="form-group text-center">
                                    <small><center><a href="ChangePassword.php">Change password</a></center></small>
                                </div>
								<div class="form-group text-center">
                                    <small><center><a href="ChangeProfile.php">Change Profile</a></center></small>
                                </div>
								<div class="form-group text-center">
                                    <small><center><a href="Logout.php">Logout</a></center></small>
                                </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<h1></h1>
<div id="modalPassword" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Forgot password</h3>
                <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <p>Reset your password..</p>
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<br>
<div class="mt-5 container">