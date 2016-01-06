<?php
	session_start();
	require_once('DAO.php');
	$db=new DB();
	if($_POST){
		print_r($_FILES);
		if(move_uploaded_file($_FILES["filepath"]["tmp_name"], "userdata/resume/haha.pdf")){
			$file="userdata/resume/haha.pdf";
		}
		else{
			echo "File upload fail!";
			$file="null";
		}
		$inData['username']=$_SESSION['username'];
		$inData['chname']=$_POST['chname'];
		$inData['ginder']=$_POST['ginder'];
		$inData['birth']=$_POST['birth'];
		$inData['phone']=$_POST['phone'];
		$inData['address']=$_POST['add'];
		$inData['province']=$_POST['province'];
		$inData['city']=$_POST['city'];
		$inData['town']=$_POST['town'];
		$inData['career']=$_POST['career'];
		$inData['degree']=$_POST['degree'];
		$inData['track']=$_POST['track'];
		$inData['project']=$_POST['project'];
		$inData['skill']=$_POST['skill'];
		$inData['joblocation1']=$_POST['joblocation1'];
		$inData['joblocation2']=$_POST['joblocation2'];
		$inData['joblocation3']=$_POST['joblocation3'];
		$inData['filepath']=$file;
		$ret = $db->insert('tb_resume', $inData);
		echo '插入' . ($ret ? '成功' : '失败') . '<br/>';
	}

?>
