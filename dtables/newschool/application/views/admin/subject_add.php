<!DOCTYPE html>
<html>
<head>
    <title>Subject</title>
          <?php include('header.php') ?>
</head>
<body>
    <div id="wrapper">

            <!-- Navigation -->
            <?php include('navigation.php'); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Subject Add:</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <form method="POST" action="<?php echo site_url('admin/subject_add') ?>">
    <div>
    <input type="submit" class="btn" value="Save"> <br> <br>
        <table class="table">
       <thead>
            <tr class="row">
            <th>Subject Name</th>
            <th>Is Active:</th>
        </tr>
       </thead>
        <tr class="row">
            <td class="col-md-2"><input class="form-control" type="text" name="SUBNAME"></td>
            <td class="col-md-3"><select name="IS_ACTIVE" class="form-control selectpicker">
                <option value="1">ACTIVE</option>
                <option value="0">NOT ACTIVE</option>
            </select></td>
        </tr>
    </table>
    </div>
    <br>
    <br>
</form>
 <!-- jQuery -->
        <?php include('footer.php') ?>
        <script type="text/javascript">
            $(".scont").show();
            scont=1;
        </script>
</body>
</html>