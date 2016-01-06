<?php 
if($_GET){
	require_once 'DAO.php';
	$db=new DB();
	$data['fb_id'] = $_GET['fb_id'];
	$judge['fb_id'] = '=';
	list($conSql, $mapConData) = $db->FDFields($data, 'and', $judge);
	$mData = $db->fetch('select fb_askgroup from tb_feedbacks where ' . $conSql, $mapConData);
	if($mData['fb_askgroup']==0){
		print("This feedback not ask the batch! <a href='##' onclick='openresult(".$_GET['fb_id'].");'><b>click here to see the result!</b></a>");
	}else{
		print("<a href='##' onclick='openresult(".$_GET['fb_id'].");'>click here to see <b>ALL</b> the result!</a>");
		$groupsData = $db->fetchALL('select groups from tb_submit where ' . $conSql." group by groups", $mapConData);
		var_dump($groupsData);
	}
}
?>
<script type="text/javascript">
          function openresult(id) {
            var url="feedbackresult.php?fb_id="+id;
            window.open(url,'Feedback','fullscreen=yes,directories=no,titlebar=no,location=no,menubar=no,toolbar=no');
          };
</script>