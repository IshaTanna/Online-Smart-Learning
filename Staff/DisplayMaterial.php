<?php
	include("Header.php");
	
	if(isset($_POST['Refresh']))
	{
	    $query="SELECT * FROM material where semester='".$_POST['semester']."' and department='".$_POST['department']."'";
	}
	else
	{
	    $query="SELECT * FROM material";
	    
	}
	if(isset($_POST['ALL']))
	{
	    $query="SELECT * FROM material";
	}
	$res=mysqli_query($c->con,$query);
	
	
	$department  = mysqli_query($c->con,"select * from material group by Department");
	
?>
<form action="" method="post">
<h3>Display Materials</h3>

<style>
a.abc:link,a.abc:visited
{
    background-color: white;
      color: black;
      border: 2px solid green;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
}
a.abc:hover, a.abc:active {
      background-color: green;
      color: white;
}
</style>

<select name="semester">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
</select>
<select name="department">
<?php
while($data = mysqli_fetch_array($department))
{
    echo "<option>$data[3]</option>";
}
?>
    
</select>
<button type="submit" name="Refresh" class="btn btn-primary">Refresh</button>
<button type="submit" name="ALL" class="btn btn-primary">Display All Material</button>
<br><br><br>
</form><div style="overflow-x:scroll">
  <table class="table table-striped" border=3>
    <thead>
      <tr>
        <th>Id</th>
		<th>Title</th>
        <th>Semester</th>
		<th>Department</th>
		<th>Photo</th>
		<th>File</th>
		<th>Video</th>
		<th>Download File</th>
		<th>Download Photo</th>
		</tr>
    </thead>
	<tbody>
<?php
	while($data=mysqli_fetch_array($res))
	{
		echo "<tr>
		  <td>$data[0]</td>
		  <td>$data[1]</td>
		  <td>$data[2]</td>
		  <td>$data[3]</td>
		  <td><img src='../public/img/$data[4]' height=50 widtd=50></td>
		  <td>$data[5]</td>
          <td>$data[6]</td>
          <td><a href='../public/PDF/$data[5]' download class='abc'>Download File</a></td>
          <td><a href='../public/img/$data[4]' download class='abc'>Download Photo</a></td>";
          echo "</tr>";
	}	  	
?>
</tbody>
</table></div>
<?php
include("Footer.php");
?>