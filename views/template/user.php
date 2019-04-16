<section class="vbox">
    <header class="header bg-success bg-gradient">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#static" data-toggle="tab">Users</a></li>
            <li class=""><a href="#datagrid" data-toggle="tab">Add New</a></li>
        </ul>
    </header>
    <section class="scrollable wrapper">
        <div class="tab-content">

            <div class="tab-pane active" id="static">


                <section class="panel">
                    <header class="panel-heading">
                        All User
                        <i class="icon-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                    </header>

                    <div class="table-responsive">
                        <table class="table table-striped b-t text-sm">
                            <thead>
                                <tr>
                                    <th width="20">ID</th>
                                    <th  data-toggle="class" class="th-sortable">Name
                                        <span class="th-sort">
                                            <i class="icon-sort-down text"></i>
                                            <i class="icon-sort-up text-active"></i>
                                            <i class="icon-sort"></i>
                                        </span>
                                    </th>
                                    <th width="150" >Designation</th>
                                    <th width="150">Department</th>
                                    <th width="30">Status</th>
                                    <th width="30">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($result as $data) { ?>   
                                <tr>
                                    <td><?php echo $data->id;    ?></td>
                                    <td><?php echo $data->fullname;    ?></td>
                                    <td><?php echo $data->designation;    ?></td>
                                    <td><?php echo $data->department;    ?></td>
                                    <td><?php echo $data->status;    ?></td>
                                    <td>
                                        <a data-toggle="class" class="active" href="#"><i class="icon-ok text-success text-active"></i><i class="icon-remove text-danger text"></i></a>
                                    </td>
                                </tr>
                                <?php  } ?>
                            </tbody>
                        </table>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-sm-4 hidden-xs">
                                 <!-- <select class="input-sm form-control input-s-sm inline">
                                    <option value="0">Bulk action</option>
                                    <option value="1">Delete selected</option>
                                    <option value="2">Bulk edit</option>
                                    <option value="3">Export</option>
                                  <button class="btn btn-sm btn-white">Apply</button>  -->                
                                </div>
                                <div class="col-sm-4 text-center">
                                  <!-- <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>-->
                                </div>
                                <div class="col-sm-4 text-right text-center-xs">                
                                    <!--<ul class="pagination pagination-sm m-t-none m-b-none">
                                      <li><a href="#"><i class="icon-chevron-left"></i></a></li>
                                      <li><a href="#">1</a></li>
                                      <li><a href="#">2</a></li>
                                      <li><a href="#">3</a></li>
                                      <li><a href="#">4</a></li>
                                      <li><a href="#">5</a></li>
                                      <li><a href="#"><i class="icon-chevron-right"></i></a></li> </ul>-->                 
                                    Pages: <?php //echo $links;    ?>
                                </div>
                            </div>
                        </footer>
                    </div>
                </section>
            </div>



            <div class="tab-pane" id="datagrid">

                <div class="row"></div>
                <section class="panel">
                    <header class="panel-heading">
                        <div class="row text-sm wrapper">
                            <div class="col-sm-6">
                                <section class="panel">
                                    <header class="panel-heading font-bold">New user</header>
                                    <div class="panel-body">
                                        <form role="form" action="<?php echo base_url(); ?>admin/save_user" method="post" >
                                            <div class="form-group">
                                                <label>Full Name:</label>
                                                <input type="text" name="fullname" placeholder="Enter Name" required class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Designation:</label>
                                                <input type="text" name="designation" placeholder="Designation" required class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Type:</label>
                                                <select name="type" class="form-control m-b">
                                                    <option value="1">Officer</option>
                                                    <option value="2">Store</option>
                                                    <option value="3">Purchase</option>
                                                    <option value="4">Executive</option>
                                                    <option value="5">Director</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>JOB ID:</label>
                                                <input type="text" name="jobid" placeholder="JOB ID" required class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Department:</label>
                                                <select id="select2-option" name="dept_id" style="width:100%">
                                                    <?php foreach ($department as $cate) { ?>
                                                        <option value="<?php echo $cate->id; ?>"><?php echo $cate->department; ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>                                            
                                            <div class="form-group">
                                                <label>Email:</label>
                                                <input type="text" name="email" placeholder="Email" required class="form-control">
                                            </div>                                            
                                            <div class="form-group">
                                                <label>Password:</label>
                                                <input type="password" name="password" placeholder="Password" required class="form-control">
                                            </div>                                            
                                            <button class="btn btn-sm btn-default" type="submit">Submit</button>
                                        </form>
                                    </div>
                                </section>
                            </div>
                            <div class="col-sm-6">

                            </div>

                        </div>
                    </header>
                </section>                


            </div>




        </div>
    </section>
</section>