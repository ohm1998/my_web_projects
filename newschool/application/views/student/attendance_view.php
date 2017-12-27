<!DOCTYPE html>
<html>
<head>
	<title>Attendance</title>
	<style type="text/css">
		tr,td
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
<br>
	Student Id: <?php echo $_SESSION['SID']; ?>
<table>
	<tr>
		<th>Date</th>
		<th>SubId</th>
		<th>P/A</th>
	</tr>
	<?php 

		$count=0;
		foreach($data['post'] as $row)
		{
			echo "<tr>";
			echo "<td>".$row['ATTDATE']."</td>";
			echo "<td>".$row['SUBID']."</td>";
			if($row['ATTEND'])
			{
				echo "<td>Present</td>";
				$count++;
			}
			else
			{
				echo "<td>Absent</td>";	
			}
		}
	 ?>
</table>
<?php echo "Total Days Present: ".$count; ?>
</body>
</html>