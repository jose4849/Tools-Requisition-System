
<!--====================================================================-->   



<?php //print_r($userinfo); ?>




<section class="vbox">

    <header class="header bg-white b-b">
        <p>Dashboard</p>
    </header>


    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                
<section class="panel">
                      <header class="panel-heading bg-primary lter no-borders">
                        <div class="clearfix">
                          <a class="pull-left thumb avatar border m-r" href="#">
                            <img  src="<?php echo base_url(); ?>additional/avatar.jpg">
                          </a>
                          <div class="clear">
                            <div class="h3 m-t-xs m-b-xs"><?php echo $userinfo[0]->fullname;  ?></div>
                            <small class="text-muted"><?php echo $userinfo[0]->designation;  ?></small>
                          </div>                
                        </div>
                      </header>
                      <div class="list-group no-radius alt">
                        <a href="#" class="list-group-item">
                            <b>Full Name:</b><?php echo $userinfo[0]->fullname;  ?>
                        </a>
                        <a href="#" class="list-group-item">
                            <b>Designation:</b> <?php echo $userinfo[0]->designation;  ?>
                        </a>                       
                        <a href="#" class="list-group-item">
                            <b>Department:</b>
                        </a>
                        <a href="#" class="list-group-item">
                            <b>JOB ID:</b> <?php echo $userinfo[0]->jobid;  ?>
                        </a>
                        <a href="#" class="list-group-item">
                            <b>Email:</b> <?php echo $userinfo[0]->email;  ?>
                        </a>                           
                        <a href="#" class="list-group-item">
                            <b>Status:</b> <?php echo $userinfo[0]->status;  ?>
                        </a> 
                          
                      </div>
                    </section>
            </div>
            <div class="col-md-6">
<div class="">
            <h4 class="m-t-none">General Statistics</h4><br>
            <ul class="list-group gutter list-group-lg list-group-sp sortable">
              <li class="list-group-item" draggable="true">
                <a data-dismiss="alert" class="pull-right" href="#"><i class="icon-remove"></i></a>
                <span class="pull-left media-xs"><i class="icon-sort text-muted icon-sm"></i> 01</span>
                <div class="clear" style="color:red;">
                  Collection Request: <strong><?php echo $p_collection; ?></strong>
                </div>
              </li>
              <li class="list-group-item" draggable="true">
                <a data-dismiss="alert" class="pull-right" href="#"><i class="icon-remove"></i></a>
                <span class="pull-left media-xs"><i class="icon-sort text-muted icon-sm"></i> 02</span>
                <div class="clear" style="color:red;">
                  Requisition Request: <strong><?php echo $p_requisition; ?></strong>
                </div>
              </li>
              <li class="list-group-item" draggable="true">
                <a data-dismiss="alert" class="pull-right" href="#"><i class="icon-remove"></i></a>
                <span class="pull-left media-xs"><i class="icon-sort text-muted icon-sm"></i> 03</span>
                <div class="clear">
                  Tools Request: <strong><?php echo $tools_action; ?></strong>
                </div>
              </li>
              <li class="list-group-item" draggable="true">
                <a data-dismiss="alert" class="pull-right" href="#"><i class="icon-remove"></i></a>
                <span class="pull-left media-xs"><i class="icon-sort text-muted icon-sm"></i> 04</span>
                <div class="clear">
                  Product row: <strong><?php echo $tp_product; ?></strong>
                </div>
              </li>
              <li class="list-group-item" draggable="true">
                <a data-dismiss="alert" class="pull-right" href="#"><i class="icon-remove"></i></a>
                <span class="pull-left media-xs"><i class="icon-sort text-muted icon-sm"></i> 05</span>
                <div class="clear">
                  Product tools: <strong><?php echo $tt_product; ?></strong>
                </div>
              </li>
            </ul>
          </div>
            </div>
        </div>
    </div>    





</section>  









<!--====================================================================-->              

