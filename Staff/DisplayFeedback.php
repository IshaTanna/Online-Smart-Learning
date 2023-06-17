<?php
	include("Header.php");
	$query="SELECT f.id as f_id,f.subject,f.message,f.email as f_email,f.mobile as f_mobile,f.ReplyMessage,f.admin_id,a.name FROM feedback f join admin a on f.admin_id=a.id";
	$res=mysqli_query($c->con,$query);
?>
<html>
<body style="background-color:#fff0f0;">

<h3>Display Feedback</h3>
<div style="overflow-x:scroll">
  <table class="table table-striped">
    <thead>
      <tr>
        <th>subject</th>
		<th>message</th>
        <th>email</th>
		<th>mobile</th>
		<th>Display Replay Message</th>
		<th>Replyed Admin Name</th>
		</tr>
    </thead>
	<tbody>
<?php
	while($data=mysqli_fetch_assoc($res))
	{
		echo "<tr>
		  <td>$data[subject]</td>
		  <td>$data[message]</td>
		  <td>$data[f_email]</td>
		  <td>$data[f_mobile]</td>
		  <td>$data[ReplyMessage]</td>
		  <td>$data[name]</td>
		  </tr>";	   
	}
?>
</tbody>
</table></div>
</body>
</html>
<?php
include("Footer.php");
?>