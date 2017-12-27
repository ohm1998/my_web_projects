<!DOCTYPE html>
<html>
<head>
	<title>Student Attendance</title>
	<style type="text/css">
		td,th
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
 <table>
 	<tr>
 		<th>Date Added</th>
 		<th>Subject Id</th>
 		<th>Subject Name</th>
 		<th>Date</th>
 		<th>Present/Absent</th>
 	</tr>
 	<?php 

 		$query = $data['query'];
 		//print_r($query);
 		foreach($query  as $row)
 		{
 			echo "<tr>";
 			echo '<td>'.$row['DATEADDED'].'</td>';
 			echo '<td>'.$row['SUBID'].'</td>';
 			echo '<td>'.$row['SUBNAME'].'</td>';
 			echo '<td>'.$row['ATTDATE'].'</td>';
 			if($row['ATTEND'])
 			{
 				echo '<td>Present</td>';
 			}
 			else
 			{
 				echo '<td>Absent</td>';
 			}
 		}
 	 ?>
 </table>	
</body>
</html>