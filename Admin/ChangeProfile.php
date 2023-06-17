<?php
include("Header.php");
if(isset($_POST['submit']))
{
    $mobileno = $_POST['mobileno'];
	$name = $_POST['name'];	
	$query = "update admin set name='$name',mobileno='$mobileno' where email='".$_SESSION['AdminData']['email']."'";
	mysqli_query($c->con,$query) or die("Error : ".mysqli_error($c->con));
	echo '<div class="alert alert-success alert-dismissible">
		  <button type="button" class="close" data-dismiss="alert">&times;</button>
		  <strong>Success!</strong> Your Profile Change Successful
		</div>';
}
$query = "SELECT * FROM admin where email='".$_SESSION['AdminData']['email']."'";
$res = mysqli_query($c->con,$query) or die("Error : ".mysqli_error($c->con));
$data = mysqli_fetch_array($res);
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
  <h3>Change Profile</h3>
  <form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile No</label>
    <input type="text" name="mobileno" onkeypress="return onlyNumberKey(event)" maxlength="10" value="<?php echo $data[5]; ?>" class="form-control"   placeholder="Enter Mobile No" required >    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Your Name</label>
    <input type="text" name="name" value="<?php echo $data[4]; ?>"  class="form-control" id="exampleInputPassword1" placeholder="Your Name" required >
  </div> 
  <button type="submit" name="submit" class="btn btn-primary">Change Profile</button>
</form>
<?php
include("Footer.php");
?>  