<!DOCTYPE html>
<html>
<head>
    <title>Attendance</title>
     <!-- Bootstrap Core CSS -->
       <?php include('header.php') ?>
</head>
<body>
    <div id="wrapper">
        <?php include('navigation.php') ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Add Teacher:</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <br>
                <form action="<?php echo site_url('admin/teacher_add'); ?>" method="POST">
                        <input type="submit" value="Save" class="btn">
                        <br>
                        <br>
                <table id="addTable" class="table">
                    <tr class="row">
                    <!-- <th>Teacher Id</th> -->
                                <th class="text-center">Teacher Name</th>
                                <th class="text-center">Teacher Password</th>
                    </tr>
                    <tr id="row1" class="row">
                        <!-- <td>1</td> --> 
                        <td class="text-center col-md-2"><input class="form-control" type="text" name="TNAME[]"></td>
                        <td class="text-center col-md-2"><input class="form-control" type="text" name="TPASS[]"></td>
                        <td class="text-center col-md-1"><input class="new btn" type="button" value="+" ></td>
                            </tr>
                </table>
                <br>
                </form>
        </div>
    </div>
                <!-- Teacher-script -->
                <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script type="text/javascript">
    var rowCount=2;
    $(document).on("click",".new",function()
    {
        var ele = '<tr class="row"><td><input type="text col-md-2" class="form-control" name="TNAME[]"></td><td class="col-md-2"><input  class="form-control" type="text" name="TPASS[]"></td><td class="text-center col-md-1"><input class="new btn" type="button" value="+"></td></tr>';
        var id = '#row'+ (rowCount-1);
        $("#addTable").append(ele);
        $(this).attr('class','old btn');
        $(".old").attr("value","Rem");
    });
    $(document).on("click",".old",function()
    {
        $(this).parent().parent().remove();
    });

</script>
 <!-- jQuery -->
        <?php include('footer.php') ?>
        <script type="text/javascript">
            $(".tcont").show();
    tcont=1;
        </script>
</body>
</html>