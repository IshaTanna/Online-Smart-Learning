<?php
	include("Header.php");
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$password=$_POST['password'];
		$FirstName=$_POST['FirstName'];
		$LastName=$_POST['LastName'];
		echo "$email - $password - $FirstName - $LastName";
	}
?>  
	<h3>Login Page</h3>
	<form action="" method="post">
	<div class="form-group">
    <label for="exampleInputEmail1">Enter Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	</div>
	<div class="form-group">
    <label for="exampleInputPassword1">Enter Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
	</div>
	<div class="form-group">
      <label for="exampleInputPassword1">First Name</label>
		<input type="text" name="FirstName" class="form-control" id="exampleInputPassword1" placeholder="First name">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Last Name</label>
	   <input type="text" name="LastName" class="form-control" id="exampleInputPassword1" placeholder="Last name">
    </div>
	<button type="submit" name="submit" class="btn btn-primary">Login</button>
	  <div class="form-row">
  </div>
	
	</form>
	
<?php
	include("Footer.php");
?>  