<!DOCTYPE html>
<html>
<head>
	<title>Subject Add</title>
	<style type="text/css">
	td,th
	{
		padding: 10px;
		border: 1px solid black;
	}
	</style>
</head>
<body>
	<form action="<?php echo site_url('login/logout'); ?>" method="POST">
	<input type="submit" value="Logout" style="position: fixed;"><br>
</form>
<form method="POST" action="<?php echo site_url('admin/subject_add') ?>">
	<table>
		<tr>
			<th>Subject Name</th>
			<th>Is Active:</th>
		</tr>
		<tr>
			<td><input type="text" name="SUBNAME"></td>
			<td><select name="IS_ACTIVE">
				<option value="1">ACTIVE</option>
				<option value="0">NOT ACTIVE</option>
			</select></td>
		</tr>
	</table>
	<br>
	<br>
	<input type="submit" value="Save"> <br> <br>
</form>
</body>
</html>