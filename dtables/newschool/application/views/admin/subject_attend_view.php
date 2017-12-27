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
        <tr>
        <th>Date Added</th>
        <th>Student Id</th>
        <th>Student Name</th>
        <th>Date</th>
        <th>Present/Absent</th>
        </tr>
   </thead>
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
        $(document).ready(function()
        {
            $("#mytable").DataTable({
                'paging': true,
                'processing': true,
                'serverSide': true,
                'lengthMenu': [[5,10,15,20,50,-1],[5,10,15,20,50,'ALL']],
                'ajax' : {
                    'url' : '<?php echo site_url("get_table/get_all")?>',
                    'type': 'POST',
                    "data": function ( d ) {
                      //d.account_from = $('#account_type_id').val();
                      d.SUBID = <?php echo $_POST['SUBID']; ?>;
                    }
                }
            });
        });
       </script>
</body>
</html>