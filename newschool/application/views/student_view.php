<!DOCTYPE html>
<html>
<head>
	<title>Student</title>
</head>
<body>
	<form action="<?php echo site_url('login/logout'); ?>" method="POST">
	<input type="submit" value="Logout" style="position: fixed;"><br>
</form>
<p>Hi <?php echo $_SESSION['USERID']; ?>,</p>
<a href="<?php echo site_url('student/show_attd') ?>">Show Attendance</a>
</body>
</html>