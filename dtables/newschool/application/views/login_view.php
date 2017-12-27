<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/login.css'); ?>">
</head>
<body>
	<br>
	<br>
	<br>
	<br>
	<br><br>
<div class="login-page container form">
<form  action="<?php echo site_url('login/check'); ?>" method="POST" class="login-form">
	<fieldset>
		<legend>Login</legend>
		<p>UserId: <input type="text"  name="USERID" placeholder="Username"/></p>
		<p>Password <input type="password" name="PASS" placeholder="Password"/></p>
		<input type="submit" value="Login" id="lbtn">
	</fieldset>
</form>
</body>
</html>