<!DOCTYPE html>
<html>
<head>
	<title>Show Attendance</title>
</head>
<body>
	<form action="<?php echo site_url('login/logout'); ?>" method="POST">
	<input type="submit" value="Logout" style="position: fixed;"><br>
</form>
<a href="<?php echo site_url('admin/student_attendance_transfer'); ?>">Student Attendance</a><br><br>
<a href="<?php echo site_url('admin/sub_attendance_transfer'); ?>">Subject Attendance</a>
</body>
</html>