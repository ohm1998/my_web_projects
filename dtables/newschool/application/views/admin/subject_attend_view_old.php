<!DOCTYPE html>
<html>
<head>
    <title>Attendance</title>
     <?php include('header.php') ?>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
</head>
<body>
    <div id="wrapper">
        <?php include('navigation.php'); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Subject Attendance:</h1>
                    </div>
                </div>
                <table id="mytable" class="table table-striped">
   <thead>
        <tr class="row">
        <th>Date Added</th>
        <th>Student Id</th>
        <th>Student Name</th>
        <th>Date</th>
        <th>Present/Absent</th>
    </tr>
   </thead>
   <tfoot>
   	<tr class="row">
        <th>Date Added</th>
        <th>Student Id</th>
        <th>Student Name</th>
        <th>Date</th>
        <th>Present/Absent</th>
    </tr>
   </tfoot>
    <?php 

        //print_r($data);
        $q = $data['query'];
        //print_r($q);
        foreach($q as $row)
        {
            //print_r($row);
            echo '<tr class="row">';
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
 <form action="<?php echo site_url('admin/sub_attendance_transfer'); ?>">
    <br>
    <button class="btn">Back</button>
</form>
 <!-- jQuery -->
       <?php include('footer.php') ?>
       <script type="text/javascript">
           $(".acont").show();
           acont=1;
       </script>
       <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
       <script type="text/javascript">
       	$(document).ready(function() {
    $('#mytable').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
       </script>
</body>
</html>