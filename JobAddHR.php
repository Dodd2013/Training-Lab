<style type="text/css">
	td{
		padding: 5px;
	}
</style>

<form target="msg" method="post" class="am-form" action="JobAddHR_PHP.php" enctype="multipart/form-data">
	<table>
		<tr>
			<td>Job Title: </td>
			<td><input type="radio" name="title" value="programmer" required>Programmer</input></td>
			<td><input type="radio" name="title" value="analyst" required>Analyst</input></td>
			<td><input type="radio" name="title" value="designer" required>Designer</input></td>
		</tr>
		<tr>
			<td>Job Description: </td>
			<td><textarea cols="8" rows="5" name="description" required></textarea></td>
		</tr>
		<tr>
			<td>Company Name: </td>
			<td><input type="text" name="comname" required></td>
		</tr>
		<tr>
			<td>Job Location: </td>
			<td><select name="location" required><?php include('JobLocation.php'); ?></select></td>
		</tr>
		<tr>
			<td>Job Status: </td>
			<td><input type="radio" name="status" value="active" required>Active</input></td>
			<td><input type="radio" name="status" value="closed" required>Closed</input></td>
		</tr>
		<tr><td><button onclick="submitfrom();" type="submit" required>Submit Resume/td></tr>
	</table>	
</form>

<script>
    function submitfrom(){
    $("#my-alert").modal('toggle');
    }
</script>

