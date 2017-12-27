<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
     <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url().'css/bootstrap.min.css'; ?>" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url().'css/metisMenu.min.css'; ?>" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo base_url().'css/timeline.css'; ?>" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url().'css/startmin.css'; ?>"  rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url().'css/morris.css';?>" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo base_url().'css/font-awesome.min.css';?>" rel="stylesheet" type="text/css">

</head>
<body>
    <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="<?php echo site_url('login/home'); ?>">Admin</a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                    <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['ADMIN_NAME']; ?> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                           <li><a href="<?php echo site_url('login/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i>Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul> 
                <!-- /.navbar-top-links -->

                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <a href="<?php echo site_url('login/home'); ?>" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="#" class="teacher"><i class="fa fa-bar-chart-o fa-fw"></i>Teacher<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level tcont" style="display: none;">
                                    <li>
                                        <a href="<?php echo site_url('admin/teacher_form'); ?>">Add Teacher</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="<?php echo site_url('admin/student_form'); ?>"><i class="fa fa-table fa-fw"></i>Add Student</a>
                            </li>
                            <li>
                                <a href="#" class="subject"><i class="fa fa-sitemap fa-fw"></i>Subject<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level scont" style="display: none;">
                                    <li>
                                        <a href="<?php echo site_url('admin/subject_form'); ?>">Add Subject</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('admin/assign_form'); ?>">Assign Subject</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a class="attendance" href="#"><i class="fa fa-files-o fa-fw"></i>Attendance<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level acont" style="display: none">
                                    <li>
                                        <a href="<?php echo site_url('admin/student_attendance_transfer'); ?>">Student Attendance</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('admin/sub_attendance_transfer'); ?>">Subject Attendance</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
 <!-- jQuery -->
        <script src="<?php echo base_url().'js/jquery.min.js'; ?>"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?php echo base_url().'js/bootstrap.min.js'; ?>"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="<?php echo base_url().'js/metisMenu.min.js'; ?>"></script>

        <!-- Morris Charts JavaScript -->
        <script src="<?php echo base_url().'js/raphael.min.js'; ?>"></script>
        <script src="<?php echo base_url().'js/morris.min.js' ?>"></script>
        <script src="<?php echo base_url().'js/morris-data.js'; ?>"></script>

        <!-- Custom Theme JavaScript -->
        <script src="<?php echo base_url().'js/startmin.js'; ?>"></script>
        <script type="text/javascript">
            var tcont=0,scont=0,acont=0;
            $(".teacher").on("click",function()
            {
                if(tcont)
                {
                    $(".tcont").slideUp();
                    tcont=0;
                }
                else
                {
                    $(".tcont").slideDown();
                    tcont=1;
                }
            });
            $(".subject").on("click",function()
            {
                 if(scont)
                {
                    $(".scont").slideUp();
                    scont=0;
                }
                else
                {
                    $(".scont").slideDown();
                    scont=1;
                }
            });
             $(".attendance").on("click",function()
            {
                 if(acont)
                {
                    $(".acont").slideUp();
                    acont=0;
                }
                else
                {
                    $(".acont").slideDown();
                    acont=1;
                }
            });
        </script>
</body>
</html>