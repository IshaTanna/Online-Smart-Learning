<?php
	include("Header.php");
	
	$id = $_GET['id'];
	$query="SELECT * FROM feedback where id=".$_GET['id'];
    $res=mysqli_query($c->con,$query) or die(mysqli_error());
	if(isset($_POST['submit']))
	{
	    $rm=$_POST['replybtn'];
	    $query="UPDATE feedback SET ReplyMessage= '$rm' WHERE id=".$_POST['id'];
    	mysqli_query($c->con,$query) or die(mysqli_error($c->con));
    	echo "<script>window.location='DisplayFeedback.php'</script>";
	}
	while($data=mysqli_fetch_array($res))
	{
	    echo '<h3>Reply Feedback</h3>
    <form action="" method="post" enctype="multipart/form-data">';
	   echo "<input type='hidden' name='id' value='$id'>";
	   
	    echo '
	    
	    <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Display Subject : </label>
          <input type="text" name="subject" value='.$data[1].'>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Display Message : </label>
          <input type="text" name="message" value='.$data[2].'>
        </div>
    	</div>';
    	
    	echo '<div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail4">Display Email : </label>
          <input type="email" name="email" value='.$data[3].'>
        </div>
        <div class="form-group col-md-6">
          <label for="inputEmail4">Display Mobile : </label>
          <input type="number" name="mobile" value='.$data[4].'>
        </div>
    	</div>';
    	
    	echo '<div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Reply User Message : </label>
    	    <input type="text" name="replybtn">
    	</div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">ID : </label>
    	    <input type="text" name="id" value='.$data[0].'>
    	</div>
    	</div>';
        echo '<button type="submit" name="submit" class="btn btn-primary">Reply</button>';
    	echo '</form>';

	}
?>
<?php
include("Footer.php");
?>  