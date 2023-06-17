<?php
	include("Header.php");
	if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$subject=$_POST['subject'];
		$message=$_POST['message']; 
		$number=$_POST['number'];
		$DateTime_Of_Feedback=date("d-m-y  h:m:s");
		$query="INSERT INTO `feedback` (`subject`, `message`, `email`, `mobile`, `date_of_feedback`) VALUES ('$subject', '$message', '$email', '$number', '$DateTime_Of_Feedback')";
		mysqli_query($c->con,$query) or die("Error:".mysqli_error($c->con));
		echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Success!</strong>FeedBack Uploaded!!!
				</div>';
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
	<h3>FeedBack</h3>
	<form action="" method="post">
	
	<div class="form-group">
		<label for="exampleInputEmail1">Email Id</label>
		<input type="email" name="email" class="form-control"  placeholder="email">  
	</div>
	
	<div>
		<label for="exampleInputPassword1">Comment</label>
		<input type="text" name="message" class="form-control"  placeholder="Write Comment Here">
	</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="exampleInputPassword1">Subject</label>
			<input type="text" name="subject" class="form-control"  placeholder="Write subject Name Here">
		</div>  
		
		<div class="form-group col-md-6">
			<label for="exampleInputPassword1">Mobile No</label>
			<input type="text" onkeypress="return onlyNumberKey(event)" maxlength="10" name="number" class="form-control"  placeholder="Mobile No">
		</div>  
	</div>
	
	<div align=center class="form-group">
		<button type="submit" name="submit" class="btn btn-primary">Submit FeedBack</button>
	</div>
	</form>
	
<?php
include("Footer.php");
?>