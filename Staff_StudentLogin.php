<?php
session_start();
if(isset($_POST['choice']))
{
    require("Db/Connection.class.php");
    $c = new  Connection();
    $email = $_POST['email'];
    $password = $_POST['pass'];
    	
    $choice=$_POST['choice'];
    if($choice=="Staff")
    {	
    		$query = "SELECT * FROM staff where email='$email' and password='$password'";
    		if(!$c->isUnique($query))
    		{
    			$_SESSION['StaffData']['email']=$email;
    			$_SESSION['StaffData']['pass']=$password;
    			echo "<script>window.location='Staff/DisplayFeedback.php'</script>";
    		}
    		else
    		{
    			echo "<h4 style='color:red'><center>Invalid : Email or Password</center></h4>";
    		}
    	
    }
    else
    {
    		$query = "SELECT * FROM student where email='$email' and password='$password'";
    		if(!$c->isUnique($query))
    		{
    			$_SESSION['StudentData']['email']=$email;
    			$_SESSION['StudentData']['pass']=$password;
    			echo "<script>window.location='Student/Feedback.php'</script>";
    		}
    		else
    		{
    			echo "<h4 style='color:red'><center>Invalid : Email or Password</center></h4>";
    		}
    	
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Online Smart Learning</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>
				<form class="login100-form validate-form" method="post" action="">
					<span class="login100-form-title">
						LOGIN
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<div class="form-check-inline">
					  <label class="form-check-label">Login as : 
						<label class="form-check-label">  </label>
						<input type="radio" class="form-check-input" name="choice" value="Staff">Staff
					  </label>
					</div>
					<div class="form-check-inline">
					  <label class="form-check-label">
						<input type="radio" class="form-check-input" name="choice" value="Student">Student
					  </label>
					</div>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="Submit">
							Login
						</button>
					</div>
					<div class="text-center p-t-12">
						<span class="txt1">
							Forgot Staff Side
						</span>
						<a class="txt2" href="Staff/ForgotPassword.php">
							Username / Password?
						</a>
						<span class="txt1">
							Forgot Student Side
						</span>
						<a class="txt2" href="Student/ForgotPassword.php">
							Username / Password?
						</a>
					</div>

					<div class="text-center p-t-70">
						<a class="txt2" href="Staff/CreateStaff.php">
							Create Staff Side Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a><br>
						<a class="txt2" href="Student/CreateStudent.php">
							Create Student Side Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
				
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>