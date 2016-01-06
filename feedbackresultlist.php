<?php 
if($_GET){
	require_once 'DAO.php';
	$db=new DB();
	$data['fb_id'] = $_GET['fb_id'];
	$judge['fb_id'] = '=';
	list($conSql, $mapConData) = $DB->FDFields($data, 'and', $judge);
	$mData = $DB->fetch('select fb_askgroup from tb_feedbacks where ' . $conSql, $mapConData);
	if($mData['fb_askgroup']==0){
		print("This feedback not ask the batch");
	}
	var_dump($mData);
}
?>
