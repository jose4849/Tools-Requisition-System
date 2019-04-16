<script>
function delete_new_product(id){
    var con = confirm("Do you confirm to delete!");
     if(con==true){
     $.ajax({url: "<?php echo base_url(); ?>store/delete_new_product", type:'POST', data: {id:id }, success: function(result) {
          alert(result);
          window.location.reload();
    }});  
    }
}
</script>
<section class="vbox">
    <header class="header bg-success bg-gradient">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#static" data-toggle="tab">Product</a></li>
            <li class=""><a href="#datagrid" data-toggle="tab">New Product List</a></li> 

        </ul>
    </header>
    <section class="scrollable wrapper">
        <div class="tab-content">

            <div class="tab-pane active" id="static">
                <div class="row"></div>
                <section class="panel">
                    <header class="panel-heading">
                        New Product 
                    </header>
                    <div class="row text-sm wrapper">
                    </div>
                    <div class="table-responsive">
                        <header class="panel-heading">
                            
                            
                            
                            <form action="<?php echo base_url(); ?>officer/save_product" method="post">
                            <table width="70%">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label>Product Name:</label>
                                            <input type="text" name="product_name" placeholder="Enter Product Name" required class="form-control">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label>Type:</label>
                                            <select class="form-control m-b" name="type" >
                                                <option value="tools">Tools</option>
                                                <option value="raw">Raw</option>
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        
                                 <label>Category:</label       
                                        
                    
                        
                        <div class="col-sm-10">
                          <div class="m-b">
                            <select id="select2-option" name="categoryid" style="width:260px">
                                <?php foreach($category as $cate){ ?>
                                    <option value="<?php echo $cate->id; ?>"><?php echo $cate->category; ?></option>
                                <?php } ?>
                                
                            </select>
                          
                          <div>
                           
                          </div>
                        </div>
                    </div>             
                                    
                                    
                                    </td>                                    
                                </tr>
                               <!-- <tr>
                                    <td>
                                        <div class="form-group">
                                            <label>Quantity:</label>
                                            <input type="text" name="quantity" placeholder="Enter Quantity" required class="form-control">
                                        </div>                                        
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label>Price:</label>
                                            <input type="text" name="price" placeholder="Price" required class="form-control">
                                        </div>                                        
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <label>Location:</label>
                                            <input type="text" name="quantity" placeholder="Location" required class="form-control">
                                        </div>                                        
                                    </td>
                                </tr>-->
                           <!--     <tr>
                                    <td colspan="3">
                                        <div class="form-group">
                                            <label>BarCode:</label>
                                            <input type="text" name="price" placeholder="Bar Code" required class="form-control">
                                        </div>                                         
                                    </td>
                                </tr>-->
                                <tr>
                                    <td colspan="3">
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea name="description" placeholder="Type your message" data-required="true" data-minwords="6" rows="6" class="form-control parsley-validated"></textarea>
                                        </div>                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <a  href="<?php echo base_url(); ?>"><button type="submit" class="btn btn-white">Cancel</button></a>
                                        <button class="btn btn-primary" type="submit">Save changes</button>   
                                    </td>
                                </tr>

                            </table>
                                </form>
                        </header>
                    </div>
                </section>
            </div>




            <div class="tab-pane" id="datagrid">



                <section class="panel">
                    <header class="panel-heading">
                        New Product List
                        <i class="icon-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                    </header>
 <div class="table-responsive">
                  <table class="table table-striped b-t text-sm">
                    <thead>
                      <tr>
                        <th width="20">ID</th>
                        <th width="300" data-toggle="class" class="th-sortable">Name
                          <span class="th-sort">
                            <i class="icon-sort-down text"></i>
                            <i class="icon-sort-up text-active"></i>
                            <i class="icon-sort"></i>
                          </span>
                        </th>
                        <th  width="30">Type</th>
                        <th>Description</th>
                        <th width="150">Date</th>
                        <th width="30">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach($result as $data) { ?>   
                      <tr>
                        <td><?php echo $data->id; ?></td>
                        <td><?php echo $data->product_name; ?></td>
                        <td><?php echo $data->type; ?></td>
                        <td><?php echo $data->description; ?></td>
                        <td><?php echo $data->date; ?></td>
                        <td>
                          <a data-toggle="class" class="active" href="#">
                              <i class="icon-ok text-success text-active"></i>
                              <i onclick="delete_new_product(<?php echo $data->id; ?>)"class="icon-remove text-danger text-active"></i>
                          </a>
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
                        <li><a href="#"><i class="icon-chevron-right"></i></a></li> </ul>             
                      Pages: <?php //echo $links; ?>-->    
                    </div>
                  </div>
                </footer>
                </div>
                </section>
            </div>







        </div>
    </section>
</section>