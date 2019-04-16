<section class="vbox">
    <header class="header bg-success bg-gradient">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#static" data-toggle="tab">Tools Requisition By You</a></li>
            <!--    <li class=""><a href="#datagrid" data-toggle="tab">New Requisition List</a></li> -->

        </ul>
    </header>
    <section class="scrollable wrapper">
        <div class="tab-content">

            <div class="tab-pane active" id="static">
                <div class="row"></div>



                <section class="panel">
                    <header class="panel-heading">
                        Tools List
                        <i class="icon-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                    </header>
                    <div class="table-responsive">
                        <table class="table table-striped b-t text-sm">
                            <thead>
                                <tr>
                                    <th width="20">ID</th>
                                    <th width="300" data-toggle="class" class="th-sortable">Product Name</th>
                                    <th  width="100">Quantity</th>
                                    <th width="150">Date</th>
                                    <th width="30">Status</th>
                                    <th width="30">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $data) { ?>   
                                    <tr>
                                        <td><?php echo $data->tool_action_id; ?></td>
                                        <td><?php echo $data->product_name; ?></td>
                                        <td><?php echo $data->quantity; ?></td>
                                        <td><?php echo $data->request_date; ?></td>
                                        <td><?php echo $data->status; ?></td>
                                        <td>
                                            <a  href="#">View</a>
                                        </td>
                                    </tr>
                                <? } ?>
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
                                    Pages: <?php //echo $links; ?>
                                </div>
                            </div>
                        </footer>
                    </div>
                </section>




            </div>
            <div class="tab-pane" id="datagrid">





            </div>







        </div>
    </section>
</section>