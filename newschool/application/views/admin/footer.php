 <!-- <script src="<?php //echo base_url().'js/jquery.min.js'; ?>"></script> -->
 <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>

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