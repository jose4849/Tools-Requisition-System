 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script>

function save_cat(id){
    var category  = $('#cat_name_' + id + '').val();
    var description  = $('#cat_description_' + id + '').val();
    $.ajax({url: "<?php echo base_url(); ?>store/category_update",  type:'POST', data: {id:id,category:category,description:description}, success: function(result) {
          alert(result);
          window.location.reload();
    }});
    
    
}
function delete_cat(id){
     var con = confirm("Do you confirm to delete!");
     if(con==true){
     $.ajax({url: "<?php echo base_url(); ?>store/category_delete", type:'POST', data: {id:id }, success: function(result) {
          alert(result);
          window.location.reload();
    }});  
    }
}
</script>
<section class="vbox">
    <header class="header bg-success bg-gradient">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#static" data-toggle="tab">Category</a></li>
            <li class=""><a href="#datagrid" data-toggle="tab">Add New</a></li>
        </ul>
    </header>
    <section class="scrollable wrapper">
        <div class="tab-content">

            <div class="tab-pane active" id="static">


                <section class="panel">
                    <header class="panel-heading">
                        All Category
                        <i class="icon-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i> 
                    </header>

                    <div class="table-responsive">
                        <table class="table table-striped b-t text-sm">
                            <thead>
                                <tr>
                                    <th width="20">ID</th>
                                    <th width="300" data-toggle="class" class="th-sortable">Category
                                        <span class="th-sort">
                                            <i class="icon-sort-down text"></i>
                                            <i class="icon-sort-up text-active"></i>
                                            <i class="icon-sort"></i>
                                        </span>
                                    </th>
                                    <th>Description</th>
                                    <th width="165">Action</th>
                                    <th width="150">Date</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($result as $data) { ?>   
                                    <tr>
                                        <td id="jose"><?php echo $data->id; ?></td>
                                        <td><input type="text" id="cat_name_<?php echo $data->id; ?>"  class="form-control" required="" value="<?php echo $data->category; ?>" value="" /></td>
                                        <td><input type="text" id="cat_description_<?php echo $data->id; ?>"  class="form-control" required="" value="<?php echo $data->description; ?>" value="" /></td>                    
                                        <td>
                                            <a href="#" class="active" data-toggle="class">
                                                <i class="icon-save text-success text-active" style="font-size:20px; color:black;"  onclick="save_cat(<?php echo $data->id; ?>)"></i>
                                                
                                                <i class="icon-remove text-danger text-active" style="font-size:20px; color:red;" onclick="delete_cat(<?php echo $data->id; ?>)"></i>
                                            </a>
                                        </td>
                                        <td><?php echo $data->date; ?></td>
                                    </tr>
                                <? } ?>
                            </tbody>
                        </table>
                        <footer class="panel-footer">
                            <div class="row">
                                <div class="col-sm-4 hidden-xs">                
                                </div>
                                <div class="col-sm-4 text-center">

                                </div>
                                <div class="col-sm-4 text-right text-center-xs">                                
                                    <?php if ($links != '') {
                                        echo "Pages: " . $links;
                                    } ?>
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
                                    <header class="panel-heading font-bold">New Category</header>
                                    <div class="panel-body">
                                        <form role="form" action="<?php echo base_url(); ?>store/save_category" method="post" >
                                            <div class="form-group">
                                                <label>Name:</label>
                                                <input type="text" name="category" placeholder="Enter Name" required class="form-control">
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