<?php
include("Header.php");
	$email=$_SESSION['AdminData']['email'];
	if(isset($_POST['Delete']))
	{
	    if($_SESSION['AdminData']['email']==$_SESSION['Admin']['email'])
    	{
    	    $query="Delete from admin where email='".$_SESSION['Admin']['email']."'";
        	mysqli_query($c->con,$query) or die(mysqli_error($c->con));
    	    unset($_SESSION['AdminData']);
            echo "<script>alert('Delete Account Successful!!');window.location='index.php'</script>";
    	}
        else
        {
    	    $query="Delete from admin where email=$email";
        	mysqli_query($c->con,$query) or die(mysqli_error($c->con));
    	    echo "Delete Account Successful!!";
        }
	}
	$query="SELECT *FROM admin";
	$res=mysqli_query($c->con,$query);
	
	
?>
<form method="post" action="">
<style>
img {
  border-radius: 50%;
}
</style>
<h3>List - All Admin</h3><div style="overflow-x:scroll">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>Email</th>
		<th>Photo</th>
        <th>Password</th>
		<th>Name</th>
		<th>Mobile No</th>
		<th>Last Login</th>
		<th>Delete Account</th>
      </tr>
    </thead>
	<tbody>
<?php
	while($data=mysqli_fetch_array($res))
	{
		if($_SESSION['AdminData']['email']==$data[1])
	   {
	       $_SESSION['Admin']['email']=$data[1];
		echo "<tr>
		  <td>$data[0]</td>
		  <td>$data[1]</td>
		  <td><img src='../public/img/$data[2]' height=70 width=70></td>
		  <td>$data[3]</td>
		  <td>$data[4]</td>
		  <td>$data[5]</td>
		  <td>$data[6]</td>
    	  <td><button type='submit' name='Delete' class='btn btn-dark'>Delete</button></td>
		</tr>";	   
	   }
	   else
	   {
		   echo "<tr>
			  <td>$data[0]</td>
			  <td>$data[1]</td>
			  <td><img src='../public/img/$data[2]' height=70 width=70></td>
			  <td>*****</td>
			  <td>$data[4]</td>
			  <td>$data[5]</td>
			  <td>$data[6]</td>
			</tr>";
	   }
	}
?>
</tbody>
</table></div>
</form>
<?php
include("Footer.php");
?>  