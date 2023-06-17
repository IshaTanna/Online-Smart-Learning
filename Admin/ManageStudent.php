<?php
	include("Header.php");
	$query="SELECT *FROM student";
	$res=mysqli_query($c->con,$query);
?>
<style>
img {
  border-radius: 50%;
}
</style>
<h3>List - All Student</h3><div style="overflow-x:scroll">
  <table class="table table-striped">
    <thead>
      <tr>
		<th>id</th>
        <th>name</th>
        <th>mobile</th>
		<th>email</th>
		<th>password</th>
		<th>date_of_birth</th>
		<th>Department</th>
		<th>Semester</th>
		 <th>Photo</th>
		<th>last_login_date_time</th>
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
		<td>******</td>
		<td>$data[5]</td>
		<td>$data[6]</td>
		<td>$data[7]</td>
		<td><img src='../public/img/$data[8]' height=50 widtd=50></td>
		<td>$data[9]</td>
		</tr>";
		}
		else
		{
		echo "<tr>
        <td>$data[0]</td>
        <td>$data[1]</td>
        <td>$data[2]</td>
		<td>$data[3]</td>
		<td>******</td>
		<td>$data[5]</td>
		<td>$data[6]</td>
		<td>$data[7]</td>
		<td><img src='../public/img/$data[8]' height=70 widtd=70></td>
		<td>$data[9]</td>
		</tr>";
		}
	}
?>
</tbody>
</table></div>
<?php
include("Footer.php");
?>  