<!DOCTYPE html>
<html>
<head>
    <title>Student</title>
          <?php include('header.php') ?>

</head>
<body>
    <div id="wrapper">

            <!-- Navigation -->
            <?php include('navigation.php'); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Student:</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <form action="<?php echo site_url('admin/student_add'); ?>" method="POST">
    <input type="submit" class="btn" value="Save">
    <table id="addTable" class="table">
        <tr class="row">
            <!-- <th>Teacher Id</th> -->
            <th class="text-center">Student Name</th>
            <th class="text-center">Student Password</th>
        </tr>
        <tr id="row1" class="row"> 
                    <td class="col-md-2"><input type="text" class="form-control" name="SNAME[]"></td>
            <td class="col-md-2"><input type="text" class="form-control" name="SPASS[]"></td>
            <td class="text-center col-md-1"><input type="button" class="new btn" value="+"></td>
        </tr>
    </table>
    <br>
</form>
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script type="text/javascript">
    var rowCount=2;
    $(document).on("click",".new",function()
    {
        var ele = '<tr class="row"><td class="col-md-2"><input type="text" class="form-control" name="SNAME[]"></td><td class="col-md-2"><input class="form-control" type="text" name="SPASS[]"></td><td class="text-center col-md-1"><input type="button"  class="new btn text-center" value="+"></td></tr>';
        var id = '#row'+ (rowCount-1);
        $("#addTable").append(ele);
        $(this).attr('class','old btn text-center');
        $(".old").attr("value","Rem");
    });
    $(document).on("click",".old",function()
    {
        $(this).parent().parent().remove();
    });
</script>
 <!-- jQuery -->
        <?php include('footer.php') ?>
</body>
</html>