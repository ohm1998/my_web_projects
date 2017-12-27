<!DOCTYPE html>
<html>
<head>
    <title>Attendance</title>
          <?php include('header.php') ?>
</head>
<body>
    <div id="wrapper">

            <!-- Navigation -->
            <?php include('navigation.php'); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Student Attendance:</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="theabel">
                    <table class="table table-striped">
    <tr class="row">
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
            echo '<tr class="row">';
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
                </div>
    <form action="<?php echo site_url('admin/student_attendance_transfer') ?>">
        <button class="btn">Back</button>
    </form>
 <!-- jQuery -->
        <?php include('footer.php') ?>
        <script type="text/javascript">
           $(".acont").show();
           acont=1;
       </script>    
</body>
</html>