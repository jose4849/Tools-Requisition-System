<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>StoreManager</title>
        <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>additional/resources/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>additional/resources/css/animate.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>additional/resources/css/font-awesome.min.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>additional/resources/css/font.css" type="text/css" cache="false" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>additional/resources/js/fuelux/fuelux.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>additional/resources/js/datatables/datatables.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>additional/resources/css/plugin.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>additional/resources/css/app.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo base_url(); ?>additional/resources/js/select2/select2.css" type="text/css" />
        <script src="<?php echo base_url(); ?>additional/jquery.min.js"></script>
        <!--[if lt IE 9]>
          <script src="<?php echo base_url(); ?>additional/resources/js/ie/respond.min.js" cache="false"></script>
          <script src="<?php echo base_url(); ?>additional/resources/js/ie/html5.js" cache="false"></script>
          <script src="<?php echo base_url(); ?>additional/resources/js/ie/fix.js" cache="false"></script>
        <![endif]-->
    </head>
    <body>
        <div style="height:60px; width:100%; color:white; background-color:black;padding:10px;">
            <a style="color:white;font-size:27px;">WELCOME TO BITAC</a>    
            <a style="float:right;color:white;font-size:15px;  text-transform: uppercase;">logged In: 
                <?php
                $session = $this->session->userdata;
                echo  $session[0]->fullname;
                //print_r($session[0]);
                ?>
            </a> 
            <a style="float:right;color:red;font-size:15px;margin-right:10px; text-transform: uppercase;" href="<?php echo base_url(); ?>login/logout/">Logout</a>
        </div>    
        <section class="hbox stretch">

            <!---aside-->
            <?php echo $leftside; ?>
            <!---aside-->
            <!-- .vbox -->
            <section id="content">      
                <?php echo $content; ?>
                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
            </section>
            <!-- /.vbox -->
        </section>
        <script src="<?php echo base_url(); ?>additional/resources/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>additional/resources/js/bootstrap.js"></script>
        <!-- App -->
        <script src="<?php echo base_url(); ?>additional/resources/js/app.js"></script>
        <script src="<?php echo base_url(); ?>additional/resources/js/app.plugin.js"></script>
        <script src="<?php echo base_url(); ?>additional/resources/js/app.data.js"></script>-->
        <!-- fuelux - -->
        <script src="<?php echo base_url(); ?>additional/resources/js/fuelux/fuelux.js"></script>
        <script src="<?php echo base_url(); ?>additional/resources/js/libs/underscore-min.js"></script> ->
        <!-- datatables -->
        <script src="<?php echo base_url(); ?>additional/resources/js/datatables/jquery.dataTables.min.js"></script>
        <!-- Sparkline Chart -->
      <script src="<?php echo base_url(); ?>additional/resources/js/charts/sparkline/jquery.sparkline.min.js"></script>         <!-- Easy Pie Chart -->
        <script src="<?php echo base_url(); ?>additional/resources/js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
        <script src="<?php echo base_url(); ?>additional/resources/js/select2/select2.min.js" cache="false"></script>
    </body>
</html>