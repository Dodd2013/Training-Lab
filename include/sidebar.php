<?php 
if($_SESSION){
	
  if($_SESSION['identity']==''){include_once('include\sidebar_stu.php');}
  if($_SESSION['identity']=='teacher')include_once("include\sidebar_tea.php");
  if($_SESSION['identity']=='hr')include_once("include\sidebar_hr.php");
}else{
  header('Location: index.php#loginSub');
}

 ?>