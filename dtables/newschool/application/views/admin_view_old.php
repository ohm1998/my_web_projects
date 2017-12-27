<!DOCTYPE html>
<html>
<head>
	<title>Admin:</title>
</head>
<body>
<form action="<?php echo site_url('login/logout'); ?>" method="POST">
	<input type="submit" value="Logout" style="position: fixed;"><br>
</form>
<h5>Admin Login,</h5>
<h4>Hello <?php echo $_SESSION['ADMIN_NAME']; ?>,</h4>
<a href="<?php echo site_url('admin/teacher_form'); ?>">Add Teacher</a><br>
<a href="<?php echo site_url('admin/student_form'); ?>">Add Student</a><br>
<a href="<?php echo site_url('admin/subject_form'); ?>">Add Subject</a><br>
<a href="<?php echo site_url('admin/assign_form'); ?>">Assign Subject</a><br>
<a href="<?php echo site_url('admin/view_attend'); ?>">View Attendance</a><br>
</body>
</html>