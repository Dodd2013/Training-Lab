<?php
	require_once "config.php";
	$con=mysql_connect($DB_IP, $DB_USER, $DB_PASSWORD);
	mysql_select_db($DB_NAME,$con);
?>
<style type="text/css">
	td{
		padding: 5px;
	}
</style>
	<input type="radio" name="skill" value="Java Track">Java</input>
	<input type="radio" name="skill" value="Dot Net Track">Dot Net</input>
	<input type="radio" name="skill" value="Open Source Track">Open Source</input>
	<input type="radio" name="skill" value="Combined Track">Combined</input>
	<button onclick="submi();" value="Search Resumes">Submit</button>
<?php
	if($_GET){
		$skill=$_GET['skill'];
		$result=mysql_query("select a.user_id,a.user_img,b.chname from tb_users a left join 
tb_resume b on a.user_id=b.username where b.track='$skill'");
		$tmp=1;
		echo "<br><table>";
		while ($row=mysql_fetch_array($result)) {
			if($tmp%4<=3&&$tmp%4>=2){
				echo "<td>".$row['chname'].": <a href='#ResumeDisplay.php?username=".urlencode($row['user_id'])."'><img 
width='100' height='65' src='userdata/img/".$row['user_img']."'/></a></td>";
				$tmp++;
			}
			elseif ($tmp%4==0) {
				echo "<td>".$row['chname'].": <a href='#ResumeDisplay.php?username=".urlencode($row['user_id'])."'>
<img width='100' height='65' src='userdata/img/".$row['user_img']."'/></a></td></tr>";
				$tmp=1;
			}
			elseif ($tmp%4==1) {
				echo "<tr><td>".$row['chname'].": <a href='#ResumeDisplay.php?username=".urlencode($row['user_id'])."'>
<img width='100' height='65' src='userdata/img/".$row['user_img']."'/></a></td>";
				$tmp++;
			}
		}
		if($tmp<=3)
			echo "</tr>";
		echo "</table>";
	}
	mysql_close($con);
?>
<script type="text/javascript">
	function submi(){
		var hash ="ViewProfile.php";
		hash+="?skill="+escape($("input[name='skill']:checked").val());
		//alert(hash);
		location.hash=hash;
	}
</script>