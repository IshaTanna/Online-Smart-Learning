<?php
	include("Header.php");
	if(isset($_POST['submit']))
	{
		$title=$_POST['title'];
		$department=$_POST['department'];
		$semester=$_POST['semester'];
		$Photo=$_FILES['Photo']['name'];
		$file=$_FILES['file']['name'];
		$video=$_POST['Video'];
		$Upload_date=date("d-m-y h:m:i");
		$query="INSERT INTO `material` (`title`, `Semester`, `Department`, `photo`, `file`,`Video` ,`upload_date`) VALUES ('$title', '$semester', '$department', '$Photo', '$file','$video','$Upload_date');";
		if($c->isUnique("SELECT * from material where title='$title'"))
		{
			move_uploaded_file($_FILES['file']['tmp_name'],"../public/PDF/".$_FILES['file']['name']);
			move_uploaded_file($_FILES['Photo']['tmp_name'],"../public/img/".$_FILES['Photo']['name']);
			mysqli_query($c->con,$query) or die("Error : ".mysqli_error($c->con));
			echo '<div class="alert alert-success alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Success!</strong>Material Uploaded!!!
			</div>';
		}
		else
		{
			echo '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<strong>Error:</strong>File Already Uploaded!!!
			</div>';
		}
	}
?>  

	<h3>Material</h3>
	<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
      <label for="inputEmail4">Title</label>
      <input type="text" name="title" class="form-control" id="inputEmail4" placeholder="Title">
    </div>
    <div class="form-row">
	<div class="form-group col-md-6">
	  <label for="inputCity">Department</label>
	  <select  class="form-control" name="department">
		<option selected>Computer</option>
		<option >Electric</option>
		<option >Mechanical</option>
		<option >Transport</option>
		<option >Civil</option>
	  </select>
	</div>
	<div class="form-group col-md-6">
	  <label for="inputState">Semester</label>
	  <select  class="form-control" name="semester">
		<option selected>1</option>
		<option >2</option>
		<option >3</option>
		<option >4</option>
		<option >5</option>
		<option >6</option>
		</select>
	</div>    
</div>
	<div class="form-row">
	<div class="form-group col-md-6">
    <label for="exampleInputPassword1">Photo</label>
    <input type="file" name="Photo" class="form-control" id="exampleInputPassword1">
	</div>
	<div class="form-group col-md-6">
    <label for="exampleInputPassword1">File</label>
    <input type="file" name="file" class="form-control" id="exampleInputPassword1">
	</div>
	</div>
	<div class="form-group">
      <label>Video</label><br>
      <textarea name="Video" rows="2" cols="150"></textarea></div>
	<button type="submit" name="submit" class="btn btn-primary">Upload Material</button>
	</form>
<?php
include("Footer.php");
?>  