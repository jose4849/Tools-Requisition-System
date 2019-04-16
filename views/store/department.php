<script>

function save_dept(id){
    var department  = $('#dept_name_' + id + '').val();
    var description  = $('#dept_description_' + id + '').val();
    $.ajax({url: "<?php echo base_url(); ?>store/department_update",  type:'POST', data: {id:id,department:department,description:description}, success: function(result) {
          alert(result);
          window.location.reload();
    }});
    
    
}
function delete_dept(id){
     var con = confirm("Do you confirm to delete!");
     if(con==true){
     $.ajax({url: "<?php echo base_url(); ?>store/department_delete", type:'POST', data: {id:id }, success: function(result) {
          alert(result);
          window.location.reload();
    }});  
    }
}
</script>



<section class="vbox">
    <header class="header bg-success bg-gradient">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#static" data-toggle="tab">Department</a></li>
            <li class=""><a href="#datagrid" data-toggle="tab">Add New</a></li>
        </ul>
    </header>
    <section class="scrollable wrapper">
        <div class="tab-content">

            <div class="tab-pane active" id="static">
                
                
                <section class="panel">
                    <header class="panel-heading">
                        All Department
                        <i class="icon-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                    </header>

<div class="table-responsive">
                  <table class="table table-striped b-t text-sm">
                    <thead>
                      <tr>
                        <th width="20">ID</th>
                        <th width="300" data-toggle="class" class="th-sortable">Department
                          <span class="th-sort">
                            <i class="icon-sort-down text"></i>
                            <i class="icon-sort-up text-active"></i>
                            <i class="icon-sort"></i>
                          </span>
                        </th>
                        <th>Description</th>
                        <th width="150">Date</th>
                        <th width="100"></th>
                      </tr>
                    </thead>
                    <tbody>
                     <?php foreach($result as $data) { ?>   
                      <tr>
                        <td>
                           <?php echo $data->id; ?>
                        </td>
                        <td> <input type="text" class="form-control" required="" id="dept_name_<?php echo $data->id; ?>" value="<?php echo $data->department; ?>" /></td>
                        <td><input type="text" class="form-control" required="" id="dept_description_<?php echo $data->id; ?>" value="<?php echo $data->description; ?>" /></td>
                        <td><?php echo $data->date; ?></td>
                        <td>
                          
                        <a data-toggle="class" class="active" href="#">
                            <i onclick="save_dept(<?php echo $data->id; ?>)" style="font-size:20px; color:black;" class="icon-save text-success text-active"></i>
                            <i onclick="delete_dept(<?php echo $data->id; ?>)" style="font-size:20px; color:red;" class="icon-remove text-danger text-active"></i>
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
                        <li><a href="#"><i class="icon-chevron-right"></i></a></li> </ul>-->                 
                      Pages: <?php echo $links; ?>
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
                                    <header class="panel-heading font-bold">New Department</header>
                                    <div class="panel-body">
                                        <form role="form" action="<?php echo base_url(); ?>store/save_department" method="post" >
                                            <div class="form-group">
                                                <label>Name:</label>
                                                <input type="text" name="department" placeholder="Enter Name" required class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Description:</label>
                                                <input type="text" name="description" placeholder="Description" required class="form-control">
                                            </div>
                                            <div class="checkbox">

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