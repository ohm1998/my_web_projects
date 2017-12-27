<!DOCTYPE html>
<html>
<head>
	<title>Student Attend</title>
</head>
<body>
	<form action="<?php echo site_url('login/logout'); ?>" method="POST">
	<input type="submit" value="Logout" style="position: fixed;"><br>
</form>
	<h3>Enter Student Id:</h3>
<form method="POST" action="<?php echo site_url('admin/student_attend'); ?>">
	<input type="text" name="SID">
	<input type="submit" value="Get Attendance">
</form>
</body>
</html>