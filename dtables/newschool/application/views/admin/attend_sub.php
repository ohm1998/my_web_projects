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
                        <h1 class="page-header">Select Subject:</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
<form method="POST" action="<?php echo site_url('admin/sub_attend'); ?>">
    <div class="col-lg-2">
        <select name="sub_list" class="form-control selcls">
        <?php 
        foreach($query as $row)
        {
            echo '<option value="'.$row['SUBID'].'">';
            echo $row['SUBNAME'];
            echo "</option>";
        }
         ?>
        </select>
    <br>
    <input type="submit" class="btn" value="Get Attendance">
    </div>
</form>
 <!-- jQuery -->
       <?php include('footer.php') ?>
       <script type="text/javascript">
           $(".acont").show();
           acont=1;
       </script>
</body>
</html>