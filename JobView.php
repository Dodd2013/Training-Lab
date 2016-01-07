<style type="text/css">
	td{
		padding: 5px;
		border: solid;
	}
</style>
<?php
	require_once "config.php";
	$con=mysql_connect($DB_IP, $DB_USER, $DB_PASSWORD);
	mysql_select_db($DB_NAME,$con);
	$result=mysql_query("select * from tb_job");
	echo "<table><tr><td>Title</td><td>Company Name</td><td>Job Location</td><td>Description</td><td>Status</td></tr>";
	while ($row=mysql_fetch_array($result)) {
		echo "<tr><td>".$row['title']."</td><td>".$row['comname']."</td><td>".$row['location']."</td><td>".$row['description']."</td>
<td>".$row['jstatus']."</td><td><input type='checkbox' name='interested' vlaue='interested'>Interested</input></td></tr>";	
	}
	echo "</table><button onclick='alert();'>Send Job Resume</button>";
	mysql_close($con);
?>
