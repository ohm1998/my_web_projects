<!DOCTYPE html>
<html>
<head>
	<title>Student Add</title>
	<style type="text/css">
	tr,td,th
	{
		border: 1px solid black;
		padding: 10px;
	}
	</style>
</head>
<body>
	<form action="<?php echo site_url('login/logout'); ?>" method="POST">
	<input type="submit" value="Logout" style="position: fixed;"><br>
</form>
<form action="<?php echo site_url('admin/student_add'); ?>" method="POST">
	<table id="addTable">
		<tr>
			<!-- <th>Teacher Id</th> -->
			<th>Student Name</th>
			<th>Student Password</th>
		</tr>
		<tr id="row1">
			<!-- <td>1</td> --> 
			<td><input type="text" name="SNAME[]"></td>
			<td><input type="text" name="SPASS[]"></td>
			<td><input type="button" class="new" value="+"></td>
		</tr>
	</table>
	<br>
	<input type="submit" value="Save">
</form>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script type="text/javascript">
	var rowCount=2;
	$(document).on("click",".new",function()
  	{
  		var ele = '<tr><td><input type="text" name="SNAME[]"></td><td><input type="text" name="SPASS[]"></td><td><input type="button" class="new" value="+"></td></tr>';
  		var id = '#row'+ (rowCount-1);
  		$("#addTable").append(ele);
  		$(this).attr('class','old');
  		$(".old").attr("value","Rem");
  	});
  	$(document).on("click",".old",function()
  	{
  		$(this).parent().parent().remove();
  	});
</script>
</body>
</html>