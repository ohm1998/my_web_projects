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