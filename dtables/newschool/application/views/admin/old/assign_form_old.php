<!DOCTYPE html>
<html>
<head>
	<title>Assign</title>
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
<form method="POST" action="<?php echo site_url('admin/teachsub') ?>">
	<table>
	<tr>
		<th>Teacher Id</th>
		<th>Subject Id</th>
	</tr>
	<tr>
		<td><input type="text" name="TID"></td>
		<td><input type="text" name="SUBID"></td>
	</tr>
	</table>
	<br>
<input type="submit" value="Submit">
</form>
</body>
</html>