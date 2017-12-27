<!DOCTYPE html>
<html>
<head>
	<title>Teacher Login</title>
</head>
<body>
	<form action="<?php echo site_url('login/logout'); ?>" method="POST">
	<input type="submit" value="Logout" style="position: fixed;"><br>
</form>
<h5>Hello <?php echo $_SESSION['TNAME']; ?>,</h5>
<br>
<a href="<?php echo site_url('teacher/student_form'); ?>">Add Student</a><br>
<a href="">Add Subject</a><br>
<a href="<?php echo site_url('teacher/attendance'); ?>">Add Attendance</a>
</body>
</html>