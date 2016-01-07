<form target="msg" method="post" class="am-form" action="JobView_PHP.php" enctype="multipart/form-data">
<table class="am-table-compact am-table-centered am-table am-table-bordered am-table-radius am-table-striped am-table-striped am-table-hover"><tr><td>Title</td><td>Company Name</td><td>Job Location</td><td>Description</td><td>Status</td></tr>
<?php
	require_once "config.php";
	$con=mysql_connect($DB_IP, $DB_USER, $DB_PASSWORD);
	mysql_select_db($DB_NAME,$con);
	$result=mysql_query("select * from tb_job");
	while ($row=mysql_fetch_array($result)) {
		echo "<tr><td>".$row['title']."</td><td>".$row['comname']."</td><td>".$row['location']."</td><td>".$row['description']."</td>
<td>".$row['jstatus']."</td><td><input type='checkbox' name='interested[]' value='".$row['user_email']."'>Interested</input></td></tr>";	
	}
	echo "</table><button type='submit' onclick='submitfrom();'>Send Job Resume</button></form>";
	mysql_close($con);
?>
<script>
  function submitfrom(){
    $("#my-alert").modal('toggle');
  }
</script>
