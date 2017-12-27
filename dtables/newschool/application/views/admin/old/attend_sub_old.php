<!DOCTYPE html>
<html>
<head>
	<title>Student Attend</title>
</head>
<body>
	<form action="<?php echo site_url('login/logout'); ?>" method="POST">
	<input type="submit" value="Logout" style="position: fixed;"><br> <br>
</form>
	<h3>Enter Subject Id:</h3>
<form method="POST" action="<?php echo site_url('admin/sub_attend'); ?>">
	<select name="sub_list">
		<?php 
		foreach($query as $row)
		{
			echo '<option value="'.$row['SUBID'].'">';
			echo $row['SUBNAME'];
			echo "</option>";
		}

		 ?>
	</select>
	<input type="submit" value="Get Attendance">
</form>
</body>
</html>