<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>
	<style type="text/css">
		tr,td,th
		{
			padding: 10px;
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<form action="<?php echo site_url('login/logout'); ?>" method="POST">
	<input type="submit" value="Logout" style="position: fixed;"><br> <br>
</form>
<form method="POST" action="<?php echo site_url('teacher/att_write'); ?>">
	Date:
	<input type="date" name="DATE" id="adate" value="<?php echo date("Y-m-d");?>"><br> <br>
	Subject: 
	<select name="SUBNAME">
		<?php
			foreach($sub as $row)
			{
				echo '<option value="'.$row['SUBID'].'" >'.$row['SUBNAME'].'</option>';
			}
		?>
	</select>
	<br> <br>
	<input type="submit" value="Save">
	<br>
	<table>
		<tr>
			<th>SID</th>
			<th>SNAME</th>
			<th><input type="checkbox" id="sall">Select All</th>
		</tr>
			<?php 
				foreach($data as $row)
				{
					echo "<tr>";
					echo '<input type="hidden" name="SID[]" value="'.$row['SID'].'">';
					echo '<td>'.$row['SID'].'</td>';
					echo '<td>'.$row['SNAME'].'</td>';
					echo '<td><input type="checkbox" name="cb['.$row['SID'].']"></td>';
					echo "</tr>";
				}
			 ?>
	</table>
</form>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script type="text/javascript">
	$(function () {
    var $tblChkBox = $("input:checkbox");
    $("#sall").on("click", function () {
        $($tblChkBox).prop('checked', $(this).prop('checked'));
    });
});
	$("#sall").on("change", function () {
    if (!$(this).prop("checked")) {
        $("#sall").prop("checked", false);
    }
});
	$("#ckbCheckAll").on("click", function () {
    $($tblChkBox).not(":disabled").prop('checked', $(this).prop('checked'));
});
</script>
</body>
</html>