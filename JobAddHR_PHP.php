<?php session_start();
	require_once('config.php');
	$con=mysql_connect($DB_IP, $DB_USER, $DB_PASSWORD);
	mysql_select_db($DB_NAME,$con);
	if($_POST&&isset($_POST)){
		$title=$_POST['title'];
		$comname=$_POST['comname'];
		$location=$_POST['location'];
		$description=$_POST['description'];
		$jstatus=$_POST['status'];
		$user_email=$_SESSION['email'];
		if(mysql_query("select * from tb_job where title='$title' and location='$location' and comname='$comname';")){
			mysql_query("delete from tb_job where title='$title' and location='$location' and comname='$comname';");
		}	
		mysql_query("insert into tb_job values('$title','$description','$comname','$location','$jstatus','$user_email');");
		echo "Add Successfully~";
	}else
		echo "Database connected wrong!!";

	mysql_close($con);
?>