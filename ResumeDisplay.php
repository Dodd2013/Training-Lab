
<?php
	session_start();
	if(isset($_GET['username'])){
		$username=$_GET['username'];
	}
	else{
		if(!isset($_SESSION['username'])) {
			echo "You haven't submit your resume.";
			header('Location: user.php#Resume.php');
		}
		$username=$_SESSION['username'];
	}
	
	require_once "config.php";
	$con=mysql_connect($DB_IP, $DB_USER, $DB_PASSWORD);
	mysql_select_db($DB_NAME,$con);
	$result=mysql_query("select * from tb_resume where username='$username';");
	$row=mysql_fetch_array($result);
	echo "<table class='am-table'>";
	echo "<tr><td>UserName: ".$row['username']."</td><td>Chinese Name: ".$row['chname']."</td><td>
Profile: <img height='200' width='330' src='userdata/img/".$_SESSION['img']."'/></td></tr>"; 
	echo "<tr><td>Ginder: ".$row['ginder']."</td><td>Birth: ".$row['birth']."</td><td>Phone: ".$row['phone']."</td><td>Uploaded File: ".substr($row['filepath'], 16)."</td></tr>";
	echo "<tr><td>Address: ".$row['address']."</td><td>Province: ".$row['province']."</td><td>City: ".$row['city']."</td><td>Town: ".$row['town']."</td></tr>";
	echo "<tr><td>Career: ".$row['career']."</td><td>Degree: ".$row['degree']."</td><td>Track: ".$row['track']."</td><td>Skill: ".$row['skill']."</td></tr>";
	echo "<tr><td>Joblocation1: ".$row['joblocation1']."</td><td>Joblocation2:".$row['joblocation2']."</td><td>Joblocation3: ".$row['joblocation3']."</td></tr>";
	echo "</table>";

	mysql_close($con);
?>

	