<?php
	include("Header.php");
	$query="SELECT *FROM staff";
	$res=mysqli_query($c->con,$query);
?>
<style>
img {
  border-radius: 50%;
}
</style>
<h3>List - All Staff</h3><div style="overflow-x:scroll">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>staff_name</th>
        <th>mobile</th>
		<th>email</th>
		<th>password</th>
		<th>date_of_birth</th>
		<th>photo</th>
		<th>last login date time </th>
		</tr>
    </thead>
	<tbody>
<?php
	while($data=mysqli_fetch_array($res))
	{
		if($_SESSION['AdminData']['email']==$data[3])
		{
		echo "<tr>
		  <td>$data[0]</td>
		  <td>$data[1]</td>
		  <td>$data[2]</td>
		  <td>$data[3]</td>
		  <td>$data[4]</td>
		  <td>$data[5]</td>
		  <td><img src='../public/img/$data[6]' height=70 width=70></td>
		  <td>$data[7]</td>
		  </tr>";	 
		
	   }
	   else
	   {
		   echo "<tr>
			  <th>$data[0]</th>
			  <td>$data[1]</td>
			  <td>$data[2]</td>
			  <td>$data[3]</td>
			  <td>*******</td>
			  <td>$data[5]</td>
			  <td><img src='../public/img/$data[6]' height=70 width=70></td>
		      <td>$data[7]</td>
			  </tr>";
	   }
	}
?>
</tbody>
</table></div>
<?php
include("Footer.php");
?>