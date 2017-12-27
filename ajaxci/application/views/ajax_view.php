<!DOCTYPE html>
<html>
<head>
	<title>Ajax</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style type="text/css">
		td,th
		{
			border: 1px solid black;
			padding: 10px;
		}
		*
		{
			margin: 10px;
		}
	</style>
</head>
<body>
<table>
	<tr>
		<th>Sr. No</th>
 		<th>Name</th>
 		<th>Company Name</th>
 		<th>Cost</th>
 		<th>Service</th>	
	</tr>
	<div id="tupdate">
	 <?php 
			$count=0;
			
			foreach($data as $row)
			{
				echo "<tr id="."xyz".">";
				echo '<td><input type="checkbox" class="new" name="'.$row["SR"].'">'.$row['SR']."</td>";
				echo "<td>".$row['NAME']."</td>";
				echo "<td>".$row['CNAME']."</td>";
				echo "<td>".$row['COST']."</td>";
				echo "<td>".$row['SERVICE']."</td>";
				echo "</tr>";
				$count=$row['SR'];
			}
		?> 
	</div>
 	<tr id="lastRow">
 			<td></td>
 			<td><input type="text" id="name" name="name" autocomplete="off"></td>
 			<td><input type="text" id="cname" name="cname" autocomplete="off"></td>
 			<td><input type="text" id="cost" name="cost" autocomplete="off"></td>
 			<td>
 			<select multiple="multiple" id="service" name="service[]" size="3">
 				<option value="Web">Website</option>
 				<option value="App">App Designing</option>
 				<option value="Des">Designing</option>
 			</select></td>
 			<td><button id="add">Add</button></td>
 	</tr>
</table>
<button id="dall">Delete All</button>
<button id="dsel">Delete Selected</button>
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
<script type="text/javascript">
	$('#tupdate').hide();
	$("#add").on("click",function()
	{
		$.ajax(
		{
			url: '<?php echo site_url("ajax/write"); ?>',
			type: 'POST',
			data: {
					name: $("#name").val(),
					cname: $("#cname").val(),
					cost: $("#cost").val(),
					service : $("#service").val()
				  },
			success: function(data)
			{
				//alert('added');
				$.ajax(
				{
					url: '<?php echo site_url("ajax/get_data"); ?>',
					type: 'POST',
					success: function(data2)
					{
						var obj = $.parseJSON(data2);
						//alert(data2);

						var sr = obj[0].SR;
						var name = obj[0].NAME;
						var cname = obj[0].CNAME;
						var cost = obj[0].COST;
						var service = obj[0].SERVICE;
									var ele = '<tr class="new">\
						<td class="sr"><input type="checkbox" class="cb" name="'+sr+'">'+sr+'</td> \
			 			<td class="name">'+name+'</td> \
			 			<td class="cname">'+cname+'</td> \
			 			<td class="cost">'+cost+'</td> \
			 			<td class="service">'+service+'</td> \
						</tr>';
						$("#lastRow").before(ele);
						//alert("done");
					}
				});
				$("#name,#cname,#cost,#service").val('');
			}
		});
	});
	$("#dall").on("click",function()
	{
		$.ajax(
		{
			url: '<?php echo site_url("ajax/deleteall"); ?>',
			type: 'POST',
			success: function(data)
			{
				$('#tupdate').hide();
				$('.new').hide();
			}
		});
	});
	$("#dsel").on("click",function()
	{
		var checked = $(".cb").prop('checked');
		var arr = [];
		if($(".cb").is(':checked')) {
			arr.push(1);
		} else {
			arr.push(0)
		}
		var checkedValues = $('input:checkbox:checked').map(function() 
		{
    		return $(this).attr('name');
		}).get();
		//alert(checkedValues);
		$.ajax(
		{
			url: '<?php echo site_url("ajax/del_sel"); ?>',
			type: 'POST',
			data: {'cbnames': checkedValues},
			success: function(data)
			{
				($('input:checkbox:checked').parent()).parent().hide();
				//alert(data);
			}
		});
	});
</script>
</body>
</html>