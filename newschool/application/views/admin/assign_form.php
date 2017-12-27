<!DOCTYPE html>
<html>
<head>
    <title>Assign</title>
         <?php include('header.php') ?>
</head>
<body>
    <div id="wrapper">

            <!-- Navigation -->
            <?php include('navigation.php'); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Assign Subject:</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <form method="POST" action="<?php echo site_url('admin/teachsub') ?>">
    <table class="table">
    <thead>
        <tr class="row">
        <th class="col-md-3">Teacher Id</th>
        <th class="col-md-3">Subject Id</th>
        </tr>
    </thead>
    <tr class="row">
        <td class="col-md-3"><input class="form-control" type="text" name="TID"></td>
        <td class="col-md-3"><input class="form-control" type="text" name="SUBID"></td>
        <td class="col-md-1"><input type="submit" class="btn" value="Assign"></td>
    </tr>
    </table>
</form>
 <!-- jQuery -->
        <?php include('footer.php') ?>
        <script type="text/javascript">
            $(".scont").show();
            scont=1;
        </script>
</body>
</html>