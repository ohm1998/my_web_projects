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
                        <h1 class="page-header">Enter Student Id:</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                </form>
<form method="POST" action="<?php echo site_url('admin/student_attend'); ?>">
    <div class="col-xs-2">
    <input type="text" class="form-control" name="SID"><br><br>
    </div>
    <input type="submit" class="btn" value="Get Attendance">
</form>
 <!-- jQuery -->
        <?php include('footer.php') ?>
        <script type="text/javascript">
           $(".acont").show();
           acont=1;
       </script>
</body>
</html>