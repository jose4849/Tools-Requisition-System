
<?php 
$session = $this->session->userdata;
$type = $session[0]->type;
 ?>  
<section class="vbox">
    <header class="header bg-success bg-gradient">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#static" data-toggle="tab">All Product</a></li>
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
                                    <th width="400"  data-toggle="class" class="th-sortable">Name
                                        <span class="th-sort">
                                            <i class="icon-sort-down text"></i>
                                            <i class="icon-sort-up text-active"></i>
                                            <i class="icon-sort"></i>
                                        </span>
                                    </th>
                                    <th>Note</th>
                                    <th width="150" >Quantity</th>
                                    
                                    <th width="150">Price</th>
                                    <th width="150">Date</th>
                                    <th width="100">Status</th>
                                    <th width="100" >Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($result as $data) { ?>   
                                <tr>
                                    <td style="border-right:1px solid #e0e4e8"><?php echo $data->id;    ?></td>
                                    <td style="border-right:1px solid #e0e4e8">
                                        <a target="_blank" href="<?php echo base_url(); ?>report/singleproduct/?id=<?php echo $data->id;    ?>"><?php echo $data->product_name;    ?></a>
                                    </td>
                                    <td style="border-right:1px solid #e0e4e8"><?php echo $data->category;    ?></td>
                                    <td style="border-right:1px solid #e0e4e8"><?php echo $data->quantity;    ?></td>
                                   
                                    <td style="border-right:1px solid #e0e4e8"><?php echo $data->price;    ?></td>
                                    <td style="border-right:1px solid #e0e4e8"><?php echo $data->date;    ?></td>
                                    <td style="border-right:1px solid #e0e4e8"><?php echo $data->status;    ?></td>
                                    <td style="border-right:1px solid #e0e4e8">
                                        <a data-toggle="class" class="active" href="#">
                                            <?php if($type==2){ ?>
                                            <i onclick="alert('Alert in valid')" class="icon-edit text-success text-active"></i>
                                            <i onclick="alert('Product active')" class="icon-ok text-success text-active"></i>
                                            <i onclick="alert('Delete sure')" class="icon-remove text-danger text-active"></i>
                                            <?php } ?>
                                        </a>
                                    </td>
                                </tr>
                                <?php  } ?>
                            </tbody>
                        </table>

                        
                        
                        
                     &nbsp;&nbsp;<?php echo $links; ?> 
                     <br>
                      &nbsp;&nbsp;<a target="_blank" href="<?php echo base_url(); ?>report/inventory_print/"><button>Print All</button></a>
                         <br><br>
                        
                        
                    </div>
                </section>
                
                
                
            </div>


        </div>
    </section>
</section>