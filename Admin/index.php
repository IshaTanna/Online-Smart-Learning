<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Online Smart Learning</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords"
		content="Desk Login form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<!-- //Meta tag Keywords -->

	<link href="//fonts.googleapis.com/css?family=Mukta:200,300,400,500,600,700,800" rel="stylesheet">

	<!--/Style-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!--//Style-CSS -->
</head>

<body>
	<section class="w3l-forms-main-61">
		<div class="form-inner">
			<div class="wrapper">
				<div class="d-grid top-form">
					<div class="logo">
						<a class="brand-logo" href="index.html"><span><span class="fa fa-viadeo"
									aria-hidden="true"></span>Login form</span></a>
						<!-- if logo is image enable this   
									<a class="brand-logo" href="#index.html">
										<img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
									</a> -->
					</div>
				</div>
				
				<div class="form-bg-blur">
					<div class="form-61">
						<?php
					if(isset($_POST['Submit']))
					{
						require("../Db/Connection.class.php");
						$c = new  Connection();
						$email = $_POST['email'];
						$password = $_POST['password'];
						$query = "SELECT * FROM admin where email='$email' and password='$password'";
						if(!$c->isUnique($query))
						{
							$_SESSION['AdminData']['email'] = $email;
							$_SESSION['AdminData']['password'] = $password;
							$query = "update admin set LastLoginDateTime='".date('d/m/Y h:i:s')."' where email='$email'";
							mysqli_query($c->con,$query);
							echo "<script>window.location='Feedback.php'</script>";
						}
						else
						{
							echo "<h2 style='color:red'><center>Invalid : Email or Password</center></h2>";
						}
					}
				?>
						<h1 class="form-head">Admin Login</h1>
						
						<form action="" method="POST">
							<div class="">
								<p class="text-head">Email</p>
								<input type="email" name="email" class="input" placeholder="Email: " required />
							</div>
							<div class="">
								<p class="text-head">Password</p>
								<input type="password" name="password" class="input" placeholder="Password: " required />
							</div>
							<button type="submit" name="Submit" class="signinbutton btn">Login</button>
							<p class="signup">Forgot password?<a href="ForgotPassword.php" class="signuplink">Click here</a></p>
						</form>
					</div>
				</div>
				<div class="go-to-home text-center">
					<p>Want to Create account? <a class="btn" href="CreateAdmin.php"> Signup </a></p>
				</div>
				</div>
			</div>
	</section>
</body>

</html>