<!DOCTYPE html>
<html>
<head>
	<title>Subject Attendance</title>
	<style type="text/css">
		td,th
		{
			padding: 15px;
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<form action="<?php echo site_url('login/logout'); ?>" method="POST">
	<input type="submit" value="Logout" style="position: fixed;"><br>
</form>
	<h4>Subject Attendance:</h4>
  <table>
 	<tr>
 		<th>Date Added</th>
 		<th>Student Id</th>
 		<th>Student Name</th>
 		<th>Date</th>
 		<th>Present/Absent</th>
 	</tr>
 	<?php 

 		//print_r($data);
 		$q = $data['query'];
 		//print_r($q);
 		foreach($q as $row)
 		{
 			//print_r($row);
 			echo "<tr>";
 			echo '<td>'.$row['DATEADDED'].'</td>';
 			echo '<td>'.$row['SID'].'</td>';
 			echo '<td>'.$row['SNAME'].'</td>';
 			echo '<td>'.$row['ATTDATE'].'</td>';
 			if($row['ATTEND'])
 			{
 				echo '<td>Present</td>';
 			}
 			else
 			{
 				echo '<td>Absent</td>';
 			}
 			echo "</tr>";
 		}
 	 ?>
 </table>	
</body>
</html>